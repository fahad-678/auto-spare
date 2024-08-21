<div class="position-relative">
    <div class="custom-navbar {{ Request::is('/') ? '' : 'position-md-relative' }}">
        <nav
            class="navbar navbar-expand-md bg-body-tertiary  {{ Request::is('/') ? 'shadow-lg' : 'shadow-sm' }}  rounded">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand" href="{{ route('landing') }}">
                        <img src="{{ config('settings.KT_THEME_ASSETS.favicon') }}" alt="Logo" width="30"
                            height="24" class="d-inline-block align-text-top mb-2 me-1">
                        <span>{{ config('app.name') }}</span>
                    </a>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page"
                                href="/">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ Request::is('products*') ? 'active' : '' }}"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Product
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item {{ Request::is('products') ? 'active' : '' }}"
                                        href="{{ route('products.index') }}">List Product</a></li>
                                @if (Auth::check())
                                    <li><a class="dropdown-item {{ Request::is('products/create') ? 'active' : '' }}"
                                            href="{{ route('products.create') }}">Add Product</a></li>
                                @endif
                                {{-- <li><hr class="dropdown-divider"></li> --}}
                                {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('about-us') ? 'active' : '' }}" href="/about-us">About
                                Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('contact-us') ? 'active' : '' }}"
                                href="/contact-us">Contact US</a>
                        </li>
                    </ul>
                    <form class="d-flex ms-md-10" role="search" action="{{ route('products.index') }}" method="GET">
                        <div class="position-relative ms-md-10">
                            <input type="text" id="searchInputNav" name="nav_search" class="form-control"
                                placeholder="Search products..." value="{{ request('nav_search') }}">
                            <div id="autocompleteResultsNav"
                                class="position-absolute w-100 bg-white border rounded-bottom"
                                style="display:none; z-index: 1000;"></div>
                        </div>
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
