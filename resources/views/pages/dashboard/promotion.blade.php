@php
    $brands = [
        ['image1', 'Number 9 in a circle'],
        ['image2', 'Flower-like circular icon'],
        ['image3', 'Interlocked circles forming a trefoil'],
        ['image4', 'Stylized globe icon'],
        ['image5', 'Airplane silhouette icon'],
        ['image6', 'Hexagonal beaker or flask icon'],
        ['image7', 'Stylized fox head icon'],
        ['image8', 'Simplified cityscape or crown icon'],
        ['image9', 'Simplified cityscape or crown icon'],
        ['image10', 'Simplified cityscape or crown icon'],
    ];
@endphp
<div class="container py-10">
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-6 position-relative animate" data-animate="left">
                <img src="{{ asset('assets/media/promotion/image0.jpg') }}" class="img-fluid rounded-start" alt="..." loading="lazy">
                <div class="img-fluid position-absolute top-0 start-0 m-5 w-25 shadow-lg text-center bg-white py-3 animate"
                    data-animate="top" alt="...">
                    <div class="fs-3hx fw-bolder d-flex justify-content-center text-primary">
                        <p class="counter mb-0" data-count="25"></p>
                        <span class="">+</span>
                    </div>
                    <p class="fs-4">Years Experience</p>
                </div>
            </div>
            <div class="col ps-6 align-items-center pt-md-15">
                <div class="text-center text-md-start py-2 animate" data-animate="bottom">
                    <h5 class="card-title fs-2hx fw-bolder mb-0 ">Make Best Deals With Us</h5>
                    <h5 class="card-title fs-2x fw-bolder mb-4">Fueled by Passion</h5>
                </div>
                <div class="card-body py-0 d-flex d-md-block">
                    <div class="row animate">
                        <div class="col-md-12">
                            <div class="card border-0 shadow-none">
                                <div class="row g-0">
                                    <div class="col-md-2">
                                        <img src="{{ asset('assets/media/promotion/image1.jpg') }}" class="img-fluid"
                                            alt="..." loading="lazy">
                                    </div>
                                    <div class="col ps-4 d-flex align-items-center">
                                        <div class="card-body p-1 pt-5 text-center text-md-start">
                                            <h5 class="card-title fs-1 fw-bold">Grow With NK Auto Part</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row animate ms-4 ms-md-0" data-delay="0.2s">
                        <div class="col-md-12 p-md-0">
                            <div class="card border-0 shadow-none">
                                <div class="row g-0">
                                    <div class="col-md-2">
                                        <img src="{{ asset('assets/media/promotion/image2.jpg') }}" class="img-fluid"
                                            alt="..." loading="lazy">
                                    </div>
                                    <div class="col ps-4 d-flex align-items-center">
                                        <div class="card-body p-1 pt-5 text-center text-md-start">
                                            <h5 class="card-title fs-1 fw-bold">Best B2B Partner For You</h5>
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
    <div class="bg-body-secondary py-10 mt-10">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <p class="fs-2tx py-2 fw-bolder animate" data-animate="zoomIn" data-delay="0s">Brands We Deal In</p>
            <p class="border-bottom border-warning border-2" style="width: 70px;"> </p>
        </div>
        @foreach (array_chunk($brands, 5) as $rowIndex => $brandRow)
            <div class="row g-0 px-8 justify-content-center">
                @foreach ($brandRow as $index => $brand)
                    <div class="col-2 text-center animate" data-animate="left">
                        @php
                            $class = '';
                            if ($rowIndex == 0 && $index < 5) {
                                $class .= 'border-bottom border-secondary-subtle ';
                            }
                            if ($index < 4) {
                                $class .= 'border-end border-secondary-subtle ';
                            }
                        @endphp
                        <p class="fs-2 p-4 m-0 {{ $class }}"
                            data-animate="{{ $rowIndex == 0 ? 'left' : 'bottom' }}">
                            <img src="{{ asset('assets/media/brands-we-deal-in/' . $brand[0] . '.png') }}"
                                width="150" alt="{{ $brand[0] }}" class="img-fluid" loading="lazy">
                        </p>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>
