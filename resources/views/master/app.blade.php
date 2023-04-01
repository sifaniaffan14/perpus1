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
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.js"></script>
    <title>Perpustakaan SMP Al-Falah Ketintang Surabaya</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid px-5">
            <img src="../media/logo.svg" class="logo__navbar" alt="">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse pe-5" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-3 fw-semibold ">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.html">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Tentang Kami
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Koleksi Terbaru</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}"
                            class="nav-link btn btn-sm btn-warning rounded-pill border-0 btn__login">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section id="hero1" class="hero__1 container-fluid d-flex flex-column align-items-center justify-content-center">
        <div class="row d-flex gap-4">
            <div class="col-12 text-white text-center">
                <h1 class="fw-bold">Library</h1>
                <h5>SMP Al Falah Ketintang Surabaya</h5>
            </div>
            <div class="col-12">
                <form action="">
                    <div class="d-flex max-h-25">
                        <div class="dropdown category__">
                            <button class="btn btn-light rounded-pill dropdown-toggle h-100 fw-semibold" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Category
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                        <input type="text" class="form-control rounded-pill ps-4 search__input w-100"
                            placeholder="Ketik satu atau lebih kata kunci berupa Judul, Pengarang atau Subyek" />
                        <button class="btn btn-warning btn__search text-white rounded-circle">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section id="gallery" class="container-fluid gallery shadow-sm">
        <div class="row">
            <div class="col-12">
                <h3 class="fw-bold text-center p-2" style="color: #306484;"><u>Gallery</u></h3>
                <div class="w-100" style="max-height: 20vh;">
                    <!-- Set up your HTML -->
                    <div class="prevnext">
                        <button class="prev"><i class="bi bi-chevron-left"></i></button>
                        <button class="next"><i class="bi bi-chevron-right"></i></button>
                    </div>
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper" id="bebas">
                            <div class="swiper-slide"><a href=""><img src="assets/media/book.svg" alt=""></a></div>
                            <div class="swiper-slide"><a href=""><img src="assets/media/book.svg" alt=""></a></div>
                            <div class="swiper-slide"><a href=""><img src="assets/media/book.svg" alt=""></a></div>
                            <div class="swiper-slide"><a href=""><img src="assets/media/book.svg" alt=""></a></div>
                            <div class="swiper-slide"><a href=""><img src="assets/media/book.svg" alt=""></a></div>
                            <div class="swiper-slide"><a href=""><img src="assets/media/book.svg" alt=""></a></div>
                            <div class="swiper-slide"><a href=""><img src="assets/media/book.svg" alt=""></a></div>
                            <div class="swiper-slide"><a href=""><img src="assets/media/book.svg" alt=""></a></div>
                            <div class="swiper-slide"><a href=""><img src="assets/media/book.svg" alt=""></a></div>
                            <div class="swiper-slide"><a href=""><img src="assets/media/book.svg" alt=""></a></div>
                            <div class="swiper-slide"><a href=""><img src="assets/media/book.svg" alt=""></a></div>
                            <div class="swiper-slide"><a href=""><img src="assets/media/book.svg" alt=""></a></div>
                            <div class="swiper-slide"><a href=""><img src="assets/media/book.svg" alt=""></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <h6 class="text-white text-center">Copyright 2022 © SMP Al Falah Ketintang Surabaya</h6>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
    // swiper.js for carousel
    var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        slidesPerView: 3,
        spaceBetween: 20,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        coverflowEffect: {
            rotate: 0,
            stretch: 0,
            depth: 0,
            modifier: 0,
            slideShadows: false,
        },
        navigation: {
            nextEl: ".next",
            prevEl: ".prev",
        },
    });

</script>

</html>
