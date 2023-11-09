@extends('layouts.appp')
@section('title')
    {{ trans('Students_trans.management') }}
@endsection
@section('pagetitle')
    {{ trans('Students_trans.management') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ trans('Students_trans.management') }}
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
                                            <th class="sort table-info" data-sort="name">{{ trans('Students_trans.Name') }}
                                            </th>
                                            <th class="table-danger" title="Ancienne Niveau scolaire">
                                                {{ trans('Students_trans.Grade_ancien') }}</th>
                                            <th class="table-danger" title="Année Précédente">
                                                {{ trans('Students_trans.academic_year_an') }}</th>
                                            <th class="table-danger" title="Ancienne Classe">
                                                {{ trans('Students_trans.classe_ancienne') }}</th>
                                            <th class="table-danger" title="Ancienne Section">
                                                {{ trans('Students_trans.section_ancienne') }}</th>
                                            <th class="table-success" title="Nouveau Niveau scolaire">
                                                {{ trans('Students_trans.Grade_nouveau') }}</th>
                                            <th class="table-success" title="Nouvelle Année">
                                                {{ trans('Students_trans.academic_year_new') }}</th>
                                            <th class="table-success" title="Nouvelle Classe">
                                                {{ trans('Students_trans.classe_nouvelle') }}</th>
                                            <th class="table-success" title="Nouvelle Section">
                                                {{ trans('Students_trans.section_nouvelle') }}</th>
                                            <th>{{ trans('Grades_trans.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="studentBody">

                                        @foreach ($promotions as $index => $promotion)
                                            <tr>
                                                <td scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll"
                                                            value="option">
                                                    </div>
                                                </td>
                                                <td>{{ $index = $index + 1 }}</td>
                                                <td>{{ $promotion->student->name }}</td>
                                                <td>{{ $promotion->f_grade->Name }}</td>
                                                <td>{{ $promotion->academic_year }}</td>
                                                <td>{{ $promotion->f_classe->nomClasse }}</td>
                                                <td>{{ $promotion->f_section->nomSection }}</td>
                                                <td>{{ $promotion->t_grade->Name }}</td>
                                                <td>{{ $promotion->academic_year_new }}</td>
                                                <td>{{ $promotion->t_classe->nomClasse }}</td>
                                                <td>{{ $promotion->t_section->nomSection }}</td>
                                                <td>

                                                    <button id="btnDelete" promotion_id="{{ $promotion->id }}"
                                                        title="{{ trans('Students_trans.annulerTransfert') }}"
                                                        class="deletePromotion btn btn-sm btn-danger delete-item-btn"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#Delete_one{{ $promotion->id }}"
                                                        data-promotion="{{ $promotion }}"><i
                                                            class="ri-swap-fill"></i></button>
                                                  


                                                </td>
                                                @include('pages.students.promotions.delete_one')
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if ($promotions && $promotions->count() == 0)
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
    @include('pages.students.promotions.deleteAll')

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
