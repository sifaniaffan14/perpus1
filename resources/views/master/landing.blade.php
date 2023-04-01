<!DOCTYPE html>
<html lang="en">

@include('components_SB-Admin.head')

<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('components_SB-Admin.sidebar')


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('components_SB-Admin.topbar')

                @yield('content');

            </div>
            <!-- End of Main Content -->

            @include('components_SB-Admin.footer')

        </div>
        <!-- End of Content Wrapper -->


    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('components_SB-Admin.logOutModal')
    @include('components_SB-Admin.js')
    @yield('JavaScript')
    
</body>

</html>
