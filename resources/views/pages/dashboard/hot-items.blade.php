<div class="flash-section">
    <div class="container">
        <!-- Hot Items Section -->
        <div class="mb-5">
            <div class="section-title text-center">
                <h2 class="display-6 fw-bold animate" data-animate="bounceIn">Hot <span>ITEMS</span></h2>
            </div>

            <div class="hot-items-slider">
                @foreach ($hotItems as $item)
                    <div class="px-2"
                        onclick="event.preventDefault(); window.location.href='{{ route('products.index') }}' + '?category_id={{ $item->id }}';">
                        <div class="card product-card">
                            <div class="product-img-wrapper">
                                <img src="{{ $item->image_url }}" class="product-img" alt="{{ $item->name }}">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Flash Sale Section -->
        <div class="mt-5">
            <div class="section-title text-center">
                <h2 class="display-6 fw-bold animate" data-animate="bottom">Flash <span
                        style="-webkit-text-fill-color: var(--bs-red);" class="animate"
                        data-animate="bounceIn">SALE</span>
                </h2>
                <div class="timer-wrapper mt-3">
                    <i class="bi bi-clock"></i>
                    <span class="countdown animate" data-animate="bounceIn">00:30:00</span>
                </div>
            </div>

            <div class="flash-sale-slider overflow-x-auto">
                @foreach ($productsOnSale as $product)
                    <div class="px-2" onclick="window.location.href='{{ route('products.show', $product->id) }}';">
                        <div class="card product-card ribbon ribbon-top">
                            <div class="product-img-wrapper">
                                <img src="{{ $product->primaryImageUrl() }}" class="product-img"
                                    alt="{{ $product->name }}">
                                <div class="ribbon-label">-{{ $product->discount }}%</div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="text-primary fw-bolder fs-5">{{ $product->discounted_price }}</span>
                                    <span class="text-muted text-decoration-line-through">{{ $product->price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var productCount = <?php echo count($productsOnSale); ?>;
        var hotItemsCount = <?php echo count($hotItems); ?>;

        function getMaxSlides(count) {
            return count >= 4 ? 4 : count;
        }

        $('.hot-items-slider').slick({
            slidesToShow: getMaxSlides(hotItemsCount),
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            prevArrow: '<button type="button" class="slick-prev"><i class="bi bi-chevron-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="bi bi-chevron-right"></i></button>',
            responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: getMaxSlides(hotItemsCount)
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: Math.min(3, hotItemsCount)
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: Math.min(2, hotItemsCount)
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: Math.min(1, hotItemsCount)
                    }
                }
            ]
        });

        $('.flash-sale-slider').slick({
            slidesToShow: getMaxSlides(productCount),
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            prevArrow: '<button type="button" class="slick-prev"><i class="bi bi-chevron-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="bi bi-chevron-right"></i></button>',
            responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: getMaxSlides(productCount)
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: Math.min(3, productCount)
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: Math.min(2, productCount)
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: Math.min(1, productCount)
                    }
                }
            ]
        });

        function startTimer(duration) {
            const countdownEl = document.querySelector('.countdown');
            if (!countdownEl) return;

            function setNewTimer() {
                const newEndTime = Date.now() + duration * 1000;
                localStorage.setItem("countdownEndTime", newEndTime);
                return newEndTime;
            }

            let endTime = localStorage.getItem("countdownEndTime");

            if (!endTime || isNaN(endTime) || Date.now() > parseInt(endTime, 10)) {
                endTime = setNewTimer();
            } else {
                endTime = parseInt(endTime, 10);
            }

            function updateTimer() {
                const now = Date.now();
                let timeLeft = Math.max(0, Math.floor((endTime - now) / 1000));

                let hours = Math.floor(timeLeft / 3600);
                let minutes = Math.floor((timeLeft % 3600) / 60);
                let seconds = timeLeft % 60;

                countdownEl.textContent =
                    `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

                if (timeLeft <= 0) {
                    clearInterval(timerInterval);
                    localStorage.removeItem("countdownEndTime");
                    startTimer(duration);
                }
            }

            updateTimer();
            const timerInterval = setInterval(updateTimer, 1000);
        }

        startTimer(1800);
    });
</script>
