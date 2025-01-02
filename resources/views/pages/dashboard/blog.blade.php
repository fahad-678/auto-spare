<div class="container my-10">
    <h1 class="text-center fs-2tx fw-bolder mb-4 animate" data-animate="bottom">Who Are We</h1>
    {{-- <p class="text-center text-gray-600 mb-7 fs-5 animate" data-animate="bottom">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper<br>
      mattis, pulvinar dapibus leo.
    </p> --}}
  
    <div class="row animate mb-4" onclick="window.location.href='/about-us'">
      <div class="col-md-6 cursor-pointer">
        <div class="card h-100">
          <img src="{{asset('assets/media/blog/nkasp.jpg')}}" class="card-img-top" alt="AC Compressor" loading="lazy">
          {{-- <div class="position-absolute top-0 end-0 bg-primary text-white px-2 py-1">Auto Maintenance</div> --}}
          <div class="card-body">
            <h5 class="card-title">{{ config('app.name') }}</h5>
            <p class="card-text">{{ config('app.name') }} is your trusted partner in providing high-quality automotive parts and accessories. With a commitment to excellence and customer satisfaction, we offer a wide range of genuine and aftermarket products to meet all your vehicle needs. Our experienced team ensures fast, reliable service, helping you keep your vehicles running smoothly.</p>
          </div>
          <div class="card-footer bg-white py-4">
            <small class="text-primary">August 27, 2023 • No Comments</small>
          </div>
          
        </div>
      </div>
      <div class="col-md-6 cursor-pointer">
        <div class="card h-100">
          <img src="{{asset('assets/media/blog/logo.jpg')}}" class="card-img-top" alt="Recycling Cars" loading="lazy">
          {{-- <div class="position-absolute top-0 end-0 bg-primary text-white px-2 py-1">NK Brand</div> --}}
          <div class="card-body">
            <h5 class="card-title">NK Brand</h5>
            <p class="card-text">NK is a leading brand in the aftermarket auto parts industry, dedicated to delivering high-quality, affordable, and reliable solutions for a wide range of vehicles. With a focus on innovation and customer satisfaction, NK ensures that every part meets the highest standards of performance and durability, helping you keep your vehicle in top condition</p>
          </div>
          <div class="card-footer bg-white py-4">
            <small class="text-primary">August 27, 2023 • No Comments</small>
          </div>
        </div>
      </div>
  
      {{-- <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="{{asset('assets/media/stock/900x600/16.jpg')}}" class="card-img-top" alt="Engine Maintenance">
          <div class="position-absolute top-0 end-0 bg-primary text-white px-2 py-1">Car Tips</div>
          <div class="card-body">
            <h5 class="card-title">Extend Your Engine's Lifespan with These Helpful Tips</h5>
            <p class="card-text">Eros accumsan proin aliquet in mi sociosqu. Volutpat eu quam praesent ad ante. Commodo augue faucibus felis vulputate leo ante sodales elementum blandit tempus. Nulla semper faucibus sit consectetuer libero.</p>
          </div>
          <div class="card-footer bg-white py-4">
            <small class="text-primary">August 27, 2023 • No Comments</small>
          </div>
        </div>
      </div> --}}
    </div>
  </div>