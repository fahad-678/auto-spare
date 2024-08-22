<div class="container">
    {{-- <div class="row">
        <div class="col-5 animate" data-animate="left">
            <div class="card text-bg-dark">
                <img src="{{ asset('assets/media/stock/900x600/80.jpg') }}" class="card-img hot-items-img" alt="...">
                <div class="card-img-overlay d-flex flex-column align-items-end justify-content-center">
                    <p class="fst-italic">Get 20% Discount</p>
                    <p class="card-text text-end fs-2hx fw-bolder lh-1">Get your car fixed now</p>
                    <button class="card-text btn btn-primary btn-sm animate" data-animate="bounce">Discover
                        More</button>
                </div>
            </div>
        </div>
        <div class="col animate">
            <div class="card text-bg-dark">
                <img src="{{ asset('assets/media/stock/900x600/70.jpg') }}" class="card-img hot-items-img"
                    alt="...">
                <div class="card-img-overlay d-flex flex-column align-items-center justify-content-center">
                    <p class="">Planet of tiers</p>
                    <p class="card-text text-end fs-2hx fw-bolder lh-1">Big Sale, Big Deal</p>
                    <button class="card-text btn btn-primary btn-sm animate" data-animate="bounce">Shop Now</button>
                </div>
            </div>
        </div>
        <div class="col animate" data-delay="0.2s">
            <div class="card text-bg-dark">
                <img src="{{ asset('assets/media/stock/900x600/60.jpg') }}" class="card-img hot-items-img"
                    alt="...">
                <div class="card-img-overlay d-flex flex-column align-items-center justify-content-center">
                    <p class="">Planet of tiers</p>
                    <p class="card-text text-end fs-2hx fw-bolder lh-1">Big Sale, Big Deal</p>
                    <button class="card-text btn btn-primary btn-sm animate" data-animate="bounce">Shop Now</button>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row mt-5">
        <div class="col-12">
            <div class="card text-bg-dark">
                <img src="{{ asset('assets/media/stock/900x600/81.jpg') }}" class="card-img flash-sale-img"
                    alt="...">
                <div class="row card-img-overlay p-0 align-items-center">
                    <div class="col-auto" style="max-width: 300px">
                        <div class="card border-0 text-bg-dark flash-sale-img">
                            <div class="card-body d-flex flex-column align-items-start justify-content-center">
                                <p class="fs-2x fw-bolder animate" data-animate="bounceIn">Flash <span
                                        class="text-primary">SALE</span></p>
                                <p class="card-text fs-4 text-break">Get the best offer on our exclusive Part</p>
                                <div class="d-flex w-100">
                                    <div class="text-bg-primary py-2 px-3 fs-4 fw-bold text-white"
                                        style="max-width: 18rem; min-width: 65px;">
                                        <p class="card-text mb-0">NK BEST</p>
                                        <p class="card-text p-0">RUNNING ITEMS</p>
                                    </div>
                                    {{-- <div class="text-bg-primary py-2 px-3" style="max-width: 18rem;  min-width: 65px">
                                    <p class="card-text text-center text-white fw-bolder fs-1 mb-0">6</p> 
                                    <p class="card-text text-center text-white fs-7 p-0">Minutes</p> 
                                </div>
                                <div class="text-bg-primary py-2 px-3" style="max-width: 18rem;  min-width: 65px">
                                    <p class="card-text text-center text-white fw-bolder fs-1 mb-0">45</p> 
                                    <p class="card-text text-center text-white fs-7 p-0">Seconds</p> 
                                </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="hot-items-slider">
                            @foreach ($hotItems as $item)
                                <div class="slider-item">
                                    <x-product.card :product="$item" viewType="hot_item" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
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
        });
    </script>
@endpush
