@extends('layouts.layout_home')

@section('title', __('privacy.page_title'))
@section('meta_description', __('privacy.page_description'))

@section('content')
<link rel="stylesheet" href="/css/home/addon_service/privacy.css">

<div class="privacy-page">
    <!-- Header Section -->
    <section class="privacy-header">
        <div class="container">
            <div class="privacy-header-content">
                <h1 class="privacy-title">{{ __('privacy.page_title') }}</h1>
                <p class="privacy-subtitle">{{ __('privacy.page_subtitle') }}</p>
                <div class="last-updated">
                    <i class="fas fa-calendar-alt"></i>
                    {{ __('privacy.last_updated') }}: {{ __('privacy.update_date') }}
                </div>
            </div>
        </div>
    </section>

    <!-- Privacy Content -->
    <section class="privacy-content">
        <div class="container">
            <div class="privacy-wrapper">
                <!-- Introduction -->
                <div class="privacy-section">
                    <div class="section-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="section-content">
                        <h2>{{ __('privacy.intro_title') }}</h2>
                        <p>{{ __('privacy.intro_content') }}</p>
                    </div>
                </div>

                <!-- Section 1: Data Collection -->
                <div class="privacy-section">
                    <div class="section-icon">
                        <i class="fas fa-database"></i>
                    </div>
                    <div class="section-content">
                        <h2>{{ __('privacy.section1_title') }}</h2>
                        <p>{{ __('privacy.section1_intro') }}</p>
                        <ul class="privacy-list">
                            <li><i class="fas fa-check"></i> {{ __('privacy.data_name') }}</li>
                            <li><i class="fas fa-check"></i> {{ __('privacy.data_email') }}</li>
                            <li><i class="fas fa-check"></i> {{ __('privacy.data_phone') }}</li>
                            <li><i class="fas fa-check"></i> {{ __('privacy.data_address') }}</li>
                            <li><i class="fas fa-check"></i> {{ __('privacy.data_property_info') }}</li>
                        </ul>
                    </div>
                </div>

                <!-- Section 2: Data Usage -->
                <div class="privacy-section">
                    <div class="section-icon">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <div class="section-content">
                        <h2>{{ __('privacy.section2_title') }}</h2>
                        <p>{{ __('privacy.section2_intro') }}</p>
                        <ul class="privacy-list">
                            <li><i class="fas fa-arrow-right"></i> {{ __('privacy.usage_service') }}</li>
                            <li><i class="fas fa-arrow-right"></i> {{ __('privacy.usage_support') }}</li>
                            <li><i class="fas fa-arrow-right"></i> {{ __('privacy.usage_communication') }}</li>
                            <li><i class="fas fa-arrow-right"></i> {{ __('privacy.usage_improvement') }}</li>
                        </ul>
                    </div>
                </div>

                <!-- Section 3: Data Disclosure -->
                <div class="privacy-section">
                    <div class="section-icon">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <div class="section-content">
                        <h2>{{ __('privacy.section3_title') }}</h2>
                        <p>{{ __('privacy.section3_intro') }}</p>
                        <div class="highlight-box">
                            <h4>{{ __('privacy.disclosure_exceptions') }}</h4>
                            <ul class="privacy-list">
                                <li><i class="fas fa-gavel"></i> {{ __('privacy.exception_legal') }}</li>
                                <li><i class="fas fa-shield-alt"></i> {{ __('privacy.exception_safety') }}</li>
                                <li><i class="fas fa-handshake"></i> {{ __('privacy.exception_consent') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Section 4: Data Retention -->
                <div class="privacy-section">
                    <div class="section-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="section-content">
                        <h2>{{ __('privacy.section4_title') }}</h2>
                        <p>{{ __('privacy.section4_content') }}</p>
                    </div>
                </div>

                <!-- Section 5: User Rights -->
                <div class="privacy-section">
                    <div class="section-icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div class="section-content">
                        <h2>{{ __('privacy.section5_title') }}</h2>
                        <p>{{ __('privacy.section5_intro') }}</p>
                        <div class="rights-grid">
                            <div class="right-item">
                                <i class="fas fa-eye"></i>
                                <h4>{{ __('privacy.right_access') }}</h4>
                                <p>{{ __('privacy.right_access_desc') }}</p>
                            </div>
                            <div class="right-item">
                                <i class="fas fa-edit"></i>
                                <h4>{{ __('privacy.right_correct') }}</h4>
                                <p>{{ __('privacy.right_correct_desc') }}</p>
                            </div>
                            <div class="right-item">
                                <i class="fas fa-trash-alt"></i>
                                <h4>{{ __('privacy.right_delete') }}</h4>
                                <p>{{ __('privacy.right_delete_desc') }}</p>
                            </div>
                            <div class="right-item">
                                <i class="fas fa-ban"></i>
                                <h4>{{ __('privacy.right_withdraw') }}</h4>
                                <p>{{ __('privacy.right_withdraw_desc') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 6: Data Security -->
                <div class="privacy-section">
                    <div class="section-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="section-content">
                        <h2>{{ __('privacy.section6_title') }}</h2>
                        <p>{{ __('privacy.section6_content') }}</p>
                        <div class="security-features">
                            <div class="security-item">
                                <i class="fas fa-server"></i>
                                <span>{{ __('privacy.security_encryption') }}</span>
                            </div>
                            <div class="security-item">
                                <i class="fas fa-key"></i>
                                <span>{{ __('privacy.security_access_control') }}</span>
                            </div>
                            <div class="security-item">
                                <i class="fas fa-backup"></i>
                                <span>{{ __('privacy.security_backup') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 7: Policy Updates -->
                <div class="privacy-section">
                    <div class="section-icon">
                        <i class="fas fa-sync-alt"></i>
                    </div>
                    <div class="section-content">
                        <h2>{{ __('privacy.section7_title') }}</h2>
                        <p>{{ __('privacy.section7_content') }}</p>
                    </div>
                </div>

                <!-- Contact Section -->
                <div class="privacy-section contact-section">
                    <div class="section-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="section-content">
                        <h2>{{ __('privacy.contact_title') }}</h2>
                        <p>{{ __('privacy.contact_content') }}</p>
                        <div class="contact-info">
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>privacy@houseinspector.com</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <span>02-xxx-xxxx</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>{{ __('privacy.contact_address') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
