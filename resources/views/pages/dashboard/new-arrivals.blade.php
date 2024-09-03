<div>
    <div class="mt-10 position-relative">
        <div id="carouselExampleSlidesOnly" class="carousel slide hero-section" data-bs-ride="carousel">
            <div class="position-absolute new-arrival-text animate" data-animate="bottom">
                <p class="fs-3x text-white fw-bolder">Car Part That Exceed Your</p>
                <p class="fs-3x text-white fw-bolder">Expectations</p>
                {{-- <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elitm saepe mollitia incidunt
                    assumenda doloribus perferendis? </p>
                <p class="text-white"> adipisci at totam dolor sit amet consectet fuga quibusdamm saepe mollitia incidunt
                    assumenda doloribus perferendis?</p>
                <p class="text-white mb-10"> dolor sit amet consectet adipisci at totam fuga quibusdam Lorem ipsum dolor
                    sit amet consectetur adipisicing elit. </p> --}}
                <button class="btn btn-primary animate mt-3" data-animate="bounce">Go To Shop!</button>
            </div>
            <div class="carousel-inner">
                @for ($i = 0; $i < 2; $i++)
                    <div class="carousel-item active" data-bs-interval="3000">
                        <img src="{{ asset('assets/media/new-arrival/image' . $i . '.jpg') }}"
                            class="d-block w-100 img-dark" alt="....">
                    </div>
                @endfor
                {{-- <div class="carousel-item" data-bs-interval="3000">
                    <img src="{{ asset('assets/media/stock/1600x800/img-3.jpg') }}" class="d-block w-100 img-dark"
                        alt="....">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="{{ asset('assets/media/stock/1600x800/img-4.jpg') }}" class="d-block w-100 img-dark"
                        alt="....">
                </div> --}}
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
                    <p class="fs-4 text-gray-600">Offline/Online Store</p>
                </div>
                <div class="col-3 text-center">
                    <div class="fs-3x fw-bolder d-flex justify-content-center">
                        <p class="counter mb-0" data-count="75"></p>
                        <span class="text-primary">+</span>
                    </div>
                    <p class="fs-4 text-gray-600">Satisfied Services</p>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center container">
        <p class="fs-2qx fw-bolder animate" data-animate="left">New Arrivals Parts</p>
        <div class="row mb-3 animate">
            @foreach ($categories as $category)
                <x-product.card :product="$category" viewType="new_arrival" route="category" />
                @if ($loop->iteration % 4 == 0)
        </div>
        <div class="row">
            @endif
            @endforeach
        </div>
        <!-- Pagination Controls -->
        <div class="d-flex justify-content-end my-4 align-items-center">
            {{ $categories->appends(request()->input())->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
