@extends('layouts.layout_home')

@section('content')
    <!DOCTYPE html>
    <html lang="th">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>บริการบ้าน - ตรวจบ้าน ต่อเติม ตกแต่ง</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/css/home/aboutus/ourteam.css">
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Sarabun', sans-serif;
                background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
                min-height: 100vh;
            }

            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 20px;
            }

            /* Header Styles */
            .main-header {
                text-align: center;
                margin-bottom: 40px;
            }

            .title {
                font-size: 2.5rem;
                font-weight: 700;
                color: #2c3e50;
                margin-bottom: 10px;
            }

            .title-underline {
                width: 100px;
                height: 4px;
                background: linear-gradient(45deg, #3498db, #2980b9);
                margin: 0 auto;
                border-radius: 2px;
            }

            /* Service Selection */
            .service-selection {
                display: flex;
                justify-content: center;
                gap: 20px;
                margin-bottom: 40px;
                flex-wrap: wrap;
            }

            .service-btn {
                padding: 15px 30px;
                border: none;
                border-radius: 25px;
                font-size: 1.1rem;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                background: linear-gradient(135deg, #3498db, #2980b9);
                color: white;
            }

            .service-btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            }

            .service-btn.active {
                transform: scale(1.05);
                background: linear-gradient(135deg, #2980b9, #1f4e79);
            }

            /* Service Content */
            .service-content {
                display: none;
            }

            .service-content.active {
                display: block;
            }

            /* Role Filter Styles */
            .role-filter-container {
                background: white;
                border-radius: 15px;
                padding: 25px;
                margin-bottom: 30px;
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            }

            .role-filter-header {
                text-align: center;
                margin-bottom: 20px;
            }

            .role-filter-header h3 {
                color: #2c3e50;
                font-size: 1.3rem;
                margin-bottom: 10px;
            }

            .role-filter-header i {
                font-size: 1.5rem;
                color: #3498db;
            }

            .role-filter-tabs {
                display: flex;
                justify-content: center;
                gap: 15px;
                flex-wrap: wrap;
                margin-bottom: 20px;
            }

            .role-filter-btn {
                padding: 12px 25px;
                border: 2px solid #3498db;
                border-radius: 25px;
                background: white;
                color: #3498db;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
            }

            .role-filter-btn::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(135deg, #3498db, #2980b9);
                transition: left 0.3s ease;
                z-index: 0;
            }

            .role-filter-btn span {
                position: relative;
                z-index: 1;
            }

            .role-filter-btn.active::before,
            .role-filter-btn:hover::before {
                left: 0;
            }

            .role-filter-btn.active,
            .role-filter-btn:hover {
                color: white;
                transform: translateY(-2px);
            }

            /* Department Filter */
            .filter-container {
                background: #f8f9fa;
                border-radius: 15px;
                padding: 20px;
                margin-bottom: 30px;
                box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
            }

            .filter-header {
                text-align: center;
                margin-bottom: 15px;
            }

            .filter-header i {
                font-size: 1.2rem;
                color: #6c757d;
            }

            .filter-tabs {
                display: flex;
                justify-content: center;
                gap: 10px;
                flex-wrap: wrap;
            }

            .filter-btn {
                padding: 8px 18px;
                border: 1px solid #dee2e6;
                border-radius: 20px;
                background: white;
                color: #6c757d;
                font-weight: 500;
                cursor: pointer;
                transition: all 0.3s ease;
                font-size: 0.9rem;
            }

            .filter-btn.active,
            .filter-btn:hover {
                background: #e9ecef;
                color: #495057;
                transform: translateY(-1px);
            }

            /* Management Section Styles */
            .management-section {
                margin-bottom: 50px;
            }

            .management-header {
                display: flex;
                align-items: center;
                gap: 20px;
                margin-bottom: 30px;
                padding: 20px;
                background: linear-gradient(135deg, #8e44ad, #9b59b6);
                border-radius: 15px;
                color: white;
            }

            .management-header i {
                font-size: 2rem;
            }

            .management-title {
                font-size: 2rem;
                font-weight: 700;
                margin: 0;
            }

            .management-subtitle {
                font-size: 1rem;
                opacity: 0.9;
                margin: 5px 0 0 0;
            }

            .management-count {
                background: rgba(255, 255, 255, 0.2);
                padding: 8px 16px;
                border-radius: 20px;
                font-weight: 600;
                margin-left: auto;
            }

            /* Staff Section Styles */
            .staff-section {
                margin-bottom: 40px;
            }

            .department-header {
                display: flex;
                align-items: center;
                gap: 15px;
                margin-bottom: 25px;
                padding: 15px;
                background: white;
                border-radius: 12px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            }

            .department-title {
                font-size: 1.6rem;
                font-weight: 600;
                color: #2c3e50;
            }

            .department-line {
                flex: 1;
                height: 2px;
                background: linear-gradient(45deg, #3498db, #2980b9);
                border-radius: 2px;
            }

            .department-count {
                background: #3498db;
                color: white;
                padding: 5px 15px;
                border-radius: 15px;
                font-weight: 600;
                font-size: 0.9rem;
            }

            /* Team Grid */
            .team-grid {
                display: grid;
                gap: 25px;
                margin-bottom: 30px;
            }

            /* Management Grid - Fixed 3 columns horizontal layout */
            .management-grid {
                display: grid;
                grid-template-columns: 1fr 1fr 1fr; /* Fixed 3 equal columns instead of responsive */
                gap: 2rem;
                max-width: 1200px;
                margin: 0 auto;
            }

            /* Staff Grid - Regular cards */
            .staff-grid {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            }

            /* Management Card Styles */
            .management-card {
                background: white;
                border-radius: 20px;
                overflow: hidden;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
                transition: all 0.3s ease;
                cursor: pointer;
                position: relative;
                border: 2px solid transparent;
            }

            .management-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
                border-color: #8e44ad;
            }

            .management-card .card-image {
                height: 300px;
                position: relative;
                overflow: hidden;
            }

            .management-card .image-overlay {
                background: linear-gradient(to bottom, transparent 0%, rgba(142, 68, 173, 0.8) 100%);
            }

            .management-card .department-badge {
                background: rgba(142, 68, 173, 0.9);
                color: white;
                padding: 6px 14px;
                border-radius: 20px;
                font-size: 0.85rem;
                font-weight: 600;
            }

            .management-card .card-content {
                padding: 25px;
            }

            .management-card .view-profile-btn {
                background: rgba(142, 68, 173, 0.9);
                width: 45px;
                height: 45px;
            }

            /* Regular Team Card Styles */
            .team-card {
                background: white;
                border-radius: 15px;
                overflow: hidden;
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease;
                cursor: pointer;
                position: relative;
            }

            .team-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            }

            .card-image {
                position: relative;
                height: 250px;
                overflow: hidden;
            }

            .card-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.3s ease;
            }

            .team-card:hover .card-image img,
            .management-card:hover .card-image img {
                transform: scale(1.05);
            }

            .image-overlay {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.7) 100%);
                z-index: 1;
            }

            .card-image-content {
                position: absolute;
                bottom: 20px;
                left: 20px;
                right: 20px;
                z-index: 2;
                color: white;
            }

            .department-badge {
                display: inline-block;
                padding: 5px 12px;
                background: rgba(52, 152, 219, 0.9);
                border-radius: 15px;
                font-size: 0.8rem;
                font-weight: 600;
                margin-bottom: 8px;
            }

            .card-image-content h3 {
                font-size: 1.3rem;
                font-weight: 600;
                margin-bottom: 5px;
            }

            .management-card .card-image-content h3 {
                font-size: 1.5rem;
            }

            .card-image-content p {
                font-size: 0.9rem;
                opacity: 0.9;
            }

            .card-content {
                padding: 20px;
            }

            .contact-info {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 15px;
                color: #7f8c8d;
            }

            .contact-info i {
                width: 16px;
                color: #3498db;
            }

            .skills {
                display: flex;
                gap: 8px;
                flex-wrap: wrap;
            }

            .skill-badge {
                background: #ecf0f1;
                color: #2c3e50;
                padding: 5px 12px;
                border-radius: 12px;
                font-size: 0.8rem;
                font-weight: 500;
            }

            .view-profile-btn {
                position: absolute;
                top: 15px;
                right: 15px;
                background: rgba(52, 152, 219, 0.9);
                color: white;
                border: none;
                border-radius: 50%;
                width: 40px;
                height: 40px;
                cursor: pointer;
                transition: all 0.3s ease;
                z-index: 3;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .view-profile-btn:hover {
                background: #2980b9;
                transform: scale(1.1);
            }

            /* Enhanced Modal Styles */
            .modal {
                display: none;
                position: fixed;
                z-index: 1000;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                backdrop-filter: blur(5px);
                animation: fadeIn 0.3s ease;
            }

            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }

            .modal-content {
                background-color: white;
                margin: 2% auto;
                padding: 0;
                border-radius: 20px;
                width: 90%;
                max-width: 900px;
                max-height: 90vh;
                overflow-y: auto;
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
                animation: slideIn 0.3s ease;
            }

            @keyframes slideIn {
                from { 
                    opacity: 0;
                    transform: translateY(-50px) scale(0.9);
                }
                to { 
                    opacity: 1;
                    transform: translateY(0) scale(1);
                }
            }

            .close-modal {
                position: absolute;
                right: 20px;
                top: 20px;
                font-size: 2rem;
                font-weight: bold;
                cursor: pointer;
                z-index: 10;
                color: white;
                text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
                transition: all 0.3s ease;
            }

            .close-modal:hover {
                transform: scale(1.2);
                color: #ff6b6b;
            }

            .modal-header {
                background: linear-gradient(135deg, #3498db, #2980b9);
                color: white;
                padding: 40px;
                text-align: center;
                position: relative;
                overflow: hidden;
            }

            .modal-header.management {
                background: linear-gradient(135deg, #8e44ad, #9b59b6);
            }

            .modal-header::before {
                content: '';
                position: absolute;
                top: -50%;
                left: -50%;
                width: 200%;
                height: 200%;
                background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
                animation: float 6s ease-in-out infinite;
            }

            .modal-header h2 {
                font-size: 2.2rem;
                margin-bottom: 10px;
                position: relative;
                z-index: 1;
            }

            .modal-header p {
                font-size: 1.1rem;
                opacity: 0.9;
                position: relative;
                z-index: 1;
            }

            .modal-body {
                padding: 40px;
            }

            .modal-profile {
                display: grid;
                grid-template-columns: 1fr 2fr;
                gap: 40px;
            }

            .modal-avatar {
                text-align: center;
            }

            .modal-avatar img {
                width: 100%;
                max-width: 300px;
                border-radius: 20px;
                margin-bottom: 20px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            }

            .modal-contact {
                background: #f8f9fa;
                padding: 20px;
                border-radius: 15px;
                margin-top: 20px;
            }

            .modal-contact-item {
                display: flex;
                align-items: center;
                gap: 15px;
                margin-bottom: 15px;
                color: #2c3e50;
                font-weight: 500;
            }

            .modal-contact-item i {
                width: 20px;
                color: #3498db;
                font-size: 1.1rem;
            }

            .modal-contact-item:last-child {
                margin-bottom: 0;
            }

            .modal-section {
                margin-bottom: 30px;
            }

            .modal-section h3 {
                color: #2c3e50;
                margin-bottom: 15px;
                display: flex;
                align-items: center;
                gap: 10px;
                font-size: 1.3rem;
                border-bottom: 2px solid #ecf0f1;
                padding-bottom: 10px;
            }

            .modal-section h3 i {
                color: #3498db;
            }

            .modal-section p {
                line-height: 1.6;
                color: #555;
            }

            .modal-section ul {
                list-style: none;
                padding: 0;
            }

            .modal-section ul li {
                padding: 8px 0;
                border-bottom: 1px solid #ecf0f1;
                position: relative;
                padding-left: 25px;
            }

            .modal-section ul li:before {
                content: '✓';
                position: absolute;
                left: 0;
                color: #27ae60;
                font-weight: bold;
            }

            .modal-skills {
                display: flex;
                gap: 10px;
                flex-wrap: wrap;
            }

            .modal-skills .skill-badge {
                background: linear-gradient(135deg, #3498db, #2980b9);
                color: white;
                padding: 8px 16px;
                border-radius: 20px;
                font-weight: 500;
            }

            .modal-footer {
                padding: 30px 40px;
                text-align: center;
                border-top: 1px solid #ecf0f1;
                background: #f8f9fa;
            }

            .action-buttons {
                display: flex;
                gap: 15px;
                justify-content: center;
                flex-wrap: wrap;
            }

            .action-btn {
                padding: 12px 25px;
                border: none;
                border-radius: 25px;
                cursor: pointer;
                font-weight: 600;
                transition: all 0.3s ease;
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                gap: 8px;
            }

            .contact-btn {
                background: #27ae60;
                color: white;
            }

            .contact-btn:hover {
                background: #219a52;
                transform: translateY(-2px);
            }

            .close-btn {
                background: #e74c3c;
                color: white;
            }

            .close-btn:hover {
                background: #c0392b;
                transform: translateY(-2px);
            }

            .loading-spinner {
                display: none;
                text-align: center;
                padding: 40px;
            }

            .spinner {
                border: 3px solid #f3f3f3;
                border-top: 3px solid #3498db;
                border-radius: 50%;
                width: 40px;
                height: 40px;
                animation: spin 1s linear infinite;
                margin: 0 auto 15px;
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }

            @keyframes float {
                0%, 100% { transform: translateY(0px) rotate(0deg); }
                50% { transform: translateY(-20px) rotate(180deg); }
            }

            /* Responsive Design */
            @media (max-width: 768px) {
                .title {
                    font-size: 2rem;
                }

                .service-selection {
                    flex-direction: column;
                    align-items: center;
                }

                .service-btn {
                    width: 100%;
                    max-width: 300px;
                }

                .role-filter-tabs,
                .filter-tabs {
                    flex-direction: column;
                    align-items: center;
                }

                .role-filter-btn,
                .filter-btn {
                    width: 100%;
                    max-width: 200px;
                }

                /* Remove this line for management, keep only for staff */
                /* .management-grid, */
                /* .staff-grid { */
                /*     grid-template-columns: 1fr; */
                /* } */
                
                /* Only staff grid becomes single column on mobile */
                .staff-grid {
                    grid-template-columns: 1fr; 
                }

                .modal-profile {
                    grid-template-columns: 1fr;
                    gap: 20px;
                }

                .modal-body {
                    padding: 20px;
                }

                .modal-header {
                    padding: 30px 20px;
                }

                .modal-header h2 {
                    font-size: 1.8rem;
                }

                .management-header {
                    flex-direction: column;
                    text-align: center;
                    gap: 15px;
                }

                .management-count {
                    margin-left: 0;
                }

                .department-header {
                    flex-direction: column;
                    text-align: center;
                    gap: 10px;
                }

                .department-line {
                    width: 100px;
                    margin: 0 auto;
                }

                .action-buttons {
                    flex-direction: column;
                    align-items: center;
                }

                .action-btn {
                    width: 100%;
                    max-width: 200px;
                    justify-content: center;
                }

                /* Ensure management grid stays horizontal on all screen sizes */
                .management-grid {
                    grid-template-columns: 1fr 1fr 1fr; /* Keep 3 columns even on mobile */
                    gap: 1rem; /* Reduce gap on mobile */
                    max-width: 100%;
                }
                
                .management-card {
                    font-size: 0.9rem; /* Slightly smaller text on mobile */
                }
                
                .management-card .card-image-content h3 {
                    font-size: 1rem; /* Smaller name text on mobile */
                }
            }

            /* Hidden class for filtering */
            .hidden {
                display: none !important;
            }

            /* Animation classes */
            .team-card,
            .management-card {
                animation: fadeInUp 0.6s ease forwards;
                opacity: 0;
                transform: translateY(30px);
            }

            .team-card:nth-child(1),
            .management-card:nth-child(1) { animation-delay: 0.1s; }
            .team-card:nth-child(2),
            .management-card:nth-child(2) { animation-delay: 0.2s; }
            .team-card:nth-child(3),
            .management-card:nth-child(3) { animation-delay: 0.3s; }
            .team-card:nth-child(4),
            .management-card:nth-child(4) { animation-delay: 0.4s; }

            @keyframes fadeInUp {
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        </style>
    </head>

    <body>
        <div class="container">
            <header class="main-header">
                <h1 class="title">{{__('header.ourteam')}}</h1>
                <div class="title-underline"></div>
            </header>

            <!-- Service Selection -->
            <div class="service-selection">
                @foreach ($major as $maj)
                    @if ($loop->first)
                        <button class="service-btn active {{ $maj->theme }}" data-service="{{ $maj->translation }}">
                            {{ $maj->translation }}
                        </button>
                    @else
                        <button class="service-btn {{ $maj->theme }}" data-service="{{ $maj->translation }}">
                            {{ $maj->translation }}
                        </button>
                    @endif
                @endforeach
            </div>

            @foreach ($major as $maj)
                @if($loop->first)
                <div class="service-content {{ $maj->theme }} active" id="{{ $maj->translation }}">
                @else
                <div class="service-content {{ $maj->theme }}" id="{{ $maj->translation }}">
                @endif
                    
                    <!-- Role Filter -->
                    <div class="role-filter-container">
                        <div class="role-filter-header">
                            <h3>เลือกดูตามตำแหน่ง</h3>
                            <i class="fas fa-users-cog"></i>
                        </div>
                        <div class="role-filter-tabs">
                            <button class="role-filter-btn active" data-role="all">
                                <span>ทั้งหมด</span>
                            </button>
                            <button class="role-filter-btn" data-role="management">
                                <span><i class="fas fa-crown"></i> ผู้บริหาร</span>
                            </button>
                            <button class="role-filter-btn" data-role="staff">
                                <span><i class="fas fa-users"></i> พนักงาน</span>
                            </button>
                        </div>
                        
                        <!-- Department Filter -->
                        <div class="filter-container">
                            <div class="filter-header">
                                <i class="fas fa-filter"></i>
                            </div>
                            <div class="filter-tabs">
                                <button class="filter-btn active" data-category="all">ทั้งหมด</button>
                                @foreach ($maj->departments as $department)
                                    <button class="filter-btn"
                                        data-category="{{ $department->translation->name }}">{{ $department->translation->name }}</button>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    @php
                        // แยกพนักงานตามระดับตำแหน่ง
                        $managementPositions = ['ผู้อำนวยการ', 'รองผู้อำนวยการ', 'ผู้จัดการ', 'รองผู้จัดการ', 'หัวหน้าแผนก', 'Director', 'Manager', 'Head', 'Chief'];
                        $managementEmployees = [];
                        $staffEmployees = [];
                        
                        foreach ($maj->departments as $department) {
                            foreach ($department->employees as $employee) {
                                $position = $employee->translation->position ?? '';
                                $isManagement = false;
                                
                                foreach ($managementPositions as $mgmtPos) {
                                    if (stripos($position, $mgmtPos) !== false) {
                                        $isManagement = true;
                                        break;
                                    }
                                }
                                
                                if ($isManagement) {
                                    $managementEmployees[] = [
                                        'employee' => $employee,
                                        'department' => $department
                                    ];
                                } else {
                                    $staffEmployees[] = [
                                        'employee' => $employee,
                                        'department' => $department
                                    ];
                                }
                            }
                        }
                    @endphp

                    <!-- Management Section -->
                    @if(count($managementEmployees) > 0)
                    <section class="management-section" data-role="management">
                        <div class="management-header">
                            <i class="fas fa-crown"></i>
                            <div>
                                <h2 class="management-title">ผู้บริหาร</h2>
                                <p class="management-subtitle">ทีมผู้นำองค์กร</p>
                            </div>
                            <span class="management-count">{{ count($managementEmployees) }} คน</span>
                        </div>
                        <div class="team-grid management-grid">
                            @foreach ($managementEmployees as $item)
                                @php
                                    $employee = $item['employee'];
                                    $department = $item['department'];
                                @endphp
                                <div class="management-card team-card" 
                                     data-id="{{ $employee->id }}" 
                                     data-employee='@json($employee)'
                                     data-category="{{ $department->translation->name }}"
                                     data-role="management">
                                    <button class="view-profile-btn" title="ดูโปรไฟล์">
                                        <i class="fas fa-user"></i>
                                    </button>
                                    <div class="card-image">
                                        <div class="image-overlay"></div>
                                        <img src="{{ $employee->cover_image }}"
                                            alt="{{ $employee->translation->name }}">
                                        <div class="card-image-content">
                                            <span class="department-badge">{{ $department->translation->name }}</span>
                                            <h3>{{ $employee->translation->name }}</h3>
                                            <p>{{ $employee->translation->position }}</p>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="contact-info">
                                            <i class="fas fa-envelope"></i>
                                            <span>{{ $employee->email ?? 'contact@company.com' }}</span>
                                        </div>
                                        <div class="contact-info">
                                            <i class="fas fa-phone"></i>
                                            <span>{{ $employee->phone ?? '+66 89 123 4567' }}</span>
                                        </div>
                                        @if($employee->skills)
                                        <div class="skills">
                                            @foreach(explode(',', $employee->skills) as $skill)
                                                <span class="skill-badge">{{ trim($skill) }}</span>
                                            @endforeach
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    @endif

                    <!-- Staff Sections by Department -->
                    @foreach ($maj->departments as $department)
                        @php
                            $deptStaffEmployees = array_filter($staffEmployees, function($item) use ($department) {
                                return $item['department']->id === $department->id;
                            });
                        @endphp
                        
                        @if(count($deptStaffEmployees) > 0)
                        <section class="staff-section" 
                                 data-category="{{ $department->translation->name }}"
                                 data-role="staff">
                            <div class="department-header">
                                <h2 class="department-title">{{ $department->translation->name }}</h2>
                                <div class="department-line"></div>
                                <span class="department-count">{{ count($deptStaffEmployees) }} {{ __('header.ourteam_professor') }}</span>
                            </div>
                            <div class="team-grid staff-grid">
                                @foreach ($deptStaffEmployees as $item)
                                    @php
                                        $employee = $item['employee'];
                                    @endphp
                                    <div class="team-card" 
                                         data-id="{{ $employee->id }}" 
                                         data-employee='@json($employee)'
                                         data-category="{{ $department->translation->name }}"
                                         data-role="staff">
                                        <button class="view-profile-btn" title="ดูโปรไฟล์">
                                            <i class="fas fa-user"></i>
                                        </button>
                                        <div class="card-image">
                                            <div class="image-overlay"></div>
                                            <img src="{{ $employee->cover_image }}"
                                                alt="{{ $employee->translation->name }}">
                                            <div class="card-image-content">
                                                <span class="department-badge">{{ $department->translation->name }}</span>
                                                <h3>{{ $employee->translation->name }}</h3>
                                                <p>{{ $employee->translation->position }}</p>
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <div class="contact-info">
                                                <i class="fas fa-envelope"></i>
                                                <span>{{ $employee->email ?? 'contact@company.com' }}</span>
                                            </div>
                                            <div class="contact-info">
                                                <i class="fas fa-phone"></i>
                                                <span>{{ $employee->phone ?? '+66 89 123 4567' }}</span>
                                            </div>
                                            @if($employee->skills)
                                            <div class="skills">
                                                @foreach(explode(',', $employee->skills) as $skill)
                                                    <span class="skill-badge">{{ trim($skill) }}</span>
                                                @endforeach
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>

        <!-- Enhanced Modal -->
        <div class="modal" id="profileModal">
            <div class="modal-content">
                <span class="close-modal">&times;</span>
                <div class="loading-spinner" id="modalLoading">
                    <div class="spinner"></div>
                    <p>กำลังโหลดข้อมูล...</p>
                </div>
                <div id="modalContent" style="display: none;">
                    <div class="modal-header" id="modalHeader">
                        <h2 id="modal-name">ชื่อผู้เชี่ยวชาญ</h2>
                        <p id="modal-position">ตำแหน่ง - บริการ</p>
                    </div>
                    <div class="modal-body">
                        <div class="modal-profile">
                            <div class="modal-avatar">
                                <img id="modal-image" src="/placeholder.svg" alt="ผู้เชี่ยวชาญ">
                                <div class="modal-contact">
                                    <div class="modal-contact-item">
                                        <i class="fas fa-envelope"></i>
                                        <span id="modal-email">email@company.com</span>
                                    </div>
                                    <div class="modal-contact-item">
                                        <i class="fas fa-phone"></i>
                                        <span id="modal-phone">+66 89 123 4567</span>
                                    </div>
                                    <div class="modal-contact-item">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span id="modal-location">กรุงเทพมหานคร</span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-info">
                                <div class="modal-section">
                                    <h3><i class="fas fa-user"></i> ประวัติ</h3>
                                    <p id="modal-bio">ผู้เชี่ยวชาญที่มีประสบการณ์และความเชี่ยวชาญในสาขาของตน พร้อมให้บริการด้วยความใส่ใจและคุณภาพสูงสุด</p>
                                </div>
                                <div class="modal-section">
                                    <h3><i class="fas fa-award"></i> ความสำเร็จ</h3>
                                    <ul id="modal-achievements">
                                        <li>มีประสบการณ์ในสาขามากกว่า 10 ปี</li>
                                        <li>ได้รับการรับรองจากหน่วยงานที่เกี่ยวข้อง</li>
                                        <li>ให้บริการลูกค้าด้วยความเป็นมิตรและมืออาชีพ</li>
                                    </ul>
                                </div>
                                <div class="modal-section">
                                    <h3><i class="fas fa-tools"></i> ทักษะ</h3>
                                    <div id="modal-skills" class="modal-skills">
                                        <span class="skill-badge">ทักษะพื้นฐาน</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="action-buttons">
                            <a href="#" class="action-btn contact-btn" id="contactBtn">
                                <i class="fas fa-phone"></i> ติดต่อ
                            </a>
                            <button class="action-btn close-btn" id="closeBtn">
                                <i class="fas fa-times"></i> ปิด
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Service switching functionality
            const serviceButtons = document.querySelectorAll('.service-btn');
            const serviceContents = document.querySelectorAll('.service-content');

            serviceButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const targetService = button.getAttribute('data-service');

                    serviceButtons.forEach(btn => btn.classList.remove('active'));
                    serviceContents.forEach(content => content.classList.remove('active'));

                    button.classList.add('active');
                    document.getElementById(targetService).classList.add('active');

                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            });

            // Role and Department filtering functionality
            function initializeFilters() {
                const allServices = Array.from(document.querySelectorAll('.service-selection button'))
                    .map(btn => btn.getAttribute('data-service'));

                allServices.forEach(serviceName => {
                    const serviceElement = document.getElementById(serviceName);
                    if (!serviceElement) return;
                    
                    const roleFilterButtons = serviceElement.querySelectorAll('.role-filter-btn');
                    const departmentFilterButtons = serviceElement.querySelectorAll('.filter-btn');
                    const managementSections = serviceElement.querySelectorAll('.management-section'); // Changed from [data-role="management"] to .management-section
                    const staffSections = serviceElement.querySelectorAll('.staff-section'); // Changed from [data-role="staff"] to .staff-section
                    const allCards = serviceElement.querySelectorAll('.team-card');

                    let currentRoleFilter = 'all';
                    let currentDepartmentFilter = 'all';

                    // Role filter functionality
                    roleFilterButtons.forEach(button => {
                        button.addEventListener('click', () => {
                            currentRoleFilter = button.getAttribute('data-role');

                            roleFilterButtons.forEach(btn => btn.classList.remove('active'));
                            button.classList.add('active');

                            applyFilters();
                        });
                    });

                    // Department filter functionality
                    departmentFilterButtons.forEach(button => {
                        button.addEventListener('click', () => {
                            currentDepartmentFilter = button.getAttribute('data-category');

                            departmentFilterButtons.forEach(btn => btn.classList.remove('active'));
                            button.classList.add('active');

                            applyFilters();
                        });
                    });

                    function applyFilters() {
                        // Show/hide based on role filter
                        if (currentRoleFilter === 'all') {
                            managementSections.forEach(section => section.classList.remove('hidden'));
                            staffSections.forEach(section => section.classList.remove('hidden'));
                        } else if (currentRoleFilter === 'management') {
                            managementSections.forEach(section => section.classList.remove('hidden'));
                            staffSections.forEach(section => section.classList.add('hidden'));
                        } else if (currentRoleFilter === 'staff') {
                            managementSections.forEach(section => section.classList.add('hidden'));
                            staffSections.forEach(section => section.classList.remove('hidden'));
                        }

                        // Show/hide based on department filter
                        if (currentDepartmentFilter !== 'all') {
                            allCards.forEach(card => {
                                const cardCategory = card.getAttribute('data-category');
                                const cardRole = card.getAttribute('data-role');
                                const parentSection = card.closest('.management-section, .staff-section'); // Updated closest selector

                                if (cardCategory === currentDepartmentFilter && 
                                    (currentRoleFilter === 'all' || cardRole === currentRoleFilter)) {
                                    card.style.display = 'block';
                                    if (parentSection) parentSection.classList.remove('hidden');
                                } else {
                                    card.style.display = 'none';
                                }
                            });

                            // Hide empty sections
                            const sections = serviceElement.querySelectorAll('.management-section, .staff-section');
                            sections.forEach(section => {
                                const visibleCards = section.querySelectorAll('.team-card[style*="block"], .team-card:not([style*="none"])');
                                if (visibleCards.length === 0) {
                                    section.classList.add('hidden');
                                } else {
                                    section.classList.remove('hidden');
                                }
                            });
                        } else {
                            // Show all cards in visible sections
                            allCards.forEach(card => {
                                card.style.display = 'block';
                            });
                            // Ensure all sections are visible if department is 'all'
                            const sections = serviceElement.querySelectorAll('.management-section, .staff-section');
                            sections.forEach(section => {
                                section.classList.remove('hidden');
                            });
                        }
                    }
                });
            }

            // Enhanced Modal functionality
            const modal = document.getElementById('profileModal');
            const closeModal = document.querySelector('.close-modal');
            const closeBtn = document.getElementById('closeBtn');
            const modalLoading = document.getElementById('modalLoading');
            const modalContent = document.getElementById('modalContent');
            const modalHeader = document.getElementById('modalHeader');

            async function loadEmployeeProfile(employeeId, employeeData, isManagement = false) {
                try {
                    modalLoading.style.display = 'block';
                    modalContent.style.display = 'none';

                    await new Promise(resolve => setTimeout(resolve, 500));

                    const data = JSON.parse(employeeData);
                    
                    // Set modal header style based on role
                    if (isManagement) {
                        modalHeader.classList.add('management');
                    } else {
                        modalHeader.classList.remove('management');
                    }
                    
                    document.getElementById('modal-name').textContent = data.translation?.name || 'ไม่ระบุชื่อ';
                    document.getElementById('modal-position').textContent = data.translation?.position || 'ไม่ระบุตำแหน่ง';
                    document.getElementById('modal-email').textContent = data.email || 'contact@company.com';
                    document.getElementById('modal-phone').textContent = data.phone || '+66 89 123 4567';
                    document.getElementById('modal-location').textContent = data.location || 'กรุงเทพมหานคร';
                    document.getElementById('modal-image').src = data.cover_image || '/placeholder.svg?height=400&width=300';
                    
                    const bio = data.translation?.bio || data.bio || 'ผู้เชี่ยวชาญที่มีประสบการณ์และความเชี่ยวชาญในสาขาของตน พร้อมให้บริการด้วยความใส่ใจและคุณภาพสูงสุด';
                    document.getElementById('modal-bio').textContent = bio;

                    const achievementsList = document.getElementById('modal-achievements');
                    achievementsList.innerHTML = '';
                    const achievements = data.achievements || [
                        'มีประสบการณ์ในสาขามากกว่า 10 ปี',
                        'ได้รับการรับรองจากหน่วยงานที่เกี่ยวข้อง',
                        'ให้บริการลูกค้าด้วยความเป็นมิตรและมืออาชีพ'
                    ];
                    
                    achievements.forEach(achievement => {
                        const li = document.createElement('li');
                        li.textContent = achievement;
                        achievementsList.appendChild(li);
                    });

                    const skillsContainer = document.getElementById('modal-skills');
                    skillsContainer.innerHTML = '';
                    const skills = data.skills ? data.skills.split(',').map(s => s.trim()) : ['ทักษะพื้นฐาน'];
                    
                    skills.forEach(skill => {
                        const span = document.createElement('span');
                        span.className = 'skill-badge';
                        span.textContent = skill;
                        skillsContainer.appendChild(span);
                    });

                    const contactBtn = document.getElementById('contactBtn');
                    contactBtn.href = `tel:${data.phone || '+66891234567'}`;

                    modalLoading.style.display = 'none';
                    modalContent.style.display = 'block';

                } catch (error) {
                    console.error('Error loading employee profile:', error);
                    modalLoading.style.display = 'none';
                    modalContent.style.display = 'block';
                    
                    document.getElementById('modal-name').textContent = 'เกิดข้อผิดพลาด';
                    document.getElementById('modal-bio').textContent = 'ไม่สามารถโหลดข้อมูลได้ในขณะนี้';
                }
            }

            document.addEventListener('click', function(e) {
                const teamCard = e.target.closest('.team-card');
                if (teamCard) {
                    const employeeId = teamCard.getAttribute('data-id');
                    const employeeData = teamCard.getAttribute('data-employee');
                    const isManagement = teamCard.classList.contains('management-card');
                    
                    if (employeeId && employeeData) {
                        modal.style.display = 'block';
                        document.body.style.overflow = 'hidden';
                        loadEmployeeProfile(employeeId, employeeData, isManagement);
                    }
                }
            });

            function closeModalFunction() {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
                modalLoading.style.display = 'none';
                modalContent.style.display = 'none';
                modalHeader.classList.remove('management');
            }

            closeModal.addEventListener('click', closeModalFunction);
            closeBtn.addEventListener('click', closeModalFunction);

            window.addEventListener('click', (event) => {
                if (event.target === modal) {
                    closeModalFunction();
                }
            });

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape' && modal.style.display === 'block') {
                    closeModalFunction();
                }
            });

            document.addEventListener('DOMContentLoaded', () => {
                initializeFilters();
                
                const teamCards = document.querySelectorAll('.team-card');
                teamCards.forEach((card, index) => {
                    card.style.animationDelay = `${index * 0.1}s`;
                });
            });
        </script>
    </body>

    </html>
@endsection
