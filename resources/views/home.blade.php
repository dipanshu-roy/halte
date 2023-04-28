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
                    <video playsinline="" autoplay="" muted="" loop=""
                        class="absolute top-0 left-0 w-full h-full object-cover object-center">
                        <source src="{{asset('web/images/home-video.mp4')}}" type="video/mp4">
                    </video>
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
				<p class="ldhmprd">Best range of quality tools available for forestry,
					landscaping and gardening professionals. </p>
			</div>

		</div>
		<div class="container-fluid xl:w-auto">
			<div class="sldr1">
				<div class="imcnt">
					<div class="bgovl"><img src="{{asset('web/images/vsn-1.jpg')}}" alt=""></div>
					<h1 class="h1slktl">Vision &amp; Innovation</h1>
					<a href="vision-innovation.html" class="btn btn-sld btn-pri1-wt">DISCOVER MORE</a>
				</div>
				<div class="imcnt">
					<div class="bgovl"><img src="{{asset('web/images/vsn-2.jpg')}}" alt=""></div>
					<h1 class="h1slktl">The Halte Way</h1>
					<a href="halte-way.html" class="btn btn-sld btn-pri1-wt">DISCOVER MORE</a>
				</div>
				<div class="imcnt">
					<div class="bgovl"><img src="{{asset('web/images/vsn-3.jpg')}}" alt=""></div>
					<h1 class="h1slktl">Smart Living</h1>
					<a href="smart-living.html" class="btn btn-sld btn-pri1-wt">DISCOVER MORE</a>
				</div>
				<div class="imcnt">
					<div class="bgovl"><img src="{{asset('web/images/vsn-4.jpg')}}" alt=""></div>
					<h1 class="h1slktl">In focus</h1>
					<a href="in-focus.html" class="btn btn-sld btn-pri1-wt">DISCOVER MORE</a>
				</div>

			</div>
		</div>
	</section>
	<div class="clearfix"></div>
	<section id="snbrnd" class="hmbrnds">
		<div class="container">
			<div class="clm12">
				<h3 class="h3brndtl">OUR BRANDS</h3>
				<p class="ldbrnd">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
					incididunt ut labore et dolore magna aliqua. Ut <br class="mbhn">enim ad minim veniam, quis nostrud
					exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute<br class="mbhn">
					irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
			</div>
		</div>
		<div class="container-fluid xl:w-auto">
			<div class="snbrnd-sb">
				<div class="rw">
					<div class="col-sm-12 brndclr1">
						<div class="clm6 pdlr0">
							<div class="imcntr">
								<img src="{{asset('web/images/brand-bkr.jpg')}}" alt="">
							</div>
						</div>
						<div class="clm6 pdlr0">
							<div class="brndtx">
								<div class="rw">
									<div class="clm12 brnd-logct">
										<img src="{{asset('web/images/bkr-logo.png')}}" alt="">
									</div>
									<div class="clm4">
										<img src="{{asset('web/images/bkr-product-hm1.jpg')}}" alt="" class="brnd-prodhm">
										<img src="{{asset('web/images/bkr-product-hm2.jpg')}}" alt="" class="brnd-prodhm">
									</div>
									<div class="clm8">
										<h3 class="brand-tg">Equipments with industrial quality</h3>
										<p class="brand-ld">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
											sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
											ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
											ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
											velit esse cillum dolore eu fugiat</p>
										<a class="btn btn-brndhm" href="product-list.html">View Products <i
												class="fa fa-angle-right"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="snbrnd-sb">
				<div class="rw">
					<div class="col-sm-12 brndclr2">
						<div class="clm6 plrt pdlr0">
							<div class="imcntr">
								<img src="{{asset('web/images/brand-gardena.jpg')}}" alt="">
							</div>
						</div>
						<div class="clm6 pdlr0">
							<div class="brndtx">
								<div class="rw">
									<div class="clm12 brnd-logct txa_r">
										<img src="{{asset('web/images/gardena-logo.png')}}" alt="">
									</div>
									<div class="clm4 plrt">
										<img src="{{asset('web/images/gardena-product-hm1.jpg')}}" alt="" class="brnd-prodhm">
										<img src="{{asset('web/images/gardena-product-hm2.jpg')}}" alt="" class="brnd-prodhm">
									</div>
									<div class="clm8">
										<h3 class="brand-tg">Equipments with industrial quality</h3>
										<p class="brand-ld">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
											sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
											ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
											ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
											velit esse cillum dolore eu fugiat</p>
										<a class="btn btn-brndhm" href="product-list.html">View Products <i
												class="fa fa-angle-right"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="snbrnd-sb">
				<div class="rw">
					<div class="clm12 brndclr1">
						<div class="clm6 pdlr0">
							<div class="imcntr">
								<img src="{{asset('web/images/brand-gorilla.jpg')}}" alt="">
							</div>
						</div>
						<div class="clm6 pdlr0">
							<div class="brndtx">
								<div class="rw">
									<div class="clm12 brnd-logct">
										<img src="{{asset('web/images/gorilla-logo.png')}}" alt="">
									</div>
									<div class="clm4">
										<img src="{{asset('web/images/gorilla-product-hm1.jpg')}}" alt="" class="brnd-prodhm">
										<img src="{{asset('web/images/gorilla-product-hm2.jpg')}}" alt="" class="brnd-prodhm">
									</div>
									<div class="clm8">
										<h3 class="brand-tg">Equipments with industrial quality</h3>
										<p class="brand-ld">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
											sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
											ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
											ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
											velit esse cillum dolore eu fugiat</p>
										<a class="btn btn-brndhm" href="product-list.html">View Products <i
												class="fa fa-angle-right"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>
	<div class="clearfix"></div>
	<section id="snhstn" class="hmstn1">
		<div class="container-fluid xl:w-auto">
			<div class="clm6 pdlr0">
				<div class="imstnb smht">
					<img src="{{asset('web/images/about-sustainable.jpg')}}" alt="">
				</div>
			</div>
			<div class="clm6 pdlr1">
				<div class="stncntr smht">
					<h2 class="stntl">THE FUTURE IS <br class="mbhn">
						SUSTAINABLE</h2>
					<p class="ldstnbl">For over 35 years weve provided specialist service and the best range of quality
						tools available for forestry, landscaping and gardening professionals. All our tools
						manufacturered with the highest grade steel and handle materials. Crafted with an uncompromised
						passion to create the finest possible tools for your garden, you can be assured that Jagan
						garden tools are built to a high standard, not to a low price. In today's age of disposable
						products, its nice to know you can...</p>
					<p class="txa_c"><a href="the-future.html" class="btn btn-pri1">DISCOVER MORE</a></p>
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
					<!-- <h2 class="h2tlprod">Best Sellers</h2> -->
					<h2 class="h2tlprod2">Products We Think <span>You'll Like</span></h2>



					<div class="col-sm-12">
						<div class="prod-cat-slider">
							<ul class="list-sldr">
								<li class="active"><a href="#">Top Picks</a></li>
								<li><a href="#">Deals Of The Day</a></li>
								<li><a href="#">Bestsellers</a></li>
								<li><a href="#">Agriculture</a></li>
								<li><a href="#">Lawn &amp; Garden</a></li>
								<li><a href="#">Travel</a></li>
								<li><a href="#">Engineering</a></li>
								<li><a href="#">BKR Products</a></li>
								<li><a href="#">Gardena Products</a></li>
								<li><a href="#">Gorilla Products</a></li>

								<li><a href="#">Deals Of The Day</a></li>
								<li><a href="#">Bestsellers</a></li>
								<li><a href="#">Agriculture</a></li>
								<li><a href="#">Lawn &amp; Garden</a></li>
								<li><a href="#">Travel</a></li>
								<li><a href="#">Engineering</a></li>
								<li><a href="#">BKR Products</a></li>
								<li><a href="#">Gardena Products</a></li>
								<li><a href="#">Gorilla Products</a></li>

							</ul>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="prodhmsldr">
						<div class="prd-cntr">
							<a href="product-page.html">
								<div class="pro-im">
									<img src="{{asset('web/images/product-hm1.jpg')}}" class="">
								</div>
								<div class="prod-card-price">
									<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
									<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span> Save
										28%</div>
								</div>

								<div class="prod-card-rating">
									<div class="Stars" style="--rating: 4.2;" aria-label=""></div>
									<span class="nb-rw">856</span>
								</div>

								<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches With
									1200 Watt</h3>
							</a>
							<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
						</div>

						<div class="prd-cntr">
							<a href="product-page.html">
								<div class="pro-im">
									<img src="{{asset('web/images/product-hm2.jpg')}}" class="">
								</div>
								<div class="prod-card-price">
									<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
									<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span> Save
										28%</div>
								</div>

								<div class="prod-card-rating">
									<div class="Stars" style="--rating: 4.2;" aria-label=""></div>
									<span class="nb-rw">856</span>
								</div>

								<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches With
									1200 Watt</h3>
							</a>
							<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
						</div>

						<div class="prd-cntr">
							<a href="product-page.html">
								<div class="pro-im">
									<img src="{{asset('web/images/product-hm3.jpg')}}" class="">
								</div>
								<div class="prod-card-price">
									<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
									<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span> Save
										28%</div>
								</div>

								<div class="prod-card-rating">
									<div class="Stars" style="--rating: 4.2;" aria-label=""></div>
									<span class="nb-rw">856</span>
								</div>

								<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches With
									1200 Watt</h3>
							</a>
							<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
						</div>

						<div class="prd-cntr">
							<a href="product-page.html">
								<div class="pro-im">
									<img src="{{asset('web/images/product-hm4.jpg')}}" class="">
								</div>
								<div class="prod-card-price">
									<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
									<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span> Save
										28%</div>
								</div>

								<div class="prod-card-rating">
									<div class="Stars" style="--rating: 0;" aria-label=""></div>
									<span class="nb-rw"></span>
								</div>

								<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches With
									1200 Watt</h3>
							</a>
							<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
						</div>

						<div class="prd-cntr">
							<a href="product-page.html">
								<div class="pro-im">
									<img src="{{asset('web/images/product-hm5.jpg')}}" class="">
								</div>
								<div class="prod-card-price">
									<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
									<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span> Save
										28%</div>
								</div>

								<div class="prod-card-rating">
									<div class="Stars" style="--rating: 4.2;" aria-label=""></div>
									<span class="nb-rw">856</span>
								</div>

								<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches With
									1200 Watt</h3>
							</a>
							<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
						</div>


						<div class="prd-cntr">
							<a href="product-page.html">
								<div class="pro-im">
									<img src="{{asset('web/images/product-hm6.jpg')}}" class="">
								</div>
								<div class="prod-card-price">
									<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
									<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span> Save
										28%</div>
								</div>

								<div class="prod-card-rating">
									<div class="Stars" style="--rating: 4.2;" aria-label=""></div>
									<span class="nb-rw">856</span>
								</div>

								<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches With
									1200 Watt</h3>
							</a>
							<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
						</div>


						<div class="prd-cntr">
							<a href="product-page.html">
								<div class="pro-im">
									<img src="{{asset('web/images/product-hm7.jpg')}}" class="">
								</div>
								<div class="prod-card-price">
									<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
									<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span> Save
										28%</div>
								</div>

								<div class="prod-card-rating">
									<div class="Stars" style="--rating: 4.2;" aria-label=""></div>
									<span class="nb-rw">856</span>
								</div>

								<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches With
									1200 Watt</h3>
							</a>
							<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
						</div>

						<div class="prd-cntr">
							<a href="product-page.html">
								<div class="pro-im">
									<img src="{{asset('web/images/product-hm8.jpg')}}" class="">
								</div>
								<div class="prod-card-price">
									<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
									<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span> Save
										28%</div>
								</div>

								<div class="prod-card-rating">
									<div class="Stars" style="--rating: 4.2;" aria-label=""></div>
									<span class="nb-rw">856</span>
								</div>

								<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches With
									1200 Watt</h3>
							</a>
							<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
						</div>


						<div class="prd-cntr">
							<a href="product-page.html">
								<div class="pro-im">
									<img src="{{asset('web/images/product-hm5.jpg')}}" class="">
								</div>
								<div class="prod-card-price">
									<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
									<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span> Save
										28%</div>
								</div>

								<div class="prod-card-rating">
									<div class="Stars" style="--rating: 4.2;" aria-label=""></div>
									<span class="nb-rw">856</span>
								</div>

								<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches With
									1200 Watt</h3>
							</a>
							<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
						</div>


						<div class="prd-cntr">
							<a href="product-page.html">
								<div class="pro-im">
									<img src="{{asset('web/images/product-hm6.jpg')}}" class="">
								</div>
								<div class="prod-card-price">
									<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
									<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span> Save
										28%</div>
								</div>

								<div class="prod-card-rating">
									<div class="Stars" style="--rating: 4.2;" aria-label=""></div>
									<span class="nb-rw">856</span>
								</div>

								<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches With
									1200 Watt</h3>
							</a>
							<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
						</div>


						<div class="prd-cntr">
							<a href="product-page.html">
								<div class="pro-im">
									<img src="{{asset('web/images/product-hm7.jpg')}}" class="">
								</div>
								<div class="prod-card-price">
									<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
									<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span> Save
										28%</div>
								</div>

								<div class="prod-card-rating">
									<div class="Stars" style="--rating: 4.2;" aria-label=""></div>
									<span class="nb-rw">856</span>
								</div>

								<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches With
									1200 Watt</h3>
							</a>
							<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
						</div>

						<div class="prd-cntr">
							<a href="product-page.html">
								<div class="pro-im">
									<img src="{{asset('web/images/product-hm8.jpg')}}" class="">
								</div>
								<div class="prod-card-price">
									<div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
									<div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span> Save
										28%</div>
								</div>

								<div class="prod-card-rating">
									<div class="Stars" style="--rating: 4.2;" aria-label=""></div>
									<span class="nb-rw">856</span>
								</div>

								<h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches With
									1200 Watt</h3>
							</a>
							<a href="cart.html" class="btn btn-atcr">ADD TO CART</a>
						</div>

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
				<div class="clm4">
					<div class="demo-bx-img">
						<img src="{{asset('web/images/srvs1.jpg')}}" alt="">
						<h3 class="h3srvs">Service &amp; Spares</h3>
					</div>
					<div class="demo-bx">
						<p class="demo-ld">Our spares &amp; support service seamlessly integrates and benefits customers
							who have decided to opt for self-maintain their equipments &amp; tools.</p>
						<a href="service-spares.html" class="btn btn-pri1">DISCOVER MORE</a>
					</div>
				</div>

				<div class="clm4">
					<div class="demo-bx-img">
						<img src="{{asset('web/images/srvs2.jpg')}}" alt="">
						<h3 class="h3srvs">Demo installation</h3>
					</div>
					<div class="demo-bx">
						<p class="demo-ld">Our spares &amp; support service seamlessly integrates and benefits customers
							who have decided to opt for self-maintain their equipments &amp; tools.</p>
						<a href="demo-installation.html" class="btn btn-pri1">DISCOVER MORE</a>
					</div>
				</div>
			</div>
		</div>
	</section>
    <div class="container-fluid xl:w-auto">
		<section id="hmhrtg" class="snhrtg">
			<div class="clm1"></div>
			<div class="clm10 txa_c">
				<h2 class="h2hrtg">OUR HERITAGE</h2>
				<p class="ldhrtg">Since 2014, creating high-quality garden tools with innovative designs
					has been our mission.</p>
				<a href="our-heritage.html" class="btn btn-pri1-wt">DISCOVER MORE</a>
			</div>
		</section>
	</div>
@endsection('content')