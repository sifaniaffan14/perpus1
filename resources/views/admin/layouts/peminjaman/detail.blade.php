<div class="datail_data row gy-5 g-xl-8 d-none">
    <div class="col-12">
        <div class="data-card card pb-6 mb-5 mb-xl-8">
            <div class="card-header">
                <h2 class="text-dark-gray fw-bolder fs-3 d-flex align-items-center gap-5 mb-0">
                    <span class="material-icons" style="color:#264A8A"> text_snippet </span> Data Peminjaman
                </h2>
                <div class="form-action-wrapper d-flex gap-4 align-items-center mt-5 w-50">
                    <button type="button" class="btn btn-outline-primary btn-outline border-2 text-body m-0 fw-bolder w-100 actCreate d-none" onclick="closeForm()"> Batal </button>
                    <button type="button" class="btn btn-primary m-0 d-flex flex-center gap-2 fw-bolder w-100 actCreate d-none" onclick="onSubmitForm()">
                        <span class="material-icons-outlined fs-2">save</span> Simpan 
                    </button>
                    <button type="button" onclick="onDisplayEdit(this)" class="btn btn-outline-warning btn-outline border-2 d-flex flex-center gap-2 m-0 fw-bolder w-100 actEdit">
                        <span class="material-icons-outlined">edit</span> Ubah
                    </button>
                    <button type="button" onclick="onDelete()" class="btn btn-danger m-0 d-flex flex-center gap-2 fw-bolder w-100  actEdit">
                        <span class="material-icons-outlined">delete</span> Hapus
                    </button>
                </div>
            </div>
            <div class="col-8 d-flex">
                <div class="col-lg-12" style="padding: 10vh;">
                    <p id="detail_peminjaman_id" style="display: none"></p>
                    <table style="width: 100%">
                        <tbody style="color: #000000; font-weight:bold">
                            <tr>
                                <td>
                                    <h5> No Induk </h5>
                                </td>
                                <td>
                                    <h5> : </h5>
                                </td>
                                <td>
                                    <h5 id="detail_no_induk"></h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Nama </h5>
                                </td>
                                <td>
                                    <h5> : </h5>
                                </td>
                                <td>
                                    <h5 id="detail_nama_anggota"></h5>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h5>Jenis Anggota</h5>
                                </td>
                                <td>
                                    <h5> : </h5>
                                </td>
                                <td>
                                    <h5 id="detail_jenis_anggota"></h5>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h5>Jumlah Peminjaman</h5>
                                </td>
                                <td>
                                    <h5> : </h5>
                                </td>
                                <td>
                                    <h5 id="detail_peminjaman_jumlah"> buku</h5>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <hr style="width: 80%; margin-top:3vh;text-align: center;  border-top: 2px solid ">
            <div class="header-eksemplar" style="padding:4vh;">
                <h2 style="text-align: center; font-weight:bold;">Data Buku</h2>
            </div>
                <div class="card-body py-0">
                    <table class="table" id="tableEksemplar">
                        <thead>
                            <tr>
                                <th class="fw-bolder" style="max-width: 20px"> No </th>
                                <th class="fw-bolder">Kode Eksemplar</th>
                                <th class="fw-bolder">Judul Buku</th>
                                <th class="fw-bolder">Tgl Pinjam</th>
                                <th class="fw-bolder">Tgl Kembali</th>
                                <th class="fw-bolder">Action</th>
                            </tr>
                        </thead>
                        <tbody id="listTable" name="listTable"></tbody>
                    </table>
                </div>
        </div>
    </div>
</div>