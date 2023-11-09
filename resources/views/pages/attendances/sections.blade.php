@extends('layouts.appp')
@section('title')
    {{ trans('Attendances_trans.sections') }} : {{ trans('Attendances_trans.title_page') }}
@endsection
@section('pagetitle')
    {{ trans('Attendances_trans.title_page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ trans('Attendances_trans.title_page') }}
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
                                                        {{ trans('Attendances_trans.add_section') }}</button>
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
                                                                                <th>{{ trans('Attendances_trans.N°') }}
                                                                                </th>
                                                                                <th class="sort" data-sort="name">
                                                                                    {{ trans('Attendances_trans.nomSection') }}
                                                                                </th>
                                                                                <th>{{ trans('Attendances_trans.nomClasse') }}
                                                                                </th>
                                                                                <th>{{ trans('Attendances_trans.Status') }}
                                                                                </th>
                                                                                <th>{{ trans('Attendances_trans.Processes') }}
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="list form-check-all" id="classeBody">


                                                                            @foreach ($grade->sections as $i => $section)
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
                                                                                        <a href="{{ route('attendances.show', $section->id) }}"
                                                                                            title="{{ trans('Attendances_trans.listeStudents') }}"
                                                                                            class=" btn btn-sm edit-item-btn btn-warning edit-item-btn">
                                                                                            {{ trans('Attendances_trans.listeStudents') }}
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach

                                                                        </tbody>
                                                                    </table>
                                                                    @if ($grade->sections && $grade->sections->count() == 0)
                                                                        <div class="noresult">
                                                                            <div class="text-center">
                                                                                <lord-icon
                                                                                    src="https://cdn.lordicon.com/msoeawqm.json"
                                                                                    trigger="loop"
                                                                                    colors="primary:#121331,secondary:#08a88a"
                                                                                    style="width:75px;height:75px">
                                                                                </lord-icon>
                                                                                <h5 class="mt-2">
                                                                                    {{ trans('main_trans.nowData') }}</h5>
                                                                            </div>
                                                                        </div>
                                                                    @endif
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
        // Do this before you initialize any of your modals
        $(document).ready(function() {

            $('#teacher_id').select2();


        });
        // :::::::::::::::cette ligne pour obtenir l'url du site::::::::::::::
        var SITEURL = '{{ URL::to('') }}';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            // $('#teacher_id').select2();

            $('select[name="grade_id"]').on('change', function() {
                var grade_id = $(this).val();
                console.log(grade_id);
                //pour recuperer la langue active
                var langueActive = $('html').attr('lang');
                if (grade_id) {
                    $.ajax({
                        url: "{{ URL::to('classes') }}/" + grade_id,
                        type: "post",
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
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
