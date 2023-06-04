@extends('layout.app_layout')
@section("title","Contact Us")
@section("bodyClass","inner_page")
@section("content")

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
                           <h2><span class="theme_color">How to provide</span> tools that help anyone give a voice to their ideas</h2>
                         </div>	
                       </div>
                   </div>
               </div>
           </div>	
           <div class="row margin-top_30">
               
               <div class="col-lg-7 col-sm-7 col-xs-12 margin-top_30">
                 <div class="contact-block">
                   <form id="contactForm">
                     <div class="row">
                       <div class="col-md-6">
                           <div class="form-group">
                               <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required data-error="Please enter your name">
                               <div class="help-block with-errors"></div>
                           </div>                                 
                       </div>
                       <div class="col-md-6">
                           <div class="form-group">
                               <input type="text" placeholder="Your Email" id="email" class="form-control" name="name" required data-error="Please enter your email">
                               <div class="help-block with-errors"></div>
                           </div> 
                       </div>
                       <div class="col-md-12">
                           <div class="form-group">
                               <input type="text" placeholder="Your number" id="number" class="form-control" name="number" required data-error="Please enter your number">
                               <div class="help-block with-errors"></div>
                           </div> 
                       </div>
                       <div class="col-md-12">
                           <div class="form-group"> 
                               <textarea class="form-control" id="message" placeholder="Your Message" rows="8" data-error="Write your message" required></textarea>
                               <div class="help-block with-errors"></div>
                           </div>
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
                               <a href="tel:+919958224825" >+91 995 822 4825</a><br>
                               
                           </div>
                       </div>
                   </div>
               </div>


           </div>
       </div>
   </div>
   <!-- end section -->
   


@endsection

@section("pageScript")
<script>
</script>
@endsection