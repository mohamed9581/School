@extends('layouts.appp')
@section('title')
    {{ trans('Teacher_trans.title_page') }}
@endsection
@section('pagetitle')
    {{ trans('Teacher_trans.title_page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ trans('Teacher_trans.title_page') }}
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-body">
                        <div id="customerList">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <div>
                                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                                            id="create-btn" data-bs-target="#showModal"><i
                                                class="ri-add-line align-bottom me-1"></i>
                                            {{ trans('Teacher_trans.Add_Teacher') }}</button>
                                        <button class="btn btn-soft-danger " id="SupprimerMulti"><i
                                                class="ri-delete-bin-2-line"></i></button>
                                        {{-- <button class="btn btn-soft-danger " onClick="deleteMultiple()"><i
                                                class="ri-delete-bin-2-line"></i></button> --}}
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="d-flex justify-content-sm-end">
                                        <div class="search-box ms-2">
                                            <input type="text" class="form-control search"
                                                placeholder="{{ trans('pagination.search') }}">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive table-card mt-3 mb-1">
                                <table class="table align-middle table-nowrap" id="teacherTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll"
                                                        value="option">
                                                </div>
                                            </th>
                                            <th>N°</th>
                                            <th class="sort" data-sort="name">{{ trans('Teacher_trans.Name_Teacher') }}
                                            </th>
                                            <th>{{ trans('Teacher_trans.Gender') }}</th>
                                            <th>{{ trans('Teacher_trans.Joining_Date') }}</th>
                                            <th>{{ trans('Teacher_trans.specialisation') }}</th>
                                            <th>{{ trans('Grades_trans.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="teacherBody">
                                        @foreach ($teachers as $index => $teacher)
                                            <tr>
                                                <td scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll"
                                                            value="option">
                                                    </div>
                                                </td>
                                                <td>{{ $index = $index + 1 }}</td>
                                                <td>{{ $teacher->name }}</td>
                                                <td>{{ $teacher->genders->name }}</td>
                                                <td>{{ $teacher->joining_Date }}</td>
                                                <td>{{ $teacher->specialisations->name }}</td>
                                                <td>
                                                    <button teacher_id="{{ $teacher->id }}"
                                                        class="editTeacher btn btn-sm btn-success edit-item-btn"
                                                        data-bs-toggle="modal" data-bs-target="#edit{{ $teacher->id }}"
                                                        data-teacher="{{ $teacher }}">{{ trans('Teacher_trans.Edit_Teacher') }}</button>
                                                    <button teacher_id="{{ $teacher->id }}"
                                                        class="deleteTeacher btn btn-sm btn-danger delete-item-btn"
                                                        data-bs-toggle="modal" data-bs-target="#delete{{ $teacher->id }}"
                                                        data-teacher="{{ $teacher }}">{{ trans('Teacher_trans.Delete_Teacher') }}</button>


                                                </td>

                                            </tr>
                                            @include('pages.teachers.edit')
                                            @include('pages.teachers.delete')

                                            <!-- delete_modal_Teacher -->
                                        @endforeach

                                    </tbody>
                                </table>
                                <div class="noresult" style="display: none">
                                    <div class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                            colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                        </lord-icon>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                        <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any
                                            orders for you search.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <div class="pagination-wrap hstack gap-2">
                                    <a class="page-item pagination-prev disabled" href="#">
                                        {{ trans('pagination.previous') }}
                                    </a>
                                    <ul class="pagination listjs-pagination mb-0"></ul>
                                    <a class="page-item pagination-next" href="#">
                                        {{ trans('pagination.next') }}

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card -->
                </div>
            </div>


        </div>
    </div>

    {{-- :::::::::::::::::::::::::::debut modal ajout::::::::::::::::::::::::::::::::::::::::::::::::::::::::: --}}
    <div class="modal fade " id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <div class="p-3">
                    <form method=POST id="addTeacher" action="{{ route('teachers.store') }}" autocomplete="off">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Name" class="form-label">{{ trans('Teacher_trans.Name_ar') }}</label>
                                    <input type="text" class="form-control" value="{{ old('name[ar]') }}"
                                        name="name[ar]" id="name">
                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                    <small id='name_error' class="form-text text-danger"></small>
                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Name_en" class="form-label">{{ trans('Teacher_trans.Name_en') }}</label>
                                    <input type="text" class="form-control" value="{{ old('name[en]') }}"
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
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ trans('Teacher_trans.Email') }}</label>
                                    <input type="email" class="form-control" value="{{ old('email') }}"
                                        name="email" id="email" autocomplete="off">
                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                    <small id='email_error' class="form-text text-danger"></small>
                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password"
                                        class="form-label">{{ trans('Teacher_trans.Password') }}</label>
                                    <input type="password" class="form-control" value="{{ old('password') }}"
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
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="specialisation_id"
                                        class="form-label">{{ trans('Teacher_trans.specialisation') }}</label>
                                    <select id="specialisation_id" name="specialisation_id"
                                        class="form-select form-control mb-3 bg-light "
                                        aria-label="Default select example">
                                        <option selected>{{ trans('Teacher_trans.Choisir') }} </option>
                                        @foreach ($listeSpecialisations as $specialisation)
                                            <option value="{{ $specialisation->id }}">{{ $specialisation->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                    <small id='specialisation_id_error' class="form-text text-danger"></small>
                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="gender_id" class="form-label">{{ trans('Teacher_trans.Gender') }}</label>
                                    <select id="gender_id" name="gender_id"
                                        class="form-select form-control mb-3 bg-light "
                                        aria-label="Default select example">
                                        <option selected>{{ trans('Teacher_trans.Choisir') }} </option>
                                        @foreach ($listeGenders as $gender)
                                            <option value="{{ $gender->id }}">{{ $gender->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                    <small id='gender_id_error' class="form-text text-danger"></small>
                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="dateEmbauche"
                                        class="form-label">{{ trans('Teacher_trans.Joining_Date') }}</label>
                                    <input type="date" class="form-control" value="{{ old('joining_Date') }}"
                                        name="joining_Date" id="joining_Date">
                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                    <small id='joining_Date_error' class="form-text text-danger"></small>
                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="grade_id" class="form-label">{{ trans('Teacher_trans.grade') }}</label>
                                    <select id="grade_id" name="grade_id"
                                        class="form-select form-control mb-3 bg-light "
                                        aria-label="Default select example">
                                        <option selected>{{ trans('Teacher_trans.Choisir') }} </option>
                                        @foreach ($listeGrades as $grade)
                                            <option value="{{ $grade->id }}">{{ $grade->Name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                    <small id='grade_id_error' class="form-text text-danger"></small>
                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="addresse" class="form-label">{{ trans('Teacher_trans.Address') }}</label>
                                    <textarea class="form-control" name="addresse" id="addresse" rows="1">{{ old('addresse') }}</textarea>

                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                    <small id='adresse_error' class="form-text text-danger"></small>
                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light"
                                    data-bs-dismiss="modal">{{ trans('Teacher_trans.Close') }}</button>
                                <button type="submit" id="btnSave"
                                    class="btn btn-success">{{ trans('Teacher_trans.Add_Teacher') }}</button>
                            </div>
                        </div>
                    </form>
                </div>

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
    </script>
@endsection
