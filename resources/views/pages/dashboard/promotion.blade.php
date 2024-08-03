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
          <div class="col-md-6 position-relative">
            <img src="{{asset('assets/media/stock/600x400/img-40.jpg')}}" class="img-fluid rounded-start" alt="...">
            <img src="{{asset('assets/media/stock/600x400/img-43.jpg')}}" class="img-fluid position-absolute top-0 start-0 m-5 w-25 shadow-lg" alt="...">
          </div>
          <div class="col ps-6">
            <div class="card-body py-0">
                <p class="card-text fst-italic fs-2x">Autos</p>
                <h5 class="card-title fs-2tx fw-bolder mb-0">The Essence of Engineering,</h5>
                <h5 class="card-title fs-2tx fw-bolder mb-4">Fueled by Passion</h5>
                <p class="card-text text-body-secondary mb-4">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0 shadow-none mb-3" >
                            <div class="row g-0">
                              <div class="col-md-2">
                                <img src="{{asset('assets/media/stock/600x600/img-40.jpg')}}" class="img-fluid" alt="...">
                              </div>
                              <div class="col ps-4">
                                <div class="card-body p-1 pt-5">
                                    <h5 class="card-title fs-5 fw-bold">Auto Part Store</h5>
                                    <p class="card-text text-body-secondary">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0 shadow-none" >
                            <div class="row g-0">
                              <div class="col-md-2">
                                <img src="{{asset('assets/media/stock/600x600/img-41.jpg')}}" class="img-fluid" alt="...">
                              </div>
                              <div class="col ps-4">
                                <div class="card-body p-1 pt-5">
                                    <h5 class="card-title fs-5 fw-bold">Auto Part Store</h5>
                                    <p class="card-text text-body-secondary">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
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
            <p class="fs-2x py-2 fw-bold">Our Authorized Dealers</p>
            <p class="border-bottom border-warning border-2" style="width: 70px;"> </p>
        </div>
        @foreach (array_chunk($brands, 4) as $rowIndex => $brandRow)
            <div class="row g-0 px-8 pt-3">
                @foreach ($brandRow as $index => $brand)
                    <div class="col-3 text-center">
                        <p class="fs-2 py-4
                            @if ($rowIndex == 0 && $index < 4)
                                border-bottom border-secondary-subtle
                            @endif
                            @if ($index < 3) 
                                border-end border-secondary-subtle 
                            @endif
                            m-0">
                            {{ $brand[0] }}
                        </p>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>