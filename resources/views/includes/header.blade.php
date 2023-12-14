<!-- offer sticky bar   -->
<div class="header-bar">
    <div class="main-container">
        <div class="header-bar-inner">
            <div class="header-bar-left">
                <p><a href="mailto:info@vyaparkranti.com"><i class="fa fa-envelope-o"></i>&nbsp;<span>info@vyaparkranti.com</span></a>&nbsp;|&nbsp;<a href="tel:+919958224825"><i class="fa fa-phone"></i>&nbsp;<span>+91 995 822 4825</span></a></p>
            </div>
            <div class="header-bar-right">
                <ul class="header-social">
                    <li><a href="https://www.facebook.com/vyaparkranti" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
                    <li><a href="https://www.instagram.com/vyaparkranti/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="https://www.linkedin.com/company/vyapar-kranti/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="https://wa.me/919958224825" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- offer sticky bar   -->
<!-- main header  -->
<header class="main-header">
    <div class="main-container floating-header">
        <div class="header-container">
            <div class="brand-logo">
                <div class="main-navbar" hidden><span></span></div>
                <a href="{{ url('/') }}"><img src="{{asset('assets/img/logo_3d.png')}}" srcset="{{asset('assets/img/logo_3d.png')}}, {{asset('assets/img/logo_3d.png')}} 767w" alt="Vyapar Kranti" title="Vyapar kranti" /></a>
            </div>
            <div class="navigation">
                <div class="closemenu" hidden><h2>Vypar Kranti</h2><span class="material-symbols-outlined">close</span></div>
                <ul class="navigation-list">
                    <li><a class="nav-list active" href="{{ url('/') }}">Home</a></li>
                    <li><a class="nav-list" href="{{ route('aboutUs') }}">About Us</a></li>
                    <li class="mega-menu"><a class="nav-list" href="{{ route('ourServices') }}">Solutions</a>
                        <span hidden class="fa fa-plus open-plus"></span>
                        <div class="submenu-container">
                            <div class="submenu-inner">
                                <div class="sub-navigation-list">
                                    <h3 class="menu-title">Web Development<i hidden class="fa fa-plus open-plus"></i></h3>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Web Solutions </a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">E-Commerce Website</a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">ERP Solutions </a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Portal Development</a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">MLM Development</a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Content Management System </a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Salesforce</a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">UI/UX</a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">API Solutions </a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Portal Development</a></div>
                                </div>
                                <div class="sub-navigation-list">
                                    <h3 class="menu-title">Mobile App<i hidden class="fa fa-plus open-plus"></i></h3>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Mobile Application Development </a></div>
                                </div>
                                <div class="sub-navigation-list">
                                    <h3 class="menu-title">Digital Marketing<i hidden class="fa fa-plus open-plus"></i></h3>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Search Engine Optimization (SEO)</a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Pay Per Click (PPC) Advertising</a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Social Media Marketing (SMM)</a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Content Marketing</a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">E-Mail Marketing</a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Whatsapp Marketing</a></div>
                                </div>
                                <div class="sub-navigation-list">
                                    <h3 class="menu-title">Hosting/Server<i hidden class="fa fa-plus open-plus"></i></h3>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Cloud Solutions</a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Hosting Solutions</a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">IT Infra Support </a></div>
                                </div>
                                <div class="sub-navigation-list">
                                    <h3 class="menu-title">Business Assistance<i hidden class="fa fa-plus open-plus"></i></h3>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Digital Transformation Strategy </a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Business Process Outsourcing</a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Business Intelligence & Analytics</a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Brand Building</a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Media Support (I.E. Print, Radio, Tv)</a></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li><a class="nav-list" href="{{ route('ourPortfolio') }}">Library</a>
                        <span hidden class="fa fa-plus open-plus"></span>
                        <div class="submenu-container">
                            <div class="submenu-inner">
                                <div class="sub-navigation-list">
                                    <!-- <h3 class="menu-title">Menu One<i hidden class="fa fa-plus open-plus"></i></h3> -->
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Web Design</a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Web Development</a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">SEO</a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Digital Markating</a></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li><a class="nav-list" href="{{ route('contactUs') }}">Contact us</a></li>
                    <li class="build-project"><span class="nav-list simple-btn"><i class="fa fa-foursquare" aria-hidden="true"></i>&nbsp;&nbsp;Build Project</span></li>
                </ul>
            </div>
            <div hidden class="build-project"><span class="nav-list simple-btn"><i class="fa fa-foursquare" aria-hidden="true"></i>&nbsp;&nbsp;Build Project</span></div>
        </div>
    </div>
</header>
<!-- main header End -->
<!-- Build Projects -->

<div class="form-project" hidden>
    <div class="form-project-container">
        <h3 class="f-project-navigation">Build a project <span class="close-btn material-symbols-outlined">disabled_by_default</span></h3>
        <div class="form-project-container">
            <h4>Please fill the form below:</h4>
            <form method="post" action="" class="form-project">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Name"/>
                </div>
                <div class="form-group">
                    <input type="text" name="company-name" class="form-control" placeholder="Company Name"/>
                </div>
                <div class="form-group">
                    <input type="tel" name="mobile" class="form-control" placeholder="Mobile Number"/>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="E-mail Address"/>
                </div>
                <div class="form-group">
                    <textarea type="text" name="description" class="form-control" placeholder="Description" rows="10"></textarea>
                </div>
                
                <div class="form-group">
                    <label class="title">Web</label>
                    <div class="form-checkbox">
                        <input type="checkbox" name="web" />
                        <span>Website Design & Development</span>
                    </div>
                    <div class="form-checkbox">
                        <input type="checkbox" name="web" />
                        <span>Ecommerce Development</span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Build Projects End -->


<script>
// $(document).on("click", "#contact_form_st", function(i) {
// var a = "#" + $(this).closest("form").attr("id")
//     , e = new FormData($(a)[0])
//     , b = 1
//     , c = $("#email_contact").val()
//     , d = $("#phone_contact").val()
//     , f = mobilenumber(d)
//     , g = isEmail(c);
// $(a + " .validation_required").each(function() {
//     this.value ? $(this).removeClass("error") : ($(this).addClass("error"),
//     b = 0)
// });
// var h = [];
// $.each($("input[name='LEADCF5[]']:checked"), function() {
//     h.push($(this).val())
// }),
// "" == h ? (b = 0,
// $(a + "_service_error").css("color", "red").text("Please Select the Services")) : $(a + "_service_error").text(""),
// !g && c ? (b = 0,
// $(a + "_email_error").css("color", "red").text("Please Enter a valid Email address")) : $(a + "_email_error").text(""),
// !f && d ? (b = 0,
// $(a + "_phone_error").css("color", "red").text("Please Enter a valid mobile number")) : $(a + "_phone_error").text(""),
// b && ($(".loader_footer").css("display", "inline-block"),
// $.ajax({
//     url: siteURL + "Assets2014/includes/submit_form_digital.php",
//     type: "POST",
//     dataType: "json",
//     data: e,
//     contentType: !1,
//     cache: !1,
//     processData: !1,
//     success: function(a) {
//         200 == a.status_code ? (window.location.href = siteURL + "thankyou",
//         $(".loader_footer").css("display", "none"),
//         $("#contact_form_st").prop("disabled", !1)) : 402 == a.status_code && ($(".loader_footer").css("display", "none"),
//         $("#contact_form_st").prop("disabled", !1),
//         $("#form_error_contact").css("color", "red").text("Please Enter all the details & fill the captcha"),
//         grecaptcha.reset())
//     }
// }))
// })
</script>