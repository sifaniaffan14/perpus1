@include('component.js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="assets/OwlCarousel2-2.3.4/dist/owl.carousel.min.js "></script>
<script>
    var urlPath = {
        selectBuku: "{{ route('cariBuku.selectBuku') }}",
    }
    var resultArray = '';
    var data = '';
    var totalPages = '';
    var next = 2;
    var previous = 1;
    selectBuku()

    function selectBuku() {
        $.ajax({
            url: urlPath.selectBuku,
            contentType: false,
            processData: false,
            type: 'GET',
            success: function(response) {
                if (response.status == true) {
                    resultArray = response.data;
                    data = response.data;
                    onSearchResults(1)
                } 
            }
        })
        
    }

    function onSearchResults(page) {
        var itemsPerPage = 6; // Jumlah item per halaman
        totalPages = Math.ceil(data.length / itemsPerPage); // Jumlah total halaman
        var start = (page - 1) * itemsPerPage; // Indeks awal data pada halaman
        var end = start + itemsPerPage; // Indeks akhir data pada halaman
        var pageData = data.slice(start, end); // Ambil data sesuai halaman

        var baseUrl = window.location.origin + '/storage/buku/';
        $("#result_buku").html("")
        $.each(pageData, function(k, v) {
            if (v.image == '' || v.image == null) {
                v.image = 'default-cover.jpeg';
            }
            $("#result_buku").append(`
                <div class="col-4 mt-5">
                    <div class="row" onclick="onDetail('` + v.id + `')" style="cursor:pointer;">  
                        <div class="col">
                            <img src="` + baseUrl + v.image + `" height="200px" width="150px" alt="">
                        </div>
                        <div class="col">
                            <h3><b>${v.judul}</b></h3>
                            <h5><b>${v.penerbit}</b></h5>
                            <br>
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
                                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
                                </svg>
                            </span>
                            <span><b>${v.nama_kategori}</b></span>
                        </div>
                    </div>
                </div>
            `)    

            if (page == 1) {
                showPagination(totalPages, 0)
            } else {
                showPagination(totalPages, page)
            }
        });       
    }

    function showPagination(totalPages, indexPage) {
        $('#pagination').html(`
            <li class="page-item">
                <p class="m-0 page-link" onclick="previousPage()" style="cursor:pointer;" tabindex="-1" aria-disabled="true"><</a>
            </li>`)
        for (var i = 1; i <= totalPages; i++) {
            $('#pagination').append(`
                <li class="page-item" aria-current="page">
                    <p class="m-0 page-link" id="pagination_` + i + `" onclick="switchPage(` + i + `)" style="cursor:pointer;">` + i + `</p>
                </li>
            `)
        }
        $('#pagination').append(`
            <li class="page-item">
                    <p class="m-0 page-link" onclick="nextPage()" style="cursor:pointer;">></p>
                </li>
            `)


        $('#pagination_1').addClass('active')

        if (indexPage != 0){
            for (var index = 1; index <= totalPages; index++) {
                if ($('#pagination_' + index).hasClass('active')) {
                    $('#pagination_' + indexPage).addClass('active');
                    $('#pagination_' + index).removeClass('active');
                    break;
                }
            }
        }
    }    

    function switchPage(i) {
        onSearchResults(i)
    }

    function nextPage() {
        switchPage(next)
    }

    function previousPage() {
        switchPage(previous)
    }

    function onSearch() {
        var searchString = $('#search').val();
        var regex = new RegExp(searchString, 'i');
        const searchResults = Object.values(resultArray).filter(obj => {
            return regex.test(obj.judul) || regex.test(obj.pengarang);
        });

        data = searchResults;
        onSearchResults(1);
    }

    function onReset() {
        $("#search").val('')
        data = resultArray;
        onSearchResults(1)
    }
</script>