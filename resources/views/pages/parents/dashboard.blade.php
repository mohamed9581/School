@extends('layouts.appp')
@section('title')
    {{ trans('main_trans.Dashboard') }} {{ trans('main_trans.Parents') }}
@endsection
@section('pagetitle')
    {{ trans('main_trans.Dashboard') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">{{ trans('main_trans.children') }}</p>
                            <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                    data-target="{{ $data['count_children'] }}">{{ $data['count_children'] }}</span>
                            </h2>

                        </div>
                        <div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                    <i data-feather="users" class="text-danger"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-md-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">{{ trans('main_trans.Parents') }}</p>
                            <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                    data-target="{{ $data['count_students'] }}">{{ $data['count_students'] }}</span></h2>
                        </div>
                        <div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                    <i data-feather="activity" class="text-info"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row-->

    <div class="row">
        @if (isset($students))
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <div class="team-list grid-view-filter row">
                            @foreach ($students as $student)
                                <div class="col">
                                    <div class="card team-box">
                                        <div class="team-cover">
                                            {{-- <img src="{{ URL::asset('attachments/students/' . $student->name . '/profile.jpg') }}"
                                                alt="" class="img-fluid" /> --}}
                                            {{ afficher_image($student->photo, ['alt' => 'photo de ' . $student->name, 'class' => 'img-fluid'], $student->name, $student->gender->getTranslation('name', 'en')) }}

                                        </div>
                                        <div class="card-body p-4">
                                            <div class="row align-items-center team-row">
                                                <div class="col team-settings">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="bookmark-icon flex-shrink-0 me-2">
                                                                <input type="checkbox" id="favourite1"
                                                                    class="bookmark-input bookmark-hide">
                                                                <label for="favourite1" class="btn-star">
                                                                    <svg width="20" height="20">
                                                                        <use xlink:href="#icon-star" />
                                                                    </svg>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col text-end dropdown">
                                                            <a href="javascript:void(0);" id="dropdownMenuLink2"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ri-more-fill fs-17"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end"
                                                                aria-labelledby="dropdownMenuLink2">
                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                            class="ri-eye-line me-2 align-middle"></i>View</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                            class="ri-star-line me-2 align-middle"></i>Favorites</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                            class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col">
                                                    <div class="team-profile-img">
                                                        <div class="avatar-lg img-thumbnail rounded-circle flex-shrink-0">
                                                            {{-- <img src="{{ URL::asset('attachments/students/' . $student->name . '/profile.jpg') }}"
                                                                alt="" class="img-fluid d-block rounded-circle" /> --}}
                                                            {{ afficher_image($student->photo, ['alt' => 'photo de ' . $student->name, 'class' => 'img-fluid d-block rounded-circle'], $student->name, $student->gender->getTranslation('name', 'en')) }}

                                                        </div>
                                                        <div class="team-content">
                                                            <a data-bs-toggle="offcanvas" href="#offcanvasExample"
                                                                aria-controls="offcanvasExample">
                                                                <h5 class="fs-16 mb-1">
                                                                    {{ $student->name }}</h5>
                                                            </a>
                                                            <p class="text-muted mb-0">
                                                                {{ trans('Attendances_trans.nomClasse') }}
                                                                {{ $student->section->classes->nomClasse }}
                                                                {{ trans('Attendances_trans.nomSection') }}
                                                                {{ $student->section->nomSection }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col">
                                                    <div class="row text-muted text-center">
                                                        <div class="col-6 border-end border-end-dashed">
                                                            <h5 class="mb-1  ">
                                                                {{ $student->nb_absences }}
                                                            </h5>
                                                            <p class="text-muted mb-0">
                                                                <span
                                                                    class="badge rounded-pill bg-danger">{{ trans('Attendances_trans.absent') }}</span>
                                                            </p>
                                                        </div>
                                                        <div class="col-6">
                                                            <h5 class="mb-1">
                                                                {{ $student->nb_presences }}
                                                            </h5>
                                                            <p class="text-muted mb-0">
                                                                <span
                                                                    class="badge rounded-pill bg-success">{{ trans('Attendances_trans.present') }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col">
                                                    <div class="text-end">
                                                        <a href="pages-profile.html" class="btn btn-light view-btn">View
                                                            Profile</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end card-->
                                </div>
                                <!--end col-->
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <!-- listjs init -->
    <script src="{{ URL::asset('assets/js/pages/listjs.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/sweetalert.min.js') }}"></script>
    <script type="text/javascript">
        // :::::::::::::::cette ligne pour obtenir l'url du site::::::::::::::
        var SITEURL = '{{ URL::to('') }}';
        var update = false;
    </script>
@endsection
