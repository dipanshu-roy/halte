@extends('layouts.web.app')
@section('content')
<div class="clearfix"></div>
	<section id="prod-insldr" class="no-margin nsdbn">
		<div class="carousel slide">
			<div class="carousel-inner">
				<div class="container-fluid xl:w-auto">
                    @if(!empty($selected_subcategories))
                        <div class="item active" style="background-image: url('{{asset($selected_subcategories->banner_image)}}'); background-position: top center;">
                    @else
					    <div class="item active" style="background-image: url('{{asset('web/images/banner1.jpg')}}'); background-position: top center;">
                    @endif
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
                                                @php $sub_categories = App\Models\ProductSubCategory::select('subcategory_name','subcategory_slug','banner_image')->where('category_id',$cat->id)->get();@endphp
                                                @if(!empty($sub_categories)) @foreach($sub_categories as $subcat)
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
							@php $sub_categories_slid = App\Models\ProductSubCategory::select('subcategory_name','subcategory_slug','banner_image')->get();@endphp
							@if(!empty($sub_categories_slid)) @foreach($sub_categories_slid as $subcat)
							<li>
                                <a href="#"><img src="{{asset($subcat->banner_image)}}" alt="{{$subcat->subcategory_name}}">
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

				<div class="clearfix"></div>
				<!-- products star -->

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
											<li><label><input type="checkbox"> Manual Lawn Mowers</label></li>
											<li><label><input type="checkbox"> Electric Lawn Mowers</li>
											<li><label><input type="checkbox"> Industrial Lawn Mowers</li>
											<li><label><input type="checkbox"> Heavy Duty Lawn Mowers</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="rw-prod-cntr">
						<div class="col-sm-3 col-xs-6">
							<div class="prd-cntr">
								<a href="product-page.html">
									<div class="pro-im">
										<img src="{{asset('web/images/product-hm1.jpg')}}" class="">
									</div>
									<div class="prod-card-price">
										<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
										<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span>
											Save 28%</div>
									</div>

									<div class="prod-card-rating">
										<div class="Stars" style="--rating: 4.2;" aria-label=""></div>
										<span class="nb-rw">856</span>
									</div>

									<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches
										With 1200 Watt</h3>
								</a>
								<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
							</div>
						</div>

						<div class="col-sm-3 col-xs-6">
							<div class="prd-cntr">
								<a href="product-page.html">
									<div class="pro-im">
										<img src="{{asset('web/images/product-hm2.jpg')}}" class="">
									</div>
									<div class="prod-card-price">
										<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
										<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span>
											Save 28%</div>
									</div>

									<div class="prod-card-rating">
										<div class="Stars" style="--rating: 4.2;" aria-label=""></div>
										<span class="nb-rw">856</span>
									</div>

									<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches
										With 1200 Watt</h3>
								</a>
								<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
							</div>
						</div>

						<div class="col-sm-3 col-xs-6">
							<div class="prd-cntr">
								<a href="product-page.html">
									<div class="pro-im">
										<img src="{{asset('web/images/product-hm3.jpg')}}" class="">
									</div>
									<div class="prod-card-price">
										<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
										<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span>
											Save 28%</div>
									</div>

									<div class="prod-card-rating">
										<div class="Stars" style="--rating: 4.2;" aria-label=""></div>
										<span class="nb-rw">856</span>
									</div>

									<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches
										With 1200 Watt</h3>
								</a>
								<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
							</div>
						</div>

						<div class="col-sm-3 col-xs-6">
							<div class="prd-cntr">
								<a href="product-page.html">
									<div class="pro-im">
										<img src="{{asset('web/images/product-hm4.jpg')}}" class="">
									</div>
									<div class="prod-card-price">
										<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
										<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span>
											Save 28%</div>
									</div>

									<div class="prod-card-rating">
										<div class="Stars" style="--rating: 0;" aria-label=""></div>
										<span class="nb-rw"></span>
									</div>

									<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches
										With 1200 Watt</h3>
								</a>
								<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
							</div>
						</div>


						<div class="col-sm-3 col-xs-6">
							<div class="prd-cntr">
								<a href="product-page.html">
									<div class="pro-im">
										<img src="{{asset('web/images/product-hm5.jpg')}}" class="">
									</div>
									<div class="prod-card-price">
										<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
										<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span>
											Save 28%</div>
									</div>

									<div class="prod-card-rating">
										<div class="Stars" style="--rating: 3.2;" aria-label=""></div>
										<span class="nb-rw">856</span>
									</div>

									<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches
										With 1200 Watt</h3>
								</a>
								<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
							</div>
						</div>


						<div class="col-sm-3 col-xs-6">
							<div class="prd-cntr">
								<a href="product-page.html">
									<div class="pro-im">
										<img src="{{asset('web/images/product-hm6.jpg')}}" class="">
									</div>
									<div class="prod-card-price">
										<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
										<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span>
											Save 28%</div>
									</div>

									<div class="prod-card-rating">
										<div class="Stars" style="--rating: 5;" aria-label=""></div>
										<span class="nb-rw">856</span>
									</div>

									<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches
										With 1200 Watt</h3>
								</a>
								<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
							</div>
						</div>

						<div class="col-sm-3 col-xs-6">
							<div class="prd-cntr">
								<a href="product-page.html">
									<div class="pro-im">
										<img src="{{asset('web/images/product-hm7.jpg')}}" class="">
									</div>
									<div class="prod-card-price">
										<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
										<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span>
											Save 28%</div>
									</div>

									<div class="prod-card-rating">
										<div class="Stars" style="--rating: 2.2;" aria-label=""></div>
										<span class="nb-rw">856</span>
									</div>

									<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches
										With 1200 Watt</h3>
								</a>
								<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
							</div>
						</div>

						<div class="col-sm-3 col-xs-6">
							<div class="prd-cntr">
								<a href="product-page.html">
									<div class="pro-im">
										<img src="{{asset('web/images/product-hm8.jpg')}}" class="">
									</div>
									<div class="prod-card-price">
										<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
										<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span>
											Save 28%</div>
									</div>

									<div class="prod-card-rating">
										<div class="Stars" style="--rating: 0;" aria-label=""></div>
										<span class="nb-rw">856</span>
									</div>

									<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches
										With 1200 Watt</h3>
								</a>
								<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
							</div>
						</div>


						<div class="col-sm-3 col-xs-6">
							<div class="prd-cntr">
								<a href="product-page.html">
									<div class="pro-im">
										<img src="{{asset('web/images/product-hm1.jpg')}}" class="">
									</div>
									<div class="prod-card-price">
										<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
										<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span>
											Save 28%</div>
									</div>

									<div class="prod-card-rating">
										<div class="Stars" style="--rating: 0;" aria-label=""></div>
										<span class="nb-rw">856</span>
									</div>

									<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches
										With 1200 Watt</h3>
								</a>
								<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
							</div>
						</div>

						<div class="col-sm-3 col-xs-6">
							<div class="prd-cntr">
								<a href="product-page.html">
									<div class="pro-im">
										<img src="{{asset('web/images/product-hm5.jpg')}}" class="">
									</div>
									<div class="prod-card-price">
										<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
										<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span>
											Save 28%</div>
									</div>

									<div class="prod-card-rating">
										<div class="Stars" style="--rating: 3.2;" aria-label=""></div>
										<span class="nb-rw">856</span>
									</div>

									<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches
										With 1200 Watt</h3>
								</a>
								<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
							</div>
						</div>


						<div class="col-sm-3 col-xs-6">
							<div class="prd-cntr">
								<a href="product-page.html">
									<div class="pro-im">
										<img src="{{asset('web/images/product-hm6.jpg')}}" class="">
									</div>
									<div class="prod-card-price">
										<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
										<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span>
											Save 28%</div>
									</div>

									<div class="prod-card-rating">
										<div class="Stars" style="--rating: 5;" aria-label=""></div>
										<span class="nb-rw">856</span>
									</div>

									<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches
										With 1200 Watt</h3>
								</a>
								<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
							</div>
						</div>

						<div class="col-sm-3 col-xs-6">
							<div class="prd-cntr">
								<a href="product-page.html">
									<div class="pro-im">
										<img src="{{asset('web/images/product-hm7.jpg')}}" class="">
									</div>
									<div class="prod-card-price">
										<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
										<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span>
											Save 28%</div>
									</div>

									<div class="prod-card-rating">
										<div class="Stars" style="--rating: 2.2;" aria-label=""></div>
										<span class="nb-rw">856</span>
									</div>

									<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches
										With 1200 Watt</h3>
								</a>
								<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
							</div>
						</div>

						<div class="col-sm-3 col-xs-6">
							<div class="prd-cntr">
								<a href="product-page.html">
									<div class="pro-im">
										<img src="{{asset('web/images/product-hm8.jpg')}}" class="">
									</div>
									<div class="prod-card-price">
										<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
										<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span>
											Save 28%</div>
									</div>

									<div class="prod-card-rating">
										<div class="Stars" style="--rating: 0;" aria-label=""></div>
										<span class="nb-rw">856</span>
									</div>

									<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches
										With 1200 Watt</h3>
								</a>
								<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
							</div>
						</div>


						<div class="col-sm-3 col-xs-6">
							<div class="prd-cntr">
								<a href="product-page.html">
									<div class="pro-im">
										<img src="{{asset('web/images/product-hm1.jpg')}}" class="">
									</div>
									<div class="prod-card-price">
										<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
										<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span>
											Save 28%</div>
									</div>

									<div class="prod-card-rating">
										<div class="Stars" style="--rating: 0;" aria-label=""></div>
										<span class="nb-rw">856</span>
									</div>

									<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches
										With 1200 Watt</h3>
								</a>
								<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
							</div>
						</div>

						<div class="col-sm-3 col-xs-6">
							<div class="prd-cntr">
								<a href="product-page.html">
									<div class="pro-im">
										<img src="{{asset('web/images/product-hm5.jpg')}}" class="">
									</div>
									<div class="prod-card-price">
										<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
										<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span>
											Save 28%</div>
									</div>

									<div class="prod-card-rating">
										<div class="Stars" style="--rating: 3.2;" aria-label=""></div>
										<span class="nb-rw">856</span>
									</div>

									<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches
										With 1200 Watt</h3>
								</a>
								<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
							</div>
						</div>


						<div class="col-sm-3 col-xs-6">
							<div class="prd-cntr">
								<a href="product-page.html">
									<div class="pro-im">
										<img src="{{asset('web/images/product-hm6.jpg')}}" class="">
									</div>
									<div class="prod-card-price">
										<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
										<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span>
											Save 28%</div>
									</div>

									<div class="prod-card-rating">
										<div class="Stars" style="--rating: 5;" aria-label=""></div>
										<span class="nb-rw">856</span>
									</div>

									<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches
										With 1200 Watt</h3>
								</a>
								<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
							</div>
						</div>


						<div class="col-sm-3 col-xs-6">
							<div class="prd-cntr">
								<a href="product-page.html">
									<div class="pro-im">
										<img src="{{asset('web/images/product-hm7.jpg')}}" class="">
									</div>
									<div class="prod-card-price">
										<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
										<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span>
											Save 28%</div>
									</div>

									<div class="prod-card-rating">
										<div class="Stars" style="--rating: 2.2;" aria-label=""></div>
										<span class="nb-rw">856</span>
									</div>

									<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches
										With 1200 Watt</h3>
								</a>
								<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
							</div>
						</div>

						<div class="col-sm-3 col-xs-6">
							<div class="prd-cntr">
								<a href="product-page.html">
									<div class="pro-im">
										<img src="{{asset('web/images/product-hm8.jpg')}}" class="">
									</div>
									<div class="prod-card-price">
										<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
										<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span>
											Save 28%</div>
									</div>

									<div class="prod-card-rating">
										<div class="Stars" style="--rating: 0;" aria-label=""></div>
										<span class="nb-rw">856</span>
									</div>

									<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches
										With 1200 Watt</h3>
								</a>
								<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
							</div>
						</div>


						<div class="col-sm-3 col-xs-6">
							<div class="prd-cntr">
								<a href="product-page.html">
									<div class="pro-im">
										<img src="{{asset('web/images/product-hm1.jpg')}}" class="">
									</div>
									<div class="prod-card-price">
										<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
										<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span>
											Save 28%</div>
									</div>

									<div class="prod-card-rating">
										<div class="Stars" style="--rating: 0;" aria-label=""></div>
										<span class="nb-rw">856</span>
									</div>

									<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches
										With 1200 Watt</h3>
								</a>
								<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
							</div>
						</div>


						<div class="col-sm-3 col-xs-6">
							<div class="prd-cntr">
								<a href="product-page.html">
									<div class="pro-im">
										<img src="{{asset('web/images/product-hm5.jpg')}}" class="">
									</div>
									<div class="prod-card-price">
										<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
										<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span>
											Save 28%</div>
									</div>

									<div class="prod-card-rating">
										<div class="Stars" style="--rating: 3.2;" aria-label=""></div>
										<span class="nb-rw">856</span>
									</div>
									<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches With 1200 Watt</h3>
								</a>
								<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-xs-12">
						<div class="page-center">
							<ul class="pagination">
								<li><a href="#"><i class="fa fa-angle-left small"></i><span class="hidden-xs"></span></a></li>
								<li><a href="#">1</a></li>
								<li class="active"><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#"><span class="hidden-xs"></span> <i class="fa fa-angle-right small"></i></a></li>
							</ul>
						</div>
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
@endsection('content')