<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{--
<script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
{{--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> --}}
{{--
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script> --}}
{{--
<script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>

<script>
    var index = 0
    var table = 'tablePeminjaman'
    var form = 'formPeminjaman'
    var list_table = 'list_table'

    var urlPath = {
        insert: "{{ route('peminjaman.insert') }}",
        update: "{{ route('peminjaman.update') }}",
        select: "{{ route('peminjaman.select') }}",
        delete: "{{ route('peminjaman.delete') }}",
        getAnggota: "{{ route('peminjaman.getAnggota') }}",
        selectAnggota: "{{ route('peminjaman.selectAnggota') }}",
        selectEksemplar: "{{ route('peminjaman.selectEksemplar') }}",
        detailPeminjaman: "{{ route('detailPeminjaman.select') }}",
    }
    $(document).ready(function () {
        $(`#${table}`).DataTable();
        $(`#${list_table}`).DataTable();
    });
    inittable()
    loadData()

    function inittable() {
        
        $.ajax({
            url: urlPath.select,
            type: 'GET',
            success: function (response) {
                if (response.status == true) {
                    $('#list_table').html('')
                    $.each(response.data, function (k, v) {
                        $('#list_table').append(`
                                    <tr onclick=onDetail('${v.peminjaman_id}') style="cursor:pointer">
                                        <td>${k + 1}</td>
                                        <td>${v.nama_anggota}</td>
                                        <td>${v.peminjaman_jumlah}</td>
                                        <td>${v.peminjaman_belum_kembali}</td>
                                        <td>${v.peminjaman_sudah_kembali}</td>
                                        <td>${v.peminjaman_status}</td>     
                                    </tr>
                                `)
                    });
                }
            }
        })
    }

    function onDetail(peminjaman_id){
        $.ajax({
            url: urlPath.select,
            type: 'GET',
            data: {
                peminjaman_id: peminjaman_id
            },
            success: function(response){
                if(response.status == true){
                    onDisplayDetail()
                    tableBukuPinjaman();
                    $.each(response.data[0], function( k, v ){
                        $('#detail_'+k).html(v)
                        // if(k!='COUNT(peminjaman_details.peminjaman_detail_peminjaman_id)'){

                        //                         }
                    });
                } 
            }
        })
    }

    onDisplayDetail = () => {
        $('.datail_data').removeClass('d-none');
        $('.main_data').addClass('d-none');
	}

    function tableBukuPinjaman(){
        // alert(detail_buku_id)
        $.ajax({
            url: urlPath.select,
            type: 'GET',
            
            success: function(response){
                if(response.status == true){
                    $('#listTable').html('')
                    data = response.data[0];
                    console.log(data)
                    $.each(data.eksemplar, function( k, v ){
                       
                        $('#listTable').append(`
                            <tr>
                                <td>${k+1}</td>
                                <td>${v.no_panggil}</td>
                                <td>${v.judul}</td>
                                <td>${v.tgl_pinjam}</td>
                                <td>${v.tgl_kembali}</td>
                                <td> 
                                    <button onclick="hapusEksemplar('${v.peminjaman_detail_id}')" methode="post" class="btn btn-danger btn-hapus" name="btn-hapus" id="btn-hapus" disabled><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        `) 
                    // });
                });
                } 
            }
        })
    }

   
    function onDelete(){
        swal({
            title: "Peringatan",
            text: "Apakah Anda Yakin Untuk Menghapus Data?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((response) => {
            if (response) {
                $peminjaman_id = $('#detail_peminjaman_id').html()
                $.ajax({
                    url: urlPath.delete,
                    data: {
                        _token: "{{ csrf_token() }}",
                        peminjaman_id : $peminjaman_id,
                    },
                    type: 'POST',
                    success: function(response){
                        if(response.status == true){
                            swal("Success !", response.message, "success");
                            onRefresh()
                        } else{
                            swal("Warning", response.message, "warning");
                        }
                    }
                })
            }
        }); 
    }

    function tableEditBukuPinjaman(){
        $.ajax({
            url: urlPath.select,
            type: 'GET',
            success: function(response){
                if(response.status == true){
                    console.log(response)
                    var data=response.data
                    if($('#'+data.detail_buku_id).length != 1){
                    $('#list_pinjaman').html('')
                    $.each(response.data, function( k, v ){
                        $('#list_pinjaman').append(`
                            <tr id="${v.detail_buku_id}">
                                <td>${k+1}</td>
                                <td>${v.no_panggil}</td>
                                <td>${v.judul}</td>
                                <td style="display:none">
                                    <input type="text" name="peminjaman_detail_id[]" value="${v.detail_buku_id}">
                                </td>
                                <td> 
                                    <button onclick="hapusEksemplar('${v.detail_buku_id}')" methode="post" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        `) 
                    });
                } else{
                    swal("Warning", 'data sudah ada', "warning");
                }
                } 
            }
        })
    }
    
    function onEdit(peminjaman_id,peminjaman_detail_id){
        $.ajax({
            url: urlPath.select,
            type: 'GET',
            data: {
                peminjaman_id: peminjaman_id
            },
            success: function(response){
                if(response.status == true){
                    $.each(response.data[0], function( k, v ){
                        $('[name='+k+']').html(v)
                        $('[name='+k+']').val(v)
                    });
                } 
            }
        })
        $.ajax({
            url: urlPath.detailPeminjaman,
            type: 'GET',
            data: {
                peminjaman_detail_id: peminjaman_detail_id
            },
            success: function(response){
                if(response.status == true){
                    $('#list_pinjaman').html('')
                    var data = response.data[0];
                    var nomer = 0;
                    $.each(data, function(index, item){
                        // console.log(item)
                        $('[name='+index+']').val(item)
                        tableEditBukuPinjaman()
                        // nomer++;
                        // $('#list_pinjaman').append(`
                        //     <tr>
                        //         <td>${nomer}</td>
                        //         <td name="no_panggil">${item}</td>
                        //         <td name="judul">${item}</td>
                        //         <td> 
                        //             <a onclick="hapusEksemplar('${item.peminjaman_detail_id}')" methode="post" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                        //         </td>
                        //     </tr>
                        // `) 
                        // $('[name='+index+'').text(item);
                    });
                } 
            }
        })
    }

    onDisplayEdit = () => {
		$('.actEdit').addClass('d-none');
        $('.actCreate').removeClass('d-none');
        $(`#${form} input`).removeAttr('disabled', 'disabled')
        $('.datail_data').addClass('d-none');
        $('.form_data').removeClass('d-none');
        onEdit();
        loadData();
	}

    function onRefresh(){
        $('.main_data').removeClass('d-none');
        $('.detail_data').addClass('d-none');
        inittable()
    }
    // $(document).ready(function () {
    //     $("#search_no_induk").select2({
    //         ajax: {
    //             url: urlPath.getAnggota,
    //             dataType: 'json',
    //             delay: 250,
    //             processResults: function (data) {
    //                 console.log(data)
    //                 return {
    //                     results: data.data
    //                 };
    //             },
    //         }
    //     });
    // });

    $(document).ready(function () {
        $('#anggota_id').select2({
            placeholder: 'Select an option',
        });
        $('#anggota_id').change(function() {
            var selectedOptionValue = $(this).val();
            $.ajax({
                url: urlPath.selectAnggota,
                type: 'GET',
                data: {
                    id:selectedOptionValue
                },
                success: function(response){
                if(response.status == true){
                    document.getElementById("identitas_peminjam").innerHTML = "";
                    $.each(response.data[0], function( k, v ){
                        if (k == 'nama_anggota'){
                            $(`#identitas_peminjam`).append(`
                            <div class="d-flex mt-5">
                                <p class="m-0 fs-5 fw-bolder" style="width:105px">Nama</p>
                                <p class="m-0 fs-5 fw-bolder">&nbsp;:&nbsp;${v}</p>
                            </div>
                            `)
                        }
                        if (k == 'jenis_anggota'){
                            $(`#identitas_peminjam`).append(`
                            <div class="d-flex mt-2 mb-5">
                                <p class="m-0 fs-5 fw-bolder">Jenis Anggota </p>
                                <p class="m-0 fs-5 fw-bolder">&nbsp;:&nbsp;${v}</p>
                            </div>
                            `)
                        }
                        // $('#'+k+"_detail").html(v)
                    });
                } 
            }
            })
        });
    });

    function loadData() {
        $.ajax({
            url: urlPath.getAnggota,
            type: 'GET',
            placeholder: 'Search for a term',
            success: function (response) {
                if(response.status == true){
                        var options = "";
                        $.each(response.data, function(index, value) {
                            options += "<option value='" + value.id + "'>" + value.no_induk + "</option>";
                        });
                        $("#anggota_id").append(options);
                        var get = $("#anggota_id option:selected").val()
                    }
            },
        });
    }

    $(document).ready(function() {
    $('#kode_eksemplar').keypress(function(event) {
        if (event.keyCode === 13) { // keycode untuk tombol enter adalah 13
            event.preventDefault(); // menghindari submit form
            var kode_eksemplar = $(this).val();
            $.ajax({
                url: urlPath.selectEksemplar,
                type: 'GET',
                data: {
                    no_panggil:kode_eksemplar
                },
                success: function(response){
                if (response.status == true) {
                    // $('#list_pinjaman').html('')
                var data=response.data[0]
                    if($('#'+data.eksemplar_id).length != 1){
                        index = index + 1;
                        $("#kode_eksemplar").val('');
                        $('#list_pinjaman').append(`
                            <tr id="${data.eksemplar_id}">
                                <td class="text-center">${index}</td>
                                <td class="text-center">${data.no_panggil}</td>
                                <td class="text-center">${data.judul}</td>
                                <td class="d-none">
                                    <input type="hidden" name="eksemplar_id[]" value="${data.eksemplar_id}">
                                </td>
                                <td class="text-center">
                                    <a onclick="hapusEksemplar('${data.eksemplar_id}')" methode="post" class="btn btn-danger" style="padding:5px 2.5px 6px 6px"> <i class="bi bi-trash fs-4"></i></a>
                                </td>
                            </tr>
                        `)
                    } else{
                        swal("Warning", 'data sudah ada', "warning");

                    }
                } else{
                    swal("Warning", response.message, "warning");
                }
            }
            })
        }
    });
  });

    function hapusEksemplar(eksemplar_id){
        $('#'+eksemplar_id).remove();
    }

    function onSave(){
        // event.preventDefault()
        swal({
            title: "Peringatan",
            text: "Apakah Anda Yakin Untuk Menyimpan Data?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((response) => {
            if (response) {
                const formElement = $('#formPeminjaman')[0];
                const form = new FormData(formElement);

                // urlSave = $('[name=peminjaman_id]').val()  == ''? urlPath.insert:urlPath.update;
                $.ajax({
                    url: urlPath.insert,
                    data: form,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function(response){
                        if(response.status == true){
                            onRefresh()
                            swal("Success !", response.message, "success");
                        } else{
                            swal("Warning", response.message, "warning");
                        }
                    }
                })
            }
        }); 
    }

    function onUpdate(){
        swal({
            title: "Peringatan",
            text: "Apakah Anda Yakin Untuk Menyimpan Data?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((response) => {
            if (response) {
                const formElement = $('#formPeminjaman')[0];
                const form = new FormData(formElement);
                $.ajax({
                    url: urlPath.update,
                    data: form,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function(response){
                        if(response.status == true){
                            onRefresh()
                            swal("Success !", response.message, "success");
                        } else{
                            swal("Warning", response.message, "warning");
                        }
                    }
                })
            }
        }); 
    }

    function onClear(){
        $(`#${form}`)[0].reset();
        $("#list_pinjaman").html('')
        $("#nama_anggota_detail").html('')
        $("#jenis_anggota_detail").html('')
        $('#anggota_id').val(null).trigger('change.select2');
    }

</script>