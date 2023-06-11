@extends('layout.app_layout')
@section('title', 'Contact Us')
@section('bodyClass', 'inner_page')
@section('content')
    <style>
        ::placeholder {
            /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: white !important;
            opacity: 1;
            /* Firefox */
        }

        :-ms-input-placeholder {
            /* Internet Explorer 10-11 */
            color: white !important;
        }

        ::-ms-input-placeholder {
            /* Microsoft Edge */
            color: white !important;
        }

        .form-control {
            color: white !important;

        }
    </style>
    <!-- Start Banner -->
    <div class="section inner_page_header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="full">
                        <h3>Contact</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end Banner -->

    <!-- section -->
    <div class="section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_left">
                            <div class="left">
                                <p class="section_count">01</p>
                            </div>
                            <div class="right">
                                <p class="small_tag">Contact</p>
                                <h2><span class="theme_color">How to provide</span> tools that help anyone give a voice to
                                    their ideas</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row margin-top_30">

                <div class="col-lg-7 col-sm-7 col-xs-12 margin-top_30">
                    <div class="contact-block">
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
                                                <img src="{{ captcha_src() }}" class="img-thumbnail" name="captcha_img"
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
                                <div class="col-md-12 text-center">
                                    <div class="submit-button text-center">
                                        <button class="btn btn-common" id="submit" type="submit">Send Message</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-lg-5 col-sm-5 col-xs-12 margin-top_30">
                <div class="left-contact">
                    <div class="media cont-line">
                        <div class="media-left icon-b">
                            <i class="fa fa-location-arrow" aria-hidden="true"></i>
                        </div>
                        <div class="media-body dit-right">
                            <h4>Address</h4>
                            <p>RZ-40, Najafgarh, District Dwarka, New Delhi 110043</p>
                        </div>
                    </div>
                    <div class="media cont-line">
                        <div class="media-left icon-b">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </div>
                        <div class="media-body dit-right">
                            <h4>Email</h4>
                            <a href="mailto:care@vyaparkrant.com">care@vyaparkranti.com</a><br>
                            <a href="mailto:bd@vyaparkrant.com">bd@vyaparkrant.com</a>
                        </div>
                    </div>
                    <div class="media cont-line">
                        <div class="media-left icon-b">
                            <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                        </div>
                        <div class="media-body dit-right">
                            <h4>Phone Number</h4>
                            <a href="tel:+919958224825">+91 995 822 4825</a><br>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    </div>
    <!-- end section -->



@endsection

@section('pageScript')
    @include('WebSitePages.scripts.contactUsScript')
@endsection
