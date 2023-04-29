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
<section id="prod-cntr" class="product-sn ">
    <div class="container-fluid xl:w-auto plr0md fw xs-plr60">
        <div class="col-sm-12">
            @if(!empty($blogs))
            <div class="row">
                <div class="col-sm-6">
                    <img src="{{asset($blogs->image)}}" alt="{{$blogs->title}}" class="imve img-thumbnail">
                </div>
                <div class="col-sm-6">
                    <h4 class="h3-primary2">{{$blogs->title}}</h4>
                    <p class="ldnsd2">{{$blogs->text}}</p>
                </div>
            </div>
            <hr class="hrblog">
            @endif
        </div>
    </div>
</section>
@endsection('content')