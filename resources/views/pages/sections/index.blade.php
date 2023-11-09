@extends('layouts.appp')
@section('title')
    {{ trans('Sections_trans.title_page') }}
@endsection
@section('pagetitle')
    {{ trans('Sections_trans.title_page') }}
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




                            <div class="col">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="row g-4 mb-3">
                                            <div class="col-sm-auto">
                                                <div>
                                                    <button type="button" class="btn btn-success add-btn"
                                                        data-bs-toggle="modal" id="create-btn"
                                                        data-bs-target="#showModal"><i
                                                            class="ri-add-line align-bottom me-1"></i>
                                                        {{ trans('Sections_trans.add_section') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="live-preview">
                                            <div class="accordion custom-accordionwithicon custom-accordion-border accordion-border-box accordion-success"
                                                id="accordionBordered">
                                                @foreach ($grades as $index => $grade)
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header"
                                                            id="accordionborderedExample{{ $index }}">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#accor_borderedExamplecollapse{{ $index }}"
                                                                aria-expanded="false"
                                                                aria-controls="accor_borderedExamplecollapse{{ $index }}">
                                                                {{ $grade->Name }}
                                                            </button>
                                                        </h2>
                                                        <div id="accor_borderedExamplecollapse{{ $index }}"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="accordionborderedExample{{ $index }}"
                                                            data-bs-parent="#accordionBordered">
                                                            <div class="accordion-body">
                                                                <div class="table-responsive table-card mt-3 mb-1">
                                                                    <table class="table align-middle table-nowrap"
                                                                        id="classeTable">
                                                                        <thead class="table-light">
                                                                            <tr>
                                                                                <th scope="col" style="width: 50px;">
                                                                                    <div class="form-check">
                                                                                        <input class="form-check-input"
                                                                                            type="checkbox" id="checkAll"
                                                                                            value="option">
                                                                                    </div>
                                                                                </th>
                                                                                <th>N°</th>
                                                                                <th class="sort" data-sort="name">
                                                                                    {{ trans('Sections_trans.nom') }}</th>
                                                                                <th>{{ trans('Sections_trans.nomClasse') }}
                                                                                </th>
                                                                                <th>{{ trans('Sections_trans.Status') }}
                                                                                </th>
                                                                                <th>{{ trans('Sections_trans.Processes') }}
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="list form-check-all" id="classeBody">
                                                                            @if (isset($details))
                                                                                <?php $List_Sections = $details; ?>
                                                                            @else
                                                                                <?php $List_Sections = $grade->sections; ?>
                                                                            @endif

                                                                            @foreach ($List_Sections as $i => $section)
                                                                                <tr>
                                                                                    <td scope="col" style="width: 50px;">
                                                                                        <div class="form-check">
                                                                                            <input type="checkbox"
                                                                                                value="{{ $section->id }}"
                                                                                                class="form-check-input box1">
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>{{ $i = $i + 1 }}</td>
                                                                                    <td>{{ $section->nomSection }}</td>
                                                                                    <td>{{ $section->classes->nomClasse }}
                                                                                    </td>
                                                                                    <td>
                                                                                        <div
                                                                                            class="badge rounded-pill {{ $section->status == 1 ? 'bg-success' : 'bg-danger' }} mb-0">
                                                                                            {{ $section->status == 1 ? trans('Sections_trans.Status_Section_AC') : trans('Sections_trans.Status_Section_No') }}
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <button
                                                                                            section_id="{{ $section->id }}"
                                                                                            class="editClasse btn btn-sm btn-success edit-item-btn"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#edit{{ $section->id }}"
                                                                                            data-section="{{ $section }}">{{ trans('Sections_trans.Edit') }}</button>
                                                                                        <button
                                                                                            section_id="{{ $section->id }}"
                                                                                            class="deleteSection btn btn-sm btn-danger delete-item-btn"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#delete{{ $section->id }}"
                                                                                            data-section="{{ $section }}">{{ trans('Sections_trans.Delete') }}</button>

                                                                                    </td>
                                                                                </tr>

                                                                                @include('pages.sections.edit')
                                                                                @include('pages.sections.delete')
                                                                            @endforeach

                                                                        </tbody>
                                                                    </table>
                                                                    <div class="noresult" style="display: none">
                                                                        <div class="text-center">
                                                                            <lord-icon
                                                                                src="https://cdn.lordicon.com/msoeawqm.json"
                                                                                trigger="loop"
                                                                                colors="primary:#121331,secondary:#08a88a"
                                                                                style="width:75px;height:75px">
                                                                            </lord-icon>
                                                                            <h5 class="mt-2">Sorry! No Result Found</h5>
                                                                            <p class="text-muted mb-0">We've searched more
                                                                                than 150+ Orders We did not find
                                                                                any
                                                                                orders for you search.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex justify-content-end">
                                                                    <div class="pagination-wrap hstack gap-2">
                                                                        <a class="page-item pagination-prev disabled"
                                                                            href="#">
                                                                            {{ trans('pagination.previous') }}
                                                                        </a>
                                                                        <ul class="pagination listjs-pagination mb-0"></ul>
                                                                        <a class="page-item pagination-next" href="#">
                                                                            {{ trans('pagination.next') }}

                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div><!-- end card-body -->
                                </div><!-- end card -->
                            </div>
                            <!--end col-->


                        </div>
                    </div><!-- end card -->
                </div>
            </div>


        </div>
    </div>

    {{-- :::::::::::::::::::::::::::debut modal ajout::::::::::::::::::::::::::::::::::::::::::::::::::::::::: --}}
    <div class="modal fade " id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <div class="p-3">
                    <form method=POST id="addGrade" action="{{ route('sections.store') }}" autocomplete="off">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">

                                    <input type="text" class="form-control" value="{{ old('name[ar]') }}"
                                        name="name[ar]" id="Name"
                                        placeholder="{{ trans('Sections_trans.Section_name_ar') }}">
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" value="{{ old('name[en]') }}"
                                        name="name[en]" id="Name_en"
                                        placeholder="{{ trans('Sections_trans.Section_name_en') }}">
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="grade_id"
                                        class="form-label">{{ trans('Sections_trans.Name_Grade') }}</label>
                                    <select id="nameGrade-1" name="grade_id" onchange="getTeachers()"
                                        class="form-select gradeid form-control mb-3 bg-light nameGrade"
                                        aria-label="Default select example">
                                        <option selected>{{ trans('Sections_trans.Select_Grade') }} </option>

                                        @foreach ($listegrades as $grade)
                                            <option value="{{ $grade->id }}">{{ $grade->Name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="grade_id"
                                        class="form-label">{{ trans('Sections_trans.nomClasse') }}</label>
                                    <select id="nameClasse-1" name="classe_id"
                                        class="form-select form-control mb-3 bg-light nameClasse"
                                        aria-label="Default select example">

                                    </select>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="teacher_id"
                                        class="form-label">{{ trans('Sections_trans.Name_Teacher') }}</label>
                                    <select multiple id="teacher_id" name="teacher_id[]"
                                        class="form-select js-example-basic-multiple form-control mb-3 bg-light nameTeacher"
                                        aria-label="Default select example">
                                        @foreach ($listeteachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    {{-- <select multiple id="teacher_id" name="teacher_id[]"
                                        class="form-select teacherid js-example-basic-multiple form-control mb-3 bg-light nameTeacher"
                                        aria-label="Default select example">

                                    </select> --}}
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
                                    class="btn btn-success">{{ trans('Sections_trans.add_section') }}</button>
                            </div>
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
    <script src="{{ URL::asset('assets/js/pages/repeaterRow.js') }}"></script>
    <script type="text/javascript">

        // function getTeachers() {
        //     // Récupérer la valeur sélectionnée dans l'input select nameGrade-1
        //     var selectedGrade = document.getElementById("nameGrade-1").value;
        //     var langueActive = $('html').attr('lang');

        //     // Envoyer une requête AJAX pour récupérer les enseignants correspondants à la sélection de l'utilisateur
        //     $.ajax({
        //         type: "POST",
        //         url: "/getTeachers/" + selectedGrade,
        //         data: {
        //             grade_id: selectedGrade
        //         },
        //         success: function(data) {
        //             // Mettre à jour l'input select teacher_id avec les enseignants correspondants
        //             var teacherSelect = document.getElementById("teacher_id");
        //             teacherSelect.innerHTML = ""; // Supprimer les options existantes
        //             for (var i = 0; i < data.length; i++) {
        //                 console.log(data);
        //                 var option = document.createElement("option");
        //                 if (langueActive == 'ar') {
        //                     option.text = data[i].name.ar;
        //                 } else {
        //                     option.text = data[i].name.en;
        //                 }
        //                 option.value = data[i].id;
        //                 teacherSelect.add(option);
        //             }
        //         }
        //     });
        // }

        // :::::::::::::::cette ligne pour obtenir l'url du site::::::::::::::
        var SITEURL = '{{ URL::to('') }}';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#teacher_id').select2();

            $('select[name="grade_id"]').on('change', function() {
                var grade_id = $(this).val();
                // console.log(grade_id);
                //pour recuperer la langue active
                var langueActive = $('html').attr('lang');
                if (grade_id) {
                    $.ajax({
                        url: "{{ URL::to('classes') }}/" + grade_id,
                        type: "post",
                        dataType: "json",
                        success: function(data) {
                            // console.log(data);
                            $('select[name="classe_id"]').empty();

                            $.each(data, function(key, value) {
                                if (langueActive == 'ar') {
                                    $('select[name="classe_id"]').append(
                                        '<option value="' +
                                        value.id + '">' +
                                        value.nomClasse.ar + '</option>');
                                } else {
                                    $('select[name="classe_id"]').append(
                                        '<option value="' +
                                        value.id + '">' +
                                        value.nomClasse.en + '</option>');
                                }
                            });

                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection
