@extends('layouts.appp')
@section('title')
    {{ trans('Classes_trans.title_page') }}
@endsection
@section('pagetitle')
    {{ trans('Classes_trans.title_page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ trans('Classes_trans.title_page') }}
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
                                            {{ trans('Classes_trans.add_classe') }}</button>
                                        <button class="btn btn-soft-danger" id="btn_delete_all"><i
                                                class="ri-delete-bin-2-line"></i></button>
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
                                {{-- <div class="col-sm">
                                    <div class="d-flex justify-content-sm-end">
                                        <div class="search-box ms-2">

                                            <form action="{{ route('Filter_Classes') }}" method="POST">
                                                {{ csrf_field() }}
                                                <select class="selectpicker" data-style="btn-info" name="Grade_id" required
                                                    onchange="this.form.submit()">
                                                    <option value="" selected disabled>
                                                        {{ trans('Classes_trans.Search_By_Grade') }}</option>
                                                    @foreach ($Grades as $Grade)
                                                        <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                                    @endforeach
                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>

                            <div class="table-responsive table-card mt-3 mb-1">
                                <table class="table align-middle table-nowrap" id="buttons-datatables">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll"
                                                        value="option">
                                                </div>
                                            </th>
                                            <th>N°</th>
                                            <th>{{ trans('Classes_trans.nom') }}
                                            </th>
                                            <th class="sort" data-sort="customer_name">
                                                {{ trans('Classes_trans.name_Grade') }}</th>
                                            <th>{{ trans('Classes_trans.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="classeBody">
                                        @if (isset($details))
                                            <?php $List_Classes = $details; ?>
                                        @else
                                            <?php $List_Classes = $classes; ?>
                                        @endif

                                        @foreach ($List_Classes as $index => $classe)
                                            <tr>
                                                <td scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        <input type="checkbox" value="{{ $classe->id }}"
                                                            class="form-check-input box1">
                                                    </div>
                                                </td>
                                                <td>{{ $index = $index + 1 }}</td>
                                                <td>{{ $classe->nomClasse }}</td>
                                                <td class="customer_name">{{ $classe->grades->Name }}</td>
                                                <td>
                                                    <button classe_id="{{ $classe->id }}"
                                                        class="editClasse btn btn-sm btn-success edit-item-btn"
                                                        data-bs-toggle="modal" data-bs-target="#edit{{ $classe->id }}"
                                                        data-classe="{{ $classe }}">{{ trans('Classes_trans.Edit') }}</button>
                                                    <button classe_id="{{ $classe->id }}"
                                                        class="deleteClasse btn btn-sm btn-danger delete-item-btn"
                                                        data-bs-toggle="modal" data-bs-target="#delete{{ $classe->id }}"
                                                        data-classe="{{ $classe }}">{{ trans('Classes_trans.Delete') }}</button>
                                                    {{-- :::::::::::::::::::::::::::debut modal edit::::::::::::::::::::::::::::::::::::::::::::::::::::::::: --}}
                                                    <div class="modal fade" id="edit{{ $classe->id }}" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-light p-3">
                                                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"
                                                                        id="close-modal"></button>
                                                                </div>
                                                                <div class="p-3">

                                                                    <form class=" row mb-30"
                                                                        action="{{ route('classes.update', $classe->id) }}"
                                                                        method="POST">
                                                                        {{ method_field('patch') }}
                                                                        @csrf
                                                                        <input id="id" type="hidden" name="id"
                                                                            class="form-control"
                                                                            value="{{ $classe->id }}">

                                                                        <div class="card-body">
                                                                            <div class="table-responsive"
                                                                                data-repeater-list="List_Classes">
                                                                                <table id="tbleClasse"
                                                                                    class="invoice-table table table-borderless table-nowrap mb-0">
                                                                                    <thead class="align-middle">
                                                                                        <tr class="table-active">
                                                                                            <th scope="col"
                                                                                                style="width: 50px;">
                                                                                                #</th>
                                                                                            <th scope="col">
                                                                                                {{ trans('Classes_trans.nameClasse') }}
                                                                                            </th>
                                                                                            <th scope="col">
                                                                                                {{ trans('Classes_trans.nameClasse_en') }}
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="text-end">
                                                                                                {{ trans('Classes_trans.name_Grade') }}
                                                                                            </th>

                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody id="newlink"
                                                                                        data-repeater-list="List_Classes">
                                                                                        <tr id="1" class="classe">
                                                                                            <th scope="row"
                                                                                                id="nbrClassement1"
                                                                                                class="classe-id">1</th>
                                                                                            <td class="text-start">
                                                                                                <div class="mb-2">
                                                                                                    <input type="text"
                                                                                                        class="form-control bg-light border-0"
                                                                                                        id="nameClasse-1"
                                                                                                        value="{{ $classe->getTranslation('nomClasse', 'ar') }}"
                                                                                                        name="name[0][ar]"
                                                                                                        placeholder="{{ trans('Classes_trans.nameClasse') }}"
                                                                                                        required />
                                                                                                    <div
                                                                                                        class="invalid-feedback">
                                                                                                        Please enter a
                                                                                                        product
                                                                                                        name
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>

                                                                                            <td class="text-start">
                                                                                                <div class="mb-2">
                                                                                                    <input type="text"
                                                                                                        class="form-control bg-light border-0"
                                                                                                        id="nameClasse-en-1"
                                                                                                        name="name[0][en]"
                                                                                                        value="{{ $classe->getTranslation('nomClasse', 'en') }}"
                                                                                                        placeholder="{{ trans('Classes_trans.nameClasse_en') }}"
                                                                                                        required />
                                                                                                    <div
                                                                                                        class="invalid-feedback">
                                                                                                        Please enter a
                                                                                                        product
                                                                                                        name
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>

                                                                                            <td class="text-end">
                                                                                                <div>
                                                                                                    <select
                                                                                                        id="nameGrade-1"
                                                                                                        name="grade_id[]"
                                                                                                        class="form-select form-control mb-3 bg-light nameGrade"
                                                                                                        aria-label="Default select example">
                                                                                                        <option selected
                                                                                                            value="{{ $classe->grades->id }}">
                                                                                                            {{ $classe->grades->Name }}
                                                                                                        </option>

                                                                                                        @foreach ($grades as $grade)
                                                                                                            <option
                                                                                                                value="{{ $grade->id }}">
                                                                                                                {{ $grade->Name }}
                                                                                                            </option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </td>

                                                                                        </tr>
                                                                                    </tbody>

                                                                                </table>
                                                                                <!--end table-->
                                                                            </div>

                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-bs-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- :::::::::::::::::::::::::::::fin model edit:::::::::::::::::::::::::::::::::::::: --}}


                                                    <!-- delete_modal_classe -->

                                                    <div id="delete{{ $classe->id }}" class="modal fade zoomIn"
                                                        tabindex="-1" aria-labelledby="zoomInModalLabel"
                                                        aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">

                                                                    <h5 class="modal-title" id="zoomInModalLabel">
                                                                        {{ trans('Classes_trans.delete_class') }}
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <form action="{{ route('classes.destroy', $grade->id) }}"
                                                                    method="post">
                                                                    {{ method_field('Delete') }}
                                                                    @csrf
                                                                    <div class="modal-body">

                                                                        {{ trans('Grades_trans.Warning_Grade') }}
                                                                        <input id="id" type="hidden"
                                                                            name="id" class="form-control"
                                                                            value="{{ $classe->id }}">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-success"
                                                                            data-bs-dismiss="modal">{{ trans('Classes_trans.Close') }}</button>
                                                                        <button type="submit"
                                                                            class="btn btn-danger ">{{ trans('Classes_trans.Delete') }}
                                                                        </button>
                                                                    </div>
                                                                </form>

                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <div class="noresult" style="display: none">
                                    <div class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                            colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                        </lord-icon>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                        <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find
                                            any
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

                    <form class=" row mb-30" action="{{ route('classes.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="table-responsive" data-repeater-list="List_Classes">
                                <table id="tbleClasse" class="invoice-table table table-borderless table-nowrap mb-0">
                                    <thead class="align-middle">
                                        <tr class="table-active">
                                            <th scope="col" style="width: 50px;">#</th>
                                            <th scope="col">
                                                {{ trans('Classes_trans.nameClasse') }}
                                            </th>
                                            <th scope="col">
                                                {{ trans('Classes_trans.nameClasse_en') }}
                                            </th>
                                            <th scope="col" class="text-end">
                                                {{ trans('Classes_trans.name_Grade') }}</th>
                                            <th scope="col" class="text-end" style="width: 105px;">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="newlink" data-repeater-list="List_Classes">
                                        <tr id="1" class="classe">
                                            <th scope="row" id="nbrClassement1" class="classe-id">1</th>
                                            <td class="text-start">
                                                <div class="mb-2">
                                                    <input type="text" class="form-control bg-light border-0"
                                                        id="nameClasse-1" name="name[0][ar]"
                                                        placeholder="{{ trans('Classes_trans.nameClasse') }}" required />
                                                    <div class="invalid-feedback">
                                                        Please enter a product name
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="text-start">
                                                <div class="mb-2">
                                                    <input type="text" class="form-control bg-light border-0"
                                                        id="nameClasse-en-1" name="name[0][en]"
                                                        placeholder="{{ trans('Classes_trans.nameClasse_en') }}"
                                                        required />
                                                    <div class="invalid-feedback">
                                                        Please enter a product name
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="text-end">
                                                <div>

                                                    <select id="nameGrade-1" name="grade_id[]"
                                                        class="form-select form-control mb-3 bg-light nameGrade"
                                                        aria-label="Default select example">
                                                        <option selected>{{ trans('Classes_trans.name_Grade') }} </option>

                                                        @foreach ($grades as $grade)
                                                            <option value="{{ $grade->id }}">{{ $grade->Name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="product-removal">
                                                <a href="javascript:void(0)"
                                                    class="btn btn-success btnDelete">{{ trans('Classes_trans.Delete') }}</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tbody>

                                        <tr>
                                            <td colspan="5">
                                                {{-- <a href="javascript:new_link()" id="add-item"
                                            class="btn btn-soft-secondary fw-medium"><i
                                                class="ri-add-fill me-1 align-bottom"></i>
                                            {{ trans('Classes_trans.add_row') }}</a> --}}

                                                <button id='btnRepeater' class="btn btn-soft-secondary fw-medium"
                                                    type='button'><i
                                                        class="ri-add-fill me-1 align-bottom"></i>Ajouter</button>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--end table-->
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>

                                <button type="submit"
                                    class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                            </div>


                            {{-- </div> --}}
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    {{-- :::::::::::::::::::::::::::fin modal d'ajout::::::::::::::::::::::::::: --}}

    <!-- :::::::::::::::::::::::::::multi delete_modal_classe ::::::::::::::::::::::-->

    <div id="delete_all" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="zoomInModalLabel">
                        {{ trans('Classes_trans.delete_class') }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('delete_all') }}" method="post">
                    {{-- {{ method_field('Delete') }} --}}
                    @csrf
                    <div class="modal-body">

                        {{ trans('Grades_trans.Warning_Grade') }}
                        <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success"
                            data-bs-dismiss="modal">{{ trans('Classes_trans.Close') }}</button>
                        <button type="submit" class="btn btn-danger ">{{ trans('Classes_trans.Delete') }}
                        </button>
                    </div>
                </form>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->




@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <!-- listjs init -->
    <script src="{{ URL::asset('assets/js/pages/listjs.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/sweetalert.min.js') }}"></script>
    <!--Invoice create init js-->
    <script src="{{ URL::asset('assets/js/pages/invoicecreate.init.js') }}"></script>

    <!--datatable js-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="{{ URL::asset('assets/js/pages/datatables.init.js') }}"></script>
    <script type="text/javascript">
        // :::::::::::::::cette ligne pour obtenir l'url du site::::::::::::::
        var SITEURL = '{{ URL::to('') }}';
    </script>
@endsection
