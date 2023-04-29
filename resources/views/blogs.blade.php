@extends('layouts.web.app')
@section('content')
<style>
ul.pagination > li.active > a, ul.pagination > li:hover > a {
    background-color: #333 !important;
    border-color: #333 !important;
    color: #fff;
}
ul.pagination > li > a {
    border: 1px solid #f5f5f5;
    margin-right: 5px;
    border-radius: 2px;
    font-size: 14px;
    color: #212121;
    font-family: 'Jost';
    padding: 5px 14px;
}
.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
    z-index: 3;
    color: #fff;
    cursor: default;
    background-color: #000000;
    border-color: #000000;
}
</style>
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
                                    <li><a href="#">Blog</a></li>
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
            @if(!empty($blogs)) @foreach($blogs as $blog)
            <div class="row">
                <div class="col-sm-3">
                    <img src="{{asset($blog->image)}}" alt="{{$blog->title}}" class="imve img-thumbnail">
                </div>
                <div class="col-sm-9">
                    <h4 class="h3-primary2">{{$blog->title}}</h4>
                    <p class="ldnsd2">{{ \Illuminate\Support\Str::limit($blog->text, 400, $end='...') }}</p>
                    <a href="{{url('blogs',$blog->id)}}" class="btn btn-secondary">Read More</a>
                </div>
            </div>
            <hr class="hrblog">
            @endforeach 
            <div class="page-center">
            {!! $blogs->links() !!}
            </div>
            @endif
        </div>
    </div>
</section>
@endsection('content')