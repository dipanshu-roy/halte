<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	@if(!empty($selected_subcategories))
		<title>{{$selected_subcategories->page_title}}</title>
		<meta name="description" content="{{$selected_subcategories->page_description}}">
		<meta name="keywords" content="{{$selected_subcategories->page_keywords}}">
	@elseif(!empty($get_selected_brand))
		<title>{{$get_selected_brand->barnd_name}}</title>
		<meta name="description" content="{{$get_selected_brand->barnd_name}}">
		<meta name="keywords" content="{{$get_selected_brand->barnd_name}}">
	@else
		<title>{{config('app.name')}}</title>
		<meta name="description" content="{{config('app.name')}}">
		<meta name="keywords" content="{{config('app.name')}}">
	@endif
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
	<link href="{{asset('web/css/jquery.fancybox.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('web/css/main-styles.css?x')}}" rel="stylesheet">
	<link href="{{asset('web/css/responsive.css?=1')}}" rel="stylesheet">
	
</head>

<body class="homepage">
	@include('layouts.web.sidebar')
	<div class="clearfix"></div>
    @yield('content')
    <section id="btmftr" class="ftrsn">
		<div class="container-fluid xl:w-auto bgftr">

			<div class="clm3">
				<h3 class="h3ftr">EXPLORE OUR RANGE <span class="hr"></span></h3>
				<ul class="lsftrln mrb0-sm">
				@php $sub_categories = DB::select("SELECT a.category_slug,b.subcategory_name,b.subcategory_slug,b.banner_image FROM `product_categories` as a INNER JOIN product_sub_categories as b on a.id=b.category_id"); @endphp
					@if(!empty($sub_categories)) @foreach($sub_categories as $subcat)
						<li><a href="{{url('ct/'.$subcat->category_slug.'/'.$subcat->subcategory_slug)}}">{{$subcat->subcategory_name}}</a></li>
					@endforeach @endif
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
					@php $pages = App\Models\PageContent::select('page','page_name')->get();@endphp
					@if(!empty($pages)) @foreach($pages as $page)
						<li><a href="{{url($page->page_name)}}">{{$page->page}}</a></li>
					@endforeach @endif
					<li><a href="{{url('news-and-media')}}">News And Media</a></li>
					<li><a href="{{url('blogs')}}">Blogs</a></li>
					<li><a href="{{url('support')}}">Support</a></li>
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
	<div id="loader"></div>
	<script src="{{asset('web/js/jquery.js')}}"></script>
	<script src="{{asset('web/js/jquery-1.11.0.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('web/js/jquery-migrate-1.2.1.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('web/slick/slick.min.js')}}" type="text/javascript"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script src="{{asset('web/js/jquery.fancybox.min.js')}}"></script>

	<script src="{{asset('web/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('web/js/jquery.prettyPhoto.js')}}"></script>
	<script src="{{asset('web/js/jquery.smartmenus.js')}}"></script>
	<script src="{{asset('web/addons/bootstrap/jquery.smartmenus.bootstrap.min.js')}}"></script>
	<script src="{{asset('web/js/wow.min.js')}}"></script>
	<script src="{{asset('web/js/jquery.bslt.min.js')}}"></script>
	<script src="{{asset('web/js/main.js')}}"></script>
	<script src="{{asset('admin/js/plugins/sweetalert2.js')}}"></script>
	@if(!empty(session('success')))
    <script type="text/javascript">
        Swal.fire('Success','{{session('success')}}','success');
    </script>
    @endif
    @if(!empty(session('error')))
    <script type="text/javascript">
       Swal.fire('Failed','{{session('error')}}','error');
    </script>
    @endif
	@stack('script')
	<script>
		// $(window).on('load', function () {
		// 	$('#offers-pp').fancybox({
		// 		width: '40%',
		// 		height: '40%',
		// 		autoScale: true,
		// 		autoScale: true,
		// 		transitionIn: 'fade',
		// 		transitionOut: 'fade',
		// 		smallBtn: true,
		// 	}).delay(5000).queue(function () { $(this).trigger('click'); })
		// });
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
			$('.prod-subcat-sldr').slick({
				slidesToScroll: 1,
				variableWidth: true,
				infinite: false,
				variableHeight: true,
				arrows: true,
				dots: false,
				fade: false,
				centerPadding: '0px',
				swipeToSlide: true,
				outerEdgeLimit: true,
				responsive: [
					{
						breakpoint: 1024,
						settings: {

						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 5,
							slidesToScroll: 1,
						}
					},
					{
						breakpoint: 480,
						settings: {

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
		$(".checkbox-menu").on("change", "input[type='checkbox']", function () {
			$(this).closest("li").toggleClass("active", this.checked);
		});

		$(document).on('click', '.allow-focus', function (e) {
			e.stopPropagation();
		});
	</script>
	<script>
		$(".dropdown-toggle").click(function() {
			if($(this).hasClass('collapsed')){
				$(this).find(".fa").removeClass('fa-caret-right').addClass('fa-caret-down');
			}else{
				$(this).find(".fa").removeClass('fa-caret-down').addClass('fa-caret-right');
			}
		});
	</script>
</body>
</html>