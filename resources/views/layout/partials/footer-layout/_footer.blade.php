<!-- Footer -->
<footer class="text-white" style="background-color: #2C3E50;">
    <div class="container footer-container">
        <div class="row mb-3 justify-content-center">
            <div class="col-md-3 text-center text-md-start">
                <h5 class="mb-4 text-primary ">{{ config('app.name', 'Laravel') }}</h5>
            </div>
            <div class="col-md-3 text-center text-md-start">
                <h5 class="mb-4 text-white fw-bold fs-6">Soofi Autos</h5>
                <ul class="list-unstyled footer-links">
                    <li><i class="fas fa-map-marker-alt text-primary"></i> 19 - Jan Plaza, Peshawar Cantt</li>
                    <li><i class="fas fa-phone text-primary"></i> +92-317-8333672 | +92-321-9101241</li>
                    <li><i class="fas fa-phone text-primary"></i> +92-91-5277774</li>
                    <li><i class="fas fa-fax text-primary"></i> +92-91-5270016</li>
                    <li><i class="fas fa-envelope text-primary"></i> sapp_786@hotmail.com</li>
                </ul>
            </div>
            <div class="col-md-3 text-center text-md-start">
                <h5 class="mb-4 text-white fw-bold fs-6">Ubaid Motors</h5>
                <ul class="list-unstyled footer-links">
                    <li><i class="fas fa-map-marker-alt text-primary"></i> Cantonment Plaza, Khoram Road, Peshawar</li>
                    <li><i class="fas fa-phone text-primary"></i> 091-5277775</li>
                    <li><i class="fas fa-envelope text-primary"></i> shoaibkhan7719@gmail.com</li>
                    <li><i class="fa-brands fa-whatsapp text-primary fs-4"></i> +92-300-5961283 (Shoaib)</li>
                </ul>
            </div>
            <div class="col-md-3 text-center text-md-start">
                <h5 class="mb-4 text-white fw-bold fs-6">Contact Us</h5>
                <ul class="list-unstyled footer-links">
                    <li><i class="fas fa-map-marker-alt text-primary"></i> Shop#6, Fal Hotel Building, Baniyas Metro Station, Deira Dubai, Dubai, UAE</li>
                    <li><i class="fas fa-envelope text-primary"></i> info@nkautopart.com</li>
                    <li><i class="fas fa-phone text-primary"></i> {{ env('LANDLINE_NUMBER') }}</li>
                    <li><i class="fa-brands fa-whatsapp text-primary fs-4"></i> {{ env('WHATSAPP_NUMBER') }}</li>
                    <li><i class="fas fa-clock text-primary"></i> 8:30 am to 1:30 pm <br /> <span class="ms-5">4:00 pm to 8:30 pm</span> </li>
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
