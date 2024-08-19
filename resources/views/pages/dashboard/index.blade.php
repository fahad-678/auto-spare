@extends('layout.master')

@section('content')

<div class="position-relative">
    
    <div id="carouselExampleSlidesOnly" class="carousel slide hero-section" data-bs-ride="carousel">
        <div class="position-absolute hero-text">
            <p class="fs-2hx fst-italic text-white animate" data-animate="left" >Welcome to <span class="text-primary">Auto</span>Store</p>
            <p class="fs-3x text-white fw-bolder animate"><span class="text-primary">THE BEST</span> AUTOMOTIVE SHOP</p>
            <p class="text-white animate">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <p class="text-white animate"> adipisci at totam fuga quibusdam</p>
            <button class="btn btn-primary animate" data-animate="bottom" >Explore More</button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="3000">
            <img src="{{asset('assets/media/stock/1600x800/simage1.jpg')}}" class="d-block w-100 img-dark" alt="....">
          </div>
          <div class="carousel-item" data-bs-interval="3000">
            <img src="{{asset('assets/media/stock/1600x800/simage.jpg')}}" class="d-block w-100 img-dark" alt="....">
          </div>
          <div class="carousel-item" data-bs-interval="3000">
            <img src="{{asset('assets/media/stock/1600x800/img-4.jpg')}}" class="d-block w-100 img-dark" alt="....">
          </div>
        </div>
    </div>
    {{-- <div class="card overflow-hidden ">
        <img src="{{asset('assets/media/icons/duotune/general/gen001.svg')}}" alt="Logo" class="d-inline-block align-text-top">
    </div> --}}
    <div class="d-md-flex container my-lg-10">
        <div class="row px-2 w-100">
            <div class="col-md-3 d-flex animate"  data-delay="0.2s">
              <div class="col-md-6">
                <img src="{{asset('assets/media/img/bestquality.jpg')}}" class="rounded-circle shadow" width="140px" height="140px" alt="...">
              </div>
              <div class="col-md-6 d-flex align-items-center">
                <div class="card-body p-2 justify-content-center">
                  <h5 class="card-title">Best Quality</h5>
                  {{-- <p class="card-text text-secondary">On all over $99.00</p> --}}
                </div>
              </div>
            </div>
            <div class="col-md-3 d-flex animate" data-delay="0.5s">
              <div class="col-md-6">
                <img src="{{asset('assets/media/img/bestprice.jpeg')}}" class="rounded-circle shadow" width="140px" height="140px" alt="...">
              </div>
              <div class="col-md-6 d-flex align-items-center">
                <div class="card-body p-2">
                  <h5 class="card-title">Best Price</h5>
                  {{-- <p class="card-text text-secondary">On all over $99.00</p> --}}
                </div>
              </div>
            </div>
            <div class="col-md-3 d-flex animate" data-delay="0.7s">
              <div class="col-md-6">
                <img src="{{asset('assets/media/img/wideparts.jpg')}}" class="rounded-circle shadow" width="140px" height="140px" alt="...">
              </div>
              <div class="col-md-6 d-flex align-items-center">
                <div class="card-body p-2">
                  <h5 class="card-title">Wide Range Parts</h5>
                  {{-- <p class="card-text text-secondary">On all over $99.00</p> --}}
                </div>
              </div>
            </div>
            <div class="col-md-3 d-flex animate" data-delay="0.9s">
              <div class="col-md-6">
                <img src="{{asset('assets/media/img/worldwideshipment.jpg')}}" class="rounded-circle shadow" width="140px" height="140px" alt="...">
              </div>
              <div class="col-md-6 d-flex align-items-center">
                <div class="card-body p-2">
                  <h5 class="card-title">WorldWide Shipments</h5>
                  {{-- <p class="card-text text-secondary">On all over $99.00</p> --}}
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

                const delay = $element.data("delay") || (["bounce", "zoomIn"].includes(animate) ? "1s" : "0s");
                $element.css("animation-delay", delay);

                const duration = $element.data("duration") || "2s";
                $element.css("animation-duration", duration);

                observer.unobserve(entry.target);
            };
      }, { threshold: 0.01 })
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
    }, { threshold: 0.1 });

    $(".counter").each(function() {
        observer.observe(this);
    });
  });
</script>
@endpush