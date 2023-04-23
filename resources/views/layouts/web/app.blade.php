<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{config('app.name')}}</title>
    <meta name="description" content="">
	<meta name="keywords" content="">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('admin/img/favicon.png')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link href="{{asset('web/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('web/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('web/css/animate.min.css')}}" rel="stylesheet">
	<link href="{{asset('web/css/prettyPhoto.css')}}" rel="stylesheet">
	<link href="{{asset('web/addons/bootstrap/jquery.smartmenus.bootstrap.css')}}" rel="stylesheet">
	<link href="{{asset('web/css/sm-blue.css')}}" rel="stylesheet">
	<link href="{{asset('web/css/jquery.bslt.css')}}" rel="stylesheet">

	<link href="{{asset('web/slick/slick.css')}}" rel="stylesheet">
	<link href="{{asset('web/slick/slick-theme.css')}}" rel="stylesheet">

	<link href="{{asset('web/css/main-styles.css')}}" rel="stylesheet">
	<link href="{{asset('web/css/responsive.css')}}" rel="stylesheet">
</head>

<body class="homepage">
	<header id="header" class="hder gnhl">
		<div class="container-fluid xl:w-auto">
			<div class="navbar navbar-default" role="navigation" id="nav">
				<div class="container plr0md fw xs-plr60">
					<div class="col-sm-12 plr0md">
						<div class="cntr-nv">

							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
									data-target=".navbar-collapse">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="sr-only">Toggle navigation</span>
								</button>
								<div class="logo"><a href="{{url('/')}}"><img src="{{asset('web/images/logo.png')}}" alt="{{config('app.name')}}"></a></div>
							</div>

							<div class="navbar-collapse collapse navbar-ex1-collapse">

								<!-- search for mobile -->
								<div class="mb-search">
									<div class="cntr-search">
										<form action="#" method="post" class="search-ds">
											<div class="input-group">
												<input type="text" class="form-control" placeholder="SEARCH PRODUCTS">
												<div class="input-group-btn">
													<button class="btn btn-search">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
															class="w-6 h-6 fill-current">
															<path d="M0 0h24v24H0V0z" fill="none"></path>
															<path
																d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z">
															</path>
														</svg>
													</button>
												</div>
											</div>
										</form>
									</div>
									<div class="cntr-ac">
										<a href="login.html" class="btn btn-ac">ACCOUNT</a>
									</div>
								</div>
								<ul class="nav navbar-nav">
									<li>
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">MENU <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a href="product-list.html">Products </a></li>
											<li><a href="service-spares.html">Service &amp; Spares</a></li>
											<li><a href="demo-installation.html">Demo</a></li>
											<li><a href="demo-installation.html">Installation </a></li>
											<li><a href="contact-us.html">Contact Us</a></li>
											<li><a href="offers.html">View All Offers</a></li>
										</ul>
									</li>
									<li>
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">PRODUCTS <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li>
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">EXPLORE OUR
													RANGE <span class="caret"></span></a>
												<ul class="dropdown-menu">
													<li><a href="product-list.html">Brush Cutter</a></li>
													<li><a href="product-list.html">Chainsaw</a></li>
													<li><a href="product-list.html">Hedge Trimmer</a></li>
													<li><a href="product-list.html">Leaf Blower</a></li>
													<li><a href="product-list.html">Lawn &amp; Garden</a></li>
													<li><a href="product-list.html">Lawn Mowers</a></li>
													<li><a href="product-list.html">Barbecue</a></li>
													<li><a href="product-list.html">Firepits</a></li>
													<li><a href="product-list.html">Gensets</a></li>
													<li><a href="product-list.html">Snowchains</a></li>
													<li><a href="product-list.html">Tillers</a></li>
													<li><a href="product-list.html">Glues</a></li>
													<li><a href="product-list.html">Tapes</a></li>
													<li><a href="product-list.html">Adhesives</a></li>
													<li><a href="product-list.html">DIY</a></li>
													<li><a href="product-list.html">Fogging Machine</a></li>
												</ul>
											</li>
											<li>
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">EXPLORE BY BRAND <span class="caret"></span></a>
												<ul class="dropdown-menu">
													@if(!empty($get_brand))
														@foreach($get_brand as $brand)
														<li><a href="{{url('brand/'.$brand->barnd_slug)}}">{{$brand->barnd_name}}</a></li>
														@endforeach
													@endif
												</ul>
											</li>
										</ul>
									</li>
									<li><a href="service-spares.html">SERVICE &AMP; SPARES</a></li>
								</ul>
							</div>

						</div>

						<!-- search for desktop -->
						<div class="cntr-search">
							<form action="#" method="post" class="search-ds">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="SEARCH PRODUCTS">
									<div class="input-group-btn">
										<button class="btn btn-search">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
												class="w-6 h-6 fill-current">
												<path d="M0 0h24v24H0V0z" fill="none"></path>
												<path
													d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z">
												</path>
											</svg>
										</button>
									</div>
								</div>
							</form>
						</div>
						<div class="cntr-ac">
							<a href="login.html" class="btn btn-ac">ACCOUNT</a>
						</div>
						<!-- // -->

						<!-- cart -->
						<a href="cart.html" class="btn btn-cart">
							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
								xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="59.333px"
								height="53.667px" viewBox="0 0 59.333 53.667" enable-background="new 0 0 59.333 53.667"
								xml:space="preserve">
								<path fill="none" stroke="#000000" stroke-width="3.43" stroke-linecap="round"
									stroke-linejoin="round" stroke-miterlimit="10" d="
		M50.667,41.167h-28L8.334,1.5H1.667 M20.334,32.833h31.333L57.834,9.5H12.501 M28.438,44.792c-2.036,0-3.688,1.651-3.688,3.688
		s1.651,3.688,3.688,3.688s3.688-1.651,3.688-3.688S30.474,44.792,28.438,44.792z M44.845,44.792c-2.036,0-3.688,1.651-3.688,3.688
		s1.651,3.688,3.688,3.688s3.688-1.651,3.688-3.688S46.881,44.792,44.845,44.792z" />
							</svg>
						</a>
						<!-- /cart -->

					</div>

				</div>

				<!-- mobile search 2 -->
				<div class="mb-search search-mb2">
					<div class="cntr-search">
						<form action="#" method="post" class="search-ds">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="SEARCH PRODUCTS">
								<div class="input-group-btn">
									<button class="btn btn-search">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
											class="w-6 h-6 fill-current">
											<path d="M0 0h24v24H0V0z" fill="none"></path>
											<path
												d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z">
											</path>
										</svg>
									</button>
								</div>
							</div>
						</form>
					</div>
					<!--  -->
				</div>

			</div>
	</header>
	<div class="clearfix"></div>
    @yield('content')
    <section id="btmftr" class="ftrsn">
		<div class="container-fluid xl:w-auto bgftr">

			<div class="clm3">
				<h3 class="h3ftr">EXPLORE OUR RANGE <span class="hr"></span></h3>
				<ul class="lsftrln mrb0-sm">
					<li><a href="product-list.html">Brush Cutter</a></li>
					<li><a href="product-list.html">Chainsaw</a></li>
					<li><a href="product-list.html">Hedge Trimmer</a></li>
					<li><a href="product-list.html">Leaf Blower</a></li>
					<li><a href="product-list.html">Lawn &amp; Garden</a></li>
					<li><a href="product-list.html">Lawn Mowers</a></li>
					<li><a href="product-list.html">Barbecue</a></li>
					<li><a href="product-list.html">Firepits</a></li>
				</ul>
			</div>
			<div class="clm3">
				<h3 class="h3ftr hnmb">&nbsp;</h3>
				<ul class="lsftrln">
					<li><a href="product-list.html">Gensets</a></li>
					<li><a href="product-list.html">Snowchains</a></li>
					<li><a href="product-list.html">Tillers</a></li>
					<li><a href="product-list.html">Glues</a></li>
					<li><a href="product-list.html">Tapes</a></li>
					<li><a href="product-list.html">Adhesives</a></li>
					<li><a href="product-list.html">DIY</a></li>
					<li><a href="product-list.html">Fogging Machine</a></li>
				</ul>
			</div>
			<div class="clm3">
				<h3 class="h3ftr">Useful Links <span class="hr"></span></h3>
				<ul class="lsftrln">
					<li><a href="about.html">About Us</a></li>
					<li><a href="contact-us.html">Contact Us</a></li>
					<li><a href="become-a-dealer.html">Become A Dealer</a></li>
					<li><a href="news-media.html">News &amp; Media</a></li>
					<li><a href="offers.html">Offers</a></li>
					<li><a href="terms-conditions.html">Terms &amp; Conditions</a></li>
					<li><a href="service-spares.html">Spares &amp; Service</a></li>
					<li><a href="blog.html">Blog</a></li>
					<li><a href="demo-installation.html">Demo &amp; Installation</a></li>
					<li><a href="support.html">Support</a></li>
				</ul>
			</div>
			<div class="clm3">
				<h3 class="h3ftrcnt">
					<span>Need Help?</span><br>
					Ask our Expert <span class="hr"></span>
				</h3>
				<form action="#" method="post" class="form-dk">
					<div class="form-group">
						<input type="text" class="form-control" name="nameft" id="nameft" placeholder="Name">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="mobileft" id="mobileft" placeholder="Mobile">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="emailft" id="emailft" placeholder="Email">
					</div>
					<div class="form-group">
						<button class="btn btnfrmft">SUBMIT</button>
					</div>
				</form>
			</div>

			<div class="clearfix"></div>
			<div class="cprtcntr">
				<div class="clm6">
					<p class="cprt">&copy; 2023 HALTE. All Rights Reserved.</p>
					<p class="cprtam">Designed by AMS Informatics</p>
				</div>
				<div class="clm6">
					<ul class="social-ft">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<a id="offers-pp" href="#offers" class="hn"></a>
	<div id="offers" class="pp-ups">
		<div class="hn">
			<h3 class="pp-ups-tl txa_l"></h3>
			<hr class="hrgrey">
			<p class="rev-form-tl"></p>
		</div>
		<img src="{{asset('web/images/offer-festive.jpg')}}" alt="" class="img-responsive">
	</div>



	<a href="#0" class="cd-top">Back To Top</a>
	<a href="https://api.whatsapp.com/send?phone=919914130130&text=I%20am%20interested" class="wa"></a>
	<script src="{{asset('web/js/jquery.js')}}"></script>
	<script type="text/javascript" src="{{asset('web/js/jquery-1.11.0.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('web/js/jquery-migrate-1.2.1.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('web/slick/slick.min.js')}}"></script>
	<link href="{{asset('web/css/jquery.fancybox.min.css')}}" rel="stylesheet" type="text/css">
	<script src="{{asset('web/js/jquery.fancybox.min.js')}}"></script>

	<script>
		$(window).on('load', function () {
			$('#offers-pp').fancybox({
				width: '40%',
				height: '40%',
				autoScale: true,
				autoScale: true,
				transitionIn: 'fade',
				transitionOut: 'fade',
				smallBtn: true,
			}).delay(5000).queue(function () { $(this).trigger('click'); })
		});
		$(document).ready(function () {
			$('.list-sldr').slick({
				slidesToScroll: 1,
				variableWidth: true,
				infinite: false,
				arrows: true,
				dots: false,
				draggable: false,
				fade: false,
				outerEdgeLimit: true,
				centerPadding: '0px',
				swipeToSlide: true,

			});
			$('.sldr1').slick({
				slidesToShow: 4,
				slidesToScroll: 4,
				adaptiveHeight: true,
				arrows: false,
				responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 3,
							infinite: true,
							arrows: false,
							dots: true
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 2,
							arrows: false,
							dots: true
						}
					},
					{
						breakpoint: 480,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
							arrows: false,
							dots: true
						}
					}
				]
			});
			$('.prodhmsldr').slick({
				slidesToShow: 6,
				slidesToScroll: 6,
				arrows: true,
				adaptiveHeight: true,
				infinite: false,
				responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1,
							infinite: false,
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1,
							centerMode: true,
							variableWidth: true
						}
					},
					{
						breakpoint: 480,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1,
							variableWidth: true,
						}
					}
				]
			});
			$('.ofr-sldr').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
				autoplay: true,
				autoplaySpeed: 4000,
				adaptiveHeight: true,
				dots: true,
				responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
						}
					},
					{
						breakpoint: 480,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
						}
					}
				]
			});
		});
	</script>
	<script src="{{asset('web/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('web/js/jquery.prettyPhoto.js')}}"></script>
	<script src="{{asset('web/js/jquery.smartmenus.js')}}"></script>
	<script src="{{asset('web/addons/bootstrap/jquery.smartmenus.bootstrap.min.js')}}"></script>
	<script src="{{asset('web/js/wow.min.js')}}"></script>
	<script src="{{asset('web/js/jquery.bslt.min.js')}}"></script>
	<script src="{{asset('web/js/main.js')}}"></script>
</body>
</html>