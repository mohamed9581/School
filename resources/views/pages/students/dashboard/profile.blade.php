@extends('layouts.appp')
@section('title')
    {{ trans('Students_trans.profile') }}
@endsection
@section('pagetitle')
    {{ trans('Students_trans.profile') }}
@endsection

@section('content')
    <div class="profile-foreground  position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg">
            <img src="{{ asset('assets/images/profile-bg.jpg') }}" alt="" class="profile-wid-img" />
        </div>
    </div>
    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
        <div class="row g-4">
            <div class="col-auto">
                <div class="avatar-lg">
                    <img src="{{ URL::asset('attachments/students/' . $information->name . '/profile.jpg') }}" alt="user-img"
                        class="img-thumbnail rounded-circle" />
                </div>
            </div>
            <!--end col-->
            <div class="col">
                <div class="p-2">
                    <h3 class="text-white mb-1">{{ $information->name }}</h3>
                    <p class="text-white-75">{{ $information->email }}</p>
                    <div class="hstack text-white-50 gap-1">
                        <div class="me-2">{{ trans('Students_trans.Date_of_Birth') }} :
                            {{ $information->Date_Birth }}
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div>
                <!-- Tab panes -->
                <div class="tab-content pt-4 text-muted">
                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                        <div class="row">
                            <div class="col-xxl-12">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3"> {{ trans('Students_trans.profile') }}</h5>
                                        <form method=POST id="updateStudent"
                                            action="{{ route('profileStudent.update', $information->id) }}" autocomplete="off">
                                            {{ method_field('patch') }}

                                            @csrf
                                            <input type="hidden" name="id" value="{{ $information->id }}">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="Name"
                                                            class="form-label">{{ trans('Students_trans.Name_ar') }}</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $information->getTranslation('name', 'ar') }}"
                                                            name="name[ar]" id="name">
                                                        {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                        <small id='name_error' class="form-text text-danger"></small>
                                                        {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>

                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="Name_en"
                                                            class="form-label">{{ trans('Students_trans.Name_en') }}</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $information->getTranslation('name', 'en') }}"
                                                            name="name[en]" id="name_en">
                                                        {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                        <small id='name_en_error' class="form-text text-danger"></small>
                                                        {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="password"
                                                            class="form-label">{{ trans('Students_trans.Password') }}</label>
                                                        <input type="password" class="form-control" value=""
                                                            name="password" id="password" autocomplete="off">
                                                        {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                        <small id='password_error' class="form-text text-danger"></small>
                                                        {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <div class="form-check form-switch form-switch-success">
                                                            <input class="form-check-input" type="checkbox" role="switch"
                                                                id="showPass">
                                                            <label class="form-check-label" for="SwitchCheck3">Afficher mot
                                                                de passe</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="submit" id="btnSave"
                                                        class="btn btn-success">{{ trans('Students_trans.update') }}</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div>
                            <!--end col-->

                        </div>
                        <!--end row-->
                    </div>
                    <!--end tab-pane-->
                </div>
                <!--end tab-content-->
                {{-- </div> --}}
            </div>
            <!--end col-->
        </div>

        <!--end row-->
    @endsection
    @section('script')
        <script src="{{ URL::asset('assets/libs/list.js/list.min.js') }}"></script>
        <script src="{{ URL::asset('assets/libs/list.pagination.js/list.pagination.min.js') }}"></script>
        <!-- listjs init -->
        <script src="{{ URL::asset('assets/js/pages/listjs.init.js') }}"></script>
        <script src="{{ URL::asset('assets/js/pages/sweetalert.min.js') }}"></script>
        <!-- dropzone min -->
        <script src="{{ URL::asset('assets/libs/dropzone/dropzone-min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/pages/form-file-upload.init.js') }}"></script>

        <script type="text/javascript">
            // :::::::::::::::cette ligne pour obtenir l'url du site::::::::::::::
            var SITEURL = '{{ URL::to('') }}';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.deleteFile').on('click', function() {
                $('#id').val($(this).attr('student_id'));
                $('#studentName').val($(this).attr('student_name'));

            })
            $(document).ready(function() {
                $("#showPass").change(function() {
                    if (this.checked) {
                        $('#password').attr("type", "text");
                    } else {
                        $('#password').attr("type", "password");

                    }
                });

            });
        </script>
    @endsection
