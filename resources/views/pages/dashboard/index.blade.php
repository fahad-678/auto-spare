@extends('layout.master')

@section('content')
    <div class="position-relative hero-top-section">
        <div id="nkoldlogo" class="position-fixed nkoldlogo-transition" style="z-index: 1; top: 0px; right: 30px;">
            <img src="{{ asset('assets/media/logos/oldnklogo.png') }}" class="mt-5 rounded-start" id="logoImage" width="170px"
                height="100px" alt="...">
        </div>

        <!-- Carousel Section -->
        <div id="carouselExampleSlidesOnly" class="carousel slide hero-section" data-bs-ride="carousel">
            <div class="position-absolute hero-text text-center text-md-start px-3 px-md-0">
                <p class="fs-3 fs-md-2hx fst-italic fw-bold animate text-center text-md-start text-color-responsive"
                    data-animate="left">
                    Welcome to <span class="text-primary">{{ config('app.name') }}</span>
                </p>
                <p class="fs-4 fs-md-3x fw-bolder animate text-color-responsive">
                    The Best <span class="text-primary">Auto Spare Parts</span> Company
                </p>
                <button class="btn btn-primary animate" data-animate="bottom">Explore More</button>
            </div>


            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3000">
                    <img src="{{ asset('assets/media/hero-section/simage0.jpg') }}" class="d-block w-100 img-dark"
                        alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="{{ asset('assets/media/hero-section/simage1.jpg') }}" class="d-block w-100 img-dark"
                        alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="{{ asset('assets/media/hero-section/simage2.jpg') }}" class="d-block w-100 img-dark"
                        alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="{{ asset('assets/media/hero-section/simage3.jpg') }}" class="d-block w-100 img-dark"
                        alt="...">
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="d-md-flex container my-lg-10 my-4">
            <div class="row px-2 w-100 g-3 g-md-0">
                <div class="col-6 col-md-3 d-flex animate" data-delay="0.2s">
                    <div class="col-md-6">
                        <img src="{{ asset('assets/media/img/bestquality.jpg') }}"
                            class="rounded-circle shadow hero-section-img-round" width="140px" height="140px"
                            alt="...">
                    </div>
                    <div class="col-md-6 d-flex align-items-center">
                        <div class="card-body p-2 justify-content-center">
                            <h5 class="card-title">Best Quality</h5>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3 d-flex animate" data-delay="0.5s">
                    <div class="col-md-6">
                        <img src="{{ asset('assets/media/img/bestprice.jpeg') }}"
                            class="rounded-circle shadow hero-section-img-round" width="140px" height="140px"
                            alt="...">
                    </div>
                    <div class="col-md-6 d-flex align-items-center">
                        <div class="card-body p-2">
                            <h5 class="card-title">Best Price</h5>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3 d-flex animate" data-delay="0.7s">
                    <div class="col-md-6">
                        <img src="{{ asset('assets/media/img/wideparts.jpg') }}"
                            class="rounded-circle shadow hero-section-img-round" width="140px" height="140px"
                            alt="...">
                    </div>
                    <div class="col-md-6 d-flex align-items-center">
                        <div class="card-body p-2">
                            <h5 class="card-title">Wide Range Parts</h5>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3 d-flex animate" data-delay="0.9s">
                    <div class="col-md-6">
                        <img src="{{ asset('assets/media/img/worldwideshipment.jpg') }}"
                            class="rounded-circle shadow hero-section-img-round" width="140px" height="140px"
                            alt="...">
                    </div>
                    <div class="col-md-6 d-flex align-items-center">
                        <div class="card-body p-2">
                            <h5 class="card-title">WorldWide Shipments</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('pages.dashboard.hot-items')
    @include('pages.dashboard.new-arrivals')
    @include('pages.dashboard.promotion')
    @include('pages.dashboard.happy-customer')
    @include('pages.dashboard.why-us')
    @include('pages.dashboard.blog')
    @include('pages.dashboard.newsletter')
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            const classes = {
                right: "fadeInRight",
                left: "fadeInLeft",
                bottom: "fadeInUp",
                top: "fadeInDown",
                bounce: "bounce",
                bounceIn: "bounceIn",
                zoomIn: "zoomIn"
            };
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        const $element = $(entry.target);
                        const animate = $element.data("animate");

                        const animationClass = classes[animate] || classes["right"];
                        $element.addClass(`animate__animated animate__${animationClass}`);

                        const delay = $element.data("delay") || (["bounce", "zoomIn"].includes(
                            animate) ? "1s" : "0s");
                        $element.css("animation-delay", delay);

                        const duration = $element.data("duration") || "2s";
                        $element.css("animation-duration", duration);

                        observer.unobserve(entry.target);
                    };
                }, {
                    threshold: 0.01
                })
            })
            $(".animate").each(function() {
                observer.observe(this);
            });
        })
        $(document).ready(function() {
            function animateCounter(element, start, end, duration) {
                let range = end - start;
                let increment = range / (duration / 10);
                let current = start;
                let interval = setInterval(function() {
                    current += increment;
                    if (current >= end) {
                        current = end;
                        clearInterval(interval);
                    }
                    element.text(Math.floor(current));
                }, 10);
            }

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const $element = $(entry.target);
                        const endCount = parseInt($element.data("count"));
                        animateCounter($element, 0, endCount, 1700);
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });

            $(".counter").each(function() {
                observer.observe(this);
            });
        });
    </script>
    <script>
        const logo = document.getElementById('nkoldlogo');
        const img = logo.querySelector('img');
        const isMobile = window.innerWidth <= 768;
        logo.style.top = isMobile ? '40px' : '0px';
        img.style.width = isMobile ? '150px' : '170px';
        img.style.height = isMobile ? '90px' : '100px';
        logo.style.right = isMobile ? '20px' : '30px';

        window.addEventListener('scroll', function() {

            if (window.scrollY > 100) {
                img.classList.remove('mt-5');
                logo.style.top = 'auto';
                logo.style.bottom = isMobile ? '80px' : '120px';
                logo.style.right = isMobile ? '17px' : '39px';
                img.style.width = isMobile ? '50px' : '66px';
                img.style.height = isMobile ? '50px' : '66px';
            } else {
                img.classList.add('mt-5');
                logo.style.top = isMobile ? '40px' : '0';
                logo.style.right = isMobile ? '20px' : '30px';
                logo.style.bottom = 'auto';
                img.style.width = isMobile ? '150px' : '170px';
                img.style.height = isMobile ? '90px' : '100px';
            }
        });
    </script>
@endpush
