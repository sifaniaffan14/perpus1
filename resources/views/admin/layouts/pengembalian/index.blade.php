@extends('master.Landing')

@section('content')

<div>
    <div class="row gy-5 g-xl-8">
        <div class="col-12">
            <div class="data-card card pb-6 mb-5 mb-xl-8">
                <div class="card-body">
                    <div class="card-header">
                        <h2 class="text-dark-gray fw-bolder fs-3 d-flex align-items-center gap-5 mb-0">
                            <span class="material-icons text-primary"> text_snippet </span> Pengembalian Buku
                        </h2>
                        <div class="form-action-wrapper d-flex gap-4 align-items-center mt-5 w-50">
                            <button type="button"
                                class="btn btn-outline-primary btn-outline border-2 text-body m-0 fw-bolder w-100 actCreate"
                                onclick="onSave()"> Batal </button>
                            <button type="button"
                                class="btn btn-primary m-0 d-flex flex-center gap-2 fw-bolder w-100 actCreate" onclick="onSave()">
                                <span class="material-icons-outlined fs-2">save</span> Simpan
                            </button>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-lg-row flex-stack py-5 px-9"
                        style="border-bottom: 1px solid #eff2f5">
                        <div class="gap-5 align-items-lg-center w-100">
                            <label for="kode_peminjaman" class="fs-4">No Induk</label>
                            <div class="position-relative w-lg-50">
                                <select name="kode_peminjaman" id="kode_peminjaman" class="form-control"
                                    onchange="showData()">
                                    <option value="" selected disabled>Select No Induk</option>
                                </select>
                                <span class="material-icons position-absolute top-50 translate-middle-y text-light-gray"
                                    style="left: 10px"> search </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-header d-none">
                        <h2 class="text mt-3">
                            Data Peminjam
                        </h2>
                    </div>
                    <div class="text-content" id="identitas_peminjam">
                        <p id="nama_anggota"></p>
                        <p id="jenis_anggota"></p>
                    </div>
                    <div class="header-eksemplar d-none" style="padding:4vh;">
                        <h2 style="text-align: center; font-weight:bold;">Data Buku</h2>
                    </div>
                    <div class="card-body py-0 d-none">
                        <div class="row mt-6">
                            <label for="kode_eksemplar">Kode Eksemplar</label>
                            <input type="text" class="form-control" id="kode_eksemplar"
                                placeholder="Masukkan Kode Eksemplar" onchange="onPengembalian()" />
                        </div>
                        <form action="" name="formPengembalian" id="formPengembalian">
                            <input type="hidden" name="peminjaman_id">
                            <table class="table" id="tableEksemplar">
                                <thead>
                                    <tr>
                                        <th class="fw-bolder" style="max-width: 20px"> No </th>
                                        <th class="fw-bolder">Kode Eksemplar</th>
                                        <th class="fw-bolder">Judul Buku</th>
                                        <th class="fw-bolder">Tgl Pinjam</th>
                                        <th class="fw-bolder">Tgl Kembali</th>
                                        <th class="fw-bolder">Status</th>
                                    </tr>
                                </thead>
                                <tbody id="listTable"></tbody>
                            </table>
                        </form>
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
