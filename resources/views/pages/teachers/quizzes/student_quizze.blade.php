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
                                            <th>{{ trans('Quizzes_trans.nameStudent') }}</th>
                                            <th class="sort" data-sort="lastQuestion">
                                                {{ trans('Quizzes_trans.lastQuestion') }}
                                            </th>
                                            <th>{{ trans('Quizzes_trans.degree') }}</th>
                                            <th>{{ trans('Quizzes_trans.falsification') }}</th>
                                            <th>{{ trans('Quizzes_trans.dateTest') }}</th>
                                            <th>{{ trans('Quizzes_trans.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="militaireBody">
                                        @foreach ($degrees as $index => $degree)
                                            <tr>
                                                <td scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll"
                                                            value="option">
                                                    </div>
                                                </td>
                                                <td>{{ $index = $index + 1 }}</td>
                                                <td>{{ $degree->student->name }}</td>
                                                <td>{{ $degree->question_id }}</td>
                                                <td>{{ $degree->score }}</td>
                                                @if ($degree->abuse == 0)
                                                    <td style="color: green">{{ trans('Quizzes_trans.pasFalsif') }}</td>
                                                @else
                                                    <td style="color: red">{{ trans('Quizzes_trans.falsif') }}</td>
                                                @endif
                                                <td>{{ $degree->date }}</td>
                                                <td>
                                                    @if ($degree->abuse == 1)
                                                        <button quizze_id="{{ $degree->quizze_id }}"
                                                            class="deleteQuizze btn btn-sm btn-primary delete-item-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#repeat_quizze{{ $degree->quizze_id }}"> <i
                                                                class="fas fa-repeat"></i></button>
                                                    @endif

                                                </td>
                                                <!-- debloque_modal_quizze -->
                                                @include('pages.teachers.quizzes.repeateQuizze')
                                                <!-- /.modal -->


                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <div class="noresult">
                                    @if ($degrees && $degrees->count() == 0)
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
