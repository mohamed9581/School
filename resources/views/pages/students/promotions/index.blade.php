@extends('layouts.appp')
@section('title')
    {{ trans('main_trans.Students_Promotions') }}
@endsection
@section('pagetitle')
    {{ trans('main_trans.Students_Promotions') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ trans('main_trans.Students_Promotions') }}
                </div>
                <div class="card-body">
                    @if (Session::has('error_promotions'))
                        <div class="alert alert-danger">
                            <strong>{{ Session::get('error_promotions') }}</strong>
                        </div>
                    @endif
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
                                    <form method=POST id="addPromotion" action="{{ route('promotions.store') }}"
                                        autocomplete="off">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <h3 class="text-success">{{ trans('Students_trans.Grade_ancien') }}
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="grade_id"
                                                        class="form-label">{{ trans('Students_trans.Grade') }}</label>
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
                                                        class="form-label">{{ trans('Students_trans.classrooms') }}</label>
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
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="section_id"
                                                        class="form-label">{{ trans('Students_trans.section') }}</label>
                                                    <select id="section_id" name="section_id"
                                                        class="form-select form-control mb-3 bg-light "
                                                        aria-label="Default select example">

                                                        {{-- à remplir par ajax --}}
                                                    </select>
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='section_id_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="academic_year"
                                                        class="form-label">{{ trans('Students_trans.academic_year') }} :
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
                                        </div>
                                        <!--end row-->

                                        <div class="row">
                                            <div class="col-md-6 mb-3 mt-3">
                                                <h3 class="text-success">{{ trans('Students_trans.Grade_nouveau') }}
                                                </h3>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="grade_id"
                                                        class="form-label">{{ trans('Students_trans.Grade') }}</label>
                                                    <select id="to_grade_id" name="to_grade_id"
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
                                                    <small id='to_grade_id_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="classe_id"
                                                        class="form-label">{{ trans('Students_trans.classrooms') }}</label>
                                                    <select id="to_classe_id" name="to_classe_id"
                                                        class="form-select form-control mb-3 bg-light "
                                                        aria-label="Default select example">

                                                        {{-- à remplir par ajax --}}

                                                    </select>
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='to_classe_id_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="section_id"
                                                        class="form-label">{{ trans('Students_trans.section') }}</label>
                                                    <select id="to_section_id" name="to_section_id"
                                                        class="form-select form-control mb-3 bg-light "
                                                        aria-label="Default select example">

                                                        {{-- à remplir par ajax --}}
                                                    </select>
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='to_section_id_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="academic_year">{{ trans('Students_trans.academic_year') }}
                                                        : <span class="text-danger">*</span></label>
                                                    <select class="form-select form-control mb-3 bg-light "
                                                        name="academic_year_new">
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

                                        </div>
                                        <!--end row-->
                                        <div class="modal-footer">
                                            <div class="hstack gap-2 justify-content-end">

                                                <button type="submit" id="btnSave"
                                                    class="btn btn-success">{{ trans('Students_trans.submit') }}</button>
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
