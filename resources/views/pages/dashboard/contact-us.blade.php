@extends('layout.master')

@section('content')
    <div class="container mt-md-20 card contact-us">
        <header class="text-center mb-5 pt-7 ">
            <h1 class="fs-2x fw-bolder">Contact Us</h1>
        </header>
        <div class="row">
            <div class="col-md-6 card">
                <div class="ratio ratio-4x3">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14433.433579262205!2d55.310009!3d25.270729!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f433b89c5deef%3A0x3bdb1f3e9484a0d1!2s34b%20Street%2054%2C%20Dubai%2C%20United%20Arab%20Emirates!5e0!3m2!1sen!2sus!4v1628716703443!5m2!1sen!2sus"
                        style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            <div class="col-md-6 card fs-5 pb-3">
                <h2 class="card-header text-center py-3">Get in Touch</h2>
                <form id="contactForm">
                    <div class="mb-3">
                        <label for="name" class="form-label"><strong>Name:</strong></label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label"><strong>Email:</strong></label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label"><strong>Phone:</strong></label>
                        <input type="tel" class="form-control" id="phone" name="phone">
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label"><strong>Message:</strong></label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <a id="emailLink" href="mailto:{{ env('MAIL_FROM_ADDRESS') }}" class="btn btn-primary"
                    style="display:none;">Email Us Now</a>
            </div>
        </div>
        <div class="mt-4 card p-4 fs-5 mb-5">
            <h3>Need Help?</h3>
            <p>Whether you're looking for a specific part, need technical assistance, or have questions about our products,
                we're ready to help. Don't hesitate to reach out!</p>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const mailFromAddress = @json(env('EMAIL'));
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var name = encodeURIComponent(document.getElementById('name').value);
            var email = encodeURIComponent(document.getElementById('email').value);
            var phone = encodeURIComponent(document.getElementById('phone').value);
            var message = encodeURIComponent(document.getElementById('message').value);

            var mailtoLink =
                `mailto:${mailFromAddress}?subject=Contact%20Form%20Submission&body=Name:%20${name}%0AEmail:%20${email}%0APhone:%20${phone}%0AMessage:%20${message}`;

            var emailLink = document.getElementById('emailLink');
            emailLink.href = mailtoLink;
            emailLink.click();

            document.getElementById('contactForm').querySelectorAll('input, textarea').forEach(function(element) {
                element.disabled = true;
            });

            document.querySelector('button[type="submit"]').style.display = 'none';
        });
    </script>
@endpush
