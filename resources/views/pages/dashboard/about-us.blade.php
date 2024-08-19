@extends('layout.master')

@section('content')
    <div class="container mt-md-20 about-us fs-5 card shadow">
        <header class="text-center mb-5 pt-7 ">
            <h1 class="fs-2x fw-bolder">About {{ config('app.name') }} Co L.L.C.</h1>
        </header>

        <section class="mb-5">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('assets/media/stock/600x600/img-17.jpg') }}" class="img-fluid rounded-start"
                            alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body pt-4">
                            <h5 class="card-header text-center fs-2 fw-bolder">Company Description</h5>
                            <p class="card-text">Welcome to Nafees Auto Spare Parts Co LLC, your trusted source for
                                top-quality auto parts in Dubai. Since 2014, we've been dedicated to supplying genuine parts
                                for Nissan and Toyota vehicles, ensuring peak performance and reliability. Alongside our
                                original parts, we proudly offer a wide range of aftermarket products under our renowned NK
                                brand, catering to SUBARU, SUZUKI, DAIHATSU, KIA, NISSAN, HYUNDAI, HONDA, MITSUBISHI, MAZDA,
                                and TOYOTA.</p>
                            <p class="card-text">At Nafees Auto Spare Parts Co LLC, our commitment to customer satisfaction
                                and product excellence is unmatched. Whether you're a mechanic, auto enthusiast, or business
                                owner, we meet your needs with competitive pricing, fast delivery, and exceptional service.
                                Our reputation as a trusted brand is built on years of reliability, expertise, and a genuine
                                passion for automobiles.</p>
                            <p class="card-text">Discover our extensive inventory online or visit our showroom to see why
                                Nafees Auto Spare Parts Co LLC is the preferred choice for auto parts in Dubai and beyond.
                                Join us in driving excellence and reliability on every road.</p>
                            {{-- <p class="card-text">Experience the Gaolian difference today and discover why we are the preferred choice for auto parts in Dubai. Let us assist you in finding the perfect solution for all of your automotive needs.</p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-5 card shadow p-4">
            <h2 class="fs-2 fw-bolder card-header">NK BRAND</h2>
            <p class="fs-5 fw-bolder my-1">Discover NK: The Ultimate Solution for Aftermarket Auto Parts</p>
            <p>
                In the ever-evolving world of automotive maintenance and repair, finding reliable aftermarket parts can be a
                challenge. Enter NK, the brand synonymous with quality, affordability, and performance. Whether you're a
                seasoned mechanic, an auto enthusiast, or a vehicle owner looking for the best in aftermarket solutions, NK
                offers the ultimate range of parts to keep your vehicle running smoothly.

            </p>
            <p class="fs-2 fw-bolder fst-italic text-center mb-2">
                Why Choose NK?
            </p>
            <div class="accordion" id="missionAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="missionHeadingOne">
                        <button class="accordion-button fs-4 fw-bold py-4" type="button" data-bs-toggle="collapse"
                            data-bs-target="#missionCollapseOne" aria-expanded="true" aria-controls="missionCollapseOne">
                            Quality You Can Trust
                        </button>
                    </h2>
                    <div id="missionCollapseOne" class="accordion-collapse collapse show"
                        aria-labelledby="missionHeadingOne" data-bs-parent="#missionAccordion">
                        <div class="accordion-body">
                            At NK, quality is our top priority. We understand that aftermarket parts need to match the
                            performance and durability of original equipment manufacturer (OEM) parts. That’s why each NK
                            part undergoes rigorous testing and quality control processes. From brake pads to suspension
                            components, every product is designed to meet or exceed industry standards, ensuring your
                            vehicle performs at its best.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="missionHeadingTwo">
                        <button class="accordion-button collapsed fs-4 fw-bold py-4" type="button"
                            data-bs-toggle="collapse" data-bs-target="#missionCollapseTwo" aria-expanded="false"
                            aria-controls="missionCollapseTwo">
                            Wide Range of Products
                        </button>
                    </h2>
                    <div id="missionCollapseTwo" class="accordion-collapse collapse" aria-labelledby="missionHeadingTwo"
                        data-bs-parent="#missionAccordion">
                        <div class="accordion-body">
                            NK caters to a vast array of vehicles, including SUBARU, SUZUKI, DAIHATSU, KIA, NISSAN, HYUNDAI,
                            HONDA, MITSUBISHI, MAZDA, and TOYOTA. Our extensive catalog includes everything from engine
                            components and electrical parts to body panels and interior accessories. No matter what you
                            need, NK has the right part for you.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="missionHeadingThree">
                        <button class="accordion-button collapsed fs-4 fw-bold py-4" type="button"
                            data-bs-toggle="collapse" data-bs-target="#missionCollapseThree" aria-expanded="false"
                            aria-controls="missionCollapseThree">
                            Affordability Without Compromise
                        </button>
                    </h2>
                    <div id="missionCollapseThree" class="accordion-collapse collapse" aria-labelledby="missionHeadingThree"
                        data-bs-parent="#missionAccordion">
                        <div class="accordion-body">
                            One of the biggest advantages of choosing NK is the cost savings. We believe that high-quality
                            auto parts shouldn’t come with a high price tag. By leveraging advanced manufacturing techniques
                            and efficient supply chains, NK provides top-notch parts at competitive prices. This means you
                            get exceptional value without compromising on performance or reliability.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="missionHeadingFour">
                        <button class="accordion-button collapsed fs-4 fw-bold py-4" type="button"
                            data-bs-toggle="collapse" data-bs-target="#missionCollapseFour" aria-expanded="false"
                            aria-controls="missionCollapseFour">
                            Exceptional Customer Support
                        </button>
                    </h2>
                    <div id="missionCollapseFour" class="accordion-collapse collapse" aria-labelledby="missionHeadingFour"
                        data-bs-parent="#missionAccordion">
                        <div class="accordion-body">
                            At NK, we’re not just about selling parts; we’re about building relationships. Our customer
                            support team is always ready to assist you with any questions or concerns. Whether you need help
                            finding the right part or have questions about installation, our experts are just a call or
                            click away.
                        </div>
                    </div>
                </div>
                {{-- <div class="accordion-item">
                    <h2 class="accordion-header" id="missionHeadingFive">
                        <button class="accordion-button collapsed fs-4 fw-bold py-4" type="button"
                            data-bs-toggle="collapse" data-bs-target="#missionCollapseFive" aria-expanded="false"
                            aria-controls="missionCollapseFive">
                            Partnership
                        </button>
                    </h2>
                    <div id="missionCollapseFive" class="accordion-collapse collapse" aria-labelledby="missionHeadingFive"
                        data-bs-parent="#missionAccordion">
                        <div class="accordion-body">
                            We value the relationships we have built with our customers and suppliers over the years.
                            Through collaboration and partnership, we aim to foster long-term relationships built on trust,
                            reliability, and mutual respect.
                        </div>
                    </div>
                </div> --}}
            </div>
        </section>

        <section class="mb-5 card shadow p-4">
            <h2 class="card-header fs-2 fw-bolder">The NK Advantage</h2>
            <p>Our objectives at Gaolian Auto Spare Parts Co L.L.C. are aligned with our mission to provide top-tier auto
                parts and exceptional service to our customers. Key objectives include:</p>
            <div class="accordion" id="objectivesAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button fs-4 fw-bold py-4" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Reliability on Every Road
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#objectivesAccordion">
                        <div class="accordion-body">
                            With NK parts, you can drive with confidence. Our products are engineered to withstand the
                            rigors of daily driving and extreme conditions, ensuring your vehicle stays reliable and safe.
                            Whether you’re tackling city streets or rugged terrains, NK parts provide the durability you
                            need.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed fs-4 fw-bold py-4" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                            aria-controls="collapseTwo">
                            Innovation and Technology
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#objectivesAccordion">
                        <div class="accordion-body">
                            NK is at the forefront of automotive innovation. We continually invest in research and
                            development to bring you the latest advancements in auto parts technology. This commitment to
                            innovation means that when you choose NK, you’re getting cutting-edge solutions designed to
                            enhance your vehicle’s performance and longevity.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed fs-4 fw-bold py-4" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                            aria-controls="collapseThree">
                            Environmental Responsibility
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#objectivesAccordion">
                        <div class="accordion-body">
                            We’re not just committed to our customers; we’re committed to the planet. NK adopts eco-friendly manufacturing practices and sustainable sourcing to reduce our environmental impact. By choosing NK, you’re supporting a brand that prioritizes environmental stewardship.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed fs-4 fw-bold py-4" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                            aria-controls="collapseFour">
                            Join the NK Family
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                        data-bs-parent="#objectivesAccordion">
                        <div class="accordion-body">
                            When you choose NK, you’re joining a community of auto enthusiasts and professionals who demand the best for their vehicles. Experience the NK difference today and see why we’re the preferred choice for aftermarket auto parts. Visit our website or your nearest authorized dealer to explore our full range of products.
                        </div>
                    </div>
                </div>
                {{-- <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed fs-4 fw-bold py-4" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                            aria-controls="collapseFive">
                            Sustainability
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                        data-bs-parent="#objectivesAccordion">
                        <div class="accordion-body">
                            Implement sustainable practices across our operations to minimize our environmental footprint
                            and contribute to a greener, more sustainable future for generations to come.
                        </div>
                    </div>
                </div> --}}
            </div>
            <p class="fs-3 fw-bolder fst-italic text-center my-2">
                Drive with confidence. Drive with NK.
            </p>
        </section>

        <section class="mb-5 card shadow p-4">
            <h2 class="fs-2 fw-bolder card-header">Message from CEO/Founder</h2>
            <blockquote class="blockquote">
                <p class="fs-4 fw-bold">
                    A Commitment to Quality and Excellence
                </p>
                <p>
                    Welcome to Nafees Auto Spare Parts Co LLC. I am Obbaid Khan, and I am honored to serve as the CEO of this esteemed company. Since our inception in 2014, our mission has been clear: to provide our customers with the highest quality auto parts, ensuring their vehicles perform at their best.
                </p>
                <p>
                    At Nafees Auto Spare Parts, we understand the crucial role that reliable auto parts play in the performance and safety of your vehicle. That's why we've dedicated ourselves to offering a comprehensive range of original parts for Nissan and Toyota, alongside our premium aftermarket brand, NK. Our NK products cater to a variety of vehicles, including SUBARU, SUZUKI, DAIHATSU, KIA, NISSAN, HYUNDAI, HONDA, MITSUBISHI, MAZDA, and TOYOTA.
                </p>
                <p>
                    Our journey has been marked by a relentless pursuit of excellence. We prioritize quality in every aspect of our operations, from product selection to customer service. Each part we offer undergoes stringent quality control measures to ensure it meets our exacting standards. This commitment to quality has earned us the trust and loyalty of our customers, making us a leading name in the automotive parts industry.
                </p>
                <p>
                    In addition to quality, we believe in providing value. Our products are competitively priced, ensuring you get the best possible parts without breaking the bank. We also understand the importance of timely delivery and efficient service, which is why we strive to meet and exceed our customers' expectations every day.
                </p>
                <p>
                    Our success is driven by our dedicated team, whose passion and expertise are the backbone of our company. They share my commitment to excellence and are always ready to assist you with their knowledge and professionalism.
                </p>
                <p>
                    As we continue to grow and innovate, we remain steadfast in our mission to be your trusted partner for all your auto parts needs. Thank you for choosing Nafees Auto Spare Parts Co LLC. Together, let's drive towards a future of reliability and excellence.
                </p>
                <p>
                    Warm regards,
                </p>
                <footer class="blockquote-footer">
                    <p class="mb-0">Obaid Khan</p>
                    <p>Ms. Cherry, CEO, Gaolian Auto Spare Parts Co L.L.C.</p>
                </footer>
            </blockquote>
        </section>

    </div>
@endsection
