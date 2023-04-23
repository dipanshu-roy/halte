<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('builder/assets/fav/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('builder/assets/fav/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('builder/assets/fav/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('builder/assets/fav/site.webmanifest')}}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="{{asset('builder/assets/css/font.css')}}">

    <title>BuilderJS · Home</title>
    <script src="{{asset('builder/assets/js/jquery-3.5.1.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('builder/assets/bootstrap-4.5.0/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('builder/assets/css/sample.css')}}">


    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .item-desc a {
        color: #555;
    }

    .card img {
        -webkit-transition: opacity 0.5s ease-in-out;
        -moz-transition: opacity 0.5s ease-in-out;
        -ms-transition: opacity 0.5s ease-in-out;
        -o-transition: opacity 0.5s ease-in-out;
        transition: opacity 0.5s ease-in-out;
    }

    .btn-primary {
        color: #fff;
        background-color: #e76916;
        border-color: #e76916;
    }

    .btn-primary:hover {
        color: #fff;
        background-color: #ff7d28;
        border-color: #ff7d28;
    }

    .btn-primary:not(:disabled):not(.disabled).active,
    .btn-primary:not(:disabled):not(.disabled):active,
    .show>.btn-primary.dropdown-toggle {
        color: #fff;
        background-color: #ff7d28;
        border-color: #ff7d28;
    }

    .btn-primary.focus,
    .btn-primary:focus {
        color: #fff;
        background-color: #ff7d28;
        border-color: #ff7d28;
        box-shadow: 0 0 0 0.2rem rgba(255, 166, 38, 0.5);
    }

    .card img:hover {
        opacity: 0.8;
    }

    .shadow-sm {
        box-shadow: 0 .125rem .5rem rgba(0, 0, 0, .2) !important;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    h5 {
        font-size: 1.2rem;
    }

    .card {
        overflow: hidden;
    }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{asset('builder/assets/css/album.css')}}" rel="stylesheet">
</head>

<body>
    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container d-flex justify-content-between">
                <a class="navbar-brand" href="#">
                    <span class="d-flex align-items-center">
                        <img class="mr-3" src="@if(!empty($user->profile)){{asset($user->profile)}}@else{{asset('image/profile.jpg')}}@endif" alt="{{$user->name??''}}}" width="30"
                            height="30" alt="Builder JS" role="presentation">
                    </span>
                </a>
            </div>
        </div>

        <script>
        $(document).ready(function() {
            $('.scroll-to').click(function(e) {
                e.preventDefault();
                var target = $($(this).attr('href'));

                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 500);
            });
        });
        </script>
    </header>

    @yield('content')

    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="#">Back to top</a>
            </p>
            <p>© 2021 Sorrento Corp. Trademarks and brands are the property of their respective owners.</p>
        </div>
    </footer>

</html>