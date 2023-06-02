@extends('master.Landing')

@section('content')

<div>
    <div class="main_data row gy-5 g-xl-8">
        <div class="col-12">
        <div class="filter-card card pb-6 mb-5 mb-xl-8" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
border-radius: 10px;">
                <div class="card-header">
                    <h2 class="text-dark-gray fw-bolder fs-3 d-flex align-items-center gap-5 mb-0">
                        <span class="material-icons" style="color:#264A8A"> filter_alt </span> Filter
                    </h2>
                </div>
                <div class="d-flex flex-column flex-lg-row flex-stack py-5 mt-5 mx-auto"
                    style="border-bottom: 1px solid #eff2f5; width:90%">
                    <div class="d-flex">
                        <div class="d-flex align-items-center me-5">
                            <p class="m-0 me-4 fw-bolder">Tahun : </p>
                            <select class="rounded p-2 ps-1" name="tahun" id="tahun" style="width:120px;">
                                <option value="#" selected disabled hidden>Pilih tahun</option>
                            </select>
                        </div>
                        <div class="d-flex align-items-center ps-5 ms-5 me-5">
                            <p class="m-0 me-4 fw-bolder">Bulan : </p>
                            <select class="rounded p-2 ps-1" name="bulan" id="bulan" style="width:120px;" disabled>
                                <option value="#" selected disabled hidden>Pilih bulan</option>
                            </select>
                        </div>
                        <div class="d-flex align-items-center ps-5 ms-5 me-5">
                            <p class="m-0 me-4 fw-bolder">Tanggal : </p>
                            <select class="rounded p-2 ps-1" name="tanggal" id="tanggal" style="width:120px;" disabled>
                                <option value="#" selected disabled hidden>Pilih tanggal</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex w-25 text-end">
                        <button type="button" class="btn m-0 d-flex flex-center gap-2 text-light"
                                style="background-color:#264A8A; width:35%; height:5vh"
                                onclick="onFilter()">
                                <span class="material-icons fs-2"> search </span> Cari </button>
                        <button type="button" class="btn m-0 d-flex flex-center gap-2 text-light ms-5"
                                style="background-color:#03BE43; width:35%; height:5vh"
                                onclick="loadForm()">
                                <span class="material-icons fs-2"> print </span> Cetak </button>
                    </div>
                </div>  
            </div>
            <div class="data-card card pb-6 mb-5 mb-xl-8" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
border-radius: 10px;">
                <div class="card-header">
                    <h2 class="text-dark-gray fw-bolder fs-3 d-flex align-items-center gap-5 mb-0">
                        <span class="material-icons" style="color:#264A8A"> text_snippet </span> Data Kunjungan
                    </h2>
                </div>
                <div class="d-flex flex-column flex-lg-row flex-stack py-5 px-9"
                    style="border-bottom: 1px solid #eff2f5">
                    <div class="d-flex flex-column flex-lg-row gap-5 align-items-lg-center w-100">
                        <label for="search_pengunjung" class="fs-4">Search</label>
                        <div class="position-relative w-lg-50">
                            <input type="search" name="search_pengunjung" id="search_pengunjung"
                                placeholder="Ketik untuk mencari" class="border-0 py-4 ps-12 pe-5 fs-5 w-100"
                                style="background-color: #fafafa;border-radius: 6px;" />
                            <span class="material-icons position-absolute top-50 translate-middle-y text-light-gray"
                                style="left: 10px"> search </span>
                        </div>
                    </div>
                    <div class="d-flex gap-4 mt-5">
                        <button type="button"
                            class="btn btn-outline-primary btn-outline border-2 text-body m-0 fw-bolder w-100 d-flex flex-center p-3"
                            onclick="onRefresh(this)">
                            <span class="material-icons fs-2"> refresh </span>
                        </button>
                    </div>
                </div>
                <div class="card-body py-0">
                    <table id="tabelPengunjung" class="table">
                        <thead>
                            <tr>
                                <th class="fw-bolder" style="max-width: 37px"> No </th>
                                <th class="fw-bolder">No. Induk</th>
                                <th class="fw-bolder">Nama</th>
                                <th class="fw-bolder">Tanggal</th>
                                <th class="fw-bolder">Jam</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
@include('admin.layouts.pengunjung.javascript')
@endsection