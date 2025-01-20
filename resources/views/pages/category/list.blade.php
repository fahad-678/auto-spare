@extends('layout.master')

@section('content')
    <div class="container mt-md-20 mt-10">
        <!-- Filter Section -->
        <form id="filterForm" action="{{ route('category.index') }}" method="GET">
            <div class="row mb-10 d-flex justify-content-center">
                <div class="col-md-2 col-6">
                    <select class="form-control form-select" id="searchInput" name="category_search"></select>
                </div>
                <div class="col-md-1 col-3">
                    <button type="submit" id="filterButton" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
        <div class="row">
            @foreach ($categories as $category)
                <x-product.card :product="$category" viewType="list" route="category" />
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
                            form.action = `{{ url('/category') }}/${productId}`;
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
            $('#searchInput').select2({
                placeholder: 'Search Products',

                ajax: {
                    url: "{{ route('category.search') }}",
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
                    window.location.href = '/products?category_id=' + selectedValue.id;
                }
            })
        });
    </script>
@endpush
