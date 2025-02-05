<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - VelaTech Dentist</title>
        <link href="{{ asset('admin_assets2/css/styles.css') }}" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="icon" type="image/x-icon" href="{{ asset('image_about/20231119052722.png') }}" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous"></script>
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>


        <style>
            /* Style the tab content */
            .tabcontent {
            display: none;
            }
        </style>
        
    </head>
    <body class="nav-fixed">
        
        <!-- Top Navbar -->
        @include('layouts.navbar')

        <!-- Side Navbar -->
        <div id="layoutSidenav">
            @include('layouts.sidebar')
            
            <div id="layoutSidenav_content">
                <main>
                    <!-- Content Main -->
                    @yield('contents')
                    @include('sweetalert::alert')


                </main>

                <!-- Footer -->
                    @include('layouts.footer')
                <!-- End of Footer -->
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('admin_assets2/js/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('admin_assets2/assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('admin_assets2/assets/demo/chart-pie-demo.js') }}"></script>
        <script src="{{ asset('admin_assets2/assets/demo/chart-bar-demo.js') }}"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('admin_assets2/assets/demo/datatables-demo.js') }}"></script>
    </body>
</html>
