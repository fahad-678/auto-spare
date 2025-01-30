<!-- Footer -->
<footer class="text-white" style="background-color: #2C3E50;">
    <div class="container py-5">
        <div class="row justify-content-center">
            
            <!-- Company Name -->
            <div class="col-md-3 text-center text-md-start mb-4">
                <h3 class="mb-3 text-primary fw-bold">{{ config('app.name', 'Laravel') }}</h3>
            </div>
            
            <!-- Branches -->
            <div class="col-md-6 mb-4">
                <h3 class="text-white text-center text-md-start fw-bold mb-3">Our Branches</h3>
                <div class="row">
                    
                    <div class="col-md-6 text-center text-md-start">
                        <h5 class="text-primary fw-bold">Soofi Autos</h5>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-map-marker-alt text-primary me-2"></i> 19 - Jan Plaza, Peshawar Cantt</li>
                            <li><i class="fas fa-phone text-primary me-2"></i> +92-317-8333672 | +92-321-9101241</li>
                            <li><i class="fas fa-phone text-primary me-2"></i> +92-91-5277774</li>
                            <li><i class="fas fa-fax text-primary me-2"></i> +92-91-5270016</li>
                            <li><i class="fas fa-envelope text-primary me-2"></i> sapp_786@hotmail.com</li>
                        </ul>
                    </div>
                    
                    <div class="col-md-6 text-center text-md-start">
                        <h5 class="text-primary fw-bold">Ubaid Motors</h5>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-map-marker-alt text-primary me-2"></i> Cantonment Plaza, Khoram Road, Peshawar</li>
                            <li><i class="fas fa-phone text-primary me-2"></i> 091-5277775</li>
                            <li><i class="fas fa-envelope text-primary me-2"></i> shoaibkhan7719@gmail.com</li>
                            <li><i class="fa-brands fa-whatsapp text-primary fs-5 me-2"></i> +92-300-5961283 (Shoaib)</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Contact Information -->
            <div class="col-md-3 text-center text-md-start mb-4">
                <h3 class="text-white fw-bold mb-3">Contact Us</h3>
                <ul class="list-unstyled">
                    <li><i class="fas fa-map-marker-alt text-primary me-2"></i> Shop#6, Fal Hotel Building, Baniyas Metro Station, Deira Dubai, UAE</li>
                    <li><i class="fas fa-envelope text-primary me-2"></i> info@nkautopart.com</li>
                    <li><i class="fas fa-phone text-primary me-2"></i> {{ env('LANDLINE_NUMBER') }}</li>
                    <li><i class="fa-brands fa-whatsapp text-primary fs-5 me-2"></i> {{ env('WHATSAPP_NUMBER') }}</li>
                    <li><i class="fas fa-clock text-primary me-2"></i> 8:30 am - 1:30 pm | 4:00 pm - 8:30 pm</li>
                </ul>
            </div>
        </div>
    </div>
    
    <!-- Footer Bottom -->
    <div class="text-center py-3" style="background-color: #1C2A35;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-md-start mb-2 mb-md-0">
                    &copy; 2023 <span class="text-primary fw-bold">{{ config('app.name') }}</span>, All rights reserved. Powered by <span class="text-primary fw-bold">WebWaveSolutions</span>
                </div>
                <div class="col-md-6 text-md-end">
                    @if (Auth::check())
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <a href="#" class="pe-2 border-end border-secondary-subtle" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
