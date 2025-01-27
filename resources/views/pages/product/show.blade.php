@extends('layout.master')

@section('content')
    <div class="container mt-md-20 mt-10 card p-4 mb-3">
        <div class="row">
            <div class="row mb-5">
                <h1 class="h2 mb-4 fw-bold text-primary border-bottom pb-3">{{ $product->name }}</h1>

                <div class="swiper mySwiper2 rounded-3 overflow-hidden">
                    <div class="swiper-wrapper">
                        @foreach ($product->images as $image)
                            <div class="swiper-slide">
                                <img class="swiper-main-img img-fluid" src="{{ asset('storage/' . $image->image_path) }}"
                                    alt="Product image">
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next bg-white p-5 rounded-circle shadow"></div>
                    <div class="swiper-button-prev bg-white p-5 rounded-circle shadow"></div>
                </div>
                @if (count($product->images) > 1)
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach ($product->images as $image)
                                <div class="swiper-slide cursor-pointer">
                                    <img class="swiper-thumb-img" src="{{ asset('storage/' . $image->image_path) }}"
                                        alt="Product thumbnail">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
            <div class="product-details card border-0 p-4 h-100">
                <div class="row g-3">
                    <div class="col-md-6">
                        <dl class="mb-0">
                            <dt class="fs-6 small mb-1">Part Number</dt>
                            <dd class="h5 text-primary mb-3">
                                @if ($product->part_number)
                                    {{ $product->part_number }}
                                @else
                                    <a href="https://wa.me/{{ env('WHATSAPP_NUMBER') }}" class="text-decoration-none small">
                                        Request Part Number
                                    </a>
                                @endif
                            </dd>

                            <dt class="fs-6 small mb-1">OEM</dt>
                            <dd class="h5 text-primary mb-3">
                                @if ($product->oem)
                                    {{ $product->oem }}
                                @else
                                    <a href="https://wa.me/{{ env('WHATSAPP_NUMBER') }}" class="text-decoration-none small">
                                        Request OEM
                                    </a>
                                @endif
                            </dd>
                        </dl>
                    </div>

                    <div class="col-md-6">
                        <dl class="mb-0">
                            <dt class="fs-6 small mb-1">Category</dt>
                            <dd class="h5 text-primary mb-3">
                                @if ($product->category?->name)
                                    {{ $product->category->name }}
                                @else
                                    <a href="https://wa.me/{{ env('WHATSAPP_NUMBER') }}" class="text-decoration-none small">
                                        Request Category
                                    </a>
                                @endif
                            </dd>

                            <dt class="fs-6 small mb-1">Brand</dt>
                            <dd class="h5 text-primary mb-3">
                                @if ($product->brand?->name)
                                    {{ $product->brand->name }}
                                @else
                                    <a href="https://wa.me/{{ env('WHATSAPP_NUMBER') }}"
                                        class="text-decoration-none small">
                                        Request Brand
                                    </a>
                                @endif
                            </dd>
                        </dl>
                    </div>
                </div>

                <div class="bg-light p-4 rounded-3 mt-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="h4 mb-0 fw-bold text-dark">
                            @if ($product->price > 0)
                                {{ formatePrice($product->price) }}
                            @else
                                <a href="https://wa.me/{{ env('WHATSAPP_NUMBER') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-comment-alt me-2"></i>Request Price
                                </a>
                            @endif
                        </span>
                        @if ($product->discount)
                            <span class="badge bg-success fs-6">
                                {{ $product->discount }}% OFF
                            </span>
                        @endif
                    </div>

                    <div class="row g-2">
                        <div class="col-6">
                            <div class="border p-2 rounded text-center">
                                <span class="fs-6 text-muted small d-block">Stock</span>
                                <span class="text-dark fw-bold">
                                    {{ $product->stock ?? 'N/A' }}
                                </span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="border p-2 rounded text-center">
                                <span class="fs-6 text-muted small d-block">Status</span>
                                <span class="text-dark fw-bold">
                                    {{ $product->status ?? 'Check Availability' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <h5 class="fs-6 mb-3 fw-bold">Product Description</h5>
                    <p class="text-muted lh-lg">
                        {{ $product->description ?? 'No description available' }}
                    </p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
            @if (Auth::check())
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit Product</a>
            @endif
        </div>
    </div>
@endsection


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var totalImages = {{ count($product->images) }};
        var swiper = null;

        if (totalImages > 1) {
            swiper = new Swiper(".mySwiper", {
                spaceBetween: 2,
                direction: "vertical",
                slidesPerView: totalImages,
                freeMode: true,
                watchSlidesProgress: true,
            });
        }

        var swiper2 = new Swiper(".mySwiper2", {
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: swiper ? {
                swiper: swiper
            } : null,
        });
    </script>
    <script>
        document.querySelectorAll('.swiper-slide').forEach(container => {
            const img = container.querySelector('.swiper-main-img');

            container.addEventListener('mousemove', e => {
                const {
                    left,
                    top,
                    width,
                    height
                } = container.getBoundingClientRect();
                const x = ((e.clientX - left) / width) * 100;
                const y = ((e.clientY - top) / height) * 100;

                img.style.transformOrigin = `${x}% ${y}%`;
                img.style.transform = 'scale(2)';
            });

            container.addEventListener('mouseleave', () => {
                img.style.transform = 'scale(1)';
                img.style.transformOrigin = 'center center';
            });
        });
    </script>
    <script></script>
@endpush
