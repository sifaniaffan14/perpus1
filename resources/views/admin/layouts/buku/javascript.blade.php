<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/jquery-barcode@2.0.3/dist/jquery-barcode.min.js"></script> --}}

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="jquery-barcode.js"></script>
<script src="assets/js/jquery-barcode.js"></script>
<script src="assets/js/jquery-barcode.min.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script> --}}

<script>
    var table = 'tableBuku'
    var form = 'formBuku'
    var formEksemplar = 'formEksemplar'
    var list_table = 'list_table'
    var id_buku = '';
    
    var urlPath ={
        insert: "{{ route('buku.insert') }}",
        update: "{{ route('buku.update') }}",
        select: "{{ route('buku.select') }}",
        delete: "{{ route('buku.delete') }}",
        getData: "{{ route('buku.getData') }}",
        insertEksemplar: "{{ route('detailBuku.insert') }}",
        updateEksemplar: "{{ route('detailBuku.update') }}",
        selectEksemplar: "{{ route('detailBuku.select') }}",
        deleteEksemplar: "{{ route('detailBuku.delete') }}",
    }
    $(document).ready(function () {
		$(`#${table}`).DataTable();
		$(`#${list_table}`).DataTable();
	});
    inittable()
    getData()

    const checkboxes = document.getElementsByName('pilih[]');
    const checkedValues = [];
    var value = '';
    function check() {
        var i = 0;
        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', () => {
            if (checkbox.checked) {
                if (!checkedValues.includes(checkbox.value)) { // tambahan: cek apakah sudah dipilih sebelumnya
                    checkedValues.push(checkbox.value);
                }
            } else {
                const index = checkedValues.indexOf(checkbox.value);
                if (index > -1) {
                checkedValues.splice(index, 1);
                }
            }
            if (i == 0){
                value = checkedValues.join(',');
                console.log(value);
                document.getElementById("pdfBarcode").setAttribute('href', "http://127.0.0.1:8000/PDFBarcode/"+id_buku+"?checkedValues="+value);
                i = 1;
            }
            });
        });
    }

    function onSave(event){
        event.preventDefault()
        swal({
            title: "Peringatan",
            text: "Apakah Anda Yakin Untuk Menyimpan Data?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((response) => {
            if (response) {
                const formElement = $('#formBuku')[0];
                const form = new FormData(formElement);
                form.append('image', $('#image')[0].files[0])

                urlSave = $('[name=id]').val()  == ''? urlPath.insert:urlPath.update;
                $.ajax({
                    url: urlSave,
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

    $('input[type="file"]').change(function() {
        $(this)
            .siblings("label")
            .html('<span class="material-icons fs-3">edit</span> Ubah File')
        $(this).siblings(".file-chosen").text(this.files[0].name)
    })

    onSubmitForm = () => {
        $(`#${form}`).submit();
    }

    function inittable(){
        $.ajax({
            url: urlPath.select,
            type: 'GET',
            success: function(response){
                if(response.status == true){
                    $('#list_table').html('')
                    $.each(response.data, function( k, v ){
                        $('#list_table').append(`
                            <tr>
                                <td>${k+1}</td>
                                <td>${v.kode_buku}</td>
                                <td>${v.judul}</td>
                                <td>${v.penerbit}</td>
                                <td>${v.nama_kategori}</td>
                                <td>
                                    <button onclick=onDetail('${v.id}') class="btn btn-primary btn-detail p-1 ps-2" name="btn-detail" id="btn-detail"><i class="bi bi-arrow-right fs-2"></i></button>
                                </td>
                            </tr>
                        `)
                    });
                } 
            }
        })
    }

    function getData(){
        $.ajax({
                url: urlPath.getData,
                type: 'GET',
                success: function(response){
                    if(response.status == true){
                        var options = "";
                        $.each(response.data, function(index, value) {
                            options += "<option value='" + value.id + "'>" + value.nama_kategori + "</option>";
                        });
                        $("#buku_kategori_id").append(options);
                    }
                }
            })
    }

    function onEdit(id){
        $.ajax({
            url: urlPath.select,
            type: 'GET',
            data: {
                id: $('#detail_id').html()
            },
            success: function(response){
                if(response.status == true){
                    loadForm();
                    DisplayEdit();
                    $.each(response.data[0], function( k, v ){
                        $('[name='+k+']').val(v)
                    });
                } 
            }
        })
    }

    function onDetail(id){
        $.ajax({
            url: urlPath.select,
            type: 'GET',
            data: {
                id: id
            },
            success: function(response){
                if(response.status == true){
                    onDisplayDetail()
                    tableEksemplar(id);
                    id_buku = id;
                    document.getElementById("pdfBarcode").setAttribute('href', "http://127.0.0.1:8000/PDFBarcode/"+id);
                    $.each(response.data[0], function( k, v ){
                        $('#detail_'+k).html(v)
                        if(k=='id'){
                            $('#buku_'+k).val(v)
                        }
                        if(k=='image'){
                            document.getElementById("img").setAttribute('src', 'http://127.0.0.1:8000/storage/buku/'+v);
                        }
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
                $.ajax({
                    url: urlPath.delete,
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: $('#detail_id').html()
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

    // function PDFBarcode(){
    //     swal({
    //         title: "Peringatan",
    //         text: "Apakah Anda Yakin Untuk Mencetak Barcode?",
    //         icon: "warning",
    //         buttons: true,
    //         dangerMode: true,
    //     })
    //     .then((response) => {
    //         if (response) {
    //             $.ajax({
    //                 url: urlPath.PDFBarcode,
    //                 type: 'GET',
    //                 data: {
    //                     id: id_buku
    //                 },
    //                 success: function(response){
    //                     if(response.status == true){
    //                         swal("Success !", response.message, "success");
    //                     } else{
    //                         swal("Warning", response.message, "warning");
    //                     }
    //                 }
    //             })
    //         }
    //     }); 
    // }

    function tableEksemplar(id){
        $.ajax({
            url: urlPath.selectEksemplar,
            type: 'GET',
            data: {
                    id: id
                },
            success: function(response){
                
                if(response.status == true){
                    $('#listTable').html('')
                    $.each(response.data, function( k, v ){
                        var img = $('<img>').attr('src', 'data:image/png;base64,' + v.eksemplar_id);
                        var generatorPNG = "<?php new Picqer\Barcode\BarcodeGeneratorPNG(); ?>";

                        var tgl_pinjam = '-';
                        var tgl_kembali = '-';
                        if (v.tgl_pinjam){
                            tgl_pinjam = moment(v.tgl_pinjam).format('DD/MM/YYYY');
                            tgl_kembali = moment(v.tgl_kembali).format('DD/MM/YYYY');
                        }
                        $('#listTable').append(`
                            <tr>
                                <td>${k+1}</td>
                                <td>${v.no_panggil}</td>
                                <td>${v.status}</td>
                                <td>${v.kondisi}</td>
                                <td>${tgl_pinjam}</td>
                                <td>${tgl_kembali}</td>
                                <td id="barcode_${v.eksemplar_id}"></td>
                                <td><input type="checkbox" name="pilih[]" value="${v.no_panggil}"></td>
                                <td> 
                                    <a onclick="editEksemplar('${v.eksemplar_id}')" class="btn btn-warning" style="padding:5px 4px 8px 9px"><i class="bi bi-pencil-square fs-4"></i></a>
                                    <a onclick="hapusEksemplar('${v.eksemplar_id}')" methode="post" class="btn btn-danger ms-1" style="padding:5px 4px 8px 9px"><i class="bi bi-trash fs-4"></i></a>
                                </td>
                            </tr>
                        `)

                        $("#barcode_"+v.eksemplar_id).barcode(v.no_panggil, "code128");  
                        $(" .codeBarcode").html(v.eksemplar_id);  
                        
                        
                    });
                } 
            }
        })
    }

    function saveEksemplar(){
        swal({
            title: "Peringatan",
            text: "Apakah Anda Yakin Untuk Menyimpan Data?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((response) => {
            if (response) {
                const formElement = $('#formEksemplar')[0];
                const form = new FormData(formElement);

                urlSave = $('[name=eksemplar_id]').val()  == ''? urlPath.insertEksemplar:urlPath.updateEksemplar;
                $.ajax({
                    url: urlSave,
                    data: form,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function(response){
                        if(response.status == true){
                            onDisplayDetail()
                            onClear()
                            hideModal()
                            swal("Success !", response.message, "success");
                        } else{
                            swal("Warning", response.message, "warning");
                        }
                    }
                })
            }
        }); 
    }

    function editEksemplar(eksemplar_id){
        $.ajax({
            url: urlPath.selectEksemplar,
            type: 'GET',
            data: {
                eksemplar_id: eksemplar_id
            },
            success: function(response){
                if(response.status == true){
                    showModal();
                    onDisplayDetail();
                    $.each(response.data[0], function( k, v ){
                        $('[name='+k+']').val(v)
                    });
                } 
            }
        })
    }

    function hapusEksemplar(eksemplar_id){
        swal({
            title: "Peringatan",
            text: "Apakah Anda Yakin Untuk Menghapus Data?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((response) => {
            if (response) {
                $.ajax({
                    url: urlPath.deleteEksemplar,
                    data: {
                        _token: "{{ csrf_token() }}",
                        eksemplar_id: eksemplar_id
                    },
                    type: 'POST',
                    success: function(response){
                        if(response.status == true){
                            swal("Success !", response.message, "success");
                            hideModal()
                            onDisplayDetail()
                        } else{
                            swal("Warning", response.message, "warning");
                        }
                    }
                })
            }
        }); 
    }

    loadForm = () => {
        $('.form_data').removeClass('d-none');
        $('.datail_data').addClass('d-none');
        $('.main_data').addClass('d-none');
	}

    closeForm = () => {
        $('.main_data').removeClass('d-none');
        $('.form_data').addClass('d-none');
	}

    DisplayEdit = () => {
		$('.actEdit').removeClass('d-none');
        $('.actCreate').addClass('d-none');
        $(`#${form} input`).attr('disabled', 'disabled')
	}

    onDisplayEdit = () => {
		$('.actEdit').addClass('d-none');
        $('.actCreate').removeClass('d-none');
        $(`#${form} input`).removeAttr('disabled', 'disabled')

	}

    onDisplayDetail = () => {
        $('.datail_data').removeClass('d-none');
        $('.main_data').addClass('d-none');
        
	}

    closeDisplayDetail = () => {
        $('.main_data').removeClass('d-none');
        $('.datail_data').addClass('d-none');
	}

    showModal = () => {
        $('#form_modal').modal('show')
	}

    hideModal = () => {
        $('#form_modal').modal('hide')
	}

    function onHide(hide,show){
        $('#'+hide).modal('hide')
        $('#'+show).modal('show')
    }

    function onRefresh(){
        $('.main_data').removeClass('d-none');
        $('.form_data').addClass('d-none');
        inittable()
        onClear()
    }

    function onClear(){
        $(`#${form}`)[0].reset();
        $(`#${formEksemplar}`)[0].reset();
    }
</script>