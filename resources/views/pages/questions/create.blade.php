@extends('layouts.appp')
@section('title')
    {{ trans('Questions_trans.add_Question') }}
@endsection
@section('pagetitle')
    {{ trans('Questions_trans.add_Question') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ trans('Questions_trans.add_Question') }}
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
                                    <form method=POST id="addQuestion" action="{{ route('questions.store') }}"
                                        autocomplete="off">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="quizze"
                                                        class="form-label">{{ trans('Questions_trans.nomQuizze') }}</label>
                                                    <input type="text" class="form-control" value="{{ $quizze->name }}"
                                                        name="quizzeName" id="quizzeName" disabled>
                                                    <input type="hidden" class="form-control" value="{{ $quizze->id }}"
                                                        name="quizze_id" id="quizze_id">
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='quizzeName_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="score"
                                                        class="form-label">{{ trans('Questions_trans.degree') }}</label>
                                                    <select id="score" name="score"
                                                        class="form-select form-control mb-3 bg-light "
                                                        aria-label="Default select example">
                                                        <option selected disabled>
                                                            {{ trans('Questions_trans.choisirDegree') }}
                                                        </option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                    </select>
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='score_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="title"
                                                        class="form-label">{{ trans('Questions_trans.question') }}</label>
                                                    <input type="text" class="form-control" value="{{ old('title') }}"
                                                        name="title" id="title">
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='title_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="answers"
                                                        class="form-label">{{ trans('Questions_trans.reponses') }}</label>
                                                    <textarea class="form-control" name="answers" id="answers" rows="4"></textarea>
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='sanswers_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="right_answer"
                                                        class="form-label">{{ trans('Questions_trans.reponseCorrect') }}</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ old('right_answer') }}" name="right_answer"
                                                        id="right_answer">
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='right_answer_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->

                                        </div>
                                        <!--end row-->

                                        <div class="modal-footer">
                                            <div class="hstack gap-2 justify-content-end">

                                                <button type="submit" id="btnSave"
                                                    class="btn btn-success">{{ trans('Questions_trans.submit') }}</button>
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
