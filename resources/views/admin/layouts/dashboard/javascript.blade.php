<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script> 
<script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>

<script>
var urlPath ={
    selectData: "{{ route('admin-dashboard.selectData') }}",
        // update: "{{ route('kategoriBuku.update') }}",
        // select: "{{ route('kategoriBuku.select') }}",
        // delete: "{{ route('kategoriBuku.delete') }}",
    }

    getData()

function getData(){
        $.ajax({
            url: urlPath.selectData,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
        // Mengakses variabel-variabel dari respons JSON
                var getBuku = response.getBuku;
                var getPeminjaman = response.getPeminjaman;
                var getAbsen = response.getAbsen;
                var getAnggota = response.getAnggota;
        // Menyisipkan nilai variabel ke dalam elemen HTML
                $('#getBuku').text(getBuku);
                $('#getPeminjaman').text(getPeminjaman);
                $('#getAbsen').text(getAbsen);
                $('#getAnggota').text(getAnggota);
    },
        })
    }
</script>