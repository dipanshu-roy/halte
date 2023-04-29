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
                                    <li><a href="#">{{$page_content->page}}</a></li>
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
        <div class="@if(!empty($page_content->image)) col-sm-6 @else col-sm-12 @endif">
            <div class="spacer40"></div>
            <h4 class="h3-primary">{{$page_content->page}}</h4>
            <p class="ldnsd2">
                {{$page_content->text}}
            </p>
        </div>
        @if(!empty($page_content->image))
        <div class="col-sm-6">
            <img src="{{asset($page_content->image)}}" alt="{{$page_content->page}}" class="imve">
        </div>
        @endif
    </div>
</section>
@endsection('content')