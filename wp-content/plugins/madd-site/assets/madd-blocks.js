/* MADD Site — editor blocks.
   madd/rate-quote: the live form is built by the MADD Rate Quote plugin on the front end only,
   so the editor shows a static preview of the card plus a language setting. */
(function (wp) {
  "use strict";
  var el = wp.element.createElement;
  var useBlockProps = wp.blockEditor.useBlockProps;
  var InspectorControls = wp.blockEditor.InspectorControls;
  var PanelBody = wp.components.PanelBody;
  var SelectControl = wp.components.SelectControl;

  wp.blocks.registerBlockType("madd/rate-quote", {
    title: "MADD Check Rate",
    description: "ฟอร์มเช็คราคาค่าส่งต่างประเทศ (ดึงราคาจริงจากระบบ MADD)",
    category: "widgets",
    icon: "calculator",
    attributes: { lang: { type: "string", default: "en" } },
    supports: { html: false, multiple: false },

    edit: function (props) {
      var th = props.attributes.lang === "th";
      var t = function (en, thai) { return th ? thai : en; };
      return el(
        "div",
        useBlockProps({ className: "madd-rq-preview" }),
        el(
          InspectorControls,
          null,
          el(
            PanelBody,
            { title: "ตั้งค่าฟอร์ม" },
            el(SelectControl, {
              label: "ภาษาของฟอร์ม",
              value: props.attributes.lang,
              options: [
                { label: "English", value: "en" },
                { label: "ภาษาไทย", value: "th" },
              ],
              onChange: function (v) { props.setAttributes({ lang: v }); },
            })
          )
        ),
        el("div", { className: "madd-rq-preview__note" }, "ตัวอย่างฟอร์มเช็คราคา — ฟอร์มจริงทำงานบนหน้าเว็บ"),
        el(
          "div",
          { className: "madd-rq-preview__tabs" },
          el("span", { className: "is-on" }, t("Parcel", "พัสดุ")),
          el("span", null, t("Document", "เอกสาร"))
        ),
        el("div", { className: "madd-rq-preview__input" }, t("Destination country", "ประเทศปลายทาง")),
        el(
          "div",
          { className: "madd-rq-preview__row" },
          el("div", { className: "madd-rq-preview__input" }, t("Weight kg", "น้ำหนัก กก.")),
          el("div", { className: "madd-rq-preview__input" }, t("Qty", "จำนวน")),
          el("div", { className: "madd-rq-preview__input" }, "L × W × H cm")
        ),
        el("div", { className: "madd-rq-preview__btn" }, t("Check price", "เช็คราคา"))
      );
    },

    save: function () { return null; },
  });
})(window.wp);
