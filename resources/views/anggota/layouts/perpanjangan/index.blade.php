@extends('anggota.master.app')

@section('content2')
<div class="app-container container-fluid me-10">
								<!--begin::Row-->
								<div class="row g-5 g-xl-10 p-5">
									<!--begin::Col-->
									<div class="col-md-2 col-lg-2 col-xl-2 col-xxl-2">
										<div class="container bg-secondary mr-5 rounded">
											<img src="https://cdn.kibrispdr.org/data/329/gambar-foto-orang-8.jpg" height="95px" width="105px">
										</div>
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-md-10 col-lg-10 col-xl-10 col-xxl-10">
										<div class="container bg-secondary ml-5 rounded p-5">
											<p><b>Nama : Affan</b></p>
											<p><b>No Induk : 201983728737366</b></p>
										</div>
									</div>
								</div>
								<!--end::Row-->
                                <div class="container-fluid ps-5 pe-5">
									<div class="bg-secondary rounded">
                                        <div class="p-5 rounded-top" style="background-color: #015aaa;">
                                            <h2 class="text-white">Perpanjangan Buku</h2>
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
                                                                <td>
																	<button class="btn btn-success">
																		Kembalikan
																	</button>
																</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>intertico</td>
                                                                <td>14-07-2023</td>
                                                                <td>14-07-2023</td>
																<td>
																	<button class="btn btn-success">
																		Kembalikan
																	</button>
																</td>                                                            
															</tr>
                                                        </tbody>
                                                    </table>
										        </div>
                                            </div>
                                            <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                                                <div class="table-responsive m-5 row">
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
                                                                <td>
                                                                    <button class="btn btn-sm btn-warning">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>intertico</td>
                                                                <td>14-07-2023</td>
                                                                <td>14-07-2023</td>
                                                                <td>
                                                                    <button class="btn btn-sm btn-warning">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </td>
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