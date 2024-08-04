<div>
    <div class="mt-10 position-relative">
        <div id="carouselExampleSlidesOnly" class="carousel slide hero-section" data-bs-ride="carousel">
            <div class="position-absolute new-arrival-text animate" data-animate="bottom">
                <p class="fs-3x text-white fw-bolder">Car Part That Exceed Your</p>
                <p class="fs-3x text-white fw-bolder">Expectations</p>
                <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elitm saepe mollitia incidunt assumenda doloribus perferendis? </p>
                <p class="text-white"> adipisci at totam dolor sit amet consectet fuga quibusdamm saepe mollitia incidunt assumenda doloribus perferendis?</p>
                <p class="text-white mb-10"> dolor sit amet consectet adipisci at totam fuga quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                <button class="btn btn-primary animate" data-animate="bounce">Go To Shop!</button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="3000">
                <img src="{{asset('assets/media/stock/1600x800/img-2.jpg')}}" class="d-block w-100 img-dark" alt="....">
              </div>
              <div class="carousel-item" data-bs-interval="3000">
                <img src="{{asset('assets/media/stock/1600x800/img-3.jpg')}}" class="d-block w-100 img-dark" alt="....">
              </div>
              <div class="carousel-item" data-bs-interval="3000">
                <img src="{{asset('assets/media/stock/1600x800/img-4.jpg')}}" class="d-block w-100 img-dark" alt="....">
              </div>
            </div>
        </div>
    </div>
    <div class="position-relative container">
        <div class="position-relative bg-white shadow-lg py-2" style="bottom: 75px">
            <div class="row my-5">
                <div class="col-3 text-center">
                    <div class="fs-3x fw-bolder d-flex justify-content-center">
                        <p class="counter mb-0" data-count="2500"></p>
                        <span class="text-primary">+</span>
                    </div>
                    <p class="fs-4 text-gray-600">Brand Product</p>
                </div>
                <div class="col-3 text-center">
                    <div class="fs-3x fw-bolder d-flex justify-content-center">
                        <p class="counter mb-0" data-count="96"></p>
                        <span class="text-primary">%</span>
                    </div>
                    <p class="fs-4 text-gray-600">Customer Satisfaction</p>
                </div>
                <div class="col-3 text-center">
                    <div class="fs-3x fw-bolder d-flex justify-content-center">
                        <p class="counter mb-0" data-count="120"></p>
                        <span class="text-primary">+</span>
                    </div>
                    <p class="fs-4 text-gray-600">Offline Store</p>
                </div>
                <div class="col-3 text-center">
                    <div class="fs-3x fw-bolder d-flex justify-content-center">
                        <p class="counter mb-0" data-count="75"></p>
                        <span class="text-primary">+</span>
                    </div>
                    <p class="fs-4 text-gray-600">Professional Team</p>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center container">
        <p class="fs-2qx fw-bolder animate" data-animate="left">New Arrivals Parts</p>
        @for ($i = 1; $i < 5; $i++)
        <div class="row mb-3 animate">
            @for ($j = 0; $j < 4; $j++)
            <div class="col-3">
                <div class="card border border-5 text-center position-relative">
                    <img src="{{asset('assets/media/stock/600x400/img-'.$i.'' .$j.'.jpg')}}" class="card-img-top" alt="...">
                    <span class="position-absolute top-0 end-0 p-2 badge text-bg-warning">
                        Sale!
                    </span>
                    <div class="card-body">
                    <h5 class="card-title">Alloy rim blue</h5>
                    <p class="card-text text-primary"><span class="text-decoration-line-through text-secondary">$439.00</span>$415.00</p>
                    <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
            @endfor
        </div>
        @endfor
    </div>
</div>