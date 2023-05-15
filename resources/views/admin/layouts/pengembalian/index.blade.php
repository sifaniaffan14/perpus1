@extends('master.Landing')

@section('content')
<div>
    <div class="row gy-5 g-xl-8">
        <div class="col-12">
            <div class="data-card card pb-6 mb-5 mb-xl-8">
                <div class="card-body p-0">
                    <div class="card-header">
                        <h2 class="text-dark-gray fw-bolder fs-3 d-flex align-items-center gap-5 mb-0">
                            <span class="material-icons" style="color:#264A8A"> text_snippet </span> Pengembalian Buku
                        </h2>
                        <div class="form-action-wrapper d-flex gap-4 align-items-center mt-5 w-50  justify-content-end">
                            <button type="button"
                                class="btn p-4 text-body m-0 fw-bolder w-25 actCreate" style="border:1px solid #264A8A"
                                onclick="onSave()"><span style="color:#264A8A"> Batal </span></button>
                            <button type="button"
                                class="btn p-4 m-0 d-flex flex-center gap-2 fs-5 fw-bolder w-25 text-light actCreate" style="background-color:#264A8A" onclick="onSave()">
                                <span class="material-icons-outlined fs-2">save</span> Simpan
                            </button>
                        </div>
                    </div>
                    <div class="mx-auto" style="width:90%">
                        <div class="d-flex flex-column flex-lg-row flex-stack py-5"
                            style="border-bottom: 1px solid #eff2f5">
                            <div class="gap-5 mb-3 align-items-lg-center w-100">
                                <label for="kode_peminjaman" class="fs-4 fw-bolder">No. Induk</label>
                                <div class="position-relative mt-1 w-lg-25">
                                    <select name="kode_peminjaman" id="kode_peminjaman" class="form-control"
                                        onchange="showData()">
                                        <option value="" selected disabled>Silahkan Pilih No. Induk</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-header d-none">
                            <h2 class="text mt-5 fs-3 fw-bolder">
                                Data Peminjaman
                            </h2>
                        </div>
                        <div class="text-content ms-5 ps-5" id="identitas_peminjam">
                        </div>
                        <div class="header-eksemplar d-none" style="padding:4vh; padding-bottom:2vh;">
                            <h2 style="text-align: center; font-weight:bold;">Data Buku</h2>
                        </div>
                        <div class="card-body py-0 d-none">
                            <div class="row mb-2">
                                <label class="fs-6 mb-2" for="kode_eksemplar">Kode Eksemplar</label>
                                <input type="text" class="form-control w-25" id="kode_eksemplar"
                                    placeholder="Masukkan Kode Eksemplar" onchange="onPengembalian()" />
                            </div>
                            <form action="" name="formPengembalian" id="formPengembalian">
                                <input type="hidden" name="peminjaman_id">
                                <table class="table w-100" id="tableEksemplar">
                                    <thead>
                                        <tr>
                                            <th class="fw-bolder text-center" style="max-width: 20px"> No </th>
                                            <th class="fw-bolder text-center">Kode Eksemplar</th>
                                            <th class="fw-bolder text-center">Judul Buku</th>
                                            <th class="fw-bolder text-center">Tgl Pinjam</th>
                                            <th class="fw-bolder text-center">Tgl Kembali</th>
                                            <th class="fw-bolder text-center" style="width:10%">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="listTable" class="text-center"></tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('js')
@include('admin.layouts.pengembalian.javascript')
@endsection
