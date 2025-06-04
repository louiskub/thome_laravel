<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8" />
    <title>เปรียบเทียบสเปคบ้าน</title>
    <style>
        body {
            font-family: Tahoma, sans-serif;
            margin: 20px;
            background: #f4f7f8;
            color: #333;
        }
        h2 {
            color: #34495e;
            margin-bottom: 15px;
        }
        .house-list {
            max-width: 900px;
            margin-bottom: 30px;
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .house-item {
            background: white;
            padding: 12px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
            width: 190px;
            cursor: pointer;
            user-select: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: background 0.3s;
        }
        .house-item:hover {
            background: #e1f0ff;
        }
        .house-item input {
            margin-bottom: 10px;
            cursor: pointer;
            transform: scale(1.2);
        }
        .house-image {
            width: 160px;
            height: 110px;
            object-fit: cover;
            border-radius: 6px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
        }
        button {
            padding: 12px 28px;
            background-color: #2980b9;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #1c5980;
        }
        .comparison-table {
            max-width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            background: white;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
            font-size: 14px;
        }
        .comparison-table th, .comparison-table td {
            border: 1px solid #ddd;
            padding: 12px 10px;
            text-align: center;
            vertical-align: middle;
        }
        .comparison-table th {
            background-color: #2980b9;
            color: white;
            font-weight: 600;
        }
        .comparison-table td:first-child {
            text-align: left;
            font-weight: 600;
            background-color: #f9f9f9;
            width: 220px;
        }
        .highlight {
            background-color: #f9e79f;
        }
        img.spec-image {
            width: 120px;
            height: 80px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        /* Scroll horizontal for wide tables */
        #result {
            overflow-x: auto;
            padding-bottom: 20px;
        }
    </style>
</head>
<body>

    <h2>เลือกบ้านเพื่อเปรียบเทียบสเปค</h2>

    <form id="compareForm" onsubmit="event.preventDefault(); compareHouses();">
        <div id="houseList" class="house-list">
            <!-- รายการบ้านจะโหลดจาก API ด้วย JS -->
        </div>

        <button type="submit">เปรียบเทียบ</button>
    </form>

    <div id="result"></div>

<script>
    async function fetchHouses() {
        try {
            const response = await fetch('/api/houses');
            const data = await response.json();
            return data;
        } catch (err) {
            alert('ไม่สามารถโหลดข้อมูลบ้านได้');
            return [];
        }
    }

    function renderHouseList(houses) {
        const container = document.getElementById('houseList');
        container.innerHTML = '';

        houses.forEach(house => {
            const div = document.createElement('div');
            div.className = 'house-item';

            div.innerHTML = `
                <input type="checkbox" name="houses" value="${house.id}" id="house-${house.id}">
                <label for="house-${house.id}">
                    ${house.image_url ? `<img class="house-image" src="${house.image_url}" alt="${house.name}">` : ''}
                    <div><strong>${house.name}</strong></div>
                    <div style="font-size: 13px; color: #666;">${house.location || '-'}</div>
                </label>
            `;
            container.appendChild(div);
        });
    }

    function compareHouses() {
        const checkedBoxes = [...document.querySelectorAll('input[name="houses"]:checked')];
        if (checkedBoxes.length < 2) {
            alert('กรุณาเลือกบ้านอย่างน้อย 2 หลังเพื่อเปรียบเทียบ');
            return;
        }

        fetch('/api/houses')
            .then(res => res.json())
            .then(housesData => {
                // ดึงข้อมูลบ้านที่เลือก
                const selectedHouses = checkedBoxes.map(box => {
                    return housesData.find(h => h.id == box.value);
                });

                // สร้างตารางเปรียบเทียบ
                let html = `<h2>ผลการเปรียบเทียบบ้าน</h2>`;
                html += `<table class="comparison-table"><thead><tr>
                    <th>สเปค</th>`;

                selectedHouses.forEach(house => {
                    html += `<th>${house.name}</th>`;
                });

                html += `</tr></thead><tbody>`;

                // เพิ่มรายการสเปคใหม่ ๆ ที่คุณต้องการ
                const specs = [
                    { label: 'รูปภาพ', key: 'image_url', isImage: true },
                    { label: 'ห้องนอน', key: 'bedrooms' },
                    { label: 'ห้องน้ำ', key: 'bathrooms' },
                    { label: 'พื้นที่ (ตร.ม.)', key: 'area' },
                    { label: 'ที่จอดรถ (คัน)', key: 'car_park' },
                    { label: 'ที่ตั้ง', key: 'location' },
                    { label: 'ประเภทบ้าน', key: 'type' },
                    { label: 'จำนวนชั้น', key: 'floors' },
                    { label: 'ปีที่สร้าง', key: 'year_built' },
                    { label: 'สถานที่ใกล้เคียง', key: 'nearby_places' },
                    // สุขาภิบาล
                    { label: 'ถังบำบัดน้ำเสีย (Septic Tank)', key: 'septic_tank' },
                    { label: 'บ่อพักดักกลิ่น (Order Trap)', key: 'order_trap' },
                    { label: 'ถังดักไขมัน (Grease Trap)', key: 'grease_trap' },
                    { label: 'แทงค์น้ำ (Water Tank)', key: 'water_tank' },
                    { label: 'ปั้มน้ำอัตโนมัติ (Water Pump)', key: 'water_pump' },
                    { label: 'ระบบท่อปลวก (Pipe Termites)', key: 'pipe_termites' },
                    // หลังคา
                    { label: 'หลังคาโซลาร์เซลล์ (Solar Roof)', key: 'solar_roof' },
                    { label: 'ฉนวนกันความร้อน (Insulation)', key: 'insulation' },
                    { label: 'ระบบระบายความร้อน (Roof Tile Ventilator)', key: 'roof_tile_ventilator' },
                    // ไฟฟ้า
                    { label: 'มิเตอร์ไฟฟ้า (Electric Meter)', key: 'electric_meter' },
                    { label: 'เมนเบรกเกอร์ไฟ (Main Breaker)', key: 'main_breaker' },
                    { label: 'ระบบป้องกันไฟดูด (Residual Current Device)', key: 'residual_current_device' },
                    { label: 'เครื่องชาร์ทรถยนต์ไฟฟ้า (EV Charger)', key: 'ev_charger' },
                    { label: 'ไฟฉุกเฉิน (Emergency Light)', key: 'emergency_light' },
                    { label: 'มอเตอร์ประตูรั้ว (Door Automatic)', key: 'door_automatic' },
                    { label: 'เครื่องตรวจจับควัน (Smoke Detector)', key: 'smoke_detector' },
                    { label: 'เบรกเกอร์กันดูดชั้น 1 (RCDs Breaker 1st floor)', key: 'rcd_breaker_1' },
                    { label: 'เบรกเกอร์กันดูดชั้น 2 (RCDs Breaker 2nd floor)', key: 'rcd_breaker_2' },
                    { label: 'เครื่องตรวจจับความร้อน (Heat Detector)', key: 'heat_detector' },
                    { label: 'ระบบสมาร์ทโฮม (Smart Home)', key: 'smart_home' },
                    { label: 'ระบบรักษาความปลอดภัย (Security Home System)', key: 'security_home_system' },
                    { label: 'กล้องวงจรปิด (CCTV Camera)', key: 'cctv_camera' },
                    { label: 'กริ่งบ้าน (Door bell)', key: 'door_bell' },
                    { label: 'ปลั๊กไฟ-สวิตซ์ (Plug & Switch)', key: 'plug_switch' },
                    { label: 'ประตูโรงรถ (Garage Door)', key: 'garage_door' },
                ];

                specs.forEach(spec => {
                    html += `<tr><td>${spec.label}</td>`;

                    selectedHouses.forEach(house => {
                        let val = house[spec.key];

                        // กรณี boolean (มี/ไม่มี) แ
