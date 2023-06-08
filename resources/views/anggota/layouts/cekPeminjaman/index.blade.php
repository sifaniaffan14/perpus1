@extends('anggota.master.app')

@section('content2')

<div class="app-container container-fluid me-10">
								<!--begin::Row-->
								<div class="row g-5 g-xl-10 p-5">
									<!--begin::Col-->
									<div class="col-md-2 col-lg-2 col-xl-2 col-xxl-2">
										<div class="container bg-white mr-5 rounded">
											<img src="https://cdn.kibrispdr.org/data/329/gambar-foto-orang-8.jpg" height="95px" width="105px">
										</div>
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-md-10 col-lg-10 col-xl-10 col-xxl-10">
										<div class="container bg-white ml-5 rounded p-5">
											<p><b>Nama : Affan</b></p>
											<p><b>No Induk : 201983728737366</b></p>
										</div>
									</div>
								</div>
								<!--end::Row-->
                                <div class="container-fluid ps-5 pe-5">
									<div class="bg-white rounded">
                                        <div class="p-5 rounded-top" style="background-color: #015aaa;">
                                            <h2 class="text-white">Data Peminjaman</h2>
                                        </div>
                                        <div class="container">
                                            <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                                                <li class="nav-item">
                                                    <a class="nav-link active text-black" data-bs-toggle="tab" href="#kt_tab_pane_1">Sedang Dipinjam</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-black" data-bs-toggle="tab" href="#kt_tab_pane_2">Riwayat Peminjaman</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                                                <div class="table-responsive m-5 row">
                                                    <div class="row p-3">
                                                        <div class="col">
                                                            <h4>Search</h4>
                                                        </div>
                                                        <div class="col-11">
                                                            <div class="position-relative w-md-400px me-md-2">
                                                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                                                <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                                                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                                <input type="text" class="ps-10" name="search" value="" placeholder="Ketik Untuk Mencari...">
                                                            </div>
                                                        </div>    
                                                    </div>
                                                    <hr>
                                                    <table class="table" id="kt_datatable_select2">
                                                        <thead>
                                                            <tr class="fw-bold fs-6 text-gray-800">
                                                                <th>No</th>
                                                                <th>Judul</th>
                                                                <th>Tanggal Peminjaman</th>
                                                                <th>Tanggal Kembali</th>
                                                                <th>Perpanjang</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>intertico</td>
                                                                <td>14-07-2023</td>
                                                                <td>14-07-2023</td>
                                                                <td><span class="badge badge-danger">belum Kembali</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>intertico</td>
                                                                <td>14-07-2023</td>
                                                                <td>14-07-2023</td>
                                                                <td><span class="badge badge-danger">belum Kembali</span></td>                                                          
                                                            </tr>
                                                        </tbody>
                                                    </table>
										        </div>
                                            </div>
                                            <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                                                <div class="table-responsive m-5 row">
                                                    <div class="row p-3">
                                                        <div class="col">
                                                            <h4>Search</h4>
                                                        </div>
                                                        <div class="col-11">
                                                            <div class="position-relative w-md-400px me-md-2">
                                                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                                                <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                                                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                                <input type="text" class="ps-10" name="search" value="" placeholder="Ketik Untuk Mencari...">
                                                            </div>
                                                        </div>    
                                                    </div>
                                                    <hr>
                                                    <table class="table" id="kt_datatable_select">
                                                        <thead>
                                                            <tr class="fw-bold fs-6 text-gray-800">
                                                                <th>No</th>
                                                                <th>Judul</th>
                                                                <th>Tanggal Peminjaman</th>
                                                                <th>Tanggal Kembali</th>
                                                                <th>Perpanjang</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>intertico</td>
                                                                <td>14-07-2023</td>
                                                                <td>14-07-2023</td>
                                                                <td><span class="badge badge-success">sudah Kembali</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>intertico</td>
                                                                <td>14-07-2023</td>
                                                                <td>14-07-2023</td>
																<td><span class="badge badge-success">sudah Kembali</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
										        </div>
                                            </div>
                                        </div>
									</div>
								</div>
							</div>

@endsection