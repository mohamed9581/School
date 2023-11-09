@include('partials.main')

<head>

    @include('partials.title-meta')
    @yield('link')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    @include('partials.head-css')
    @vite(['resources/css/app.css'])
</head>

<body>
    <div id="app">
        <!-- Begin page -->
        <div id="layout-wrapper">

            @include('partials.menu')

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        @include('partials.page-title')

                        <!-- container-fluid -->
                        <div id="contenuEdit">
                            @yield('content')
                        </div>
                    </div>
                    <!-- End Page-content -->

                    @include('partials.footer')
                </div>
                <!-- end main content-->

            </div>
            <!-- END layout-wrapper -->



            @include('partials.customizer')
            <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
                crossorigin="anonymous"></script>
            @include('partials.vendor-scripts')
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

            <script src="{{ URL::asset('assets/js/pages/select2.init.js') }}"></script>
            <!-- prismjs plugin -->
            <script src="{{ URL::asset('assets/libs/prismjs/prism.js') }}"></script>


            @yield('script')

            <!-- App js -->
            <script src="{{ URL::asset('assets/js/app.js') }}"></script>
        </div>
</body>

</html>
