<div class="container-fluid p-0">
    @php
     $nr = 4.2;   
    @endphp
    <div class="row mt-5 g-0">
        <div class="col-md-12 p-0">
            <div class="card text-bg-dark border-0 rounded-0">
                <img src="{{asset('assets/media/stock/900x600/77.jpg')}}" class="card-img rounded-0 hero-section" alt="...">
                <div class="row card-img-overlay align-items-center g-0">
                    <div class="col-3 container">
                        <p class="fs-3x text-white fw-bolder animate" data-animate="bottom">Smart automotive for smart peoples</p>
                        <p class="text-white mb-10 animate" data-animate="bottom"> dolor sit amet consectet adipisci at totam fuga quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                        <button class="btn btn-primary animate" data-animate="bounce" >Go To Shop!</button>
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
                                        <p class="card-text fs-3 text-gray-600">With supporting text below as a natural lead-in to additional content. With supporting text below. Additional content. With supporting text below.</p>
                                        <div class="d-flex customer-info my-7">
                                            <img src="{{asset('assets/media/stock/900x600/81.jpg')}}" alt="Customer Image" class="border border-5">
                                            <div>
                                                <h6>George D. Coffey</h6>
                                                <p class="mb-0 text-gray-600">Jakarta</p>
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
                                        <p class="card-text fs-3 text-gray-600">With supporting text below as a natural lead-in to additional content. With supporting text below. Additional content. With supporting text below.</p>
                                        <div class="d-flex customer-info my-7">
                                            <img src="{{asset('assets/media/stock/900x600/81.jpg')}}" alt="Customer Image" class="border border-5">
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
                                        <p class="card-text fs-3 text-gray-600">With supporting text below as a natural lead-in to additional content. With supporting text below. Additional content. With supporting text below.</p>
                                        <div class="d-flex customer-info my-7">
                                            <img src="{{asset('assets/media/stock/900x600/81.jpg')}}" alt="Customer Image" class="border border-5">
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
                                        <p class="card-text fs-3 text-gray-600">With supporting text below as a natural lead-in to additional content. With supporting text below. Additional content. With supporting text below.</p>
                                        <div class="d-flex customer-info my-7">
                                            <img src="{{asset('assets/media/stock/900x600/81.jpg')}}" alt="Customer Image" class="border border-5">
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
   $(document).ready(function(){
    $('.testimonial-slider').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false,
        dots: false,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
});
      
</script>
@endpush