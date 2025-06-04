<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ระบบแอดมิน - จัดการบ้าน</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Kanit', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #e0f7fa, #f1f8e9);
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 40px 20px;
        }

        h2 {
            color: #2c3e50;
            margin-bottom: 10px;
            border-left: 6px solid #2196F3;
            padding-left: 12px;
        }

        .success {
            color: #2e7d32;
            background-color: #c8e6c9;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        form {
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            margin-bottom: 40px;
        }

        form input,
        form textarea,
        form button {
            width: 100%;
            padding: 10px 12px;
            margin-top: 10px;
            margin-bottom: 20px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        form label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        form button {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form button:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        th {
            background-color: #2196F3;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        img {
            border-radius: 6px;
            max-height: 100px;
            max-width: 150px;
            object-fit: cover;
        }

        .no-data {
            text-align: center;
            color: #888;
            padding: 20px;
        }

        @media (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }

            thead {
                display: none;
            }

            td {
                position: relative;
                padding-left: 50%;
                border: none;
                border-bottom: 1px solid #eee;
            }

            td::before {
                content: attr(data-label);
                position: absolute;
                left: 15px;
                top: 14px;
                font-weight: bold;
                color: #444;
            }
/* Container and Section Title */
.section-title {
  font-size: 1.6rem;
  font-weight: 700;
  color: #2c3e50;
  border-bottom: 3px solid #3498db;
  padding-bottom: 6px;
  margin-bottom: 20px;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Feature Group Box */
.feature-group {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
}

.feature-item {
  display: flex;
  align-items: center;   /* กึ่งกลางแนวตั้ง */
  gap: 12px;
  background: #f9faff;
  border-radius: 8px;
  padding: 14px 18px;
  box-shadow: 0 2px 6px rgb(0 0 0 / 0.08);
  flex: 1 1 280px;
  min-width: 280px;
}

/* label เป็น flex row เรียง checkbox + text ต่อกัน */
.feature-item > label {
  display: flex;
  align-items: center;   /* checkbox กับ text อยู่กลางแนวตั้ง */
  gap: 8px;
  font-weight: 600;
  color: #34495e;
  cursor: pointer;
  user-select: none;
  white-space: nowrap;
  flex-shrink: 0;        /* กัน label ย่อเกินไป */
}

/* checkbox ขนาดกำลังดี และไม่มี margin กวน */
.feature-item input[type="checkbox"] {
  width: 20px;
  height: 20px;
  margin: 0;
  accent-color: #3498db;
}

/* input text ขยายเต็มพื้นที่ที่เหลือ */
.feature-item > input[type="text"] {
  flex-grow: 1;
  padding: 8px 12px;
  font-size: 0.95rem;
  border: 1.5px solid #d1d9e6;
  border-radius: 6px;
  outline-offset: 2px;
  transition: border-color 0.3s ease;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  color: #2c3e50;
  min-width: 0;
}




/* Text input placeholder */
.feature-item input[type="text"]::placeholder {
  color: #9aa5b1;
  font-style: italic;
}

/* On text input focus */
.feature-item input[type="text"]:focus {
  border-color: #3498db;
  box-shadow: 0 0 8px rgb(52 152 219 / 0.3);
}

/* Hover effect on feature item */
.feature-item:hover {
  background-color: #eaf3fc;
}

/* Responsive tweak */
@media (max-width: 600px) {
  .feature-group {
    flex-direction: column;
    gap: 16px;
  }

  .feature-item {
    flex-basis: 100%;
  }
}





        }
    </style>
</head>
<body>

<div class="container">
    <h2>เพิ่มข้อมูลบ้านใหม่</h2>

    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif
        

    <form method="POST" action="{{ route('admin.houses.store') }}" enctype="multipart/form-data">
        @csrf
        <label>ชื่อบ้าน</label>
        <input type="text" name="name" placeholder="ชื่อบ้าน" required>

        <label>จำนวนห้องนอน</label>
        <input type="number" name="bedrooms" placeholder="จำนวนห้องนอน" required>

        <label>จำนวนห้องน้ำ</label>
        <input type="number" name="bathrooms" placeholder="จำนวนห้องน้ำ" required>

        <label>พื้นที่ใช้สอย (ตร.ม.)</label>
        <input type="number" name="area" placeholder="พื้นที่ใช้สอย (ตร.ม.)" required>

        <label>ที่จอดรถ (คัน)</label>
        <input type="number" name="car_park" placeholder="จำนวนที่จอดรถ" required>

        <label>ที่ตั้งบ้าน</label>
        <input type="text" name="location" placeholder="ที่ตั้งบ้าน" required>

        <label>ประเภทบ้าน</label>
        <input type="text" name="type" placeholder="เช่น บ้านเดี่ยว, ทาวน์โฮม">

        <label>จำนวนชั้น</label>
        <input type="number" name="floors" placeholder="จำนวนชั้น">

        <label>ปีที่สร้าง</label>
        <input type="number" name="year_built" placeholder="ปีที่สร้าง">

        <label>สถานที่ใกล้เคียง</label>
        <textarea name="nearby_places" placeholder="เช่น โรงเรียน, ห้าง, รถไฟฟ้า (คั่นด้วย ,)" rows="3"></textarea>

        <label>รูปภาพบ้าน</label>
        <input type="file" name="image">
        
       <!-- ระบบสุขาภิบาล -->
<h2 class="section-title">ระบบสุขาภิบาล</h2>
<div class="feature-group">
    <div class="feature-item">
        <label><input type="checkbox" name="has_septic_tank"> ถังบำบัดน้ำเสีย</label>
        <input type="text" name="spec_septic_tank" placeholder="รายละเอียดถังบำบัดน้ำเสีย">
    </div>

    <div class="feature-item">
        <label><input type="checkbox" name="has_order_trap"> บ่อดักกลิ่น</label>
        <input type="text" name="spec_order_trap" placeholder="รายละเอียดบ่อดักกลิ่น">
    </div>
    <div class="feature-item">
        <label><input type="checkbox" name="has_grase_trap"> บ่อดักไขมัน</label>
        <input type="text" name="spec_grase_trap" placeholder="รายละเอียดบ่อดักไขมัน">
    </div>
    <div class="feature-item">
        <label><input type="checkbox" name="has_water_tank"> ถังเก็บน้ำ</label>
        <input type="text" name="spec_water_tank" placeholder="รายละเอียดถังเก็บน้ำ">
    </div>
    <div class="feature-item">
        <label><input type="checkbox" name="has_water_pump"> ปั๊มน้ำ</label>
        <input type="text" name="spec_water_pump" placeholder="รายละเอียดปั๊มน้ำ">
    </div>
    <div class="feature-item">
        <label><input type="checkbox" name="has_pipe_termites"> ท่อกำจัดปลวก</label>
        <input type="text" name="spec_pipe_termites" placeholder="รายละเอียดท่อกำจัดปลวก">
    </div>
</div>

<!-- ระบบหลังคา -->
<h2 class="section-title">ระบบหลังคา</h2>
<div class="feature-group">
    <div class="feature-item">
        <label><input type="checkbox" name="has_solar_roof"> Solar Roof</label>
        <input type="text" name="spec_solar_roof" placeholder="รายละเอียด Solar Roof">
    </div>
    <div class="feature-item">
        <label><input type="checkbox" name="has_insulation"> ฉนวนกันความร้อน</label>
        <input type="text" name="spec_insulation" placeholder="รายละเอียดฉนวนกันความร้อน">
    </div>
    <div class="feature-item">
        <label><input type="checkbox" name="has_roof_ventilator"> พัดลมระบายอากาศ</label>
        <input type="text" name="spec_roof_ventilator" placeholder="รายละเอียดพัดลมระบายอากาศ">
    </div>
</div>

<!-- ระบบไฟฟ้า -->
<h2 class="section-title">ระบบไฟฟ้า</h2>
<div class="feature-group">
    <div class="feature-item">
        <label><input type="checkbox" name="has_electric_meter"> มิเตอร์ไฟฟ้า</label>
        <input type="text" name="spec_electric_meter" placeholder="รายละเอียดมิเตอร์ไฟฟ้า">
    </div>
    <div class="feature-item">
        <label><input type="checkbox" name="has_main_breaker"> เมนเบรกเกอร์</label>
        <input type="text" name="spec_main_breaker" placeholder="รายละเอียดเมนเบรกเกอร์">
    </div>
    <div class="feature-item">
        <label><input type="checkbox" name="has_rcd"> ระบบ RCD</label>
        <input type="text" name="spec_rcd" placeholder="รายละเอียดระบบ RCD">
    </div>
    <div class="feature-item">
        <label><input type="checkbox" name="has_rcd_1st"> RCD ชั้น 1</label>
        <input type="text" name="spec_rcd_1st" placeholder="รายละเอียด RCD ชั้น 1">
    </div>
    <div class="feature-item">
        <label><input type="checkbox" name="has_rcd_2nd"> RCD ชั้น 2</label>
        <input type="text" name="spec_rcd_2nd" placeholder="รายละเอียด RCD ชั้น 2">
    </div>
    <div class="feature-item">
        <label><input type="checkbox" name="has_ev_charger"> EV Charger</label>
        <input type="text" name="spec_ev_charger" placeholder="รายละเอียด EV Charger">
    </div>
    <div class="feature-item">
        <label><input type="checkbox" name="has_emergency_light"> ไฟฉุกเฉิน</label>
        <input type="text" name="spec_emergency_light" placeholder="รายละเอียดไฟฉุกเฉิน">
    </div>
    <div class="feature-item">
        <label><input type="checkbox" name="has_door_automatic"> ประตูอัตโนมัติ</label>
        <input type="text" name="spec_door_automatic" placeholder="รายละเอียดประตูอัตโนมัติ">
    </div>
    <div class="feature-item">
        <label><input type="checkbox" name="has_smoke_detector"> Smoke Detector</label>
        <input type="text" name="spec_smoke_detector" placeholder="รายละเอียด Smoke Detector">
    </div>
    <div class="feature-item">
        <label><input type="checkbox" name="has_heat_detector"> Heat Detector</label>
        <input type="text" name="spec_heat_detector" placeholder="รายละเอียด Heat Detector">
    </div>
    <div class="feature-item">
        <label><input type="checkbox" name="has_smart_home"> ระบบ Smart Home</label>
        <input type="text" name="spec_smart_home" placeholder="รายละเอียดระบบ Smart Home">
    </div>
    <div class="feature-item">
        <label><input type="checkbox" name="has_security_system"> ระบบรักษาความปลอดภัย</label>
        <input type="text" name="spec_security_system" placeholder="รายละเอียดระบบรักษาความปลอดภัย">
    </div>
    <div class="feature-item">
        <label><input type="checkbox" name="has_cctv"> CCTV</label>
        <input type="text" name="spec_cctv" placeholder="รายละเอียด CCTV">
    </div>
    <div class="feature-item">
        <label><input type="checkbox" name="has_door_bell"> กริ่งประตู</label>
        <input type="text" name="spec_door_bell" placeholder="รายละเอียดกริ่งประตู">
    </div>
    <div class="feature-item">
        <label><input type="checkbox" name="has_plug_switch"> ปลั๊กและสวิตช์</label>
        <input type="text" name="spec_plug_switch" placeholder="รายละเอียดปลั๊กและสวิตช์">
    </div>
    <div class="feature-item">
        <label><input type="checkbox" name="has_garage_door"> ประตูโรงรถอัตโนมัติ</label>
        <input type="text" name="spec_garage_door" placeholder="รายละเอียดประตูโรงรถอัตโนมัติ">
    </div>
</div>


        


        <button type="submit">บันทึกข้อมูล</button>
    </form> 

    

    

    <h2>รายการบ้านทั้งหมด</h2>

    @if(count($houses) > 0)
        <table>
            <thead>
                <tr>
                    <th>ชื่อบ้าน</th>
                    <th>ห้องนอน</th>
                    <th>ห้องน้ำ</th>
                    <th>พื้นที่</th>
                    <th>ที่จอดรถ</th>
                    <th>ที่ตั้ง</th>
                    <th>ประเภท</th>
                    <th>ชั้น</th>
                    <th>ปีที่สร้าง</th>
                    <th>สถานที่ใกล้เคียง</th>
                    <th>รูปภาพ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($houses as $house)
                <tr>
                    <td data-label="ชื่อบ้าน">{{ $house->name }}</td>
                    <td data-label="ห้องนอน">{{ $house->bedrooms }}</td>
                    <td data-label="ห้องน้ำ">{{ $house->bathrooms }}</td>
                    <td data-label="พื้นที่">{{ $house->area }} ตร.ม.</td>
                    <td data-label="ที่จอดรถ">{{ $house->car_park }}</td>
                    <td data-label="ที่ตั้ง">{{ $house->location }}</td>
                    <td data-label="ประเภท">{{ $house->type ?? '-' }}</td>
                    <td data-label="ชั้น">{{ $house->floors ?? '-' }}</td>
                    <td data-label="ปีที่สร้าง">{{ $house->year_built ?? '-' }}</td>
                    <td data-label="ใกล้สถานที่">
                        @if($house->nearby_places)
                            {!! nl2br(e($house->nearby_places)) !!}
                        @else
                            -
                        @endif
                    </td>
                    <td data-label="รูปภาพ">
                        @if ($house->image)
                            <img src="{{ asset('storage/' . $house->image) }}" alt="House image">
                        @else
                            ไม่มีรูป
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="no-data">ยังไม่มีข้อมูลบ้านในระบบ</p>
    @endif
</div>

</body>
</html>
