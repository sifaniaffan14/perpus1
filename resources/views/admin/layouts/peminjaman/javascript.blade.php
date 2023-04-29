<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{--
<script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
{{--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> --}}
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script> 
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script> 
<script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script> 
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
    inittable()
    loadData()

    // $(document).ready(function () {
    //     $('#anggota_id').select2();
    // });

    function inittable() {  
        $(document).ready(function() {
            var dataTable = $('#tablePeminjaman').DataTable( {
                "ajax": {
                    "url": urlPath.select,
                    "type": "GET",
                    "dataSrc": function (response) {
                        var data = processData(response);
                        return data;
                    }
                },
                "columns": [
                    { "data": "No" },
                    { "data": "Nama Peminjam" },
                    { "data": "Jumlah Buku" },
                    { "data": "Belum Kembali" },
                    { "data": "Sudah Kembali" },
                    { "data": "Status" },
                    { "data": "Detail" }
                ]
            } );
            
            function processData(response) {
                var data = [];
                var num = 0;
                $.each(response.data, function( k, v ){
                    let jsonString = JSON.stringify(v);
                    let encode = btoa(jsonString)
                    // console.log(encode)

                    num++;
                    let peminjaman_status = (v.peminjaman_jumlah==v.peminjaman_sudah_kembali?`<span class="badge bg-success">Sudah Kembali</span>`:`<span class="badge bg-danger">Belum Kembali</span>`)
                    var row = {
                        "No": num,
                        "Nama Peminjam": v.anggota.nama_anggota,
                        "Jumlah Buku": v.peminjaman_jumlah,
                        "Belum Kembali": v.peminjaman_belum_kembali,
                        "Sudah Kembali": v.peminjaman_sudah_kembali,
                        "Status": peminjaman_status,
                        "Detail": `<button onclick=onDetail('${encode}') class="btn btn-primary btn-detail p-1 ps-2" name="btn-detail" id="btn-detail"><i class="bi bi-arrow-right fs-2"></i></button>`
                    };
                    data.push(row);
                })
                return data;
            }

            function searchFunction() {
                const input = document.getElementById("search_peminjaman").value;        
                dataTable.search(input).draw();
            }

            document.getElementById("search_peminjaman").addEventListener("input", searchFunction);
        } );   
    }

    var num = 0;
    function onDetail(encode){
        let decode = atob(encode)
        let data = JSON.parse(decode);
        $('[name=peminjaman_id]').val(data.peminjaman_id)
        onDisplayDetail()
        
        if (data.anggota['no_induk']){
            $('#detail_no_induk').html("No. Induk&nbsp;&nbsp;:&nbsp;&nbsp;"+data.anggota['no_induk'])
        }
        if (data.anggota['nama_anggota']){
            $('#detail_nama_anggota').html("Nama&nbsp;&nbsp;:&nbsp;&nbsp;"+data.anggota['nama_anggota'])
        }
        if (data.anggota['jenis_anggota']){
            $('#detail_jenis_anggota').html("Jenis Anggota&nbsp;&nbsp;:&nbsp;&nbsp;"+data.anggota['jenis_anggota'])
        }
        if (data.peminjaman_detail.length){
            $('#detail_peminjaman_jumlah').html("Jumlah Peminjaman&nbsp;&nbsp;:&nbsp;&nbsp;"+data.peminjaman_detail.length)
        }

        $.each(data.peminjaman_detail, function( k, v ){
            var eksemplar_id = v.detail_buku.eksemplar_id;
            let no_panggil = v.detail_buku.no_panggil;
            let judul = v.detail_buku.buku.judul
            let html = `<a onclick="hapusEksemplar('list_buku_${eksemplar_id}')" methode="post" class="btn btn-danger"> <i class="bi bi-trash"></i></a>`
           
            $('[name=tgl_pinjam]').val(moment(v.tgl_pinjam).format('DD-MM-YYYY'))
            $('[name=tgl_kembali]').val(moment(v.tgl_kembali).format('DD-MM-YYYY'))
            
            num++
            let array = [num,no_panggil,judul,moment(v.tgl_pinjam).format('DD-MM-YYYY'),moment(v.tgl_kembali).format('DD-MM-YYYY'),html]
            $('#list_pinjaman').append(`<tr class="text-center" id="list_buku_${eksemplar_id}"></tr>`)
            $('#list_detail').append(`<tr class="text-center" id="detail_${eksemplar_id}"></tr>`)
            $.each(array, function( key, value ){
                if(key != 3 && key != 4){
                    $('#list_buku_'+ eksemplar_id).append(`<td>${value}</td>`)
                }

                if(key != 5){
                    $('#detail_'+ eksemplar_id).append(`<td>${value}</td>`)
                }  
            })

            $('#list_buku_'+ eksemplar_id).append(`<td class="d-none">
                <input type="hidden" name="eksemplar_id[]" value="${eksemplar_id}">
            </td>`)
        });
    }
    onDisplayDetail = () => {
        $('.datail_data').removeClass('d-none');
        $('.main_data').addClass('d-none');
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

    // function tableBukuPinjaman(){
    //     // alert(detail_buku_id)
    //     $.ajax({
    //         url: urlPath.select,
    //         type: 'GET',
            
    //         success: function(response){
    //             if(response.status == true){
    //                 $('#listTable').html('')
    //                 data = response.data[0];
    //                 console.log(data)
    //                 $.each(data.eksemplar, function( k, v ){
                       
    //                     $('#listTable').append(`
    //                         <tr>
    //                             <td>${k+1}</td>
    //                             <td>${v.no_panggil}</td>
    //                             <td>${v.judul}</td>
    //                             <td>${v.tgl_pinjam}</td>
    //                             <td>${v.tgl_kembali}</td>
    //                             <td> 
    //                                 <button onclick="hapusEksemplar('${v.peminjaman_detail_id}')" methode="post" class="btn btn-danger btn-hapus" name="btn-hapus" id="btn-hapus" disabled><i class="bi bi-trash"></i></button>
    //                             </td>
    //                         </tr>
    //                     `) 
    //                 // });
    //             });
    //             } 
    //         }
    //     })
    // }

   
    // function onDelete(){
    //     swal({
    //         title: "Peringatan",
    //         text: "Apakah Anda Yakin Untuk Menghapus Data?",
    //         icon: "warning",
    //         buttons: true,
    //         dangerMode: true,
    //     })
    //     .then((response) => {
    //         if (response) {
    //             $peminjaman_id = $('#detail_peminjaman_id').html()
    //             $.ajax({
    //                 url: urlPath.delete,
    //                 data: {
    //                     _token: "{{ csrf_token() }}",
    //                     peminjaman_id : $peminjaman_id,
    //                 },
    //                 type: 'POST',
    //                 success: function(response){
    //                     if(response.status == true){
    //                         swal("Success !", response.message, "success");
    //                         onRefresh()
    //                     } else{
    //                         swal("Warning", response.message, "warning");
    //                     }
    //                 }
    //             })
    //         }
    //     }); 
    // }

    // function tableEditBukuPinjaman(){
    //     $.ajax({
    //         url: urlPath.select,
    //         type: 'GET',
    //         success: function(response){
    //             if(response.status == true){
    //                 console.log(response)
    //                 var data=response.data
    //                 if($('#'+data.detail_buku_id).length != 1){
    //                 $('#list_pinjaman').html('')
    //                 $.each(response.data, function( k, v ){
    //                     $('#list_pinjaman').append(`
    //                         <tr id="${v.detail_buku_id}">
    //                             <td>${k+1}</td>
    //                             <td>${v.no_panggil}</td>
    //                             <td>${v.judul}</td>
    //                             <td style="display:none">
    //                                 <input type="text" name="peminjaman_detail_id[]" value="${v.detail_buku_id}">
    //                             </td>
    //                             <td> 
    //                                 <button onclick="hapusEksemplar('${v.detail_buku_id}')" methode="post" class="btn btn-danger"><i class="bi bi-trash"></i></button>
    //                             </td>
    //                         </tr>
    //                     `) 
    //                 });
    //             } else{
    //                 swal("Warning", 'data sudah ada', "warning");
    //             }
    //             } 
    //         }
    //     })
    // }
    
    // function onEdit(peminjaman_id,peminjaman_detail_id){
    //     $.ajax({
    //         url: urlPath.select,
    //         type: 'GET',
    //         data: {
    //             peminjaman_id: peminjaman_id
    //         },
    //         success: function(response){
    //             if(response.status == true){
    //                 $.each(response.data[0], function( k, v ){
    //                     $('[name='+k+']').html(v)
    //                     $('[name='+k+']').val(v)
    //                 });
    //             } 
    //         }
    //     })
    //     $.ajax({
    //         url: urlPath.detailPeminjaman,
    //         type: 'GET',
    //         data: {
    //             peminjaman_detail_id: peminjaman_detail_id
    //         },
    //         success: function(response){
    //             if(response.status == true){
    //                 $('#list_pinjaman').html('')
    //                 var data = response.data[0];
    //                 var nomer = 0;
    //                 $.each(data, function(index, item){
    //                     // console.log(item)
    //                     $('[name='+index+']').val(item)
    //                     tableEditBukuPinjaman()
    //                     // nomer++;
    //                     // $('#list_pinjaman').append(`
    //                     //     <tr>
    //                     //         <td>${nomer}</td>
    //                     //         <td name="no_panggil">${item}</td>
    //                     //         <td name="judul">${item}</td>
    //                     //         <td> 
    //                     //             <a onclick="hapusEksemplar('${item.peminjaman_detail_id}')" methode="post" class="btn btn-danger"><i class="bi bi-trash"></i></a>
    //                     //         </td>
    //                     //     </tr>
    //                     // `) 
    //                     // $('[name='+index+'').text(item);
    //                 });
    //             } 
    //         }
    //     })
    // }

    onDisplayEdit = () => {
		$('.actEdit').addClass('d-none');
        $('.actCreate').removeClass('d-none');
        $(`#${form} input`).removeAttr('disabled', 'disabled')
        $('.datail_data').addClass('d-none');
        $('.form_data').removeClass('d-none');
        loadData();
	}

    function onRefresh(){
        $('.main_data').removeClass('d-none');
        $('.detail_data').addClass('d-none');
        $('#tablePeminjaman').DataTable().destroy();
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

    // $(document).ready(function () {
    //     $('#anggota_id').select2({
    //         placeholder: 'Select an option',
    //     });
    //     $('#anggota_id').change(function() {
    //         var selectedOptionValue = $(this).val();
    //         $.ajax({
    //             url: urlPath.selectAnggota,
    //             type: 'GET',
    //             data: {
    //                 id:selectedOptionValue
    //             },
    //             success: function(response){
    //             if(response.status == true){
    //                 document.getElementById("identitas_peminjam").innerHTML = "";
    //                 $.each(response.data[0], function( k, v ){
    //                     if (k == 'nama_anggota'){
    //                         $(`#identitas_peminjam`).append(`
    //                         <div class="d-flex mt-5">
    //                             <p class="m-0 fs-5 fw-bolder" style="width:105px">Nama</p>
    //                             <p class="m-0 fs-5 fw-bolder">&nbsp;:&nbsp;${v}</p>
    //                         </div>
    //                         `)
    //                     }
    //                     if (k == 'jenis_anggota'){
    //                         $(`#identitas_peminjam`).append(`
    //                         <div class="d-flex mt-2 mb-5">
    //                             <p class="m-0 fs-5 fw-bolder">Jenis Anggota </p>
    //                             <p class="m-0 fs-5 fw-bolder">&nbsp;:&nbsp;${v}</p>
    //                         </div>
    //                         `)
    //                     }
    //                     // $('#'+k+"_detail").html(v)
    //                 });
    //             } 
    //         }
    //         })
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
                    $.each(response.data[0], function( k, v ){
                        if (k == 'nama_anggota'){
                            $(`#identitas_peminjam`).append(`
                            <div class="d-flex mt-5">
                                <p class="m-0 fs-5 fw-bolder" style="width:105px">Nama</p>
                                <p class="m-0 fs-5 fw-bolder">&nbsp;&nbsp;:&nbsp;&nbsp;${v}</p>
                            </div>
                            `)
                        }
                        if (k == 'jenis_anggota'){
                            $(`#identitas_peminjam`).append(`
                            <div class="d-flex mt-2 mb-5">
                                <p class="m-0 fs-5 fw-bolder">Jenis Anggota </p>
                                <p class="m-0 fs-5 fw-bolder">&nbsp;&nbsp;:&nbsp;&nbsp;${v}</p>
                            </div>
                            `)
                        }
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
                        $("#kode_eksemplar").val('');
                        $('#list_pinjaman').append(`
                            <tr id="list_buku_${data.eksemplar_id}">
                                <td>${num}</td>
                                <td>${data.no_panggil}</td>
                                <td>${data.judul}</td>
                                <td class="d-none">
                                    <input type="hidden" name="eksemplar_id[]" value="${data.eksemplar_id}">
                                </td>
                                <td>
                                    <a onclick="hapusEksemplar('list_buku_${data.eksemplar_id}')" methode="post" class="btn btn-danger"> <i class="bi bi-trash"></i></a>
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
        $(`#identitas_peminjam`).html('')
    }
</script>