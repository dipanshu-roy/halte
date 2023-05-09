@extends('layouts.web.app')
@section('content')
<section id="main-slider" class="no-margin gnhlsldr gnhl">
    <div class="container-fluid xl:w-auto">
        <div class="carousel slide">
            <ol class="carousel-indicators hn">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active" style="background-image: url(); background-position: center center;">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="carousel-content">
                                <div class="col-sm-12">
                                    <p class="txa_c">
                                        <img src="{{asset('web/images/slider/logo-slider.png')}}" alt="" class="logo-vd">
                                    </p>
                                    <h2 class="animation animated-item-1 sld_tx1"></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sldr-btm">
                        <div class="scroll-dw">
                            <svg class="scrdn-sv" viewBox="0 0 14 22" width="14" height="22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="1" y="1" width="12" height="20" rx="6" stroke="#fff" stroke-width="2">
                                </rect>
                                <circle cx="7" cy="7" r="1" stroke="#fff" stroke-width="2"></circle>
                            </svg> Scroll down to explore
                        </div>
                        <div class="sldrbtm-nf">
                            WELCOME TO HALTE.IN
                        </div>
                    </div>
					@if(!empty($home->banner_video))
                    <video playsinline="" autoplay="" muted="" loop=""
                        class="absolute top-0 left-0 w-full h-full object-cover object-center">
                        <source src="{{asset($home->banner_video)}}" type="video/mp4">
                    </video>
					@endif
                </div>
            </div>
        </div>
        <div class="hn">
            <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
                <i class="fa fa-chevron-left"></i></a>
            <a class="next hidden-xs" href="#main-slider" data-slide="next">
                <i class="fa fa-chevron-right"></i></a>
        </div>
    </div>
</section>
<div class="clearfix"></div>
	<section id="snvsmn" class="hmvsmn">
		<div class="container">
			<div class="clm12">
				<p class="ldhmprd">Best range of quality tools available for forestry, landscaping and gardening professionals. </p>
			</div>
		</div>
		<div class="container-fluid xl:w-auto">
			<div class="sldr1">
				@if(!empty($vision_innovation)) @foreach($vision_innovation as $vision)
				<div class="imcnt">
					<div class="bgovl"><img src="{{asset($vision->main_image)}}" alt=""></div>
					<h1 class="h1slktl">{{$vision->title}}</h1>
					<a href="{{$vision->link}}" class="btn btn-sld btn-pri1-wt">DISCOVER MORE</a>
				</div>
				@endforeach @endif
			</div>
		</div>
	</section>
	<div class="clearfix"></div>
	<section id="snbrnd" class="hmbrnds">
		<div class="container">
			<div class="clm12">
				<h3 class="h3brndtl">OUR BRANDS</h3>
				<p class="ldbrnd">@if(!empty($home->brand_text)) {{$home->brand_text}} @endif</p>
			</div>
		</div>
		<div class="container-fluid xl:w-auto">
			@if(!empty($home_brand)) @foreach($home_brand as $brands)
				@if($brands->sr_no%2!=0)
				<div class="snbrnd-sb">
					<div class="rw">
							<div class="col-sm-12 brndclr1">
							<div class="clm6 pdlr0">
								<div class="imcntr">
									<img src="{{asset($brands->main_image)}}" alt="{{$brands->title}}">
								</div>
							</div>
							<div class="clm6 pdlr0">
								<div class="brndtx">
									<div class="rw">
										<div class="clm12 brnd-logct">
											<img src="{{asset($brands->logo)}}" alt="{{$brands->title}}">
										</div>
										<div class="clm4">
											<img src="{{asset($brands->sub_img_1)}}" alt="" class="brnd-prodhm">
											<img src="{{asset($brands->sub_img_2)}}" alt="" class="brnd-prodhm">
										</div>
										<div class="clm8">
											<h3 class="brand-tg">{{$brands->title}}</h3>
											<p class="brand-ld">{{$brands->text}}</p>
											<a class="btn btn-brndhm" href="{{$brands->link}}">View Products <i class="fa fa-angle-right"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@else
				<div class="snbrnd-sb">
					<div class="rw">
						<div class="col-sm-12 brndclr2">
							<div class="clm6 plrt pdlr0">
								<div class="imcntr">
									<img src="{{asset($brands->main_image)}}" alt="{{$brands->title}}">
								</div>
							</div>
							<div class="clm6 pdlr0">
								<div class="brndtx">
									<div class="rw">
										<div class="clm12 brnd-logct txa_r">
											<img src="{{asset($brands->logo)}}" alt="{{$brands->title}}">
										</div>
										<div class="clm4 plrt">
											<img src="{{asset($brands->sub_img_1)}}" alt="" class="brnd-prodhm">
											<img src="{{asset($brands->sub_img_2)}}" alt="" class="brnd-prodhm">
										</div>
										<div class="clm8">
											<h3 class="brand-tg">{{$brands->title}}</h3>
											<p class="brand-ld">{{$brands->text}}</p>
											<a class="btn btn-brndhm" href="{{$brands->link}}">View Products <i class="fa fa-angle-right"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endif
			@endforeach @endif
		</div>
	</section>
	<div class="clearfix"></div>
	<section id="snhstn" class="hmstn1">
		<div class="container-fluid xl:w-auto">
			<div class="clm6 pdlr0">
				<div class="imstnb smht">
					@if(!empty($home->future_image)) <img src="{{asset($home->future_image)}}" alt="@if(!empty($home->future_title)) {{$home->future_title}} @endif">@endif
				</div>
			</div>
			<div class="clm6 pdlr1">
				<div class="stncntr smht">
					<h2 class="stntl">@if(!empty($home->future_title)) {{$home->future_title}} @endif</h2>
					<p class="ldstnbl">@if(!empty($home->future_text)) {{$home->future_text}} @endif</p>
					@if(!empty($home->future_link))<p class="txa_c"><a href="{{$home->future_link}}" class="btn btn-pri1">DISCOVER MORE</a></p>@endif
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</section>
	<div class="clearfix"></div>
	<section id="bnrprdsl" class="hmbnrsl">
		<div class="container-fluid xl:w-auto">
			<div class="clm12 pdlr0-xl">
				<div class="ofr-sldr">
					<div>
						<a href="product-list.html">
							<img src="{{asset('web/images/banner-product-wide.jpg')}}" class="imve ofr-lg">
							<img src="{{asset('web/images/banner-product-mobile.jpg')}}" class="imve ofr-xs">
						</a>
					</div>
					<div>
						<a href="product-list.html"><img src="{{asset('web/images/banner-product-wide2.jpg')}}" class="imve ofr-lg">
							<img src="{{asset('web/images/banner-product-mobile2.jpg')}}" class="imve ofr-xs">

						</a>
					</div>
					<div>
						<a href="product-list.html"><img src="{{asset('web/images/banner-product-wide.jpg')}}" class="imve ofr-lg">
							<img src="{{asset('web/images/banner-product-mobile.jpg')}}" class="imve ofr-xs">
						</a>
					</div>
					<div>
						<a href="product-list.html"><img src="{{asset('web/images/banner-product-wide2.jpg')}}" class="imve ofr-lg">
							<img src="{{asset('web/images/banner-product-mobile2.jpg')}}" class="imve ofr-xs">
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="snprdhm" class="hmprdsn">
		<div class="container-fluid xl:w-auto">
			<div class="clm12">
				<div class="clm12">
					<h2 class="h2tlprod2">Products We Think <span>You'll Like</span></h2>
					<div class="col-sm-12">
						<div class="prod-cat-slider">
							<ul class="list-sldr">
								@if(!empty($suggestion_product)) @foreach($suggestion_product as $rows)
									<li @if($loop->iteration==1) class="active" @endif><a href="javascript:;" onclick="suggestion_product_stop({{$rows->id}})">{{$rows->title}}</a></li>
								@endforeach @endif
							</ul>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="prodhmsldr" id="product_data">
					@if(!empty($suggestion_product)) @foreach($suggestion_product as $rows)
					@php $data = DB::select("SELECT a.id,a.product_name,b.category_name,c.subcategory_name,c.subcategory_slug,d.barnd_name,a.product_slug,a.main_image,a.sub_images,a.mrps,a.sale_price FROM `products` as a INNER JOIN product_categories as b on a.category_id=b.id INNER JOIN product_sub_categories as c on a.subcategory_id=c.id INNER JOIN brands as d on a.brand_id=d.id where a.id IN ($rows->product_id) ORDER BY a.id"); 
					if(!empty($data)){ foreach($data as $pr){ @endphp
						<div class="prd-cntr">
							<a href="{{url('pr')}}/{{$pr->subcategory_slug}}/{{$pr->product_slug}}">
								<div class="pro-im">
									<img src="{{asset($pr->main_image)}}" class="">
								</div>
								<div class="prod-card-price">
									<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i>{{number_format($pr->sale_price)}}</div>
									<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>{{number_format($pr->mrps)}}</span> Save 28%</div>
								</div>
								<div class="prod-card-rating">
									<div class="Stars" style="--rating: 4.2;" aria-label=""></div>
									<span class="nb-rw">856</span>
								</div>
								<h3 class="prod-nm"><span class="brand">{{$pr->barnd_name}}</span> {{$pr->product_name}}</h3>
							</a>
							<a href="{{url('add-to-cart')}}/{{$pr->id}}" class="btn btn-atcr">ADD TO CART</a>
						</div>
					@php }  } @endphp
					@endforeach @endif
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="clearfix"></div>
	<section id="hmsrvs" class="srvshm">
		<div class="container-fluid xl:w-auto plr-xs15">
			<div class="col-sm-12 rwsrvs pdlr">
				<div class="clm2"></div>
				@if(!empty($service_spare)) @foreach($service_spare as $service)
				<div class="clm4">
					<div class="demo-bx-img">
						<img src="{{asset($service->main_image)}}" alt="">
						<h3 class="h3srvs">{{$service->title}}</h3>
					</div>
					<div class="demo-bx">
						<p class="demo-ld">{{$service->description}}</p>
						<a href="{{$service->link}}" class="btn btn-pri1">DISCOVER MORE</a>
					</div>
				</div>
				@endforeach @endif
			</div>
		</div>
	</section>
    <div class="container-fluid xl:w-auto">
		<section id="hmhrtg" class="snhrtg" style="background: url(@if(!empty($home->heritage_image)){{$home->heritage_image}}@endif) no-repeat;">
			<div class="clm1"></div>
			<div class="clm10 txa_c">
				<h2 class="h2hrtg">@if(!empty($home->heritage_tile)) {{$home->heritage_tile}} @endif</h2>
				<p class="ldhrtg">@if(!empty($home->heritage_text)) {{$home->heritage_text}} @endif</p>
				@if(!empty($home->heritage_link))<a href="{{$home->heritage_link}}" class="btn btn-pri1-wt">DISCOVER MORE</a>@endif
			</div>
		</section>
	</div>
@push('script')
<script>
function suggestion_product(id){
	var spinner = $('#loader');
    $('#product_data').empty('');
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{url('ajax/get-product-suggestion')}}",
        type: 'POST',
        data:{
            product_id:id,
        },
        cache: true,
		beforeSend: function(xhr){
			spinner.show();
		},
        success: function(xhr) {
			if(xhr.status==200){
				var datas = xhr.data;
				if(datas.length>0){
					PageData(datas);
				}else{
					DataNotFound();
				}
			}else{
				DataNotFound();
			}
			spinner.hide();
        },error: function (xhr) {
			Swal.fire('Failed',xhr);
			spinner.hide();
		}
    });
}
function DataNotFound(){
    $('#product_data').html('<div class="rowstyle shadow mb-5"><div class="row text-center"><h3>&#128557; Sorry, no results found!</h3></div></div>');
}
function PageData(datas){
    var html='';
    for (var i=0; i < datas.length; i++) {
        html += `
		<div class="prd-cntr">
			<a href="{{url('pr')}}/`+datas[i].subcategory_slug+`/`+datas[i].product_slug+`">
				<div class="pro-im">
					<img src="{{asset('`+datas[i].main_image+`')}}" class="">
				</div>
				<div class="prod-card-price">
					<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i>`+addCommas(datas[i].sale_price)+`</div>
					<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>`+addCommas(datas[i].mrps)+`</span> Save
						28%</div>
				</div>

				<div class="prod-card-rating">
					<div class="Stars" style="--rating: 4.2;" aria-label=""></div>
					<span class="nb-rw">856</span>
				</div>

				<h3 class="prod-nm"><span class="brand">`+datas[i].barnd_name+`</span> `+datas[i].product_name+`</h3>
			</a>
			<a href="{{url('add-to-cart')}}/`+datas[i].id+`"" class="btn btn-atcr">ADD TO CART</a>
		</div>`;
	}
	$('#product_data').html(html);
}
function addCommas(nStr){
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}
</script>
@endpush
@endsection('content')