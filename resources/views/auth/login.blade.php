<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! ReCaptcha::htmlScriptTagJsApi() !!}
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <title>Login - Anggota Perpustakaan</title>
    <script src="assets/js/jquery.js"></script>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"
    />
</head>

{{-- <body>
    <div class="center">
        <h3>Login Anggota Perpustakaan <br> SMP AL-Falah Ketintang</h3>
        <form method="POST" action="{{ route('login') }}">
        @csrf
            <div class="txt_field">
                <input id="username" type="text" class="form-control @error('email') is-invalid @enderror" name="username" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <span></span>
                <label>Password</label>
            </div>
            <div class="pass">
            {!! htmlFormSnippet() !!}
            </div>
            <input type="submit" value="Login">
        <div class="signup_link">

    </div>
    </form>
    </div>
    <div class="bottom">
        <br>
        <strong>PERPUSTAKAAN SMP AL FALAH KETINTANG SURABAYA</strong>
        <br>
        <small>Jl. Ketintang Madya No.81, Ketintang, Kec. Gayungan, Kota SBY, Jawa Timur 60231, Indonesia</small>
        <br>
        <small>Phone: +62 812-3411-1792 - E-Mail : infopus[at]umm.ac.id</small>
    </div>
</body> --}}

<body>
    <h1 class="judul">LIBRARY</h1>
    <h3 class="judul fw-semibold">SMP Al Falah Ketintang Surabaya</h3>
    <div class="py-5 card d-flex justify-content-center align-items-center my-4 shadow-lg card__form">
        <h2>LOGIN</h2>
        <h5>Anggota</h5>
        <form method="POST" action="{{ route('login') }}" class="w-75">
        @csrf
            <div class="w-100 p-0 position-relative">
                <span class="material-symbols-outlined position-absolute icon__">
                    person
                </span>
                 <input id="username" type="text" class="form-control form-control-lg bg-light w-100 username__login d-block my-3" name="username" value="{{ old('email') }}" required autocomplete="off" autofocus
                    placeholder="Username">
            </div>
            <div class="w-100 mb-5 position-relative">
                <span class="material-symbols-outlined position-absolute icon__">
                    key
                </span>
                 <input id="password" type="password" class="form-control form-control-lg bg-light w-100 password__login my-3" name="password" required autocomplete="current-password"
                    placeholder="Password"/>
                    <button type="button" class="btn p-0 position-absolute see__pass">
                        <span class="material-symbols-outlined" onclick="showPassword()">
                            visibility
                        </span>
                    </button>
            </div>
            <div style="align-items: ">
                {!! htmlFormSnippet() !!}
            </div>
        <button class="btn btn-warning text-white my-3 border-0 rounded-pill w-25 submit" type="submit" value="Login">
            Login
        </button> 
    </form>
    </div>
    <footer>
        Copyright <span id="currenYear"></span> © SMP Al Falah Ketintang Surabaya
    </footer>
</body>
<script type="text/javascript">
    const showPassword = () => {
      if ($("#password").attr("type") == "password") {
        $("#password").attr("type", "text");
        $(".far.fa-eye").removeClass("fa-eye").addClass("fa-eye-slash");
      } else {
        $(".far.fa-eye-slash").removeClass("fa-eye-slash").addClass("fa-eye");
        $("#password").attr("type", "password");
      }
    };
  </script>
</html>
<script src='https://www.google.com/recaptcha/api.js'></script>