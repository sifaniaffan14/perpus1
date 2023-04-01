<div class="datail_data row gy-5 g-xl-8 d-none">
    <div class="col-12">
        <div class="data-card card pb-6 mb-5 mb-xl-8">
            <div class="card-header">
                <h2 class="text-dark-gray fw-bolder fs-3 d-flex align-items-center gap-5 mb-0">
                    <span class="material-icons text-primary"> text_snippet </span> Data Buku
                </h2>
            </div>
            <div class="col-8 d-flex">
                <div class="col-lg-5" style="padding: 10vh;">
                    <img src="{{ asset('images/undraw_posting_photo.svg') }}" alt="" style="width: 100%; ">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, itaque?</p>
                </div>
                <svg id="barcode"></svg>

                <div class="col-lg-12" style="padding: 10vh;">
                    <p id="detail_id" style="display:none;"></p>
                    <table style="width: 100%">
                        <tbody style="color: #000000; font-weight:bold">
                            <tr>
                                <td>
                                    <h5> Kode Buku </h5>
                                </td>
                                <td>
                                    <h5> : </h5>
                                </td>
                                <td>
                                    <h5 id="detail_kode_buku"></h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Kategori Buku</h5>
                                </td>
                                <td>
                                    <h5> : </h5>
                                </td>
                                <td>
                                    <h5 id="detail_nama_kategori"></h5>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h5>Judul Buku</h5>
                                </td>
                                <td>
                                    <h5> : </h5>
                                </td>
                                <td>
                                    <h5 id="detail_judul"></h5>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h5>Penerbit</h5>
                                </td>
                                <td>
                                    <h5> : <h5>
                                </td>
                                <td>
                                    <h5 id="detail_penerbit"></h5>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h5>Pengarang</h5>
                                </td>
                                <td>
                                    <h5> : </h5>
                                </td>
                                <td>
                                    <h5 id="detail_pengarang"></h5>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h5>Jumlah Halaman Buku</h5>
                                </td>
                                <td>
                                    <h5> : </h5>
                                </td>
                                <td>
                                    <h5 id="detail_halaman"></h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bottom" style=" margin-left:5vh">
                    <button type="button" onclick="closeDisplayDetail()" class="btn btn-primary">kembali</button>
                    <button type="button" onclick="onEdit(this)" class="btn btn-warning">Edit <i class="bi bi-pencil-square"></i></button>
                    <button onclick="onDelete(this)" class="btn btn-danger">Hapus <i class="bi bi-trash"></i></button>
            </div>
            <hr style="width: 80%; margin-top:3vh;text-align: center;  border-top: 2px solid ">
            <div class="header-eksemplar" style="padding:4vh;">
                <h2 style="text-align: center; font-weight:bold;">Detail Eksemplar</h2>
                <form action="" method="POST">
                    @csrf
                    <button type="submit" id="btnSelectedRows" style="float:right" class="btn btn-warning">Cetak Barcode</button>
                    <button type="button" style="float:right" class="btn btn-primary" onclick="showModal()">+ Create New</a></button>
            </div>
            <div class="card-body py-0">
                <table class="table" id="tableEksemplar">
                    <thead>
                        <tr>
                            <th class="fw-bolder" style="max-width: 20px"> No </th>
                            <th class="fw-bolder">Kode Eksemplar</th>
                            <th class="fw-bolder">Status</th>
                            <th class="fw-bolder">kondisi</th>
                            <th class="fw-bolder">Tanggal Pinjam</th>
                            <th class="fw-bolder">Tanggal Kembali</th>
                            <th class="fw-bolder">Barcode</th>
                            <th class="fw-bolder">Action</th>
                        </tr>
                    </thead>
                    <tbody id="listTable"></tbody>
                </table>
            </div>
            {{-- <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Eksemplar</th>
                            <th>Status</th>
                            <th>kondisi</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Action</th>
                            <th>Pilih Barcode</th>
                        </tr>
                    </thead>
                    <tbody id="isiTable">
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>-</td>
                            <td>-</td>
                            <td>
                                <button type="button" class="btn btn-warning" onclick="editEksemplar()">Edit<i class="bi bi-pencil-square"></i></button>
                                <a onclick="hapusEksemplar()" methode="post" class="btn btn-danger">Hapus <i class="bi bi-trash"></i></a>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" name="detail_check[]" type="checkbox" value="" id="flexCheckDefault">

                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}
            </form>
        </div>
    </div>
</div>





<div class="modal fade" id="form_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="javascript:saveEksemplar()" id="formEksemplar" name="formEksemplar" method="POST">
                @csrf
                  <input type="text" class="form-control" id="buku_id" name="buku_id">
                <div class="form-group">
                    <label for="no_panggil" class="col-form-label">Kode Eksemplar Buku</label>
                    <td><input class="form-control" type="hidden" name="eksemplar_id" id="eksemplar_id"></td>
                    <input type="text" class="form-control" id="no_panggil" name="no_panggil">
                  </div>
                <div class="form-group">
                  <label for="status" class="col-form-label">Status</label>
                  <input class="form-control" id="status" name="status">
                </div>
                <div class="form-group">
                    <label for="kondisi" class="col-form-label">Kondisi</label>
                    <input class="form-control" id="kondisi" name="kondisi">
                  </div>
              
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="hideModal()">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
      </div>
    </div>
  </div> 