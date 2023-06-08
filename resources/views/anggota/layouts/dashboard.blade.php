@extends('anggota.master.app')

@section('content2')

<div id="kt_app_content_container" class="app-container container-fluid me-10">
								<!--begin::Row-->
								<div class="row g-5 g-xl-10 p-5">
									<!--begin::Col-->
									<div class="col-md-2 col-lg-2 col-xl-2 col-xxl-2">
										<div class="container bg-white mr-5 rounded">
											<img src="https://cdn.kibrispdr.org/data/329/gambar-foto-orang-8.jpg" height="95px" width="135px">
										</div>
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-md-10 col-lg-10 col-xl-10 col-xxl-10">
										<div class="container bg-white ml-5 rounded p-5">
											<p style="color : #87999f"><b>Nama : Affan</b></p>
											<p style="color : #87999f"><b>No Induk : 201983728737366</b></p>
										</div>
									</div>
								</div>
								<!--end::Row-->
								<div class="row g-5 g-xl-5 p-5">
									<div class="col-md-7 col-lg-7 col-xl-7 col-xxl-7 rounded">
										<div class="container bg-white mr-5 rounded p-5">
											<h4>Informasi penting</h4>
											<hr>
											<div class="container">
												<br><br><br>
											</div>
										</div>
										<div class="row mt-5">
											<div class="col-4">
												<div class="container bg-info rounded p-5">
													<span class="svg-icon svg-icon-2">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
															<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
															<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
															<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
														</svg>
													</span>
													<h3 class="text-white mt-5"><b>790</b></h3>
													<b class="text-white">Jumlah Peminjaman</b>
												</div>
											</div>
											<div class="col-4">
												<div class="container bg-white rounded p-5">
													<span class="svg-icon svg-icon-2">
														<span class="fa fa-users fs-2" style="color : rgb(4, 196, 4)"></span>
													</span>
													<h3 class="mt-5"><b>8,345</b></h3>
													<b style="color : #87999f">Jumlah Keuntungan</b>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-5 col-lg-5 col-xl-5 col-xxl-5">
										<div class="container rounded bg-white p-5">
											<h4>Koleksi Terbaru</h4>
											<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
												<div class="carousel-indicators">
													<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active bg-secondary" aria-current="true" aria-label="Slide 1"></button>
													<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="bg-secondary" aria-label="Slide 2"></button>
													<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="bg-secondary" aria-label="Slide 3"></button>
												</div>
												<div class="carousel-inner">
													<div class="carousel-item active">
														<div class="d-flex justify-content-center">
															<img src="https://cdn.shopify.com/s/files/1/0603/1402/6208/products/ECW004_600x.png?v=1675320701" height="195px" class="d-block w-80" alt="...">
														</div>
													</div>
													<div class="carousel-item">
														<div class="d-flex justify-content-center">
															<img src="https://cdn.shopify.com/s/files/1/0603/1402/6208/products/ECW004_600x.png?v=1675320701" height="195px" class="d-block w-80" alt="...">
														</div>
													</div>
													<div class="carousel-item">
														<div class="d-flex justify-content-center">
															<img src="https://cdn.shopify.com/s/files/1/0603/1402/6208/products/ECW004_600x.png?v=1675320701" height="195px" class="d-block w-80" alt="...">
														</div>
													</div>
												</div>
												<br>
												<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
													<span class="carousel-control-prev-icon bg-secondary" aria-hidden="true"></span>
													<span class="visually-hidden">Previous</span>
												</button>
												<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
													<span class="carousel-control-next-icon bg-secondary" aria-hidden="true"></span>
													<span class="visually-hidden">Next</span>
												</button>
											</div>
										</div>
									</div>
								</div>
								<div class="container-fluid ps-5 pe-5">
									<div class="bg-white rounded p-5">
										<div class="table-responsive p-5 row">
											<div class="col">
												<h5 class="pt-3">Data Peminjaman</h5>
											</div>
											<div class="col text-end">
												<button class="btn btn-success"> <i class="fa fa-users"></i> Cek Peminjaman</button>
											</div>
											<table class="table">
												<thead>
													<tr class="fw-bold fs-6 text-gray-800">
														<th class="text-muted">No</th>
														<th class="text-muted">Judul</th>
														<th class="text-muted">Tanggal Peminjaman</th>
														<th class="text-muted">Tanggal Kembali</th>
														<th class="text-muted">Status</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>1</td>
														<td>intertico</td>
														<td>14-07-2023</td>
														<td>14-07-2023</td>
														<td><span class="badge badge-danger">Belum Kembali</span></td>
													</tr>
													<tr>
														<td>2</td>
														<td>intertico</td>
														<td>14-07-2023</td>
														<td>14-07-2023</td>
														<td><span class="badge badge-warning">Diperpanjang</span></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
@endsection