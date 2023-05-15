<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/absensi.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Absensi</title>
</head>

<body>
    <h1 class="judul">LIBRARY</h1>
    <h3 class="judul fw-semibold">SMP Al Falah Ketintang Surabaya</h3>
    <div class="py-5 card d-flex justify-content-center align-items-center my-4 shadow-lg card__form">
        <div class="main-card w-100 text-center">
            <h2 class="judul fw-semibold">Absensi Anggota</h2>
            <h2 class="judul fw-semibold">Perpustakaan</h2>
            <div class="form w-75 mt-4 mx-auto">
                <div class="w-100 p-0 d-flex align-items-center">
                    <div class="user rounded-start">
                        <img src="images/User(1).png" alt="user">
                    </div>
                    <input type="text" id="no_induk" class="border-0 rounded-end w-100 fs-5 ps-4 pe-3 d-block my-3 border-start-0 rounded-start-0" style="background-color:#E2E2E2" 
                    autocomplete="off" placeholder="No. Induk">
                </div>
                <div class="text-center mt-3">
                    <button onclick="onSave(event)" class="btn text-white my-3 fs-5 border-0 rounded-pill w-25 submit" style="background-color: #306484;" type="submit">
                        Submit
                    </button>
                </div>
            </div>
        </div>
        <div class="detail-card w-75 mt-4 d-none">
            <div class="d-flex mb-4">
                <img src="images/User(2).png" alt="user">
                <div class="ms-1 w-100">
                    <table class="w-100 h-100">
                        <tbody style="font-size:19.5px;">
                            <tr>
                                <td>Nama</td>
                                <td id="nama_anggota">: M.Sifani Affan</td>
                            </tr>
                            <tr>
                                <td>No. Induk</td>
                                <td id="no_induk2"></td>
                            </tr>
                            <tr>
                                <td style="width:48%">Jenis Anggota</td>
                                <td id="jenis_anggota"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="w-100 text-end" style="margin-bottom:-25px">
                <button class="btn text-white my-3 fs-5 border-0 rounded-pill w-25 submit" id="back" style="background-color: #306484;" type="submit">
                    Kembali
                </button>
            </div>
        </div>
    </div>
    <footer>
        Copyright <span id="currenYear"></span> © SMP Al Falah Ketintang Surabaya
    </footer>
</body>
@include('admin.layouts.absensi.javascript')

</html>