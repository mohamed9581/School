@extends('layouts.appp')
@section('title')
    {{ trans('main_trans.rapport_absence') }}
@endsection
@section('pagetitle')
    {{ trans('main_trans.rapports') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ trans('main_trans.rapport_absence') }}
                </div>
                <div class="card-body">
                    <div id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="p-1">
                                <form method=POST id="addStudent" action="{{ route('attendance.search') }}"
                                    autocomplete="off">
                                    @csrf
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <h3 class="text-success">
                                                {{ trans('Attendances_trans.critereSearch') }}
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="student_id"
                                                    class="form-label">{{ trans('Attendances_trans.nomStudent') }}</label>
                                                <select id="student_id" name="student_id"
                                                    class="form-select form-control mb-3 bg-light "
                                                    aria-label="Default select example">
                                                    <option selected value="0">
                                                        {{ trans('Attendances_trans.tout') }}
                                                    </option>
                                                    @foreach ($students as $student)
                                                        <option value="{{ $student->id }}">
                                                            {{ $student->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                <small id='student_id_error' class="form-text text-danger"></small>
                                                {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="fromDate"
                                                    class="form-label">{{ trans('Attendances_trans.fromDate') }}</label>
                                                <input type="date" class="form-control" value="{{ old('fromDate') }}"
                                                    name="fromDate" id="fromDate">
                                                {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                <small id='toDate_error' class="form-text text-danger"></small>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="toDate"
                                                    class="form-label">{{ trans('Attendances_trans.toDate') }}</label>
                                                <input type="date" class="form-control" value="{{ old('toDate') }}"
                                                    name="toDate" id="toDate">
                                                {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                <small id='toDate_error' class="form-text text-danger"></small>
                                                {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                            </div>
                                        </div>
                                        <!--end col-->

                                    </div>
                                    <!--end row-->
                                    <div class="modal-footer">
                                        <div class="hstack gap-2 justify-content-end">

                                            <button type="submit" id="btnSave"
                                                class="btn btn-success">{{ trans('Attendances_trans.search') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        @if (isset($Students))
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <div class="team-list grid-view-filter row">
                                            @foreach ($Students as $student)
                                                <div class="col">
                                                    <div class="card team-box">
                                                        <div class="team-cover">
                                                            <img src="{{ URL::asset('attachments/students/' . $student->name . '/profile.jpg') }}"
                                                                alt="" class="img-fluid" />
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
                                                                            <a href="javascript:void(0);"
                                                                                id="dropdownMenuLink2"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                <i class="ri-more-fill fs-17"></i>
                                                                            </a>
                                                                            <ul class="dropdown-menu dropdown-menu-end"
                                                                                aria-labelledby="dropdownMenuLink2">
                                                                                <li><a class="dropdown-item"
                                                                                        href="javascript:void(0);"><i
                                                                                            class="ri-eye-line me-2 align-middle"></i>View</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="javascript:void(0);"><i
                                                                                            class="ri-star-line me-2 align-middle"></i>Favorites</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="javascript:void(0);"><i
                                                                                            class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col">
                                                                    <div class="team-profile-img">
                                                                        <div
                                                                            class="avatar-lg img-thumbnail rounded-circle flex-shrink-0">
                                                                            <img src="{{ URL::asset('attachments/students/' . $student->name . '/profile.jpg') }}"
                                                                                alt=""
                                                                                class="img-fluid d-block rounded-circle" />
                                                                        </div>
                                                                        <div class="team-content">
                                                                            <a data-bs-toggle="offcanvas"
                                                                                href="#offcanvasExample"
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
                                                                        <a href="pages-profile.html"
                                                                            class="btn btn-light view-btn">View
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
                </div>


            </div><!-- end card -->
        </div>
    </div>
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
