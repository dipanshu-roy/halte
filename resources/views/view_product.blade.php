@extends('layouts.web.app')
@section('content')
<style>
.content {
  text-align: center;
}
.content h1 {
  font-family: 'Sansita', sans-serif;
  letter-spacing: 1px;
  font-size: 50px;
  color: #282828;
  margin-bottom: 10px;
}
.content  i {
  color: #FFC107;
}
.content span {
  position: relative;
  display: inline-block;
}
.content  span:before, .content  span:after {
  position: absolute;
  content: "";
  background-color: #282828;
  width: 40px;
  height: 2px;
  top: 40%;
}
.content  span:before {
  left: -45px;
}
.content  span:after {
  right: -45px;
}
.content p {
  font-family: 'Open Sans', sans-serif;
  font-size: 18px;
  letter-spacing: 1px;
}
.wrapper {
  width: 100%;
  position: relative;
  display: inline-block;
  border: none;
  font-size: 14px;
}
.wrapper input {
  border: 0;
  width: 1px;
  height: 1px;
  overflow: hidden;
  position: absolute !important;
  clip: rect(1px 1px 1px 1px);
  clip: rect(1px, 1px, 1px, 1px);
  opacity: 0;
}
.wrapper label {
  position: relative;
  float: right;
  color: #C8C8C8;
}
.wrapper label:before {
  margin: 5px;
  content: "\f005";
  font-family: FontAwesome;
  display: inline-block;
  font-size: 1.5em;
  color: #ccc;
  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;
}
.wrapper input:checked ~ label:before {
  color: #FFC107;
}
.wrapper label:hover ~ label:before {
  color: #ffdb70;
}
.wrapper label:hover:before {
  color: #FFC107;
}
</style>
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
										<li><a href="{{url('')}}">Home</a></li>                                      
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
			<div class="col-sm-12">
				<a href="#" class="btn btn-back"><i class="fa fa-angle-left"></i> Back to Result</a>
			</div>
			<div class="col-sm-12">
				<div class="prod-side">
					<div class="col-sm-7 pdlr-sm0">
						<div class="product-img">
							<div class="main-prod-cont">
								<div class="prod-img-cont-main">
									<div class="hlfpg2"></div>
									<div class="slider-product">
										<a data-fancybox="gallery" href="{{asset($products->main_image)}}"> <img src="{{asset($products->main_image)}}" title="{{$products->product_name}}" />
										</a>
                                        @php if(!empty($products->sub_images)){
                                            $sub_images = explode(',',$products->sub_images);
                                            for($i=0;$i < count($sub_images);$i++){ @endphp
                                                <a data-fancybox="gallery" href="{{asset($sub_images[$i])}}">
                                                    <img src="{{asset($sub_images[$i])}}" title="{{$products->product_name}}" />
                                                </a>
                                        @php } } @endphp
									</div>
									<div class="clearfix"></div>

									<div class="small-slider">
										<div><img src="{{asset($products->main_image)}}" /></div>
                                        @php if(!empty($products->sub_images)){
                                            $sub_images = explode(',',$products->sub_images);
                                            for($i=0;$i < count($sub_images);$i++){ @endphp
                                                <div><img src="{{asset($sub_images[$i])}}" /></div>
                                        @php } } @endphp
									</div>


									<div>

									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="col-sm-5 pdlr-sm0">
						<div class="product-data-in">
							<h1 class="h1pgtl-sb2">{{$products->product_name}}</h1>
							<div class="rtng-info">
								<div class="rading-prod-pg">
									{{round($total_avg,1)}} <div class="Stars" style="--rating: {{round($total_avg,1)}};" aria-label=""></div>
									<a href="#reviews">{{$review_count}} reviews</a>
								</div>
							</div>
							<div class="prc-product">
								<div class="prc bdrprs">
									<span class="pr-type">M.R.P <span class="pr-type-cut"><i class="fa fa-inr"></i>{{number_format($products->mrps)}}</span></span>
									<span class="slps"><i class="fa fa-inr"></i>{{number_format($products->sale_price)}}</span>
									<span class="prs-tx">(15,479+12% Tax)</span>
								</div>
							</div>
							<input type="number" class="hlt-form-control2 mtb5" value="1" min="1">
							<a href="{{url('add-to-cart',$products->id)}}" class="btn btn-atcr2 mr5 mtb5 blk-xs">BUY NOW</a>
							<a href="{{url('add-to-cart',$products->id)}}" class="btn btn-atcr4 mr5 mtb5 blk-xs">ADD TO CART</a>
							<a href="{{$products->amazon_link}}" target="_blank" class="btn btn-atcr3 mr5 mtb5 blk-xs"><i class="fa fa-amazon"></i> BUY FROM AMAZON</a>
							<div class="offer-prod">
								<div class="col-sm-12 plr0">
									<div class="ofr-bx">
										<h3 class="h3ofr-tl">Summer Offer</h3>
										<p class="ofr-lead">
											10% Instant Discount up to INR 500 on Prepaid Trxns. Min purchase value INR
											2000
											Use <b>Coupon Code: SUMMER10</b>
										</p>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="form-horizontal delevery-form">
								<label for="" class="col-sm-2 pdl0">Delivery</label> <input type="text" class="" name="check-av" placeholder="Enter Your Pincode">
								<button class="btn">Check</button>
							</div>
							<div class="normal-delevery nsl">
								<!-- <div class="form-group"><label><input type="radio" name="radio[1]" id="radio1"> 7 Days Standard Delivery</label></div> -->
								<div class="form-group"><label><input type="checkbox" name="radio[1]" id="radio2"> Express Delivery
										<!-- <span class="exp-price"><i class="fa fa-inr"></i>500 extra</span> --></label>
								</div>
							</div>
							<div class="shp-feature">
								<span><i class="fa fa-truck  fa-flip-horizontal"></i> Free Delivery for <br class="hnsm"> Prepaid Orders</span>
								<span><i class="fa  fa-money"></i> Pay on Delivery <br class="hnsm"> + <b class="fa fa-inr"></b>100 Extra</span>
								<span><i class="fa  fa-repeat"></i> 15 Days <br class="hnsm">Returnable</span>
							</div>
							<h3 class="h3prod-abt">About this item</h3>
							<hr class="hrprd-gry">
							<ul class="prod-main-info">
								<li>{{$products->about_this_item}}</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
                
				<div class="col-sm-12">
					<div class="product-tabs">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#features">Features</a></li>
							<li><a data-toggle="tab" href="#specification">Specification</a></li>
							<li><a data-toggle="tab" href="#videos">Videos</a></li>
						</ul>
						<div class="tab-content">
							<div id="features" class="tab-pane fade in active">
                                @if(!empty($product_feature))
								<div class="row ptb15">
									<div class="col-sm-4">
										<img src="{{asset($product_feature->feature_main_image)}}" alt="" class="img-responsive imvec">
									</div>
									<div class="col-sm-8">
										<div class="spacer40"></div>
										<h3 class="prod-lead-tl">Description</h3>
										<p class="prod-lead">{{$product_feature->description}}</p>
									</div>
								</div>
                                @endif
                                @if(!empty($product_feature_details)) 
								<div class="row ptb15">
                                    @foreach($product_feature_details as $pfd)
									<div class="col-sm-3">
										<img src="{{asset($pfd->feature_image)}}" alt="{{$pfd->feature_title}}" class="img-responsive imvec">
										<h3 class="prod-lead-tl">{{$pfd->feature_title}}</h3>
										<p class="prod-lead">{{$pfd->feature_details}}</p>
									</div>
                                    @endforeach
								</div>
                                @endif
							</div>
							<a class="vs-sm btn btn-shpby btn-clpsbl collapsed" data-toggle="collapse" data-target="#view-more" href="javascript:void(0);"> View More<i class="fa arrow fa-caret-down"></i> </a>
							<div id="view-more" class="sub-cat">
                                @if(!empty($product_specifications))
								<div id="specification" class="tab-pane fade">
									<div class="row">

										<div class="col-sm-6">
											<h3 class="prod-lead-tl">Technical Specification:</h3>

											<div class="table-responsive">
												<table
													class="table table-bordered table-striped table-hover table-technical">
													<tbody>
														<tr>
															<th>Brand</th>
															<td>{{$products->barnd_name}}</td>
														</tr>
														<tr>
															<th>SKU</th>
															<td>{{$product_specifications->sku}}</td>
														</tr>
														<tr>
															<th>Power Source</th>
															<td>{{$product_specifications->power_source}}</td>
														</tr>
														<tr>
															<th>Material</th>
															<td>{{$product_specifications->material}}</td>
														</tr>
														<tr>
															<th>Colour</th>
															<td>{{$product_specifications->colour}}</td>
														</tr>
														<tr>
															<th>Style</th>
															<td>{{$product_specifications->style}}</td>
														</tr>
														<tr>
															<th>Item Weight</th>
															<td>{{$product_specifications->item_weight}}</td>
														</tr>
														<tr>
															<th>Cutting Width</th>
															<td>{{$product_specifications->cutting_width}}</td>
														</tr>
														<tr>
															<th>Number of Positions</th>
															<td>{{$product_specifications->number_of_positions}}</td>
														</tr>
														<tr>
															<th>Country of Origin</th>
															<td>{{$product_specifications->country_of_origin}}</td>
														</tr>
														<tr>
															<th>Product Dimensions</th>
															<td>{{$product_specifications->product_dimensions}}</td>
														</tr>
													</tbody>
                                                    @endif
												</table>
											</div>
										</div>
										<div class="col-sm-6">
											<h3 class="prod-lead-tl">Additional Information</h3>
											<ul class="prod-main-info2">
												<li>{{$product_specifications->additional_information}}</li>
											</ul>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
								<div id="videos" class="tab-pane fade">
									<h3 class="prod-lead-tl vs-sm-b ">Watch Video</h3>
									<div class="col-sm-6 pdlr-sm0">
										<iframe width="100%" height="315" src="{{$products->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="clearfix"></div>


					<div class="panel-group reviews" id="accordion">
						<a href="" id="reviews"></a>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 data-toggle="collapse" data-parent="#accordion" href="#reviews-panel"
									class="panel-title expand">
									<div class="right-arrow pull-right"><i class='fa fa-angle-down'></i></div>
									<a href="#">Reviews <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><span class="rv-nmbr"> {{$review_count}} </span> </a>
								</h4>
							</div>
							
							<div id="reviews-panel" class="panel-collapse in">
								<div class="panel-body">
									<div class="col-sm-3">
										<div class="review-card">
											<div class="total-review-cnt">
												<div class="Stars" style="--rating: 4.2;" aria-label=""></div>
												<span class="rv-nmbr"> {{round($total_avg,1)}} out of 5 </span>
												<span class="total-reviews-nmbr">{{$review_count}} Reviews</span>
											</div>
											
											<div class="rev-pecent">
												@if(!empty($rating)) @foreach($rating as $rat)
												<div class="rev-percent-rw">
													<span class="rating-clm">{{$rat->Total}} Star</span>
													<div class="w3-light-grey">
														<div class="w3-grey" style="height:10px;width:{{$rat->rating*20}}%"></div>
													</div>
													<span class="rating-clm">{{$rat->rating}}%</span>
												</div>
												@endforeach @endif
											</div>
											@guest
											<a href="{{url('account/login')}}" class="btn btn-write-review">WRITE A
												REVIEW</a>
											@else
											<a href="#review-form" id="btnForm" class="btn btn-write-review">WRITE A
												REVIEW</a>
											@endguest
											<div id="review-form" style="display:none; min-width: 50%;">
												<form action="{{url('add-reviews')}}" method="POST" class="reviews-frm" atocomplete="off" enctype="multipart/form-data">
                    								@csrf
													<h3 class="h3nsd txa_l">Write Review</h3>
													<hr class="hrgrey">
													<div class="row">
														<div class="d-tb">
															<div class="d-tr">
																<div class="d-tc p-10" style="width: 100px;">
																	<img src="{{asset($products->main_image)}}" alt="" class="imve">
																</div>
																<div class="d-tc p-10">
																	<p class="rev-form-tl">{{$products->product_name}}</p>
																</div>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label for="">How would you rate it?*</label>
														<div class="clear"></div>
														<div  class="wrapper">
															<input type="checkbox" name="st" id="st1" value="5"/>
															<label for="st1"></label>
															<input type="checkbox" name="st" id="st2" value="4"/>
															<label for="st2"></label>
															<input type="checkbox" name="st" id="st3" value="3"/>
															<label for="st3"></label>
															<input type="checkbox" name="st" id="st4" value="2"/>
															<label for="st4"></label>
															<input type="checkbox" name="st" id="st5" value="1"/>
															<label for="st5"></label>
														</div>
													</div>
													<div class="form-group">
														<label for="">Share a Video or Photo</label>
														<div class="file-upload">
															<img src="{{asset('web/images/upload-thumb.png')}}" />
															<input type="file" name="video_audio" multiple />
														</div>
													</div>
													<div class="form-group">
														<label for="">Review Title*</label>
														<input type="hidden" name="product_id" id="product_id" value="{{$products->id}}">
                            							<input type="text" name="title" id="reviews_title" class="form-control" placeholder="Enter Title">
													</div>
													<div class="form-group">
														<label for="">Your Review*</label>
															<textarea type="text" name="description" id="reviews_description" class="form-control" placeholder="Enter Feedback" rows="5"></textarea>
													</div>
													<div class="form-group">
														<label for=""></label>
														<button class="btn btn-review">Submit</button>
													</div>
												</form>
											</div>

										</div>
									</div>
									<div class="col-sm-9">
										@if(!empty($reviews)) @foreach($reviews as $revi)
										<div class="row user-review">
											<div class="col-sm-9">
												<h3 class="h3-review-title">{{$revi->title}}</h3>
												<p class="review-details">{{$revi->description}}</p>
											</div>
											<div class="col-sm-3">
												<div class="review-by">{{$revi->name}}</div>
												<div class="review-on">{{date_format(date_create($revi->created_at),"d M Y")}}</div>
											</div>
											<div class="col-sm-12">
												<hr class="hr-rvw">
											</div>
										</div>
										@endforeach @endif
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-12 combine-products">
						<h3 class="h3nsd"><span>BETTER TOGETHER</span></h3>
						<hr class="hr-vcntr">



						<div class="prod-combine-cont">

							<div class="col-sm-9">
								<div class="prod-combine">

									<div class="carousel-row bundlet-slider">

										<div class="carousel-item bundled-card-wrapper selected">
											<div class="bundled-card-container">
												<div class="bundled-item">
													<div class="bGIJrA">
														<div>
															<div class="item-pill-container current">
																<label for="checkbox-1"><input type="checkbox"
																		name="checkbox-1" id="checkbox-1" checked>
																	<span>Current Item</span></label>
															</div>
															<a href="#"><img src="images/product-thumb-6.jpg" alt="" />
																<div class="bndl-prod-name">GARDENA 11120-20 Pressure
																	Sprayer 1.25 Leter</div>
																<div class="bndl-prod-price-sale"><i
																		class="fa fa-inr"></i> 3,349</div>
																<div class="bndl-prod-price-mrps"><i
																		class="fa fa-inr"></i> <span>3,800</span> Save
																	<i class="fa fa-inr"></i> 561</div>
															</a>
														</div>

														<div class="plus-container">
															<div class="plus-sign"><svg
																	class="styles__StyledSVG-sc-1houmlx-0 pls icon icon-plus removeFocus"
																	viewBox="0 0 24 24" color="#393939"
																	aria-hidden="true" role="presentation"
																	tabindex="-1">
																	<path fill-rule="evenodd"
																		d="M20 13.1429h-6.8571V20h-2.2858v-6.8571H4v-2.2858h6.8571V4h2.2858v6.8571H20z">
																	</path>
																</svg></div>
														</div>

													</div>
												</div>
											</div>
										</div>

										<div class="carousel-item bundled-card-wrapper selected">
											<div class="bundled-card-container">
												<div class="bundled-item">
													<div class="bGIJrA">
														<div>
															<div class="item-pill-container">
																<label for="checkbox-2"><input type="checkbox"
																		name="checkbox-2" id="checkbox-2" checked>
																	<span>Select</span></label>
															</div>
															<a href="#"><img src="images/product-thumb-3.jpg" alt="" />
																<div class="bndl-prod-name">GARDENA 11120-20 Pressure
																	Sprayer 1.25 Leter</div>
																<div class="bndl-prod-price-sale"><i
																		class="fa fa-inr"></i> 3,349</div>
																<div class="bndl-prod-price-mrps"><i
																		class="fa fa-inr"></i> <span>3,800</span> Save
																	<i class="fa fa-inr"></i> 561</div>
															</a>
														</div>

														<div class="plus-container">
															<div class="plus-sign"><svg
																	class="styles__StyledSVG-sc-1houmlx-0 pls icon icon-plus removeFocus"
																	viewBox="0 0 24 24" color="#393939"
																	aria-hidden="true" role="presentation"
																	tabindex="-1">
																	<path fill-rule="evenodd"
																		d="M20 13.1429h-6.8571V20h-2.2858v-6.8571H4v-2.2858h6.8571V4h2.2858v6.8571H20z">
																	</path>
																</svg></div>
														</div>

													</div>
												</div>
											</div>
										</div>


										<div class="carousel-item bundled-card-wrapper selected">
											<div class="bundled-card-container">
												<div class="bundled-item">
													<div class="bGIJrA">
														<div>
															<div class="item-pill-container">
																<label for="checkbox-3"><input type="checkbox"
																		name="checkbox-3" id="checkbox-3" checked>
																	<span>Select</span></label>
															</div>
															<a href="#"><img src="images/product-thumb-4.jpg" alt="" />
																<div class="bndl-prod-name">GARDENA 11120-20 Pressure
																	Sprayer 1.25 Leter</div>
																<div class="bndl-prod-price-sale"><i
																		class="fa fa-inr"></i> 3,349</div>
																<div class="bndl-prod-price-mrps"><i
																		class="fa fa-inr"></i> <span>3,800</span> Save
																	<i class="fa fa-inr"></i> 561</div>
															</a>
														</div>

														<div class="plus-container">
															<div class="plus-sign"><svg
																	class="styles__StyledSVG-sc-1houmlx-0 pls icon icon-plus removeFocus"
																	viewBox="0 0 24 24" color="#393939"
																	aria-hidden="true" role="presentation"
																	tabindex="-1">
																	<path fill-rule="evenodd"
																		d="M20 13.1429h-6.8571V20h-2.2858v-6.8571H4v-2.2858h6.8571V4h2.2858v6.8571H20z">
																	</path>
																</svg></div>
														</div>

													</div>
												</div>
											</div>
										</div>

										<div class="carousel-item bundled-card-wrapper selected">
											<div class="bundled-card-container">
												<div class="bundled-item">
													<div class="bGIJrA">
														<div>
															<div class="item-pill-container">
																<label for="checkbox-4"><input type="checkbox"
																		name="checkbox-4" id="checkbox-4" checked>
																	<span>Select</span></label>
															</div>
															<a href="#"><img src="images/product-thumb-2.jpg" alt="" />
																<div class="bndl-prod-name">GARDENA 11120-20 Pressure
																	Sprayer 1.25 Leter</div>
																<div class="bndl-prod-price-sale"><i
																		class="fa fa-inr"></i> 3,349</div>
																<div class="bndl-prod-price-mrps"><i
																		class="fa fa-inr"></i> <span>3,800</span> Save
																	<i class="fa fa-inr"></i> 561</div>
															</a>
														</div>

														<div class="plus-container">
															<div class="plus-sign"><svg
																	class="styles__StyledSVG-sc-1houmlx-0 pls icon icon-plus removeFocus"
																	viewBox="0 0 24 24" color="#393939"
																	aria-hidden="true" role="presentation"
																	tabindex="-1">
																	<path fill-rule="evenodd"
																		d="M20 13.1429h-6.8571V20h-2.2858v-6.8571H4v-2.2858h6.8571V4h2.2858v6.8571H20z">
																	</path>
																</svg></div>
														</div>

													</div>
												</div>
											</div>
										</div>


									</div>
								</div>
							</div>

							<div class="col-sm-3">
								<div class="total-combine">

									<div class="sb-total">Subtotal for (4) items</div>
									<div class="prs-bundled"><i class="fa fa-inr"></i> 35,145</div>

									<a href="#" class="btn btn-bundle">Add to cart 4 items</a>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>

					<div class="col-sm-12 faqs-cntr">
						<div class="panel-group" id="accordion">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 data-toggle="collapse" data-parent="#accordion" href="#faqs"
										class="panel-title expand mobile-col-tl">
										<div class="right-arrow pull-right"><i class='fa fa-angle-down'></i></div>
										<a href="#">FAQs</a>
									</h4>
								</div>
								<div id="faqs" class="panel-collapse in mobile-col-dth">
									<div class="panel-body">
										<div class="col-sm-12">
											<div class="form-search-faqs">
												<div class="from-group">
													<!-- <label class="col-sm-1">Search</label> -->
													<div class="col-sm-4 plr0">

														<div class="input-group">
															<input type="text" class="form-control" name="question_answer" id="question_answer" placeholder="Search in Q&A">
															<div class="input-group-btn">
																<button class="btn btn-faq-search" type="submit">
																	<i class="fa fa-search"></i>
																</button>
															</div>
														</div>

													</div>
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
										<div class="col-sm-12" id="question_answer_data">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-12 combine-products">
						<h3 class="h3nsd"><span>PRODUCTS WE THINK YOU'LL LIKE</span></h3>
						<hr class="hr-vcntr">


						<div class="prodhmsldr">
							@if(!empty($similar_pr)) @foreach($similar_pr as $rows)
							<div class="prd-cntr">
								<a href="{{url('pr')}}/{{$rows->subcategory_slug}}/{{$rows->product_slug}}">
									<div class="pro-im">
										<img src="{{asset($rows->main_image)}}" class="">
									</div>
									<div class="prod-card-price">
										<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> {{number_format($rows->mrps)}}</div>
										<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>{{number_format($rows->sale_price)}}</span> Save 28%
										</div>
									</div>

									<div class="prod-card-rating">
										<div class="Stars" style="--rating: 4.2;" aria-label=""></div>
										<span class="nb-rw">856</span>
									</div>

									<h3 class="prod-nm"><span class="brand">{{$rows->barnd_name}}</span> {{$rows->product_name}}</h3>
								</a>
								<a href="{{url('add-to-cart,$rows->id')}}" class="btn btn-atcr">ADD TO CART</a>
							</div>
							@endforeach @endif
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		</div>
	</section>
<div class="clrsn1">
</div>
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reviews <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-12">
                <form method="POST" class="reviews-frm" atocomplete="off">
                    @csrf
                    <div class="review-card">
                        <div class="wrapper">
                            <input type="checkbox" name="st" id="st1" value="1"/>
                            <label for="st1"></label>
                            <input type="checkbox" name="st" id="st2" value="2"/>
                            <label for="st2"></label>
                            <input type="checkbox" name="st" id="st3" value="3"/>
                            <label for="st3"></label>
                            <input type="checkbox" name="st" id="st4" value="4"/>
                            <label for="st4"></label>
                            <input type="checkbox" name="st" id="st5" value="5"/>
                            <label for="st5"></label>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="product_id" id="product_id" value="{{$products->id}}">
                            <input type="text" name="title" id="reviews_title" class="form-control" placeholder="Enter Title">
                        </div>
                        <div class="form-group">
                            <textarea type="text" name="description" id="reviews_description" class="form-control" placeholder="Enter Feedback" rows="5"></textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="save-reviews changes btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->
<div class="clearfix"></div>
@push('script')
<script>
$(function () {
	$("#btnForm").fancybox({
		touch: false,
		'onStart': function () { $("#review-form").css("display", "block"); },
		'onClosed': function () { $("#review-form").css("display", "none"); },
	});
});
$(".save-reviews").click(function (e) {
    e.preventDefault();
    var spinner = $('#loader');
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{url('ajax/add-reviews')}}",
        method: "POST",
        data: $('.reviews-frm').serialize(),
        beforeSend: function(xhr){
            spinner.show();
        },
        success: function (response){
            spinner.hide();
            if(response.status==200){
                Swal.fire('Success',response.message,'success');
            }else{
                Swal.fire('Failed',response.message,'error');
            }
        }
    });
});
$(document).ready(function(){
	var question_answer ='';
	loadCurrentPage(question_answer);
	$("#question_answer").on("keyup", function() {
    // $("#question_answer").keydown(function(){
        question_answer = $(this).val();
        if (question_answer.lenght > 2){
			loadCurrentPage(question_answer);
        }else{
            loadCurrentPage(question_answer);
        }
    });
});
</script>
<script>
function loadCurrentPage(question_answer){
    $('#question_answer_data').empty('');
	var pr = "?cat_id={{$products->category_id}}";
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{url('ajax/get-faq')}}"+pr+"",
        type: 'POST',
        cache: true,
		data:{
			question_answer:question_answer
		},
		beforeSend: function(xhr){
			$('#question_answer_data').html('<div class="rowstyle shadow mb-5"><img src="{{asset('web/images/fancybox/fancybox_loading.gif')}}"></div>');
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
        }
    });
}
function DataNotFound(){
    $('#question_answer_data').html('<div class="rowstyle shadow mb-5"><div class="row text-center"><h3>&#128557; Sorry, no results found!</h3></div></div>');
}
function PageData(datas){
    var html='';
    for (var i=0; i < datas.length; i++) {
	html += `<div class="faq-cntr">
				<div class="row">
					<div class="col-sm-1">
						<h4 class="h4faqs lbl">Question:</h4>
					</div>
					<div class="col-sm-11">
						<h4 class="h4faqs">`+datas[i].title+`</h4>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-1">
						<h4 class="h4faqs lbl">Answer:</h4>
					</div>
					<div class="col-sm-11">
						<p class="lead-faq">`+datas[i].text+`</p>
					</div>
				</div>
			</div>`;
	}
	$('#question_answer_data').html(html);
}
</script>
<script>
$('[data-fancybox="gallery"]').fancybox({
    backFocus: false,
    protect: true
});
$(".small-slider").slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    asNavFor: '.slider-product',
    infinite: false,
    dots: false,
    arrows: false,
    focusOnSelect: true,
    centerMode: true,
    draggable: false,
    speed: 500,
});
$(".slider-product").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.small-slider',
    infinite: false,
    dots: false,
    arrows: true,
    focusOnSelect: true,
    draggable: false,
    speed: 200,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                infinite: false,

            }
        },
        {
            breakpoint: 600,
            settings: {
                // arrows: false,
                draggable: true,
            }
        },
        {
            breakpoint: 480,
            settings: {
                // arrows: false,
            }
        }
    ]


});
$(function () {
    $(".expand").on("click", function () {
        $(this).next().slideToggle(200);
        $expand = $(this).find(".right-arrow");
        if ($expand.html() == '<i class=' + '"fa fa-angle-down"' + '></i>') {
            $expand.html('<i class=' + '"fa fa-angle-up"' + '></i>');
        } else {
            $expand.html('<i class=' + '"fa fa-angle-down"' + '></i>');
        }
    });
});
</script>
@endpush
@endsection('content')