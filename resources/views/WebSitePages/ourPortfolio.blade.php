@extends('layout.app_layout')
@section("title","Library")
@section("bodyClass","inner_page")
@section("content")

    <!-- Start Banner -->
    <div class="section inner_page_header">
        <div class="container">
           <div class="row">
             <div class="col-lg-12">
                <div class="full">
                   <h3>Library</h3>
                </div>
             </div>
           </div>
        </div>
     </div>
   <!-- end Banner --> 
   
   <!-- section -->
   <div class="section layout_padding dark_bg">
       <div class="container">
           <div class="row">
               <div class="col-md-12">
                   <div class="full">
                       <div class="heading_main text_align_left white_fonts">
                          <div class="left">
                            <p class="section_count">02</p>
                          </div>
                          <div class="right">
                           <h2>Create <span class="theme_color">PERSONALISED Business</h2>
                           <p class="large">What we done</p>
                         </div>	
                       </div>
                   </div>
               </div>
           </div>
       
           <div class="row margin-top_30 counter_section">
              <div class="col-sm-12 col-md-4">
           <div class="counter margin-top_30">
     
     <h2 class="timer count-title count-number" data-to="23" data-speed="1500"></h2>
      <p class="count-text">NOMINATIONS</p>
   </div>
           </div>
             <div class="col-sm-12 col-md-4">
              <div class="counter margin-top_30">
     
     <h2 class="timer count-title count-number" data-to="7" data-speed="1500"></h2>
     <p class="count-text">AWARDS</p>
   </div>
             </div>
             <div class="col-sm-12 col-md-4">
                 <div class="counter margin-top_30">
    
     <h2 class="timer count-title count-number" data-to="31" data-speed="1500"></h2>
     <p class="count-text">AGENCIES</p>
   </div></div>
           </div>
       
       </div>
   </div>
   <!-- end section -->
   
   <!-- section -->
   <div class="section layout_padding">
       <div class="container">
           <div class="row">
               <div class="col-md-12">
                   <div class="full">
                       <div class="heading_main text_align_left">
                          <div class="left">
                            <p class="section_count">03</p>
                          </div>
                          <div class="right">
                           <p class="small_tag">Portfolio</p>
                           <h2><span class="theme_color">CHOOSE A</span> PROFESSIONAL DESIGN</h2>
                           <p class="large">Websites</p>
                         </div>	
                       </div>
                   </div>
               </div>
           </div>
           <div class="row margin-top_30">
               <div class="col-lg-12 margin-top_30">
                   <div id="demo" class="carousel slide" data-ride="carousel">

                       <!-- The slideshow -->
                       <div class="carousel-inner">
                           <div class="carousel-item active">
                               <div class="row">
                                   <div class="col-lg-3 col-md-6 col-sm-12">
                                       <img class="img-responsive" src="assets/images//img1.png" alt="#" />
                                   </div>
                                   <div class="col-lg-3 col-md-6 col-sm-12">
                                       <img class="img-responsive" src="assets/images//img2.png" alt="#" />
                                   </div>
                                   <div class="col-lg-3 col-md-6 col-sm-12">
                                       <img class="img-responsive" src="assets/images//img3.png" alt="#" />
                                   </div>
                                   <div class="col-lg-3 col-md-6 col-sm-12">
                                       <img class="img-responsive" src="assets/images//img4.png" alt="#" />
                                   </div>
                               </div>
                           </div>
                           <div class="carousel-item">
                               <div class="row">
                                   <div class="col-lg-3 col-md-6 col-sm-12">
                                       <img class="img-responsive" src="assets/images//img1.png" alt="#" />
                                   </div>
                                   <div class="col-lg-3 col-md-6 col-sm-12">
                                       <img class="img-responsive" src="assets/images//img2.png" alt="#" />
                                   </div>
                                   <div class="col-lg-3 col-md-6 col-sm-12">
                                       <img class="img-responsive" src="assets/images//img3.png" alt="#" />
                                   </div>
                                   <div class="col-lg-3 col-md-6 col-sm-12">
                                       <img class="img-responsive" src="assets/images//img4.png" alt="#" />
                                   </div>
                               </div>
                           </div>
                       </div>

                       <!-- Left and right controls -->
                       <a class="carousel-control-prev" href="#demo" data-slide="prev">
                           <span class="carousel-control-prev-icon"></span>
                       </a>
                       <a class="carousel-control-next" href="#demo" data-slide="next">
                           <span class="carousel-control-next-icon"></span>
                       </a>

                   </div>
               </div>

               <div class="col-lg-12">
                   <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their</p>
               </div>

               <div class="col-lg-12">
                   <div class="full center">
                       <a href="about.html" class="hvr-radial-out button-theme">See More ></a>
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