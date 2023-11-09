@extends('layouts.appp')
@section('title')
    {{ trans('Students_trans.personal_information') }}
@endsection
@section('pagetitle')
    {{ trans('Students_trans.personal_information') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ trans('Students_trans.information') }}
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
                                    <form method=POST id="updateStudent"
                                        action="{{ route('students.update', $student->id) }}" autocomplete="off">
                                        @csrf
                                        {{ method_field('patch') }}
                                        <input id="id" type="hidden" name="id" class="form-control"
                                            value="{{ $student->id }}">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <h3 class="text-success">{{ trans('Students_trans.personal_information') }}
                                                </h3>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="Name"
                                                        class="form-label">{{ trans('Students_trans.Name_ar') }}</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $student->getTranslation('name', 'ar') }}" name="name[ar]"
                                                        id="name">
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='name_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="Name_en"
                                                        class="form-label">{{ trans('Students_trans.Name_en') }}</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $student->getTranslation('name', 'en') }}"
                                                        name="name[en]" id="name_en">
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='name_en_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="email"
                                                        class="form-label">{{ trans('Students_trans.Email') }}</label>
                                                    <input type="email" class="form-control"
                                                        value="{{ $student->email }}" name="email" id="email"
                                                        autocomplete="off">
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='email_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="parent_id"
                                                        class="form-label">{{ trans('Students_trans.parent') }}</label>
                                                    <select id="parent_id" name="parent_id"
                                                        class="form-select form-control mb-3 bg-light "
                                                        aria-label="Default select example">
                                                        <option selected disabled>
                                                            {{ trans('Students_trans.ChoisirParent') }}
                                                        </option>
                                                        @foreach ($parents as $parent)
                                                            <option
                                                                {{ $student->parent_id == $parent->id ? 'selected' : '' }}
                                                                value="{{ $parent->id }}">{{ $parent->name_Father }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='parent_id_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="gender_id"
                                                        class="form-label">{{ trans('Students_trans.Gender') }}</label>
                                                    <select id="gender_id" name="gender_id"
                                                        class="form-select form-control mb-3 bg-light "
                                                        aria-label="Default select example">

                                                        @foreach ($genders as $gender)
                                                            <option
                                                                {{ $student->gender->id == $gender->id ? 'selected' : '' }}
                                                                value="{{ $gender->id }}">{{ $gender->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='gender_id_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="gender_id"
                                                        class="form-label">{{ trans('Students_trans.Nationalite') }}</label>
                                                    <select id="nationalite_id" name="nationalite_id"
                                                        class="form-select form-control mb-3 bg-light "
                                                        aria-label="Default select example">
                                                        <option selected disabled>
                                                            {{ trans('Students_trans.ChoisirNationalite') }}
                                                        </option>
                                                        @foreach ($nationalites as $nationalite)
                                                            <option
                                                                {{ $student->nationalite_id == $nationalite->id ? 'selected' : '' }}
                                                                value="{{ $nationalite->id }}">{{ $nationalite->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='nationalite_id_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="blood_id"
                                                        class="form-label">{{ trans('Students_trans.blood') }}</label>
                                                    <select id="blood_id" name="blood_id"
                                                        class="form-select form-control mb-3 bg-light "
                                                        aria-label="Default select example">
                                                        <option selected disabled>
                                                            {{ trans('Students_trans.ChoisirBlood') }}
                                                        </option>
                                                        @foreach ($bloods as $blood)
                                                            <option
                                                                {{ $student->blood_id == $blood->id ? 'selected' : '' }}
                                                                value="{{ $blood->id }}">{{ $blood->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='blood_id_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="dateNaissance"
                                                        class="form-label">{{ trans('Students_trans.Date_of_Birth') }}</label>
                                                    <input type="date" class="form-control"
                                                        value="{{ $student->Date_Birth }}" name="Date_of_Birth"
                                                        id="Date_of_Birth">
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='Date_of_Birth_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->

                                        <div class="row">
                                            <div class="col-md-6 mb-3 mt-3">
                                                <h3 class="text-success">{{ trans('Students_trans.Student_information') }}
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
                                                        @foreach ($classes as $classe)
                                                            <option
                                                                {{ $student->grade_id == $classe->id ? 'selected' : '' }}
                                                                value="{{ $classe->id }}">{{ $classe->Name }}
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
                                                        <option selected value="{{ $student->classe_id }}">
                                                            {{ $student->classe->nomClasse }}
                                                        </option>
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
                                                        <option selected value="{{ $student->section_id }}">
                                                            {{ $student->section->nomSection }}
                                                        </option>
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
                                                    <label for="blood_id"
                                                        class="form-label">{{ trans('Students_trans.academic_year') }}</label>
                                                    <select id="academic_year" name="academic_year"
                                                        class="form-select form-control mb-3 bg-light "
                                                        aria-label="Default select example">
                                                        <option selected disabled>
                                                            {{ trans('Students_trans.ChoisirAnnee') }}
                                                        </option>

                                                        @php
                                                            $current_year = date('Y');
                                                        @endphp
                                                        @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                                            <option value="{{ $year }}"
                                                                {{ $year == $student->academic_year ? 'selected' : ' ' }}>
                                                                {{ $year }}</option>
                                                        @endfor

                                                    </select>
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='academic_year_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                        <div class="modal-footer">
                                            <div class="hstack gap-2 justify-content-end">

                                                <button type="submit" id="btnSave"
                                                    class="btn btn-success">{{ trans('Students_trans.update') }}</button>
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
