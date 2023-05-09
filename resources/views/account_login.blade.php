@extends('layouts.web.app')
@section('content')
<section id="prod-insldr" class="no-margin nsdbn">
    <div class="carousel slide">
        <div class="carousel-inner">
            <div class="container-fluid xl:w-auto">
                <div class="item active"
                    style="background-image: url({{asset('web/images/banner1.jpg')}}); background-position: top center;">
                    <div class="carousel-content">
                        <div class="container plr0md fw xs-plr60">
                            <div class="col-sm-12">
                                <!-- <h1 class="pgtl">OUR PRODUCTS</h1> -->
                                <ul class="breadcrumb">
                                    <li><a href="{{url('/')}}">Home</a></li>
                                    <li><a href="#">Login</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<section id="prod-cntr" class="product-sn">
    <div class="container-fluid xl:w-auto plr0md fw xs-plr60">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="col-sm-12 login-cntr nsl">
                <div class="hlfpg"></div>

                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#login">LOGIN</a></li>
                    <li><a data-toggle="tab" href="#register">SIGNUP</a></li>
                </ul>

                <div class="tab-content">
                    <div id="login" class="tab-pane fade in active">
                        <p class="ldlogin">By continuing, you agree are setting up a HALTE account and agree to our <a href="#">User Agreement</a> and <a href="#">Privacy Policy</a>.</p>
                        <ul class="sign-in2 ">
                            <li><a href="{{url('redirect/google')}}"><i class="fa fa-google"></i> Continue with Google</a></li>
                            <li><a href="{{url('redirect/facebook')}}"><i class="fa fa-facebook"></i> Continue with Facebook</a></li>
                        </ul>
                        <form method="POST" action="{{route('login')}}" class="login-frm" atocomplete="off">
                        @csrf
                            <div class="form-group">
                                <div class="input-group add_form">
                                    <input type="text" class="form-control" name="email" id="users_id" placeholder="Email / Mobile" atocomplete="off">
                                    <div class="input-group-btn for_otp">
                                        <span class="btn btn-otp send-otp">SEND OTP</span>
                                    </div>
                                </div>
                            </div>
                            <p  class="small" id="alert"></p>
                            <div class="form-group" id="opt_box">
                                
                            </div>
                            <div class="form-group for_password">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" atocomplete="off">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6"><label for="rem"><input type="checkbox" name="rem" id="rem"> Remember me</label></div>
                                    <div class="col-sm-6 txa_r-sm "><a href="#" class="btn-nor">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="form-group login_button">
                                <button type="submit" class="btn btn-primary">LOGIN</button>
                            </div>
                        </form>

                    </div>
                    <div id="register" class="tab-pane fade">

                        <p class="ldlogin"> By continuing, you agree are setting up a HALTE account and agree to our <a  href="#">User Agreement</a> and <a href="#">Privacy Policy</a>.</p>
                        <ul class="sign-in2">
                            <li><a href="{{url('redirect/google')}}"><i class="fa fa-google"></i> Continue with Google</a></li>
                            <li><a href="{{url('redirect/facebook')}}"><i class="fa fa-facebook"></i> Continue with Facebook</a></li>
                        </ul>
                        <form method="POST" action="{{route('register')}}" class="login-frm">
                            @csrf
                            <div class="form-group">
                                <div class="input-group sing_up_add_form">
                                    <input type="text" class="form-control" name="email" value="{{old('email')}}" id="sing_up_user_id" placeholder="Email / Mobile">
                                    <div class="input-group-btn sing_up_otp">
                                        <span class="btn btn-otp send-otp">SEND OTP</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group sing_up_password">
                                <input type="text" class="form-control" name="name" value="{{old('name')}}" id="sing_up_user_id" placeholder="Enter Name">
                            </div>
                            <p  class="small" id="sing_up_alert"></p>
                            <div class="form-group" id="sing_up_opt_box">
                                
                            </div>
                            <div class="form-group sing_up_password">
                                <input type="password" class="form-control" name="password" id="sing_up_password" placeholder="Password" atocomplete="off">
                            </div>
                            <div class="form-group sing_up_password">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" atocomplete="off">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6"><label for="rem"><input type="checkbox" name="rem" id="rem"> Remember me</label></div>
                                    <div class="col-sm-6 txa_r-sm "><a href="#" class="btn-nor">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group sing_up_button">
                                <button type="submit" class="btn btn-primary">SIGNUP</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('script')
<script>
var spinner = $('#loader');
function validateEmail(email) {
  const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

function validateOnlyNumbers(phone) {
  return phone.match(/^\d+$/);
}
$(function(){
    $("#users_id").keyup(function(e){
        var thisval = $(this).val();
        if (validateOnlyNumbers(thisval)){
            $('.for_password').hide();
            $('.for_otp').show();
            $('.login_button').hide();
            $('.add_form').addClass('input-group');
            if(thisval.length == 10){

            }
        }else{
            if (validateEmail(thisval)){
                $('.for_password').show();
                $('.for_otp').hide();
                $('.login_button').show();
                $('.add_form').removeClass('input-group');
            }
        }
    });
});
$(function(){
    $("#sing_up_user_id").keyup(function(e){
        var thisval = $(this).val();
        if (validateOnlyNumbers(thisval)){
            $('.sing_up_password').hide();
            $('.sing_up_otp').show();
            $('.sing_up_button').hide();
            $('.sing_up_add_form').addClass('input-group');
            if(thisval.length == 10){

            }
        }else{
            if (validateEmail(thisval)){
                $('.sing_up_password').show();
                $('.sing_up_otp').hide();
                $('.sing_up_button').show();
                $('.sing_up_add_form').removeClass('input-group');
            }
        }
    });
});
$(".send-otp").click(function (e) {
    e.preventDefault();
    $.ajax({
        url: '{{url('ajax/otp-send-for-login')}}',
        method: "POST",
        data: {
            _token: '{{ csrf_token() }}', 
            users_id: $("#users_id").val(),
        },
        beforeSend: function(xhr){
            spinner.show();
        },
        success: function (response){
            spinner.hide();
            if(response.status==200){
                $('#opt_box').html('<input type="text" class="form-control" name="otp" id="otp_input" onkeyup="OtpMatch()" placeholder="Enter Otp" atocomplete="off">');
                $('#alert').html(response.message);
            }else{
                Swal.fire('Failed',response.message,'error');
            }
        }
    });
});
function OtpMatch(){
    var num = $('#otp_input').val();
    if(validateOnlyNumbers(num)){
        if(num.length==6){
            $.ajax({
                url: '{{url('ajax/otp-match')}}',
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}', 
                    users_id: $("#users_id").val(),
                    otp: num,
                },
                beforeSend: function(xhr){
                    spinner.show();
                },
                success: function (response){
                    spinner.hide();
                    if(response.status==200){
                        Swal.fire('Success',response.message,'error');
                        window.location.href="{{url('cart')}}";
                    }else{
                        Swal.fire('Failed',response.message,'error');
                    }
                }
            });
        }
    }else{
        Swal.fire('Failed','Characters not allowed','error');
    }
}
</script>
@endpush
@endsection('content')