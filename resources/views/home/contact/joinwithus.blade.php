@extends('layouts.layout_home')
@section('content')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
    <style>
        /* Join Us Section */
        .join-us-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            padding: 80px 20px;
            min-height: 70vh;
            gap: 60px;
        }

        .join-us-content {
            flex: 1;
            max-width: 500px;
        }

        .join-us-content h1 {
            font-size: 3.5rem;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .join-us-content p {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 40px;
            line-height: 1.8;
        }

        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 35px;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .join-us-image {
            flex: 1;
            text-align: center;
        }

        .join-us-image img {
            max-width: 100%;
            height: auto;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        /* Job Listings Section */
        .apply-job {
            background: white;
            padding: 80px 20px;
            text-align: center;
        }

        .apply-job h1 {
            font-size: 2.5rem;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .apply-job>p {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 60px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .job-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            max-width: 1000px;
            margin: 0 auto;
        }

        .job-listing {
            background: white;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid #e9ecef;
        }

        .job-listing:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .job-listing h2 {
            font-size: 1.8rem;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .job-listing p {
            margin-bottom: 15px;
            color: #666;
            text-align: left;
        }

        .job-listing strong {
            color: #333;
        }

        .apply-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 25px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
            font-size: 1rem;
        }

        .apply-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        /* Modal Styles */
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
        }

        .modal-content {
            background-color: white;
            margin: 2% auto;
            padding: 40px;
            border-radius: 15px;
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .close {
            position: absolute;
            right: 20px;
            top: 20px;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            color: #999;
            transition: color 0.3s ease;
        }

        .close:hover {
            color: #333;
        }

        #modalTitle {
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 1.8rem;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-group small {
            color: #666;
            font-size: 0.9rem;
            margin-top: 5px;
            display: block;
        }

        .form-actions {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
            margin-top: 30px;
        }

        .btn-cancel {
            background: #6c757d;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .btn-cancel:hover {
            background: #5a6268;
        }

        .btn-submit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-submit:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        /* Loading Spinner */
        .loading-spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 2px solid #ffffff;
            border-top: 2px solid transparent;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-right: 10px;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Success Message */
        .success-message {
            display: none;
            position: fixed;
            z-index: 1001;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
        }

        .success-content {
            background-color: white;
            margin: 15% auto;
            padding: 40px;
            border-radius: 15px;
            width: 90%;
            max-width: 500px;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .success-content h3 {
            color: #28a745;
            margin-bottom: 20px;
            font-size: 1.5rem;
        }

        .success-content p {
            color: #666;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        /* Error Message */
        .error-message {
            display: none;
            position: fixed;
            z-index: 1001;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
        }

        .error-content {
            background-color: white;
            margin: 15% auto;
            padding: 40px;
            border-radius: 15px;
            width: 90%;
            max-width: 500px;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .error-content h3 {
            color: #dc3545;
            margin-bottom: 20px;
            font-size: 1.5rem;
        }

        .error-content p {
            color: #666;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        /* Benefits Section */
        .benefits-section {
            background: #f8f9fa;
            padding: 60px 20px;
            margin: 0;
        }

        .benefits-header {
            background: #3b4cb8;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 1.8rem;
            font-weight: bold;
            letter-spacing: 2px;
            margin: 0 auto 50px;
            max-width: 400px;
            position: relative;
        }

        .benefits-header::after {
            content: '';
            position: absolute;
            right: -10px;
            top: 0;
            bottom: 0;
            width: 20px;
            background: #3b4cb8;
            transform: skewX(-15deg);
        }

        .benefits-container {
            max-width: 800px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 40px;
            padding: 0 20px;
        }

        .benefit-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .benefit-icon {
            width: 120px;
            height: 120px;
            background: #3b4cb8;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            position: relative;
            box-shadow: 8px 8px 0px #dc3545;
        }

        .benefit-icon svg {
            width: 60px;
            height: 60px;
            fill: white;
            stroke: white;
            stroke-width: 1;
        }

        .benefit-text {
            color: #3b4cb8;
            font-weight: bold;
            font-size: 1.1rem;
            line-height: 1.4;
        }

        .benefit-text ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .benefit-text li {
            position: relative;
            padding-left: 15px;
            margin-bottom: 5px;
        }

        .benefit-text li::before {
            content: '•';
            position: absolute;
            left: 0;
            color: #3b4cb8;
            font-weight: bold;
        }

        /* Application Process Steps Section */
        .application-process {
            background: #f8f9fa;
            padding: 80px 20px;
            margin: 0;
        }

        .process-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .process-title {
            background: #3b4cb8;
            color: white;
            display: inline-block;
            padding: 20px 60px;
            font-size: 2rem;
            font-weight: bold;
            letter-spacing: 3px;
            position: relative;
            margin-bottom: 20px;
        }

        .process-title::after {
            content: '';
            position: absolute;
            right: -15px;
            top: 0;
            bottom: 0;
            width: 30px;
            background: #3b4cb8;
            transform: skewX(-15deg);
        }

        .steps-container {
            max-width: 800px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .step-item {
            background: #e8f2ff;
            border-radius: 15px;
            padding: 30px;
            position: relative;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .step-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .step-number {
            position: absolute;
            left: -15px;
            top: 50%;
            transform: translateY(-50%);
            width: 60px;
            height: 60px;
            background: #3b4cb8;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            box-shadow: 0 4px 12px rgba(59, 76, 184, 0.3);
            border: 4px solid white;
        }

        .step-content {
            margin-left: 60px;
        }

        .step-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .step-date {
            font-size: 1.1rem;
            color: #3b4cb8;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .step-description {
            color: #666;
            line-height: 1.6;
            font-size: 1rem;
        }

        .step-highlight {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 25px;
            border-radius: 10px;
            margin-top: 15px;
            font-weight: 500;
            text-align: center;
        }

        /* Timeline connector */
        .steps-container::before {
            content: '';
            position: absolute;
            left: 15px;
            top: 80px;
            bottom: 80px;
            width: 3px;
            background: linear-gradient(to bottom, #3b4cb8, #667eea);
            border-radius: 2px;
        }

        .steps-container {
            position: relative;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .join-us-container {
                flex-direction: column;
                text-align: center;
                gap: 40px;
                padding: 60px 20px;
            }

            .join-us-content h1 {
                font-size: 2.5rem;
            }

            .job-container {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .modal-content {
                margin: 5% auto;
                padding: 30px 20px;
                width: 95%;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn-cancel,
            .btn-submit {
                width: 100%;
            }

            .benefits-container {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .process-title {
                font-size: 1.5rem;
                padding: 15px 40px;
                letter-spacing: 2px;
            }

            .step-number {
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
                left: -10px;
            }

            .step-content {
                margin-left: 50px;
            }

            .step-title {
                font-size: 1.3rem;
            }

            .steps-container::before {
                left: 15px;
            }
        }

        @media (max-width: 480px) {
            .join-us-content h1 {
                font-size: 2rem;
            }

            .apply-job h1 {
                font-size: 2rem;
            }

            .process-title {
                font-size: 1.3rem;
                padding: 12px 30px;
                letter-spacing: 1px;
            }

            .step-item {
                padding: 25px 20px;
            }

            .step-number {
                width: 45px;
                height: 45px;
                font-size: 1.1rem;
                left: -8px;
            }

            .step-content {
                margin-left: 45px;
            }

            .step-title {
                font-size: 1.2rem;
            }

            .step-date {
                font-size: 1rem;
            }

            .step-description {
                font-size: 0.95rem;
            }
        }
    </style>

    <!-- Join Us Section -->
    <div class="join-us-container">
        <div class="join-us-content">
            <h1>{{ __('joinus.hero_title') }}</h1>
            <p>{{ __('joinus.hero_subtitle') }}</p>
            <a href="mailto:ananthaxb@gmail.com" class="btn">{{ __('joinus.hero_button') }}</a>
        </div>
        <div class="join-us-image">
            <img src="/img/joinwithus2.png" alt="Join Us Illustration">
        </div>
    </div>

    <!-- Benefits Section -->
    <div class="benefits-section">
        <div class="benefits-header">
            BENEFITS
        </div>
        <div class="benefits-container">
            <div class="benefit-item">
                <div class="benefit-icon">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 7C2 5.89543 2.89543 5 4 5H20C21.1046 5 22 5.89543 22 7V17C22 18.1046 21.1046 19 20 19H4C2.89543 19 2 18.1046 2 17V7Z" stroke="currentColor" stroke-width="2"/>
                        <path d="M2 7L22 7" stroke="currentColor" stroke-width="2"/>
                        <path d="M7 15H9" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        <path d="M7 11H15" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        <path d="M18 11H18.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        <path d="M18 15H18.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="benefit-text">
                    <ul>
                        <li>เบี้ยเลี้ยงฝึกงาน</li>
                        <li>ประกันอุบัติเหตุ</li>
                    </ul>
                </div>
            </div>

            <div class="benefit-item">
                <div class="benefit-icon">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 6H20L18.42 16.22C18.2 17.2 17.26 18 16.28 18H7.72C6.74 18 5.8 17.2 5.58 16.22L4 6Z" stroke="currentColor" stroke-width="2"/>
                        <path d="M4 6L2 4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        <path d="M20 6L22 4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        <path d="M12 2V6" stroke="currentColor" stroke-width="2"/>
                        <path d="M8 10L16 10" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        <path d="M10 14L14 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="benefit-text">
                    <ul>
                        <li>ประกาศนียบัตร/</li>
                        <li>หนังสือรับรองการ</li>
                        <li>ฝึกงาน</li>
                    </ul>
                </div>
            </div>

            <div class="benefit-item">
                <div class="benefit-icon">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="2"/>
                        <path d="M3 21V19C3 16.7909 4.79086 15 7 15H11C13.2091 15 15 16.7909 15 19V21" stroke="currentColor" stroke-width="2"/>
                        <circle cx="17" cy="7" r="3" stroke="currentColor" stroke-width="2"/>
                        <path d="M21 21V19C21 17.3431 19.6569 16 18 16H17" stroke="currentColor" stroke-width="2"/>
                    </svg>
                </div>
                <div class="benefit-text">
                    <ul>
                        <li>ได้แลกเปลี่ยน</li>
                        <li>ประสบการณ์กับ</li>
                        <li>เพื่อนจากต่าง</li>
                        <li>สถาบันทั่วประเทศ</li>
                        <li>กว่า 60 คน</li>
                    </ul>
                </div>
            </div>

            <div class="benefit-item">
                <div class="benefit-icon">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <polygon points="12,2 15.09,8.26 22,9.27 17,14.14 18.18,21.02 12,17.77 5.82,21.02 7,14.14 2,9.27 8.91,8.26" stroke="currentColor" stroke-width="2"/>
                        <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2"/>
                        <path d="M12 1V5" stroke="currentColor" stroke-width="2"/>
                        <path d="M12 19V23" stroke="currentColor" stroke-width="2"/>
                        <path d="M4.22 4.22L7.05 7.05" stroke="currentColor" stroke-width="2"/>
                        <path d="M16.95 16.95L19.78 19.78" stroke="currentColor" stroke-width="2"/>
                    </svg>
                </div>
                <div class="benefit-text">
                    <ul>
                        <li>โอกาสร่วมงานกับเอ</li>
                        <li>พีบริษัทพัฒนา</li>
                        <li>อสังหาริมทรัพย์ชั้น</li>
                        <li>นำเพื่อเรียนรู้</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Application Process Steps Section -->
    <div class="application-process">
        <div class="process-header">
            <div class="process-title">STEP</div>
        </div>
        
        <div class="steps-container">
            <div class="step-item">
                <div class="step-number">1</div>
                <div class="step-content">
                    <h3 class="step-title">Register</h3>
                    <div class="step-date">(2 กันยายน – 20 ธันวาคม 2567)</div>
                    <p class="step-description">
                        ลงทะเบียนสมัครเข้าร่วมโครงการเพื่อสัมผัสกับประสบการณ์ฝึกงานที่ไม่เหมือนใคร
                    </p>
                    <div class="step-highlight">
                        📝 เปิดรับสมัครแล้ว! สมัครเลยวันนี้
                    </div>
                </div>
            </div>

            <div class="step-item">
                <div class="step-number">2</div>
                <div class="step-content">
                    <h3 class="step-title">คัดเลือกรอบแรก Online Test</h3>
                    <div class="step-date">(20 ธันวาคม 2567)(09.00-20.00 น.)</div>
                    <p class="step-description">
                        ทดสอบความรู้ด้านวิศวกรรมโยธาและความเข้าใจในธุรกิจอสังหาริมทรัพย์เพื่อเฟ้นหาบุคลากรที่มีศักยภาพ
                    </p>
                    <div class="step-highlight">
                        💻 การทดสอบออนไลน์ 11 ชั่วโมง
                    </div>
                </div>
            </div>

            <div class="step-item">
                <div class="step-number">3</div>
                <div class="step-content">
                    <h3 class="step-title">สัมภาษณ์</h3>
                    <div class="step-date">(มกราคม 2568)</div>
                    <p class="step-description">
                        สัมภาษณ์เพื่อประเมินบุคลิกภาพ ทักษะการสื่อสาร และความพร้อมในการเข้าร่วมโครงการฝึกงาน
                    </p>
                    <div class="step-highlight">
                        🎯 รอบสุดท้ายก่อนเข้าโครงการ
                    </div>
                </div>
            </div>

            <div class="step-item">
                <div class="step-number">4</div>
                <div class="step-content">
                    <h3 class="step-title">เริ่มฝึกงาน</h3>
                    <div class="step-date">(กุมภาพันธ์ - เมษายน 2568)</div>
                    <p class="step-description">
                        เริ่มต้นการฝึกงานจริงกับทีมงานมืออาชีพ ได้รับประสบการณ์ตรงจากโครงการจริง และพัฒนาทักษะในสายงานที่สนใจ
                    </p>
                    <div class="step-highlight">
                        🚀 เริ่มต้นการเรียนรู้และพัฒนาตนเอง
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Job Listings Section -->
    <div class="apply-job">
        <h1>{{ __('joinus.hiring_title') }}</h1>
        <p>{{ __('joinus.hiring_subtitle') }}</p>
        <div class="job-container">
            {{-- @foreach ($jobs as $job)
                <div class="job-listing">
                    <h2>{{ $job->translation->position }}</h2>

                    <p><strong>Location:</strong> {{ $job->location }}</p>
                    <p><strong>Requirements:</strong>{{ $job->translation->requirements }} </p>
                    <button class="apply-btn" onclick="openJobModal('{{ $job->translation->position }}')">Apply Now</button>
                </div>
            @endforeach --}}

            {{-- <div class="job-listing">
                <h2>{{ __('joinus.admin_title') }}</h2>
                <p><strong>{{ __('joinus.admin_location') }}</strong></p>
                <p><strong>{{ __('joinus.admin_requirements') }}</strong></p>
                <button class="apply-btn" onclick="openJobModal('admin')">{{ __('joinus.apply_now') }}</button>
            </div> --}}
            {{-- <div class="job-listing">
                <h2>{{ __('joinus.civil_engineer_title') }}</h2>
                <p><strong>{{ __('joinus.civil_engineer_location') }}</strong></p>
                <p><strong>{{ __('joinus.civil_engineer_requirements') }}</strong></p>
                <button class="apply-btn" onclick="openJobModal('civil-engineer')">{{ __('joinus.apply_now') }}</button>
            </div> --}}
        </div>
    </div>

    <!-- Job Application Modal -->
    <div id="jobModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeJobModal()">&times;</span>
            <h2 id="modalTitle">{{ __('joinus.apply_for_position') }}</h2>
            <form id="jobApplicationForm">
                <div class="form-group">
                    <label for="fullName">{{ __('joinus.full_name_label') }} *</label>
                    <input type="text" id="fullName" name="fullName" required>
                </div>
                <div class="form-group">
                    <label for="email">{{ __('joinus.email_label') }} *</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">{{ __('joinus.phone_label') }} *</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="position">{{ __('joinus.position_label') }} *</label>
                    <input type="text" id="position" name="position" readonly>
                </div>
                <div class="form-group">
                    <label for="experience">{{ __('joinus.experience_label') }}</label>
                    <select id="experience" name="experience">
                        <option value="">{{ __('joinus.select_experience') }}</option>
                        <option value="0-1">{{ __('joinus.experience_0_1') }}</option>
                        <option value="1-3">{{ __('joinus.experience_1_3') }}</option>
                        <option value="3-5">{{ __('joinus.experience_3_5') }}</option>
                        <option value="5-10">{{ __('joinus.experience_5_10') }}</option>
                        <option value="10+">{{ __('joinus.experience_10_plus') }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="education">{{ __('joinus.education_label') }}</label>
                    <select id="education" name="education">
                        <option value="">{{ __('joinus.select_education') }}</option>
                        <option value="high-school">{{ __('joinus.education_high_school') }}</option>
                        <option value="diploma">{{ __('joinus.education_diploma') }}</option>
                        <option value="bachelor">{{ __('joinus.education_bachelor') }}</option>
                        <option value="master">{{ __('joinus.education_master') }}</option>
                        <option value="phd">{{ __('joinus.education_phd') }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="coverLetter">{{ __('joinus.cover_letter_label') }}</label>
                    <textarea id="coverLetter" name="coverLetter" rows="5" placeholder="{{ __('joinus.cover_letter_placeholder') }}"></textarea>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn-cancel"
                        onclick="closeJobModal()">{{ __('joinus.cancel_button') }}</button>
                    <button type="submit" class="btn-submit" id="submitBtn">
                        <span class="loading-spinner" id="loadingSpinner"></span>
                        <span id="submitText">{{ __('joinus.submit_button') }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Success Message -->
    <div id="successMessage" class="success-message">
        <div class="success-content">
            <h3>{{ __('joinus.success_title') }}</h3>
            <p>{{ __('joinus.success_message') }}</p>
            <button onclick="closeSuccessMessage()" class="btn">{{ __('joinus.close_button') }}</button>
        </div>
    </div>

    <!-- Error Message -->
    <div id="errorMessage" class="error-message">
        <div class="error-content">
            <h3>{{ __('joinus.error_title') }}</h3>
            <p id="errorText">{{ __('joinus.error_message') }}</p>
            <button onclick="closeErrorMessage()" class="btn">{{ __('joinus.close_button') }}</button>
        </div>
    </div>

    <script>
        // Initialize EmailJS
        (function() {
            emailjs.init('rJoednBWRySd43PyI');
        })();

        // Get current locale for JavaScript
        const currentLocale = '{{ app()->getLocale() }}';

        // Localized text for JavaScript
        const localizedText = {
            modalTitleAdmin: '{{ __('joinus.modal_title_admin') }}',
            modalTitleCivilEngineer: '{{ __('joinus.modal_title_civil_engineer') }}',
            submitting: '{{ __('joinus.submitting') }}',
            submitButton: '{{ __('joinus.submit_button') }}',
            errorRequiredFields: '{{ __('joinus.error_required_fields') }}',
            errorInvalidEmail: '{{ __('joinus.error_invalid_email') }}',
            errorEmailSending: '{{ __('joinus.error_email_sending') }}',
            emailSubject: '{{ __('joinus.email_subject') }}',
            applicantDetails: '{{ __('joinus.applicant_details') }}',
            coverLetterSection: '{{ __('joinus.cover_letter_section') }}',
            noCoverLetter: '{{ __('joinus.no_cover_letter') }}',
            notSpecified: '{{ __('joinus.not_specified') }}',
            contactApplicant: '{{ __('joinus.contact_applicant') }}',
            forFurtherCommunication: '{{ __('joinus.for_further_communication') }}',
            // เพิ่มตัวแปรที่ขาดหายไป
            fullNameLabel: '{{ __('joinus.full_name_label') }}',
            emailLabel: '{{ __('joinus.email_label') }}',
            phoneLabel: '{{ __('joinus.phone_label') }}',
            positionLabel: '{{ __('joinus.position_label') }}',
            experienceLabel: '{{ __('joinus.experience_label') }}',
            educationLabel: '{{ __('joinus.education_label') }}'
        };

        // Job positions data
        const jobPositions = {};
        const jj = document.querySelectorAll('.job-listing');
        jj.forEach(job => {
            let localPosition = job.querySelector('h2').textContent.trim();
            jobPositions[localPosition] = {
                title: localPosition,
                position: localPosition,
            }
        })

        // Open job application modal
        function openJobModal(jobType) {
            const modal = document.getElementById("jobModal")
            const modalTitle = document.getElementById("modalTitle")
            const positionInput = document.getElementById("position")
            const jobData = jobPositions[jobType]

            modalTitle.textContent = jobData.title
            positionInput.value = jobData.position
            modal.style.display = "block"
            document.body.style.overflow = "hidden"
        }

        // Close job application modal
        function closeJobModal() {
            const modal = document.getElementById("jobModal")
            modal.style.display = "none"
            document.body.style.overflow = "auto"
            // Reset form
            document.getElementById("jobApplicationForm").reset()
            resetSubmitButton()
        }

        // Close success message
        function closeSuccessMessage() {
            const successMessage = document.getElementById("successMessage")
            successMessage.style.display = "none"
            document.body.style.overflow = "auto"
        }

        // Close error message
        function closeErrorMessage() {
            const errorMessage = document.getElementById("errorMessage")
            errorMessage.style.display = "none"
            document.body.style.overflow = "auto"
        }

        // Show loading state
        function showLoading() {
            const submitBtn = document.getElementById("submitBtn")
            const loadingSpinner = document.getElementById("loadingSpinner")
            const submitText = document.getElementById("submitText")

            submitBtn.disabled = true
            loadingSpinner.style.display = "inline-block"
            submitText.textContent = localizedText.submitting
        }

        // Reset submit button
        function resetSubmitButton() {
            const submitBtn = document.getElementById("submitBtn")
            const loadingSpinner = document.getElementById("loadingSpinner")
            const submitText = document.getElementById("submitText")

            submitBtn.disabled = false
            loadingSpinner.style.display = "none"
            submitText.textContent = localizedText.submitButton
        }

        // Show error message
        function showError(message) {
            const errorMessage = document.getElementById("errorMessage")
            const errorText = document.getElementById("errorText")
            errorText.textContent = message
            errorMessage.style.display = "block"
        }

        // Handle form submission
        document.getElementById("jobApplicationForm").addEventListener("submit", function(e) {
            e.preventDefault()

            // Get form data
            const formData = new FormData(this)
            const data = {}
            for (const [key, value] of formData.entries()) {
                data[key] = value
            }

            // Validate required fields
            const requiredFields = ["fullName", "email", "phone", "position"]
            let isValid = true
            requiredFields.forEach((field) => {
                const input = document.getElementById(field)
                if (!data[field] || data[field].trim() === "") {
                    input.style.borderColor = "#dc3545"
                    isValid = false
                } else {
                    input.style.borderColor = "#e9ecef"
                }
            })

            if (!isValid) {
                showError(localizedText.errorRequiredFields)
                return
            }

            // Validate email format
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
            if (!emailRegex.test(data.email)) {
                document.getElementById("email").style.borderColor = "#dc3545"
                showError(localizedText.errorInvalidEmail)
                return
            }

            // Show loading state
            showLoading()

            // Prepare email template parameters
            const templateParams = {
                to_email: 'ananthaxb@gmail.com',
                from_name: data.fullName,
                from_email: data.email,
                phone: data.phone,
                position: data.position,
                experience: data.experience || localizedText.notSpecified,
                education: data.education || localizedText.notSpecified,
                cover_letter: data.coverLetter || localizedText.noCoverLetter,
                subject: `${localizedText.emailSubject} ${data.position} - ${data.fullName}`,
                message: `${localizedText.applicantDetails}:
- ${localizedText.fullNameLabel}: ${data.fullName}
- ${localizedText.emailLabel}: ${data.email}
- ${localizedText.phoneLabel}: ${data.phone}
- ${localizedText.positionLabel}: ${data.position}
- ${localizedText.experienceLabel}: ${data.experience || localizedText.notSpecified}
- ${localizedText.educationLabel}: ${data.education || localizedText.notSpecified}

${localizedText.coverLetterSection}:
${data.coverLetter || localizedText.noCoverLetter}

${localizedText.contactApplicant} ${data.email} or ${data.phone} ${localizedText.forFurtherCommunication}`.trim()
            }

            // Send email using EmailJS
            emailjs.send('Thome', 'template_shjqlbp', templateParams)
                .then(function(response) {
                    console.log('SUCCESS!', response.status, response.text);
                    resetSubmitButton()
                    closeJobModal()
                    document.getElementById("successMessage").style.display = "block"
                }, function(error) {
                    console.log('FAILED...', error);
                    resetSubmitButton()
                    showError(
                        `${localizedText.errorEmailSending} ${error.text || error.message || 'Unknown error'}`
                    )
                });
        })

        // Close modal when clicking outside
        window.addEventListener("click", (event) => {
            const modal = document.getElementById("jobModal")
            const successMessage = document.getElementById("successMessage")
            const errorMessage = document.getElementById("errorMessage")

            if (event.target === modal) {
                closeJobModal()
            }
            if (event.target === successMessage) {
                closeSuccessMessage()
            }
            if (event.target === errorMessage) {
                closeErrorMessage()
            }
        })

        // Handle escape key
        document.addEventListener("keydown", (event) => {
            if (event.key === "Escape") {
                const modal = document.getElementById("jobModal")
                const successMessage = document.getElementById("successMessage")
                const errorMessage = document.getElementById("errorMessage")

                if (modal.style.display === "block") {
                    closeJobModal()
                }
                if (successMessage.style.display === "block") {
                    closeSuccessMessage()
                }
                if (errorMessage.style.display === "block") {
                    closeErrorMessage()
                }
            }
        });

        // Form validation on input
        document.addEventListener("DOMContentLoaded", () => {
            const inputs = document.querySelectorAll("input[required], select[required]")
            inputs.forEach((input) => {
                input.addEventListener("blur", function() {
                    if (this.value.trim() === "") {
                        this.style.borderColor = "#dc3545"
                    } else {
                        this.style.borderColor = "#e9ecef"
                    }
                })

                input.addEventListener("input", function() {
                    if (this.value.trim() !== "") {
                        this.style.borderColor = "#e9ecef"
                    }
                })
            })

            // Add scroll animation for steps
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0)';
                        }, index * 200);
                    }
                });
            }, observerOptions);

            // Observe step items
            document.querySelectorAll('.step-item').forEach((step, index) => {
                step.style.opacity = '0';
                step.style.transform = 'translateY(30px)';
                step.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(step);
            });
        })
    </script>
@endsection