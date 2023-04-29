@extends('master.Landing')

@section('content')

<div>
    <div class="main_data row gy-5 g-xl-8">
        <div class="col-12">
            <div class="data-card card pb-6 mb-5 mb-xl-8">
                <div class="card-header">
                    <h2 class="text-dark-gray fw-bolder fs-3 d-flex align-items-center gap-5 mb-0">
                        <span class="material-icons" style="color:#264A8A"> text_snippet </span> Data Peminjaman
                    </h2>
                </div>
                <div class="d-flex flex-column flex-lg-row flex-stack py-5 px-9"
                    style="border-bottom: 1px solid #eff2f5">
                    <div class="d-flex flex-column flex-lg-row gap-5 align-items-lg-center w-100">
                        <label for="search_peminjaman" class="fs-4">Search</label>
                        <div class="position-relative w-lg-50">
                            <input type="search" name="search_peminjaman" id="search_peminjaman"
                                placeholder="Ketik untuk mencari" class="border-0 py-4 ps-12 pe-5 fs-5 w-100"
                                style="background-color: #fafafa;border-radius: 6px;" />
                            <span class="material-icons position-absolute top-50 translate-middle-y text-light-gray"
                                style="left: 10px"> search </span>
                        </div>
                    </div>
                    <div class="d-flex gap-4 mt-5">
                        <button type="button"
                            class="btn btn-outline-primary btn-outline border-2 text-body m-0 fw-bolder w-100 d-flex flex-center p-3"
                            onclick="onRefresh()">
                            <span class="material-icons fs-2"> refresh </span>
                        </button>
                    </div>
                </div>
                <div class="card-body py-0">
                    <table class="table" id="tablePeminjaman">
                        <thead>
                            <tr>
                                <th class="fw-bolder" style="max-width: 37px"> No </th>
                                <th class="fw-bolder">Nama Peminjam</th>
                                <th class="fw-bolder">Jumlah Buku</th>
                                <th class="fw-bolder">Belum Kembali</th>
                                <th class="fw-bolder">Sudah Kembali</th>
                                <th class="fw-bolder">Status</th>
                                <th class="fw-bolder">Detail</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('admin.layouts.peminjaman.formEdit')
    @include('admin.layouts.peminjaman.detail')
</div>

@endsection

@section('js')
@include('admin.layouts.peminjaman.javascript')
@endsection