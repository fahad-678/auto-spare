@props(['product', 'cart'])
<div class="col-lg-3 col-md-4 col-6 mb-4 position-relative product-list-card">
    <div class="card h-100 border border-2 text-center shadow-sm ribbon ribbon-top">
        <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none position-relative d-block">
            <img src="{{ $product->primaryImageUrl() }}" class="img-fluid product-image rounded" alt="{{ $product->name }}"
                loading="lazy" style="object-fit: cover; width: 100%; height: 300px;">

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
            <input type="hidden" name="product_id[]" value="{{ $product->id }}">
            <input type="hidden" name="quantity[]" value="{{ $cart['quantity'] }}">
            <div class="quantity-controls d-flex align-items-center justify-content-center gap-2 mb-2">
                <button class="btn btn-sm btn-outline-primary" type="button"
                    onclick="updateQuantity({{ $product->id }}, -1, '{{ route('cart.store') }}', '{{ csrf_token() }}')">
                    -
                </button>
                <span class="quantity-display" id="quantity-{{ $product->id }}">
                    {{ $cart['quantity'] }}
                </span>
                <button class="btn btn-sm btn-outline-primary" type="button"
                    onclick="updateQuantity({{ $product->id }}, 1, '{{ route('cart.store') }}', '{{ csrf_token() }}')">
                    +
                </button>
            </div>
            <div class="remove-button-container text-center mt-2">
                <button class="btn btn-sm btn-danger" type="button"
                    onclick="removeFromCart({{ $product->id }}, '{{ route('cart.store') }}', '{{ csrf_token() }}')">
                    Remove
                </button>
            </div>
        </div>
    </div>
</div>
