<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script> 
<script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>

<script>
var urlPath ={
    selectData: "{{ route('admin-dashboard.selectData') }}",
    selectAbsensi: "{{ route('admin-dashboard.selectAbsensi') }}",
        // select: "{{ route('kategoriBuku.select') }}",
        // delete: "{{ route('kategoriBuku.delete') }}",
    }

    getData()
    tableAbsensi()

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
                var getAbsenToday = response.getAbsenToday;
                var getAnggota = response.getAnggota;
        // Menyisipkan nilai variabel ke dalam elemen HTML
                $('#getBuku').text(getBuku);
                $('#getPeminjaman').text(getPeminjaman);
                $('#getAbsen').text(getAbsen);
                $('#getAbsenToday').text(getAbsenToday);
                $('#getAnggota').text(getAnggota);

    },
        })
}

function tableAbsensi(){
    $.ajax({
            url: urlPath.selectAbsensi,
            method: "GET",
            success: function(response) {
                var tableBody = $("#tableAbsensi");
                if (response.status) {
                    if (response.total > 0) {
                        $.each(response.data, function(index, item) {
                        console.log(response);
                            var row = $("<tr>").appendTo(tableBody);
                            // Kolom Identitas
                            var identityCell = $("<td>").appendTo(row);
                            var identityDiv = $("<div>").addClass("d-flex align-items-center").appendTo(identityCell);
                            $("<div>").addClass("symbol symbol-50px me-3").html("<img src='assets/media/avatars/300-3.jpg' class='' alt=''>").appendTo(identityDiv);
                            var identityContent = $("<div>").addClass("d-flex justify-content-start flex-column").appendTo(identityDiv);
                            $("<a>").attr("href", item.picture).addClass("text-gray-800 fw-bold text-hover-primary mb-1 fs-6").text(item.nama_anggota).appendTo(identityContent);
                            $("<span>").addClass("text-gray-400 fw-semibold d-block fs-7").text(item.no_induk).appendTo(identityContent);
                            // Kolom Jenis Anggota
                            $("<td>").html("<span class='text-gray-600 fw-bold fs-6'>" + item.jenis_anggota + "</span>").appendTo(row);
                            // Kolom Jam
                            $("<td>").html("<span class='text-gray-600 fw-bold fs-6'>" + item.waktu.substring(10,16) + "</span>").appendTo(row);
                        });
                    } else {
                        var emptyRow = $("<tr>").appendTo(tableBody);
                        var emptyCell = $("<td>").attr("colspan", 3).addClass("text-center").text("No data available").appendTo(emptyRow);
                    }
                } else {
                    console.log(response.message);
                }
            }
        });   
    }
</script>