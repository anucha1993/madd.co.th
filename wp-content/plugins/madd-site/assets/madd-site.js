/* MADD Site — extras for the rate-check card in the home hero:
   route strip (TH flag → box → destination flag) and a collapsible AI assistant. */
(function () {
  "use strict";

  function flag(code) {
    return (window.MADD_FLAGS || "") + code.toLowerCase() + ".png";
  }

  function enhance(root) {
    if (root.__maddEnhanced) return;
    var form = root.querySelector(".madd-quote__form");
    var select = root.querySelector('select[name="country"]');
    if (!form || !select) return; // plugin not rendered yet
    root.__maddEnhanced = true;
    var th = root.getAttribute("data-lang") === "th";

    // Route strip.
    var dest = document.createElement("span");
    dest.className = "madd-route__flag is-empty";
    dest.textContent = "?";
    var route = document.createElement("div");
    route.className = "madd-route";
    route.innerHTML =
      '<span class="madd-route__flag"><img src="' + flag("th") + '" alt="Thailand" width="40" height="27"></span>' +
      '<span class="madd-route__line"></span>' +
      '<span class="madd-route__box"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 8 12 3 3 8v8l9 5 9-5V8Z"/><path d="m3 8 9 5 9-5M12 13v8"/></svg></span>' +
      '<span class="madd-route__line"></span>';
    route.appendChild(dest);
    root.insertBefore(route, root.firstChild);

    var last = "";
    setInterval(function () {
      var code = select.value;
      if (code === last) return;
      last = code;
      dest.innerHTML = "";
      dest.classList.toggle("is-empty", !code);
      if (code) {
        var img = document.createElement("img");
        img.src = flag(code);
        img.alt = code;
        img.width = 40;
        img.height = 27;
        dest.appendChild(img);
      } else {
        dest.textContent = "?";
      }
      route.classList.toggle("is-set", !!code);
    }, 300);

    // Flags in the country dropdown (the plugin rebuilds the list on every open/keystroke).
    var list = root.querySelector(".madd-quote__combo-list");
    if (list && window.MutationObserver) {
      new MutationObserver(function () {
        Array.prototype.forEach.call(list.querySelectorAll("li[data-code]"), function (li) {
          if (li.querySelector("img.madd-flag")) return;
          var img = document.createElement("img");
          img.className = "madd-flag";
          img.src = flag(li.getAttribute("data-code"));
          img.alt = "";
          img.loading = "lazy";
          li.insertBefore(img, li.firstChild);
        });
      }).observe(list, { childList: true });
    }

    // Collapsible AI assistant (keeps the card short until asked for).
    var ai = root.querySelector(".madd-quote__ai");
    if (ai) {
      root.classList.add("madd-ai-collapsed");
      var toggle = document.createElement("button");
      toggle.type = "button";
      toggle.className = "madd-ai-toggle";
      toggle.innerHTML =
        '<span class="madd-ai-toggle__badge">AI</span><span>' +
        (th ? "ไม่อยากกรอก? พิมพ์บอกเป็นประโยคเดียว" : "Rather not fill in? Describe it in one sentence") +
        "</span>";
      toggle.addEventListener("click", function () {
        var open = root.classList.toggle("madd-ai-collapsed") === false;
        toggle.classList.toggle("is-open", open);
        if (open) {
          var input = ai.querySelector("textarea");
          if (input) input.focus();
        }
      });
      root.insertBefore(toggle, ai);
    }
  }

  function run() {
    var nodes = document.querySelectorAll(".madd-quote-card .madd-quote");
    Array.prototype.forEach.call(nodes, enhance);
  }

  // The plugin builds its form on DOMContentLoaded too, so wait a tick.
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", function () { setTimeout(run, 0); });
  } else {
    setTimeout(run, 0);
  }
  window.addEventListener("load", run);
})();

/* Google reviews slider: arrow buttons scroll one card; autoplay every 5 s, paused while hovered/touched or off-screen. */
(function () {
  "use strict";

  function setup(slider) {
    var track = slider.querySelector(".madd-greviews-track");
    var prev = slider.querySelector(".madd-greviews-nav.is-prev");
    var next = slider.querySelector(".madd-greviews-nav.is-next");
    if (!track) return;

    function step() {
      var card = track.firstElementChild;
      return card ? card.getBoundingClientRect().width + parseFloat(getComputedStyle(track).columnGap || 20) : track.clientWidth;
    }
    function atEnd() { return track.scrollLeft + track.clientWidth >= track.scrollWidth - 4; }
    function update() {
      if (prev) prev.disabled = track.scrollLeft <= 4;
      if (next) next.disabled = atEnd();
    }
    function go(dir) {
      if (dir > 0 && atEnd()) track.scrollTo({ left: 0 });
      else track.scrollBy({ left: dir * step() });
    }

    if (prev) prev.addEventListener("click", function () { go(-1); });
    if (next) next.addEventListener("click", function () { go(1); });
    track.addEventListener("scroll", update, { passive: true });
    window.addEventListener("resize", update);
    update();

    var paused = false;
    var visible = true;
    ["mouseenter", "touchstart", "focusin"].forEach(function (e) { slider.addEventListener(e, function () { paused = true; }, { passive: true }); });
    ["mouseleave", "focusout"].forEach(function (e) { slider.addEventListener(e, function () { paused = false; }); });
    if ("IntersectionObserver" in window) {
      new IntersectionObserver(function (entries) { visible = entries[0].isIntersecting; }).observe(slider);
    }
    if (!window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
      setInterval(function () { if (!paused && visible && !document.hidden) go(1); }, 5000);
    }
  }

  function run() {
    Array.prototype.forEach.call(document.querySelectorAll(".madd-greviews-slider"), setup);
  }
  if (document.readyState === "loading") document.addEventListener("DOMContentLoaded", run);
  else run();
})();

/* Footer visitor counter ([madd_visitors]): one hit per page view, a browser counts as one visitor per day. */
(function () {
  "use strict";
  var el = document.querySelector(".madd-visitors");
  if (!el || !window.fetch) return;
  var d = new Date();
  var today = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();
  var first = true;
  try {
    first = localStorage.getItem("madd_visit_day") !== today;
    localStorage.setItem("madd_visit_day", today);
  } catch (e) {}
  fetch(el.getAttribute("data-endpoint"), {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ first: first, count: el.getAttribute("data-count") === "1" }),
  })
    .then(function (r) { return r.ok ? r.json() : null; })
    .then(function (s) {
      if (!s) return;
      var n = function (v) { return Number(v || 0).toLocaleString("en-US"); };
      el.innerHTML =
        '<span>Visitors today <b>' + n(s.today) + "</b></span>" +
        '<span>This month <b>' + n(s.month) + "</b></span>" +
        '<span>Total <b>' + n(s.total) + "</b></span>";
      el.hidden = false;
    })
    .catch(function () {});
})();

// Footer: line the "Our Thai domain names" heading (Contact us column) up with the "Our websites" heading in the
// first column. Only when the columns sit side by side; stacked on mobile it just follows the contact details.
(function () {
  var head = document.querySelector(".site-footer .madd-footer-domains-title");
  var title = document.querySelector(".site-footer .madd-footer-sites-title");
  if (!head || !title) return;
  var align = function () {
    head.style.marginTop = "";
    var base = parseFloat(getComputedStyle(head).marginTop) || 0;
    var gap = title.getBoundingClientRect().top - head.getBoundingClientRect().top;
    if (window.innerWidth > 1024 && gap > 0) head.style.marginTop = base + gap + "px";
  };
  align();
  window.addEventListener("load", align);
  window.addEventListener("resize", align);
  if (document.fonts && document.fonts.ready) document.fonts.ready.then(align);
})();
// Website reviews: open/close the "Write a review" form and send it to /madd/v1/review.
(function () {
  document.querySelectorAll(".madd-wr").forEach(function (box) {
    var form = box.querySelector(".madd-wr-form");
    var open = box.querySelector(".madd-wr-open");
    var msg = box.querySelector(".madd-wr-msg");
    if (!form || !open) return;
    var more = box.querySelector(".madd-wr-more");
    if (more) more.addEventListener("click", function () {
      box.querySelectorAll(".madd-wr-item[hidden]").forEach(function (a) { a.hidden = false; });
      more.parentNode.remove();
    });
    var opened = 0;
    open.addEventListener("click", function () {
      var show = form.hidden;
      form.hidden = !show;
      open.setAttribute("aria-expanded", String(show));
      open.textContent = show ? "Close" : "Write a review";
      if (show) {
        opened = opened || Math.floor(Date.now() / 1000);
        form.elements.t.value = opened;
        form.querySelector("input[name=rating]").focus();
      }
    });
    form.addEventListener("submit", function (e) {
      e.preventDefault();
      form.querySelectorAll(".is-error").forEach(function (f) { f.classList.remove("is-error"); f.removeAttribute("data-error"); });
      var btn = form.querySelector(".madd-wr-submit");
      btn.disabled = true;
      msg.className = "madd-wr-msg";
      msg.textContent = "Sending…";
      fetch(box.getAttribute("data-endpoint"), { method: "POST", body: new FormData(form), credentials: "same-origin" })
        .then(function (r) { return r.json().then(function (d) { return { ok: r.ok, d: d }; }); })
        .then(function (res) {
          if (res.ok) {
            form.reset();
            form.innerHTML = '<div class="madd-wr-thanks"><strong>Thank you for your review!</strong>' +
              "<span>It will appear on our website after our team has checked it.</span></div>";
            return;
          }
          var fields = (res.d && res.d.data && res.d.data.fields) || {};
          Object.keys(fields).forEach(function (k) {
            var f = form.querySelector('[data-field="' + k + '"]');
            if (f) { f.classList.add("is-error"); f.setAttribute("data-error", fields[k]); }
          });
          msg.className = "madd-wr-msg is-error";
          msg.textContent = (res.d && res.d.message) || "Sorry, something went wrong. Please try again.";
          btn.disabled = false;
        })
        .catch(function () {
          msg.className = "madd-wr-msg is-error";
          msg.textContent = "Sorry, something went wrong. Please try again.";
          btn.disabled = false;
        });
    });
  });
})();

// Handwritten review forms and branch maps: open the full image in a lightbox, with previous / next within its group.
(function () {
  var groups = [".madd-hw-card figure a", ".madd-branch-mapimg a"].map(function (sel) {
    return Array.prototype.slice.call(document.querySelectorAll(sel));
  }).filter(function (g) { return g.length; });
  if (!groups.length) return;
  var links = groups[0];
  var box = document.createElement("dialog");
  box.className = "madd-hw-lightbox";
  var icon = function (d) {
    return '<svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="' + d + '"/></svg>';
  };
  box.innerHTML = '<img alt="">' +
    '<button type="button" class="madd-hw-btn madd-hw-close" aria-label="Close">' + icon("M6 6l12 12M18 6 6 18") + "</button>" +
    '<button type="button" class="madd-hw-btn madd-hw-prev" aria-label="Previous">' + icon("M15 5l-7 7 7 7") + "</button>" +
    '<button type="button" class="madd-hw-btn madd-hw-next" aria-label="Next">' + icon("M9 5l7 7-7 7") + "</button>";
  document.body.appendChild(box);
  var img = box.querySelector("img");
  var at = 0;
  var show = function (i) {
    at = (i + links.length) % links.length;
    img.src = links[at].href;
    img.alt = (links[at].querySelector("img") || {}).alt || links[at].textContent;
  };
  groups.forEach(function (group) {
    group.forEach(function (a, i) {
      a.addEventListener("click", function (e) {
        e.preventDefault();
        links = group;
        show(i);
        box.showModal();
      });
    });
  });
  box.querySelector(".madd-hw-close").addEventListener("click", function () { box.close(); });
  box.querySelector(".madd-hw-prev").addEventListener("click", function () { show(at - 1); });
  box.querySelector(".madd-hw-next").addEventListener("click", function () { show(at + 1); });
  box.addEventListener("click", function (e) { if (e.target === box) box.close(); });
  box.addEventListener("keydown", function (e) {
    if (e.key === "ArrowLeft") show(at - 1);
    if (e.key === "ArrowRight") show(at + 1);
  });
})();

// Why choose us: turn the 9 reason cards into tabs — titles on the left, one illustrated reason at a time.
(function () {
  var grid = document.querySelector(".madd-why-grid");
  if (!grid) return;
  var items = Array.prototype.slice.call(grid.querySelectorAll(".madd-why-item"));
  if (items.length < 2) return;
  var wrap = document.createElement("div");
  wrap.className = "madd-why-tabs";
  var nav = document.createElement("ul");
  nav.className = "madd-why-nav";
  nav.setAttribute("role", "tablist");
  var buttons = items.map(function (item, i) {
    var n = (i < 9 ? "0" : "") + (i + 1);
    var h3 = item.querySelector("h3");
    h3.setAttribute("data-n", n);
    item.id = item.id || "madd-why-" + n;
    item.setAttribute("role", "tabpanel");
    var li = document.createElement("li");
    var b = document.createElement("button");
    b.type = "button";
    b.setAttribute("role", "tab");
    b.setAttribute("aria-controls", item.id);
    b.innerHTML = "<span>" + n + "</span>";
    b.appendChild(document.createTextNode(h3.textContent));
    b.addEventListener("click", function () { select(i, true); });
    li.appendChild(b);
    nav.appendChild(li);
    return b;
  });
  var select = function (i, user) {
    items.forEach(function (item, j) { item.classList.toggle("is-active", j === i); });
    buttons.forEach(function (b, j) {
      b.setAttribute("aria-selected", j === i ? "true" : "false");
      b.tabIndex = j === i ? 0 : -1;
    });
    // keep the chosen title in view when the titles scroll sideways (tablet / phone)
    if (user && nav.scrollWidth > nav.clientWidth) {
      nav.scrollTo({ left: buttons[i].parentNode.offsetLeft - 16, behavior: "smooth" });
    }
  };
  nav.addEventListener("keydown", function (e) {
    var at = buttons.indexOf(document.activeElement);
    if (at < 0) return;
    var to = { ArrowDown: at + 1, ArrowRight: at + 1, ArrowUp: at - 1, ArrowLeft: at - 1 }[e.key];
    if (to === undefined) return;
    e.preventDefault();
    to = (to + buttons.length) % buttons.length;
    select(to, true);
    buttons[to].focus();
  });
  // previous / next under the card (shown on tablet / phone), plus swipe on the card
  var current = function () { return items.findIndex(function (item) { return item.classList.contains("is-active"); }); };
  var step = function (d) { select((current() + d + items.length) % items.length, true); };
  var pager = document.createElement("div");
  pager.className = "madd-why-pager";
  pager.innerHTML = '<button type="button" aria-label="Previous reason">‹</button><button type="button" aria-label="Next reason">›</button>';
  pager.firstChild.addEventListener("click", function () { step(-1); });
  pager.lastChild.addEventListener("click", function () { step(1); });
  var x0 = null;
  grid.addEventListener("touchstart", function (e) { x0 = e.touches[0].clientX; }, { passive: true });
  grid.addEventListener("touchend", function (e) {
    if (x0 === null) return;
    var dx = e.changedTouches[0].clientX - x0;
    x0 = null;
    if (Math.abs(dx) > 50) step(dx < 0 ? 1 : -1);
  });
  grid.parentNode.insertBefore(wrap, grid);
  wrap.appendChild(nav);
  wrap.appendChild(grid);
  wrap.appendChild(pager);
  select(0, false);
})();
// How to Calculate Shipping Cost: actual vs dimensional (L × W × H ÷ 5,000) weight — the greater is billable.
(function () {
  var form = document.querySelector(".madd-calc");
  if (!form) return;
  var num = function (name) {
    var v = parseFloat(form.elements[name].value);
    return v > 0 ? v : 0;
  };
  var out = function (key) { return form.querySelector('[data-out="' + key + '"]'); };
  var kg = function (v) { return v ? (Math.round(v * 100) / 100).toLocaleString("en-US", { maximumFractionDigits: 2 }) + " kg" : "–"; };
  var update = function () {
    var w = num("weight");
    var dim = num("dim_l") * num("dim_w") * num("dim_h") / 5000; // not "length": form.elements.length is the field count
    var bill = Math.max(w, dim);
    out("actual").textContent = kg(w);
    out("dim").textContent = kg(dim);
    out("bill").textContent = kg(bill);
    form.querySelector('[data-box="actual"]').classList.toggle("is-win", w > 0 && w >= dim);
    form.querySelector('[data-box="dim"]').classList.toggle("is-win", dim > 0 && dim > w);
    out("note").textContent = !bill ? "Dimensional weight = L × W × H ÷ 5,000. The greater of the two weights is generally used."
      : dim > w ? "Your parcel is bulky for its weight — you are charged for the dimensional weight."
      : "Your parcel is heavier than its size — you are charged for the actual weight.";
  };
  form.addEventListener("input", update);
  form.addEventListener("submit", function (e) { e.preventDefault(); });
})();
// How to Calculate: editable worked example — the three steps are redone with the visitor's own numbers.
(function () {
  var form = document.querySelector(".madd-calcx");
  if (!form) return;
  var names = ["ex_l", "ex_w", "ex_h", "ex_kg"];
  var val = function (name) {
    var v = parseFloat(form.elements[name].value);
    return v > 0 ? v : 0;
  };
  var x = function (key) { return form.querySelector('[data-x="' + key + '"]'); };
  var fmt = function (v) { return (Math.round(v * 100) / 100).toLocaleString("en-US", { maximumFractionDigits: 2 }); };
  var update = function () {
    var l = val("ex_l"), w = val("ex_w"), h = val("ex_h"), kg = val("ex_kg");
    var dim = l * w * h / 5000;
    var bill = Math.max(kg, dim);
    x("actual").textContent = fmt(kg) + " kg";
    x("formula").textContent = fmt(l) + " × " + fmt(w) + " × " + fmt(h) + " ÷ 5,000";
    x("dim").textContent = fmt(dim) + " kg";
    x("bill").textContent = fmt(bill) + " kg";
    form.querySelector('[data-step="actual"]').classList.toggle("is-win", kg > 0 && kg >= dim);
    form.querySelector('[data-step="dim"]').classList.toggle("is-win", dim > 0 && dim > kg);
    x("verdict").textContent = !bill ? "Enter the box size and weight." : dim > kg ? "Light but bulky — charged by its size." : "Heavy for its size — charged by its actual weight.";
  };
  form.addEventListener("input", update);
  form.addEventListener("submit", function (e) { e.preventDefault(); });
  form.querySelector(".madd-calcx-reset").addEventListener("click", function () {
    names.forEach(function (n) { form.elements[n].value = form.elements[n].getAttribute("data-default"); });
    update();
  });
  update();
})();

// Prohibited items: search box filters the table rows (and hides groups with no match).
(function () {
  var input = document.querySelector(".madd-pro-find input");
  if (!input) return;
  var items = Array.prototype.slice.call(document.querySelectorAll(".madd-pro-table tbody tr"));
  var groups = Array.prototype.slice.call(document.querySelectorAll(".madd-pro-group"));
  var count = document.querySelector(".madd-pro-count");
  var empty = document.querySelector(".madd-pro-empty");
  var total = items.length;
  items.forEach(function (it) { it.setAttribute("data-text", it.textContent.toLowerCase()); });
  input.addEventListener("input", function () {
    var words = input.value.trim().toLowerCase().split(/\s+/).filter(Boolean);
    var shown = 0;
    items.forEach(function (it) {
      var text = it.getAttribute("data-text");
      var ok = words.every(function (w) { return text.indexOf(w) !== -1; });
      it.hidden = !ok;
      if (ok) shown++;
    });
    groups.forEach(function (g) { g.hidden = !g.querySelector("tbody tr:not([hidden])"); });
    count.textContent = words.length ? shown + " of " + total + " item types match" : total + " prohibited item types";
    if (empty) empty.hidden = shown > 0;
  });
  if (empty) empty.hidden = true;
})();

// Contact form ([madd_contact_form]): posts to REST madd/v1/contact, shows field errors / thank-you.
(function () {
  var form = document.querySelector(".madd-ct");
  if (!form) return;
  form.elements.t.value = Math.floor(Date.now() / 1000);
  var status = form.querySelector(".madd-ct-status");
  var send = form.querySelector(".madd-ct-send");
  form.addEventListener("submit", function (e) {
    e.preventDefault();
    Array.prototype.forEach.call(form.querySelectorAll(".is-error"), function (f) { f.classList.remove("is-error"); f.removeAttribute("data-error"); });
    status.hidden = true;
    send.disabled = true;
    send.textContent = "Sending…";
    fetch(form.getAttribute("data-endpoint"), { method: "POST", body: new FormData(form), credentials: "same-origin" })
      .then(function (res) { return res.json().then(function (json) { return { ok: res.ok, json: json }; }); })
      .then(function (r) {
        if (r.ok && r.json && r.json.ok) {
          form.innerHTML = '<div class="madd-ct-done"><strong>Thank you — your message has been sent.</strong><span>Our team will get back to you as soon as possible. For urgent questions, call +66 (0)2 629 4441-2 or chat with us on LINE.</span></div>';
          return;
        }
        var fields = (r.json && r.json.data && r.json.data.fields) || {};
        Object.keys(fields).forEach(function (k) {
          var f = form.querySelector('[data-field="' + k + '"]');
          if (f) { f.classList.add("is-error"); f.setAttribute("data-error", fields[k]); }
        });
        status.textContent = (r.json && r.json.message) || "Sorry, something went wrong. Please try again.";
        status.hidden = false;
      })
      .catch(function () {
        status.textContent = "Sorry, your message could not be sent. Please try again or contact us by phone or LINE.";
        status.hidden = false;
      })
      .finally(function () {
        if (send.isConnected) { send.disabled = false; send.textContent = "Send message"; }
      });
  });
})();

// Shipping Guide: search box filters the article links (and hides topics with no match).
(function () {
  var input = document.querySelector(".madd-guide-find input");
  if (!input) return;
  var items = Array.prototype.slice.call(document.querySelectorAll(".madd-guide-topic li"));
  var topics = Array.prototype.slice.call(document.querySelectorAll(".madd-guide-topic"));
  var empty = document.querySelector(".madd-guide-empty");
  items.forEach(function (li) { li.setAttribute("data-text", li.textContent.toLowerCase()); });
  input.addEventListener("input", function () {
    var words = input.value.trim().toLowerCase().split(/\s+/).filter(Boolean);
    var shown = 0;
    items.forEach(function (li) {
      var ok = words.every(function (w) { return li.getAttribute("data-text").indexOf(w) !== -1; });
      li.hidden = !ok;
      if (ok) shown++;
    });
    topics.forEach(function (t) { t.hidden = !t.querySelector("li:not([hidden])"); });
    if (empty) empty.hidden = shown > 0;
  });
})();
