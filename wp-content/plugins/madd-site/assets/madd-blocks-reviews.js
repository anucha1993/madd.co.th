/* MADD Site — madd/google-reviews: rendered on the server from the Google Places API (see includes/google-reviews.php).
   The editor shows the same server output, or a note when no data is available yet. */
(function (wp) {
  "use strict";
  var el = wp.element.createElement;
  var useBlockProps = wp.blockEditor.useBlockProps;
  var InspectorControls = wp.blockEditor.InspectorControls;
  var PanelBody = wp.components.PanelBody;
  var RangeControl = wp.components.RangeControl;
  var ServerSideRender = wp.serverSideRender;

  function Note() {
    return el(
      "div",
      { className: "madd-rq-preview__note" },
      "รีวิวจาก Google จะแสดงตรงนี้ — ใส่ API key ที่ Settings → MADD Google Reviews"
    );
  }

  wp.blocks.registerBlockType("madd/google-reviews", {
    title: "MADD Google Reviews",
    description: "คะแนนและรีวิวจาก Google Maps ของทุกสาขา (ดึงข้อมูลใหม่ที่ Settings → MADD Google Reviews)",
    category: "widgets",
    icon: "star-filled",
    attributes: { max: { type: "number", default: 12 } },
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
              max: 15,
              value: props.attributes.max,
              onChange: function (v) { props.setAttributes({ max: v }); },
            })
          )
        ),
        el(ServerSideRender, {
          block: "madd/google-reviews",
          attributes: props.attributes,
          EmptyResponsePlaceholder: Note,
        })
      );
    },

    save: function () { return null; },
  });
})(window.wp);
