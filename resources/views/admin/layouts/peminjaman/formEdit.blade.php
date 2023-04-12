

<div>
    <div class="form_data row gy-5 g-xl-8 d-none">
        <div class="col-12">
            <div class="data-card card pb-6 mb-5 mb-xl-8">
                <div class="card-body">
                    <form action="javascript:onUpdate()" name="formPeminjaman" id="formPeminjaman">
                        <div class="card-header">
                            <h2 class="text-dark-gray fw-bolder fs-3 d-flex align-items-center gap-5 mb-0">
                                <span class="material-icons text-primary"> text_snippet </span> Data Buku
                            </h2>
                            <div class="form-action-wrapper d-flex gap-4 align-items-center mt-5 w-50">
                                <button type="button"
                                    class="btn btn-outline-primary btn-outline border-2 text-body m-0 fw-bolder w-100 actCreate"
                                    onclick="closeForm()"> Batal </button>
                                <button type="submit"
                                    class="btn btn-primary m-0 d-flex flex-center gap-2 fw-bolder w-100 actCreate">
                                    <span class="material-icons-outlined fs-2">save</span> Simpan
                                </button>
                                <button type="button" onclick="onDisplayEdit(this)"
                                    class="btn btn-outline-warning btn-outline border-2 d-flex flex-center gap-2 m-0 fw-bolder w-100 d-none actEdit">
                                    <span class="material-icons-outlined">edit</span> Ubah
                                </button>
                                <button type="button" onclick="onDelete(this)"
                                    class="btn btn-danger m-0 d-flex flex-center gap-2 fw-bolder w-100 d-none actEdit"
                                    data-roleable="true" data-role="Bandara.Delete">
                                    <span class="material-icons-outlined">delete</span> Hapus
                                </button>
                            </div>
                        </div>
                        <div class="text-header">
                            <h2 class="text-center mt-3">
                                Data Peminjam
                            </h2>
                        </div>
                        <div >
                            <input type="hidden" name="peminjaman_id">
                            <div>
                                <label for="anggota_id" class="fs-4">No. Induk</label>
                                <div>
                                    <select name="anggota_id" id="anggota_id" style="width: 100%" class="form-control">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-content" id="identitas_peminjam">
                            <p id="nama_anggota_detail" name="nama_anggota"></p>
                            <p id="jenis_anggota_detail" name="jenis_anggota"></p>
                        </div>

                        <hr style="width: 100%; margin:3vw 0;text-align: center;  border-top: 2px solid grey ">
                        
                        <div class="text-header">
                            <h2 class="text-center">
                                Data List Pinjaman
                            </h2>
                        </div>
                        <div class="row mt-6">
                            <div class="col-6">
                                <label for="start">Tgl Pinjam:</label>
                                <input type="date" class="form-control" name="tgl_pinjam" placeholder="dd-mm-yyyy" value="">
                            </div>
                            <div class="col-6">
                                <label for="start">Tgl Kembali:</label>
                                <input type="date" class="form-control" name="tgl_kembali" placeholder="dd-mm-yyyy" value="">
                            </div>
                        </div>
                        <div class="row mt-6">
                            <label for="kode_eksemplar">Kode Eksemplar</label>
                            <input type="text" class="form-control" id="kode_eksemplar"
                                placeholder="Masukkan Kode Eksemplar" />
                        </div>
                        <div class="card-body py-0">
                            <table class="table" id="tablePinjamanEdit">
                                <thead>
                                    <tr>
                                        <th class="fw-bolder" style="max-width: 20px"> No </th>
                                        <th class="fw-bolder">Kode Eksemplar</th>
                                        <th class="fw-bolder">Judul Buku</th>
                                        <th class="fw-bolder">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="list_pinjaman"></tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

