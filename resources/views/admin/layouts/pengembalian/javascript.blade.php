<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>

<script>
    var table = 'tablePeminjaman'
    var form = 'formPengembalian'
    var list_table = 'list_table'

    var urlPath = {
        select_anggota: "{{ route('anggota.select') }}",
        select: "{{ route('pengembalian.select') }}",
        select_eksemplar: "{{ route('pengembalian.select_eksemplar') }}",
        update: "{{ route('pengembalian.update') }}",
    }
    $(document).ready(function () {
        $(`#${table}`).DataTable();
        $(`#${list_table}`).DataTable();
    });
    loadData()

    function loadData() {
        $.ajax({
            url: urlPath.select_anggota,
            type: 'GET',
            placeholder: 'Search for a term',
            success: function (response) {
                if(response.status == true){
                        $.each(response.data, function(index, value) {
                            $("#kode_peminjaman").append(`
                                <option value='${value.id}'>${value.no_induk}</option>
                            `);
                        });
                    }
            },
        });
    }

    $(document).ready(function () {
        $('#kode_peminjaman').select2();
    });

    function showData(){
        var id = $("#kode_peminjaman").val();
        $.ajax({
                url: urlPath.select,
                type: 'GET',
                data: {
                    anggota_id:id
                },
                success: function(response){
                if(response.status == true){
                    $('.text-header').removeClass('d-none');
                    $('.header-eksemplar').removeClass('d-none');
                    $('.card-body').removeClass('d-none');

                    data = response.data[0];
                    $('[name=peminjaman_id]').val(data.peminjaman_id);
                    document.getElementById("identitas_peminjam").innerHTML = "";
                    if (data.anggota['no_induk']){
                            $(`#identitas_peminjam`).append(`
                                <div class="d-flex mt-5">
                                    <p class="m-0 fs-5 fw-bolder" style="width:105px">No. Induk</p>
                                    <p class="m-0 fs-5 fw-bolder">&nbsp;:&nbsp;${data.anggota['no_induk']}</p>
                                </div>
                            `)
                        }
                        if (data.anggota['nama_anggota']){
                            $(`#identitas_peminjam`).append(`
                                <div class="d-flex mt-2">
                                    <p class="m-0 fs-5 fw-bolder" style="width:105px">Nama</p>
                                    <p class="m-0 fs-5 fw-bolder">&nbsp;:&nbsp;${data.anggota['nama_anggota']}</p>
                                </div>
                            `)
                        }
                        if (data.anggota['jenis_anggota']){
                            $(`#identitas_peminjam`).append(`
                                <div class="d-flex mt-2 mb-5">
                                    <p class="m-0 fs-5 fw-bolder">Jenis Anggota </p>
                                    <p class="m-0 fs-5 fw-bolder">&nbsp;:&nbsp;${data.anggota['jenis_anggota']}</p>
                                </div>
                            `)
                        }

                    var num = 0;
                    $.each(data.peminjaman_detail, function( k, v ){
                        let peminjaman_status = (v.status_peminjaman==1?`<span class="badge bg-danger">Belum Kembali</span>`:`<span class="badge bg-success">Sudah Kembali</span>`)
                        var eksemplar_id = v.detail_buku.eksemplar_id;
                        let no_panggil = v.detail_buku.no_panggil;
                        let judul = v.detail_buku.buku.judul;
                        var tgl_pinjam = ' '+moment(v.tgl_pinjam).format('DD/MM/YYYY');
                        var tgl_kembali = ' '+moment(v.tgl_kembali).format('DD/MM/YYYY');
                        let html = `<div id="status_${eksemplar_id}">${peminjaman_status}</div>`

            
                        num++
                        let array = [num,no_panggil,judul,tgl_pinjam,tgl_kembali,html]
                        $('#listTable').append(`<tr id="list_buku_${eksemplar_id}"></tr>`)
                        $.each(array, function( key, value ){
                            $('#list_buku_'+ eksemplar_id).append(`<td>${value}</td>`) 
                        })
                        });
                } 
        }
        })
    }

    function onPengembalian(){
        var kode_eksemplar = $('#kode_eksemplar').val()
        $.ajax({
            url: urlPath.select_eksemplar,
            type: 'GET',
            data: {
                no_panggil:kode_eksemplar
            },
            success: function(response){
                data = response.data[0]
                if(response.status){
                    $('#status_'+data['eksemplar_id']).html(`<span class="badge bg-success">Sudah Kembali</span>`)
                    $('#list_buku_'+ data['eksemplar_id']).append(`<td class="d-none">
                        <input type="hidden" name="eksemplar_id[]" value="${data['eksemplar_id']}">
                    </td>`)
                }
            }
        })
    }

    function onSave(){
        swal({
            title: "Peringatan",
            text: "Apakah Anda Yakin Untuk Menyimpan Data?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((response) => {
            if (response) {
                const formElement = $('#formPengembalian')[0];
                const form = new FormData(formElement);
                $.ajax({
                    url: urlPath.update,
                    data: form,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function(response){
                        if(response.status == true){
                            swal("Success !", response.message, "success");
                        } else{
                            swal("Warning", response.message, "warning");
                        }
                    }
                })
            }
        }); 
    }
    
</script>