<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> --}}
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script> 
<script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script> 

<script>
    var table = 'tableUser'
    var form = 'formUser'
    var list_table = 'list_table'
    var foto = false;
    var url = '';
    
    var urlPath ={
        insert: "{{ route('user.insert') }}",
        update: "{{ route('user.update') }}",
        select: "{{ route('user.select') }}",
        delete: "{{ route('user.delete') }}",
        getRole: "{{ route('user.getRole') }}",
    }
    // $(document).ready(function () {
		// $(`#tableUser`).DataTable();
		// $(`#${list_table}`).DataTable();
	// });
    inittable()
    getRole()

    $(document).ready(function(){
        $('input[type="file"]').change(function(e){
            $('#changeAvatar').addClass('d-none');
            $('#cancelProfile').removeClass('d-none');
            $('#removeProfile').addClass('d-none');
        });
    });

    document.getElementById("cancelProfile").addEventListener("click", function() {
        if ($("#changeAvatar").hasClass("d-none")) {
            $('#changeAvatar').removeClass('d-none');
        }
        if (url == ''){
            $("#photoPreview").removeAttr("style");
            document.getElementById("photoPreview").setAttribute("style", "background-image: url(http://127.0.0.1:8000/storage/user/account_box.png)");
        } else {
            $("#photoPreview").removeAttr("style");
            document.getElementById("photoPreview").setAttribute("style", "background-image: url("+url+")");
        }
    });
    document.getElementById("removeProfile").addEventListener("click", function() {
        console.log("removeProfile");
        if ($("#changeAvatar").hasClass("d-none")) {
            $('#changeAvatar').removeClass('d-none');
        }
        document.getElementById("photoPreview").setAttribute("style", "background-image: url(http://127.0.0.1:8000/storage/user/account_box.png)");
    });

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
                            document.getElementById("photoPreview").setAttribute("style", "background-image: url(http://127.0.0.1:8000/storage/user/account_box.png)");
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
        $(document).ready(function() {
            var dataTable = $('#tableUser').DataTable( {
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
                    { "data": "Username" },
                    { "data": "Role" },
                    { "data": "Detail"}
                ]
            } );
            
            function processData(response) {
                var data = [];
                $.each(response.data, function( k, v ){
                    var row = {
                        "No": k + 1,
                        "Username": v.username,
                        "Role": v.nama_role,
                        "Detail": `<button onclick=onEdit('${v.id}') class="btn btn-primary btn-detail p-1 ps-2" name="btn-detail" id="btn-detail"><i class="bi bi-arrow-right fs-2"></i></button>`
                    };
                    data.push(row);
                })
                return data;
            }

            function searchFunction() {
                const input = document.getElementById("search_village").value;        
                dataTable.search(input).draw();
            }

            document.getElementById("search_village").addEventListener("input", searchFunction);
        } );      
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
                    console.log('data user', response);
                    DisplayEdit();
                    $.each( response.data[0], function( k, v ){
                        if (k == 'password'){
                        } else {
                            $('[name='+k+']').val(v);
                        }
                        if (k == 'picture'){
                            if (v == null){
                                foto = false;
                                document.getElementById("photoPreview").setAttribute("style", "background-image: url(http://127.0.0.1:8000/storage/user/account_box.png)");
                                // $("#removeProfile").addClass("d-none");
                            } else {
                                foto = true;
                                url = "http://127.0.0.1:8000/storage/user/"+v;
                                document.getElementById("photoPreview").setAttribute("style", "background-image: url("+url+")");
                                document.getElementsByName("photo").value = url;
                            }
                        }
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
        $('#changeAvatar').removeClass('d-none');
        if (foto == true){
            $('#cancelProfile').removeClass('d-none');
            $('#removeProfile').removeClass('d-none');
        }
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
        $('#tableUser').DataTable().destroy();
        inittable()
    }

    function onClear(){
        $(`#${form}`)[0].reset();
        if (!$("#cancelProfile").hasClass("d-none")) {
            $('#cancelProfile').addClass('d-none');
        }
    }
</script>