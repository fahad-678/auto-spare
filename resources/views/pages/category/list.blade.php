@extends('layout.master')

@section('content')
    <div class="container mt-20">
        <!-- Filter Section -->
        <form id="filterForm" action="{{ route('category.index') }}" method="GET">
            <div class="row mb-10 d-flex justify-content-center">
                <div class="col-md-2">
                    <div class="position-relative">
                        <input type="text" id="searchInput" name="category_search" class="form-control"
                            placeholder="Search Categories..." value="{{ request('category_search') }}">
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
            @foreach ($categories as $category)
                <x-product.card :product="$category" viewType="list" route="category" />
                @if ($loop->iteration % 4 == 0)
        </div>
        <div class="row">
            @endif
            @endforeach
        </div>

        <!-- Pagination Controls -->
        {{-- <div class="d-flex justify-content-end my-4 align-items-center">
            {{ $categories->appends(request()->input())->links('pagination::bootstrap-5') }}
        </div> --}}
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
            function setupAutocomplete(inputId, resultsId, routeName) {
                $('#' + inputId).on('input', function() {
                    var query = $(this).val();
                    if (query != '') {
                        $.ajax({
                            url: "{{ route('category.autocomplete') }}",
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

            setupAutocomplete('searchInput', 'autocompleteResults', 'category.autocomplete');
            setupAutocomplete('searchInputNav', 'autocompleteResultsNav', 'category.autocomplete');
        });
    </script>
@endpush
