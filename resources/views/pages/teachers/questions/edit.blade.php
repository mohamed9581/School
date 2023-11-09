@extends('layouts.appp')
@section('title')
    {{ trans('Questions_trans.edit_Question') }}
@endsection
@section('pagetitle')
    {{ trans('Questions_trans.edit_Question') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ trans('Questions_trans.edit_Question') }} : <span
                        class="text-warning bold">{{ $question->title }}</span>
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
                                    <form method=POST id="updateQuestion"
                                        action="{{ route('questionsUpdate', $question->id) }}" autocomplete="off">
                                        @csrf
                                        {{ method_field('patch') }}
                                        <input id="id" type="hidden" name="id" class="form-control"
                                            value="{{ $question->id }}">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="hidden" class="form-control"
                                                        value="{{ $question->quizze->id }}" name="quizze_id" id="quizze_id">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="score"
                                                        class="form-label">{{ trans('Questions_trans.degree') }}</label>
                                                    <select id="score" name="score"
                                                        class="form-select form-control mb-3 bg-light "
                                                        aria-label="Default select example">

                                                        <option {{ $question->score == '1' ? 'selected' : '' }}
                                                            value="1">1</option>
                                                        <option {{ $question->score == '2' ? 'selected' : '' }}
                                                            value="2">2</option>
                                                        <option {{ $question->score == '3' ? 'selected' : '' }}
                                                            value="3">3</option>
                                                        <option {{ $question->score == '4' ? 'selected' : '' }}
                                                            value="4">4</option>
                                                        <option {{ $question->score == '5' ? 'selected' : '' }}
                                                            value="5">5</option>
                                                        <option {{ $question->score == '6' ? 'selected' : '' }}
                                                            value="6">6</option>
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
                                                    <input type="text" class="form-control"
                                                        value="{{ $question->title }}" name="title" id="title">
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
                                                        class="form-label">{{ trans('Questions_trans.reponses') }} <small
                                                            class="text-danger">({{ trans('Questions_trans.tirets') }})</small>
                                                    </label>
                                                    <textarea class="form-control" name="answers" id="answers" rows="4">{{ $question->answers }}</textarea>
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='answers_error' class="form-text text-danger"></small>
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
                                                        value="{{ $question->right_answer }}" name="right_answer"
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
