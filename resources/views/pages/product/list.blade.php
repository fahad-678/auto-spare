@extends('layout.master')

@section('content')
    <div class="container mt-md-20 mt-10">
        <!-- Filter Section -->
        <form id="filterForm" action="{{ route('products.index') }}" method="GET">
            <div class="row mb-10 d-flex justify-content-center">
                <div class="col-md-2 col-6">
                    <select id="filterCategory" name="category_id" class="form-control form-select">
                        <option value="">All Categories</option>
                    </select>
                </div>
                <div class="col-md-2 col-6">
                    <select id="filterSubCategory" name="sub_category_id" class="form-control form-select">
                        <option value="">All Subcategories</option>
                        @foreach ($sub_categories as $sub_category)
                            <option value="{{ $sub_category->id }}"
                                {{ request('sub_category_id') == $sub_category->id ? 'selected' : '' }}>
                                {{ $sub_category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 col-6">
                    <select id="filterBrand" name="brand_id" class="form-control form-select">
                        <option value="">All Brands</option>
                    </select>
                </div>
                <div class="col-md-2 col-6">
                    <select class="form-control form-select" id="searchInput" name="product_search"></select>
                </div>
                <div class="col-md-1 col-3 mt-3 mt-md-0">
                    <button type="submit" id="filterButton" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>

        <div class="row">
            @foreach ($products as $product)
                <x-product.card_list :product="$product" />
            @endforeach
        </div>

        <!-- Pagination Controls -->
        <div class="d-flex justify-content-end my-4 align-items-center">
            {{ $products->appends(request()->input())->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/cart.js') }}"></script>
    <script src="{{ asset('assets/js/card_list.js') }}"></script>
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
    <script type="text/javascript">
        $(document).ready(function() {
            populateSelect('category_id', "{{ route('category.index') }}", 'id', 'name', 'All Categories');
            populateSelect('brand_id', "{{ route('brand.index') }}", 'id', 'name');
            var $categorySelect = $('select[name="category_id"]');
            var $subCategorySelect = $('select[name="sub_category_id"]');
            var subCategoryUrl = "{{ route('sub-category.index') }}";

            populateSubCategory($categorySelect, $subCategorySelect, subCategoryUrl, null, false);
            $('#filterCategory, #filterSubCategory, #filterBrand').select2();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#searchInput').select2({
                placeholder: 'Search Products',

                ajax: {
                    url: "{{ route('products.search') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            query: params.term,
                            page: params.page || 1,
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: data.items,
                            pagination: {
                                more: data.pagination.more
                            }
                        };
                    },
                    cache: true,
                },
            });
            $('#searchInput').on('select2:select', function(e) {
                var selectedValue = e.params.data;
                if (selectedValue.id) {
                    window.location.href = '/products/' + selectedValue.id;
                }
            })
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-id');

                    const product = {
                        id: parseInt(productId),
                        quantity: 1
                    };

                    addToCart(product, "{{ route('cart.store') }}", "{{ csrf_token() }}");
                });
            });
        });
    </script>
@endpush
