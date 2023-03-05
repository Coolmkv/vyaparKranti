  <!-- Start Footer -->
  <footer class="footer-box">
    <div class="container">
        <div class="row">
            <div class="col-md-12 margin-bottom_30">
                <img src="assets/img/logo_img.jpg" alt="#" style="height:70px" />
            </div>
            <div class="col-xl-6 white_fonts">
                <div class="row">
                    <div class="col-md-12 white_fonts margin-bottom_30">
                        <h3>Contact Us</h3>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="full icon">
                            <img src="assets/images/social1.png">
                        </div>
                        <div class="full white_fonts">
                            <p>New Delhi,
                                <br>
                                India
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="full icon">
                            <img src="assets/images/social2.png">
                        </div>
                        <div class="full white_fonts">
                            <a class="text-light" href="mailto:vyaparkranti@gmail.com" >vyaparkranti@gmail.com</a>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="full icon">
                            <img src="assets/images/social3.png">
                        </div>
                        <div class="full white_fonts">
                            <a  class="text-light" href="tel:+919958224825" >+91 99582 24825</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="full social_icon margin-top_20">
                            <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
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
                        <div class="footer_blog full">
                            <h3>Newsletter</h3>
                            <div class="newsletter_form">
                                <form action="#">
                                    <input type="email" placeholder="Your Email" name="#" required />
                                    <button>Submit</button>
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
                <p class="crp">© {{ date("Y")}} VyaparKranti.com . All Rights Reserved.</p>
                <ul class="bottom_menu">
                    <li><a href="#">Term of Service</a></li>
                    <li><a href="#">Privacy</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>