@extends('layout.master')

@section('content')

<div class="position-relative">
    
    <div id="carouselExampleSlidesOnly" class="carousel slide hero-section" data-bs-ride="carousel">
        <div class="position-absolute hero-text">
            <p class="fs-2hx fst-italic text-white">Welcome to <span class="text-primary">Auto</span>Store</p>
            <p class="fs-3x text-white fw-bolder"><span class="text-primary">THE BEST</span> AUTOMOTIVE SHOP</p>
            <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <p class="text-white"> adipisci at totam fuga quibusdam</p>
            <button class="btn btn-primary">Explore More</button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="3000">
            <img src="{{asset('assets/media/stock/1600x800/img-2.jpg')}}" class="d-block w-100 opacity-25" alt="....">
          </div>
          <div class="carousel-item" data-bs-interval="3000">
            <img src="{{asset('assets/media/stock/1600x800/img-3.jpg')}}" class="d-block w-100" alt="....">
          </div>
          <div class="carousel-item" data-bs-interval="3000">
            <img src="{{asset('assets/media/stock/1600x800/img-4.jpg')}}" class="d-block w-100" alt="....">
          </div>
        </div>
    </div>
    {{-- <div class="card overflow-hidden ">
        <img src="{{asset('assets/media/icons/duotune/general/gen001.svg')}}" alt="Logo" class="d-inline-block align-text-top">
    </div> --}}
    <div class="d-md-flex container my-lg-10">
        <div class="row px-2">
            <div class="col d-flex">
              <div class="col-6">
                <img src="{{asset('assets/media/email/img-3.jpg')}}" class="img-fluid rounded-circle" alt="...">
              </div>
              <div class="col-5 d-flex align-items-center">
                <div class="card-body p-2 justify-content-center">
                  <h5 class="card-title">Free Shipping</h5>
                  <p class="card-text text-secondary">On all over $99.00</p>
                </div>
              </div>
            </div>
            <div class="col d-flex">
              <div class="col-6">
                <img src="{{asset('assets/media/email/img-4.jpg')}}" class="img-fluid rounded-circle" alt="...">
              </div>
              <div class="col-5 d-flex align-items-center">
                <div class="card-body p-2">
                  <h5 class="card-title">Free Shipping</h5>
                  <p class="card-text text-secondary">On all over $99.00</p>
                </div>
              </div>
            </div>
            <div class="col d-flex">
              <div class="col-6">
                <img src="{{asset('assets/media/email/img-5.jpg')}}" class="img-fluid rounded-circle" alt="...">
              </div>
              <div class="col-5 d-flex align-items-center">
                <div class="card-body p-2">
                  <h5 class="card-title">Free Shipping</h5>
                  <p class="card-text text-secondary">On all over $99.00</p>
                </div>
              </div>
            </div>
            <div class="col d-flex">
              <div class="col-6">
                <img src="{{asset('assets/media/email/img-6.jpg')}}" class="img-fluid rounded-circle" alt="...">
              </div>
              <div class="col-5 d-flex align-items-center">
                <div class="card-body p-2">
                  <h5 class="card-title">Free Shipping</h5>
                  <p class="card-text text-secondary">On all over $99.00</p>
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