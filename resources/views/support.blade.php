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
                                    <li><a href="#">Support</a></li>
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
<section id="prod-cntr" class="product-sn ">
    <div class="container-fluid xl:w-auto plr0md fw xs-plr60">
        <div class=""></div>
        <div class="col-sm-6">
            <h4 class="h3-primary">Need Help?</h4>	
            <p class="ldnsd2">Send us your questions or comments to info@jaganhardware.com <br class="hnmb"> or call/ whatsapp our customer care service
            <br><br>
            <a class="btn btn-secondary" href="https://api.whatsapp.com/send?phone=919914130130&amp;text=I%20am%20interested"><i class="fa fa-whatsapp"></i> +91 99141 30130</a>
            <br><br>
            <a href="mailto:info@jaganhardware.com">info@jaganhardware.com</a>
            <br>
            <a href="mailto:enquiry@jaganhardware.com">enquiry@jaganhardware.com</a>
            </p>
            </ul>
        </div>
        <div class="col-sm-6">
            <div class="form-bl">
            <form method="post" action="{{url('want-to-become-dealer')}}" autocomplete="off">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Name *</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="" required>
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
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Phone *</label>
                            <input type="text" name="mobile" value="{{old('mobile')}}" class="form-control" placeholder="" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">City *</label>
                            <input type="text" name="city" value="{{old('city')}}" class="form-control" placeholder="" required>
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
                </div>
            </form>
        </div>
    </div>
</section>
@endsection('content')