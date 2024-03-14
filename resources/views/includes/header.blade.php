<!-- offer sticky bar   -->
<div class="header-bar">
    <div class="main-container">
        <div class="header-bar-inner">
            <div class="header-bar-left">
                <p><a href="mailto:info@vyaparkranti.com"><i
                            class="fa fa-envelope-o"></i>&nbsp;<span>info@vyaparkranti.com</span></a>&nbsp;|&nbsp;<a
                        href="tel:+919958224825"><i class="fa fa-phone"></i>&nbsp;<span>+91 995 822 4825</span></a></p>
            </div>
            <div class="header-bar-right">
                <ul class="header-social">
                    <li><a href="https://www.facebook.com/vyaparkranti"
                            aria-label="Read more about Vyapar Kranti Facebook" target="_blank"><i
                                class="fa fa-facebook-f"></i></a></li>
                    <li><a href="https://www.instagram.com/vyaparkranti/"
                            aria-label="Read more about Vyapar Kranti instagram" target="_blank"><i
                                class="fa fa-instagram"></i></a></li>
                    <li><a href="https://www.linkedin.com/company/vyapar-kranti/"
                            aria-label="Read more about Vyapar Kranti linkedin" target="_blank"><i
                                class="fa fa-linkedin"></i></a></li>
                    <li><a href="https://wa.me/+919958224825?text=Let%27s+start+build+a+project"
                            aria-label="Read more about Vyapar Kranti whatsapp" target="_blank"><i
                                class="fa fa-whatsapp"></i></a></li>
                    <li><a href="https://www.youtube.com/@VyaparKranti"
                            aria-label="Read more about Vyapar Kranti Youtube" target="_blank"><i
                                class="fa fa-youtube"></i></a></li>
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
                <a href="{{ url('/') }}"><img src="{{ asset('assets/img/logo_3d.png') }}"
                        srcset="{{ asset('assets/img/logo_3d.png') }}, {{ asset('assets/img/logo_3d.png') }} 767w"
                        alt="Vyapar Kranti" title="Vyapar kranti" /></a>
            </div>
            <div class="navigation">
                <div class="closemenu" hidden>
                    <h2>Vyapar Kranti</h2><span class="material-symbols-outlined">close</span>
                </div>
                <ul class="navigation-list">
                    <li><a class="nav-list active" href="{{ url('/') }}">Home</a></li>
                    <li><a class="nav-list" href="{{ route('aboutUs') }}">About Us</a></li>
                    <li class="mega-menu"><a class="nav-list" href="{{ route('ourServices') }}">Solutions</a>
                        <span hidden class="fa fa-plus open-plus"></span>
                        <div class="submenu-container">
                            <div class="submenu-inner">
                                <div class="sub-navigation-list">
                                    <h3 class="menu-title">Web Development<i hidden class="fa fa-plus open-plus"></i>
                                    </h3>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Web Solutions </a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">E-Commerce Website</a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">ERP Solutions </a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Portal Development</a>
                                    </div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">MLM Development</a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Content Management System
                                        </a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Salesforce</a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">UI/UX</a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">API Solutions </a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Portal Development</a>
                                    </div>
                                </div>
                                <div class="sub-navigation-list">
                                    <h3 class="menu-title">Mobile App<i hidden class="fa fa-plus open-plus"></i></h3>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Mobile Application
                                            Development </a></div>
                                </div>
                                <div class="sub-navigation-list">
                                    <h3 class="menu-title">Digital Marketing<i hidden class="fa fa-plus open-plus"></i>
                                    </h3>
                                    <div class="sub-nav-list"><a href="{{ route('digitalMarketing') }}">Search Engine
                                            Optimization (SEO)</a></div>
                                    <div class="sub-nav-list"><a href="{{ route('digitalMarketing') }}">Pay Per Click
                                            (PPC) Advertising</a></div>
                                    <div class="sub-nav-list"><a href="{{ route('digitalMarketing') }}">Social Media
                                            Marketing (SMM)</a></div>
                                    <div class="sub-nav-list"><a href="{{ route('digitalMarketing') }}">Content
                                            Marketing</a></div>
                                    <div class="sub-nav-list"><a href="{{ route('digitalMarketing') }}">E-Mail
                                            Marketing</a></div>
                                    <div class="sub-nav-list"><a href="{{ route('digitalMarketing') }}">WhatsApp
                                            Marketing</a></div>
                                </div>
                                <div class="sub-navigation-list">
                                    <h3 class="menu-title">Hosting/Server<i hidden class="fa fa-plus open-plus"></i>
                                    </h3>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Cloud Solutions</a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Hosting Solutions</a>
                                    </div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">IT Infra Support </a>
                                    </div>
                                </div>
                                <div class="sub-navigation-list">
                                    <h3 class="menu-title">Business Assistance<i hidden
                                            class="fa fa-plus open-plus"></i></h3>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Digital Transformation
                                            Strategy </a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Business Process
                                            Outsourcing</a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Business Intelligence &
                                            Analytics</a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Brand Building</a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Media Support (I.E.
                                            Print, Radio, Tv)</a></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- <li><a class="nav-list" href="{{ route('ourPortfolio') }}">Library</a>
                        <span hidden class="fa fa-plus open-plus"></span>
                        <div class="submenu-container">
                            <div class="submenu-inner">
                                <div class="sub-navigation-list">
                                    <-- <h3 class="menu-title">Menu One<i hidden class="fa fa-plus open-plus"></i></h3> --
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Web Design</a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Web Development</a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">SEO</a></div>
                                    <div class="sub-nav-list"><a href="{{ url('/') }}">Digital Markating</a></div>
                                </div>
                            </div>
                        </div>
                    </li> -->
                    <li><a class="nav-list" href="{{ route('packagePage') }}">Packages</a></li>
                    <li><a class="nav-list" href="{{ route('contactUs') }}">Contact us</a></li>
                    <li class="build-project"><span class="nav-list simple-btn"><i class="fa fa-foursquare"
                                aria-hidden="true"></i>&nbsp;&nbsp;Get A Quote</span></li>
                </ul>
            </div>
            <div hidden class="build-project"><span class="nav-list simple-btn"><i class="fa fa-foursquare" aria-hidden="true"></i>&nbsp;&nbsp;Get A Quote</span></div>
        </div>
    </div>
</header>
<!-- main header End -->
<!-- Build Projects -->

<div id="form-project-popup">
    <div class="form-project-container">
        <h3 class="f-project-navigation">Get A Quote <span
                class="close-btn material-symbols-outlined closer-btn">close</span></h3>
        <div class="form-project-inner">
            <h4>Please fill the form below:</h4>
            <form method="post" action="javascript:" id="build_project_form" >
                <div class="row">
                    <div class="col-md-6 mt-2">
                        <x-input type="text" name="name" class="form-control" required placeholder="Name"></x-input>
                    </div>
                    
                    <div class="col-md-6 mt-2">
                        <x-input type="text" name="company" class="form-control" required placeholder="Company Name" ></x-input>
                    </div>
                    
                    <div class="col-md-6 mt-2">
                        <x-input  type="text" name="phone_number" required maxlength="10" minlength="10" pattern="^[1-9][0-9]*$" class="form-control" placeholder="Mobile Number" ></x-input>
                    </div>
                    <div class="col-md-6 mt-2">
                        <x-input type="email" name="email" required class="form-control"
                        placeholder="E-mail Address"></x-input>
                    </div>
                    <div class="col-md-12 mt-2">
                        <textarea type="text" name="description" class="form-control" placeholder="Description" rows="10"></textarea>
                    </div>
                    @php
                        $selected_options = [
                            "digital_marketing"=>[
                            "title"=>"Digital Marketing",    
                            "option"=>[
                                "SEO : Search Engine Optimisation",
                                "SMO : Social Media Optimisation",
                                "SEM : Search Engine Marketing"
                            ]
                        ],
                            "Media Services"=>
                            ["title"=>"Media Services",    
                            "option"=>[
                                "Interactive Presentations",
                                "Video Services",
                                "Branding Services"
                            ]],
                            "web"=>["title"=>"Web Development",    
                            "option"=>[
                                "Website Design & Development",
                                "Ecommerce Development",
                                "Mobile APP Development",
                                "Custom Web Applications"
                            ]],
                            "elearning"=>[
                                "title"=>"Elearning",    
                            "option"=>[
                                "LMS Development",
                                "Corporate Development"
                            ]]
                        ];
                    @endphp
                    @foreach ($selected_options as $key=>$cat)
                    <div class="col-md-6 mt-2">
                        <label class="form-label-text-heading">{{ $cat["title"] }}</label>
                        @foreach ($cat["option"] as $key2=>$item)
                        <div class="col-md-12 ">
                            <input type="checkbox" id="{{ $key.$key2 }}" name="selected_options[{{$key}}][]"
                                value="{{$item}}"  />
                                <label class="form-label-text" for="{{ $key.$key2 }}">{{$item}}</label>
                        </div>
                        @endforeach
                    </div>
                        
                    @endforeach
                    <div class="col-md-6 mt-2">
                        <img src="{{ captcha_src() }}" class="img-thumbnail" name="captcha_img_build"
                            alt="Vyapar Kranti" id="captcha_img_id_build_project">
    
                        <button style="padding:.6em" type="button" class="btn btn-common btn-group btn-info"
                            onclick="refreshCapthca('captcha_img_id_build_project','captcha_text_build')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                <path
                                    d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                                <path fill-rule="evenodd"
                                    d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                            </svg>
                        </button>
    
                    </div>
                    <div class="col-md-6 mt-2">
                        <input type="text" placeholder="Enter Text in image" class="form-control" name="captcha"
                            id="captcha_text_build" required />
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-md-12 mt-2">
                        <button type="submit" id="getQuote" name="submit" class="get-a-quote-button form-control get-a-quote">Get A
                            Quote</button>
                    </div>
                </div>
 

            </form>
        </div>
    </div>
    <div class="build_project_closer closer-btn"></div>
</div>
<!-- Build Projects End -->
