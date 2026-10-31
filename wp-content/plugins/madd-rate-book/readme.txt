=== MADD Rate Book ===
Requires at least: 5.8
Requires PHP: 7.4
Stable tag: 1.0.0

ตารางราคาค่าส่ง (Rate Book) ทุกโซน ทุกน้ำหนัก บนหน้าเว็บ — มีแท็บสลับตาราง และช่องค้นหาประเทศที่ไฮไลต์คอลัมน์โซนของประเทศนั้น

== ใช้งาน ==
- Block "MADD Rate Book" หรือ shortcode
    [madd_rate_book]                  ทุกตาราง
    [madd_rate_book book="special"]   เฉพาะตาราง (คั่นหลายตารางด้วย , )
- แก้ตาราง: Settings › MADD Rate Book
    โซน  — บรรทัดละ 1 โซน:  Zone 1 | Hong Kong, Malaysia, Macau, Singapore
    ราคา — บรรทัดละ 1 แถว: น้ำหนัก แล้วราคาทีละโซน คั่นด้วย Tab (copy จาก Excel มาวางได้) หรือ |  · ไม่มีราคาใส่ -

== ดึงจากระบบ MADD ==
เลือก "ระบบ MADD" ที่หน้าตั้งค่า — ใช้ API URL / Key เดียวกับ MADD Rate Quote (หรือ MADD Tracking)
ปลั๊กอินเรียก (จาก Server, เก็บผล 6 ชั่วโมง; เรียกไม่ได้ = แสดงตารางที่กรอกไว้แทน):

  GET {API URL}/public/v1/rate-book
  Authorization: Bearer {API Key}

ระบบ MADD ต้องตอบ 200 แบบนี้ (ราคาขายรวม Mark-up แล้ว — ห้ามมีต้นทุน / เลขบัญชี Carrier):

  {
    "updated_at": "June 2026",
    "books": [
      {
        "id": "special",
        "title": "Special Rate — Air Door to Door",
        "note": "*800 THB minimum may be charged for remote areas",
        "zones": [
          { "name": "Zone 1", "countries": ["Hong Kong", "Malaysia", "Macau", "Singapore"] },
          { "name": "JP KR",  "countries": ["Japan", "South Korea"] }
        ],
        "rows": [
          { "label": "0.50", "prices": [1067, 1505] },
          { "label": "1.00", "prices": [1089, 1549] }
        ]
      }
    ]
  }

- prices เรียงตามลำดับ zones · ไม่มีราคา = null
- ตั้งสิทธิ์ใน MADD › Public API ให้ Key นี้อ่าน rate-book ได้
