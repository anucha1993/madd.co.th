/* MADD Site — madd/web-reviews: approved website reviews + "Write a review" form, rendered on the server
   (see includes/web-reviews.php). New reviews are approved at Website Reviews in the admin menu. */
(function (wp) {
  "use strict";
  var el = wp.element.createElement;
  var useBlockProps = wp.blockEditor.useBlockProps;
  var InspectorControls = wp.blockEditor.InspectorControls;
  var PanelBody = wp.components.PanelBody;
  var RangeControl = wp.components.RangeControl;
  var ServerSideRender = wp.serverSideRender;

  wp.blocks.registerBlockType("madd/web-reviews", {
    title: "MADD Website Reviews",
    description: "รีวิวที่ลูกค้าเขียนผ่านเว็บ (อนุมัติที่เมนู Website Reviews) พร้อมฟอร์มเขียนรีวิว",
    category: "widgets",
    icon: "star-filled",
    attributes: { max: { type: "number", default: 6 } },
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
            { title: "ตั้งค่ารีวิว" },
            el(RangeControl, {
              label: "จำนวนรีวิวที่แสดง",
              min: 3,
              max: 24,
              value: props.attributes.max,
              onChange: function (v) { props.setAttributes({ max: v }); },
            })
          )
        ),
        el(ServerSideRender, { block: "madd/web-reviews", attributes: props.attributes })
      );
    },

    save: function () { return null; },
  });
})(window.wp);
