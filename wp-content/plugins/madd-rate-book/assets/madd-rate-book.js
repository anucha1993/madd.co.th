/* MADD Rate Book — tabs between rate tables and a country finder that highlights the destination's zone column. */
(function () {
  "use strict";

  function init(root) {
    var tabs = Array.prototype.slice.call(root.querySelectorAll(".madd-rb-tabs [role=tab]"));
    var books = Array.prototype.slice.call(root.querySelectorAll(".madd-rb-book"));
    var input = root.querySelector(".madd-rb-find input");
    var hit = root.querySelector(".madd-rb-hit");

    function show(i) {
      books.forEach(function (b, j) { b.hidden = j !== i; });
      tabs.forEach(function (t, j) {
        t.setAttribute("aria-selected", j === i ? "true" : "false");
        t.tabIndex = j === i ? 0 : -1;
      });
    }
    tabs.forEach(function (t, i) {
      t.addEventListener("click", function () { show(i); find(); });
      t.addEventListener("keydown", function (e) {
        var to = { ArrowRight: i + 1, ArrowLeft: i - 1 }[e.key];
        if (to === undefined) return;
        to = (to + tabs.length) % tabs.length;
        show(to);
        tabs[to].focus();
        find();
      });
    });

    // zone column (index) in a book whose country list contains the query, or -1
    function zoneIn(book, q) {
      var ths = book.querySelectorAll("thead th[data-countries]");
      for (var i = 0; i < ths.length; i++) {
        var list = ths[i].getAttribute("data-countries").split("|");
        for (var k = 0; k < list.length; k++) if (list[k] && list[k].indexOf(q) !== -1) return i;
      }
      return -1;
    }

    function mark(book, col) {
      Array.prototype.forEach.call(book.querySelectorAll(".is-hit"), function (c) { c.classList.remove("is-hit"); });
      if (col < 0) return;
      Array.prototype.forEach.call(book.querySelectorAll("tr"), function (tr) {
        var cell = tr.children[col + 1];
        if (cell) cell.classList.add("is-hit");
      });
      var th = book.querySelector("thead tr").children[col + 1];
      var scroller = book.querySelector(".madd-rb-scroll");
      if (th && scroller.scrollWidth > scroller.clientWidth) {
        scroller.scrollTo({ left: Math.max(0, th.offsetLeft - scroller.clientWidth / 2 + th.offsetWidth / 2), behavior: "smooth" });
      }
    }

    function find() {
      var q = (input.value || "").trim().toLowerCase();
      var active = books.findIndex(function (b) { return !b.hidden; });
      if (q.length < 2) {
        books.forEach(function (b) { mark(b, -1); });
        hit.hidden = true;
        return;
      }
      var cols = books.map(function (b) { return zoneIn(b, q); });
      // not in the open table but in another one: open that one
      if (cols[active] < 0) {
        var other = cols.findIndex(function (c) { return c >= 0; });
        if (other >= 0 && tabs.length) {
          show(other);
          active = other;
        }
      }
      books.forEach(function (b, i) { mark(b, cols[i]); });
      hit.hidden = false;
      if (cols[active] >= 0) {
        var name = books[active].querySelector("thead tr").children[cols[active] + 1].textContent;
        hit.className = "madd-rb-hit is-found";
        hit.textContent = "“" + input.value.trim() + "” is in " + name + " — prices highlighted below.";
      } else {
        hit.className = "madd-rb-hit";
        hit.textContent = "No zone found for “" + input.value.trim() + "”. Try the Check Rate form or contact our team.";
      }
    }
    if (input) input.addEventListener("input", find);
  }

  Array.prototype.forEach.call(document.querySelectorAll(".madd-rb"), init);
})();

// Wide tables on phones: "swipe for more zones" hint + fading edges while there is more to the right / left.
(function () {
  Array.prototype.forEach.call(document.querySelectorAll(".madd-rb-scroll"), function (box) {
    var wrap = document.createElement("div");
    wrap.className = "madd-rb-scrollwrap";
    box.parentNode.insertBefore(wrap, box);
    wrap.appendChild(box);
    var hint = document.createElement("p");
    hint.className = "madd-rb-swipe";
    hint.innerHTML = 'Swipe to see more zones <span aria-hidden="true">→</span>';
    wrap.parentNode.insertBefore(hint, wrap);
    var update = function () {
      var more = box.scrollWidth > box.clientWidth + 2;
      var end = box.scrollLeft + box.clientWidth >= box.scrollWidth - 2;
      wrap.classList.toggle("has-right", more && !end);
      wrap.classList.toggle("has-left", more && box.scrollLeft > 2);
      hint.hidden = !more;
      hint.classList.toggle("is-end", end);
    };
    box.addEventListener("scroll", function () { window.requestAnimationFrame(update); }, { passive: true });
    window.addEventListener("resize", update);
    // a hidden tab has no width yet — check again when it is shown
    var book = box.closest(".madd-rb-book");
    if (book && window.MutationObserver) new MutationObserver(update).observe(book, { attributes: true, attributeFilter: ["hidden"] });
    update();
  });
})();