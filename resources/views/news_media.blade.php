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
                                    <li><a href="#">News And Media</a></li>
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
        <div class="col-sm-12 combine-products">
            <h3 class="h3nsd"><span>We Are Trusted Seller On India's Biggest Marketplaces </span></h3>
            <hr class="hr-vcntr">
        </div>
        <div class="col-sm-6">
            <img src="{{asset($news_media->image_certificate)}}" alt="" class="imve">
        </div>
        <div class="col-sm-6">
            <img src="{{asset($news_media->market_place_logos)}}" alt="" class="imve">
        </div>
        <div class="clearfix"></div>
        <div class="spacer40"></div>
        <div class="col-sm-6">
            <h3 class="h3nsd">Our Vendor</h3>
            <p class="txa_c"><img src="{{asset($news_media->vendor_logos)}}" alt="" class="imve"></p>
        </div>
        <div class="col-sm-6">
            <h3 class="h3nsd">In News</h3>
            <div class="row">
                <div class="col-sm-12 mtb15">
                    <a href="{{asset($news_media->media_image_normal)}}" rel="prettyPhoto[g]">
                        <img src="{{asset($news_media->media_image_enlarge)}}" alt="" class="imve  img-thumbnail"></a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</section>
@endsection('content')