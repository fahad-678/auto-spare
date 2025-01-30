@props(['product'])
<div class="col-md-12 mb-4 position-relative product-card">
    <div class="card h-100 pt-1 border-2 text-center shadow-sm">
        <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none position-relative d-block">
            <img src="{{ $product->primaryImageUrl() }}" class="img-fluid product-image rounded" alt="{{ $product->name }}"
                loading="lazy" style="object-fit: cover; width: 100%; height: 300px;"
                data-images='@json($product->images->pluck('image_url'))'>

            @if ($product->hasDiscount())
                <span class="position-absolute top-0 end-0 m-2 badge text-bg-warning shadow-sm">
                    Sale!<span class="visually-hidden">Discount available</span>
                </span>
            @endif
        </a>

        <div class="card-body d-flex flex-column p-3">
            <h5 class="card-title line-clamp-2 mb-2">
                <a href="{{ route('products.show', $product->id) }}" class="text-dark text-decoration-none">
                    {{ $product->name }}
                </a>
            </h5>
        </div>
    </div>
</div>
<style>
    .product-card {
        transition: transform 0.3s ease;
    }

    .product-card:hover {
        transform: scale(1.05);
        z-index: 10;
    }

    .product-image {
        transition: opacity 0.4s ease;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const productCards = document.querySelectorAll('.product-card');

        productCards.forEach(card => {
            const image = card.querySelector('.product-image');
            const images = JSON.parse(image.getAttribute('data-images'));
            let currentIndex = 0;
            let intervalId = null;

            const preloadImage = (url) => {
                return new Promise((resolve) => {
                    const img = new Image();
                    img.src = url;
                    img.onload = () => resolve();
                });
            };

            const changeImage = async () => {
                currentIndex = (currentIndex + 1) % images.length;
                const nextImage = images[currentIndex];
                await preloadImage(nextImage);
                image.style.opacity = 0;
                setTimeout(() => {
                    image.src = nextImage;
                    image.style.opacity = 1;
                }, 400);
            };

            card.addEventListener('mouseenter', () => {
                if (images.length > 1) {
                    intervalId = setInterval(() => {
                        changeImage();
                    }, 1500);
                }
            });

            card.addEventListener('mouseleave', () => {
                if (intervalId) {
                    clearInterval(intervalId);
                    intervalId = null;
                    image.src = images[0];
                    image.style.opacity = 1;
                }
            });
        });
    });
</script>
