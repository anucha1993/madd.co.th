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

// Handwritten review forms: open the full scanned form in a lightbox, with previous / next.
(function () {
  var links = Array.prototype.slice.call(document.querySelectorAll(".madd-hw-card figure a"));
  if (!links.length) return;
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
    img.alt = (links[at].querySelector("img") || {}).alt || "";
  };
  links.forEach(function (a, i) {
    a.addEventListener("click", function (e) {
      e.preventDefault();
      show(i);
      box.showModal();
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