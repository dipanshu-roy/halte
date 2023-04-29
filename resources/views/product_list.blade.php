@extends('layouts.web.app')
@section('content')
<div class="clearfix"></div>
	<section id="prod-insldr" class="no-margin nsdbn">
		<div class="carousel slide">
			<div class="carousel-inner">
				<div class="container-fluid xl:w-auto">
                    <div class="item active" style="background-image: url({{asset('web/images/banner1.jpg')}}); background-position: top center;">
						<div class="carousel-content">
							<div class="container plr0md fw xs-plr60">
								<div class="col-sm-12">
									<ul class="breadcrumb">
										<li><a href="index.html">Home</a></li>
                                        @if(Request::segment(3))
										    <li><a href="#">{{ucfirst(Request::segment(2))}}</a></li>
                                        @else
										    <li><a href="#">{{ucfirst(Request::segment(1))}}</a></li>
                                        @endif
                                        @if(!empty($selected_brand))
										    <li><a href="#">{{ucfirst($selected_brand->barnd_name)}}</a></li>
                                        @endif
                                        @if(!empty($selected_subcategories))
										    <li><a href="#">{{ucfirst($selected_subcategories->subcategory_name)}}</a></li>
                                        @endif
									</ul>
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
			<div class="col-sm-2">
				<div class="category-cntr">
					<div class="shpby">
						<h4 class="fltr_tp1 hn-sm">Shop by</h4>
						<a class="vs-sm btn btn-shpby btn-clpsbl collapsed" data-toggle="collapse" data-target="#nav-category" href="javascript:void(0);">Shop by <i class="fa arrow fa-caret-down"></i> </a>
						<div id="nav-category" class="sub-cat">
							<a class="lblctr mrt20 hn-sm">Category</a>
							<div class=""></div>
							<a class="vs-sm btn btn-catgs btn-clpsbl collapsed" data-toggle="collapse" data-target="#nav-sub-category-1" href="javascript:void(0);"> Brands <i class="fa arrow fa-caret-down"></i> </a>
							<div id="nav-sub-category-1" class="sub-cat">
								<ul class="other-filter mrt0">
                                    @if(!empty($categories)) @foreach($categories as $cat)
                                        <li><a href="#{{$cat->category_slug}}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed"><i class="fa fa-caret-right mr-2"></i> {{$cat->category_name}}</a>
                                            <ul class="collapse list-unstyled" id="{{$cat->category_slug}}">
                                                @php $sub_category = App\Models\ProductSubCategory::select('subcategory_name','subcategory_slug','banner_image')->where('category_id',$cat->id)->get();@endphp
                                                @if(!empty($sub_category)) @foreach($sub_category as $subcat)
												    <li><a class="anchortag" href="{{url('ct/'.$cat->category_slug.'/'.$subcat->subcategory_slug)}}">{{$subcat->subcategory_name}}</a></li>
                                                @endforeach @endif
											</ul>
                                        </li>
                                    @endforeach @endif
								</ul>
							</div>
							<a class="lblctr mrt20 hn-sm">Brands</a>
							<div class=""></div>
							<a class="vs-sm btn btn-catgs btn-clpsbl collapsed" data-toggle="collapse" data-target="#nav-sub-category-2" href="javascript:void(0);"> Brands <i class="fa arrow fa-caret-down"></i> </a>
							<div id="nav-sub-category-2" class="sub-cat">
								<ul class="other-filter mrt0">
									@php $get_brand = App\Models\Brand::select('id','barnd_name','barnd_slug')->orderBy('id','DESC')->get();@endphp
                                    @if(!empty($get_brand))
                                        @foreach($get_brand as $brand)
                                        <li><a href="{{url('brand/'.$brand->barnd_slug)}}">{{$brand->barnd_name}}</a></li>
                                        @endforeach
                                    @endif
								</ul>
							</div>
							<ul class="other-filter mrtp-sm0 pdl-sm0">
								<li><a href="#">Most Rated <i class="fa fa-star"></i></a></li>
								<li><a href="#">Most Viewed <i class="fa fa-eye"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="hlfpg"></div>
			</div>

			<div class="col-sm-10 pdlr-xs0">
				<div class="col-sm-12">
					<div class="prod-sub-cat-pg">
						<ul class="prod-subcat-sldr">
							@if(!empty($sub_categories)) @foreach($sub_categories as $subcat)
							<li>
                                <a href="{{url('ct/'.$subcat->category_slug.'/'.$subcat->subcategory_slug)}}"><img src="{{asset($subcat->banner_image)}}" alt="{{$subcat->subcategory_name}}">
									<span>{{$subcat->subcategory_name}}</span>
								</a>
							</li>
							@endforeach @endif
						</ul>
					</div>
				</div>


				<div class="clearfix"></div>


				<div class="col-sm-12">
					<div class="ofr-sldr vs-lg">
						@if(!empty($categories)) @foreach($categories as $banners)
						<div>
							<a href="#">
								<img src="{{asset($banners->banner_image)}}" class="imve ofr-lg">
								<img src="{{asset($banners->banner_image)}}" class="imve ofr-xs">
							</a>
						</div>
						@endforeach @endif
					</div>
				</div>

				<div class="clearfix"></div>
				<div class="prods-side">
					<div class="col-sm-12 page-tl-cntr">
						<div class="row">
							<div class="col-sm-6">
								<h1 class="h1pgtl-sb">Lawn &amp; Garden</h1>
							</div>
							<div class="col-sm-6 fltrs">

								<div class="dropdown btn-drpdn">
									<button class="btn btn-flters dropdown-toggle" type="button" data-toggle="dropdown"
										id="dropdownMenu1" aria-haspopup="true" aria-expanded="true"> Filter
									</button>
									<div class="dropdown-menu pull-right checkbox-menu allow-focus"
										ria-labelledby="dropdownMenu1">
										<ul class="">
											<li class="active"><a href="#">Show All</a></li>
											<li><label><input type="checkbox" name="manual"> Manual Lawn Mowers</label></li>
											<li><label><input type="checkbox" name="electric"> Electric Lawn Mowers</li>
											<li><label><input type="checkbox" name="industrial"> Industrial Lawn Mowers</li>
											<li><label><input type="checkbox" name="heavy"> Heavy Duty Lawn Mowers</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="rw-prod-cntr" id="product_data">
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-xs-12">
				<div class="page-center">
					<div class="pagination">
						<a id="proceed_prev" style="margin-top: 11px;" class="btn btn-secondary btn-sm border-0">&laquo; Previous</a>
						<a id="proceed_next" class="btn btn-primary btn-sm border-0">Next &raquo;</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="col-sm-12">
		<div class="ofr-cat-sldr vs-sm-b">
			<div>
				<a href="#">
					<img src="{{asset('web/images/banner-category1.jpg')}}" class="imve ofr-lg">
					<img src="{{asset('web/images/banner-product-mobile.jpg')}}" class="imve ofr-xs">
				</a>
			</div>
			<div>
				<a href="#"><img src="{{asset('web/images/banner-category2.jpg')}}" class="imve ofr-lg">
					<img src="{{asset('web/images/banner-product-mobile2.jpg')}}" class="imve ofr-xs">
				</a>
			</div>
			<div>
				<a href="#"><img src="{{asset('web/images/banner-category1.jpg')}}" class="imve ofr-lg">
					<img src="{{asset('web/images/banner-product-mobile.jpg')}}" class="imve ofr-xs">
				</a>
			</div>
			<div>
				<a href="#"><img src="{{asset('web/images/banner-category2.jpg')}}" class="imve ofr-lg">
					<img src="{{asset('web/images/banner-product-mobile2.jpg')}}" class="imve ofr-xs">
				</a>
			</div>
		</div>
	</div>
<div class="clrsn1">
</div>
<div class="clearfix"></div>
@push('script')
<script>
$(document).ready(function(){
    var offset = 0;
    loadCurrentPage(offset);
    $("#proceed_next, #proceed_prev").click(function(){
        offset = ($(this).attr('id')=='proceed_next')?offset+16:offset-16;
        if (offset < 0){
            offset = 0;
        }else{
            loadCurrentPage(offset);
        }
    });
    $("#job_title,#minimum_salary,#maximum_salary").change(function(){
        loadCurrentPage(offset);
    });
});
</script>
<script>
function loadCurrentPage(offset){
	var spinner = $('#loader');
    $('#product_data').empty('');
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{url('ajax/get-product')}}?offset="+offset+"",
        type: 'GET',
        data:{
            manual:$('#manual').val(),
            electric:$('#electric').val(),
            industrial:$('#industrial').val()
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
        html += `<div class="col-sm-3 col-xs-6">
			<div class="prd-cntr">
				<a href="product-page.html">
					<div class="pro-im">
						<img src="{{asset('`+datas[i].main_image+`')}}" class="">
					</div>
					<div class="prod-card-price">
						<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i>`+addCommas(datas[i].sale_price)+`</div>
						<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>`+addCommas(datas[i].mrps)+`</span>
							Save 28%</div>
					</div>

					<div class="prod-card-rating">
						<div class="Stars" style="--rating: 0;" aria-label=""></div>
						<span class="nb-rw">856</span>
					</div>
					<h3 class="prod-nm"><span class="brand">`+datas[i].barnd_name+`</span> `+datas[i].product_name+`</h3>
				</a>
				<a href="{{url('add-to-cart')}}/`+datas[i].id+`" class="btn btn-atcr" role="button">ADD TO CART</a>
			</div>
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