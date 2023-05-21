@include('component.js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
    getCategory()
    var urlPath = {
        search: "{{ route('landing.search') }}",
        selectDetail: "{{ route('landing.selectDetail') }}",
        selectEksemplar: "{{ route('landing.selectEksemplar') }}",
    }
    var resultArray = '';
    var data = '';
    var totalPages = '';
    var next = 2;
    var previous = 1;

    // swiper.js for carousel
    var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        slidesPerView: 3,
        spaceBetween: 20,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        coverflowEffect: {
            rotate: 0,
            stretch: 0,
            depth: 0,
            modifier: 0,
            slideShadows: false,
        },
        navigation: {
            nextEl: ".next",
            prevEl: ".prev",
        },
    });

    function getCategory(){
        $.ajax({
            url: "{{ route('landing.selectCategory') }}",
            type: 'GET',
            success: function(response){
                if(response.status == true){
                    var options = "";
                    $.each(response.data, function(index, value) {
                        options += '<li><a class="dropdown-item" href="#'+ value.id +'">'+ value.nama_kategori +'</a></li>';
                    });
                    $("#category").append(options);
                }
            }
        })
    }

    function onSearch(event){
        event.preventDefault()
        const formElement = $('#formSearch')[0];
        const form = new FormData(formElement);
        console.log('form',formElement);
        if (window.location.hash != ''){
            form.append('kategori_id', window.location.hash.replace('#',""))
        } else {
            form.append('kategori_id', 'all')
        }

        if ($('#val_search').val() == ''){
        } else {
            $.ajax({
            url: urlPath.search,
            data: form,
            contentType: false,
            processData: false,
            type: 'POST',
            success: function(response){
                if(response.status == true){
                    resultArray = response.data;
                    data = response.data;
                    $("#search2").val('')
                    $(".page-landing").addClass("d-none");
                    $(".page-search").removeClass("d-none");
                    
                    onSearchResults(1)
                } else{
                    swal("Warning", "Data Buku tidak ditemukan!", "warning");
                }
            }
        })
        }
    }

    $(document).ready(function() {
        $('#search2').keypress(function(event) {
            if (event.keyCode === 13) { // keycode untuk tombol enter adalah 13
                event.preventDefault(); // menghindari submit form
                onSearch2();
            }
        });
    });

    function onSearch2(){
        var searchString = $('#search2').val();
        var regex = new RegExp(searchString, 'i');
        const searchResults = Object.values(resultArray).filter(obj => {
            return regex.test(obj.judul) || regex.test(obj.pengarang);
        });

        data = searchResults;
        onSearchResults(1);
    }

    function onReset(){
        $("#search2").val('')
        data = resultArray;
        onSearchResults(1)
    }

    function onSearchResults(page){
        var itemsPerPage = 6; // Jumlah item per halaman
        totalPages = Math.ceil(data.length / itemsPerPage); // Jumlah total halaman
        var start = (page - 1) * itemsPerPage; // Indeks awal data pada halaman
        var end = start + itemsPerPage; // Indeks akhir data pada halaman
        var pageData = data.slice(start, end); // Ambil data sesuai halaman

        if (page == 1){
            showPagination(totalPages)
        }

        var baseUrl = window.location.origin + '/storage/buku/'; 
        $("#result_buku").html("")
        $.each(pageData, function( k, v ){
            if ((k+1) % 3 != 0){
                $("#result_buku").append(`
                    <div class=" col-xxl-3 col-xl-3 col-lg-4 col-12" style="width:29%; margin-right:2.5vh">
                        <div onclick="onDetail('`+ v.id +`')" style="cursor:pointer;"
                        class="w-100 p-0 text-dark search__item text-decoration-none fw-semibold">
                            <img src="`+ baseUrl + v.image +`" style="width:15vh; height:18vh" alt="img">
                            <div class="w-auto">
                                <div class="text-start ps-1 fs-5" >`+ v.judul +`</div>
                                <div class="text-start ps-1">`+ v.penerbit +`</div>
                                <div class="text-start ps-1">`+ v.no_isbn +`</div>
                                <div class="fw-semibold ms-1 mt-2 d-flex gap-2 align-items-center"><img src="images/category 6.png" alt="" style="width:2.5vh"></img> `+ v.nama_kategori +`</div>
                            </div>
                        </div>
                    </div>
                `)
            } else {
                $("#result_buku").append(`
                    <div class=" col-xxl-3 col-xl-3 col-lg-4 col-12" style="width:30%">
                        <div onclick="onDetail('`+ v.id +`')" style="cursor:pointer;"
                        class="w-100 p-0 text-dark search__item text-decoration-none fw-semibold">
                            <img src="`+ baseUrl + v.image +`" style="width:15vh; height:18vh" alt="img">
                            <div class="w-auto">
                                <div class="text-start ps-1 fs-5">`+ v.judul +`</div>
                                <div class="text-start ps-1">`+ v.penerbit +`</div>
                                <div class="text-start ps-1">`+ v.no_isbn +`</div>
                                <div class="fw-semibold ms-1 mt-2 d-flex gap-2 align-items-center"><img src="images/category 6.png" alt="" style="width:2.5vh"></img> `+ v.nama_kategori +`</div>
                            </div>
                        </div>
                    </div>
                `)
            }
        });
    }

    function onDetail(id){
        $.ajax({
            url: urlPath.selectDetail,
            type: 'GET',
            data: {
                id: id
            },
            success: function(response){
                if(response.status == true){
                    // console.log(response.data[0])
                    var baseUrl = window.location.origin + '/storage/buku/'; 

                    $('.page-search').addClass('d-none');
                    $('.page-detail').removeClass('d-none');

                    document.getElementById('img_detail').setAttribute('src',baseUrl + response.data[0]['image']);
                    $('#kode_buku').html(response.data[0]['kode_buku']);
                    $('#no_isbn').html(response.data[0]['no_isbn']);
                    $('#judul').html(response.data[0]['judul']);
                    $('#pengarang').html(response.data[0]['pengarang']);
                    $('#penerbit').html(response.data[0]['penerbit']);
                    $('#halaman').html(response.data[0]['halaman']);
                    $('#nama_kategori').html(response.data[0]['nama_kategori']);
                    
                    tableEksemplar(response.data[0]['id']);
                }
            }
        })
    }

    function showPagination(totalPages){
        $('#num_pagination').html('')
        for (var i = 1; i <= totalPages; i++){
            $('#num_pagination').append(`
                <li class="page-item"><p class="page-link m-0 text-dark bg-transparent fw-bold border-0" id="pagination_`+i+`" onclick="switchPage(`+i+`)" style="cursor:pointer;">`+i+`</p>
            `)
        }
        $('#pagination_1').removeClass('text-dark')
        $('#pagination_1').addClass('text-custom')
    }

    function switchPage(i){
        for (var index = 1; index <= totalPages;index++){
            if ($('#pagination_'+index).hasClass('text-custom')){
                document.getElementById('pagination_'+i).classList.replace("text-dark", "text-custom");
                document.getElementById('pagination_'+index).classList.replace("text-custom", "text-dark");
                break; 
            }
        }
        onSearchResults(i)
    }

    function nextPage(){
        switchPage(next)
    }

    function previousPage(){
        switchPage(previous)
    }

    function tableEksemplar(id){
        $.ajax({
            url: urlPath.selectEksemplar,
            type: 'GET',
            data: {
                    id: id
                },
            success: function(response){
                
                if(response.status == true){
                    $('#list_table').html('')
                    var num = 1;
                    $.each(response.data, function( k, v ){
                        if (v.status_peminjaman != 2){
                            var tgl_pinjam = '-';
                            var tgl_kembali = '-';
                            if (v.tgl_pinjam){
                                tgl_pinjam = moment(v.tgl_pinjam).format('DD/MM/YYYY');
                                tgl_kembali = moment(v.tgl_kembali).format('DD/MM/YYYY');
                            }
                            $('#list_table').append(`
                                <tr>
                                    <td>${num}</td>
                                    <td>${v.no_panggil}</td>
                                    <td>${v.status}</td>
                                    <td>${v.kondisi}</td>
                                    <td>${tgl_pinjam}</td>
                                    <td>${tgl_kembali}</td>
                                </tr>
                            `)
                            num++;
                        }  
                    });
                } 
            }
        })
    }

    function onDisplaySearch(){
        $('.page-detail').addClass('d-none');
        $('.page-search').removeClass('d-none')
    }

    function onDisplayLanding(){
        if (!$('.page-detail').hasClass('d-none')){
            $('.page-detail').addClass('d-none')
        }
        if (!$('.page-search').hasClass('d-none')){
            $('.page-search').addClass('d-none')
        }
        if ($('.page-landing').hasClass('d-none')){
            $('.page-landing').removeClass('d-none')
            $('#val_search').val('')
        }
    }
</script>