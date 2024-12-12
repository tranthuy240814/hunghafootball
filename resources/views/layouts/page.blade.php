<html lang="en" class="js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#ffffff">
    <link rel="icon" type="image/x-icon" href="{{ asset('/images/logo-hungha.jpeg') }}">
    <meta name="msapplication-TileColor" content="#E45357">
    <meta name="msapplication-TileImage" content="{{ asset('/images/logo_hungha.jpeg') }}">
    <meta name="application-name" content="Hung Ha FC">
    <meta name="msapplication-tooltip" content="Hung Ha FC">
    <meta name="description" content="{{ __('Run your badminton league for free, badminton scheduling and online results and statistics displayed on your free website.') }}">
    <meta name="keywords" content="{{ __('badminton scheduling,badminton scheduler,badminton league,badminton league website,manage badminton league online,run badminton league online') }}">
    <meta name="robots" content="Index, Follow">

    <title>@yield('title')</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cambria:wght@300;400;500&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="canonical" href="https://badminton.io">
    <link rel="alternate" hreflang="en-US" href="https://badminton.io">
    <link rel="alternate" hreflang="af" href="https://badminton.io">
    <link rel="alternate" hreflang="x-default" href="https://badminton.io">


    <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/page/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/content/league.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/page/homepage.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('css')
</head>

<style>
    .navbar-toggler {
        background: white !important;
    }

    .navbar-nav .nav-item a:hover {
        color: lightgrey;
    }

    .navbar-light .navbar-nav .nav-link {
        color: white;
        font-size: 17px;
    }

    .dropdown-menu .dropdown-item {
        color: black !important;
    }

    .dropdown-menu .dropdown-item:hover {
        background: #e3e3e3 !important;
    }

    .btn-register {
        margin-left: 5px !important;
    }

    .navbar-nav .nav-link.show {
        color: white!important;
    }

    .navbar-nav .nav-item a {
        text-decoration: none;
        font-size: 18px;
        font-weight: 300;
        text-transform: uppercase;
        transition: all .5s ease;
        font-weight: 700;
        cursor: pointer;
    }

    .navbar-light .navbar-nav .nav-link:hover {
        color: #ffc904 !important;
    }



</style>
<body>
    <header style="background-color:#184931">
        <nav class="navbar navbar-expand-lg sticky-top navbar-light p-3 shadow-sm" >
            <div class="container">
                <a href="{{ route('home') }}"><img  class="logo-image" src="{{ asset('/images/logo-hungha.jpeg') }}" alt="{{ env('APP_NAME', 'Badminton.io') }}" width="100" height="100"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto ">
                        <li class="nav-item">
                            <a class="nav-link mx-2 text-uppercase" href="{{ route('about') }}">{{__('GIỚI THIỆU')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-2 text-uppercase" href="{{ route('team') }}">{{__('ĐỘI HÌNH')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-2 text-uppercase" href="{{route('match')}}">{{__('THI ĐẤU')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-2 text-uppercase" href="{{route('video')}}">{{__('Video')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-2 text-uppercase" href="">{{__('TIN TỨC')}}</a>
                        </li>
                        @if(Auth::check() && Auth::user()->role =="admin" )
                        <li class="nav-item">
                            <a class="nav-link mx-2 text-uppercase" href="{{ route('dashboard') }}">{{__('DASHBOARD')}}</a>
                        </li>
                        @endif
                        @if(Auth::check())
                            <div class="nav-item dropdown" style="margin-top: -1px">

                                <a class="nav-link mx-2 dropdown-toggle text-uppercase " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  <span>
                                        @if (strpos(Auth::user()->profile_photo_path, 'http') > 0)
                                          <img class="avatar-user" width="25" height="25" src="{{ Auth::user()->profile_photo_path ?? asset('/images/no-image.png') }}">
                                      @else
                                          <img class="avatar-user" width="25" height="25" src="{{ asset( Auth::user()->profile_photo_path ?? '/images/no-image.png') }}">
                                      @endif
                                </span>
                                    {{ Auth::user()->name }}
                                    <i class="fa fa-sort-down"></i>

                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item"href="{{ route('profile.edit') }}">{{__('My profile')}}</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}">{{__('Logout')}}</a></li>
                                </ul>
                            </div>
                        @else
                            <li><a href="{{ route('login') }}" class="button white ">{{ __('Log In') }}</a></li>
                            <li><a href="{{ route('register_user') }}" class="button btn-register">{{ __('Register') }}</a></li>
                        @endif

                </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('content')

    <div class="" style="background: #184931; text-transform: uppercase;">
        <footer class="container py-5"  >
            <div class="row">
                <div class="color-white col-md-3 mb-3">
                    <ul class="social">
                        <li><a href="{{route('home')}}"><img style="width: 100%" src="https://vsports-assets-hfevhbaxghane9f2.z01.azurefd.net/files/1731259267600-mb4n.jpeg"></a></li>
                    </ul>
                </div>

                <div class="col-md-3 mb-3 color-white">
                    <ul class="nav-a">
                        <li><a href="">Chính sách bảo mật thông tin</a></li>
                        <li><a href="">Chính sách đổi trả</a></li>
                        <li><a href="">Chính sách vận chuyển và kiểm tra hàng

                            </a>
                        </li>

                    </ul>
                </div>

                <div class="col-md-3 mb-3 color-white">
                    <ul class="nav-a " style="display: flex; flex-direction: column;">
                        <li><a href="">Trang chủ</a></li>
                        <li><a href="">Giới thiệu</a></li>
                        <li><a href="">Đội hình</a></li>
                    </ul>
                </div>
                <div class="col-md-3 color-white">
                    <form>
                        <h4 class="h3 color-white">Thông tin liêu hệ</h4>
                        <p >
                            <small class="nav-a">
                                <a href="https://www.youtube.com/channel/UC7aUjm3mUbYG85UTIg-cGmw?sub_confirmation=1" rel="noreferrer" target="_blank">
                                    <img width="70" height="70" src="https://hanoifc.com.vn/images/youtube.png"></a>
                                <br>
                                <br>
                            </small>
                        </p>

                    </form>
                </div>
            </div>

            <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top color-white  footer-p">
                <p>{{__('© 2023 Company, Inc. All rights reserved.The content of this website is the property of FC Hung Ha or used under licence by FC Hung Ha .
                No part may be copied, republished, stored, or otherwise republished or transmitted without the prior written permission of FC Hung Ha . For further information, please refer to our')}}</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                                <use xlink:href="#twitter"></use>
                            </svg></a></li>
                    <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                                <use xlink:href="#instagram"></use>
                            </svg></a></li>
                    <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                                <use xlink:href="#facebook"></use>
                            </svg></a></li>
                </ul>
            </div>
        </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="{{ asset('/js/page/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('/js/page/common.min.js') }}"></script>
    <script>
        $('.open-btn').click(function() {
            $('nav.container').toggleClass('active');
        })

        const toggleMenuClicked = () => {
            const body = document.body;
            const openIcon = document.getElementById("open-icon");
            const closeIcon = document.getElementById("close-icon");

            body.classList.toggle("open");

            if (body.classList.contains("open")) {
                openIcon.style.display = "none";
                closeIcon.style.display = "flex";
            } else {
                openIcon.style.display = "flex";
                closeIcon.style.display = "none";
            }
        };
    </script>
    <script>
        $(document).ready(() => {
            let isMenuAlreadyOpen = false;
            $('#open-icon').on('click', () => {
                $('body').css("overflow", isMenuAlreadyOpen ? "auto" : "hidden")
                isMenuAlreadyOpen = !isMenuAlreadyOpen
            })
        })
    </script>

    @yield('js')
</body>

</html>
