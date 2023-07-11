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
    <link rel="shortcut icon" type="image/x-icon" href="assets-anggota/media/logos/custom-3.svg">
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
                        <a class="nav-link menu_nav m-0" role="button" onclick="onDisplayLanding()">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu_nav" role="button" onclick="onDisplayAbout()" aria-expanded="false">
                            About Us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu_nav" role="button" onclick="onDisplayRegulation()">Regulation</a>
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
                            <button class="btn btn-lg btn-warning btn__search text-white rounded-pill">
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
                        <div class="owl-carousel owl-theme" id="koleksi_terbaru">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="page-search d-none">
        <section id="search__bar" class="container-fluid">
            <div class="row">
                <div class="col-lg-7 col-12 d-flex align-items-center gap-3 my-5">
                    <label class="w-75 ps-lg-5">
                        <input type="text" class="form-control rounded-pill px-4" id="search2" placeholder="Search"/>
                    </label>
                    <button onclick="onSearch2()" class="btn btn-warning rounded-pill text-white button__ fw-semibold">Search</button>
                    <button onclick="onReset()" class="btn btn-warning rounded-pill text-white button__ fw-semibold">Clear</button>
                </div>
            </div>
        </section>
        <section id="search__result" class="container-fluid search__result rounded rounded-top rounded-3 overflow-auto">
            <div class="row">
                <div class="col-12 p-4">
                    <h3 class="fw-bold text__custom">Hasil Pencarian</h3>
                </div>
            </div>
            <div class="row d-flex justify-content-center align-items-top gap-3 h-75 w-100" id="result_buku">
            </div>
        </section>
    </div>
    <div class="page-detail d-none">
        <section id="search__bar" class="container">
            <div class="row">
                <div class="col-2 d-flex align-items-center gap-3 my-5">
                    <p onclick="onDisplaySearch()" id="btnBack" class="btn btn-warning m-0 rounded-pill text-light w-75" style="min-width: 100px">Back</p>
                </div>
            </div>
        </section>
        <section id="search__result" class="container card rounded rounded-4 overflow-auto">
            <div class="row">
                <div class="col-12 p-4">
                    <h3 class="fw-bold text__custom text-center">Details</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 d-flex justify-content-center h-auto pb-lg-5 pb-0" style="min-height: 300px">
                    <img id="img_detail" class="mt-4" alt="" style="width:26vh; height:30vh">
                </div>
                <div class="col-lg-6 col-12 d-flex flex-column justify-content-center p-lg-2 p-5">
                    <table class="border-0 text__custom fw-semibold align-bottom ">
                        <tr class="pb-2">
                            <td class="align-baseline w-lg-25 w-50">Kode Buku</td>
                            <td class="align-baseline text-center">:</td>
                            <td class="align-baseline" id="kode_buku"></td>
                        </tr>
                        <tr class="pb-2">
                            <td class="align-baseline w-25">Judul Buku</td>
                            <td class="align-baseline text-center">:</td>
                            <td class="align-baseline" id="judul"></td>
                        </tr>
                        <tr class="pb-2">
                            <td class="align-baseline w-25">Pengarang</td>
                            <td class="align-baseline text-center">:</td>
                            <td class="align-baseline" id="pengarang"></td>
                        </tr>
                        <tr class="pb-2">
                            <td class="align-baseline w-25">Penerbit</td>
                            <td class="align-baseline text-center">:</td>
                            <td class="align-baseline" id="penerbit"></td>
                        </tr>
                        <tr class="pb-2">
                            <td class="align-baseline w-25">No. ISBN</td>
                            <td class="align-baseline text-center">:</td>
                            <td class="align-baseline" id="no_isbn"></td>
                        </tr>
                        <tr class="pb-2">
                            <td class="align-baseline w-25">Jumlah Halaman</td>
                            <td class="align-baseline text-center">:</td>
                            <td class="align-baseline" id="halaman"></td>
                        </tr>
                        <tr class="pb-2">
                            <td class="align-baseline w-25">Kategori</td>
                            <td class="align-baseline text-center">:</td>
                            <td class="align-baseline" id="nama_kategori"></td>
                        </tr>
                    </table>
                    <div class="mt-4 table__detail">
                        <table class="table table-bordered table-sm mw-100" style="width:90%">
                            <thead class="bg__custom text-dark">
                                <tr>
                                    <td>No.</td>
                                    <td>Kode Eksemplar</td>
                                    <td>Status</td>
                                    <td>Kondisi</td>
                                    <td>Tanggal Pinjam</td>
                                    <td>Tanggal Kembali</td>
                                </tr>
                            </thead>
                            <tbody id="list_table">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
    </div>
    <footer>
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