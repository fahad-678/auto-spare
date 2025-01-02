<div class="container px-0">
    <div class="row g-0">
        <div class="col-12">
            <div class="card text-bg-dark">
                <img src="{{ asset('assets/media/stock/900x600/81.jpg') }}" class="card-img flash-sale-img"
                    alt="Flash Sale Background" loading="lazy">
                <div class="card-img-overlay p-0 d-flex flex-column flash-sale-overlay">
                    <div class="row g-0 h-md-100">
                        <div class="col-12 col-md-2 mb-3 mb-md-0 text-bg-dark py-7 py-md-0 d-md-flex align-items-center justify-content-center px-md-4 rounded">
                            <div
                                class="flash-sale-content d-flex d-md-block flex-column align-items-center justify-content-center">
                                <h2 class="fs-2x fw-bolder animate text-white" data-animate="bounceIn">Flash <span
                                        class="text-primary">SALE</span></h2>
                                <p class="fs-4">Get the best offer on our exclusive Part</p>
                                <div class="bg-primary p-2 text-white d-inline-block text-center text-md-start">
                                    <p class="mb-0 fw-bold">NK BEST</p>
                                    <p class="mb-0">RUNNING ITEMS</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-10 d-md-flex align-items-center px-2 px-md-0">
                            <div class="hot-items-slider mt-7 mt-md-0 px-md-7">
                                @foreach ($hotItems as $item)
                                    <div class="slider-item">
                                        <x-product.card :product="$item" viewType="hot_item" route="category" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (window.innerWidth >= 768) {
            $('.hot-items-slider').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: false,
                dots: false,
                responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2
                    }
                }]
            });
        }
    });
</script>
