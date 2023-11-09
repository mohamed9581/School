<!doctype html>
<html lang="ar" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none">

<head>

    <meta charset="utf-8" />
    <title>Connection | Afnane - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">

    <!-- Layout config Js -->
    <script src="{{ URL::asset('assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    @if (App::getLocale() == 'en')
        <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ URL::asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ URL::asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- custom Css-->
        <link href="{{ URL::asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    @else
        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap-rtl.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app-rtl.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- custom Css-->
        <link href="{{ asset('assets/css/custom-rtl.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- dropzone css -->
    @endif
</head>

<body>

    <!-- auth-page wrapper -->
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row">



                    <div class="row justify-content-center">
                        <div class="col-xxl-9 col-lg-10 col-sm-8">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="card border shadow-none">
                                        <div class="card-body text-center">
                                            <div class="avatar-md mx-auto mb-4" id="register-tour">
                                                <div class="avatar-title bg-light rounded-circle text-primary fs-24">
                                                    <a class="btn btn-default" title="{{ trans('auth.student') }}"
                                                        href="{{ route('login.show', 'student') }}">
                                                        <img alt="user-img" width="100px;"
                                                            src="{{ URL::asset('assets/images/student.png') }}">
                                                    </a>
                                                </div>
                                            </div>
                                            <h5>{{ trans('auth.student') }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-lg-3">
                                    <div class="card border shadow-none">
                                        <div class="card-body text-center">
                                            <div class="avatar-md mx-auto mb-4" id="login-tour">
                                                <div class="avatar-title bg-light rounded-circle text-primary fs-24">
                                                    <a class="btn btn-default" title="{{ trans('auth.parent') }}"
                                                        href="{{ route('login.show', 'parent') }}">
                                                        <img alt="user-img" width="100px;"
                                                            src="{{ URL::asset('assets/images/parent.png') }}">
                                                    </a>
                                                </div>
                                            </div>
                                            <h5>{{ trans('auth.parent') }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-lg-3">
                                    <div class="card border shadow-none">
                                        <div class="card-body text-center">
                                            <div class="avatar-md mx-auto mb-4" id="getproduct-tour">
                                                <div class="avatar-title bg-light rounded-circle text-primary fs-24">
                                                    <a class="btn btn-default" title="{{ trans('auth.admin') }}"
                                                        href="{{ route('login.show', 'web') }}">
                                                        <img alt="user-img" width="100px;"
                                                            src="{{ URL::asset('assets/images/admin.png') }}">
                                                    </a>
                                                </div>
                                            </div>
                                            <h5>{{ trans('auth.admin') }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-lg-3">
                                    <div class="card border shadow-none">
                                        <div class="card-body text-center">
                                            <div class="avatar-md mx-auto mb-4" id="getproduct-tour">
                                                <div class="avatar-title bg-light rounded-circle text-primary fs-24">
                                                    <a class="btn btn-default " title="{{ trans('auth.teacher') }}"
                                                        href="{{ route('login.show', 'teacher') }}">
                                                        <img alt="user-img" width="100px;"
                                                            src="{{ URL::asset('assets/images/teacher.png') }}">
                                                    </a>
                                                </div>
                                            </div>
                                            <h5>{{ trans('auth.teacher') }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->


                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Massar. Créer <i class="mdi mdi-heart text-danger"></i> par
                                AfnaneSoft
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{ URL::asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins.js') }}"></script>

    <!-- password-addon init -->
    <script src="{{ URL::asset('assets/js/pages/password-addon.init.js') }}"></script>
</body>

</html>
