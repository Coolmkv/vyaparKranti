  <!-- Start Footer -->
  <footer class="footer-box pb-4">
    <div class="main-container">
        <div class="footer-inner">
            <div class="footer_item">
                <h3 class="footer_title">Industries <span hidden class="material-symbols-outlined plus-open">add</span></h3>
                <ul class="footer-list">
                    <li><a href="/">Corporate</a></li>
                    <li><a href="/">EdTech</a></li>
                    <li><a href="/">Events</a></li>
                    <li><a href="/">Healthcare</a></li>
                    <li><a href="/">Manufacturing</a></li>
                    <li><a href="/">Retail / e-commerce</a></li>
                    <li><a href="/">Real Estate</a></li>
                    <li><a href="/">Travel & Hospitality</a></li>
                </ul>
            </div>
            <div class="footer_item">
                <h3 class="footer_title">Services <span hidden class="material-symbols-outlined plus-open">add</span></h3>
                <ul class="footer-list">
                    <li><a href="{{ route('webDevelopment') }}">Website Development</a></li>
                    <li><a href="/">Application Development</a></li>
                    <li><a href="{{ route('digitalMarketing') }}">Digital Marketing</a></li>
                    <li><a href="{{ route('digitalMarketing') }}">Search Engine Optimization (SEO)</a></li>
                    <li><a href="/">QA and Testing</a></li>
                    <li><a href="/">Maintenance & Support</a></li>
                    <li><a href="/">Server/Hosting</a></li>
                    <li><a href="/">Brand Solutions</a></li>
                    <li><a href="{{ route('businessAnalytics') }}">Business intelligence (BI) and analytics</a></li>
                </ul>
            </div>
            <div class="footer_item">
                <h3 class="footer_title">Enterprise Solutions <span hidden class="material-symbols-outlined plus-open">add</span></h3>
                <ul class="footer-list">
                    <li><a href="/">API Integration</a></li>
                    <li><a href="/">Catalogue Website</a></li>
                    <li><a href="/">E-Commerce Website</a></li>
                    <li><a href="/">ERP Solutions</a></li>
                    <li><a href="/">Learning Management System</a></li>
                    <li><a href="/">MLM Development</a></li>
                    <li><a href="/">Mobile Application Development</a></li>
                    <li><a href="/">Portal Development</a></li>
                    <li><a href="/">Server / Hosting</a></li>
                </ul>
            </div>
            <div class="footer_item">
                <h3 class="footer_title">Company <span hidden class="material-symbols-outlined plus-open">add</span></h3>
                <ul class="footer-list">
                    <li><a href="{{ route('aboutUs') }}">About Vyapar Kranti</a></li>
                    <li><a href="/">Values</a></li>
                    <li><a href="{{ route('ourServices') }}">Solutions</a></li>
                    <li><a href="{{ route('packagePage') }}">Packages</a></li>
                    <li><a href="{{ route('contactUs') }}">Contact Us</a></li>
                    <li><a href="{{ route('careerPage') }}">Career</a></li>
                </ul>
                <h3 class="footer_title">Technology Focus</h3>
                <ul>
                    <li><a href="/">Shopify</a></li>
                    <li><a href="/">Laravel</a></li>
                    <li><a href="/">Angular</a></li>
                    <li><a href="/">SFDC</a></li>
                </ul>
            </div>
            <div class="footer_item footer-logo">
                <!-- <a href="/"><img src="assets/img/logo_3d.png" alt="Vyapar Kranti" width="140" height="100" class="img-fluid"  /></a>
                <hr> -->
                <h3 class="footer_title">Newsletter</h3>
                <div class="newsletter_form" >
                    <form action="javascript:" id="newsletter_form">
                        @csrf
                        <input type="email" placeholder="Your Email" id="subscription_email" name="subscription_email" required />
                        <div class="row">
                            <div class="col-md-12 form-group form-inline">
                                <div class="col-7 p-0">
                                    <img src="{{captcha_src()}}" class="img-thumbnail" name="captcha_img" alt="Vyapar Kranti" id="captcha_img_id">
                                </div>
                                <div class="col-5">
                                    <button style="padding:.8em" type="button" role="button" aria-label="Reload" id="submit_newsletter_form" class="btn btn-primary" onclick="refreshCapthca()">
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
        <hr class="bg-white">
        <p class="text-center text-white m-0">11C/1, 3rd  Floor, Opposite Najafgarh Metro Station Gate No 2, Najafgarh, New Delhi 110043.</p>
        <div class="footer-outer" style="visibility: hidden;display: none !important">
            <span>Andhra Pradesh</span><span>Amaravati</span><span>Arunachal Pradesh</span><span>Itanagar</span><span>Assam</span><span>Dispur</span><span>Bihar</span><span>Patna</span><span>Chhattisgarh</span><span>Raipur</span><span>Goa</span><span>Panaji</span><span>Gujarat</span><span>Gandhinagar</span><span>Haryana</span><span>Himachal Pradesh</span><span>Shimla</span><span>Jharkhand</span><span>Ranchi</span><span>Karnataka</span><span>Bengaluru</span><span>Kerala</span><span>Thiruvananthapuram</span><span>Madhya Pradesh</span><span>Bhopal</span><span>Maharashtra</span><span>Mumbai</span><span>Manipur</span><span>Imphal</span><span>Meghalaya</span><span>Shillong</span><span>Mizoram</span><span>Aizawl</span><span>Nagaland</span><span>Kohima</span><span>Odisha</span><span>Bhubaneswar</span><span>Punjab</span><span>Chandigarh</span><span>Rajasthan</span><span>Jaipur</span><span>Udaipur</span><span>Sikkim</span><span>Gangtok</span><span>Tamil Nadu</span><span>Chennai</span><span>Telangana</span><span>Hyderabad</span><span>Tripura</span><span>Agartala</span><span>Uttar Pradesh</span><span>Lucknow</span><span>Ayodhya</span><span>Kanpur</span><span>Uttarakhand</span><span>Dehradun</span><span>West Bengal</span><span>Kolkata</span><span>Andaman and Nicobar Island</span><span>Port Blair</span><span>Dadra Naga Haveli</span><span> Daman Diu</span><span>Daman</span><span>Delhi NCR</span><span>Ladakh</span><span>Lakshadweep</span><span>Kavaratti</span><span>Jammu and Kashmir</span><span>Pondicherry & many more places.</span>
        </div>
    </div>
  </footer>
<!-- End Footer -->
<div class="copyright-section">
    <p>Copyright &copy; <a href="VyaparKranti.com">Vyapar Kranti</a> All Rights Reserved. <img src="assets/img/make-in-india.png" width="34px" style="filter: invert(1);-webkit-transform: scaleX(-1);transform: scaleX(-1);" alt="Vyapar Kranti"></p>
</div>
<ul class="fixed-social">
    <li>
        <span class="soacial_icon"><i class="fa fa-share-alt"></i></span>
        <span class="social_details"><a href="https://www.facebook.com/vyaparkranti/" aria-label="Read more about Vyapar Kranti Facebook" target="_blank"><i class="fa fa-facebook"></i></a><a href="https://www.instagram.com/vyaparkranti/" aria-label="Read more about Vyapar Kranti instagram" target="_blank"><i class="fa fa-instagram"></i></a><a href="https://twitter.com/vyaparkranti"><i class="fa fa-twitter"></i></a><a href="https://www.linkedin.com/in/vyapar-kranti-0a0b64271/" aria-label="Read more about Vyapar Kranti linkedin" target="_blank"><i class="fa fa-linkedin"></i></a><a href="https://www.youtube.com/@VyaparKranti" aria-label="Read more about Vyapar Kranti Youtube" target="_blank"><i class="fa fa-youtube"></i></a></span>
    </li>
    <li>
        <a href="https://wa.me/+919958224825?text=Let%27s+start+build+a+project" aria-label="Read more about Vyapar Kranti whatsapp" target="_blank" class="text-white"><span class="soacial_icon"><i class="fa fa-whatsapp"></i></span><span class="social_details">Send Hi on WhatsApp</span></a>
    </li>
    <li>
        <a href="mailto:info@vyaparkranti.com" class="text-white"><span class="soacial_icon"><i class="fa fa-envelope-o"></i></span><span class="social_details">Info@vyaparkranti.com</span></a>
    </li>
    <li>
        <a href="tel:+919958224825" class="text-white"><span class="soacial_icon"><i class="fa fa-phone"></i></span><span class="social_details">+91 995 822 4825</span></a>
    </li>
</ul>