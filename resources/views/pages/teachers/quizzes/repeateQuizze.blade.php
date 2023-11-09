<!-- debloque_modal_quizze -->

<div id="repeat_quizze{{ $degree->quizze_id }}" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="zoomInModalLabel">
                    {{ trans('Quizzes_trans.examDebloque') }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('repeatQuizze', $degree->quizze_id) }}" method="post">
                {{ method_field('delete') }}
                @csrf
                <div class="modal-body">

                    {{ $degree->student->name }}
                    <input id="quizze_id" type="hidden" name="quizze_id" class="form-control"
                        value="{{ $degree->quizze_id }}">
                    <input id="student_id" type="hidden" name="student_id" class="form-control"
                        value="{{ $degree->student_id }}">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success"
                        data-bs-dismiss="modal">{{ trans('Quizzes_trans.Close') }}</button>
                    <button type="submit" class="btn btn-danger ">{{ trans('Quizzes_trans.submit') }}
                    </button>
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
