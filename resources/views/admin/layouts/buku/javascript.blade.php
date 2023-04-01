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
                                    <tr onclick=onDetail('${v.id}') style="cursor:pointer">
                                        <td>${k+1}</td>
                                        <td>${v.kode_buku}</td>
                                        <td>${v.judul}</td>
                                        <td>${v.penerbit}</td>
                                        <td>${v.nama_kategori}</td>
                                        <td></td>
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
                console.log(response);
                if(response.status == true){
                    onDisplayDetail()
                    $.each(response.data[0], function( k, v ){
                        $('#detail_'+k).html(v)
                        if(k=='id'){
                        $('#buku_'+k).val(v)
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

    function tableEksemplar(){
        $.ajax({
            url: urlPath.selectEksemplar,
            type: 'GET',
            success: function(response){
                
                if(response.status == true){
                    $('#listTable').html('')
                    $.each(response.data, function( k, v ){
                        var img = $('<img>').attr('src', 'data:image/png;base64,' + v.eksemplar_id);
                        var generatorPNG = "<?php new Picqer\Barcode\BarcodeGeneratorPNG(); ?>";
                        $('#listTable').append(`
                            <tr>
                                <td>${k+1}</td>
                                <td>${v.no_panggil}</td>
                                <td>${v.status}</td>
                                <td>${v.kondisi}</td>
                                <td>-</td>
                                <td>-</td>
                                <td id="barcode_${v.eksemplar_id}"></td>
                                <td> 
                                    <a onclick="editEksemplar('${v.eksemplar_id}')" class="btn btn-warning" style="margin:5px">Edit<i class="bi bi-pencil-square"></i></a>
                                    <a onclick="hapusEksemplar('${v.eksemplar_id}')" methode="post" class="btn btn-danger">Hapus <i class="bi bi-trash"></i></a>
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
                console.log(response)
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
        tableEksemplar();
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