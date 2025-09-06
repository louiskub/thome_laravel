@extends('layouts.layout_home')

@section('title', __('portfolio.page_title'))
@section('meta_description', __('portfolio.page_description'))

@section('content')
<link rel="stylesheet" href="/css/home/addon_service/port.css">

<div class="portfolio-page">
    <!-- Header Section -->
    <section class="portfolio-header">
        <div class="container">
            <div class="portfolio-header-content">
                <div class="header-badge">
                    <i class="fas fa-award"></i>
                    <span>{{ __('portfolio.badge_text') }}</span>
                </div>
                <h1 class="portfolio-title">{{ __('portfolio.page_title') }}</h1>
    </section>

    <!-- Social Media Section -->
    <section class="social-media-section">
        <div class="container">
            <div class="social-header">
                <h2 class="section-title">{{ __('portfolio.social_title') }}</h2>
                <p class="section-description">{{ __('portfolio.social_description') }}</p>
                <div class="social-stats">
                    <div class="social-stat">
                        <i class="fab fa-facebook"></i>
                        <span>50000+ {{ __('portfolio.followers') }}</span>
                    </div>
                    <div class="social-stat">
                        <i class="fas fa-star"></i>
                        <span>4.9/5 {{ __('portfolio.rating') }}</span>
                    </div>
                </div>
            </div>

            <div class="facebook-container">
                <div class="facebook-wrapper">
                    <div class="facebook-header">
                        <div class="facebook-logo">
                            <i class="fab fa-facebook"></i>
                        </div>
                        <div class="facebook-info">
                            <h3>ต.ตรวจบ้าน</h3>
                            <p>{{ __('portfolio.facebook_subtitle') }}</p>
                        </div>
                        <a href="https://www.facebook.com/t.homeinspector" target="_blank" class="facebook-follow">
                            <i class="fas fa-external-link-alt"></i>
                            {{ __('portfolio.visit_page') }}
                        </a>
                    </div>
                    
                    <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous"
                            src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v23.0"></script>
                    
                    <div class="facebook-embed">
                        <div class="fb-page"
                             data-href="https://www.facebook.com/t.homeinspector"
                             data-tabs="timeline"
                             data-width="500"
                             data-height="800"
                             data-small-header="false"
                             data-adapt-container-width="true"
                             data-hide-cover="false"
                             data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/t.homeinspector" class="fb-xfbml-parse-ignore">
                                <a href="https://www.facebook.com/t.homeinspector">ต.ตรวจบ้าน</a>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<script>
// Simple AOS-like animation
document.addEventListener('DOMContentLoaded', function() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('aos-animate');
            }
        });
    }, observerOptions);

    document.querySelectorAll('[data-aos]').forEach(el => {
        observer.observe(el);
    });
});
</script>
@endsection
