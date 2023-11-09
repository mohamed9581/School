@extends('layouts.appp')
@section('title')
    {{ trans('Quizzes_trans.edit_Quizze') }}
@endsection
@section('pagetitle')
    {{ trans('Quizzes_trans.edit_Quizze') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ trans('Quizzes_trans.edit_Quizze') }}
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
                                    <form method=POST id="updateQuizze" action="{{ route('quizzesUpdate', $quizze->id) }}"
                                        autocomplete="off">
                                        @csrf
                                        {{ method_field('patch') }}
                                        <input id="id" type="hidden" name="id" class="form-control"
                                            value="{{ $quizze->id }}">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="Name"
                                                        class="form-label">{{ trans('Quizzes_trans.quizze_name_ar') }}</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $quizze->getTranslation('name', 'ar') }}" name="name[ar]"
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
                                                        class="form-label">{{ trans('Quizzes_trans.quizze_name_en') }}</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $quizze->getTranslation('name', 'en') }}" name="name[en]"
                                                        id="name_en">
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='name_en_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="subject_id"
                                                        class="form-label">{{ trans('Quizzes_trans.nomSubject') }}</label>
                                                    <select id="subject_id" name="subject_id"
                                                        class="form-select form-control mb-3 bg-light "
                                                        aria-label="Default select example">
                                                        @foreach ($data['subjects'] as $subject)
                                                            <option
                                                                {{ $quizze->subject_id == $subject->id ? 'selected' : '' }}
                                                                value="{{ $subject->id }}">
                                                                {{ $subject->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='subject_id_error' class="form-text text-danger"></small>
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
                                                        class="form-label">{{ trans('Quizzes_trans.nomGrade') }}</label>
                                                    <select id="grades_id" name="grades_id"
                                                        class="form-select form-control mb-3 bg-light "
                                                        aria-label="Default select example">
                                                        <option selected disabled>
                                                            {{ trans('Quizzes_trans.ChoisirStade') }}
                                                        </option>
                                                        @foreach ($data['grades'] as $grade)
                                                            <option {{ $quizze->grade_id == $grade->id ? 'selected' : '' }}
                                                                value="{{ $grade->id }}">
                                                                {{ $grade->Name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='grades_id_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="classes_id"
                                                        class="form-label">{{ trans('Quizzes_trans.nomClasse') }}</label>
                                                    <select id="classes_id" name="classes_id"
                                                        class="form-select form-control mb-3 bg-light "
                                                        aria-label="Default select example">
                                                        <option selected value="{{ $quizze->classe_id }}">
                                                            {{ $quizze->classe->nomClasse }}
                                                        </option>
                                                        {{-- à remplir par ajax --}}

                                                    </select>
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='classes_id_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="sections_id"
                                                        class="form-label">{{ trans('Quizzes_trans.nomSection') }}</label>
                                                    <select id="sections_id" name="sections_id"
                                                        class="form-select form-control mb-3 bg-light "
                                                        aria-label="Default select example">
                                                        <option selected value="{{ $quizze->section_id }}">
                                                            {{ $quizze->section->nomSection }}
                                                        </option>
                                                        {{-- à remplir par ajax --}}
                                                    </select>
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='sections_id_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->


                                        </div>
                                        <!--end row-->

                                        <div class="modal-footer">
                                            <div class="hstack gap-2 justify-content-end">

                                                <button type="submit" id="btnSave"
                                                    class="btn btn-success">{{ trans('Quizzes_trans.submit') }}</button>
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
