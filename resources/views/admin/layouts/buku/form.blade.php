<div class="form_data row gy-5 g-xl-8 d-none">
    <div class="col-12">
        <div class="card pb-6 mb-5 mb-xl-8">
            <div class="card-header border-0 d-flex align-items-center justify-content-between position-sticky top-0 bg-white" style="z-index: 99;">
                <h2 class="text-dark-gray fw-bolder fs-3 d-flex align-items-center gap-5 mb-0">Tambah Buku</h2>
                <h2 class="text-dark-gray fw-bolder fs-3 d-flex align-items-center gap-5 mb-0 d-none actEdit">Edit Buku</h2>
                <div class="form-action-wrapper d-flex gap-4 align-items-center mt-5 w-50">
                    <button type="button" class="btn btn-outline-primary btn-outline border-2 text-body m-0 fw-bolder w-100 actCreate" onclick="closeForm()"> Batal </button>
                    <button type="button" class="btn btn-primary m-0 d-flex flex-center gap-2 fw-bolder w-100 actCreate" onclick="onSubmitForm()">
                        <span class="material-icons-outlined fs-2">save</span> Simpan 
                    </button>
                    <button type="button" onclick="onDisplayEdit(this)" class="btn btn-outline-warning btn-outline border-2 d-flex flex-center gap-2 m-0 fw-bolder w-100 d-none actEdit">
                        <span class="material-icons-outlined">edit</span> Ubah
                    </button>
                    <button type="button" onclick="onDelete(this)" class="btn btn-danger m-0 d-flex flex-center gap-2 fw-bolder w-100 d-none actEdit" data-roleable="true" data-role="Bandara.Delete">
                        <span class="material-icons-outlined">delete</span> Hapus
                    </button>
                </div>
            </div>
            <div class="card-body py-0">
                <form onsubmit="onSave(event)" class="d-grid gap-8" method="post" id="formBuku" name="formBuku" autocomplete="off" enctype="multipart/form-data" class="d-flex flex-column gap-5">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="d-flex flex-column gap-1">
                        <label for="kode_buku" class="fw-bolder">Kode Buku</label>
                        <input type="text" name="kode_buku" id="kode_buku" required placeholder="Masukkan Kode Buku" class="border-0 py-4 px-5" style="
                                    background-color: #fafafa;
                                    border-radius: 6px;
                                    " required />
                    </div>
                    <div class="d-flex flex-column gap-1">
                        <label for="buku_kategori_id" class="fw-bolder">Kategori Buku</label>
                        <select name="buku_kategori_id" id="buku_kategori_id" class="py-4 ps-5 pe-12 border-0 text-gray w-100 fs-6 text-light-gray" style="
                                    background-color: #fafafa;
                                    border-radius: 6px;
                                    " required>
                        </select>
                    </div>
                    <div class="d-flex flex-column gap-1">
                        <label for="judul" class="fw-bolder">Judul Buku</label>
                        <input type="text" name="judul" id="judul" required placeholder="Masukkan Judul Buku" class="border-0 py-4 px-5" style="
                                    background-color: #fafafa;
                                    border-radius: 6px;
                                    " required />
                    </div>
                    <div class="d-flex flex-column gap-1 fill-2-grid-col-lg">
                        <label for="penerbit" class="fw-bolder">Penerbit</label>
                        <input type="text" name="penerbit" id="penerbit" required placeholder="Masukkan Penerbit Buku" class="border-0 py-4 px-5" style="
                                    background-color: #fafafa;
                                    border-radius: 6px;
                                    " required />
                    </div>
                    <div class="d-flex flex-column gap-1 fill-2-grid-col-lg">
                        <label for="pengarang" class="fw-bolder">Pengarang</label>
                        <input type="text" name="pengarang" id="pengarang" required placeholder="Masukkan Pengarang Buku" class="border-0 py-4 px-5" style="
                                    background-color: #fafafa;
                                    border-radius: 6px;
                                    " required />
                    </div>
                    <div class="d-flex flex-column gap-1 fill-2-grid-col-lg">
                        <label for="halaman" class="fw-bolder">Jumlah Halaman</label>
                        <input type="text" name="halaman" id="halaman" required placeholder="Masukkan Jumlah Halaman" class="border-0 py-4 px-5" style="
                                    background-color: #fafafa;
                                    border-radius: 6px;
                                    " required />
                    </div>
                    <div></div>
                    <div>
                        <div class="d-flex flex-column gap-1">
                            <label class="fw-bolder">Gambar Cover Buku</label>
                            <div class="d-flex align-items-center gap-3">
                                <label for="image" class="d-flex flex-center gap-2 btn btn-primary">
                                    <span class="material-icons fs-3"> upload </span> Pilih File </label>
                                <span class="text-light-gray file-chosen">Tidak ada file terpilih</span>
                                <input id="image" name="image" type="file" hidden accept="image/png, image/gif, image/jpeg, image/jpg"/>
                            </div>
                        </div>
                        <span class="text-danger" id="gambar_error">*gambar format file jpg,png,jpeg - max file 5MB</span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
