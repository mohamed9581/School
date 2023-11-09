<!-- delete_modal_teacher -->

<div id="delete{{ $teacher->id }}" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="zoomInModalLabel">
                    {{ trans('Teacher_trans.Delete_Teacher') }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('teachers.destroy', $teacher->id) }}" method="post">
                {{ method_field('Delete') }}
                @csrf
                <div class="modal-body">

                    {{ trans('Teacher_trans.Warning_Teacher') }}
                    <input id="id" type="hidden" name="id" class="form-control"
                        value="{{ $teacher->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success"
                        data-bs-dismiss="modal">{{ trans('Teacher_trans.Close') }}</button>
                    <button type="submit" class="btn btn-danger ">{{ trans('Teacher_trans.Delete') }}
                    </button>
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
