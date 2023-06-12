  <!-- Start Footer -->
  <footer class="footer-box">
    <div class="container">
        <div class="row">
            <div class="col-md-12 margin-bottom_30">
                <img src="assets/img/logo_3d.png" alt="#" style="height:100px" />
            </div>
            <div class="col-xl-6 white_fonts">
                <div class="row">
                    {{-- <div class="col-md-12 white_fonts margin-bottom_30">
                        <h3>Contact Us</h3>
                    </div> --}}
                    {{-- <div class="col-md-4 text-center">
                        <div class="full icon">
                            <img src="assets/images/social1.png">
                        </div>
                        <div class="full white_fonts">
                            <p>India : RZ-40, Najafgarh, District Dwarka, New Delhi 110043<br>
                                Canada : 14102, 72A avenue, Surrey, British Columbia, CANADA
                            </p>
                        </div>
                    </div> --}}
                    <div class="col-md-6 text-center">
                        <div class="full icon">
                            <img src="assets/images/social2.png">
                        </div>
                        <div class="full white_fonts">
                            <a class="text-light" href="mailto:care@vyaparkranti.com" >care@vyaparkranti.com</a>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="full icon">
                            <img src="assets/images/social3.png">
                        </div>
                        <div class="full white_fonts">
                            <a  class="text-light" href="tel:+919958224825" >+91 995 822 4825</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="full social_icon margin-top_20">
                            <li><a href="https://www.facebook.com/vyaparkranti" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
                            <li><a href="https://www.instagram.com/vyaparkranti/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/vyapar-kranti/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="https://wa.me/919958224825" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 white_fonts">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer_blog footer_menu">
                            <h3>Menus</h3>
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="{{ route("aboutUs") }}">About Us</a></li>
                                <li><a href="{{ route("ourServices") }}">Services</a></li>
                                <li><a href="{{ route("ourPortfolio") }}">Library</a></li>
                                <li><a href="{{ route("contactUs") }}">Contact us</a></li>
                            </ul>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="full col-12">
                            <h3>Newsletter</h3>
                            <div class="newsletter_form" >
                                <form action="javascript:" id="newsletter_form">
                                    @csrf
                                        <input type="email" placeholder="Your Email" id="subscription_email" name="subscription_email" required />

                                            <div class="row">
                                                <div class="col-md-12 form-group form-inline">
                                                    <div class="col-7 p-0">
                                                    <img src="{{captcha_src()}}" class="img-thumbnail" name="captcha_img" id="captcha_img_id">
                                                </div>
                                                <div class="col-5">
                                                    <button style="padding:.8em" type="button" id="submit_newsletter_form" class="btn btn-primary" onclick="refreshCapthca()">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                                            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                                                            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                                                          </svg>                                                  
                                                    </button>
                                                </div>
                                                </div>
                                            
                                            </div>
                                         
                                    <input type="text" placeholder="Enter Text in image" name="captcha" id="captcha_text" required />
                                    
                                            <button type="submit" id="subscribeSubmit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</footer>
<!-- End Footer -->
<div class="footer_bottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="crp">VyaparKranti.com . All Rights Reserved.</p>
                <ul class="bottom_menu">
                    <li><a href="#">Term of Service</a></li>
                    <li><a href="#">Privacy</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>