/* MADD chat assistant — floating "Ask MADD" button + chat panel (see includes/chat.php). */
(function () {
  "use strict";
  var cfg = window.MaddChat;
  if (!cfg) return;
  var STORE = "madd-chat-v1";
  var history = [];
  try { history = JSON.parse(sessionStorage.getItem(STORE) || "[]"); } catch (e) { history = []; }

  var esc = function (s) { return String(s).replace(/[&<>"']/g, function (c) { return { "&": "&amp;", "<": "&lt;", ">": "&gt;", '"': "&quot;", "'": "&#39;" }[c]; }); };
  // tiny markdown: **bold**, [text](url), bullets, line breaks — on escaped text only
  var md = function (s) {
    var h = esc(s)
      .replace(/\*\*(.+?)\*\*/g, "<strong>$1</strong>")
      .replace(/\[([^\]]+)\]\((https?:\/\/[^\s)]+|\/[^\s)]*)\)/g, '<a href="$2">$1</a>');
    var out = [], list = false;
    h.split(/\n/).forEach(function (line) {
      line = line.replace(/^\s*#{1,6}\s+(.*)$/, "<strong>$1</strong>"); // headings → bold line
      var m = line.match(/^\s*(?:[-*•]|\d+\.)\s+(.*)$/);
      if (m) { if (!list) { out.push("<ul>"); list = true; } out.push("<li>" + m[1] + "</li>"); return; }
      if (list) { out.push("</ul>"); list = false; }
      if (line.trim()) out.push("<p>" + line + "</p>");
    });
    if (list) out.push("</ul>");
    return out.join("");
  };
  var fmt = function (n) { return Number(n).toLocaleString("en-US", { maximumFractionDigits: 2 }); };
  var th = /[฀-๿]/;

  // ---------- markup
  var root = document.createElement("div");
  root.className = "madd-chat";
  root.innerHTML =
    '<button type="button" class="madd-chat-fab" aria-expanded="false" aria-controls="madd-chat-panel">' +
    '<span class="madd-chat-fab-icon" aria-hidden="true"></span><span class="madd-chat-fab-text">Ask MADD</span></button>' +
    '<section class="madd-chat-panel" id="madd-chat-panel" role="dialog" aria-label="Chat with MADD" hidden>' +
    '<header class="madd-chat-head"><span class="madd-chat-avatar" aria-hidden="true">M</span><div><strong>MADD Assistant</strong><small>Rates · Tracking · Shipping questions</small></div>' +
    '<button type="button" class="madd-chat-reset" title="New chat" aria-label="New chat"></button><button type="button" class="madd-chat-close" aria-label="Close chat"></button></header>' +
    '<div class="madd-chat-log" aria-live="polite"></div>' +
    '<div class="madd-chat-chips"></div>' +
    '<form class="madd-chat-form"><textarea rows="1" maxlength="1500" placeholder="Ask anything… / ถามได้เลย" aria-label="Your message"></textarea>' +
    '<button type="submit" aria-label="Send"></button></form>' +
    '<p class="madd-chat-foot">AI assistant — prices are estimates. <a href="' + esc(cfg.line) + '" target="_blank" rel="noopener">Chat with our team on LINE</a></p>' +
    "</section>";
  document.body.appendChild(root);

  var fab = root.querySelector(".madd-chat-fab");
  var panel = root.querySelector(".madd-chat-panel");
  var log = root.querySelector(".madd-chat-log");
  var chips = root.querySelector(".madd-chat-chips");
  var form = root.querySelector(".madd-chat-form");
  var box = form.querySelector("textarea");
  var send = form.querySelector("button");
  var busy = false;

  var suggestions = [
    "How much to send 2 kg to Japan?",
    "Track my parcel",
    "What items can't I send?",
    "Where are your branches?",
    "ส่งเสื้อผ้า 5 กิโลไปอเมริกาเท่าไหร่",
  ];

  // ---------- rendering
  var quoteCard = function (q) {
    var opts = (q.options || []).slice(0, 4);
    var kg = (q.packages || []).reduce(function (s, p) { return s + p.weight * (p.quantity || 1); }, 0);
    var html = '<div class="madd-chat-card is-quote"><div class="madd-chat-card-head">Rates to <strong>' + esc(q.destination.city ? q.destination.city + ", " : "") + esc(q.destination.country) + "</strong> · " + fmt(kg) + " kg</div>";
    if (!opts.length) html += '<p class="madd-chat-card-empty">No live price — please contact our team.</p>';
    opts.forEach(function (o, i) {
      html += '<div class="madd-chat-opt' + (i === 0 ? " is-best" : "") + '"><span class="madd-chat-carrier is-' + esc(String(o.carrier).toLowerCase()) + '">' + esc(o.carrier) + "</span>" +
        '<span class="madd-chat-svc">' + esc(o.service_name || "") + (o.transit_days ? "<small>" + o.transit_days + " day" + (o.transit_days > 1 ? "s" : "") + "</small>" : "") + "</span>" +
        '<span class="madd-chat-price">' + Number(o.price).toLocaleString("en-US", { minimumFractionDigits: o.price % 1 ? 2 : 0, maximumFractionDigits: 2 }) + " <small>THB</small></span></div>";
    });
    return html + '<a class="madd-chat-card-link" href="' + esc(cfg.rateUrl) + '#check-rate">Open full rate check →</a></div>';
  };
  var trackCard = function (t) {
    var ev = (t.events || [])[0];
    return '<div class="madd-chat-card is-track"><div class="madd-chat-card-head">' + esc(t.carrier || "") + " · <strong>" + esc(t.tracking_number) + "</strong></div>" +
      '<p class="madd-chat-status">' + esc(t.status_text || t.status || "") + "</p>" +
      (ev ? '<p class="madd-chat-event">' + esc(ev.description || "") + (ev.location ? " — " + esc(ev.location) : "") + (ev.time ? "<small>" + esc(String(ev.time).replace("T", " ").slice(0, 16)) + "</small>" : "") + "</p>" : "") +
      (t.estimated_delivery ? '<p class="madd-chat-event">Estimated delivery: <strong>' + esc(String(t.estimated_delivery).slice(0, 10)) + "</strong></p>" : "") +
      '<a class="madd-chat-card-link" href="' + esc(cfg.trackUrl) + "?tn=" + encodeURIComponent(t.tracking_number) + '">Full tracking details →</a></div>';
  };
  var bubble = function (m) {
    var el = document.createElement("div");
    el.className = "madd-chat-msg is-" + m.role;
    var html = m.role === "user" ? "<p>" + esc(m.content).replace(/\n/g, "<br>") + "</p>" : md(m.content);
    (m.quotes || []).forEach(function (q) { html += quoteCard(q); });
    (m.tracking || []).forEach(function (t) { html += trackCard(t); });
    el.innerHTML = html;
    log.appendChild(el);
  };
  var render = function () {
    log.innerHTML = "";
    if (!history.length) {
      bubble({ role: "assistant", content: "Hi! I'm the MADD assistant 👋\nI can check **shipping rates**, **track a parcel** (UPS / DHL) or answer questions about shipping from Thailand. สอบถามเป็นภาษาไทยได้เลยครับ" });
    }
    history.forEach(bubble);
    chips.hidden = history.length > 0;
    log.scrollTop = log.scrollHeight;
  };
  chips.innerHTML = suggestions.map(function (s) { return '<button type="button">' + esc(s) + "</button>"; }).join("");

  // ---------- open / close
  var open = function (on) {
    panel.hidden = !on;
    fab.setAttribute("aria-expanded", on ? "true" : "false");
    root.classList.toggle("is-open", on);
    document.documentElement.classList.toggle("madd-chat-lock", on && window.innerWidth < 600);
    if (on) { render(); setTimeout(function () { box.focus(); }, 50); }
  };
  fab.addEventListener("click", function () { open(panel.hidden); });
  root.querySelector(".madd-chat-close").addEventListener("click", function () { open(false); fab.focus(); });
  root.querySelector(".madd-chat-reset").addEventListener("click", function () { history = []; save(); render(); box.focus(); });
  document.addEventListener("keydown", function (e) { if (e.key === "Escape" && !panel.hidden) open(false); });

  var save = function () { try { sessionStorage.setItem(STORE, JSON.stringify(history.slice(-20))); } catch (e) {} };

  // ---------- send
  var ask = function (text) {
    text = text.trim();
    if (!text || busy) return;
    busy = true;
    send.disabled = true;
    history.push({ role: "user", content: text });
    save();
    render();
    var typing = document.createElement("div");
    typing.className = "madd-chat-msg is-assistant is-typing";
    typing.innerHTML = "<span></span><span></span><span></span>";
    log.appendChild(typing);
    log.scrollTop = log.scrollHeight;
    fetch(cfg.endpoint, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      credentials: "same-origin",
      body: JSON.stringify({ messages: history.map(function (m) { return { role: m.role, content: m.content }; }) }),
    })
      .then(function (r) { return r.json().then(function (j) { return { ok: r.ok, j: j }; }); })
      .then(function (r) {
        if (r.ok && r.j && r.j.reply !== undefined) {
          history.push({ role: "assistant", content: r.j.reply || "…", quotes: r.j.quotes || [], tracking: r.j.tracking || [] });
        } else {
          history.push({ role: "assistant", content: (r.j && r.j.message) || (th.test(text) ? "ขออภัย ระบบตอบไม่ได้ในขณะนี้ กรุณาลองใหม่ หรือติดต่อทีมงานทาง LINE" : "Sorry, I can't answer right now. Please try again or chat with our team on LINE."), error: true });
        }
      })
      .catch(function () {
        history.push({ role: "assistant", content: "Sorry, the connection failed. Please try again.", error: true });
      })
      .finally(function () {
        // failed answers are shown but not sent back as context
        history = history.filter(function (m, i) { return !m.error || i === history.length - 1; });
        busy = false;
        send.disabled = false;
        save();
        render();
      });
  };
  form.addEventListener("submit", function (e) { e.preventDefault(); var t = box.value; box.value = ""; box.style.height = ""; ask(t); });
  box.addEventListener("keydown", function (e) { if (e.key === "Enter" && !e.shiftKey && !e.isComposing) { e.preventDefault(); form.requestSubmit(); } });
  box.addEventListener("input", function () { box.style.height = ""; box.style.height = Math.min(box.scrollHeight, 120) + "px"; });
  chips.addEventListener("click", function (e) {
    if (e.target.tagName !== "BUTTON") return;
    var t = e.target.textContent;
    if (/^Track my parcel$/.test(t)) { box.value = "Track my parcel: "; box.focus(); return; }
    ask(t);
  });
})();
