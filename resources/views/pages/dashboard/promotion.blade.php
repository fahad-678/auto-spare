@php
 $brands = [
    ['velocity9', 'Number 9 in a circle'],
    ['amara', 'Flower-like circular icon'],
    ['kanba', 'Interlocked circles forming a trefoil'],
    ['EARTH2.0', 'Stylized globe icon'],
    ['treva', 'Airplane silhouette icon'],
    ['HEXLAB', 'Hexagonal beaker or flask icon'],
    ['FOXHUB', 'Stylized fox head icon'],
    ['ASGARDIA', 'Simplified cityscape or crown icon']
];   
@endphp    
<div class="container py-10">
    <div class="card mb-3" >
        <div class="row g-0">
          <div class="col-md-6 position-relative animate" data-animate="left">
            <img src="{{asset('assets/media/stock/600x400/img-40.jpg')}}" class="img-fluid rounded-start" alt="...">
            <div class="img-fluid position-absolute top-0 start-0 m-5 w-25 shadow-lg text-center bg-white py-3 animate" data-animate="top" alt="...">
              <div class="fs-3hx fw-bolder d-flex justify-content-center text-primary">
                  <p class="counter mb-0" data-count="25"></p>
                  <span class="">+</span>
              </div>
              <p class="fs-4">Years Experience</p>
            </div>
          </div>
          <div class="col ps-6">
            <div class="card-body py-0">
                {{-- <p class="card-text fst-italic fs-2x animate" data-animate="zoomIn">About Us</p> --}}
                <div class="animate" data-animate="bottom">
                  <h5 class="card-title fs-2hx fw-bolder mb-0 mt-2">Make Best Deals With Us</h5>
                  <h5 class="card-title fs-2x fw-bolder mb-4">Fueled by Passion</h5>
                </div>
                <p class="card-text text-body-secondary mb-4">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="row animate">
                    <div class="col-12">
                        <div class="card border-0 shadow-none mb-3" >
                            <div class="row g-0">
                              <div class="col-md-2">
                                <img src="{{asset('assets/media/stock/600x600/img-40.jpg')}}" class="img-fluid" alt="...">
                              </div>
                              <div class="col ps-4 d-flex align-items-center">
                                <div class="card-body p-1 pt-5">
                                    <h5 class="card-title fs-1 fw-bold">Grow With NK Auto Part</h5>
                                    {{-- <p class="card-text text-body-secondary">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> --}}
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="row animate" data-delay="0.2s">
                    <div class="col-12">
                        <div class="card border-0 shadow-none" >
                            <div class="row g-0">
                              <div class="col-md-2">
                                <img src="{{asset('assets/media/stock/600x600/img-41.jpg')}}" class="img-fluid" alt="...">
                              </div>
                              <div class="col ps-4 d-flex align-items-center">
                                <div class="card-body p-1 pt-5">
                                    <h5 class="card-title fs-1 fw-bold">Best B2B Partner For You</h5>
                                    {{-- <p class="card-text text-body-secondary">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> --}}
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
            <p class="fs-2x py-2 fw-bold animate" data-animate="zoomIn" data-delay="0s">Brands We Deal In</p>
            <p class="border-bottom border-warning border-2" style="width: 70px;"> </p>
        </div>
        @foreach (array_chunk($brands, 4) as $rowIndex => $brandRow)
            <div class="row g-0 px-8 pt-3">
              @foreach ($brandRow as $index => $brand)
              <div class="col-3 text-center animate" data-animate="left">
                  @php 
                      $class = "";
                      if ($rowIndex == 0 && $index < 4) {
                          $class .= "border-bottom border-secondary-subtle ";
                      }
                      if ($index < 3) {
                          $class .= "border-end border-secondary-subtle ";
                      }
                  @endphp
                  <p class="fs-2 py-4 m-0 {{ $class }}" data-animate="{{ $rowIndex == 0 ? 'left' : 'bottom' }}">
                      {{ $brand[0] }}
                  </p>
              </div>
              @endforeach
          </div>
        @endforeach
    </div>
</div>