@extends('anggota.master.app')

@section('content2')

<form action="">
    <div class="row g-5 g-xl-10">
        <!--begin::Col-->
        <div class="col-md-4 col-xxl-4">
            <!--begin::Card widget 20-->
            <div class="card">
                <!--begin::Card body-->
                <div class="card-body d-flex flex-center flex-column py-9 px-5">
                    <!--begin::Avatar-->
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline image-input-circle mb-5" data-kt-image-input="true">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/avatars/300-1.jpg)"></div>
                            <!--end::Preview existing avatar-->
                             <!--begin::Remove-->
                             <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px shadow" style="background-color:#DC3545" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar" data-kt-initialized="1">
                                <i class="bi bi-x fs-2" style="color:rgb(255, 255, 255)"></i>
                            </span>
                            <!--end::Remove-->
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px shadow" style="background-color:#264A8A" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-kt-initialized="1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" style="color: rgb(249, 249, 249)"><rect x="0" y="0" width="24" height="24" fill="none" stroke="none" /><path fill="currentColor" d="M4 4h3l2-2h6l2 2h3a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2m8 3a5 5 0 0 0-5 5a5 5 0 0 0 5 5a5 5 0 0 0 5-5a5 5 0 0 0-5-5m0 2a3 3 0 0 1 3 3a3 3 0 0 1-3 3a3 3 0 0 1-3-3a3 3 0 0 1 3-3Z"/></svg>
                                <!--begin::Inputs-->
                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                <input type="hidden" name="avatar_remove">
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->
                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-kt-initialized="1">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel-->
                           
                        </div>
                        <!--end::Image input-->
                  
                    <!--end::Avatar-->
                    <!--begin::Name-->
                    <a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">Muhammad Sifani Affan</a>
                    <!--end::Name-->
                    <!--begin::Position-->
                    <div class="fw-semibold text-gray-400 mb-6">201810370311130</div>
                    <!--end::Position-->
                    <!--begin::Info-->
                    
                <div class="fv-row row mb-6 pt-6 px-6">
                    <h4>Profile Detail</h4>
                    <label class="col-form-label required">Username</label>
                    <div class="col-lg-12">
                        <input type="text" name="username" class="form-control form-control-sm" placeholder="Username"
                            required />
                    </div>
                </div>

                <div class="fv-row row mb-6 px-6">
                    <h4>Ubah Password</h4>
                    <label class="col-form-label required">Password Lama</label>
                    <div class="col-lg-12">
                        <input type="password" name="oldPass" class="form-control form-control-sm" placeholder="Password Lama" required />
                    </div>
                    <div class="fv-row" data-kt-password-meter="true" id="kt_password_meter_control">
                        <div class="mb-1">
                            <label class="col-form-label required">
                                Password Baru
                            </label>
                            <div class="position-relative mb-3">
                                <input class="form-control form-control-sm" type="password" onkeyup="comparePass()" placeholder="" name="newPass" autocomplete="off" />
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                    <i class="bi bi-eye-slash fs-2"></i>
        
                                    <i class="bi bi-eye fs-2 d-none"></i>
                                </span>
                            </div>
        
                            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                            </div>
                        </div>
        
                        <div class="text-muted">
                            Gunakan 8 karakter atau lebih dengan campuran huruf, angka & simbol.
                        </div>
                    </div>
                    <div class="fv-row">
                        <div class="input-group has-validation mb-5">
                            <label class="col-form-label required">Tulis Ulang Password Baru</label>
                            <div class="col-lg-12">
                                <input type="password" onkeyup="comparePass()" name="renewPass" class="form-control form-control-sm" placeholder="Tulis Ulang Password Baru" required />
                                <div id="validationServerrenewPassFeedback" class="invalid-feedback">Password tidak cocok.</div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!--end::Info-->
                    <!--begin::Follow-->
                    <div class="col-lg-12 text-lg-end">
                        <button type="button" id="btnSimpan" class="btn text-light fs-8" style="background-color:#264A8A">
                            <i class="fa-sharp fa-regular fa-floppy-disk text-light fs-3"></i> Simpan 
                        </button>
                    </div>
                    <!--end::Follow-->
                </div>
                <!--begin::Card body-->
            </div>
            <!--end::Card widget 7-->
        </div>
</form>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-7 mb-xl-10">
            <!--begin::Table widget 14-->
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h4 class="card-title">
                        Biodata
                    </h4>
                    <div class="card-toolbar">
                        <div class="example-tools justify-content-center">
                            <span class="example-toggle" data-toggle="tooltip" title="" data-original-title="View code"></span>
                            <span class="example-copy" data-toggle="tooltip" title="" data-original-title="Copy code"></span>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="form">
                    <div class="card-body">
                        <div class="form-group row pt-3">
                            <div class="col-lg-6">
                                <label>Nama Lengkap:</label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap">
                                {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
                            </div>
                            <div class="col-lg-6">
                                <label>Jenis Kelamin:</label>
                                <select class="form-control" name="jenisKelamin">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
                            </div>
                        </div>
                        <div class="form-group row pt-6">
                            <div class="col-lg-6">
                                <label>Tempat Lahir:</label>
                                <input type="text" class="form-control" placeholder="Masukkan Tempat Lahir">
                                {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
                            </div>
                            <div class="col-lg-6">
                                <label>Tanggal Lahir:</label>
                                <input class="form-control" type="date" value="" id="tanggalLahir">
                                {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
                            </div>
                        </div>
                        <div class="form-group row pt-6">
                            <div class="col-lg-6">
                                <label>Alamat:</label>
                                <input type="text" class="form-control" placeholder="Masukkan Alamat">
                                {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
                            </div>
                            <div class="col-lg-6">
                                <label>Email:</label>
                                <input type="email" class="form-control" placeholder="Masukkan Email">
                                {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
                            </div>
                        </div>
                        <div class="form-group row pt-6">
                            <div class="col-lg-6">
                                <label>Nomor Telepon:</label>
                                <input type="text" class="form-control" placeholder="Masukkan Nomor Telepon">
                                {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-12 text-lg-end">
                                <button type="button" id="" class="btn text-light fs-8" style="background-color:#264A8A">
                                    <i class="fa-sharp fa-regular fa-floppy-disk text-light fs-3"></i> Simpan 
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Table widget 14-->
        </div>
        <!--end::Col-->
    </div>

@endsection

@section('jsAnggota')
@include('anggota.layouts.profile.javascript')
@endsection