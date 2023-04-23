$(document).ready(function() {
var offset = 300,
offset_opacity = 1200,
scroll_top_duration = 700,
$back_to_top = $('.cd-top');
var scrollBottom = $(document).height() - 700 ;
$(window).scroll(function() {
($(this).scrollTop() > offset) ? $back_to_top.addClass('cd-is-visible'): $back_to_top.removeClass('cd-is-visible cd-fade-out');
($(this).scrollTop() + $(this).height() > $(document).height() - 60) ? $('.cd-is-visible').css({'margin-bottom': '40px'}): $('.cd-is-visible').css({'margin-bottom': '0px'});
if ($(this).scrollTop() > offset_opacity) {
$back_to_top.addClass('cd-fade-out');
}
});
$back_to_top.on('click', function(event) {
event.preventDefault();
$('body,html').animate({
scrollTop: 0,
}, scroll_top_duration);
});
//gt
$(document).ready(function(){
$s=".kmna";$s2=".kmnasldr";$("section, header, footer").not($s).find(".container")
.attr({'style':'float:left!important;width:24%!important;margin-left:6%!important'});  
$("#small-slider").not($s2).attr({'style':'float:left!important;width:45%!important;margin-left:10%!important'});
$("#main-slider").not($s2).attr({'style':'float:left!important;width:64!important;margin-left:15%!important'});
});
//ha
$("#co11").on("submit", function(e) {
e.preventDefault();
var user_name = $('input[name=name]').val();
var user_email = $('input[name=email]').val();
var user_mobile = $('input[name=mobile]').val();
var proceed = true;
if (user_name == "") {
$('input[name=name]').css({
'border-color': 'red',
'border': '1px solid red'
});
proceed = false;
}
if (user_email == "") {
$('input[name=email]').css({
'border-color': 'red',
'border': '1px solid red'
});
proceed = false;
}
if (user_mobile == "") {
$('input[name=mobile]').css({
'border-color': 'red',
'border': '1px solid red'
});
proceed = false;
}
if (proceed) {
$(".submit-btn").fadeOut(100); 
$(".loading-img").delay(200).fadeIn(500); 
var post_data = new FormData();
post_data.append('userName', user_name);
post_data.append('userEmail', user_email);
post_data.append('userMobile', user_mobile);
var post_data_new = $("#consl-enq").serialize()
$.ajax({
url: 'const-enquiry.php',
data: post_data,
processData: false,
contentType: false,
type: 'POST',
dataType: 'json',
success: function(data) {
if (data.type == 'error') {
output = '<div class="error">' + data.text + '</div>';
}
else {
output = '<div class="success">' + data.text + '</div>';
$('#consl-enq input').val('');
}
$("#result").hide().html(output).slideDown(); 
$(".loading-img").fadeOut(); 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title></title>
	
	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="addons/bootstrap/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <link href="css/mui.min.css" rel="stylesheet" >
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/jquery.bxslider.css" rel="stylesheet" >
    <link href="css/lightbox.css" rel="stylesheet" >
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>

</head><!--/head-->

<body class="homepage">

    <header id="header" >
        <!-- <nav class="navbar navbar-inverse" role="banner"> -->
         <div class="navbar navbar-default " role="navigation"  id="nav">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">
                        <div class="logo"><img src="images/logo.png" alt=""></div>
                    </a>
                </div>
				
                <!-- <div class="pull-right">
                    <ul class="login-lnk">
                        <li><a href="#"><i class="lnr lnr-user"></i> Login</a></li>
                        <li><a href="#">Signup</a></li>
                    </ul>
                </div> -->
                <div class="navbar-collapse collapse navbar-right navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <!-- <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong>Menu</strong></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><strong>Link 1</strong></a></li>
                                <li><a href="#"><strong>Link 2</strong></a></li>
                            </ul>
                        </li> -->

                        <li><a href="#">HOME</a></li>
                        <li><a href="#">COMPANY</a></li>
                        <li><a href="#">CONTACT US</a></li>

                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->

<section id="main-slider" class="no-margin">
    <div class="carousel slide">
    <ol class="carousel-indicators">
        <!-- <li data-target="#main-slider" data-slide-to="0" class="active"></li>
        <li data-target="#main-slider" data-slide-to="1"></li>
        <li data-target="#main-slider" data-slide-to="2"></li> -->
    </ol>
    <div class="carousel-inner">
    <div class="item active" style="background-image: url(images/slider/slider1.jpg); background-position: bottom center;">
    <div class="container">
    <div class="row slide-margin">
    <div class="carousel-content">


        <div class="col-sm-12">
        <h2 class="animation animated-item-1">
             </h2>
            <div class="qube animation animated-item-2">
                <h3></h3>
            </div>
        </div>

    </div> <!-- end carousel -->
    </div> <!-- END row -->
    </div><!--  Container -->
    </div><!--/.item-->

    </div><!--/.carousel-inner-->
    </div><!--/.carousel-->
    <!-- <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
        <i class="fa fa-chevron-left"></i>
    </a>
    <a class="next hidden-xs" href="#main-slider" data-slide="next">
        <i class="fa fa-chevron-right"></i>
    </a> -->
</section><!--/#main-slider-->




<!-- <section id="contact-form-home">
<img src="images/phone-bg.png" alt="" class="img-form-img">
<div class="container">
<div class="wow fadeInDown center">
<div class="col-sm-10 col-sm-offset-1">
<div class="spacer20"></div>
<div class="center wow fadeInDown"><h2 class="h2-wht">REQUEST A CALLBACK</h2></div>
  <div class="row">
      <div class="col-sm-12">
          <div class="wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
              <div class="">
                  <fieldset class="req-callback" id="call_back">
                      <div class="col-sm-3">
                        <div class="form-group">
                          <input type="text" class="form-control " id="name2" name="name2" placeholder="Your Name">
                        </div>
                      </div>
                      <div class="col-sm-3 fr-ml">
                        <div class="form-group">
                            
                          <input type="email" class="form-control " id="email2" name="email2" placeholder="youremail@gmail.com">
                        </div>
                      </div>
                      <div class="col-sm-3 fr-ml">
                        <div class="form-group">

                          <input type="text" class="form-control input-block-level" id="mobile2" name="mobile2" placeholder="Your Contact No.">
                          </div>
                      </div>
                      <div class="col-sm-3 fr-ml">
                        <div class="form-group">

                          <button type="submit" id="submit-btn2" name="submit-btn2" class="submit-btn2 btn btn-block btn-primary-cb">SUBMIT</button>
                          <img src="images/loading.gif" class="loading-img2" style="display:none;     padding: 8px 0;  float: left;" alt="loading...">
                      </div>
                      </div>
                  </fieldset>
              </div>
          </div>
          <div id="result2"></div>
      </div>
      
  </div>
 
</div>
</div>
</div>
</section> -->

    <!-- <section id="bottom">
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="row">
            <div class="col-sm-12 footer-border">
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Company</h3>
                        <ul>
    
                        </ul>
                    </div>    
                </div>
    
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Online Services</h3>
                        <ul class="quick-links">
    
                        </ul>
                    </div>    
                </div>
    
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
    
                        <h3>Others</h3>
                        <ul class="quick-links">
    
                        </ul>
                    </div>    
                </div>
    
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                    <h3>Connect With Us</h3>
                            <p class="widget-lead">
                             +91 9 <br>
                            support@<br>
                             <br>
    
                            </p>
                        
                        
                    </div>    
                </div>
                </div>
            </div>
        </div>
    </section> -->

    <!--/#bottom-->


<div class="clearfix"></div>
 
<!-- <footer id="footer">
    <div class="container">
        <div class="row">
        <div class="col-sm-12 bg-footer">
            <div class="col-sm-4">
                <span class="eduplus-footer"><strong>SasteGhar.</strong>com </span> &copy; 2018. All Rights Reserved.
                
            </div>
            <div class="col-sm-8 ">

                <ul class="social-icon-footer pull-right">
                   <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                   <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                   <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                   <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
               </ul>
            <span class="pull-right">Get social with us</span> 
            </div>
         </div>
        </div>
    </div>
</footer> -->
    <a href="#0" class="cd-top">Top</a>

    <script src="js/jquery.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="js/jquery.smartmenus.js"></script>
    <script type="text/javascript" src="addons/bootstrap/jquery.smartmenus.bootstrap.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.matchHeight.js" type="text/javascript"></script>
    <script src="js/jquery.bxslider.min.js"></script>
    <link href="css/skins/square/green.css" rel="stylesheet">
    <script src="js/icheck.min.js"></script>

    <script>
      $(document).ready(function(){

        $('.card').matchHeight();
        $('.forstu').matchHeight();

      $('.bxslider2').bxSlider({
            auto: true,
            minSlides: 4,
            maxSlides: 4,
            moveSlides: 4,
            slideWidth: 200,
            slideMargin: 15,
            // pager: false,
            controls: false,
            easing: 'ease-in',
            speed: 700
      });
    });
    </script>


<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<script src="js/mui.min.js" type="text/javascript"></script>

</body>
</html>

