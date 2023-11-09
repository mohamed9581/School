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
                    {{ trans('Students_trans.title_page') }}
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
                                        <a href="{{ route('students.create') }}" class="btn btn-success add-btn"
                                            id="create-btn"><i class="ri-add-line align-bottom me-1"></i>
                                            {{ trans('Students_trans.Add_Student') }}</a>
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
                                                    {{-- <a href="{{ route('students.edit', $student->id) }}"
                                                        title="{{ trans('Students_trans.Edit') }}"
                                                        class="editStudent btn btn-sm btn-success edit-item-btn"><i
                                                            class="ri-edit-2-line"></i></a>
                                                    <button id="btnDelete" student_name="{{ $student->name }}"
                                                        student_id="{{ $student->id }}"
                                                        title="{{ trans('Students_trans.Delete') }}"
                                                        class="deleteStudent btn btn-sm btn-danger delete-item-btn"
                                                        data-bs-toggle="modal" data-bs-target="#delete"
                                                        data-student="{{ $student }}"><i
                                                            class="ri-delete-bin-line"></i></button>
                                                    <a href="{{ route('students.show', $student->id) }}"
                                                        title="{{ trans('Students_trans.Afficher') }}"
                                                        class="showStudent btn btn-sm btn-warning edit-item-btn"><i
                                                            class="ri-eye-line"></i></a> --}}
                                                    <!-- Vertical Variation -->
                                                    <div class="btn-group" role="group"
                                                        aria-label="Button group with nested dropdown">

                                                        <div class="btn-group" role="group">
                                                            <button id="btnGroupDrop1" type="button"
                                                                class="btn btn-primary dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                {{ trans('Grades_trans.Processes') }}
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                                <li><a href="{{ route('students.edit', $student->id) }}"
                                                                        title="{{ trans('Students_trans.Edit') }}"
                                                                        class="editStudent dropdown-item btn btn-sm btn-success edit-item-btn"><i
                                                                            class="ri-edit-2-line"></i>
                                                                        {{ trans('Students_trans.Edit') }}</a></li>
                                                                <li><button id="btnDelete"
                                                                        student_name="{{ $student->name }}"
                                                                        student_id="{{ $student->id }}"
                                                                        title="{{ trans('Students_trans.Delete') }}"
                                                                        class="deleteStudent dropdown-item btn btn-sm btn-danger delete-item-btn"
                                                                        data-bs-toggle="modal" data-bs-target="#delete"
                                                                        data-student="{{ $student }}"><i
                                                                            class="ri-delete-bin-line"></i>
                                                                        {{ trans('Students_trans.Delete') }}</button></li>
                                                                <li><a href="{{ route('students.show', $student->id) }}"
                                                                        title="{{ trans('Students_trans.Afficher') }}"
                                                                        class="showStudent dropdown-item btn btn-sm btn-warning edit-item-btn"><i
                                                                            class="ri-eye-line"></i>
                                                                        {{ trans('Students_trans.Afficher') }}</a>
                                                                </li>
                                                                <li><a href="{{ route('fees_invoices.show', $student->id) }}"
                                                                        title="{{ trans('Students_trans.fees_invoices') }}"
                                                                        class="showFees_invoices dropdown-item btn btn-sm btn-warning edit-item-btn"><i
                                                                            class="ri-eye-line"></i>
                                                                        {{ trans('Students_trans.fees_invoices') }}</a>
                                                                </li>
                                                                <li><a href="{{ route('receipt_students.show', $student->id) }}"
                                                                        title="{{ trans('Receipts_trans.title_page') }}"
                                                                        class="showreceipt_students dropdown-item btn btn-sm btn-warning edit-item-btn"><i
                                                                            class="bx bx-money"></i>
                                                                        {{ trans('Receipts_trans.title_page') }}</a>
                                                                </li>
                                                                <li><a href="{{ route('processingFees.show', $student->id) }}"
                                                                        title="{{ trans('ProcessingFees_trans.title_page') }}"
                                                                        class="showProcessingFees dropdown-item btn btn-sm btn-warning edit-item-btn"><i
                                                                            class="las la-money-check-alt"></i>
                                                                        {{ trans('ProcessingFees_trans.title_page') }}</a>
                                                                </li>
                                                                <li><a href="{{ route('payment_students.show', $student->id) }}"
                                                                        title="{{ trans('Payments_trans.title_page') }}"
                                                                        class="showPayments dropdown-item btn btn-sm btn-warning edit-item-btn"><i
                                                                            class="las la-money-check-alt"></i>
                                                                        {{ trans('Payments_trans.title_page') }}</a>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </td>

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
    @if (isset($student))
        @include('pages.students.delete')
    @endif
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
        $('.deleteStudent').on('click', function() {
            $('#id').val($(this).attr('student_id'));
            $('#studentNom').val($(this).attr('student_name'));
            $('#studentName').val($(this).attr('student_name'));

        })
        // console.log(studentId);
    </script>
@endsection
