@extends('layouts.web.app')
@section('content')
<section id="prod-insldr" class="no-margin nsdbn">
    <div class="carousel slide">
        <div class="carousel-inner">
            <div class="container-fluid xl:w-auto">
                <div class="item active" style="background-image: url({{asset('web/images/banner1.jpg')}}); background-position: top center;">
                    <div class="carousel-content">
                        <div class="container plr0md fw xs-plr60">
                            <div class="col-sm-12">
                                <!-- <h1 class="pgtl">OUR PRODUCTS</h1> -->
                                <ul class="breadcrumb">
                                    <li><a href="{{url('/')}}">Home</a></li>
                                    <li><a href="#">Contact Us</a></li>
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
    <div class="row">
        <div class="col-sm-6">
            <div class="total-wrapper">
                <h4 class="h3-primary">Write Us</h4>
                <div class="form-bl">
                    <form method="post" action="{{url('send-enquiry')}}" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">First name *</label>
                                    <input type="text" name="f_name" value="{{old('f_name')}}" class="form-control" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Last name *</label>
                                    <input type="text" name="l_name" value="{{old('l_name')}}" class="form-control" placeholder="" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Phone *</label>
                                    <input type="text" name="mobile" value="{{old('mobile')}}" class="form-control" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Email *</label>
                                    <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">What's on your mind?</label>
                                    <textarea type="text" name="description" class="form-control" placeholder="" rows="5">{{old('description')}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Submit ></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d27444.472505413716!2d76.79884!3d30.702680000000004!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390feceb9512ac37%3A0x5db2bc42337a6712!2sJagan%20Hardware!5e0!3m2!1sen!2sin!4v1681113345523!5m2!1sen!2sin"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    </div>
</section>
@endsection('content')