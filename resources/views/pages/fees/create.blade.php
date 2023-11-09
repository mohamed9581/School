@extends('layouts.appp')
@section('title')
    {{ trans('Fees_trans.add_Fees') }}
@endsection
@section('pagetitle')
    {{ trans('Fees_trans.add_Fees') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ trans('Fees_trans.add_Fees') }}
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
                                <div class="p-1">
                                    <form method=POST id="addFee" action="{{ route('fees.store') }}" autocomplete="off">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="Name"
                                                        class="form-label">{{ trans('Fees_trans.title_name_ar') }}</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ old('title[ar]') }}" name="title[ar]" id="title">
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='title_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="Name_en"
                                                        class="form-label">{{ trans('Fees_trans.title_name_en') }}</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ old('title[en]') }}" name="title[en]" id="title_en">
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='title_en_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="amount"
                                                        class="form-label">{{ trans('Fees_trans.amount') }}</label>
                                                    <input type="number" class="form-control" value="{{ old('amount') }}"
                                                        name="amount" id="amount">
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='amount_en_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="grade_id"
                                                        class="form-label">{{ trans('Fees_trans.grade') }}</label>
                                                    <select id="grade_id" name="grade_id"
                                                        class="form-select form-control mb-3 bg-light "
                                                        aria-label="Default select example">
                                                        <option selected disabled>
                                                            {{ trans('Students_trans.ChoisirStade') }}
                                                        </option>
                                                        @foreach ($grades as $grade)
                                                            <option value="{{ $grade->id }}">
                                                                {{ $grade->Name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='grade_id_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="classe_id"
                                                        class="form-label">{{ trans('Fees_trans.classe') }}</label>
                                                    <select id="classe_id" name="classe_id"
                                                        class="form-select form-control mb-3 bg-light "
                                                        aria-label="Default select example">

                                                        {{-- à remplir par ajax --}}

                                                    </select>
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='classe_id_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <label for="academic_year"
                                                        class="form-label">{{ trans('Fees_trans.year') }} :
                                                        <span class="text-danger">*</span></label>
                                                    <select class="form-select form-control mb-3 bg-light"
                                                        name="academic_year">
                                                        <option selected disabled>{{ trans('Parent_trans.Choose') }}...
                                                        </option>
                                                        @php
                                                            $current_year = date('Y');
                                                        @endphp
                                                        @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                                            <option value="{{ $year }}">{{ $year }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="fee_type"
                                                        class="form-label">{{ trans('Fees_trans.fee_type') }}</label>
                                                    <select id="fee_type" name="fee_type"
                                                        class="form-select form-control mb-3 bg-light "
                                                        aria-label="Default select example">
                                                        <option value="1">{{ trans('Fees_trans.fraisScolarite') }}
                                                        </option>
                                                        <option value="2">{{ trans('Fees_trans.fraisTransport') }}
                                                        </option>
                                                    </select>
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='fee_type_error' class="form-text text-danger"></small>
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
                                                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='description_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                        <div class="modal-footer">
                                            <div class="hstack gap-2 justify-content-end">

                                                <button type="submit" id="btnSave"
                                                    class="btn btn-success">{{ trans('Fees_trans.submit') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
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
@endsection
