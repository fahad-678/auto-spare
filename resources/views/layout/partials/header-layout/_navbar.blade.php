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
                        <img src="{{ asset(config('settings.KT_THEME_ASSETS.favicon')) }}" alt="Logo" width="35"
                            height="28" class="d-inline-block align-text-top mb-1 me-1">
                        <span>{{ config('app.name') }}</span>
                    </a>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page"
                                href="/">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->routeIs('products.*') ? 'active' : '' }}"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Products
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item {{ request()->routeIs('products.index') ? 'active' : '' }}"
                                        href="{{ route('products.index') }}">
                                        List Product
                                    </a>
                                </li>
                                @auth
                                    <li>
                                        <a class="dropdown-item {{ request()->routeIs('products.create') ? 'active' : '' }}"
                                            href="{{ route('products.create') }}">
                                            Add Product
                                        </a>
                                    </li>
                                @endauth
                                @guest
                                    <li>
                                        <a class="dropdown-item {{ request()->routeIs('category.index') ? 'active' : '' }}"
                                            href="{{ route('category.index') }}">
                                            Category
                                        </a>
                                    </li>
                                @endguest
                            </ul>
                        </li>
                        @if (Auth::check())
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle {{ Request::is('category*') ? 'active' : '' }}"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Category
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item {{ Request::is('category') ? 'active' : '' }}"
                                            href="{{ route('category.index') }}">List Category</a></li>
                                    <li><a class="dropdown-item {{ Request::is('category/create') ? 'active' : '' }}"
                                            href="{{ route('category.create') }}">Add Category</a></li>
                                </ul>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('about-us') ? 'active' : '' }}" href="/about-us">About
                                Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('contact-us') ? 'active' : '' }}"
                                href="/contact-us">Contact US</a>
                        </li>
                    </ul>
                    <div>
                        <select class="form-control form-select" id="searchInputNav" name="nav_search"></select>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#searchInputNav').select2({
            placeholder: 'Search Products',

            ajax: {
                url: "{{ route('dashboard.globalSearch') }}",
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
        $('#searchInputNav').on('select2:select', function(e) {
            var selectedValue = e.params.data;
            if (selectedValue.type && selectedValue.id) {
                window.location.href = '/' + selectedValue.type + '?nav_search=' + selectedValue.text;
            }
        })
    })
</script>
