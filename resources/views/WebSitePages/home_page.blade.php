@extends('layout.app_layout')
@section('title', 'Home Page')
@section('content')
@include('includes.slider')
<!-- Section  -->
<section class="h_service">
    <div class="main-container">
        <div class="h_service-title">
            <h4>Get your business online easily & be visible to your buyers</h4>
            <p>We provide solutions that will help you to give a voice to your ideas.</p>
        </div>
        <div class="h_service-container">
            <div class="h_service-inner">
                <div class="h_service-item">
                    <div class="h_serve_icon"><span class="material-symbols-outlined">colors</span></div>
                    <h4>Design & Creatives</h4>
                    <p>Elevate Your Digital Presence with Seamless Design Excellence:</p>
                    <a href="/" class="lmore-btn">See More</a>
                </div>
                <div class="h_service-item">
                    <div class="h_serve_icon"><span class="material-symbols-outlined">my_location</span></div>
                    <h4>Web devlopment</h4>
                    <p>Building Tomorrow's Web Today: Elevate Your Business with Our Web Solutions</p>
                    <a href="/" class="lmore-btn">See More</a>
                </div>
                <div class="h_service-item">
                    <div class="h_serve_icon"><span class="material-symbols-outlined">campaign</span></div>
                    <h4>Digital Marketing</h4>
                    <p>From Clicks to Conversions Transform Your Business with Vyapar Kranti’s Expert Digital Marketing Services</p>
                    <a href="/" class="lmore-btn">See More</a>
                </div>
                <div class="h_service-item">
                    <div class="h_serve_icon"><span class="material-symbols-outlined">checkbook</span></div>
                    <h4>Content writing</h4>
                    <p>Fuel your brand's story with <b>VYAPAR KRANTI’s</b> content writing mastery, driving engagement, and sparking networks that boom your BUSINESS.</p>
                    <a href="/" class="lmore-btn">See More</a>
                </div>
                <div class="h_service-item">
                    <div class="h_serve_icon"><span class="material-symbols-outlined">collections_bookmark</span></div>
                    <h4>Business Intelligence (BI) and Analytics</h4>
                    <p>Unlock actionable visions to take strategic decisions with our Business Intelligence (BI) and Analytics solutions – Turning data into a weapon to compete.</p>
                    <a href="/" class="lmore-btn">See More</a>
                </div>
                <div class="h_service-item">
                    <div class="h_serve_icon"><span class="material-symbols-outlined">monitoring</span></div>
                    <h4>Brand building</h4>
                    <p>Elevate your brand presence and captivate audiences with our cutting-edge media solutions – where creativity meets engagement for unparalleled storytelling.</p>
                    <a href="/" class="lmore-btn">See More</a>
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
                    <h3>About <b>Vyapar Kranti</b></h3>
                    <p>Welcome to VYPAR KRANTI, a leading Digital Marketing & IT company dedicated to helping entrepreneurs to transform their businesses into digital platforms.</p>
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
            <h4><b>Everything</b> You need in one Solution</h4>
            <p>We provide solutions that will help you to give a voice to your ideas</p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="h_technology-box">
                    <div class="h_technology-icons"><span class="material-symbols-outlined">tv_options_input_settings</span></div>
                    <h4>IT Solutions</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt dolorum impedit, beatae libero saepe facilis dolores! Deleniti dicta non repellendus.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="h_technology-box">
                    <div class="h_technology-icons"><span class="material-symbols-outlined">source_environment</span></div>
                    <h4>ERP Solutions</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt dolorum impedit, beatae libero saepe facilis dolores! Deleniti dicta non repellendus.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="h_technology-box">
                    <div class="h_technology-icons"><span class="material-symbols-outlined">tv_options_input_settings</span></div>
                    <h4>E-Commerce Website</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt dolorum impedit, beatae libero saepe facilis dolores! Deleniti dicta non repellendus.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="h_technology-box">
                    <div class="h_technology-icons"><span class="material-symbols-outlined">forum</span></div>
                    <h4>Mobile Application Development</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt dolorum impedit, beatae libero saepe facilis dolores! Deleniti dicta non repellendus.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="h_technology-box">
                    <div class="h_technology-icons"><span class="material-symbols-outlined">public</span></div>
                    <h4>Custom Application Development</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt dolorum impedit, beatae libero saepe facilis dolores! Deleniti dicta non repellendus.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="h_technology-box">
                    <div class="h_technology-icons"><span class="material-symbols-outlined">cloud</span></div>
                    <h4>Cloud Solutions</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt dolorum impedit, beatae libero saepe facilis dolores! Deleniti dicta non repellendus.</p>
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
            <h4><b>Testimonial</b> Words from our trusted clients</h4>
            <p>We provide solutions that will help you to give a voice to your ideas We provide solutions that will help you to give a voice to your ideas. We provide solutions that will help you to give a voice to your ideas.</p>
        </div>
        <div class="h_testimonial-block swiper home_testimonial">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="h_testimonial-items">
                        <div class="h_testimonial-innerblock">
                            <div class="h_testimonial-pic"><img src="assets/img/img-7.png" alt="Vyapar Kranti" class="img-fluid" width="100" height="100" /></div>
                            <div class="h_testimonial-content">
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur vero ullam accusantium magni soluta ipsa velit veritatis et molestias doloremque dicta deleniti, exercitationem impedit eaque enim voluptatem voluptatum quibusdam mollitia.</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="h_testimonial-clint">Manish Prajapati</div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="h_testimonial-items">
                        <div class="h_testimonial-innerblock">
                            <div class="h_testimonial-pic"><img src="assets/img/img-9.png" alt="Vyapar Kranti" class="img-fluid" width="100" height="100" /></div>
                            <div class="h_testimonial-content">
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur vero ullam accusantium magni soluta ipsa velit veritatis et molestias doloremque dicta deleniti, exercitationem impedit eaque enim voluptatem voluptatum quibusdam mollitia.</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="h_testimonial-clint">Pawan arrora</div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="h_testimonial-items">
                        <div class="h_testimonial-innerblock">
                            <div class="h_testimonial-pic"><img src="assets/img/img-8.png" alt="Vyapar Kranti" class="img-fluid" width="100" height="100" /></div>
                            <div class="h_testimonial-content">
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur vero ullam accusantium magni soluta ipsa velit veritatis et molestias doloremque dicta deleniti, exercitationem impedit eaque enim voluptatem voluptatum quibusdam mollitia.</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="h_testimonial-clint">Suraj</div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="h_testimonial-items">
                        <div class="h_testimonial-innerblock">
                            <div class="h_testimonial-pic"><img src="assets/img/img-7.png" alt="Vyapar Kranti" class="img-fluid" width="100" height="100" /></div>
                            <div class="h_testimonial-content">
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur vero ullam accusantium magni soluta ipsa velit veritatis et molestias doloremque dicta deleniti, exercitationem impedit eaque enim voluptatem voluptatum quibusdam mollitia.</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="h_testimonial-clint">Chandan Sharma</div>
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
    <script></script>
@endsection
