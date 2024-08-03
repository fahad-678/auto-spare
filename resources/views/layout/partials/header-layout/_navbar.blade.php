<div class="position-relative">
   <div class="custom-navbar">
    <nav class="navbar navbar-expand-md bg-body-tertiary shadow-lg rounded">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand" href="#">
            <img src="{{asset('assets/media/logos/custom-2.svg')}}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            <span>Auto Spare</span>
          </a>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle {{ Request::is('products*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Product
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item {{ Request::is('products/list') ? 'active' : '' }}" href="products/list">List Product</a></li>
                <li><a class="dropdown-item {{ Request::is('products/add') ? 'active' : '' }}" href="products/add">Add Product</a></li>
                {{-- <li><hr class="dropdown-divider"></li> --}}
                {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('about-us') ? 'active' : '' }}" href="/about-us">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('contact-us') ? 'active' : '' }}" href="/contact-us">Contact US</a>
            </li>
          </ul>
          <form class="d-flex ms-md-10" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
  </div>
</div>