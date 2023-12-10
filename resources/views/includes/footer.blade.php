  <!-- Start Footer -->
  <footer class="footer-box">
    <div class="main-container">
        <div class="footer-inner">
            <div class="footer_item">
                <h3 class="footer_title">Industies <span hidden class="material-symbols-outlined plus-open">add</span></h3>
                <ul class="footer-list">
                    <li><a href="/">Automotive</a></li>
                    <li><a href="/">EduTech</a></li>
                    <li><a href="/">Retail / e-commerce</a></li>
                    <li><a href="/">FinTech</a></li>
                    <li><a href="/">Healthcare</a></li>
                    <li><a href="/">Insurance</a></li>
                    <li><a href="/">Manufacthuring</a></li>
                    <li><a href="/">Travel & Hospitality</a></li>
                </ul>
            </div>
            <div class="footer_item">
                <h3 class="footer_title">Services <span hidden class="material-symbols-outlined plus-open">add</span></h3>
                <ul class="footer-list">
                    <li><a href="/">E-Commerce</a></li>
                    <li><a href="/">Mobile App</a></li>
                    <li><a href="/">Enterprise Application</a></li>
                    <li><a href="/">PHP</a></li>
                    <li><a href="/">Java</a></li>
                    <li><a href="/">QA and Testing</a></li>
                    <li><a href="/">Maintenance & Support</a></li>
                    <li><a href="/">Staff Augmentation</a></li>
                </ul>
            </div>
            <div class="footer_item">
                <h3 class="footer_title">Company <span hidden class="material-symbols-outlined plus-open">add</span></h3>
                <ul class="footer-list">
                    <li><a href="/">About Vyapar Kranti</a></li>
                    <li><a href="/">Clients</a></li>
                    <li><a href="/">Success Stories</a></li>
                    <li><a href="/">Blog</a></li>
                    <li><a href="/">Career</a></li>
                    <li><a href="/">Contact Us</a></li>
                    <li><a href="/">White Label Partnership</a></li>
                </ul>
            </div>
            <div class="footer_item">
                <h3 class="footer_title">Enterprise Solutions <span hidden class="material-symbols-outlined plus-open">add</span></h3>
                <ul class="footer-list">
                    <li><a href="/">Enterprise Applications</a></li>
                    <li><a href="/">Data & Analytics</a></li>
                    <li><a href="/">Digital Marketings</a></li>
                    <li><a href="/">Product Engineering</a></li>
                    <li><a href="/">Cloud Solutions</a></li>
                </ul>
                <h3 class="footer_title">Technology Focus</h3>
                <ul>
                    <li><a href="/">Sap</a></li>
                    <li><a href="/">Salesforce</a></li>
                </ul>
            </div>
            <div class="footer_item footer-logo">
                <a href="/"><img src="assets/img/logo_3d.png" alt="Vyapar Kranti" width="140" height="100" class="img-fluid"  /></a>
                <hr>
                <h3 class="footer_title">Newsletter</h3>
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
        <div class="footer-outer">
            <span>Andhra Pradesh</span><span>Amaravati</span><span>Arunachal Pradesh</span><span>Itanagar</span><span>Assam</span><span>Dispur</span><span>Bihar</span><span>Patna</span><span>Chhattisgarh</span><span>Raipur</span><span>Goa</span><span>Panaji</span><span>Gujarat</span><span>Gandhinagar</span><span>Haryana</span><span>Himachal Pradesh</span><span>Shimla</span><span>Jharkhand</span><span>Ranchi</span><span>Karnataka</span><span>Bengaluru</span><span>Kerala</span><span>Thiruvananthapuram</span><span>Madhya Pradesh</span><span>Bhopal</span><span>Maharashtra</span><span>Mumbai</span><span>Manipur</span><span>Imphal</span><span>Meghalaya</span><span>Shillong</span><span>Mizoram</span><span>Aizawl</span><span>Nagaland</span><span>Kohima</span><span>Odisha</span><span>Bhubaneswar</span><span>Punjab</span><span>Chandigarh</span><span>Rajasthan</span><span>Jaipur</span><span>Sikkim</span><span>Gangtok</span><span>Tamil Nadu</span><span>Chennai</span><span>Telangana</span><span>Hyderabad</span><span>Tripura</span><span>Agartala</span><span>Uttar Pradesh</span><span>Lucknow</span><span>Uttarakhand</span><span>Dehradun</span><span>West Bengal</span><span>Kolkata</span><span>Andaman and Nicobar Island</span><span>Port Blair</span><span>Dadra</span><span>Naga</span><span> Haveli</span><span> Daman</span><span> Diu</span><span>Daman</span><span>Delhi NCR</span><span>Delhi NCR</span><span>Ladakh</span><span>Lakshadweep</span><span>Kavaratti</span><span>Jammu and Kashmir</span><span>Puducherry</span><span>Pondicherry & many more places.</span>
        </div>
    </div>
  </footer>
<!-- End Footer -->
<div class="copyright-section">
    <p>Copyright &copy; <a href="VyaparKranti.com">Vyapar Kranti Pvt. Ltd.</a> All Rights Reserved. <img src="assets/img/make-in-india.png" width="34px" style="filter: invert(1);-webkit-transform: scaleX(-1);transform: scaleX(-1);"></p>
</div>