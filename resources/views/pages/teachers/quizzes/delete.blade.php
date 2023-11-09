<!-- delete_modal_quizze -->

<div id="delete" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="zoomInModalLabel">
                    {{ trans('Quizzes_trans.Delete') }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('quizzesDestroy', $quizze->id) }}" method="post">
                {{ method_field('Delete') }}
                @csrf
                <div class="modal-body">

                    {{ trans('Quizzes_trans.Deleted_Quizze_tilte') }}
                    <input id="id" type="hidden" name="id" class="form-control" value="">
                    <input id="quizzeNom" type="text" name="quizzeNom" class="form-control" disabled value="">
                    <input id="quizzeName" type="hidden" name="quizzeName" class="form-control" value="">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success"
                        data-bs-dismiss="modal">{{ trans('Quizzes_trans.Close') }}</button>
                    <button type="submit" class="btn btn-danger ">{{ trans('Quizzes_trans.Delete') }}
                    </button>
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
