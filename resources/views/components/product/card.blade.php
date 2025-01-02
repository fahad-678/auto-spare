@props(['product', 'viewType' => 'default', 'route' => 'products'])

<div class="{{ $viewType === 'hot_item' ? 'col-md-12' : 'col-md-3 col-6' }} mb-4 pointer">
    <div class="card h-100 border border-2 text-center position-relative">
        <a href="{{ $route == 'category' ? route('products.index') : route($route . '.show', $product->id) }}"
            class="text-decoration-none"
            @if ($route == 'category') onclick="event.preventDefault(); window.location.href=this.href + '?category_id={{ $product->id }}';" @endif>
            <img src="{{ $product->image && file_exists(public_path('storage/products/' . basename($product->image))) ? asset('storage/products/' . basename($product->image)) : asset('assets/media/img/noimgfind.jpeg') }}"
                class="card-img-top {{ $viewType === 'new_arrival' ? '' : ($viewType === 'list' ? 'list-img' : '') }}"
                {{ $viewType === 'hot_item' ? 'height=135 width=200' : 'height=205 width=305' }}
                alt="{{ $product->name }}" loading="lazy">
        </a>
        @if ($product->discount > 0)
            <span class="position-absolute top-0 end-0 p-2 badge text-bg-warning">
                Sale!
            </span>
        @endif
        <div class="card-body d-flex flex-column">
            <h5 class="card-title two-line-title">
                <a href="{{ $route == 'category' ? route('products.index') : route($route . '.show', $product->id) }}"
                    class="text-decoration-none text-dark"
                    @if ($route == 'category') onclick="event.preventDefault(); window.location.href=this.href + '?category_id={{ $product->id }}';" @endif>
                    {{ $product->name }}
                </a>
            </h5>
            {{-- <p class="card-text text-primary">
                @if ($product->price > 0)
                    @if ($product->discount > 0)
                        <span class="text-decoration-line-through text-secondary">
                            ${{ number_format($product->price, 2) }}
                        </span>
                    @endif
                    ${{ number_format($product->price * (1 - $product->discount / 100), 2) }}
                @else
                    N/A
                @endif
            </p> --}}
            <div class="mt-auto">
                {{-- <a href="https://wa.me/{{ env('WHATSAPP_NUMBER') }}" class="float-whatsapp bg-success" target="_blank">
                    <img src="{{ asset('assets/media/svg/social-logos/whatsapp.svg') }}" width="60px" height="60px" alt="whatsapp">
                </a> --}}
                @if ($viewType !== 'list')
                    <a href="{{ route('products.index') }}" class="btn btn-primary"
                        onclick="event.preventDefault(); window.location.href=this.href + '?category_id={{ $product->id }}';">
                        More
                    </a>
                @endif
                @if ($viewType === 'list' && Auth::check())
                    <div class="btn-group w-100" role="group">
                        <a href="{{ route($route . '.edit', $product->id) }}" class="btn btn-outline-secondary">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <button type="button" class="btn btn-outline-danger delete-product"
                            data-product-id="{{ $product->id }}">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
