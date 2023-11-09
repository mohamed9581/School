@extends('layouts.appp')
@section('title')
    {{ trans('Grades_trans.title_page') }}
@endsection
@section('pagetitle')
    {{ trans('Grades_trans.title_page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ trans('Grades_trans.title_page') }}
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
                                            {{ trans('Grades_trans.add_Grade') }}</button>
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
                                <table class="table align-middle table-nowrap" id="gradeTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll"
                                                        value="option">
                                                </div>
                                            </th>
                                            <th>N°</th>
                                            <th class="sort" data-sort="name">{{ trans('Grades_trans.Name') }}</th>
                                            <th>{{ trans('Grades_trans.Notes') }}</th>
                                            <th>{{ trans('Grades_trans.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="militaireBody">
                                        @foreach ($grades as $index => $grade)
                                            <tr>
                                                <td scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll"
                                                            value="option">
                                                    </div>
                                                </td>
                                                <td>{{ $index = $index + 1 }}</td>
                                                <td>{{ $grade->Name }}</td>
                                                <td>{{ $grade->Notes }}</td>
                                                <td>
                                                    <button grade_id="{{ $grade->id }}"
                                                        class="editGrade btn btn-sm btn-success edit-item-btn"
                                                        data-bs-toggle="modal" data-bs-target="#edit{{ $grade->id }}"
                                                        data-grade="{{ $grade }}">{{ trans('Grades_trans.edit_Grade') }}</button>
                                                    <button grade_id="{{ $grade->id }}"
                                                        class="deleteGrade btn btn-sm btn-danger delete-item-btn"
                                                        data-bs-toggle="modal" data-bs-target="#delete{{ $grade->id }}"
                                                        data-grade="{{ $grade }}">{{ trans('Grades_trans.delete_Grade') }}</button>


                                                </td>

                                            </tr>

                                            <div class="modal fade " id="edit{{ $grade->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-light p-3">
                                                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close" id="close-modal"></button>
                                                        </div>
                                                        <div class="p-3">
                                                            <form method=POST id="editGrade"
                                                                action="{{ route('grades.update', $grade->id) }}"
                                                                autocomplete="off">
                                                                {{ method_field('patch') }}
                                                                @csrf

                                                                <div class="row">
                                                                    <input id="id" type="hidden" name="id"
                                                                        class="form-control" value="{{ $grade->id }}">
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="Name"
                                                                                class="form-label">{{ trans('Grades_trans.stage_name_ar') }}</label>
                                                                            <input type="text" class="form-control"
                                                                                autocomplete="off"
                                                                                value="{{ $grade->getTranslation('Name', 'ar') }}"
                                                                                name="name[ar]" id="Name">
                                                                            {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                                            <small id='Name_error'
                                                                                class="form-text text-danger"></small>
                                                                            {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                                        </div>
                                                                    </div>
                                                                    <!--end col-->

                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="Name_en"
                                                                                class="form-label">{{ trans('Grades_trans.stage_name_en') }}</label>
                                                                            <input type="text" class="form-control"
                                                                                value="{{ $grade->getTranslation('Name', 'en') }}"
                                                                                name="name[en]" id="Name_en">
                                                                            {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                                            <small id='Name_en_error'
                                                                                class="form-text text-danger"></small>
                                                                            {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                                        </div>
                                                                    </div>
                                                                    <!--end col-->
                                                                </div>
                                                                <!--end row-->
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="mb-3">
                                                                            <label for="Name"
                                                                                class="form-label">{{ trans('Grades_trans.Notes') }}</label>
                                                                            <textarea class="form-control" name="Notes" id="Notes" rows="3">{{ $grade->Notes }}</textarea>
                                                                            {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                                            <small id='Notes_error'
                                                                                class="form-text text-danger"></small>
                                                                            {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                                        </div>
                                                                    </div>
                                                                    <!--end col-->
                                                                </div>
                                                                <!--end row-->

                                                                <div class="modal-footer">
                                                                    <div class="hstack gap-2 justify-content-end">
                                                                        <button type="button" class="btn btn-light"
                                                                            data-bs-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                                                        <button type="submit" id="btnSave"
                                                                            class="btn btn-success">{{ trans('Grades_trans.update') }}</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <!-- delete_modal_Grade -->

                                            <div id="delete{{ $grade->id }}" class="modal fade zoomIn" tabindex="-1"
                                                aria-labelledby="zoomInModalLabel" aria-hidden="true"
                                                style="display: none;">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">

                                                            <h5 class="modal-title" id="zoomInModalLabel">
                                                                {{ trans('Grades_trans.delete_Grade') }}
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('grades.destroy', $grade->id) }}"
                                                            method="post">
                                                            {{ method_field('Delete') }}
                                                            @csrf
                                                            <div class="modal-body">

                                                                {{ trans('Grades_trans.Warning_Grade') }}
                                                                <input id="id" type="hidden" name="id"
                                                                    class="form-control" value="{{ $grade->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-success"
                                                                    data-bs-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger ">{{ trans('Grades_trans.Delete') }}
                                                                </button>
                                                            </div>
                                                        </form>

                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
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
                    <form method=POST id="addGrade" action="{{ route('grades.store') }}" autocomplete="off">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Name"
                                        class="form-label">{{ trans('Grades_trans.stage_name_ar') }}</label>
                                    <input type="text" class="form-control" value="{{ old('Name[ar]') }}"
                                        name="name[ar]" id="Name">
                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                    <small id='Name_error' class="form-text text-danger"></small>
                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Name_en"
                                        class="form-label">{{ trans('Grades_trans.stage_name_en') }}</label>
                                    <input type="text" class="form-control" value="{{ old('Name[en]') }}"
                                        name="name[en]" id="Name_en">
                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                    <small id='Name_en_error' class="form-text text-danger"></small>
                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="Name" class="form-label">{{ trans('Grades_trans.Notes') }}</label>
                                    <textarea class="form-control" name="Notes" id="Notes" rows="3">{{ old('Notes') }}</textarea>
                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                    <small id='Name_error' class="form-text text-danger"></small>
                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light"
                                    data-bs-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                <button type="submit" id="btnSave"
                                    class="btn btn-success">{{ trans('Grades_trans.add_Grade') }}</button>
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
