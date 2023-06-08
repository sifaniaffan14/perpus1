@extends('anggota.master.app')

@section('content2')

<div id="kt_app_content_container" class="app-container container-fluid me-10">
								<!--begin::Row-->
								<div class="container-fluid">
                                    <div class="ms-2 me-2 bg-white rounded mb-5 p-5">
                                        <div class="row p-3">
                                            <div class="col-4">
                                                <form data-kt-search-element="form" class="d-lg-block w-100 mb-5 mb-lg-0 position-relative border border-dark border-1 rounded" autocomplete="off" style="border-radius: 40px;">	
                                                    <!--begin::Hidden input(Added to disable form autocomplete)-->
                                                    <input type="hidden" class="">
                                                    <!--end::Hidden input-->

                                                    <!--begin::Icon-->
                                                    <i class="ki-duotone ki-magnifier fs-2 text-gray-500 position-absolute top-50 translate-middle-y ms-4"><span class="path1"></span><span class="path2"></span></i>        <!--end::Icon-->

                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid h-40px bg-body ps-13 fs-7" name="search" value="" placeholder="Cari Buku Disini..." data-kt-search-element="input">
                                                    <!--end::Input-->

                                                    <!--begin::Spinner-->
                                                    <span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5" data-kt-search-element="spinner">
                                                        <span class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
                                                    </span>
                                                    <!--end::Spinner-->

                                                    <!--begin::Reset-->
                                                    <span class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-4" data-kt-search-element="clear">
                                                        <i class="ki-duotone ki-cross fs-2 me-0"><span class="path1"></span><span class="path2"></span></i>        </span>
                                                    <!--end::Reset-->
                                                </form>
                                            </div>
                                            <div class="col-1">
                                                <button class="btn btn-info" style="border-radius: 40px;">
                                                    Search
                                                </button>
                                            </div>
                                            <div class="col-1 ms-5">
                                                <button class="btn btn-danger" style="border-radius: 40px;">
                                                    Clear
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<!--end::Row-->
                                <div class="container-fluid ps-5 pe-5">
									<div class="bg-secondary rounded">
                                        <div class="p-5 rounded-top" style="background-color: #015aaa;">
                                            <h2 class="text-white">Hasil Pencarian Buku</h2>
                                        </div>
                                        
                                        <div class="bg-white p-5">
                                            <div class="row container m-5 p-5">
                                                <div class="col-4 mt-5">
                                                    <div class="row">  
                                                        <div class="col">
                                                            <img src="https://yrama-widya.co.id/wp-content/uploads/2016/08/Biologi-peminatan-X.jpg" height="200px" width="150px" alt="">
                                                        </div>
                                                        <div class="col">
                                                            <h3><b>Judul Buku</b></h3>
                                                            <h5><b>Penerbit</b></h5>
                                                            <br>
                                                            <span class="svg-icon svg-icon-2">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                                                                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                                                                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
                                                                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
                                                                </svg>
													        </span>
                                                            <span><b>Kategori</b></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4 mt-5">
                                                    <div class="row">  
                                                        <div class="col">
                                                            <img src="https://yrama-widya.co.id/wp-content/uploads/2016/08/Biologi-peminatan-X.jpg" height="200px" width="150px" alt="">
                                                        </div>
                                                        <div class="col">
                                                            <h3><b>Judul Buku</b></h3>
                                                            <h5><b>Penerbit</b></h5>
                                                            <br>
                                                            <span class="svg-icon svg-icon-2">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                                                                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                                                                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
                                                                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
                                                                </svg>
													        </span>
                                                            <span><b>Kategori</b></span>
                                                        </div>
                                                    </div>
                                                </div><div class="col-4 mt-5">
                                                    <div class="row">  
                                                        <div class="col">
                                                            <img src="https://yrama-widya.co.id/wp-content/uploads/2016/08/Biologi-peminatan-X.jpg" height="200px" width="150px" alt="">
                                                        </div>
                                                        <div class="col">
                                                            <h3><b>Judul Buku</b></h3>
                                                            <h5><b>Penerbit</b></h5>
                                                            <br>
                                                            <span class="svg-icon svg-icon-2">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                                                                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                                                                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
                                                                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
                                                                </svg>
													        </span>
                                                            <span><b>Kategori</b></span>
                                                        </div>
                                                    </div>
                                                </div><div class="col-4 mt-5">
                                                    <div class="row">  
                                                        <div class="col">
                                                            <img src="https://yrama-widya.co.id/wp-content/uploads/2016/08/Biologi-peminatan-X.jpg" height="200px" width="150px" alt="">
                                                        </div>
                                                        <div class="col">
                                                            <h3><b>Judul Buku</b></h3>
                                                            <h5><b>Penerbit</b></h5>
                                                            <br>
                                                            <span class="svg-icon svg-icon-2">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                                                                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                                                                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
                                                                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
                                                                </svg>
													        </span>
                                                            <span><b>Kategori</b></span>
                                                        </div>
                                                    </div>
                                                </div><div class="col-4 mt-5">
                                                    <div class="row">  
                                                        <div class="col">
                                                            <img src="https://yrama-widya.co.id/wp-content/uploads/2016/08/Biologi-peminatan-X.jpg" height="200px" width="150px" alt="">
                                                        </div>
                                                        <div class="col">
                                                            <h3><b>Judul Buku</b></h3>
                                                            <h5><b>Penerbit</b></h5>
                                                            <br>
                                                            <span class="svg-icon svg-icon-2">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                                                                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                                                                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
                                                                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
                                                                </svg>
													        </span>
                                                            <span><b>Kategori</b></span>
                                                        </div>
                                                    </div>
                                                </div><div class="col-4 mt-5">
                                                    <div class="row">  
                                                        <div class="col">
                                                            <img src="https://yrama-widya.co.id/wp-content/uploads/2016/08/Biologi-peminatan-X.jpg" height="200px" width="150px" alt="">
                                                        </div>
                                                        <div class="col">
                                                            <h3><b>Judul Buku</b></h3>
                                                            <h5><b>Penerbit</b></h5>
                                                            <br>
                                                            <span class="svg-icon svg-icon-2">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                                                                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                                                                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
                                                                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
                                                                </svg>
													        </span>
                                                            <span><b>Kategori</b></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

										<div class="bg-white pb-5">
											<nav aria-label="Page navigation">
											<ul class="pagination justify-content-end">
												<li class="page-item disabled">
												<a class="page-link" href="#" tabindex="-1" aria-disabled="true"><</a>
												</li>
												<li class="page-item active" aria-current="page">
												<a class="page-link" href="#">1</a>
												</li>
												<li class="page-item">
												<a class="page-link" href="#">2</a>
												</li>
												<li class="page-item">
												<a class="page-link" href="#">></a>
												</li>
											</ul>
										</nav>
										</div>
									</div>
								</div>
							</div>
@endsection