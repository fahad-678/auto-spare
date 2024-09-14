<div>
    <div class="new-arrival-section my-10">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="new-arrival-text animate" data-animate="bottom">
                <p class="fs-3x text-white fw-bolder">Car Parts That Exceed Your</p>
                <p class="fs-3x text-white fw-bolder">Expectations</p>
                <button class="btn btn-primary animate mt-3" data-animate="bounce">Go To Shop!</button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3000">
                    <img src="{{ asset('assets/media/new-arrival/image0.jpg') }}" class="d-block w-100 new-arrival-img img-dark"
                        alt="New Arrival 1">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="{{ asset('assets/media/new-arrival/image1.jpg') }}" class="d-block w-100 new-arrival-img img-dark"
                        alt="New Arrival 2">
                </div>
            </div>
        </div>
    </div>
    <div class="container stats-container">
        <div class="stats-box">
            <div class="row">
                <div class="col-6 col-md-3 stat-item">
                    <div class="stat-number">
                        <span class="counter" data-count="2500">0</span>
                        <span class="text-primary">+</span>
                    </div>
                    <p class="stat-text">Brand Products</p>
                </div>
                <div class="col-6 col-md-3 stat-item">
                    <div class="stat-number">
                        <span class="counter" data-count="96">0</span>
                        <span class="text-primary">%</span>
                    </div>
                    <p class="stat-text">Customer Satisfaction</p>
                </div>
                <div class="col-6 col-md-3 stat-item">
                    <div class="stat-number">
                        <span class="counter" data-count="120">0</span>
                        <span class="text-primary">+</span>
                    </div>
                    <p class="stat-text">Offline/Online Stores</p>
                </div>
                <div class="col-6 col-md-3 stat-item">
                    <div class="stat-number">
                        <span class="counter" data-count="75">0</span>
                        <span class="text-primary">+</span>
                    </div>
                    <p class="stat-text">Satisfied Services</p>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center container mt-10">
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
