<script>
	getAnggota()
	getInformasi()
	getCount()
	getPeminjaman()
	function getAnggota() {
        $.ajax({
            url: "{{ route('dashboard.selectAnggota') }}",
            type: 'GET',
            success: function(response) {
                if (response.status == true) {
                    $('#nama_anggota').html(response.data[0]['nama_anggota'])
					$('#no_induk').html(response.data[0]['no_induk'])
					if (response.data[0]['picture'] == null || response.data[0]['picture'] == ''){
                        document.getElementById("photo_anggota").setAttribute("src", window.location.origin+"/storage/user/account_box.png")
                    } else {
                        document.getElementById("photo_anggota").setAttribute("src", window.location.origin+"/storage/user/"+response.data[0]['picture'])
                    }
                }
            }
        })
    }

	function getInformasi() {
        $.ajax({
            url: "{{ route('dashboard.selectInformasi') }}",
            type: 'GET',
            success: function(response) {
                if (response.status == true) {
                    $('#informasi').html(response.data[0]['isi_informasi'])
                }
            }
        })
    }

	function getCount() {
        $.ajax({
            url: "{{ route('dashboard.selectCount') }}",
            type: 'GET',
            success: function(response) {
                if (response.status == true) {
                    $('#countPeminjaman').html(response.data['countPeminjaman']);
					$('#countKunjungan').html(response.data['countKunjungan']);
                }
            }
        })
    }

	function getPeminjaman() {
        $.ajax({
            url: "{{ route('dashboard.selectPeminjaman') }}",
            type: 'GET',
            success: function(response) {
                if (response.status == true) {
                    $('#list_peminjaman').html('')
					$.each(response.data, function(k, v){
						let peminjaman_status = '';
						if (v.status_peminjaman == 1){
							peminjaman_status = '<span class="badge badge-danger">Belum Kembali</span>';
						} else if (v.status_peminjaman == 3){
							peminjaman_status = '<span class="badge badge-warning">Proses Perpanjangan</span>';
						} else if (v.status_peminjaman == 4){
							peminjaman_status = '<span class="badge badge-warning">Diperpanjang</span>';
						} else if (v.status_peminjaman == 5){
							peminjaman_status = '<span class="badge badge-danger">Ditolak Perpanjangan</span>';
						}

						$('#list_peminjaman').append(`
							<tr>
								<td class="text-center">${k + 1}</td>
								<td class="text-center">${v.judul}</td>
								<td class="text-center">${moment(v.tgl_pinjam).format('DD-MM-YYYY')}</td>
								<td class="text-center">${moment(v.tgl_kembali).format('DD-MM-YYYY')}</td>
								<td class="text-center">${peminjaman_status}</td>
							</tr>
						`)
					})
                }
            }
        })
    }
</script>