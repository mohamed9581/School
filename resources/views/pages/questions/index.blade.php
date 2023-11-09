@extends('layouts.appp')
@section('title')
    {{ trans('Questions_trans.title_page') }}
@endsection
@section('pagetitle')
    {{ trans('Questions_trans.title_page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ trans('Questions_trans.title_page') }}
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
                                {{-- <div class="col-sm-auto">
                                    <div>
                                        <a href="{{ route('questions.create') }}" class="btn btn-success add-btn"
                                            role="button" aria-pressed="true"><i
                                                class="ri-add-line align-bottom me-1"></i>{{ trans('Questions_trans.add_Question') }}</a>
                                    </div>
                                </div> --}}
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
                                <table class="table align-middle table-nowrap" id="questionTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll"
                                                        value="option">
                                                </div>
                                            </th>
                                            <th>N°</th>
                                            <th class="sort" data-sort="title">{{ trans('Questions_trans.question') }}
                                            </th>
                                            <th>{{ trans('Questions_trans.reponses') }}</th>
                                            <th class="sort" data-sort="reponseCorrect">
                                                {{ trans('Questions_trans.reponseCorrect') }}
                                            </th>
                                            <th>{{ trans('Questions_trans.degree') }}</th>
                                            <th>{{ trans('Questions_trans.nomQuizze') }}</th>
                                            <th>{{ trans('Questions_trans.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="militaireBody">
                                        @foreach ($questions as $index => $question)
                                            <tr>
                                                <td scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll"
                                                            value="option">
                                                    </div>
                                                </td>
                                                <td>{{ $index = $index + 1 }}</td>
                                                <td>{{ $question->title }}</td>
                                                <td>{{ $question->answers }}</td>
                                                <td>{{ $question->right_answer }}</td>
                                                <td>{{ $question->score }}</td>
                                                <td>{{ $question->quizze->name }}</td>
                                                <td>
                                                    <a href="{{ route('questions.edit', $question->id) }}"
                                                        title="{{ trans('Questions_trans.Edit') }}"
                                                        class="editQuestion btn-sm btn-success edit-item-btn"><i
                                                            class="ri-edit-2-line"></i>
                                                        {{ trans('Questions_trans.Edit') }}</a>



                                                    <button id="btnDelete" question_name="{{ $question->title }}"
                                                        question_id="{{ $question->id }}"
                                                        title="{{ trans('Questions_trans.delete_Question') }}"
                                                        class="deleteQuestion btn btn-sm btn-danger delete-item-btn"
                                                        data-bs-toggle="modal" data-bs-target="#delete"
                                                        data-question="{{ $question }}"><i
                                                            class="ri-delete-bin-line"></i>
                                                        {{ trans('Questions_trans.delete_Question') }}</button>



                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <div class="noresult">
                                    @if ($questions && $questions->count() == 0)
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
                                @if (isset($question))
                                    @include('pages.questions.delete')
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
            $('.deleteQuestion').on('click', function() {
                $('#id').val($(this).attr('question_id'));
                $('#questionTitle').val($(this).attr('question_name'));
                $('#questionName').val($(this).attr('question_name'));

            })
        </script>
    @endsection
