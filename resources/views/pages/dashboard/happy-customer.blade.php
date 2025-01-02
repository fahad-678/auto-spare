<div class="container-fluid p-0 mb-20 mb-md-auto">
    @php
        $nr = 4.2;
    @endphp
    <div class="row mt-5 g-0">
        <div class="col-md-12 p-0">
            <div class="card text-bg-dark border-0 rounded-0">
                <img src="{{ asset('assets/media/stock/900x600/77.jpg') }}" class="card-img rounded-0 hero-section"
                    alt="..." loading="lazy">
                <div class="row card-img-overlay align-items-center g-0">
                    <div class="col-md-3 d-flex d-md-block justify-content-center container fs-2hx fs-md-4hx fw-bolder mb-3 mb-md-6 text-white animate"
                        data-animate="bottom">
                        <p class="mb-0">Our</p>
                        <p class="mb-0 ms-2 ms-md-0">Happy</p>
                        <p class="mb-0 ms-2 ms-md-0">Customers</p>
                    </div>
                    <div class="col-md-7 container">
                        <div class="testimonial-slider">
                            <div class="slider-item">
                                <div class="card border-0 rounded-0">
                                    <div class="card-body testimonial-card shadow-lg">
                                        <div class="rating mb-5">
                                            @for ($i = 0; $i < 5; $i++)
                                                @if (floor($nr) - $i >= 1)
                                                    <i class="fas fa-star text-warning me-2 fs-5"></i>
                                                @elseif ($nr - $i > 0)
                                                    <i class="fas fa-star-half-alt text-warning me-2 fs-5"></i>
                                                @else
                                                    <i class="far fa-star text-warning me-2 fs-5"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <div class="happy-customer-card-body">
                                            <p class="card-text fs-7 text-gray-600">As a long-term customer of Nafees
                                                Khan Auto Spare Parts, I have been working with their products,
                                                especially the NK brand, for over 7 years. The NK brand has consistently
                                                impressed me with its reliability, top-notch quality, and competitive
                                                pricing. It's a brand I trust for all my auto parts needs, and I highly
                                                recommend it to others. Nafees Khan Auto Spare Parts has been a valuable
                                                partner in ensuring our customers receive the best products available.
                                            </p>
                                        </div>
                                        <div class="d-flex customer-info mt-3 mt-md-7">
                                            <img src="{{ asset('assets/media/stock/900x600/81.jpg') }}"
                                                alt="Customer Image" class="border border-5" loading="lazy">
                                            <div>
                                                <h6>Zaman</h6>
                                                <p class="mb-0 text-gray-600">Ghana</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Repeat the slider-item div for each testimonial -->
                            <!-- For example: -->
                            <div class="slider-item">
                                <div class="card border-0 rounded-0">
                                    <div class="card-body testimonial-card shadow-lg">
                                        <div class="rating mb-5">
                                            @for ($i = 0; $i < 5; $i++)
                                                @if (floor($nr) - $i >= 1)
                                                    <i class="fas fa-star text-warning me-2 fs-5"></i>
                                                @elseif ($nr - $i > 0)
                                                    <i class="fas fa-star-half-alt text-warning me-2 fs-5"></i>
                                                @else
                                                    <i class="far fa-star text-warning me-2 fs-5"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <div class="happy-customer-card-body">
                                            <p class="card-text fs-7 text-gray-600">As a long-time customer of Nafees
                                                Khan Auto Spare Parts, I’ve depended on their exceptional products for
                                                more than 5 years. Their NK brand is second to none, offering
                                                unparalleled quality, reliability, and affordability. I always feel
                                                confident recommending their products to others in the industry. Nafees
                                                Khan Auto Spare Parts has played a crucial role in helping my business
                                                thrive, ensuring I deliver the best to my customers.</p>
                                        </div>
                                        <div class="d-flex customer-info mt-3 mt-md-7">
                                            <img src="{{ asset('assets/media/stock/900x600/81.jpg') }}"
                                                alt="Customer Image" class="border border-5" loading="lazy">
                                            <div>
                                                <h6>George D. Coffey</h6>
                                                <p class="mb-0 text-gray-600">Jakarta</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slider-item">
                                <div class="card border-0 rounded-0">
                                    <div class="card-body testimonial-card shadow-lg">
                                        <div class="rating mb-5">
                                            @for ($i = 0; $i < 5; $i++)
                                                @if (floor($nr) - $i >= 1)
                                                    <i class="fas fa-star text-warning me-2 fs-5"></i>
                                                @elseif ($nr - $i > 0)
                                                    <i class="fas fa-star-half-alt text-warning me-2 fs-5"></i>
                                                @else
                                                    <i class="far fa-star text-warning me-2 fs-5"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <div class="happy-customer-card-body">
                                            <p class="card-text fs-7 text-gray-600">For over 1 years, I have relied on
                                                Nafees Khan Auto Spare Parts to meet my auto component needs. Their NK
                                                brand continues to amaze me with its durability, precision, and
                                                cost-effectiveness. It’s a name I trust and one I recommend to peers
                                                without hesitation. Nafees Khan Auto Spare Parts has been instrumental
                                                in ensuring my customers receive only the highest-quality products.
                                                Working with them has been an excellent experience.</p>
                                        </div>
                                        <div class="d-flex customer-info mt-3 mt-md-7">
                                            <img src="{{ asset('assets/media/stock/900x600/81.jpg') }}"
                                                alt="Customer Image" class="border border-5" loading="lazy">
                                            <div>
                                                <h6>George D. Coffey</h6>
                                                <p class="mb-0 text-gray-600">Jakarta</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slider-item">
                                <div class="card border-0 rounded-0">
                                    <div class="card-body testimonial-card shadow-lg">
                                        <div class="rating mb-5">
                                            @for ($i = 0; $i < 5; $i++)
                                                @if (floor($nr) - $i >= 1)
                                                    <i class="fas fa-star text-warning me-2 fs-5"></i>
                                                @elseif ($nr - $i > 0)
                                                    <i class="fas fa-star-half-alt text-warning me-2 fs-5"></i>
                                                @else
                                                    <i class="far fa-star text-warning me-2 fs-5"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <div class="happy-customer-card-body">
                                            <p class="card-text fs-7 text-gray-600">I’ve been sourcing from Nafees Khan
                                                Auto Spare Parts for 4 years, and their NK brand has consistently proven
                                                to be outstanding. The reliability, affordability, and superior quality
                                                of their parts make them my first choice for any project. Nafees Khan
                                                Auto Spare Parts has built a reputation I can wholeheartedly endorse.
                                                Their products allow me to confidently serve my customers, knowing I’m
                                                offering the best.</p>
                                        </div>
                                        <div class="d-flex customer-info mt-3 mt-md-7">
                                            <img src="{{ asset('assets/media/stock/900x600/81.jpg') }}"
                                                alt="Customer Image" class="border border-5" loading="lazy">
                                            <div>
                                                <h6>George D. Coffey</h6>
                                                <p class="mb-0 text-gray-600">Jakarta</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
            $('.testimonial-slider').slick({
                slidesToShow: 2,
                slidesToScroll: 1,
                // autoplay: true,
                autoplaySpeed: 2000,
                arrows: false,
                dots: false,
                responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1,
                        autoplaySpeed: 5000,
                    }
                }]
            });
        });
    </script>
@endpush
