{{-- filepath: c:\xampp\htdocs\example-app\resources\views\home\service\hconstruction.blade.php --}}
@extends('layouts.layout_home')
@section('title', 'T. Home Construction')

@section('content')

    <link rel="stylesheet" href="/css/home/service/Hconstruction.css">

    <section class="hero-section">
        <div id="carouselExampleIndicators" class="carousel slide h-100" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                    aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                    aria-label="Slide 5"></button>
            </div>
            <div class="hero-content">
                <div class="logo-container">
                    <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/s3-3bLs5HKnwRUrK4px4T8zPO4uMNVUmo.png"
                        alt="T. HOME CONSTRUCTION Logo" class="hero-logo">
                </div>
                <h1 class="hero-title">{{ __('hconstruction.hero-title') }}</h1>
                <div class="hero-description">{!! __('hconstruction.hero-description') !!}</div>
                <a href="Homepage/Contactus.php" class="hero-btn">{{ __('hconstruction.contact-btn') }}</a>
            </div>
            <div class="carousel-inner h-100">
                <div class="carousel-item active h-100">
                    <img src="/img/hero-bg/construct/1.jpg"
                        class="hero-bg" alt="...">
                </div>
                <div class="carousel-item h-100 p-0">
                    <div class="hero-detail-container">
                        <img src="/img/hero-bg/construct/2.jpg" alt="...">
                    </div>
                </div>
                <div class="carousel-item h-100 p-0">
                    <div class="hero-detail-container">
                        <img src="/img/hero-bg/construct/3.jpg" alt="...">
                    </div>
                </div>
                <div class="carousel-item h-100 p-0">
                    <div class="hero-detail-container">
                        <img src="/img/hero-bg/construct/4.jpg" alt="...">
                    </div>
                </div>
                <div class="carousel-item h-100 p-0">
                    <div class="hero-detail-container">
                        <img src="/img/hero-bg/construct/5.jpg" alt="...">
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- 🏠 Services Section -->
    <section class="services-section" id="services" data-aos="fade-up">
        <div>
            <h2 class="section-title">{{ __('hconstruction.services-title') }}</h2>
            <div class="services-description">
                <div>{{ __('hconstruction.services-description') }}</div>
            </div>

            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-tools"></i></div>
                    <div class="service-title">{{ __('hconstruction.service1-title') }}</div>
                    <div class="service-text">{{ __('hconstruction.service1-text') }}</div>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-paint-roller"></i></div>
                    <div class="service-title">{{ __('hconstruction.service2-title') }}</div>
                    <div class="service-text">{{ __('hconstruction.service2-text') }}</div>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-hard-hat"></i></div>
                    <div class="service-title">{{ __('hconstruction.service3-title') }}</div>
                    <div class="service-text">{{ __('hconstruction.service3-text') }}</div>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-lightbulb"></i></div>
                    <div class="service-title">{{ __('hconstruction.service4-title') }}</div>
                    <div class="service-text">{{ __('hconstruction.service4-text') }}</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ส่วนเกี่ยวกับเรา -->
    <section class="about-section" id="about" data-aos="fade-up">
        <div class="container">
            <h2 class="section-title">{{ __('hconstruction.about-title') }}</h2>
            <div class="about-container gap-sm-4 gap-md-5">
                <figure class="about-image justify-content-sm-center justify-content-md-end">
                    {{-- <img alt="ทีมงานของเรา"> --}}
                </figure>
                <script>
                        const imgList = [
                            '/img/hero-bg/construct/section/1.jpg',
                            '/img/hero-bg/construct/section/2.jpg',
                            '/img/hero-bg/construct/section/3.jpg',
                            '/img/hero-bg/construct/section/4.jpg',
                            '/img/hero-bg/construct/section/5.jpg',
                            // '/img/hero-bg/construct/section/6.jpg',
                        ];
                        let imgIx = 0;
                        const aboutImage = document.querySelector('.about-image');
                        setInterval(() => {
                            imgIx = (imgIx + 1) % imgList.length;
                            aboutImage.style.backgroundImage = `url(${imgList[imgIx]})`;
                        }, 3000); // Change image every 3 seconds
                        // aboutImage.style.transition = 'opacity 0.5s';
                    </script>
                <div class="about-content">
                    {{-- <p class="about-description">{{ __('hconstruction.about-description') }}</p> --}}
                    <ul class="about-features">
                        <li class="about-feature">
                            <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                            <span>{{ __('hconstruction.about-feature1') }}</span>
                        </li>
                        <li class="about-feature">
                            <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                            <span>{{ __('hconstruction.about-feature2') }}</span>
                        </li>
                        <li class="about-feature">
                            <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                            <span>{{ __('hconstruction.about-feature3') }}</span>
                        </li>
                        <li class="about-feature">
                            <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                            <span>{{ __('hconstruction.about-feature4') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="review-page aos-init aos-animate" data-aos="fade-up">
        <h1>{{ __('hconstruction.review-title') }}</h1>
        <br>
        <div class="categories aos-init aos-animate" data-aos="fade-up" data-aos-duration="1500">
            <button class="category-btn active" data-category="all">{{ __('hconstruction.category-all') }}</button>
            @foreach ($tags as $tag)
                <button class="category-btn" data-category="{{ $tag->translation['title'] }}">{{ $tag->translation['title'] }}</button>
            @endforeach
            {{-- <button class="category-btn" data-category="Modern">{{ __('hconstruction.category-modern') }}</button>
            <button class="category-btn"
                data-category="Modern Luxury">{{ __('hconstruction.category-modern-luxury') }}</button>
            <button class="category-btn"
                data-category="Modern Classic">{{ __('hconstruction.category-modern-classic') }}</button> --}}
        </div>
        <div class="review-cards">
            @foreach ($projects as $project)
                <a class="card" data-category="{{ $project->tag->translation['title'] }}"
                    href="/hconstruction/project/{{ $project->id }}">
                    <img src="{{ $project->coverPageImg }}">
                    <p>{{ $project->translation['title'] }}</p>
                </a>
            @endforeach

            {{-- <a class="card" data-category="Modern" href="https://thomeinspector1.netlify.app/after_review_interior2">
                <img src="/img/after_review/interrior-bg2.jpg" alt="House Review 2">
                <p>{{ __('hconstruction.review2-title') }}</p>
            </a>
            <a class="card" data-category="Modern" href="https://thomeinspector1.netlify.app/after_review_interior3">
                <img src="/img/after_review/interrior-bg3.jpg" alt="House Review 3">
                <p>{{ __('hconstruction.review3-title') }}</p>
            </a>
            <a class="card" data-category="Modern Luxury"
                href="https://thomeinspector1.netlify.app/after_review_interior4">
                <img src="/img/after_review/interrior-bg4.jpg" alt="House Review 4">
                <p>{{ __('hconstruction.review4-title') }}</p>
            </a>
            <a class="card" data-category="Modern Luxury"
                href="https://thomeinspector1.netlify.app/after_review_interior5">
                <img src="/img/after_review/interrior-bg5.jpg" alt="House Review 5">
                <p>{{ __('hconstruction.review5-title') }}</p>
            </a>
            <a class="card" data-category="Modern Luxury"
                href="https://thomeinspector1.netlify.app/after_review_interior6">
                <img src="/img/after_review/interrior-bg6.jpg" alt="House Review 6">
                <p>{{ __('hconstruction.review6-title') }}</p>
            </a>
            <a class="card" data-category="Modern Classic"
                href="https://thomeinspector1.netlify.app/after_review_interior7">
                <img src="/img/after_review/interrior-bg7.jpg" alt="House Review 7">
                <p>{{ __('hconstruction.review7-title') }}</p>
            </a>
            <a class="card" data-category="Modern Classic"
                href="https://thomeinspector1.netlify.app/after_review_interior8">
                <img src="/img/after_review/interrior-bg8.jpg" alt="House Review 8">
                <p>{{ __('hconstruction.review8-title') }}</p>
            </a>
            <a class="card" data-category="Modern Classic"
                href="https://thomeinspector1.netlify.app/after_review_interior9">
                <img src="/img/after_review/interrior-bg9.jpg" alt="House Review 9">
                <p>{{ __('hconstruction.review9-title') }}</p>
            </a> --}}
        </div>
    </div>

@section('title', __('portfolio.page_title'))
@section('meta_description', __('portfolio.page_description'))

@section('content')
<link rel="stylesheet" href="/css/home/addon_service/port.css">

    <!-- Social Media Section -->
    <section class="social-media-section">
        <div class="container">
            <div class="social-header">
                <h2 class="section-title">{{ __('portfolio.social_title') }}</h2>
                <div class="social-stats">
                    <div class="social-stat">
                        <i class="fab fa-facebook"></i>
                        <span>1000+ {{ __('portfolio.followers') }}</span>
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
                            <h3>ต.ต่อเติม</h3>
                        </div>
                        <a href="https://www.facebook.com/t.homeconstruction/" target="_blank" class="facebook-follow">
                            <i class="fas fa-external-link-alt"></i>
                            {{ __('portfolio.visit_page') }}
                        </a>
                    </div>
                    
                    <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous"
                            src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v23.0"></script>
                    
                    <div class="facebook-embed">
                        <div class="fb-page"
                             data-href="https://www.facebook.com/t.homeconstruction/"
                             data-tabs="timeline"
                             data-width="500"
                             data-height="800"
                             data-small-header="false"
                             data-adapt-container-width="true"
                             data-hide-cover="false"
                             data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/t.homeconstruction/" class="fb-xfbml-parse-ignore">
                                <a href="https://www.facebook.com/t.homeconstruction/">ต.ตรวจบ้าน</a>
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



    <script src="/js/home/service/Hconstruction.js"></script>

@endsection
