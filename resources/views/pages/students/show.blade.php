@extends('layouts.appp')
@section('title')
    {{ trans('Students_trans.personal_information') }}
@endsection
@section('pagetitle')
    {{ trans('Students_trans.personal_information') }}
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
                    <img src="{{ URL::asset('attachments/students/' . $student->getTranslation('name', 'en') . '/profile/' . $student->photo) }}"
                        alt="user-img" class="img-thumbnail rounded-circle" />
                </div>
            </div>
            <!--end col-->
            <div class="col">
                <div class="p-2">
                    <h3 class="text-white mb-1">{{ $student->name }}</h3>
                    <p class="text-white-75">{{ $student->classe->nomClasse }}-{{ $student->section->nomSection }}</p>
                    <div class="hstack text-white-50 gap-1">
                        <div class="me-2"><i class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i>
                            {{ $student->myparent->addresse_Father }}
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
                <div class="d-flex">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span
                                    class="d-none d-md-inline-block">{{ trans('Students_trans.Details') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#documents" role="tab">
                                <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span
                                    class="d-none d-md-inline-block">{{ trans('Students_trans.attatchments') }}</span>
                            </a>
                        </li>
                    </ul>
                    <div class="flex-shrink-0">
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-success"><i
                                class="ri-edit-box-line align-bottom"></i> Edit Profile</a>
                    </div>
                </div>
                <!-- Tab panes -->
                <div class="tab-content pt-4 text-muted">
                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                        <div class="row">
                            <div class="col-xxl-12">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3"> {{ trans('Students_trans.information') }}</h5>
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th class="ps-0" scope="row">
                                                            {{ trans('Students_trans.Name') }}
                                                            :</th>
                                                        <td class="text-muted">{{ $student->name }}</td>
                                                        <th class="ps-0" scope="row">E-mail :</th>
                                                        <td class="text-muted">{{ $student->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">
                                                            {{ trans('Students_trans.Gender') }} :</th>
                                                        <td class="text-muted">{{ $student->gender->name }}
                                                        </td>
                                                        <th class="ps-0" scope="row">
                                                            {{ trans('Students_trans.Date_of_Birth') }} :</th>
                                                        <td class="text-muted">{{ $student->Date_Birth }}</td>

                                                    </tr>

                                                    <tr>
                                                        <th class="ps-0" scope="row">
                                                            {{ trans('Students_trans.parent') }} :</th>
                                                        <td class="text-muted">{{ $student->myparent->name_Father }}</td>
                                                        <th class="ps-0" scope="row">
                                                            {{ trans('Students_trans.Nationalite') }} :</th>
                                                        <td class="text-muted">{{ $student->nationalite->name }}</td>

                                                    </tr>

                                                    <tr>
                                                        <th class="ps-0" scope="row">
                                                            {{ trans('Students_trans.blood') }} :</th>
                                                        <td class="text-muted">{{ $student->blood->name }}</td>

                                                        <th class="ps-0" scope="row">
                                                            {{ trans('Students_trans.Grade') }} :</th>
                                                        <td class="text-muted">{{ $student->grade->Name }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th class="ps-0" scope="row">
                                                            {{ trans('Students_trans.classrooms') }} :</th>
                                                        <td class="text-muted">{{ $student->classe->nomClasse }}</td>
                                                        <th class="ps-0" scope="row">
                                                            {{ trans('Students_trans.section') }} :</th>
                                                        <td class="text-muted">{{ $student->section->nomSection }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">
                                                            {{ trans('Students_trans.academic_year') }} :</th>
                                                        <td class="text-muted">{{ $student->academic_year }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div>
                            <!--end col-->

                        </div>
                        <!--end row-->
                    </div>

                    <div class="tab-pane fade" id="documents" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">

                                    <form method="post" action="{{ route('Upload_attachment') }}"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="filePhotos">{{ trans('Students_trans.attatchments') }}
                                                    : <span class="text-danger">*</span></label>
                                                <input type="file" class="form-control" id="filePhotos"
                                                    accept="image/*" name="photos[]" multiple required>
                                                <input type="hidden" name="student_name" value="{{ $student->name }}">
                                                <input type="hidden" name="student_id" value="{{ $student->id }}">
                                            </div>
                                        </div>
                                        <br><br>
                                        <button type="submit" class="btn btn-primary">
                                            {{ trans('Students_trans.submit') }}
                                        </button>
                                    </form>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-borderless align-middle mb-0">
                                                <thead class="table-light">
                                                    <tr style='text-align:center;vertical-align:middle'>
                                                        <th>#</th>
                                                        <th>{{ trans('Students_trans.fileName') }}</th>
                                                        <th>{{ trans('Students_trans.created_at') }}</th>
                                                        <th>{{ trans('Students_trans.Processes') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($student->images as $attachment)
                                                        <tr style='text-align:center;vertical-align:middle'>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $attachment->filename }}</td>
                                                            <td>{{ $attachment->created_at->diffForHumans() }}</td>
                                                            <td colspan="2">
                                                                <a class="btn btn-outline-info btn-sm"
                                                                    href="{{ url('Download_attachment') }}/{{ $attachment->imageable->name }}/{{ $attachment->filename }}"
                                                                    role="button"><i class="fas fa-download"></i>&nbsp;
                                                                    {{ trans('Students_trans.Download') }}</a>

                                                                <button type="button"
                                                                    class="btn btn-outline-danger btn-sm deleteFile"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#Delete_img{{ $attachment->id }}"
                                                                    title="{{ trans('Grades_trans.Delete') }}">{{ trans('Students_trans.delete') }}
                                                                </button>

                                                            </td>
                                                            @include('pages.students.delete_img')

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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



                $('select[name="grade_id"]').on('change', function() {
                    var grade_id = $(this).val();
                    console.log(grade_id);
                    //pour recuperer la langue active
                    var langueActive = $('html').attr('lang');
                    if (grade_id) {
                        $.ajax({
                            url: "{{ URL::to('classes') }}/" + grade_id,
                            type: "post",
                            dataType: "json",
                            success: function(data) {
                                console.log(data);
                                $('select[name="classe_id"]').empty();

                                if (langueActive == 'ar') {
                                    $('select[name="classe_id"]').append(
                                        '<option selected disabled>--اختر الفصل--</option>');
                                } else {

                                    $('select[name="classe_id"]').append(
                                        '<option selected disabled>--Choisir la classe--</option>'
                                    );
                                }
                                $.each(data, function(key, value) {
                                    if (langueActive == 'ar') {
                                        $('select[name="classe_id"]').append(
                                            '<option value="' +
                                            value.id + '">' +
                                            value.nomClasse.ar + '</option>');
                                    } else {
                                        $('select[name="classe_id"]').append(
                                            '<option value="' +
                                            value.id + '">' +
                                            value.nomClasse.en + '</option>');
                                    }
                                });

                            },
                        });
                    } else {
                        console.log('AJAX load did not work');
                    }
                });

                $('select[name="classe_id"]').on('change', function() {
                    var classe_id = $(this).val();
                    console.log(classe_id);
                    //pour recuperer la langue active
                    var langueActive = $('html').attr('lang');
                    if (classe_id) {
                        $.ajax({
                            url: "{{ URL::to('sections') }}/" + classe_id,
                            type: "post",
                            dataType: "json",
                            success: function(data) {
                                console.log(data);
                                $('select[name="section_id"]').empty();

                                $.each(data, function(key, value) {
                                    if (langueActive == 'ar') {
                                        $('select[name="section_id"]').append(
                                            '<option value="' +
                                            value.id + '">' +
                                            value.nomSection.ar + '</option>');
                                    } else {
                                        $('select[name="section_id"]').append(
                                            '<option value="' +
                                            value.id + '">' +
                                            value.nomSection.en + '</option>');
                                    }
                                });

                            },
                        });
                    } else {
                        console.log('AJAX load did not work');
                    }
                });
            });
        </script>
    @endsection
