{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../media/logo.svg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/pencarian.css">
    <link rel="stylesheet" href="assets/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css" >
    <link rel="stylesheet" href="assets/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Questrial' rel='stylesheet'>
    <title>Perpustakaan SMP Al-Falah Ketintang Surabaya</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid px-5">
            <img src="images/logo.svg" class="logo__navbar" alt="">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse pe-5" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-3 fw-semibold ">
                    <li class="nav-item">
                        <p class="nav-link active m-0" onclick="onDisplayLanding()" style="cursor:pointer;" aria-current="page">Beranda</p>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" role="button" onclick="onDisplayAbout()" aria-expanded="false">
                            About Us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" role="button" onclick="onDisplayRegulation()">Regulation</a>
                    </li>
                    @if (Auth::check())
                        @if (Auth::user()->isAdmin(Auth::id()))
                        <li class="nav-item">
                            <a href="{{ route('admin-dashboard') }}"
                            class="nav-link btn btn-sm rounded-pill border-0 btn__login" style="width: 110px;">Dashboard</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}"
                            class="nav-link btn btn-sm rounded-pill border-0 btn__login" style="width: 110px;">Dashboard</a>
                        </li>
                        @endif
                    @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}"
                        class="nav-link btn btn-sm rounded-pill border-0 btn__login" style="width: 100px;">Login</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="page-landing">
        <section id="hero1" class="hero__1 container-fluid d-flex flex-column align-items-center justify-content-center">
            <div class="row d-flex gap-4">
                <div class="col-12 text-white text-center">
                    <h1 class="fw-bold">Library</h1>
                    <h5>SMP Al Falah Ketintang Surabaya</h5>
                </div>
                <div class="col-12">
                    <form onsubmit="onSearch(event)" method="POST" autocomplete="off" id="formSearch">
                        @csrf
                        <div class="d-flex justify-content-center" style="height:7.8vh">
                            <div class="dropdown category__">
                                <button class="btn btn-light rounded-pill dropdown-toggle h-100 fw-semibold" onclick="showCategory()" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Category
                                </button>
                                <ul class="dropdown-menu" id="category" aria-labelledby="dropdownCategory">
                                </ul>
                            </div>
                            <input type="text" class="form-control form-control-lg rounded-pill search__input" name="val_search" id="val_search" style="padding-left: 8vh;"
                            placeholder="Ketik satu atau lebih kata kunci berupa Judul atau Pengarang" />
                            <button class="btn btn-lg btn-warning btn__search text-white rounded-circle">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section id="gallery" class="container-fluid gallery shadow-sm">
            <div class="row">
                <div class="col-12 position-relative">
                    <h3 class="fw-bold text-center p-2 mb-4" style="color: #202F4E;">Koleksi Terbaru</h3>
                    <!-- Set up your HTML -->
                    <div class="container__carousel">
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                                <a href="">
                                    <img src="assets/media/book.svg" class="book__" alt="" />
                                </a>
                            </div>
                            <div class="item">
                                <a href="">
                                    <img src="assets/media/book.svg" class="book__" alt="" />
                                </a>
                            </div>
                            <div class="item">
                                <a href="">
                                    <img src="assets/media/book.svg" class="book__" alt="" />
                                </a>
                            </div>
                            <div class="item">
                                <a href="">
                                    <img src="assets/media/book.svg" class="book__" alt="" />
                                </a>
                            </div>
                            <div class="item">
                                <a href="">
                                    <img src="assets/media/book.svg" class="book__" alt="" />
                                </a>
                            </div>
                            <div class="item">
                                <a href="">
                                    <img src="assets/media/book.svg" class="book__" alt="" />
                                </a>
                            </div>
                            <div class="item">
                                <a href="">
                                    <img src="assets/media/book.svg" class="book__" alt="" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('master.pencarian')
    @include('master.detailPencarian')
    @include('master.aboutUs')
    @include('master.regulasi')
    @include('master.footer')
    <!-- <footer>
        <h6 class="text-white text-center">Copyright 2023 © SMP Al Falah Ketintang Surabaya</h6>
    </footer> -->
</body>
@include('master.javascript')

</html>