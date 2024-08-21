@extends('layout.master')

@section('content')
    <div class="container mt-20">
        <!-- Filter Section -->
        <form id="filterForm" action="{{ route('products.index') }}" method="GET">
            <div class="row mb-10 d-flex justify-content-center">
                <div class="col-md-2">
                    <select id="filterCategory" name="category_id" class="form-control form-select">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <select id="filterBrand" name="brand_id" class="form-control form-select">
                        <option value="">All Brands</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ request('brand_id') == $brand->id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <div class="position-relative">
                        <input type="text" id="searchInput" name="product_search" class="form-control"
                            placeholder="Search products..." value="{{ request('product_search') }}">
                        <div id="autocompleteResults" class="position-absolute w-100 bg-white border rounded-bottom"
                            style="display:none; z-index: 1000;"></div>
                    </div>
                </div>
                <div class="col-md-1">
                    <button type="submit" id="filterButton" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>

        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3 mb-4 pointer">
                    <div class="card h-100 border border-2 text-center position-relative">
                        <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none">
                            <img src="{{ asset('storage/products/' . basename($product->image)) }}" class="card-img-top" height="205" width="305"
                                alt="{{ $product->name }}">
                        </a>
                        @if ($product->discount > 0)
                            <span class="position-absolute top-0 end-0 p-2 badge text-bg-warning">
                                Sale!
                            </span>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">
                                <a href="{{ route('products.show', $product->id) }}"
                                    class="text-decoration-none text-dark">
                                    {{ $product->name }}
                                </a>
                            </h5>
                            <p class="card-text text-primary">
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
                            </p>
                            <div class="mt-auto">
                                <a href="#" class="btn btn-primary mb-2">Add to Cart</a>
                                @if (Auth::check())
                                    <div class="btn-group w-100" role="group">
                                        <a href="{{ route('products.edit', $product->id) }}"
                                            class="btn btn-outline-secondary">
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
                @if ($loop->iteration % 4 == 0)
        </div>
        <div class="row">
            @endif
            @endforeach
        </div>

        <!-- Pagination Controls -->
        <div class="d-flex justify-content-end my-4 align-items-center">
            {{ $products->appends(request()->input())->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-product');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const form = document.createElement('form');
                            form.method = 'POST';
                            form.action = `{{ url('/products') }}/${productId}`;
                            form.innerHTML = `
                            @csrf
                            @method('DELETE')
                        `;
                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#filterCategory, #filterBrand').select2();
        });
    </script>
    <script>
        $(document).ready(function() {
            function setupAutocomplete(inputId, resultsId, routeName) {
                $('#' + inputId).on('input', function() {
                    var query = $(this).val();
                    if (query != '') {
                        $.ajax({
                            url: "{{ route('products.autocomplete') }}",
                            method: 'GET',
                            data: {
                                query: query
                            },
                            success: function(data) {
                                $('#' + resultsId).html(data);
                                $('#' + resultsId).show();
                            }
                        });
                    } else {
                        $('#' + resultsId).hide();
                    }
                });

                $(document).on('click', '#' + resultsId + ' .autocomplete-item', function() {
                    $('#' + inputId).val($(this).text());
                    $('#' + resultsId).hide();
                });
            }

            setupAutocomplete('searchInput', 'autocompleteResults', 'products.autocomplete');
            setupAutocomplete('searchInputNav', 'autocompleteResultsNav', 'products.autocomplete');
        });
    </script>
@endpush
