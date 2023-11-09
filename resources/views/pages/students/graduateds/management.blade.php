@extends('layouts.appp')
@section('title')
    {{ trans('main_trans.list_Graduateds') }}
@endsection
@section('pagetitle')
    {{ trans('main_trans.list_Graduateds') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ trans('main_trans.list_Graduateds') }}
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
                                <div class="col-sm">
                                    <div class="d-flex justify-content-sm-end">
                                        <div class="search-box ms-2">
                                            <button id="btnDelete" title="{{ trans('Students_trans.Annuler_Promotion') }}"
                                                class="deletePromotion btn btn-sm btn-danger delete-item-btn"
                                                data-bs-toggle="modal"
                                                data-bs-target="#delete">{{ trans('Students_trans.Annuler_Promotion') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive table-card mt-3 mb-1">
                                <table class="table align-middle table-nowrap" id="studentTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll"
                                                        value="option">
                                                </div>
                                            </th>
                                            <th>N°</th>
                                            <th class="sort" data-sort="name">{{ trans('Students_trans.Name') }}
                                            </th>
                                            <th>{{ trans('Students_trans.Email') }}</th>
                                            <th>{{ trans('Students_trans.Gender') }}</th>
                                            <th>{{ trans('Students_trans.Grade') }}</th>
                                            <th>{{ trans('Students_trans.classrooms') }}</th>
                                            <th>{{ trans('Students_trans.section') }}</th>
                                            <th>{{ trans('Grades_trans.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="studentBody">
                                        @foreach ($students as $index => $student)
                                            <tr>
                                                <td scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll"
                                                            value="option">
                                                    </div>
                                                </td>
                                                <td>{{ $index = $index + 1 }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->email }}</td>
                                                <td>{{ $student->gender->name }}</td>
                                                <td>{{ $student->grade->Name }}</td>
                                                <td>{{ $student->classe->nomClasse }}</td>
                                                <td>{{ $student->section->nomSection }}</td>
                                                <td>

                                                    <button id="btnAnnuler" student_name="{{ $student->name }}"
                                                        student_id="{{ $student->id }}"
                                                        title="{{ trans('Students_trans.annulerDepart') }}"
                                                        class="deleteStudent btn btn-sm btn-success delete-item-btn"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#Annuler_one{{ $student->id }}"
                                                        data-student="{{ $student }}"><i
                                                            class="ri-swap-fill"></i></button>

                                                    <button id="btnDelete" student_name="{{ $student->name }}"
                                                        student_id="{{ $student->id }}"
                                                        title="{{ trans('Students_trans.Delete') }}"
                                                        class="deleteStudent btn btn-sm btn-danger delete-item-btn"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#Delete_one{{ $student->id }}"
                                                        data-student="{{ $student }}"><i
                                                            class="ri-delete-bin-line"></i></button>
                                                </td>
                                                @include('pages.students.graduateds.annuler_one')
                                                @include('pages.students.graduateds.delete_one')
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                @if ($students && $students->count() == 0)
                                    <div class="noresult">
                                        <div class="text-center">
                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                            </lord-icon>
                                            <h5 class="mt-2">{{ trans('main_trans.nowData') }}</h5>
                                        </div>
                                    </div>
                                @endif

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
    {{-- @include('pages.students.promotions.deleteAll') --}}

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
        // $('.deleteStudent').on('click', function() {
        //     $('#id').val($(this).attr('student_id'));
        //     $('#studentNom').val($(this).attr('student_name'));
        //     $('#studentName').val($(this).attr('student_name'));

        // })
        // console.log(studentId);
    </script>
@endsection
