@extends('layout.app_layout')
@section('title', 'Career Details')
@section('bodyClass', 'inner_page')
@section('content')
     <!-- Start Banner -->
     <section class="pagee-strip">
        <div class="main-container">
            <h1>Career Details</h1>        
        </div>
    </section>
    <!-- end Banner -->

    <!-- section -->
    <section class="career-bottom-section">
        <div class="main-container top-align">
            <div class="row">
                <div class="col-md-7 col-sm-12">
                    <div class="career-details midd-section">
                        <h3>Business Associate</h3>
                        <p><b>Company Overview: Vyapar KRANTI,</b> A leading Digital Marketing & IT company dedicated to helping entrepreneurs to transform their businesses into digital platforms. With our rich experience of more than 10 years in the industry, we understand the importance of a strong online presence in today's digital age. Our team of experts specialize in Website development, Application development, Software development, Digital Marketing and Many more Verticals of Digital world. We strive to deliver innovative and effective solutions that drive growth and success for our clients.</p>
                        <p><b>Job Description:</b> We are seeking a dynamic and results-oriented Business Associates to join our team. The ideal candidate will be responsible for generating leads, contacting potential customers, and closing sales deals over the phone. If you have excellent communication skills, a persuasive personality, and a drive to succeed, we want to hear from you.</p>
                        <h4>Responsibilities:</h4>
                        <ul>
                            <li><p>Conduct outbound calls to potential customers from provided leads.</p></li>
                            <li><p>Explain our products/services and answer any questions potential customers might have.</p></li>
                            <li><p>Meet or exceed daily/weekly/monthly sales targets.</p></li>
                            <li><p>Build and maintain a pipeline of leads for future business opportunities.</p></li>
                            <li><p>Document and update customer records in the CRM system.</p></li>
                            <li><p>Collaborate with team members to achieve collective sales goals.</p></li>
                            <li><p>Stay informed about our products, services, and industry trends.</p></li>
                            <li><p>Provide exceptional customer service throughout the sales process.</p></li>
                        </ul>
                        <h4>Requirements:</h4>
                        <ul>
                            <li><p>Proven experience in tele sales or a similar role.</p></li>
                            <li><p>Excellent verbal communication and active listening skills.</p></li>
                            <li><p>Strong negotiation and persuasion skills.</p></li>
                            <li><p>Ability to work in a fast-paced environment and adapt to changes.</p></li>
                            <li><p>Goal-oriented with a focus on achieving sales targets.</p></li>
                            <li><p>Familiarity with CRM software and sales processes.</p></li>
                            <li><p>Ability to work independently and as part of a team.</p></li>
                            <li><p>High school diploma; additional education or relevant certifications are a plus.</p></li>
                        </ul>
                        <p><b>Benefits:</b> Monthly Incentives + Annual Bonus + Mobile Allowance.</p>
                        <p><b>How to Apply:</b> To apply you can send your CV at <a href="mailto:care@vyaparkranti.com">care@vyaparkranti.com</a></p>
                    </div>
                    <div class="career_tags">
                        <ul class="list-none m-0">
                            <li><label>Date Posted :</label><span>July 23, 2022</span></li>
                            <li><label>Location :</label><span>AIS Tower, Najafgarh New Delhi - 110043</span></li>
                            <li><label>Career Level :</label><span>Mid Senior</span></li>
                            <li><label>Experience :</label><span>2 years</span></li>
                            <li><label>Qualification :</label><span>12th Pass</span></li>
                            <li><label>Salary :</label><span><i class="fa fa-rupee"></i>15,000 - <i class="fa fa-rupee"></i>17,000</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="file" placeholder="Upload Resume" id="ResumeFile" class="form-control" name="ResumeFile" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select id="Openings" class="form-control" name="Openings" required data-error="Job Openings">
                                        <option value="Job Openings">Job Openings</option>
                                        <option value="Android Application Developer">Android Application Developer</option>
                                        <option value="React Native Developer">React Native Developer</option>
                                        <option value="Senior Web UI/UX Designer">Senior Web UI/UX Designer</option>
                                        <option value="C# and C++ Desktop Application Developer">C# and C++ Desktop Application Developer</option>
                                    </select>
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
                    <div class="job-list-container midd-section">
                        <h3>Related Jobs</h3>
                        <div class="job-list">
                            <h4>Android Application Developer</h4>
                            <p>We are looking for performers with 1-5 years of experience as Android Developer</p>
                            <div class="jd-details"><a class="readmore" href="/">Get Details</a></div>
                        </div>
                        <div class="job-list">
                            <h4>React Native Developer</h4>
                            <p>We are looking for React Native Developer with minimum of 0-2 years of experience.</p>
                            <div class="jd-details"><a class="readmore" href="/">Get Details</a></div>
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
