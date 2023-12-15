@extends('layouts.webSite')
@section('title', $home_page_title ?? '')
@section('content')
    @include('include.slider')

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">About Us</h4>
                <h1 class="display-4">{{ $about_us_home_page_title ?? '' }}</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 py-0 py-lg-5">
                    <h1 class="mb-3">Our Story</h1>
                    <h5 class="mb-3">{{ $our_story_home_page_title ?? '' }}</h5>
                    <p>{{ $our_story_home_page ?? '' }}</p>
                    <a href="" class="btn btn-secondary font-weight-bold py-2 px-4 mt-2">Learn More</a>
                </div>
                <div class="col-lg-4 py-5 py-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="website/img/about.png" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-4 py-0 py-lg-5">
                    <h1 class="mb-3">Our Vision</h1>
                    <p>{{ $our_vision_home_page ?? '' }}</p>
                    @if (!empty($our_vision_check_point_1))
                        <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>{{ $our_vision_check_point_1 }}</h5>
                    @endif

                    @if (!empty($our_vision_check_point_2))
                        <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>{{ $our_vision_check_point_2 }}</h5>
                    @endif

                    @if (!empty($our_vision_check_point_3))
                        <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>{{ $our_vision_check_point_3 }}</h5>
                    @endif
                    <a href="" class="btn btn-primary font-weight-bold py-2 px-4 mt-2">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    {{-- <!-- Service Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Our Services</h4>
                <h1 class="display-4">{{$our_services_home_page_title??""}}</h1>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="website/img/service-1.jpg" alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-truck service-icon"></i>Fastest Door Delivery</h4>
                            <p class="m-0">Sit  et diam elitr est dolor sed duo. Guberg sea et et lorem dolor sed est sit
                                invidunt, dolore tempor diam ipsum takima erat tempor</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="website/img/service-2.jpg" alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-coffee service-icon"></i>Fresh Coffee Beans</h4>
                            <p class="m-0">Sit  et diam elitr est dolor sed duo. Guberg sea et et lorem dolor sed est sit
                                invidunt, dolore tempor diam ipsum takima erat tempor</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="website/img/service-3.jpg" alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-award service-icon"></i>Best Quality Coffee</h4>
                            <p class="m-0">Sit  et diam elitr est dolor sed duo. Guberg sea et et lorem dolor sed est sit
                                invidunt, dolore tempor diam ipsum takima erat tempor</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="website/img/service-4.jpg" alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-table service-icon"></i>Online Table Booking</h4>
                            <p class="m-0">Sit  et diam elitr est dolor sed duo. Guberg sea et et lorem dolor sed est sit
                                invidunt, dolore tempor diam ipsum takima erat tempor</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End --> --}}

    {{-- 
    <!-- Offer Start -->
    <div class="offer container-fluid my-5 py-5 text-center position-relative overlay-top overlay-bottom">
        <div class="container py-5">
            <h1 class="display-3 text-primary mt-3">50% OFF</h1>
            <h1 class="text-white mb-3">Sunday Special Offer</h1>
            <h4 class="text-white font-weight-normal mb-4 pb-3">Only for Sunday from 1st Jan to 30th Jan 2045</h4>
            <form class="form-inline justify-content-center mb-4">
                <div class="input-group">
                    <input type="text" class="form-control p-4" placeholder="Your Email" style="height: 60px;">
                    <div class="input-group-append">
                        <button class="btn btn-primary font-weight-bold px-4" type="submit">Sign Up</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Offer End --> --}}


    <!-- Menu Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Menu & Pricing</h4>
                <h1 class="display-4">Competitive Pricing</h1>
            </div>
            <div class="row">
                @if (isset($menuItems))
                    @foreach ($menuItems as $item)
                        <div class="col-lg-6">
                            <div class="row align-items-center mb-5">
                                <div class="col-4 col-sm-3">
                                    <img class="w-100 rounded-circle mb-3 mb-sm-0" src="{{ asset($item->item_image) }}"
                                        alt="{{ $item->item_name }}">
                                    <h5 class="menu-price fa-1x" title="{{ $item->currency . ' ' . $item->price }}">
                                        @if ($item->currency == 'USD')
                                            $ {!! $item->price !!}
                                        @endif
                                        @if ($item->currency == 'INR')
                                            ₹ {!! $item->price !!}
                                        @endif
                                    </h5>
                                </div>
                                <div class="col-8 col-sm-9">
                                    <h4>{{ $item->item_name }}</h4>
                                    <p class="m-0">{{ $item->item_details }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif


            </div>
        </div>
    </div>
    <!-- Menu End -->


    <!-- Reservation Start -->
    <div class="container-fluid my-5">
        <div class="container">
            <div class="reservation position-relative overlay-top overlay-bottom">
                <div class="row align-items-center">
                    <div class="col-lg-6 my-5 my-lg-0">
                        <div class="p-5">
                            <div class="mb-4">
                                <h1 class="display-3 text-primary">{{ $offer_percentage_text ?? '' }}</h1>
                                <h1 class="text-white">{{ $offer_heading_home_page ?? '' }}</h1>
                            </div>
                            <p class="text-white">{{ $offer_text_home_page ?? '' }}</p>
                            <ul class="list-inline text-white m-0">
                                @if (!empty($offer_homepage_point_1))
                                    <li class="py-2"><i
                                            class="fa fa-check text-primary mr-3"></i>{{ $offer_homepage_point_1 }}</li>
                                @endif
                                @if (!empty($offer_homepage_point_2))
                                    <li class="py-2"><i
                                            class="fa fa-check text-primary mr-3"></i>{{ $offer_homepage_point_2 }}</li>
                                @endif
                                @if (!empty($offer_homepage_point_3))
                                    <li class="py-2"><i
                                            class="fa fa-check text-primary mr-3"></i>{{ $offer_homepage_point_3 }}</li>
                                @endif

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-center p-5" style="background: rgba(51, 33, 29, .8);">
                            <h1 class="text-white mb-4 mt-5">Book Your Table</h1>
                            <form class="mb-5" action="javascript:" name="booking_form" id="booking_form" >
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control bg-transparent border-primary p-4"
                                        placeholder="Name" name="customer_name" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control bg-transparent border-primary p-4"
                                        placeholder="Email" name="customer_email" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="numeric" class="form-control bg-transparent border-primary p-4"
                                        placeholder="Phone number" name="customer_mobile" required="required" />
                                </div>
                                <div class="form-group">
                                    <div class="dateTime"id="dateTime" data-target-input="nearest">
                                        <input type="text" name="booking_date_time"
                                            class="form-control bg-transparent border-primary p-4 datetimepicker-input"
                                            placeholder="Booking Date Time" data-target="#dateTime"
                                            data-toggle="datetimepicker" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select class="custom-select bg-transparent border-primary px-4" name="guest_count" required style="height: 49px;">
                                        <option selected>Person</option>
                                        <option value="1">Person 1</option>
                                        <option value="2">Person 2</option>
                                        <option value="3">Person 3</option>
                                        <option value="3">Person 4</option>
                                    </select>
                                </div>

                                <div class="form-group"> 
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <img src="{{captcha_src()}}" class="img-thumbnail h-100" id="captcha_img_id">
                                        </div>
                                        <div class="col-lg-4">                                           
                                            <button type="button" class="btn btn-primary btn-block font-weight-bold py-3" onclick="refreshCapthca()">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                                    <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                                                    <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                                                  </svg>
                                                  Refresh
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">                                    
                                    <input type="text" id="captcha" name="captcha" class="form-control bg-transparent border-primary p-4" placeholder="Captcha Text" required>
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-block font-weight-bold py-3" id="bookNow" type="submit">Book
                                        Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Reservation End -->


    <!-- Testimonial Start -->
    @if(!empty($testimonials))
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Testimonial</h4>
                <h1 class="display-4">Our Clients Say</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                @foreach ($testimonials as $item)
                <div class="testimonial-item">
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid" src="{{ asset($item->client_image) }}" onerror="this.src='images/default_image.jpeg'" alt="">
                        <div class="ml-3">
                            <h4>{{$item->client_name}}</h4>
                            <i>{{$item->client_profession}}</i>
                        </div>
                    </div>
                    <p class="m-0">{{$item->review_text}}</p>
                </div>
                @endforeach
                
                 
            </div>
        </div>
    </div>
    @endif
    <!-- Testimonial End -->
@endsection

@section('script')
    @include("HomePage.bookingScript")
    
@endsection
