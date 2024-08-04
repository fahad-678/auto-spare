@extends('layout.master')

@section('content')
<div class="container mt-md-20 about-us fs-5 card shadow">
    <header class="text-center mb-5 pt-7 ">
        <h1 class="fs-2x fw-bolder">About Gaolian Auto Spare Parts Co L.L.C.</h1>
    </header>

    <section class="mb-5">
        <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-5">
                <img src="{{asset('assets/media/stock/600x600/img-17.jpg')}}" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-7">
                <div class="card-body pt-4">
                  <h5 class="card-header text-center fs-2 fw-bolder">Company Description</h5>
                  <p class="card-text">Welcome to Gaolian Auto Spare Parts Co L.L.C., your premier destination for, high-quality auto parts in Deira, Dubai, U.A.E. Established in 2004, Gaolian Auto Spare Parts has been a trusted name in the automotive industry for over two decades. With a steadfast commitment to quality, reliability, and customer satisfaction, we have become the go-to choice for drivers and mechanics alike in Dubai and beyond.</p>
                  <p class="card-text">At Gaolian, we take pride in offering an extensive range of auto parts, including shock absorbers, struts, control arms, CV joints, coil springs, steering racks, drive shafts, ignition coils, cylinder heads, clutch discs, clutch covers, and brake calipers. Our inventory features top brands like HEK, GL, and our flagship brand, BYK, ensuring that our customers have access to the best products on the market.</p>
                  <p class="card-text">We understand the importance of keeping pace with the ever-evolving automotive industry, which is why we continuously update our inventory to include the latest parts and accessories. Whether you're driving a SUBARO, SUZUKI DIHATSU, KIA, NISSAN, HYUNDAI, HONDA, MITSUBISHI, MAZDA, or TOYOTA, Gaolian Auto Spare Parts has you covered.</p>
                  <p class="card-text">Experience the Gaolian difference today and discover why we are the preferred choice for auto parts in Dubai. Let us assist you in finding the perfect solution for all of your automotive needs.</p>
                </div>
              </div>
            </div>
        </div>
    </section>

    <section class="mb-5 card shadow p-4">
        <h2 class="fs-2 fw-bolder card-header">Our Mission</h2>
        <p>
            At Gaolian Auto Spare Parts Co L.L.C., our mission is simple yet profound: to supply top-tier auto parts at competitive prices while prioritizing customer satisfaction. With over two decades of experience in the automotive industry, we remain steadfast in our commitment to excellence, integrity, and reliability. Our missions include:
        </p>
        <div class="accordion" id="missionAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="missionHeadingOne">
                    <button class="accordion-button fs-4 fw-bold py-4" type="button" data-bs-toggle="collapse" data-bs-target="#missionCollapseOne" aria-expanded="true" aria-controls="missionCollapseOne">
                        Quality Assurance
                    </button>
                </h2>
                <div id="missionCollapseOne" class="accordion-collapse collapse show" aria-labelledby="missionHeadingOne" data-bs-parent="#missionAccordion">
                    <div class="accordion-body">
                        We maintain strict quality control measures to ensure that every product that leaves our warehouse meets the highest standards of quality and reliability.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="missionHeadingTwo">
                    <button class="accordion-button collapsed fs-4 fw-bold py-4" type="button" data-bs-toggle="collapse" data-bs-target="#missionCollapseTwo" aria-expanded="false" aria-controls="missionCollapseTwo">
                        Customer Satisfaction
                    </button>
                </h2>
                <div id="missionCollapseTwo" class="accordion-collapse collapse" aria-labelledby="missionHeadingTwo" data-bs-parent="#missionAccordion">
                    <div class="accordion-body">
                        Our customers are at the heart of everything we do. We strive to provide enthusiastic service and personalized assistance to ensure that every customer is completely satisfied with their experience.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="missionHeadingThree">
                    <button class="accordion-button collapsed fs-4 fw-bold py-4" type="button" data-bs-toggle="collapse" data-bs-target="#missionCollapseThree" aria-expanded="false" aria-controls="missionCollapseThree">
                        Continuous Improvement
                    </button>
                </h2>
                <div id="missionCollapseThree" class="accordion-collapse collapse" aria-labelledby="missionHeadingThree" data-bs-parent="#missionAccordion">
                    <div class="accordion-body">
                        As the automotive industry continues to evolve, so do we. We are dedicated to staying ahead of the curve by regularly updating our inventory with the latest parts and accessories.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="missionHeadingFour">
                    <button class="accordion-button collapsed fs-4 fw-bold py-4" type="button" data-bs-toggle="collapse" data-bs-target="#missionCollapseFour" aria-expanded="false" aria-controls="missionCollapseFour">
                        Accessibility
                    </button>
                </h2>
                <div id="missionCollapseFour" class="accordion-collapse collapse" aria-labelledby="missionHeadingFour" data-bs-parent="#missionAccordion">
                    <div class="accordion-body">
                        We believe that everyone deserves access to high-quality auto parts at reasonable prices. That's why we work tirelessly to make our products accessible to drivers and mechanics across Dubai and beyond.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="missionHeadingFive">
                    <button class="accordion-button collapsed fs-4 fw-bold py-4" type="button" data-bs-toggle="collapse" data-bs-target="#missionCollapseFive" aria-expanded="false" aria-controls="missionCollapseFive">
                        Partnership
                    </button>
                </h2>
                <div id="missionCollapseFive" class="accordion-collapse collapse" aria-labelledby="missionHeadingFive" data-bs-parent="#missionAccordion">
                    <div class="accordion-body">
                        We value the relationships we have built with our customers and suppliers over the years. Through collaboration and partnership, we aim to foster long-term relationships built on trust, reliability, and mutual respect.
                    </div>
                </div>
            </div>
        </div>
    </section>    

    <section class="mb-5 card shadow p-4">
        <h2 class="card-header fs-2 fw-bolder">Our Objectives</h2>
        <p>Our objectives at Gaolian Auto Spare Parts Co L.L.C. are aligned with our mission to provide top-tier auto parts and exceptional service to our customers. Key objectives include:</p>
        <div class="accordion" id="objectivesAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button fs-4 fw-bold py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Expand Product Range
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#objectivesAccordion">
                    <div class="accordion-body">
                        Continuously expand our product range to include a wider variety of auto parts and accessories to cater to the diverse needs of our customers.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed fs-4 fw-bold py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Enhance Customer Experience
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#objectivesAccordion">
                    <div class="accordion-body">
                        Implement initiatives to enhance the overall customer experience, including streamlined ordering processes, faster delivery times, and responsive customer support.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed fs-4 fw-bold py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Strengthen Supplier Relationships
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#objectivesAccordion">
                    <div class="accordion-body">
                        Foster strong relationships with our suppliers to ensure access to the latest products and competitive pricing, allowing us to pass on the benefits to our customers.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed fs-4 fw-bold py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Market Expansion
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#objectivesAccordion">
                    <div class="accordion-body">
                        Explore opportunities for market expansion, both domestically and internationally, to reach new customers and establish Gaolian Auto Spare Parts as a global leader in the automotive industry.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed fs-4 fw-bold py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Sustainability
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#objectivesAccordion">
                    <div class="accordion-body">
                        Implement sustainable practices across our operations to minimize our environmental footprint and contribute to a greener, more sustainable future for generations to come.
                    </div>
                </div>
            </div>
        </div>
        <p>
            At Gaolian Auto Spare Parts Co L.L.C., we are committed to achieving these objectives while upholding our core values of quality, integrity, and customer satisfaction. Join us on this journey as we continue to exceed expectations and set new standards of excellence in the automotive industry.
        </p>
    </section>    

    <section class="mb-5 card shadow p-4">
        <h2 class="fs-2 fw-bolder card-header">Message from CEO/Founder</h2>
        <blockquote class="blockquote">
            <p class="fs-4 fw-bold">
                Greetings Esteemed Partners,
            </p>
            <p>
                As CEO/Founder of Gaolian Auto Spare Parts Co L.L.C., I extend a warm welcome to our valued wholesalers and business partners. Since our inception in 2004, we've been dedicated to delivering excellence in the automotive industry. With over two decades of experience, we've established ourselves as a trusted name known for quality, reliability, and unparalleled customer service.
            </p>
            <p>
                At Gaolian Auto Spare Parts, our focus is on supplying genuine, high-quality auto parts to wholesalers like you. Our extensive inventory includes a wide range of products, from shock absorbers to steering racks, featuring reputable brands such as HEK, GL, and our flagship brand, BYK. We understand the importance of providing you with top-tier products to meet the demands of your customers.
            </p>
            <p>
                Customer satisfaction is of utmost importance to us, and we strive to support you with enthusiastic service and personalized assistance. Whether you require assistance with product selection, inventory management, or logistics, our team is here to help every step of the way.
            </p>
            <p>
                As the automotive industry evolves, so do we. We are committed to staying ahead of the curve by continually updating our inventory with the latest parts and accessories. Our mission remains clear: to supply wholesalers with top-quality auto parts at competitive prices, ensuring your success in the market.
            </p>
            <p>
                Experience the Gaolian difference in wholesale partnership today. Let us assist you in providing the perfect solutions for all your automotive needs. Whether your customers are driving SUBARO, SUZUKI DIHATSU, KIA, NISSAN, HYUNDAI, HONDA, MITSUBISHI, MAZDA, or TOYOTA vehicles, Gaolian Auto Spare Parts has you covered.
            </p>
            <p>
                Thank you for choosing Gaolian Auto Spare Parts Co L.L.C. We look forward to strengthening our partnership and achieving mutual success together.
            </p>
            <p>
                Warm regards,
            </p>
            <footer class="blockquote-footer">
                Ms. Cherry, CEO, Gaolian Auto Spare Parts Co L.L.C.
            </footer>
        </blockquote>
    </section>
    
</div>
@endsection