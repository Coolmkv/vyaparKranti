@extends('layout.app_layout')
@section('title', 'Contact Us')
@section('bodyClass', 'inner_page')
@section('content')
    <!-- Start Banner -->
    <section class="pagee-strip">
        <div class="main-container">
            <h1>Contact Us</h1>        
        </div>
    </section>
    <!-- end Banner -->

    <!-- section -->
    <section class="page-details">
        <div class="main-container">
            <div class="h_service-title">
                <h2>Get to Touch</h2>
                <p>How to provide tools that help anyone give a voice to their ideas</p>
            </div><br>

            <!-- New Block section -->
            <div class="contect-dir">
                <div class="dir-block">
                    <div class="dir-content">
                        <span class="material-symbols-outlined">trending_up</span>
                        <h3 class="dir-title">Sales</h3>
                        <!-- <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque, rem.</p> -->
                    </div>
                    <a class="link-forword" href="tel:+919958224825">Conatct Sales &nbsp;<i class="fa fa-angle-right"></i></a>
                </div>
                <div class="dir-block">
                    <div class="dir-content">
                    <span class="material-symbols-outlined">support_agent</span>
                        <h3 class="dir-title">Help &amp; Support</h3>
                        <!-- <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque, rem.</p> -->
                    </div>
                    <a class="link-forword" href="mailto:care@vyaparkrant.com">Get Support &nbsp;<i class="fa fa-angle-right"></i></a>
                </div>
                <div class="dir-block">
                    <div class="dir-content">
                        <span class="material-symbols-outlined">code</span>
                        <h3 class="dir-title">Technical Support</h3>
                        <!-- <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque, rem.</p> -->
                    </div>
                    <a class="link-forword" href="mailto:care@vyaparkrant.com">Tech Support &nbsp;<i class="fa fa-angle-right"></i></a>
                </div>
            </div>
            <div class="contect-dir">
                <div class="dir-blocks">
                    <div class="address_bar_content">
                        <label>Address</label>
                        <p><strong>INDIA</strong> : 11C/1, Gate No.2, Metro Station, 3rd Floor, opposite Najafgarh, Naya Bazar, New Delhi, Delhi 110043</p>
                        <p><strong>CANADA</strong> : 14102, 72A avenue, Surrey, British Columbia, Canada</p>
                    </div>
                </div>
                <div class="dir-blocks">
                    <div class="address_bar_content">
                        <label>E-mail</label>
                        <a href="mailto:care@vyaparkrant.com">care@vyaparkranti.com</a><br>
                        <a href="mailto:bd@vyaparkrant.com">bd@vyaparkrant.com</a>
                    </div>
                </div>
                <div class="dir-blocks">
                    <div class="address_bar_content">
                        <label>Phone Number:</label>
                        <a href="tel:+919958224825">+91 995 822 4825</a><br>
                    </div>
                </div>
            </div>
            <!-- New Block section End -->           
        </div>
    </section></br>
    <!-- end section --> 

    <!-- section -->
    <section class="page_contact_form">
        <div class="page_contact_block">
            <div class="address_bar">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.5680203459287!2d76.98404747555219!3d28.61273337567553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d0fdda4eabfb1%3A0x1b29e6f8e8722395!2sVyapar%20Kranti!5e0!3m2!1sen!2sin!4v1702525909680!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="page_contact_block">
            <div class="contact-form-section container">
                <form id="contactFormSubmit" action="javascript:">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Your Name" required data-error="Please enter your name">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" placeholder="Your Email" id="emailId" class="form-control"
                                    name="emailId" required data-error="Please enter your email">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="number" placeholder="Your contact number" id="contact_number" class="form-control"
                                    name="contact_number" required data-error="Please enter contact your number">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea onchange="refreshCapthca('captcha_img_id_contact_us','captcha_text_contactUs')" class="form-control" id="message" name="message" placeholder="Your Message" rows="8" data-error="Write your message"
                                    required></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="row">
                                <div class="col-md-12 form-group form-inline">
                                    <div class="col-8 p-0">
                                        <img src="{{ captcha_src() }}" class="img-thumbnail" name="captcha_img" alt="Vyapar Kranti"
                                            id="captcha_img_id_contact_us">
                                    </div>
                                    <div class="col-4">
                                        <button style="padding:.6em" type="button" 
                                            class="btn btn-common" onclick="refreshCapthca('captcha_img_id_contact_us','captcha_text_contactUs')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                                <path
                                                    d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                                                <path fill-rule="evenodd"
                                                    d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-12">
                            <div class="form-group">
                                <input type="text" placeholder="Enter Text in image" class="form-control"
                                    name="captcha" id="captcha_text_contactUs" required />
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="submit-button build-project">
                                <button class="btn btn-common" id="submit" type="submit">SEND MESSAGE</button>
                                <div id="msgSubmit" class="h3 hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </form><br>
            </div>
        </div>
    </section>
    <!-- end section -->

@endsection

@section('pageScript')
    @include('WebSitePages.scripts.contactUsScript')
@endsection
