@extends('layouts.layout_home')
@section('content')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
    <link rel="stylesheet" href="/css/home/contact/joinwithus.css">
    
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

    <!-- Job Listings Section -->
    <div class="apply-job">
        <h1>{{ __('joinus.hiring_title') }}</h1>
        <p>{{ __('joinus.hiring_subtitle') }}</p>
        <div class="job-container">
            @foreach ($jobs as $job)
                @if (in_array($job->employment_type, ['Full-time', 'Part-time', 'Contract']))
                    <div class="job-listing">
                        <h2>{{ $job->translation->position }}</h2>
                        <p><strong>{{ __('joinus.employment_type') }}:</strong> {{ $job->employment_type }}</p>
                        <p><strong>{{ __('joinus.location') }}:</strong> {{ $job->location }}</p>
                        <p><strong>{{ __('joinus.requirements') }}:</strong> {{ $job->translation->requirements }}</p>
                        <button class="apply-btn" onclick="openJobModal('{{ $job->translation->position }}')">{{ __('joinus.apply_now') }}</button>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <!-- NEW INTERNSHIP SECTION REDESIGN -->
    <!-- Internship Hero Background Section -->
    <div class="internship-hero-bg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 80px 0; color: white; text-align: center; position: relative; overflow: hidden;">
        <!-- Background pattern using PNG -->
        <div class="hero-pattern" style="
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: url('/img/joinus/5.jpg');
            background-repeat: repeat;
            opacity: 0.3;
        "></div>

        <!-- Content -->
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px; position: relative; z-index: 2;">
            <div class="internship-logo" style="margin-bottom: 30px;">
                <img src="/img/logo.png" alt="{{ __('joinus.internship.logo_alt') }}" style="height: 80px; margin-bottom: 20px;">
                <h1 style="font-size: 3.5rem; font-weight: bold; margin: 0; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">{{ __('joinus.internship.hero_title') }}</h1>
                <h2 style="font-size: 2rem; margin: 10px 0; color: #f0f8ff;">{{ __('joinus.internship.hero_subtitle') }}</h2>
                <p style="font-size: 1.3rem; margin: 20px 0; max-width: 600px; margin-left: auto; margin-right: auto; line-height: 1.6;">
                    {{ __('joinus.internship.hero_description') }}
                </p>
            </div>
        </div>
    </div>

    <!-- Internship Benefits Section -->
<div class="internship-benefits" style="padding: 80px 0; background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <div class="section-header" style="text-align: center; margin-bottom: 60px;">
            <h2 style="font-size: 2.5rem; color: #2d3748; margin-bottom: 20px; font-weight: bold; text-shadow: 0 2px 4px rgba(0,0,0,0.1);">{{ __('joinus.internship.benefits_title') }}</h2>
            <p style="font-size: 1.2rem; color: #718096; max-width: 600px; margin: 0 auto; line-height: 1.6;">{{ __('joinus.internship.benefits_subtitle') }}</p>
        </div>
        
        <div class="benefits-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px; margin-top: 50px;">
            <!-- Benefit Box 1 -->
            <div class="benefit-card" style="
                background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%); 
                padding: 35px 25px; 
                border-radius: 20px; 
                box-shadow: 
                    0 20px 40px rgba(0,0,0,0.1),
                    0 8px 16px rgba(0,0,0,0.06),
                    inset 0 1px 0 rgba(255,255,255,0.8); 
                text-align: center; 
                transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                border: 1px solid rgba(255,255,255,0.2);
                position: relative;
                overflow: hidden;
            ">
                <!-- Subtle background pattern -->
                <div style="
                    position: absolute;
                    top: -50%;
                    right: -50%;
                    width: 100%;
                    height: 100%;
                    background: radial-gradient(circle, rgba(102,126,234,0.05) 0%, transparent 70%);
                    pointer-events: none;
                "></div>
                
                <div class="benefit-icon" style="
                    width: 90px; 
                    height: 90px; 
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
                    border-radius: 50%; 
                    margin: 0 auto 25px; 
                    display: flex; 
                    align-items: center; 
                    justify-content: center;
                    box-shadow: 0 10px 25px rgba(102,126,234,0.3);
                    position: relative;
                    z-index: 2;
                ">
                    <svg width="45" height="45" fill="white" viewBox="0 0 24 24">
                        <path d="M12 2L13.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/>
                    </svg>
                </div>
                <h3 style="
                    font-size: 1.6rem; 
                    color: #2d3748; 
                    margin-bottom: 15px; 
                    font-weight: 700;
                    position: relative;
                    z-index: 2;
                ">{{ __('joinus.internship.benefit_1_title') }}</h3>
                <p style="
                    color: #718096; 
                    line-height: 1.7; 
                    font-size: 1rem;
                    position: relative;
                    z-index: 2;
                ">{{ __('joinus.internship.benefit_1_description') }}</p>
            </div>

            <!-- Benefit Box 2 -->
            <div class="benefit-card" style="
                background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%); 
                padding: 35px 25px; 
                border-radius: 20px; 
                box-shadow: 
                    0 20px 40px rgba(0,0,0,0.1),
                    0 8px 16px rgba(0,0,0,0.06),
                    inset 0 1px 0 rgba(255,255,255,0.8); 
                text-align: center; 
                transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                border: 1px solid rgba(255,255,255,0.2);
                position: relative;
                overflow: hidden;
            ">
                <div style="
                    position: absolute;
                    top: -50%;
                    right: -50%;
                    width: 100%;
                    height: 100%;
                    background: radial-gradient(circle, rgba(102,126,234,0.05) 0%, transparent 70%);
                    pointer-events: none;
                "></div>
                
                <div class="benefit-icon" style="
                    width: 90px; 
                    height: 90px; 
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
                    border-radius: 50%; 
                    margin: 0 auto 25px; 
                    display: flex; 
                    align-items: center; 
                    justify-content: center;
                    box-shadow: 0 10px 25px rgba(102,126,234,0.3);
                    position: relative;
                    z-index: 2;
                ">
                    <svg width="45" height="45" fill="white" viewBox="0 0 24 24">
                        <path d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V5H19V19ZM17 12H15V10H17V12ZM13 12H11V10H13V12ZM9 12H7V10H9V12Z"/>
                    </svg>
                </div>
                <h3 style="
                    font-size: 1.6rem; 
                    color: #2d3748; 
                    margin-bottom: 15px; 
                    font-weight: 700;
                    position: relative;
                    z-index: 2;
                ">{{ __('joinus.internship.benefit_2_title') }}</h3>
                <p style="
                    color: #718096; 
                    line-height: 1.7; 
                    font-size: 1rem;
                    position: relative;
                    z-index: 2;
                ">{{ __('joinus.internship.benefit_2_description') }}</p>
            </div>

            <!-- Benefit Box 3 -->
            <div class="benefit-card" style="
                background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%); 
                padding: 35px 25px; 
                border-radius: 20px; 
                box-shadow: 
                    0 20px 40px rgba(0,0,0,0.1),
                    0 8px 16px rgba(0,0,0,0.06),
                    inset 0 1px 0 rgba(255,255,255,0.8); 
                text-align: center; 
                transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                border: 1px solid rgba(255,255,255,0.2);
                position: relative;
                overflow: hidden;
            ">
                <div style="
                    position: absolute;
                    top: -50%;
                    right: -50%;
                    width: 100%;
                    height: 100%;
                    background: radial-gradient(circle, rgba(102,126,234,0.05) 0%, transparent 70%);
                    pointer-events: none;
                "></div>
                
                <div class="benefit-icon" style="
                    width: 90px; 
                    height: 90px; 
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
                    border-radius: 50%; 
                    margin: 0 auto 25px; 
                    display: flex; 
                    align-items: center; 
                    justify-content: center;
                    box-shadow: 0 10px 25px rgba(102,126,234,0.3);
                    position: relative;
                    z-index: 2;
                ">
                    <svg width="45" height="45" fill="white" viewBox="0 0 24 24">
                        <path d="M16 4C18.2 4 20 5.8 20 8C20 10.2 18.2 12 16 12C13.8 12 12 10.2 12 8C12 5.8 13.8 4 16 4ZM16 14C20.4 14 24 15.8 24 18V20H8V18C8 15.8 11.6 14 16 14ZM8 4C10.2 4 12 5.8 12 8C12 10.2 10.2 12 8 12C5.8 12 4 10.2 4 8C4 5.8 5.8 4 8 4ZM8 14C12.4 14 16 15.8 16 18V20H0V18C0 15.8 3.6 14 8 14Z"/>
                    </svg>
                </div>
                <h3 style="
                    font-size: 1.6rem; 
                    color: #2d3748; 
                    margin-bottom: 15px; 
                    font-weight: 700;
                    position: relative;
                    z-index: 2;
                ">{{ __('joinus.internship.benefit_3_title') }}</h3>
                <p style="
                    color: #718096; 
                    line-height: 1.7; 
                    font-size: 1rem;
                    position: relative;
                    z-index: 2;
                ">{{ __('joinus.internship.benefit_3_description') }}</p>
            </div>

            <!-- Benefit Box 4 -->
            <div class="benefit-card" style="
                background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%); 
                padding: 35px 25px; 
                border-radius: 20px; 
                box-shadow: 
                    0 20px 40px rgba(0,0,0,0.1),
                    0 8px 16px rgba(0,0,0,0.06),
                    inset 0 1px 0 rgba(255,255,255,0.8); 
                text-align: center; 
                transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                border: 1px solid rgba(255,255,255,0.2);
                position: relative;
                overflow: hidden;
            ">
                <div style="
                    position: absolute;
                    top: -50%;
                    right: -50%;
                    width: 100%;
                    height: 100%;
                    background: radial-gradient(circle, rgba(102,126,234,0.05) 0%, transparent 70%);
                    pointer-events: none;
                "></div>
                
                <div class="benefit-icon" style="
                    width: 90px; 
                    height: 90px; 
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
                    border-radius: 50%; 
                    margin: 0 auto 25px; 
                    display: flex; 
                    align-items: center; 
                    justify-content: center;
                    box-shadow: 0 10px 25px rgba(102,126,234,0.3);
                    position: relative;
                    z-index: 2;
                ">
                    <svg width="45" height="45" fill="white" viewBox="0 0 24 24">
                        <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 7V9C15 11.8 12.8 14 10 14S5 11.8 5 9V7L3 7V9C3 12.9 6.1 16 10 16V19H8V21H16V19H14V16C17.9 16 21 12.9 21 9Z"/>
                    </svg>
                </div>
                <h3 style="
                    font-size: 1.6rem; 
                    color: #2d3748; 
                    margin-bottom: 15px; 
                    font-weight: 700;
                    position: relative;
                    z-index: 2;
                ">{{ __('joinus.internship.benefit_4_title') }}</h3>
                <p style="
                    color: #718096; 
                    line-height: 1.7; 
                    font-size: 1rem;
                    position: relative;
                    z-index: 2;
                ">{{ __('joinus.internship.benefit_4_description') }}</p>
            </div>

            <!-- Benefit Box 5 -->
            <div class="benefit-card" style="
                background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%); 
                padding: 35px 25px; 
                border-radius: 20px; 
                box-shadow: 
                    0 20px 40px rgba(0,0,0,0.1),
                    0 8px 16px rgba(0,0,0,0.06),
                    inset 0 1px 0 rgba(255,255,255,0.8); 
                text-align: center; 
                transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                border: 1px solid rgba(255,255,255,0.2);
                position: relative;
                overflow: hidden;
            ">
                <div style="
                    position: absolute;
                    top: -50%;
                    right: -50%;
                    width: 100%;
                    height: 100%;
                    background: radial-gradient(circle, rgba(102,126,234,0.05) 0%, transparent 70%);
                    pointer-events: none;
                "></div>
                
                <div class="benefit-icon" style="
                    width: 90px; 
                    height: 90px; 
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
                    border-radius: 50%; 
                    margin: 0 auto 25px; 
                    display: flex; 
                    align-items: center; 
                    justify-content: center;
                    box-shadow: 0 10px 25px rgba(102,126,234,0.3);
                    position: relative;
                    z-index: 2;
                ">
                    <svg width="45" height="45" fill="white" viewBox="0 0 24 24">
                        <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 7V9C15 11.8 12.8 14 10 14S5 11.8 5 9V7L3 7V9C3 12.9 6.1 16 10 16V19H8V21H16V19H14V16C17.9 16 21 12.9 21 9Z"/>
                    </svg>
                </div>
                <h3 style="
                    font-size: 1.6rem; 
                    color: #2d3748; 
                    margin-bottom: 15px; 
                    font-weight: 700;
                    position: relative;
                    z-index: 2;
                ">{{ __('joinus.internship.benefit_5_title') }}</h3>
                <p style="
                    color: #718096; 
                    line-height: 1.7; 
                    font-size: 1rem;
                    position: relative;
                    z-index: 2;
                ">{{ __('joinus.internship.benefit_5_description') }}</p>
            </div>
        </div>
    </div>
</div>


<style>
.benefit-card:hover {
    transform: translateY(-15px) scale(1.02) !important;
    box-shadow: 
        0 30px 60px rgba(0,0,0,0.15),
        0 15px 30px rgba(0,0,0,0.1),
        inset 0 1px 0 rgba(255,255,255,0.9) !important;
}

.benefit-card:hover .benefit-icon {
    transform: scale(1.1);
    box-shadow: 0 15px 35px rgba(102,126,234,0.4) !important;
}

.benefit-card:hover h3 {
    color: #667eea !important;
}

@media (max-width: 768px) {
    .benefits-grid {
        grid-template-columns: 1fr !important;
        gap: 25px !important;
    }
    
    .benefit-card {
        padding: 30px 20px !important;
    }
}
</style>

    <!-- Internship Steps Section -->
   <div class="internship-steps" style="padding: 80px 0; background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);">
    <div class="container" style="max-width: 900px; margin: 0 auto; padding: 0 20px;">
        <div class="section-header" style="text-align: center; margin-bottom: 60px;">
            <h2 style="font-size: 2.5rem; color: #2d3748; margin-bottom: 20px; font-weight: bold;">{{ __('joinus.internship.steps_title') }}</h2>
        </div>

        <div class="steps-vertical-container" style="position: relative;">
            
            <!-- Step 1 -->
            <div class="step-vertical-box" style="
                background: white;
                margin-bottom: 30px;
                border-radius: 20px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.1), 0 4px 15px rgba(0,0,0,0.05);
                overflow: hidden;
                border-left: 6px solid #667eea;
                transition: all 0.4s ease;
                position: relative;
            ">
                <div class="step-content" style="padding: 40px; display: flex; align-items: center; gap: 30px;">
                    <div class="step-number-badge" style="
                        min-width: 80px;
                        height: 80px;
                        background: linear-gradient(135deg, #667eea, #764ba2);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        color: white;
                        font-size: 2rem;
                        font-weight: bold;
                        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
                        position: relative;
                    ">
                        1
                        <div style="
                            position: absolute;
                            top: -5px;
                            right: -5px;
                            width: 25px;
                            height: 25px;
                            background: #10b981;
                            border-radius: 50%;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            font-size: 12px;
                        ">✓</div>
                    </div>
                    
                    <div class="step-text-content" style="flex: 1;">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px;">
                            <h3 style="font-size: 1.8rem; color: #2d3748; margin: 0; font-weight: 700;">{{ __('joinus.internship.step_1_title') }}</h3>
                            <div class="step-date-badge" style="
                                background: linear-gradient(135deg, #667eea, #764ba2);
                                color: white;
                                padding: 8px 16px;
                                border-radius: 20px;
                                font-size: 0.85rem;
                                font-weight: 600;
                                white-space: nowrap;
                            ">{{ __('joinus.internship.step_1_date') }}</div>
                        </div>
                        
                        <p style="color: #718096; line-height: 1.7; margin: 0; font-size: 1.1rem;">{{ __('joinus.internship.step_1_description') }}</p>
                        
                        <div class="step-highlight" style="
                            margin-top: 15px;
                            padding: 12px 20px;
                            background: rgba(102, 126, 234, 0.1);
                            border-radius: 10px;
                            border-left: 4px solid #667eea;
                            font-size: 0.95rem;
                            color: #4c51bf;
                            font-weight: 500;
                        ">
                            สมัครเลยวันนี้ 
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="step-vertical-box" style="
                background: white;
                margin-bottom: 30px;
                border-radius: 20px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.1), 0 4px 15px rgba(0,0,0,0.05);
                overflow: hidden;
                border-left: 6px solid #667eea;
                transition: all 0.4s ease;
                position: relative;
            ">
                <div class="step-content" style="padding: 40px; display: flex; align-items: center; gap: 30px;">
                    <div class="step-number-badge" style="
                        min-width: 80px;
                        height: 80px;
                        background: linear-gradient(135deg, #667eea, #764ba2);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        color: white;
                        font-size: 2rem;
                        font-weight: bold;
                        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
                        position: relative;
                    ">
                        2
                        <div style="
                            position: absolute;
                            top: -5px;
                            right: -5px;
                            width: 25px;
                            height: 25px;
                            background: #f59e0b;
                            border-radius: 50%;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            font-size: 12px;
                        ">⏳</div>
                    </div>
                    
                    <div class="step-text-content" style="flex: 1;">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px;">
                            <h3 style="font-size: 1.8rem; color: #2d3748; margin: 0; font-weight: 700;">{{ __('joinus.internship.step_2_title') }}</h3>
                            <div class="step-date-badge" style="
                                background: linear-gradient(135deg, #667eea, #764ba2);
                                color: white;
                                padding: 8px 16px;
                                border-radius: 20px;
                                font-size: 0.85rem;
                                font-weight: 600;
                                white-space: nowrap;
                            ">{{ __('joinus.internship.step_2_date') }}</div>
                        </div>
                        
                        <p style="color: #718096; line-height: 1.7; margin: 0; font-size: 1.1rem;">{{ __('joinus.internship.step_2_description') }}</p>
                        
                        <div class="step-highlight" style="
                            margin-top: 15px;
                            padding: 12px 20px;
                            background: rgba(102, 126, 234, 0.1);
                            border-radius: 10px;
                            border-left: 4px solid #667eea;
                            font-size: 0.95rem;
                            color: #4c51bf;
                            font-weight: 500;
                        ">
                             ส่ง Resume และ Portfolio ของคุณ
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="step-vertical-box" style="
                background: white;
                margin-bottom: 30px;
                border-radius: 20px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.1), 0 4px 15px rgba(0,0,0,0.05);
                overflow: hidden;
                border-left: 6px solid #667eea;
                transition: all 0.4s ease;
                position: relative;
            ">
                <div class="step-content" style="padding: 40px; display: flex; align-items: center; gap: 30px;">
                    <div class="step-number-badge" style="
                        min-width: 80px;
                        height: 80px;
                        background: linear-gradient(135deg, #667eea, #764ba2);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        color: white;
                        font-size: 2rem;
                        font-weight: bold;
                        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
                        position: relative;
                    ">
                        3
                        <div style="
                            position: absolute;
                            top: -5px;
                            right: -5px;
                            width: 25px;
                            height: 25px;
                            background: #8b5cf6;
                            border-radius: 50%;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            font-size: 12px;
                        ">📚</div>
                    </div>
                    
                    <div class="step-text-content" style="flex: 1;">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px;">
                            <h3 style="font-size: 1.8rem; color: #2d3748; margin: 0; font-weight: 700;">{{ __('joinus.internship.step_3_title') }}</h3>
                            <div class="step-date-badge" style="
                                background: linear-gradient(135deg, #667eea, #764ba2);
                                color: white;
                                padding: 8px 16px;
                                border-radius: 20px;
                                font-size: 0.85rem;
                                font-weight: 600;
                                white-space: nowrap;
                            ">{{ __('joinus.internship.step_3_date') }}</div>
                        </div>
                        
                        <p style="color: #718096; line-height: 1.7; margin: 0; font-size: 1.1rem;">{{ __('joinus.internship.step_3_description') }}</p>
                        
                        <div class="step-highlight" style="
                            margin-top: 15px;
                            padding: 12px 20px;
                            background: rgba(102, 126, 234, 0.1);
                            border-radius: 10px;
                            border-left: 4px solid #667eea;
                            font-size: 0.95rem;
                            color: #4c51bf;
                            font-weight: 500;
                        ">
                            ขั้นตอนสุดท้ายก่อนเริ่มฝึกงาน
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="step-vertical-box" style="
                background: white;
                margin-bottom: 30px;
                border-radius: 20px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.1), 0 4px 15px rgba(0,0,0,0.05);
                overflow: hidden;
                border-left: 6px solid #10b981;
                transition: all 0.4s ease;
                position: relative;
            ">
                <div class="step-content" style="padding: 40px; display: flex; align-items: center; gap: 30px;">
                    <div class="step-number-badge" style="
                        min-width: 80px;
                        height: 80px;
                        background: linear-gradient(135deg, #10b981, #059669);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        color: white;
                        font-size: 2rem;
                        font-weight: bold;
                        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
                        position: relative;
                    ">
                        4
                        <div style="
                            position: absolute;
                            top: -5px;
                            right: -5px;
                            width: 25px;
                            height: 25px;
                            background: #f59e0b;
                            border-radius: 50%;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            font-size: 12px;
                        ">🚀</div>
                    </div>
                    
                    <div class="step-text-content" style="flex: 1;">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px;">
                            <h3 style="font-size: 1.8rem; color: #2d3748; margin: 0; font-weight: 700;">{{ __('joinus.internship.step_4_title') }}</h3>
                            <div class="step-date-badge" style="
                                background: linear-gradient(135deg, #10b981, #059669);
                                color: white;
                                padding: 8px 16px;
                                border-radius: 20px;
                                font-size: 0.85rem;
                                font-weight: 600;
                                white-space: nowrap;
                            ">{{ __('joinus.internship.step_4_date') }}</div>
                        </div>
                        
                        <p style="color: #718096; line-height: 1.7; margin: 0; font-size: 1.1rem;">{{ __('joinus.internship.step_4_description') }}</p>
                        
                        <div class="step-highlight" style="
                            margin-top: 15px;
                            padding: 12px 20px;
                            background: rgba(16, 185, 129, 0.1);
                            border-radius: 10px;
                            border-left: 4px solid #10b981;
                            font-size: 0.95rem;
                            color: #047857;
                            font-weight: 500;
                        ">
                           ฝึกประสบการณ์จริงกับองค์กร
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Call to Action -->
        <div class="cta-section" style="
            text-align: center; 
            margin-top: 50px; 
            padding: 40px; 
            background: linear-gradient(135deg, #667eea, #764ba2); 
            border-radius: 20px; 
            color: white;
        ">
            <h3 style="font-size: 1.8rem; margin-bottom: 15px; font-weight: 700;">พร้อมเริ่มต้นแล้วใช่ไหม?</h3>
            <p style="font-size: 1.1rem; margin-bottom: 25px; opacity: 0.9;">สมัครเลยวันนี้และเริ่มต้นการเรียนรู้กับเรา</p>
            <button style="
                background: white; 
                color: #667eea; 
                border: none; 
                padding: 15px 40px; 
                border-radius: 30px; 
                font-size: 1.1rem; 
                font-weight: 600; 
                cursor: pointer; 
                transition: all 0.3s ease;
                box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            " onclick="document.querySelector('.internship-jobs').scrollIntoView({behavior: 'smooth'})">
                ดูตำแหน่งฝึกงาน
            </button>
        </div>
    </div>
</div>

<!-- Enhanced CSS for Vertical Step Boxes -->
<style>
.step-vertical-box:hover {
    transform: translateX(10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15), 0 8px 20px rgba(0,0,0,0.1);
}

.step-vertical-box:hover .step-number-badge {
    transform: scale(1.1);
    box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
}

.step-vertical-box:hover .step-date-badge {
    transform: scale(1.05);
}

/* Responsive Design */
@media (max-width: 768px) {
    .step-content {
        flex-direction: column !important;
        text-align: center;
        gap: 20px !important;
    }
    
    .step-text-content > div:first-child {
        flex-direction: column !important;
        align-items: center !important;
        gap: 15px;
    }
    
    .step-date-badge {
        margin-top: 10px;
    }
    
    .step-vertical-box {
        margin-bottom: 25px;
    }
    
    .step-content {
        padding: 30px 20px !important;
    }
}

@media (max-width: 480px) {
    .step-number-badge {
        min-width: 60px !important;
        height: 60px !important;
        font-size: 1.5rem !important;
    }
    
    .step-text-content h3 {
        font-size: 1.4rem !important;
    }
    
    .step-text-content p {
        font-size: 1rem !important;
    }
}

/* Animation for CTA button */
.cta-section button:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.3);
    background: #f8fafc;
}
</style>

<script>
// Add scroll animation for step boxes
document.addEventListener('DOMContentLoaded', function() {
    const stepBoxes = document.querySelectorAll('.step-vertical-box');
    
    const observerOptions = {
        threshold: 0.2,
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

    stepBoxes.forEach((box, index) => {
        box.style.opacity = '0';
        box.style.transform = 'translateY(30px)';
        box.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
        observer.observe(box);
    });
});
</script>

    <!-- Internship Job Listings -->
    <div class="internship-jobs" style="padding: 80px 0; background: #f8fafc;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            <div class="section-header" style="text-align: center; margin-bottom: 60px;">
                <h2 style="font-size: 2.5rem; color: #2d3748; margin-bottom: 20px; font-weight: bold;">{{ __('joinus.internship.positions_title') }}</h2>
                <p style="font-size: 1.2rem; color: #718096;">{{ __('joinus.internship.positions_subtitle') }}</p>
            </div>
            
            <div class="job-container" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px;">
                @foreach ($jobs as $job)
                    @if (!in_array($job->employment_type, ['Full-time', 'Part-time', 'Contract']))
                        <div class="job-listing" style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                            <h2 style="font-size: 1.5rem; color: #2d3748; margin-bottom: 15px; font-weight: 600;">{{ $job->translation->position }}</h2>
                            <p style="margin-bottom: 10px;"><strong style="color: #4a5568;">{{ __('joinus.employment_type') }}:</strong> <span style="color: #667eea; font-weight: 600;">{{ $job->employment_type }}</span></p>
                            <p style="margin-bottom: 10px;"><strong style="color: #4a5568;">{{ __('joinus.location') }}:</strong> {{ $job->location }}</p>
                            <p style="margin-bottom: 20px;"><strong style="color: #4a5568;">{{ __('joinus.requirements') }}:</strong> {{ $job->translation->requirements }}</p>
                            <button class="apply-btn" onclick="openJobModal('{{ $job->translation->position }}')" style="background: linear-gradient(135deg, #667eea, #764ba2); color: white; border: none; padding: 12px 30px; border-radius: 25px; font-weight: 600; cursor: pointer; transition: transform 0.3s ease; width: 100%;">{{ __('joinus.apply_now') }}</button>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
<div class="workplace-atmosphere" style="padding: 80px 0; background: white;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <!-- Section Header - Centered -->
        <div class="section-header" style="text-align: center; margin-bottom: 60px;">
            <h2 style="font-size: 2.5rem; color: #2d3748; margin-bottom: 20px; font-weight: bold;">{{ __('joinus.internship.atmosphere_title') }}</h2>
            <p style="font-size: 1.2rem; color: #718096; margin: 0 auto; max-width: 600px;">{{ __('joinus.internship.atmosphere_subtitle') }}</p>
        </div>

        <!-- Image Gallery Container - Perfectly Centered -->
        <div class="image-gallery-wrapper" style="
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            margin: 0 auto;
        ">
            <!-- Main Image Display - Centered -->
            <div class="main-image-container" style="
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100%;
                margin-bottom: 30px;
                padding: 0 20px;
            ">
                <img id="mainImage" 
                     src="/img/joinus/0.jpg" 
                     alt="{{ __('joinus.internship.workplace_image_alt') }}" 
                     style="
                        width: 100%;
                        max-width: 800px;
                        height: 450px;
                        object-fit: cover;
                        border-radius: 20px;
                        cursor: pointer;
                        transition: transform 0.3s ease, box-shadow 0.3s ease;
                        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
                        display: block;
                        margin: 0 auto;
                     " 
                     onmouseover="this.style.transform='scale(1.02)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.15)'" 
                     onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 15px 35px rgba(0,0,0,0.1)'">
            </div>

            <!-- Thumbnail Gallery - Centered -->
            <div class="thumbnail-wrapper" style="
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100%;
                margin-bottom: 30px;
                overflow: hidden;
            ">
                <div class="thumbnail-container" style="
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    gap: 15px;
                    padding: 20px;
                    overflow-x: auto;
                    scroll-behavior: smooth;
                    scrollbar-width: none;
                    -ms-overflow-style: none;
                    max-width: 100%;
                ">
                    <img src="/img/joinus/0.jpg" alt="Thumbnail 1" class="thumbnail active" data-index="0" 
                         onclick="changeMainImage(this, 0)"
                         style="
                            width: 80px;
                            height: 80px;
                            object-fit: cover;
                            border-radius: 10px;
                            cursor: pointer;
                            transition: all 0.3s ease;
                            border: 3px solid #667eea;
                            opacity: 1;
                            flex-shrink: 0;
                         ">
                    
                    <img src="/img/joinus/1.jpg" alt="Thumbnail 2" class="thumbnail" data-index="1" 
                         onclick="changeMainImage(this, 1)"
                         style="
                            width: 80px;
                            height: 80px;
                            object-fit: cover;
                            border-radius: 10px;
                            cursor: pointer;
                            transition: all 0.3s ease;
                            border: 3px solid transparent;
                            opacity: 0.7;
                            flex-shrink: 0;
                         ">
                    
                    <img src="/img/joinus/2.jpg" alt="Thumbnail 3" class="thumbnail" data-index="2" 
                         onclick="changeMainImage(this, 2)"
                         style="
                            width: 80px;
                            height: 80px;
                            object-fit: cover;
                            border-radius: 10px;
                            cursor: pointer;
                            transition: all 0.3s ease;
                            border: 3px solid transparent;
                            opacity: 0.7;
                            flex-shrink: 0;
                         ">
                    
                    <img src="/img/joinus/3.jpg" alt="Thumbnail 4" class="thumbnail" data-index="3" 
                         onclick="changeMainImage(this, 3)"
                         style="
                            width: 80px;
                            height: 80px;
                            object-fit: cover;
                            border-radius: 10px;
                            cursor: pointer;
                            transition: all 0.3s ease;
                            border: 3px solid transparent;
                            opacity: 0.7;
                            flex-shrink: 0;
                         ">
                    
                    <img src="/img/joinus/4.jpg" alt="Thumbnail 5" class="thumbnail" data-index="4" 
                         onclick="changeMainImage(this, 4)"
                         style="
                            width: 80px;
                            height: 80px;
                            object-fit: cover;
                            border-radius: 10px;
                            cursor: pointer;
                            transition: all 0.3s ease;
                            border: 3px solid transparent;
                            opacity: 0.7;
                            flex-shrink: 0;
                         ">
                    
                    <img src="/img/joinus/5.jpg" alt="Thumbnail 6" class="thumbnail" data-index="5" 
                         onclick="changeMainImage(this, 5)"
                         style="
                            width: 80px;
                            height: 80px;
                            object-fit: cover;
                            border-radius: 10px;
                            cursor: pointer;
                            transition: all 0.3s ease;
                            border: 3px solid transparent;
                            opacity: 0.7;
                            flex-shrink: 0;
                         ">
                    
                    <img src="/img/joinus/6.jpg" alt="Thumbnail 7" class="thumbnail" data-index="6" 
                         onclick="changeMainImage(this, 6)"
                         style="
                            width: 80px;
                            height: 80px;
                            object-fit: cover;
                            border-radius: 10px;
                            cursor: pointer;
                            transition: all 0.3s ease;
                            border: 3px solid transparent;
                            opacity: 0.7;
                            flex-shrink: 0;
                         ">
                </div>
            </div>
            
            <!-- Navigation Controls - Perfectly Centered -->
            <div class="gallery-controls" style="
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 20px;
                width: 100%;
                margin-top: 20px;
            ">
                <button class="chev chev-left" onclick="previousImage()" style="
                    width: 50px;
                    height: 50px;
                    border-radius: 50%;
                    border: 2px solid #667eea;
                    background: white;
                    color: #667eea;
                    cursor: pointer;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    transition: all 0.3s ease;
                    font-size: 20px;
                    font-weight: bold;
                " onmouseover="this.style.background='#667eea'; this.style.color='white'" onmouseout="this.style.background='white'; this.style.color='#667eea'">
                    ‹
                </button>
                
                <div class="dot-container" style="
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    gap: 10px;
                ">
                    <button class="dot active" data-index="0" onclick="goToImage(0)" style="width: 12px; height: 12px; border-radius: 50%; border: none; background: #667eea; cursor: pointer; transition: background 0.3s ease;"></button>
                    <button class="dot" data-index="1" onclick="goToImage(1)" style="width: 12px; height: 12px; border-radius: 50%; border: none; background: #cbd5e0; cursor: pointer; transition: background 0.3s ease;"></button>
                    <button class="dot" data-index="2" onclick="goToImage(2)" style="width: 12px; height: 12px; border-radius: 50%; border: none; background: #cbd5e0; cursor: pointer; transition: background 0.3s ease;"></button>
                    <button class="dot" data-index="3" onclick="goToImage(3)" style="width: 12px; height: 12px; border-radius: 50%; border: none; background: #cbd5e0; cursor: pointer; transition: background 0.3s ease;"></button>
                    <button class="dot" data-index="4" onclick="goToImage(4)" style="width: 12px; height: 12px; border-radius: 50%; border: none; background: #cbd5e0; cursor: pointer; transition: background 0.3s ease;"></button>
                    <button class="dot" data-index="5" onclick="goToImage(5)" style="width: 12px; height: 12px; border-radius: 50%; border: none; background: #cbd5e0; cursor: pointer; transition: background 0.3s ease;"></button>
                    <button class="dot" data-index="6" onclick="goToImage(6)" style="width: 12px; height: 12px; border-radius: 50%; border: none; background: #cbd5e0; cursor: pointer; transition: background 0.3s ease;"></button>
                </div>
                
                <button class="chev chev-right" onclick="nextImage()" style="
                    width: 50px;
                    height: 50px;
                    border-radius: 50%;
                    border: 2px solid #667eea;
                    background: #667eea;
                    color: white;
                    cursor: pointer;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    transition: all 0.3s ease;
                    font-size: 20px;
                    font-weight: bold;
                " onmouseover="this.style.background='#5a67d8'" onmouseout="this.style.background='#667eea'">
                    ›
                </button>
            </div>
        </div>

        <!-- Video Section - Perfectly Centered -->
        <div class="video-section" style="
            text-align: center;
            margin-top: 80px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        ">
            <h3 style="font-size: 2rem; color: #2d3748; margin-bottom: 30px; font-weight: 600;">{{ __('joinus.internship.video_title') }}</h3>
            <div style="
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100%;
            ">
                <div style="
                    border-radius: 15px;
                    overflow: hidden;
                    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
                    max-width: 800px;
                    width: 100%;
                ">
                    <video width="100%" height="450" controls style="display: block;">
                        <source src="/img/joinus/Intern.mp4" type="video/mp4">
                        {{ __('joinus.internship.video_not_supported') }}
                    </video>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Overlay Modal -->
<div class="overlay" id="overlay" style="
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.9);
    z-index: 1000;
    align-items: center;
    justify-content: center;
">
    <span class="close" id="closeBtn" style="
        position: absolute;
        top: 20px;
        right: 30px;
        color: white;
        font-size: 40px;
        cursor: pointer;
        z-index: 1001;
    ">&times;</span>
    <img id="overlayImg" src="/placeholder.svg" alt="{{ __('joinus.internship.image_overlay_alt') }}" style="
        max-width: 90%;
        max-height: 90%;
        object-fit: contain;
    ">
</div>

<script>
let currentImageIndex = 0;
const images = [
    '/img/joinus/0.jpg',
    '/img/joinus/1.jpg',
    '/img/joinus/2.jpg',
    '/img/joinus/3.jpg',
    '/img/joinus/4.jpg',
    '/img/joinus/5.jpg',
    '/img/joinus/6.jpg'
];

function changeMainImage(thumbnail, index) {
    const mainImage = document.getElementById('mainImage');
    const thumbnails = document.querySelectorAll('.thumbnail');
    const dots = document.querySelectorAll('.dot');
    
    // Update main image with fade effect
    mainImage.style.opacity = '0.5';
    setTimeout(() => {
        mainImage.src = images[index];
        mainImage.style.opacity = '1';
    }, 150);
    
    currentImageIndex = index;
    
    // Update thumbnail styles
    thumbnails.forEach((thumb, i) => {
        if (i === index) {
            thumb.style.border = '3px solid #667eea';
            thumb.style.opacity = '1';
            thumb.style.transform = 'scale(1.1)';
        } else {
            thumb.style.border = '3px solid transparent';
            thumb.style.opacity = '0.7';
            thumb.style.transform = 'scale(1)';
        }
    });
    
    // Update dots
    dots.forEach((dot, i) => {
        if (i === index) {
            dot.style.background = '#667eea';
            dot.style.transform = 'scale(1.2)';
        } else {
            dot.style.background = '#cbd5e0';
            dot.style.transform = 'scale(1)';
        }
    });
}

function nextImage() {
    const nextIndex = (currentImageIndex + 1) % images.length;
    const nextThumbnail = document.querySelector(`[data-index="${nextIndex}"]`);
    changeMainImage(nextThumbnail, nextIndex);
}

function previousImage() {
    const prevIndex = (currentImageIndex - 1 + images.length) % images.length;
    const prevThumbnail = document.querySelector(`[data-index="${prevIndex}"]`);
    changeMainImage(prevThumbnail, prevIndex);
}

function goToImage(index) {
    const thumbnail = document.querySelector(`[data-index="${index}"]`);
    changeMainImage(thumbnail, index);
}

// Image overlay functionality
document.getElementById('mainImage').addEventListener('click', function() {
    const overlay = document.getElementById('overlay');
    const overlayImg = document.getElementById('overlayImg');
    
    overlay.style.display = 'flex';
    overlayImg.src = this.src;
    document.body.style.overflow = 'hidden';
});

document.getElementById('closeBtn').addEventListener('click', function() {
    const overlay = document.getElementById('overlay');
    overlay.style.display = 'none';
    document.body.style.overflow = 'auto';
});

document.getElementById('overlay').addEventListener('click', function(e) {
    if (e.target === this) {
        this.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
});

// Keyboard navigation
document.addEventListener('keydown', function(e) {
    if (e.key === 'ArrowLeft') {
        previousImage();
    } else if (e.key === 'ArrowRight') {
        nextImage();
    } else if (e.key === 'Escape') {
        const overlay = document.getElementById('overlay');
        if (overlay.style.display === 'flex') {
            overlay.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    }
});

// Auto-play functionality
let autoPlayInterval;

function startAutoPlay() {
    autoPlayInterval = setInterval(nextImage, 5000);
}

function stopAutoPlay() {
    clearInterval(autoPlayInterval);
}

// Initialize when page loads
document.addEventListener('DOMContentLoaded', function() {
    // Center the first thumbnail
    changeMainImage(document.querySelector('[data-index="0"]'), 0);
    
    // Start auto-play
    startAutoPlay();
    
    // Pause auto-play on hover
    const galleryContainer = document.querySelector('.image-gallery-wrapper');
    galleryContainer.addEventListener('mouseenter', stopAutoPlay);
    galleryContainer.addEventListener('mouseleave', startAutoPlay);
});
</script>

<style>
/* Hide scrollbars */
.thumbnail-container::-webkit-scrollbar {
    display: none;
}

/* Ensure perfect centering on all devices */
.image-gallery-wrapper {
    text-align: center;
}

.main-image-container {
    text-align: center;
}

.thumbnail-wrapper {
    text-align: center;
}

.gallery-controls {
    text-align: center;
}

.video-section {
    text-align: center;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .main-image-container img {
        height: 300px !important;
        max-width: 95% !important;
    }
    
    .thumbnail {
        width: 60px !important;
        height: 60px !important;
    }
    
    .thumbnail-container {
        gap: 10px !important;
        padding: 15px !important;
    }
    
    .gallery-controls {
        flex-direction: column;
        gap: 15px !important;
    }
    
    .video-section video {
        height: 250px !important;
    }
    
    .section-header h2 {
        font-size: 2rem !important;
    }
    
    .section-header p {
        font-size: 1rem !important;
    }
}

@media (max-width: 480px) {
    .main-image-container {
        padding: 0 10px !important;
    }
    
    .main-image-container img {
        height: 250px !important;
    }
    
    .thumbnail {
        width: 50px !important;
        height: 50px !important;
    }
    
    .thumbnail-container {
        gap: 8px !important;
        padding: 10px !important;
    }
    
    .chev {
        width: 40px !important;
        height: 40px !important;
        font-size: 16px !important;
    }
    
    .dot {
        width: 10px !important;
        height: 10px !important;
    }
}

/* Animation enhancements */
.thumbnail {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
}

.dot {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
}

#mainImage {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
}
</style>


        

    <!-- Image Overlay Modal -->
    <div class="overlay" id="overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.9); z-index: 1000; align-items: center; justify-content: center;">
        <span class="close" id="closeBtn" style="position: absolute; top: 20px; right: 30px; color: white; font-size: 40px; cursor: pointer;">&times;</span>
        <img id="overlayImg" src="/placeholder.svg" alt="{{ __('joinus.internship.image_overlay_alt') }}" style="max-width: 90%; max-height: 90%; object-fit: contain;">
    </div>

    <!-- Enhanced JavaScript for Image Gallery -->
    <script>
        const imageSlide = document.querySelector('.image-slide');
        const slider = imageSlide.querySelector('.slider');
        const left = imageSlide.querySelector('.chev-left');
        const right = imageSlide.querySelector('.chev-right');
        const dotContainer = imageSlide.querySelectorAll('.dot-container button');

        let count = 0;

        function updateColor() {
            if (count == 0) {
                left.style.background = 'white';
                left.style.color = '#667eea';
            } else {
                left.style.background = '#667eea';
                left.style.color = 'white';
            }
            if (count == 3) {
                right.style.background = 'white';
                right.style.color = '#667eea';
            } else {
                right.style.background = '#667eea';
                right.style.color = 'white';
            }

            dotContainer.forEach((btn, idx) => {
                if (idx === count) {
                    btn.style.background = '#667eea';
                } else {
                    btn.style.background = '#cbd5e0';
                }
            });
        }

        left.addEventListener('click', () => {
            slider.scrollLeft -= 420;
            if (count > 0) {
                count--;
                updateColor();
            }
        });

        right.addEventListener('click', () => {
            slider.scrollLeft += 420;
            if (count < 3) {
                count++;
                updateColor();
            }
        });

        // Image overlay functionality
        const images = document.querySelectorAll(".slider img");
        const overlay = document.getElementById("overlay");
        const overlayImg = document.getElementById("overlayImg");
        const closeBtn = document.getElementById("closeBtn");

        images.forEach(img => {
            img.addEventListener("click", () => {
                overlay.style.display = "flex";
                overlayImg.src = img.src;
                document.body.style.overflow = "hidden";
            });
        });

        closeBtn.addEventListener("click", () => {
            overlay.style.display = "none";
            document.body.style.overflow = "auto";
        });

        overlay.addEventListener("click", (e) => {
            if (e.target === overlay) {
                overlay.style.display = "none";
                document.body.style.overflow = "auto";
            }
        });

        // Add hover effects for benefit cards and job listings
        document.addEventListener('DOMContentLoaded', function() {
            const benefitCards = document.querySelectorAll('.benefit-card');
            const jobListings = document.querySelectorAll('.job-listing');
            
            benefitCards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.style.transform = 'translateY(-10px)';
                    card.style.boxShadow = '0 20px 40px rgba(0,0,0,0.15)';
                });
                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'translateY(0)';
                    card.style.boxShadow = '0 10px 30px rgba(0,0,0,0.1)';
                });
            });

            jobListings.forEach(job => {
                job.addEventListener('mouseenter', () => {
                    job.style.transform = 'translateY(-5px)';
                    job.style.boxShadow = '0 15px 35px rgba(0,0,0,0.15)';
                });
                job.addEventListener('mouseleave', () => {
                    job.style.transform = 'translateY(0)';
                    job.style.boxShadow = '0 10px 30px rgba(0,0,0,0.1)';
                });
            });

            // Smooth scroll animation for timeline
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

            document.querySelectorAll('.step-timeline-item').forEach((step, index) => {
                step.style.opacity = '0';
                step.style.transform = 'translateY(30px)';
                step.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(step);
            });
        });
    </script>

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
                    <button type="button" class="btn-cancel" onclick="closeJobModal()">{{ __('joinus.cancel_button') }}</button>
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
            fullNameLabel: '{{ __('joinus.full_name_label') }}',
            emailLabel: '{{ __('joinus.email_label') }}',
            phoneLabel: '{{ __('joinus.phone_label') }}',
            positionLabel: '{{ __('joinus.position_label') }}',
            experienceLabel: '{{ __('joinus.experience_label') }}',
            educationLabel: '{{ __('joinus.education_label') }}'
        };

        // Job positions data
        const jobPositions = {};
        const jj = @json($jobs);
        jj.forEach(job => {
            let localPosition = job.translation.position;
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

            const formData = new FormData(this)
            const data = {}
            for (const [key, value] of formData.entries()) {
                data[key] = value
            }

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

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
            if (!emailRegex.test(data.email)) {
                document.getElementById("email").style.borderColor = "#dc3545"
                showError(localizedText.errorInvalidEmail)
                return
            }

            showLoading()

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

            emailjs.send('Thome', 'template_shjqlbp', templateParams)
                .then(function(response) {
                    console.log('SUCCESS!', response.status, response.text);
                    resetSubmitButton()
                    closeJobModal()
                    document.getElementById("successMessage").style.display = "block"
                }, function(error) {
                    console.log('FAILED...', error);
                    resetSubmitButton()
                    showError(`${localizedText.errorEmailSending} ${error.text || error.message || 'Unknown error'}`)
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

            document.querySelectorAll('.step-item').forEach((step, index) => {
                step.style.opacity = '0';
                step.style.transform = 'translateY(30px)';
                step.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(step);
            });
        })
    </script>
@endsection