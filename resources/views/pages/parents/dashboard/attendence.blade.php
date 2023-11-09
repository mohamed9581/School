@extends('layouts.appp')
@section('title')
    {{ trans('Attendances_trans.title_page') }}
@endsection
@section('pagetitle')
    {{ trans('Attendances_trans.listeAbsence') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ trans('Attendances_trans.listeAbsence') }}
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
                                            <th class="sort" data-sort="name">{{ trans('Attendances_trans.name') }}</th>
                                            <th>{{ trans('Attendances_trans.dateAbsence') }}</th>
                                            <th>{{ trans('Attendances_trans.subject') }}</th>
                                            <th>{{ trans('Attendances_trans.nomTeacher') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="militaireBody">
                                        @foreach ($attendances as $index => $attendance)
                                            <tr>
                                                <td scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll"
                                                            value="option">
                                                    </div>
                                                </td>
                                                <td>{{ $index = $index + 1 }}</td>
                                                <td>{{ $attendance->students->name }}</td>
                                                <td>{{ $attendance->attendence_date }}</td>
                                                <td>
                                                    @foreach ($attendance->teacher->subjects as $subject)
                                                        {{ $subject->name }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    {{ $attendance->teacher->name }}
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <div class="noresult">
                                    @if ($attendances && $attendances->count() == 0)
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
                                {{-- @if (isset($quizze))
                                    @include('pages.teachers.quizzes.delete')
                                @endif --}}
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
