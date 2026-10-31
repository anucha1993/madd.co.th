/* MADD Rate Book — block: the rate tables rendered on the server (see madd-rate-book.php). Tables are edited at Settings › MADD Rate Book. */
(function (wp) {
  "use strict";
  var el = wp.element.createElement;
  var useBlockProps = wp.blockEditor.useBlockProps;
  var InspectorControls = wp.blockEditor.InspectorControls;
  var PanelBody = wp.components.PanelBody;
  var TextControl = wp.components.TextControl;
  var ServerSideRender = wp.serverSideRender;

  wp.blocks.registerBlockType("madd/rate-book", {
    title: "MADD Rate Book",
    description: "ตารางราคาค่าส่งทุกโซน (แก้ตารางที่ Settings › MADD Rate Book)",
    category: "widgets",
    icon: "editor-table",
    attributes: { book: { type: "string", default: "" } },
    supports: { html: false },

    edit: function (props) {
      return el(
        "div",
        useBlockProps(),
        el(
          InspectorControls,
          null,
          el(
            PanelBody,
            { title: "ตาราง" },
            el(TextControl, {
              label: "รหัสตาราง (เว้นว่าง = ทุกตาราง)",
              help: "คั่นหลายตารางด้วย , เช่น special,eu",
              value: props.attributes.book,
              onChange: function (v) { props.setAttributes({ book: v }); },
            })
          )
        ),
        el(ServerSideRender, { block: "madd/rate-book", attributes: props.attributes })
      );
    },

    save: function () { return null; },
  });
})(window.wp);
