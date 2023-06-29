@extends('anggota.master.app')

@section('content2')

<div id="kt_app_content_container" class="app-container container-fluid me-10">
	<!--begin::Row-->
	<div class="row g-5 g-xl-10 p-5">
		<!--begin::Col-->
		<div class="col-md-2 col-lg-2 col-xl-2 col-xxl-2">
			<div class="container bg-white rounded p-4 text-center">
				<img src="" id="photo_anggota" height="103px" width="116px" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px;">
			</div>
		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-md-10 col-lg-10 col-xl-10 col-xxl-10">
			<div class="container bg-white ml-5 rounded ps-17 p-9">
				<table>
					<tr class="fs-3" style="color:#464E5F">
						<td class="pt-1 pb-4"><b>Nama</b></td>
						<td class="pt-1 ps-6 pe-1 pb-4"> <b>:</b></td>
						<td class="pt-1 pb-4"> <b id="nama_anggota"></b></td>
					</tr>
					<tr class="fs-3" style="color:#464E5F">
						<td><b>No Induk</b></td>
						<td class=" ps-6"> <b>:</b></td>
						<td> <b id="no_induk"></b></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<!--end::Row-->
	<div class="row g-5 g-xl-5 p-5">
		<div class="col-md-7 col-lg-7 col-xl-7 col-xxl-7 rounded">
			<div class="container bg-white mr-5 rounded p-5">
				<h3 class="d-flex align-items-center"><span class="material-icons me-2" style="color:#264A8A"> text_snippet </span> Informasi Penting</h4>
				<hr>
				<div class="container p-5 pt-0" style="height:15vh">
					<p class="m-0" id="informasi"></p>
				</div>
			</div>
			<div class="row mt-8 w-75">
				<div class="col-5">
					<div class="container rounded-4 p-6" style="background-color:#5F5CF1">
						<span class="text-light svg-icon svg-icon-1">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
								<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
								<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
								<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
							</svg>
						</span>
						<h3 class="text-white mt-5 mb-1"><b id="countPeminjaman"></b></h3>
						<p class="text-white m-0 fs-6">Jumlah Peminjaman</p>
					</div>
				</div>
				<div class="col-5">
					<div class="container bg-white rounded-4 p-6">
						<span class="svg-icon svg-icon-2">
							<span class="fa fa-users fs-2" style="color : rgb(4, 196, 4)"></span>
						</span>
						<h3 class="mt-5 mb-1"><b id="countKunjungan"></b></h3>
						<p class="m-0 fs-6" style="color:#B5B5C3">Jumlah Kunjungan</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-5 col-lg-5 col-xl-5 col-xxl-5 ps-8">
			<div class="container rounded bg-white p-5 h-100">
				<h4>Koleksi Terbaru</h4>
				<div id="carouselExampleIndicators" class="carousel slide h-100" data-bs-ride="carousel">
					<div class="carousel-indicators">
						<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active bg-secondary" aria-current="true" aria-label="Slide 1"></button>
						<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="bg-secondary" aria-label="Slide 2"></button>
						<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="bg-secondary" aria-label="Slide 3"></button>
					</div>
					<div class="carousel-inner h-100">
						<div class="carousel-item h-100 active">
							<div class="d-flex justify-content-center align-items-center h-100">
								<img src="https://cdn.shopify.com/s/files/1/0603/1402/6208/products/ECW004_600x.png?v=1675320701" height="195px" class="d-block w-80" alt="...">
							</div>
						</div>
						<div class="carousel-item h-100">
							<div class="d-flex justify-content-center align-items-center h-100">
								<img src="https://cdn.shopify.com/s/files/1/0603/1402/6208/products/ECW004_600x.png?v=1675320701" height="195px" class="d-block w-80" alt="...">
							</div>
						</div>
						<div class="carousel-item h-100">
							<div class="d-flex justify-content-center align-items-center h-100">
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
	<div class="container-fluid ps-5 pe-5 mt-3">
		<div class="bg-white rounded p-5">
			<div class="table-responsive p-5 row">
				<div class="col">
					<h3 class="pt-3">Data Peminjaman</h3>
				</div>
				<div class="col text-end">
					<a class="btn text-light" style="background-color:#264A8A" href="{{route('cekPinjaman.index')}}"> <i class="fa fa-users text-light"></i> Cek Peminjaman</a>
				</div>
				<table class="table mt-5">
					<thead>
						<tr class="fw-bold fs-6 text-gray-800">
							<th class="text-muted text-center">No</th>
							<th class="text-muted text-center">Judul</th>
							<th class="text-muted text-center">Tanggal Peminjaman</th>
							<th class="text-muted text-center">Tanggal Kembali</th>
							<th class="text-muted text-center">Status</th>
						</tr>
					</thead>
					<tbody id="list_peminjaman">
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

@section('jsAnggota')
@include('anggota.layouts.dashboard.javascript')
@endsection
