@extends('layouts.appp')
@section('title')
    {{ trans('Quizzes_trans.title_page') }}
@endsection
@section('pagetitle')
    {{ trans('Quizzes_trans.title_page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ trans('Quizzes_trans.title_page') }}
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
                                        <a href="{{ route('quizzesCreate') }}" class="btn btn-success add-btn"
                                            role="button" aria-pressed="true"><i
                                                class="ri-add-line align-bottom me-1"></i>{{ trans('Quizzes_trans.add_Quizze') }}</a>
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
                                <table class="table align-middle table-nowrap" id="quizzeTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll"
                                                        value="option">
                                                </div>
                                            </th>
                                            <th>N°</th>
                                            <th class="sort" data-sort="name">{{ trans('Quizzes_trans.Name') }}</th>
                                            <th>{{ trans('Quizzes_trans.nomTeacher') }}</th>
                                            <th class="sort" data-sort="nomGrade">{{ trans('Quizzes_trans.nomGrade') }}
                                            </th>
                                            <th>{{ trans('Quizzes_trans.nomClasse') }}</th>
                                            <th>{{ trans('Quizzes_trans.nomSection') }}</th>
                                            <th>{{ trans('Quizzes_trans.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="militaireBody">
                                        @foreach ($quizzes as $index => $quizze)
                                            <tr>
                                                <td scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll"
                                                            value="option">
                                                    </div>
                                                </td>
                                                <td>{{ $index = $index + 1 }}</td>
                                                <td>{{ $quizze->name }}</td>
                                                <td>{{ $quizze->teacher->name }}</td>
                                                <td>{{ $quizze->grade->Name }}</td>
                                                <td>{{ $quizze->classe->nomClasse }}</td>
                                                <td>{{ $quizze->section->nomSection }}</td>
                                                <td>
                                                    <a href="{{ route('quizzesEdit', $quizze->id) }}"
                                                        title="{{ trans('Quizzes_trans.Edit') }}"
                                                        class="editStudent btn btn-sm btn-success edit-item-btn"><i
                                                            class="ri-edit-2-line"></i>
                                                    </a>
                                                    <button id="btnDelete" quizze_name="{{ $quizze->name }}"
                                                        quizze_id="{{ $quizze->id }}"
                                                        title="{{ trans('Quizzes_trans.delete_Quizze') }}"
                                                        class="deleteQuizze btn btn-sm btn-danger delete-item-btn"
                                                        data-bs-toggle="modal" data-bs-target="#delete"
                                                        data-quizze="{{ $quizze }}"><i
                                                            class="ri-delete-bin-line"></i>
                                                    </button>
                                                    <a href="{{ route('questions', $quizze->id) }}"
                                                        title="{{ trans('Questions_trans.List_Question') }}"
                                                        class="editQuestion btn btn-sm btn-warning edit-item-btn"><i
                                                            class=" ri-file-add-line"></i>
                                                    </a>

                                                    <a href="{{ route('quizzeStudent', $quizze->id) }}"
                                                        title="{{ trans('Questions_trans.passExam') }}"
                                                        class="editQuestion btn btn-sm btn-primary edit-item-btn"><i
                                                            class="bx bxs-show"></i>
                                                    </a>


                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <div class="noresult">
                                    @if ($quizzes && $quizzes->count() == 0)
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
                                </div>
                                @if (isset($quizze))
                                    @include('pages.teachers.quizzes.delete')
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
            $('.deleteQuizze').on('click', function() {
                $('#id').val($(this).attr('quizze_id'));
                $('#quizzeNom').val($(this).attr('quizze_name'));
                $('#quizzeName').val($(this).attr('quizze_name'));

            })
        </script>
    @endsection
