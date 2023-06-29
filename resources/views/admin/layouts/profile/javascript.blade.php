<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> --}}
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script> 
<script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script> 

<script>
onSelectMenu = (type, el) => {
    $('.profileMenu').removeClass('btn-primary')
    $('.profileMenu').addClass('text-gray-900')
    $(el).removeClass('text-gray-900')
    $(el).addClass('btn-primary')
    if (type == "ubah profile") {
        $("#ubahProfile-tab").click();
        onEdit()
    } else if (type == "ubah password") {
        $("#ubahPassword-tab").click();
        onEdit()
    }
}
</script>