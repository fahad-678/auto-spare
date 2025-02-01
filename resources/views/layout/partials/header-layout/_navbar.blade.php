@php
    $cart = session()->get('cart');
@endphp
<div class="header-container">
    <!-- Top Bar for Mobile -->
    <div class="d-flex d-md-none align-items-center justify-content-between px-3 py-2 bg-white shadow-sm">
        <!-- Menu Toggle -->
        <button class="btn btn-icon btn-active-light-primary" id="kt_sidebar_toggle">
            <i class="ki-duotone ki-abstract-14 fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </button>

        <!-- Search and Cart Icons -->
        <div class="d-flex align-items-center gap-1">
            <div class="">
                <select class="form-control form-select" id="mobileSearchInput" name="mobile_search"></select>
            </div>
            <a href="{{ route('cart.index') }}" class="btn btn-icon btn-active-light-primary position-relative">
                <i class="ki-duotone ki-handcart fs-1"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ $cart ? count($cart) : 0 }}
                </span>
            </a>
        </div>
    </div>

    <!-- Sidebar for Mobile -->
    <div class="sidebar bg-white shadow-sm" id="kt_sidebar">
        <div class="p-3">
            <a class="d-flex align-items-center mb-7" href="{{ route('landing') }}">
                <img src="{{ asset(config('settings.KT_THEME_ASSETS.favicon')) }}" alt="Logo" class="h-30px">
                <span class="ms-2 fs-4 fw-bold">{{ config('app.name') }}</span>
            </a>

            <!--begin::Menu-->
            <div class="menu menu-rounded menu-column menu-active-bg menu-hover-bg menu-title-gray-700 fs-5"
                id="#kt_aside_menu" data-kt-menu="true">
                <div class="menu-item">
                    <a href="{{ route('landing') }}"
                        class="menu-link {{ request()->routeIs('landing') ? 'active border-3 border-start border-primary' : 'border-3 border-start border-transparent' }}">
                        <span class="menu-title">Home</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="{{ route('about-us') }}"
                        class="menu-link {{ request()->routeIs('about-us') ? 'active border-3 border-start border-primary' : 'border-3 border-start border-transparent' }}">
                        <span class="menu-title">About Us</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="{{ route('contact-us') }}"
                        class="menu-link {{ request()->routeIs('contact-us') ? 'active border-3 border-start border-primary' : 'border-3 border-start border-transparent' }}">
                        <span class="menu-title">Contact Us</span>
                    </a>
                </div>

                <!-- Products Section -->
                <div class="menu-item pt-5">
                    <div class="menu-content pb-2">
                        <span class="menu-section text-muted text-uppercase fs-7 fw-bold">Products</span>
                    </div>
                </div>
                <div class="menu-item">
                    <a href="{{ route('products.index') }}"
                        class="menu-link {{ request()->routeIs('products.index') ? 'active border-3 border-start border-primary' : 'border-3 border-start border-transparent' }}">
                        <span class="menu-title">List Product</span>
                    </a>
                </div>
                @auth
                    <div class="menu-item">
                        <a href="{{ route('products.create') }}"
                            class="menu-link {{ request()->routeIs('products.create') ? 'active border-3 border-start border-primary' : 'border-3 border-start border-transparent' }}">
                            <span class="menu-title">Add Product</span>
                        </a>
                    </div>
                @endauth
                @guest
                    <div class="menu-item">
                        <a href="{{ route('category.index') }}"
                            class="menu-link {{ request()->routeIs('category.index') ? 'active border-3 border-start border-primary' : 'border-3 border-start border-transparent' }}">
                            <span class="menu-title">Category</span>
                        </a>
                    </div>
                @endguest

                <!-- Category Section -->
                @if (Auth::check())
                    <div class="menu-item pt-5">
                        <div class="menu-content pb-2">
                            <span class="menu-section text-muted text-uppercase fs-7 fw-bold">Category</span>
                        </div>
                    </div>
                    <div class="menu-item">
                        <a href="{{ route('category.index') }}"
                            class="menu-link {{ Request::is('category') ? 'active border-3 border-start border-primary' : 'border-3 border-start border-transparent' }}">
                            <span class="menu-title">List Category</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ route('category.create') }}"
                            class="menu-link {{ Request::is('category/create') ? 'active border-3 border-start border-primary' : 'border-3 border-start border-transparent' }}">
                            <span class="menu-title">Add Category</span>
                        </a>
                    </div>
                @endif
            </div>
            <!--end::Menu-->
        </div>
    </div>

    <!-- Desktop Navbar -->
    <div class="navbar-wrapper position-relative">

        <nav
            class="navbar navbar-expand-md bg-white shadow-sm d-none d-md-block rounded-3 {{ request()->routeIs('landing') ? 'position-absolute' : 'position-relative' }}">
            <div class="container-fluid">
                <a class="navbar-brand p-0 m-0" href="{{ route('landing') }}">
                    <img src="{{ asset(config('settings.KT_THEME_ASSETS.favicon')) }}" alt="Logo" width="40"
                        height="33" class="d-inline-block align-text-top mb-1 me-1">
                    {{-- <span class="brand-name">{{ config('app.name') }}</span> --}}
                </a>

                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('cart.index') ? 'active' : '' }}"
                                aria-current="page" href="{{ route('cart.index') }}">Cart</a>
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
                                href="/contact-us">Contact Us</a>
                        </li>
                    </ul>

                    <div class="d-flex align-items-center gap-1">
                        <div class="w-250px">
                            <select class="form-control form-select" id="desktopSearchInput"
                                name="desktop_search"></select>
                        </div>
                        <a href="{{ route('cart.index') }}"
                            class="btn btn-icon btn-active-light-primary position-relative">
                            <i class="ki-duotone ki-handcart fs-1"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $cart ? count($cart) : 0 }}
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarToggle = document.getElementById('kt_sidebar_toggle');
        const sidebar = document.getElementById('kt_sidebar');

        if (sidebarToggle && sidebar) {
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('show');
            });

            document.addEventListener('click', function(event) {
                if (!sidebar.contains(event.target) &&
                    !sidebarToggle.contains(event.target) &&
                    sidebar.classList.contains('show')) {
                    sidebar.classList.remove('show');
                }
            });
        }

        ['#mobileSearchInput', '#desktopSearchInput'].forEach(selector => {
            $(selector).select2({
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
            }).on('select2:select', function(e) {
                var selectedValue = e.params.data;
                if (selectedValue.type && selectedValue.id) {
                    window.location.href = '/' + selectedValue.type + '?nav_search=' +
                        selectedValue.text;
                }
            });
        });

        const cart = {{ count($cart) }};
        if (!cart && localStorage.getItem('cart')) {
            localStorage.removeItem('cart');
        }
    });
</script>
