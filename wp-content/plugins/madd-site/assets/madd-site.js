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
