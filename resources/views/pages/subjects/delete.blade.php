<!-- delete_modal_subject -->

<div id="delete" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="zoomInModalLabel">
                    {{ trans('Subjects_trans.Delete') }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('subjects.destroy', $subject->id) }}" method="post">
                {{ method_field('Delete') }}
                @csrf
                <div class="modal-body">

                    {{ trans('Subjects_trans.Deleted_Subject_tilte') }}
                    <input id="id" type="hidden" name="id" class="form-control" value="">
                    <input id="subjectNom" type="text" name="subjectNom" class="form-control" disabled
                        value="">
                    <input id="subjectName" type="hidden" name="subjectName" class="form-control" value="">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success"
                        data-bs-dismiss="modal">{{ trans('Subjects_trans.Close') }}</button>
                    <button type="submit" class="btn btn-danger ">{{ trans('Subjects_trans.Delete') }}
                    </button>
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
