<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script> --}}

<script>
    var table = 'tableUser'
    var form = 'formUser'
    var list_table = 'list_table'
    
    var urlPath ={
        insert: "{{ route('user.insert') }}",
        update: "{{ route('user.update') }}",
        select: "{{ route('user.select') }}",
        delete: "{{ route('user.delete') }}",
        getRole: "{{ route('user.getRole') }}",
    }
    $(document).ready(function () {
		$(`#${table}`).DataTable();
		$(`#${list_table}`).DataTable();
	});
    inittable()
    getRole()

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
                const formElement = $('#formUser')[0];
                const form = new FormData(formElement);

                urlSave = $('[name=id]').val()  == ''? urlPath.insert:urlPath.update;
                $.ajax({
                    url: urlSave,
                    data: form,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function(response){
                        if(response.status == true){
                            inittable()
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

    function inittable(){
        $.ajax({
                    url: urlPath.select,
                    type: 'GET',
                    success: function(response){
                        if(response.status == true){
                            $('#list_table').html('')
                            $.each(response.data, function( k, v ){
                                $('#list_table').append(`
                                    <tr onclick=onEdit('${v.id}') style="cursor:pointer">
                                        <td>${k+1}</td>
                                        <td>${v.username}</td>
                                        <td>${v.nama_role}</td>
                                    </tr>
                                `)
                            });
                        } 
                    }
        })
    }

    function onEdit(id){
        $.ajax({
            url: urlPath.select,
            type: 'GET',
            data: {
                id: id
            },
            success: function(response){
                if(response.status == true){
                    DisplayEdit();
                    $.each( response.data[0], function( k, v ){
                        $('[name='+k+']').val(v)
                    });
                } 
            }
        })
    }

    function onDelete(id){
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
                        id: $('[name="id"]').val()
                    },
                    type: 'POST',
                    success: function(response){
                        if(response.status == true){
                            swal("Success !", response.message, "success");
                            // onRefresh()
                            reloadPage()
                        } else{
                            swal("Warning", response.message, "warning");
                        }
                    }
                })
            }
        }); 
    }

    function getRole(){
        $.ajax({
                url: urlPath.getRole,
                type: 'GET',
                success: function(response){
                    if(response.status == true){
                        var options = "";
                        console.log(response.data)
                        $.each(response.data, function(index, value) {
                            options += "<option value='" + value.id + "'>" + value.nama_role + "</option>";
                        });
                        $("#role_id").append(options);
                    }
                }
            })
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

    reloadPage = () => {
		location.reload();
	}

    function onHide(hide,show){
        $('#'+hide).modal('hide')
        $('#'+show).modal('show')
    }

    function onRefresh(){
        onClear()
        inittable()
    }

    function onClear(){
        $(`#${form}`)[0].reset();
    }
</script>