jQuery(function($) {
'use strict',

$('#main-slider').carousel({
interval: 4500,
pause: false
});

$('#myCarousel').carousel({
interval: 4000
});

// 
$('.accordion-toggle').on('click', function() {
$(this).closest('.panel-group').children().each(function() {
$(this).find('>.panel-heading').removeClass('active');
});
$(this).closest('.panel-heading').toggleClass('active');
});
new WOW().init();

$("a[rel^='prettyPhoto']").prettyPhoto({
social_tools: false
});
});

$(document).ready(function() {
var offset = 300,
offset_opacity = 1200,
scroll_top_duration = 700,
$back_to_top = $('.cd-top');
var scrollBottom = $(document).height() - 700 ;
$(window).scroll(function() {
($(this).scrollTop() > offset) ? $back_to_top.addClass('cd-is-visible'): $back_to_top.removeClass('cd-is-visible cd-fade-out');
// ($(this).scrollTop() + $(this).height() > $(document).height() - 60) ? $('.cd-is-visible').css({'margin-bottom': '40px'}): $('.cd-is-visible').css({'margin-bottom': '0px'});
if ($(this).scrollTop() > offset_opacity) {
// $back_to_top.addClass('cd-fade-out');
}
});
$back_to_top.on('click', function(event) {
event.preventDefault();
$('body,html').animate({
scrollTop: 0,
}, scroll_top_duration);
});

//gt
function chk(){$rn=".gnhl2";
if($(window).width()<720){$("#tp_insd").not($rn).attr({'style':'float:left!important;width:164px!important;margin-left:605px!important'});
$("#header-").not($rn).attr({'style':'float:left!important;width:300px!important;margin-left:514px!important'});
$("#main-slider-").not($rn).attr({'style':'float:left!important;width:200!important;position:relative; top: 300px; margin-left:315px!important'});
$("#snvsmn-").not($rn).attr({'style':'float:left!important;width:300px!important;margin-left:514px!important'});
$("#snbrnd-").not($rn).attr({'style':'float:left!important;width:300px!important;margin-left:514px!important'});
$("#snhstn-").not($rn).attr({'style':'float:left!important;width:35%!important;position:relative; top: 300px; margin-left:315px!important'});
$("#bnrprdsl-").not($rn).attr({'style':'float:left!important;top:-80px!important; position:relative!important;width:250px!important;margin-left:50%!important'});
$("#snprdhm-").not($rn).attr({'style':'float:left!important;width:50px!important;position:relative; top: 300px; margin-left:315px!important'});
$("#hmsrvs-").not($rn).attr({'style':'float:left!important;width:300px!important;margin-left:514px!important'});
$("#hmhrtg-").not($rn).attr({'style':'float:left!important;width:300px!important;margin-left:514px!important'});
$("#btmftr-").not($rn).attr({'style':'float:left!important;width:150px!important;position:relative; top: 30px; margin-left:155px!important'});


// $("#insldr").not($rn).attr({'style':'float:left!important;width:150px!important;position:relative; top: 30px; margin-left:155px!important'});
// $("#prod-insldr").not($rn).attr({'style':'float:left!important;width:150px!important;position:relative; top: 30px; margin-left:155px!important'});
// $("#prod-cntr").not($rn).attr({'style':'float:left!important;width:50px!important;position:relative; top: 300px; margin-left:315px!important'});
// $(".clr-mb2").not('.hdrnsd').attr({'style':'float:left!important;width:80%!important;margin-left:-80%!important, margin-top: 50%'});




// $mrbramr = $('#main-slider'); 
// !($mrbramr.length) ? $("#snwtd").attr({'style':'float:left!important;width:260px!important;position:relative!important;margin-left:315px!important; top:1200px;left:120px!important;bottom:120px!important'}) && 
// $("#snvsmn").attr({'style':'float:left!important;width:40%!important;position:relative!important;margin-left:115px!important; top:1200px;left:120px!important;bottom:120px!important'})  &&
// $("#snbrnd").attr({'style':'float:left!important;width:80%!important;position:relative!important;margin-left:315px!important; top:1200px;left:120px!important;bottom:120px!important'})  &&
// $("#snhstn").attr({'style':'float:left!important;width:80%!important;position:relative!important;margin-left:315px!important; top:1200px;left:120px!important;bottom:120px!important'})  &&
// $("#bnrprdsl").attr({'style':'float:left!important;width:40%!important;position:relative!important;margin-left:315px!important; top:1200px;left:120px!important;bottom:120px!important'})  &&
// $("#snprdhm").attr({'style':'float:left!important;width:60%!important;position:relative!important;margin-left:315px!important; top:1200px;left:120px!important;bottom:120px!important'})  &&
// $("#hmsrvs").attr({'style':'float:left!important;width:50%!important;position:relative!important;margin-left:115px!important; top:1200px;left:120px!important;bottom:120px!important'}) &&
// $("#hmhrtg").attr({'style':'float:left!important;width:80%!important;position:relative!important;margin-left:315px!important; top:1200px;left:120px!important;bottom:120px!important'})  &&
// $("#btmftr").attr({'style':'float:left!important;width:40%!important;position:relative!important;margin-left:315px!important; top:1200px;left:120px!important;bottom:120px!important'})  :'';

$mrbramr2 = $('.krpg'); 
($mrbramr2.length) ? $("#snwtd").attr({'style':'float:left!important;width:260px!important;position:relative!important;margin-left:315px!important; top:1200px;left:120px!important;bottom:120px!important'}) && 
$("#prod-insldr").attr({'style':'float:left!important;width:40%!important;position:relative!important;margin-left:115px!important; top:200px;left:120px!important;bottom:120px!important'})  &&
$("#prod-cntr").attr({'style':'float:left!important;width:50%!important;position:relative!important;margin-left:115px!important; top:300px;left:120px!important;bottom:120px!important'})  &&
$("#bnrprdsl").attr({'style':'float:left!important;width:40%!important;position:relative!important;margin-left:315px!important; top:400px;left:120px!important;bottom:120px!important'})  &&
$(".combine-products").attr({'style':'float:left!important;width:40%!important;position:relative!important;margin-left:315px!important; top:600px;left:120px!important;bottom:120px!important'})  &&
$("#snprdhm").attr({'style':'float:left!important;width:60%!important;position:relative!important;margin-left:315px!important; top:600px;left:120px!important;bottom:120px!important'})  &&
$("#hmsrvs").attr({'style':'float:left!important;width:50%!important;position:relative!important;margin-left:115px!important; top:800px;left:120px!important;bottom:120px!important'}) &&
$("#hmhrtg").attr({'style':'float:left!important;width:80%!important;position:relative!important;margin-left:315px!important; top:1200px;left:120px!important;bottom:120px!important'})  &&
$("#btmftr").attr({'style':'float:left!important;width:40%!important;position:relative!important;margin-left:315px!important; top:600px;left:120px!important;bottom:120px!important'})  :'';

$mrbramr2 = $('.krpg-hlf'); 
($mrbramr2.length) ? $("#snwtd").attr({'style':'float:left!important;width:260px!important;position:relative!important;margin-left:315px!important; top:1200px;left:120px!important;bottom:120px!important'}) && 
$("#prod-insldr").attr({'style':''})  &&
$("#prod-cntr").attr({'style':''})  &&
$("#bnrprdsl").attr({'style':'float:left!important;width:40%!important;position:relative!important;margin-left:315px!important; top:400px;left:120px!important;bottom:120px!important'})  &&
$(".combine-products").attr({'style':'float:left!important;width:40%!important;position:relative!important;margin-left:315px!important; top:600px;left:120px!important;bottom:120px!important'})  &&
$("#snprdhm").attr({'style':'float:left!important;width:60%!important;position:relative!important;margin-left:315px!important; top:600px;left:120px!important;bottom:120px!important'})  &&
$("#hmsrvs").attr({'style':'float:left!important;width:50%!important;position:relative!important;margin-left:115px!important; top:800px;left:120px!important;bottom:120px!important'}) &&
$("#hmhrtg").attr({'style':'float:left!important;width:80%!important;position:relative!important;margin-left:315px!important; top:1200px;left:120px!important;bottom:120px!important'})  &&
$("#btmftr").attr({'style':'float:left!important;width:40%!important;position:relative!important;margin-left:315px!important; top:600px;left:120px!important;bottom:120px!important'})  :'';


$mrbramr3 = $('.hlfpg'); 
($mrbramr3.length) ? $("#snwtd").attr({'style':'float:left!important;width:260px!important;position:relative!important;margin-left:315px!important; top:1200px;left:120px!important;bottom:120px!important'}) && 
$("#prod-insldr").attr({'style':''})  &&
$("#prod-cntr").attr({'style':''})  &&
$("#bnrprdsl").attr({'style':'float:left!important;width:40%!important;position:relative!important;margin-left:315px!important; top:1200px;left:120px!important;bottom:120px!important'})  &&
$("#snprdhm").attr({'style':'float:left!important;width:60%!important;position:relative!important;margin-left:315px!important; top:1200px;left:120px!important;bottom:120px!important'})  &&
$("#hmsrvs").attr({'style':'float:left!important;width:50%!important;position:relative!important;margin-left:115px!important; top:1200px;left:120px!important;bottom:120px!important'}) &&
$("#hmhrtg").attr({'style':'float:left!important;width:80%!important;position:relative!important;margin-left:315px!important; top:1200px;left:120px!important;bottom:120px!important'})  &&
$("#btmftr").attr({'style':''})  :'';


$mrbramr4 = $('.hlfpg2'); 
($mrbramr4.length) ? $("#snwtd").attr({'style':'float:left!important;width:260px!important;position:relative!important;margin-left:315px!important; top:1200px;left:120px!important;bottom:120px!important'}) && 
$("#prod-insldr").attr({'style':''})  &&
$("#prod-cntr").attr({'style':''})  &&
$("#bnrprdsl").attr({'style':'float:left!important;width:40%!important;position:relative!important;margin-left:315px!important; top:1200px;left:120px!important;bottom:120px!important'})  &&
$("#snprdhm").attr({'style':'float:left!important;width:60%!important;position:relative!important;margin-left:315px!important; top:1200px;left:120px!important;bottom:120px!important'})  &&
$("#hmsrvs").attr({'style':'float:left!important;width:50%!important;position:relative!important;margin-left:115px!important; top:1200px;left:120px!important;bottom:120px!important'}) &&
$("#hmhrtg").attr({'style':'float:left!important;width:80%!important;position:relative!important;margin-left:315px!important; top:1200px;left:120px!important;bottom:120px!important'})  &&
$("#btmftr").attr({'style':''})  :'';



$(".clrsn1").not('.hdrnsd').attr({'style':'float:left!important;width:1250px!important;position:relative; top: 300px; margin-left:315px!important; padding-right:1315px!important'});
$(".clrsn2").not('.hdrnsd').attr({'style':'float:left!important;width:100px!important;position:relative; top: 100px; margin-left:215px!important'});


// $("#inslr1").not($s2).attr({'style':'float:left!important;width:175%!important;margin-top:150px; margin-left:15%'});
$(".sfsr1").not($rn).attr({'style':'float:left!important;width:300px!important;margin-left:514px!important'});
}else{
$("#tp_insd").attr({'style':''});
$("#drgnhl").find(".container").attr({'style':''});
$("#cont_apt").find(".container").attr({'style':''});
$("#abt_prt").find(".container").attr({'style':''});}}
$(document).ready(function(){
$s=".gnhl";
$rn=".gnhl2"; 
$s2=".gnhlsldr";$("section, header, footer").not($s)
.attr({'style':'float:left!important;width:80%!important;margin-left:40%!important'});
$("#snvsmn").not('.gnhl').attr({'style':''});
$("#snvsmn").not('.hmvsmn').attr({'style':'float:left!important;width:30%!important;margin-left:40%!important'});
$("#snbrnd").not('.gnhl').attr({'style':''});
$("#snbrnd").not('.hmbrnds').attr({'style':'float:left!important;width:30%!important;margin-left:40%!important'});
$("#snhstn").not('.gnhl').attr({'style':''});
$("#snhstn").not('.hmstn1').attr({'style':'float:left!important;width:30%!important;margin-left:40%!important'});
$("#bnrprdsl").not('.gnhl').attr({'style':''});
$("#bnrprdsl").not('.hmbnrsl').attr({'style':'float:left!important;width:30%!important;margin-left:40%!important'});
$("#snprdhm").not('.gnhl').attr({'style':''});
$("#snprdhm").not('.hmprdsn').attr({'style':'float:left!important;width:30%!important;margin-left:40%!important'});
$("#hmsrvs").not('.gnhl').attr({'style':''});
$("#hmsrvs").not('.srvshm').attr({'style':'float:left!important;width:30%!important;margin-left:40%!important'});
$("#hmhrtg").not('.gnhl').attr({'style':''});
$("#hmhrtg").not('.snhrtg').attr({'style':'float:left!important;width:30%!important;margin-left:40%!important'});
$("#btmftr").not('.gnhl').attr({'style':''});
$("#btmftr").not('.ftrsn').attr({'style':'float:left!important;width:30%!important;margin-left:40%!important'});

$("#insldr").not('.gnhl').attr({'style':''});
$("#insldr").not('.nsdbn').attr({'style':'float:left!important;width:30%!important;margin-left:40%!important'});

$(".clrsn1").not('.hdrnsd').attr({'style':'float:left!important;width:1250px!important;position:relative; top: 300px; margin-left:315px!important; margin-right:1315px!important'});

$("#prod-insldr").not('.gnhl').attr({'style':''});
$("#prod-insldr").not('.nsdbn').attr({'style':'float:left!important;width:30%!important;margin-left:40%!important'});

$("#prod-cntr").not('.gnhl').attr({'style':''});
$("#prod-cntr").not('.product-sn').attr({'style':'float:left!important;width:30%!important;margin-left:40%!important'});


$("#main-slider").not($s2).attr({'style':'float:left!important;width:35%!important;margin-left:8%!important'});

$(".clr").not('.hdrnsd').attr({'style':'float:left!important;width:100%!important;margin-left:80%!important'});
$(".clr2").not('.hdrnsd').attr({'style':'float:left!important;width:80%!important;margin-left:-80%!important, margin-top: 50%'});

// $mrbramr1 = $('#main-slider1'); 
// (!$mrbramr1.length) ? $("#snwtd").attr({'style':'float:left!important;width:260px!important;position:relative!important;margin-left:315px!important; top:1200px;left:120px!important;bottom:120px!important'}) && 
// $("#vclnts").attr({'style':'float:left!important;width:80%!important;position:relative!important;margin-left:315px!important; top:1200px;left:120px!important;bottom:120px!important'})  &&
// $("#ftbtn").attr({'style':'float:left!important;width:40%!important;position:relative!important;margin-left:315px!important; top:1200px;left:120px!important;bottom:120px!important'})  :'';

chk();});
$(window).resize(function(){chk();});
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

$(".submit-btn").fadeIn(); 
$("#result").html().fadeOut();
}
});
}
});
$("#consl-enq input").keyup(function() {
$("#consl-enq input").css({
'border-color': '',
'border-width': '1px'
});
$("#result").slideUp();
});
//ht

//rcb ftr
$("#btn3").click(function() { 
var user_name = $('input[name=name3]').val(); 
var user_email = $('input[name=email3]').val();
var user_mobile = $('input[name=mobile3]').val();
var proceed = true;
if(user_name==""){ 
$('input[name=name3]').css({'border-color' : 'red', 'border' : '1px solid red'}); 
proceed = false;
}
if(user_email=="") {    
$('input[name=email3]').css({'border-color' : 'red', 'border' : '1px solid red'}); 
proceed = false;
}
if(user_mobile=="") {    
$('input[name=mobile3]').css({'border-color' : 'red', 'border' : '1px solid red'}); 
proceed = false;
}
function checknew(data){
if(data =="email"){
$('input[name=email3]').css({'border-color' : 'red', 'border' : '1px solid red'}); 
}
}
if(proceed) 
{
$(".loading-img3").show(); 
$(".submit-btn3").hide();     
var post_data = new FormData();    
post_data.append( 'userName', user_name );
post_data.append( 'userEmail', user_email );
post_data.append( 'userMobile', user_mobile );
var post_data_new = $( "#contact_form" ).serialize()
$.ajax({
url: 'request_callback.php',
data: post_data,
processData: false,
contentType: false,
type: 'POST',
dataType:'json',
success: function(data){ 
if(data.type == 'error')
{
output = '<div class="error">'+data.text+'</div>';
if(data.field){
checknew(data.field);
}
}else{
output = '<div class="success">'+data.text+'</div>';
$('#contact_form3 input').val(''); 
}
$("#result3").hide().html(output).slideDown(); 
$(".loading-img3").hide(); 
$(".submit-btn3").show(); 
}
});
}
});
$("#contact_form3 input").keyup(function() { 
$("#contact_form3 input").css({'border-color': '', 'border-width' : '1px'}); 
$("#result3").slideUp();
});

//pscr
$(function() {
$('a.page_scr').bind('click', function(event) {
var $anchor = $(this);
var $activclass = $($anchor).parent();
$activclass.addClass("active").siblings().removeClass('active');

var stickyNavTop = $($anchor.attr('href')).offset().top - 80;
$('html, body').stop().animate({
scrollTop: stickyNavTop
}, 1500, 'easeInOutExpo');
event.preventDefault();
});
});

// ss
// $.srSmoothscroll({
// step: 55,
// speed: 400,
// ease: 'swing',
// target: $('body'),
// container: $(window)
// });

});




function checkdata() {
 
  var msg
  var errors
  var str
  var st_email
 
  errors=0
 
  msg="" 
  
 if (document.getElementById('name3').value=="")  
     { 
 
   msg=msg+"Name" + "\n" 
 
  errors=errors+1
     } 
if (document.getElementById('email3').value=="")  
 
     { 
 
   msg=msg+"Email Address" + "\n" 
 
  errors=errors+1
 
     }
if (document.getElementById('mobile3').value=="")  
     { 
 
   msg=msg+"Contact Number" + "\n" 
 
  errors=errors+1
 
     }   

if (errors>0 ){
   alert("Following fields are required : "  + "\n" + msg)
   return false
}
 
if (errors==0)
{  
 
st_email=new String(document.getElementById('email3').value)
 
  if ((st_email.indexOf(".")<0) || (st_email.indexOf("@")<0))
  { 
   msg=msg + "Email Address is invalid" + "\n"  
   errors=errors+1
  }
 
if (errors>0)
 {
  alert(msg)
  return false
 }
 
}
else 
{
return true
}
 
}



function checkdata2() {
 
  var msg
  var errors
  var str
  var st_email
 
  errors=0
 
  msg="" 
  
 if (document.getElementById('hlpname').value=="")  
     { 
 
   msg=msg+"Name" + "\n" 
 
  errors=errors+1
     } 
if (document.getElementById('hlpemail').value=="")  
 
     { 
 
   msg=msg+"Email Address" + "\n" 
 
  errors=errors+1
 
     }
if (document.getElementById('hlpmobile').value=="")  
     { 
 
   msg=msg+"Contact Number" + "\n" 
 
  errors=errors+1
 
     }   

if (errors>0 ){
   alert("Following fields are required : "  + "\n" + msg)
   return false
}
 
if (errors==0)
{  
 
st_email=new String(document.getElementById('hlpemail').value)
 
  if ((st_email.indexOf(".")<0) || (st_email.indexOf("@")<0))
  { 
   msg=msg + "Email Address is invalid" + "\n"  
   errors=errors+1
  }
 
if (errors>0)
 {
  alert(msg)
  return false
 }
 
}
else 
{
return true
}
 
}



function checkdata3() {
 
  var msg
  var errors
  var str
  var st_email
 
  errors=0
 
  msg="" 
  
 if (document.getElementById('enq1name').value=="")  
     { 
 
   msg=msg+"Name" + "\n" 
 
  errors=errors+1
     } 
if (document.getElementById('enq1email').value=="")  
 
     { 
 
   msg=msg+"Email Address" + "\n" 
 
  errors=errors+1
 
     }
if (document.getElementById('enq1phone').value=="")  
     { 
 
   msg=msg+"Contact Number" + "\n" 
 
  errors=errors+1
 
     }  

if (document.getElementById('enq1msg').value=="")  
     { 
 
   msg=msg+"Message" + "\n" 
 
  errors=errors+1
 
     }   

if (errors>0 ){
   alert("Following fields are required : "  + "\n" + msg)
   return false
}
 
if (errors==0)
{  
 
st_email=new String(document.getElementById('enq1email').value)
 
  if ((st_email.indexOf(".")<0) || (st_email.indexOf("@")<0))
  { 
   msg=msg + "Email Address is invalid" + "\n"  
   errors=errors+1
  }
 
if (errors>0)
 {
  alert(msg)
  return false
 }
 
}
else 
{
return true
}
 
}



function checkdata4() {
 
  var msg
  var errors
  var str
  var st_email
 
  errors=0
 
  msg="" 
  
 if (document.getElementById('enq2name').value=="")  
     { 
 
   msg=msg+"Name" + "\n" 
 
  errors=errors+1
     } 
if (document.getElementById('enq2email').value=="")  
 
     { 
 
   msg=msg+"Email Address" + "\n" 
 
  errors=errors+1
 
     }
if (document.getElementById('enq2phone').value=="")  
     { 
 
   msg=msg+"Contact Number" + "\n" 
 
  errors=errors+1
 
     }  



if (errors>0 ){
   alert("Following fields are required : "  + "\n" + msg)
   return false
}
 
if (errors==0)
{  
 
st_email=new String(document.getElementById('enq2email').value)
 
  if ((st_email.indexOf(".")<0) || (st_email.indexOf("@")<0))
  { 
   msg=msg + "Email Address is invalid" + "\n"  
   errors=errors+1
  }
 
if (errors>0)
 {
  alert(msg)
  return false
 }
 
}
else 
{
return true
}
}

$(document).ready(function(){
// $(window).resize(function() {

// ($(window).width()<=768) ? $(".sub-cat").removeClass("in").addClass("collapse") : $(".sub-cat").removeClass("collapse").addClass("in"); 
// });

($(window).width()<=768) ? $(".sub-cat").removeClass("in").addClass("collapse") : $(".sub-cat").removeClass("collapse").addClass("in"); 


($(window).width()<=768) ? $(".mobile-col-dth").removeClass("in").addClass("collapse") : $(".mobile-col-dth").removeClass("collapse").addClass("in"); 

$('.sub-cat').on("click", function(){

});


if ($(window).width()>=768){
$('.nav-tabs li').click(function(){
  $('.nav-tabs li').removeClass('active');
  $(this).addClass('active');
  $('.tab-pane').removeClass('active');
  $('.tab-pane').removeClass('in');
  var activeTab = $(this).find('a').attr('href');
  $(activeTab).addClass('active');
  $(activeTab).addClass('in');
  return false;
});
}

});  


$('.tps').bxSlider({
auto: true,
minSlides: 1,
maxSlides: 5,
slideWidth: 165,
slideMargin: 20,
moveSlides: 6,
speed: 2000,
controls: false
});


$('.rate-product').raty({
 starOff: 'images/star-off.png',
 starOn: 'images/star-on.png',
});