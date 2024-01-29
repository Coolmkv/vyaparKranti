@extends('layout.app_layout')
@section('title', 'Career')
@section('bodyClass', 'inner_page')
@section('content')
     <!-- Start Banner -->
     <section class="pagee-strip">
        <div class="main-container">
            <h1>Career</h1>        
        </div>
    </section>
    <!-- end Banner -->

    <!-- section -->
    <section class="page-details">
        <div class="main-container">
            <div class="row">
                <div class="col-md-6">
                    <div class="career-left midd-section">
                        <h3>Why You Should Join The<b> Team</b></h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum, officiis saepe laboriosam quod nostrum repudiandae libero quis ratione. Aliquam, at placeat nesciunt optio incidunt ipsam sunt neque ut eum saepe fugit architecto in voluptates similique excepturi.</p>
                        <div class="simple-button"><a class="prime-btn" href="/">Join Team</a></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="career-right">
                        <ul class="career-right-grid">
                            <li class="career-grid-list">
                                <span class="career-icon"><i class="fa fa-cogs"></i></span>
                                <h5>Friendly Environment</h5>
                            </li>
                            <li class="career-grid-list">
                                <span class="career-icon"><i class="fa fa-cogs"></i></span>
                                <h5>Open Communication</h5>
                            </li>
                            <li class="career-grid-list">
                                <span class="career-icon"><i class="fa fa-cogs"></i></span>
                                <h5>Challange the World</h5>
                            </li>
                            <li class="career-grid-list">
                                <span class="career-icon"><i class="fa fa-cogs"></i></span>
                                <h5>Learning Oppotunity</h5>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section --> 
    <!-- section -->
    <section class="career-bottom-section">
        <div class="main-container">
            <div class="row">
                <div class="col-md-6" hidden>
                <form id="careerFormSubmit" action="javascript:">
                        @csrf
                        <div class="row">
                            <div class="col-md-12"><h3>Current Openings</h3></div>
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
                <div class="col-md-12">
                    <div class="job-list-container">
                        <div class="job-list">
                            <h4>Android Application Developer</h4>
                            <p>We are looking for performers with 1-5 years of experience as Android Developer</p>
                            <div class="jd-details"><a class="readmore" href="{{ route('careerDetailPage') }}">Get Details</a></div>
                        </div>
                        <div class="job-list">
                            <h4>React Native Developer</h4>
                            <p>We are looking for React Native Developer with minimum of 0-2 years of experience.</p>
                            <div class="jd-details"><a class="readmore" href="{{ route('careerDetailPage') }}">Get Details</a></div>
                        </div>
                        <div class="job-list">
                            <h4>Senior Web UI/UX Designer</h4>
                            <p>We are looking for performers with minimum 1-5 years of experience.</p>
                            <div class="jd-details"><a class="readmore" href="{{ route('careerDetailPage') }}">Get Details</a></div>
                        </div>
                        <div class="job-list">
                            <h4>C# and C++ Desktop Application Developer</h4>
                            <p>We are looking for React Native Developer with minimum of 0-2 years of experience.</p>
                            <div class="jd-details"><a class="readmore" href="{{ route('careerDetailPage') }}">Get Details</a></div>
                        </div>
                        <div class="job-list">
                            <h4>IOS Apps Developer</h4>
                            <p>We are looking for IOS Developer with minimum of 0-2 years of experience.</p>
                            <div class="jd-details"><a class="readmore" href="{{ route('careerDetailPage') }}">Get Details</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><br>
    <!-- end section -->
@endsection

@section('pageScript')
<script type="text/javascript"></script>
@endsection
