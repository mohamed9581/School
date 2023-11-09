@extends('layouts.appp')
@section('title')
    {{ trans('Students_trans.title_page') }}
@endsection
@section('pagetitle')
    {{ trans('Students_trans.title_page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ trans('Teacher_trans.list_absence_student') }}
                </div>
                <div class="p-3">
                    <h5 style="font-family: 'Cairo', sans-serif;color: red">{{ trans('Attendances_trans.dateJour') }}
                        {{ date('d-m-Y') }}</h5>
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
                                            <input type="text" class="form-control search"
                                                placeholder="{{ trans('pagination.search') }}">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive table-card mt-3 mb-1">
                                <form action="{{ route('attendances') }}" method="post" autocomplete="off">
                                    @csrf
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
                                                <th>{{ trans('Attendances_trans.title_page') }}</th>
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
                                                        <div
                                                            class="form-check form-check-inline form-radio-outline form-radio-success mb-3">
                                                            <input class="form-check-input" type="radio"
                                                                @foreach ($student->attendances()->where('attendence_date', date('Y-m-d'))->where('teacher_id', Auth()->user()->id)->get() as $attendance)
                                                                    {{ $attendance->attendence_status == 1 ? 'checked' : '' }} @endforeach
                                                                value="presence" name="attendences[{{ $student->id }}]">
                                                            <label class="form-check-label text-success"
                                                                for="formradioRight7">
                                                                {{ trans('Attendances_trans.present') }}
                                                            </label>
                                                        </div>
                                                        <div
                                                            class="form-check form-check-inline form-radio-outline form-radio-danger mb-3">
                                                            <input
                                                                class="form-check-input form-radio-outline form-radio-danger"
                                                                type="radio"
                                                                @foreach ($student->attendances()->where('attendence_date', date('Y-m-d'))->where('teacher_id', Auth()->user()->id)->get() as $attendance)
                                                                    {{ $attendance->attendence_status == 0 ? 'checked' : '' }} @endforeach
                                                                value="absent" name="attendences[{{ $student->id }}]">
                                                            <label class="form-check-label text-danger"
                                                                for="formradioRight7">
                                                                {{ trans('Attendances_trans.absent') }}
                                                            </label>
                                                        </div>

                                                    </td>
                                                    <input type="hidden" name="grade_id" value="{{ $student->grade_id }}">
                                                    <input type="hidden" name="classe_id"
                                                        value="{{ $student->classe_id }}">
                                                    <input type="hidden" name="section_id"
                                                        value="{{ $student->section_id }}">

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    @if ($students && $students->count() == 0)
                                        <div class="noresult">
                                            <div class="text-center">
                                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                    colors="primary:#121331,secondary:#08a88a"
                                                    style="width:75px;height:75px">
                                                </lord-icon>
                                                <h5 class="mt-2">{{ trans('main_trans.nowData') }}</h5>
                                            </div>
                                        </div>
                                    @endif
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
                                    <div class="d-flex justify-content-start">
                                        <div class="pagination-wrap hstack gap-2">
                                            <input type="submit" class="btn btn-success add-btn" value="Confirmer">
                                        </div>
                                    </div>
                                </form>

                            </div>


                        </div>
                    </div><!-- end card -->
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
        // $('.deleteStudent').on('click', function() {
        //     $('#id').val($(this).attr('student_id'));
        //     $('#studentNom').val($(this).attr('student_name'));
        //     $('#studentName').val($(this).attr('student_name'));

        // })
        // console.log(studentId);
    </script>
@endsection
