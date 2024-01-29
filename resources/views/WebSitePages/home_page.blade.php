@extends('layout.app_layout')
@section('title', 'Web Designing & Development company | Digital Marketing - Vyapar Kranti')
@section('content')
@include('includes.slider')
<!-- Section  -->
<section class="h_service">
    <div class="main-container">
        <div class="h_service-title">
            <h2>Get your business online easily & be visible to your buyers</h2>
            <p>We provide solutions that will help you to give a voice to your ideas.</p>
        </div>
        <div class="h_service-container">
            <div class="h_service-inner">
                <div class="h_service-item">
                    <div class="h_serve_icon"><span class="material-symbols-outlined">colors</span></div>
                    <h4>Designs & Creatives</h4>
                    <p>Elevate Your Digital Presence with Seamless Design Excellence:</p>
                    <a href="{{ route('designCreatives') }}" class="lmore-btn">See More</a>
                </div>
                <div class="h_service-item">
                    <div class="h_serve_icon"><span class="material-symbols-outlined">settings</span></div>
                    <h4>Web development</h4>
                    <p>Building Tomorrow's Web Today: Elevate Your Business with Our Web Solutions</p>
                    <a href="{{ route('webDevelopment') }}" class="lmore-btn">See More</a>
                </div>
                <div class="h_service-item">
                    <div class="h_serve_icon"><span class="material-symbols-outlined">campaign</span></div>
                    <h4>Digital Marketing</h4>
                    <p>From Clicks to Conversions Transform Your Business with Vyapar Kranti’s Expert Digital Marketing Services</p>
                    <a href="{{ route('digitalMarketing') }}" class="lmore-btn">See More</a>
                </div>
                <div class="h_service-item">
                    <div class="h_serve_icon"><span class="material-symbols-outlined">checkbook</span></div>
                    <h4>Content writing</h4>
                    <p>Fuel your brand's story with <b>VYAPAR KRANTI’s</b> content writing mastery, driving engagement, and sparking networks that boom your BUSINESS.</p>
                    <a href="{{ route('contentwriting') }}" class="lmore-btn">See More</a>
                </div>
                <div class="h_service-item">
                    <div class="h_serve_icon"><span class="material-symbols-outlined">monitoring</span></div>
                    <h4>Business Intelligence (BI) and Analytics</h4>
                    <p>Unlock actionable visions to take strategic decisions with our Business Intelligence (BI) and Analytics solutions – Turning data into a weapon to compete.</p>
                    <a href="{{ route('businessAnalytics') }}" class="lmore-btn">See More</a>
                </div>
                <div class="h_service-item">
                    <div class="h_serve_icon"><span class="material-symbols-outlined">collections_bookmark</span></div>
                    <h4>Brand Solutions</h4>
                    <p>Elevate your brand presence and captivate audiences with our cutting-edge media solutions – where creativity meets engagement for unparalleled storytelling.</p>
                    <a href="{{ route('brandBuilding') }}" class="lmore-btn">See More</a>
                </div>
            </div>
            <div class="h_service-more text-center"><a class="prime-btn" href="{{ route('ourServices') }}">View More Services</a></div>
        </div>
    </div>
</section>
<!-- Section End -->

<!-- Section Start -->
<section class="h_aboutus">
    <div class="main-container">
        <div class="row">
            <div class="col-md-6">
                <img src="assets/img/img-3png.png" width="100%" class="img-fluid" alt="Vyapar Kranti" />
            </div>
            <div class="col-md-6">
                <div class="h_about-content">
                    <h3>About <b>VYAPAR KRANTI</b></h3>
                    <p>Welcome to Vyapar KRANTI, a leading Digital Marketing & IT company dedicated to helping entrepreneurs to transform their businesses into digital platforms.</p>
                    <p>With our rich experience of more than 10 years in the Industry, we understand the importance of a strong online presence in today's digital age. Our team of experts specialize in Website development, Application development, Software development, Digital Marketing and Many more Verticals of Digital world. We strive to deliver innovative and effective solutions that drive growth and success for our clients.</p>
                    <p>Let us help you take your business to the next level with our cutting-edge digital solutions.</p>
                    <div class="h_about-more"><a class="prime-btn" href="{{ route('aboutUs') }}">View More About</a></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section End -->

<!-- Section Start  -->
<section class="h_technology">
    <div class="main-container">
        <div class="h_service-title mb-5 pb-3">
            <h2><b>One Platform</b> for All of Your Business Needs.</h2>
            <p>We offer solutions that will enable you to express your ideas.</p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="h_technology-box">
                    <div class="h_technology-icons"><span class="material-symbols-outlined">tv_options_input_settings</span></div>
                    <h4>Web Solutions</h4>
                    <p>Enabling businesses with cutting-edge web solutions that successfully combine innovation, technology, and user experience for success online.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="h_technology-box">
                    <div class="h_technology-icons"><span class="material-symbols-outlined">source_environment</span></div>
                    <h4>E-Commerce Website</h4>
                    <p>With our skillfully designed e-commerce websites, you can take your online business to new heights. We combine strong functionality with elegant design to achieve unmatched online success.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="h_technology-box">
                    <div class="h_technology-icons"><span class="material-symbols-outlined">tv_options_input_settings</span></div>
                    <h4>ERP Solutions </h4>
                    <p>With the help of our custom ERP systems, you can revolutionize the efficiency of your business by optimizing workflow and achieving unmatched productivity for a forward-thinking organization.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="h_technology-box">
                    <div class="h_technology-icons"><span class="material-symbols-outlined">forum</span></div>
                    <h4>Mobile Application Development </h4>
                    <p>Encouraging digital ambitions, we create and develop powerful mobile apps that slickly combine creativity, usefulness, and user-centered experiences.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="h_technology-box">
                    <div class="h_technology-icons"><span class="material-symbols-outlined">public</span></div>
                    <h4>Portal Development</h4>
                    <p>We are experts at creating digital gateways that improve user engagement, connectivity, and cooperation by providing clear portal solutions.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="h_technology-box">
                    <div class="h_technology-icons"><span class="material-symbols-outlined">cloud</span></div>
                    <h4>MLM Development</h4>
                    <p>Utilize our MLM development experience to strengthen your network marketing strategy and provide solid solutions that drive expansion, openness, and success in the digital age.</p>
                </div>
            </div>
        </div>
        <div class="h_service-more text-center"><a class="prime-btn" href="/">View More</a></div>
    </div>
</section>
<!-- Section End  -->

<!-- Section Start -->
<section class="h_testimonial">
    <div class="main-container">
        <div class="h_service-title mb-2 pb-3">
            <h2><b>Testimonial</b> Words from our trusted clients</h2>
            <p>Customer satisfaction is a powerful indicator of success; read our testimonials to see firsthand how our solutions have benefited companies all over the world.</p>
        </div>
        <div class="h_testimonial-block swiper home_testimonial">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="h_testimonial-items">
                        <div class="h_testimonial-innerblock">
                            <div class="h_testimonial-pic"><img src="assets/img/dummy-man.png" alt="Vyapar Kranti" class="img-fluid" width="100" height="100" /></div>
                            <div class="h_testimonial-content">
                                <p>Working with VYAPAR KRANTI is a game-changer for our online presence. They effortlessly turned our vision into a visually stunning and user-friendly website. The team's expertise, attention to detail, and timely delivery exceeded our expectations. Our new site has not only garnered positive feedback but also positively impacted our business. Highly recommend VYAPAR KRANTI for exceptional website development."</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="h_testimonial-clint">Sujeet Mishra</div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="h_testimonial-items">
                        <div class="h_testimonial-innerblock">
                            <div class="h_testimonial-pic"><img src="assets/img/gagan-vyas.png" alt="Vyapar Kranti" class="img-fluid" width="100" height="100" /></div>
                            <div class="h_testimonial-content">
                                <p>Our experience with VYAPAR KRANTI was phenomenal! They transformed our vision into a sleek and functional website. The team's expertise, attention to detail, and commitment to timelines exceeded our expectations. Our new site has boosted our online presence, and we highly recommend VYAPAR KRANTI for top-notch website development.</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="h_testimonial-clint">Gagan Vyas</div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="h_testimonial-items">
                        <div class="h_testimonial-innerblock">
                            <div class="h_testimonial-pic"><img src="assets/img/dummy-man.png" alt="Vyapar Kranti" class="img-fluid" width="100" height="100" /></div>
                            <div class="h_testimonial-content">
                                <p>We collaborated with VYAPAR KRANTI for our website development, and the results speak for themselves. Their team seamlessly translated our vision into a visually stunning and user-friendly site. The level of professionalism, expertise, and on-time delivery exceeded our expectations. We highly recommend VYAPAR KRANTI for anyone seeking top-tier website development.</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="h_testimonial-clint">Kundan Kumar</div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="h_testimonial-items">
                        <div class="h_testimonial-innerblock">
                            <div class="h_testimonial-pic"><img src="assets/img/dummy-woman.png" alt="Vyapar Kranti" class="img-fluid" width="100" height="100" /></div>
                            <div class="h_testimonial-content">
                                <p>Our experience with VYAPAR KRANTI was nothing short of exceptional. Their team seamlessly translated our vision into a sleek and functional website. The attention to detail, efficient project management, and creative input made the entire process effortless. We're thrilled with the final result.</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="h_testimonial-clint">Priti Kohli</div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
<!-- Section End -->
@endsection

@section('pageScript')
<script type="text/javascript"></script>
@endsection
