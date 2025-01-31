@extends('layout.master')

@section('content')
    <div class="container text-center mt-15 mb-10">
        <form action="{{ route('cart.checkout') }}" id="cartForm" method="POST" enctype="multipart/form-data">
            @csrf
            @if (empty($cart))
                <div class="card shadow-sm p-4">
                    <div class="card-body">
                        <img src="{{ asset('assets/media/img/noitemfound.jpg') }}" alt="No Items Found" class="img-fluid mb-4"
                            style="max-width: 300px;">
                        <h3 class="text-dark">No Items Found</h3>
                        <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">
                            <i class="fas fa-home"></i> Add Products
                        </a>
                    </div>
                </div>
            @else
                <div class="row">
                    @foreach ($cart as $item)
                        @if (isset($products[$item['id']]))
                            @php
                                $product = $products[$item['id']];
                            @endphp
                            <x-product.card_cart :product="$product" :cart="$item" />
                        @endif
                    @endforeach
                </div>
                <div class="row pb-2 ps-2 py-4">
                    <x-forms.textarea name="description" rows="3" label="Order Description" showLabel="" />
                </div>
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-primary my-5"
                        onclick="clearCart('{{ route('cart.store') }}', '{{ csrf_token() }}')">
                        <i class="fa-solid fa-trash"></i> Clear Cart
                    </button>
                    <button type="button" class="btn btn-primary my-5" onclick="openUserInfoModal()">
                        <i class="fas fa-shopping-cart"></i> Submit Order
                    </button>
                </div>
            @endif
        </form>
    </div>

    <!-- User Info Modal -->
    <div class="modal fade" tabindex="-1" id="userInfoModal" aria-labelledby="userInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userInfoModalLabel">Complete Your Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="username" class="form-label"><span class="required">Full Name</span></label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label"><span class="required">Phone Number</span></label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label"><span class="required">Email</span></label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label"><span class="required">Country</span></label>
                        <x-forms.country-select name="country" id="country" showLabel="" />
                    </div>
                    <div class="mb-3">
                        <label for="company_name" class="form-label"><span class="required">Company Name</span></label>
                        <input type="text" class="form-control" id="company_name" name="company_name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="submitOrder()">Confirm Order</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/cart.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#userInfoModal').on('shown.bs.modal', function() {
                $('#country').select2({
                    dropdownParent: $('#userInfoModal')
                });
            });
        });


        const userInfoModal = new bootstrap.Modal(document.getElementById('userInfoModal'));

        function openUserInfoModal() {
            userInfoModal.show();
        }

        function submitOrder() {
            const username = document.getElementById('username').value;
            const phone = document.getElementById('phone').value;
            const email = document.getElementById('email').value;
            const country = document.getElementById('country').value;
            const companyName = document.getElementById('company_name').value;

            if (!username || !phone || !email || !country || !companyName) {
                toastr.error('Please fill in all required fields');
                return;
            }

            const form = document.getElementById('cartForm');
            const usernameInput = document.createElement('input');
            usernameInput.type = 'hidden';
            usernameInput.name = 'username';
            usernameInput.value = username;

            const phoneInput = document.createElement('input');
            phoneInput.type = 'hidden';
            phoneInput.name = 'phone';
            phoneInput.value = phone;

            const emailInput = document.createElement('input');
            emailInput.type = 'hidden';
            emailInput.name = 'email';
            emailInput.value = email;

            const countryInput = document.createElement('input');
            countryInput.type = 'hidden';
            countryInput.name = 'country';
            countryInput.value = country;

            const companyNameInput = document.createElement('input');
            companyNameInput.type = 'hidden';
            companyNameInput.name = 'company_name';
            companyNameInput.value = companyName;

            form.appendChild(usernameInput);
            form.appendChild(phoneInput);
            form.appendChild(emailInput);
            form.appendChild(countryInput);
            form.appendChild(companyNameInput);

            form.submit();
        }

        document.getElementById('phone').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');

            if (this.value.length > 15) {
                this.value = this.value.slice(0, 15);
            }
        });

        function openUserInfoModal() {
            const description = document.querySelector('textarea[name="description"]').value;
            if (!description.trim()) {
                toastr.error('Please add an order description');
                return;
            }
            userInfoModal.show();
        }
    </script>
@endpush
