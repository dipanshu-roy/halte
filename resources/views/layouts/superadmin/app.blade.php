<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{config('app.name')}}</title>
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('admin/img/favicon.png')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link href="{{asset('admin/css/material-dashboard.css?v=2.1.1')}}" rel="stylesheet" />
    <link href="{{asset('admin/demo/demo.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/css/style-main.css')}}" rel="stylesheet" />
    <style>
    .analysis .card {
        margin-top: 0;
        margin-bottom: 15px;
    }
    .analysis .card-body {
        font-weight: bold;
        background: #007BFF;
        color: #fff;
        border-radius: 6px;
        box-shadow: inset 0px -4px 0 rgba(0, 0, 0, .2);
    }
    .analysis .total_questions {
        background: #09A6FF;
    }
    .analysis .unattempted {
        background: #F2BD4A;
    }
    .analysis .correct {
        background: #7ED957;
    }
    .analysis .partial {
        background: #FF4500;
    }
    .analysis .incorrect {
        background: #DE0F3F;
    }
    </style>
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('admin/img/sidebar-1.jpg')}}">
            <div class="logo">
                <a href="{{route('home')}}" class="simple-text logo-normal">
                    <img src="{{asset('admin/img/logo2.png')}}" alt="">
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('home')}}">
                            <i class="material-icons"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#programs">
                            <i class="material-icons"></i>
                            <p> Products
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="programs">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('admin/product/add-brand')}}">
                                        <span class="sidebar-mini"> </span>
                                        <span class="sidebar-normal">Add Brands</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('admin/product/add-product-category')}}">
                                        <span class="sidebar-mini"> </span>
                                        <span class="sidebar-normal">Add Main Category</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('admin/product/add-product-sub-category')}}">
                                        <span class="sidebar-mini"> </span>
                                        <span class="sidebar-normal">Add Sub Category</span>
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('admin/product/add-product')}}">
                                        <span class="sidebar-mini"> </span>
                                        <span class="sidebar-normal">Add New Product</span>
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('admin/product/view-product')}}">
                                        <span class="sidebar-mini"> </span>
                                        <span class="sidebar-normal">View Products</span>
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('admin/add-better-together-product')}}">
                                        <span class="sidebar-mini"> </span>
                                        <span class="sidebar-normal">Add Better Together</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#orders">
                            <i class="material-icons"></i>
                            <p> Orders
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="orders">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('admin/view-order')}}">
                                        <span class="sidebar-mini"> </span>
                                        <span class="sidebar-normal">View Order</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('admin/order-reports')}}">
                                        <span class="sidebar-mini"> </span>
                                        <span class="sidebar-normal">Order Reports</span>
                                    </a>
                                </li>


                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin/users-customers')}}">
                            <i class="material-icons"></i>
                            <p>Users/Customers</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin/tickets')}}">
                            <i class="material-icons"></i>
                            <p>Tickets</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin/reviews')}}">
                            <i class="material-icons"></i>
                            <p>Reviews</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin/add-offers')}}">
                            <i class="material-icons"></i>
                            <p>Offers</p>
                        </a>
                    </li>


                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#pages">
                            <i class="material-icons"></i>
                            <p> Manage Pages
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="pages">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('admin/home-page') }}">
                                        <span class="sidebar-mini"> </span>
                                        <span class="sidebar-normal">Home Page</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('admin/about-us') }}">
                                        <span class="sidebar-mini"> </span>
                                        <span class="sidebar-normal">About Us</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('admin/contact-us') }}">
                                        <span class="sidebar-mini"> </span>
                                        <span class="sidebar-normal">Contact Us</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('admin/become-dealer') }}">
                                        <span class="sidebar-mini"> </span>
                                        <span class="sidebar-normal">Become A Dealer</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('admin/news-media') }}">
                                        <span class="sidebar-mini"> </span>
                                        <span class="sidebar-normal">News &amp; Media</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('admin/offers') }}">
                                        <span class="sidebar-mini"> </span>
                                        <span class="sidebar-normal">Offers</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('admin/terms-and-condition') }}">
                                        <span class="sidebar-mini"> </span>
                                        <span class="sidebar-normal">Terms &amp; Conditions</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('admin/spares-and-services') }}">
                                        <span class="sidebar-mini"> </span>
                                        <span class="sidebar-normal">Spares &amp; Service</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('admin/blog') }}">
                                        <span class="sidebar-mini"> </span>
                                        <span class="sidebar-normal">Blog</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('admin/demo-and-installation') }}">
                                        <span class="sidebar-mini"> </span>
                                        <span class="sidebar-normal">Demo &amp; Installation</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('admin/faq') }}">
                                        <span class="sidebar-mini"> </span>
                                        <span class="sidebar-normal">FAQs</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('admin/support') }}">
                                        <span class="sidebar-mini"> </span>
                                        <span class="sidebar-normal">Support</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/contact-query') }}">
                            <i class="material-icons"></i>
                            <p>Contact Form Queries</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/dealer-query') }}">
                            <i class="material-icons"></i>
                            <p>Dealer Form Queries</p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" {{(request()->is('admin/add-staff'))?'active':''}}
                            href="{{url('admin/add-staff')}}">
                            <i class="material-icons"></i>
                            <p>Add Staff</p>
                        </a>
                    </li>



                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="#pablo"></a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('home')}}">
                                    <i class="material-icons">dashboard</i>
                                    <p class="d-lg-none d-md-block">
                                        Stats
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">person</i>
                                    <p class="d-lg-none d-md-block">
                                        Account
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <a class="dropdown-item" href="{{route('logout')}}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log
                                        out</a>
                                    <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            @yield('content')
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{asset('admin/js/core/jquery.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
    
    
   
    <script src="{{asset('admin/js/core/popper.min.js')}}"></script>
    <script src="{{asset('admin/js/core/bootstrap-material-design.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
    <!-- Plugin for the momentJs  -->
    <script src="{{asset('admin/js/plugins/moment.min.js')}}"></script>
    <!--  Plugin for Sweet Alert -->
    <script src="{{asset('admin/js/plugins/sweetalert2.js')}}"></script>
    <!-- Forms Validations Plugin -->
    <!-- <script src="{{asset('admin/js/plugins/jquery.validate.min.js')}}"></script> -->
    <script src="{{asset('admin/js/plugins/jquery.bootstrap-wizard.js')}}"></script>
    <script src="{{asset('admin/js/plugins/bootstrap-selectpicker.js')}}"></script>
    <script src="{{asset('admin/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
    
    <script src="{{asset('admin/js/plugins/bootstrap-tagsinput.js')}}"></script>
    <script src="{{asset('admin/js/plugins/jasny-bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/jquery-jvectormap.js')}}"></script>
    <script src="{{asset('admin/js/plugins/nouislider.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <script src="{{asset('admin/js/plugins/arrive.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/bootstrap-notify.js')}}"></script>
    <script src="{{asset('admin/js/material-dashboard.js?v=2.1.1')}}" type="text/javascript"></script>
    <script src="{{asset('admin/demo/demo.js')}}"></script>
    <script type="text/javascript">
      $(document).ready(function () {
          $('#example').DataTable();
      });
    </script>
    </script>
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
    $(document).ready(function() {
        $().ready(function() {
            $sidebar = $('.sidebar');

            $sidebar_img_container = $sidebar.find('.sidebar-background');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');

            window_width = $(window).width();

            fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

            if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                    $('.fixed-plugin .dropdown').addClass('open');
                }

            }

            $('.fixed-plugin a').click(function(event) {
                // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .active-color span').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-color', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-color', new_color);
                }
            });

            $('.fixed-plugin .background-color .badge').click(function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('background-color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-background-color', new_color);
                }
            });

            $('.fixed-plugin .img-holder').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).parent('li').siblings().removeClass('active');
                $(this).parent('li').addClass('active');


                var new_image = $(this).find("img").attr('src');

                if ($sidebar_img_container.length != 0 && $(
                        '.switch-sidebar-image input:checked').length != 0) {
                    $sidebar_img_container.fadeOut('fast', function() {
                        $sidebar_img_container.css('background-image', 'url("' +
                            new_image + '")');
                        $sidebar_img_container.fadeIn('fast');
                    });
                }

                if ($full_page_background.length != 0 && $(
                        '.switch-sidebar-image input:checked').length != 0) {
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find(
                        'img').data('src');

                    $full_page_background.fadeOut('fast', function() {
                        $full_page_background.css('background-image', 'url("' +
                            new_image_full_page + '")');
                        $full_page_background.fadeIn('fast');
                    });
                }

                if ($('.switch-sidebar-image input:checked').length == 0) {
                    var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr(
                        'src');
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find(
                        'img').data('src');

                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $full_page_background.css('background-image', 'url("' +
                        new_image_full_page + '")');
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                }
            });

            $('.switch-sidebar-image input').change(function() {
                $full_page_background = $('.full-page-background');

                $input = $(this);

                if ($input.is(':checked')) {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar_img_container.fadeIn('fast');
                        $sidebar.attr('data-image', '#');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page_background.fadeIn('fast');
                        $full_page.attr('data-image', '#');
                    }

                    background_image = true;
                } else {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar.removeAttr('data-image');
                        $sidebar_img_container.fadeOut('fast');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page.removeAttr('data-image', '#');
                        $full_page_background.fadeOut('fast');
                    }

                    background_image = false;
                }
            });

            $('.switch-sidebar-mini input').change(function() {
                $body = $('body');

                $input = $(this);

                if (md.misc.sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    md.misc.sidebar_mini_active = false;

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                } else {

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                    setTimeout(function() {
                        $('body').addClass('sidebar-mini');

                        md.misc.sidebar_mini_active = true;
                    }, 300);
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function() {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function() {
                    clearInterval(simulateWindowResize);
                }, 1000);

            });
        });
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
        // initialise Datetimepicker and Sliders
        md.initFormExtendedDatetimepickers();
        if ($('.slider').length != 0) {
            md.initSliders();
        }
    });
    </script>
    
    
</body>

</html>