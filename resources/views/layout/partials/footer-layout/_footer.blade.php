<!-- Footer -->
<footer class="text-white" style="background-color: #2C3E50;">
    <div class="container footer-container">
        <div class="row mb-3">
            <!-- Logo and Description -->
            <div class="col-md-3">
                <h5 class="mb-4 text-primary ">{{ config('app.name', 'Laravel') }}</h5>
                {{-- <p style="color: lightgray">Leo felis sodales sed convallis purus accumsan tempus dis pellentesque class
                    orci. Si cras dis imperdiet tempor primis vehicula.</p>
                <div class="my-4">
                    <img src="{{ asset('assets/media/svg/card-logos/visa.svg') }}" alt="Visa" class="img-fluid"
                        style="max-width: 30px;">
                    <img src="{{ asset('assets/media/svg/card-logos/mastercard.svg') }}" alt="MasterCard"
                        class="img-fluid" style="max-width: 30px;">
                    <img src="{{ asset('assets/media/svg/card-logos/american-express.svg') }}" alt="Amex"
                        class="img-fluid" style="max-width: 30px;">
                    <img src="{{ asset('assets/media/svg/card-logos/american-express-dark.svg') }}" alt="PayPal"
                        class="img-fluid" style="max-width: 30px;">
                </div> --}}
            </div>
            <!-- Customer Service -->
            <div class="col-md-3">
                <h5 class="mb-4 text-white fw-bold fs-6">Customer Service</h5>
                <ul class="list-unstyled footer-links">
                    {{-- <li><a href="#" class="text-white">My Account</a></li> --}}
                    <li><a href="#" class="text-white">Help Center</a></li>
                    <li><a href="#" class="text-white">Track My Order</a></li>
                    <li><a href="#" class="text-white">Shipping & Returns</a></li>
                    <li><a href="#" class="text-white">Store Location</a></li>
                </ul>
            </div>
            <!-- Information -->
            <div class="col-md-3">
                <h5 class="mb-4 text-white fw-bold fs-6">Information</h5>
                <ul class="list-unstyled footer-links">
                    <li><a href="/about-us" class="text-white">About Us</a></li>
                    <li><a href="#" class="text-white">Legal Notice</a></li>
                    <li><a href="#" class="text-white">Customer Reviews</a></li>
                    <li><a href="#" class="text-white">Guides & Articles</a></li>
                    <li><a href="#" class="text-white">Coupon Codes</a></li>
                </ul>
            </div>
            <!-- Contact Us -->
            <div class="col-md-3">
                <h5 class="mb-4 text-white fw-bold fs-6">Contact Us</h5>
                <ul class="list-unstyled footer-links">
                    <li><i class="fas fa-map-marker-alt text-primary"></i> Shop#6, Fal Hotel Building, Baniyas Metro Station, Deira Dubai, Dubai, UAE</li>
                    <li><i class="fas fa-envelope text-primary"></i> info@nkautopart.com</li>
                    <li><i class="fas fa-phone text-primary"></i> {{ env('LANDLINE_NUMBER') }}</li>
                    <li><i class="fa-brands fa-whatsapp text-primary fs-4"></i> {{ env('WHATSAPP_NUMBER') }}</li>
                    <li><i class="fas fa-clock text-primary"></i> 8:30 am to 1:30 pm <br /> <span class="ms-5">4:00 pm
                            to 8:30 pm</span> </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="text-center py-3" style="background-color: #1C2A35;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-md-start">
                    © 2023 <span class="text-primary fw-bold">{{ config('app.name') }}</span>, All rights reserved. Powered by
                    <span class="text-primary fw-bold">WebWaveSolutions</span>
                </div>
                <div class="col-md-6 text-md-end footer-links">
                    @if (Auth::check())
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <a href="#" class="pe-2 border-end border-secondary-subtle"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </form>
                    @else
                        <a href="/login" class="pe-2 border-end border-secondary-subtle">Login</a>
                    @endif
                    <a href="#" class="px-2 border-end border-secondary-subtle">Brands</a>
                    <a href="#" class="px-2 border-end border-secondary-subtle">Special Offers</a>
                    <a href="/about-us" class="px-2 border-end border-secondary-subtle">About Us</a>
                    <a href="/contact-us" class="ps-2">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</footer>
