@props(['product'])
<div class="col-lg-3 col-md-4 col-6 mb-4 position-relative product-list-card">
    <div class="card h-100 border border-2 text-center shadow-sm ribbon ribbon-top">
        <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none position-relative d-block">
            <img src="{{ $product->primaryImageUrl() }}" class="img-fluid product-image rounded" alt="{{ $product->name }}"
                loading="lazy" style="object-fit: cover; width: 100%; height: 300px;"
                data-images='@json($product->images->pluck('image_url'))'>

            @if ($product->hasDiscount())
                <div class="ribbon-label">
                    Sale!
                </div>
            @endif
        </a>

        <div class="card-body d-flex flex-column p-3">
            <h5 class="card-title line-clamp-2 mb-2">
                <a href="{{ route('products.show', $product->id) }}" class="text-dark text-decoration-none">
                    {{ $product->name }}
                </a>
            </h5>
            <div class="mt-auto pt-2">
                <button type="button" class="btn btn-primary btn-sm add-to-cart" data-id="{{ $product->id }}">
                    <i class="fas fa-shopping-cart me-1"></i>Add to Cart
                </button>
                @auth
                    <div class="d-grid gap-2">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-edit me-1"></i>Edit
                        </a>
                        <button type="button" class="btn btn-outline-primary btn-sm delete-product" data-bs-toggle="modal"
                            data-bs-target="#deleteModal" data-product-id="{{ $product->id }}">
                            <i class="fas fa-trash me-1"></i>Delete
                        </button>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div>
<style>
    .product-list-card {
        transition: transform 0.3s ease;
    }

    .product-list-card:hover {
        transform: scale(1.05);
        z-index: 10;
    }

    .product-image {
        transition: opacity 0.4s ease;
    }
</style>
