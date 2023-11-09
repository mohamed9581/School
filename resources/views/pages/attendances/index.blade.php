@extends('layouts.appp')
@section('title')
    {{ trans('Attendances_trans.liste_Attendance') }}
@endsection
@section('pagetitle')
    {{ trans('Attendances_trans.liste_Attendance') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ trans('Attendances_trans.title_page') }}
                </div>

                <div class="p-3">
                    <h5 style="font-family: 'Cairo', sans-serif;color: red">{{ trans('Attendances_trans.dateJour') }}
                        {{ date('d-m-Y') }}</h5>
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


                    <div class="card-body" id="showTable">
                        <div id="customerList">
                            <div class="row g-4 mb-3">

                                <div class="col-sm">
                                    <div class="d-flex justify-content-sm-end">
                                        <div class="search-box ms-2">
                                            <input type="search" class="form-control search"
                                                placeholder="{{ trans('pagination.search') }}">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form method="post" action="{{ route('attendances.store') }}">

                                @csrf
                                <div class="table-responsive table-card mt-3 mb-1" id="tableAttendances">
                                    <table class="table align-middle table-nowrap">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll"
                                                            value="option">
                                                    </div>
                                                </th>
                                                <th>N°</th>
                                                <th>{{ trans('Attendances_trans.nomStudent') }}</th>
                                                <th class="sort" data-sort="email">{{ trans('Attendances_trans.email') }}
                                                </th>
                                                <th>{{ trans('Attendances_trans.gender') }}</th>
                                                <th>{{ trans('Attendances_trans.nomGrade') }}</th>
                                                <th>{{ trans('Attendances_trans.nomClasse') }}</th>
                                                <th>{{ trans('Attendances_trans.nomSection') }}</th>
                                                <th>{{ trans('Attendances_trans.Processes') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all" id="parentBody">
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

                                                        @if (isset(
                                                                $student->attendances()->where('attendence_date', date('Y-m-d'))->first()->student_id))
                                                            <label
                                                                class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                                <input name="attendences[{{ $student->id }}]" disabled
                                                                    {{ $student->attendances()->where('attendence_date', date('Y-m-d'))->first()->attendence_status == 1? 'checked': '' }}
                                                                    class="leading-tight" type="radio" value="presence">
                                                                <span
                                                                    class="text-success">{{ trans('Attendances_trans.present') }}</span>
                                                            </label>

                                                            <label class="ml-4 block text-gray-500 font-semibold">
                                                                <input name="attendences[{{ $student->id }}]" disabled
                                                                    {{ $student->attendances()->where('attendence_date', date('Y-m-d'))->first()->attendence_status == 0? 'checked': '' }}
                                                                    class="leading-tight" type="radio" value="absent">
                                                                <span
                                                                    class="text-danger">{{ trans('Attendances_trans.absent') }}</span>
                                                            </label>
                                                        @else
                                                            <div
                                                                class="form-check form-check-inline form-radio-outline form-radio-success mb-3">
                                                                <input class="form-check-input" type="radio"
                                                                    value="presence"
                                                                    name="attendences[{{ $student->id }}]">
                                                                <label class="form-check-label text-success"
                                                                    for="formradioRight7">
                                                                    {{ trans('Attendances_trans.present') }}
                                                                </label>
                                                            </div>
                                                            <div
                                                                class="form-check form-check-inline form-radio-outline form-radio-danger mb-3">
                                                                <input
                                                                    class="form-check-input form-radio-outline form-radio-danger"
                                                                    type="radio" value="absent"
                                                                    name="attendences[{{ $student->id }}]">
                                                                <label class="form-check-label text-danger"
                                                                    for="formradioRight7">
                                                                    {{ trans('Attendances_trans.absent') }}
                                                                </label>
                                                            </div>

                                                            {{-- <label
                                                                class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                                <input name="attendences[{{ $student->id }}]"
                                                                    class="form-radio-success" type="radio" value="presence">
                                                                <span
                                                                    class="text-success">{{ trans('Attendances_trans.present') }}</span>
                                                            </label> --}}

                                                            {{-- <label class="ml-4 block text-gray-500 font-semibold">
                                                                <input name="attendences[{{ $student->id }}]"
                                                                    class="leading-tight" type="radio" value="absent">
                                                                <span
                                                                    class="text-danger">{{ trans('Attendances_trans.absent') }}</span>
                                                            </label> --}}
                                                        @endif

                                                        <input type="hidden" name="student_id[]"
                                                            value="{{ $student->id }}">
                                                        <input type="hidden" name="grade_id"
                                                            value="{{ $student->grade_id }}">
                                                        <input type="hidden" name="classe_id"
                                                            value="{{ $student->classe_id }}">
                                                        <input type="hidden" name="section_id"
                                                            value="{{ $student->section_id }}">

                                                    </td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    @if ($students && $students->count() == 0)
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
                                <P>
                                <div class="modal-footer">
                                    <button class="btn btn-success"
                                        type="submit">{{ trans('Attendances_trans.submit') }}</button>
                                </div>

                                </P>
                            </form>
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
