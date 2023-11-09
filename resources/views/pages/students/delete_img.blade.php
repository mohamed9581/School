<!-- delete_modal_section -->

<div id="Delete_img{{ $attachment->id }}" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="zoomInModalLabel">
                    {{ trans('Students_trans.Delete_attachment') }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('Delete_attachment') }}" method="post">
                {{ method_field('Delete') }}
                @csrf
                <div class="modal-body">

                    <input id="id" type="hidden" name="id" class="form-control"
                        value="{{ $attachment->id }}">
                    <input type="hidden" name="student_name" value="{{ $attachment->imageable->name }}">
                    <input type="hidden" name="student_id" value="{{ $attachment->imageable->id }}">
                    <h5 style="font-family: 'Cairo', sans-serif;">{{ trans('Students_trans.Delete_attachment_tilte') }}
                    </h5>
                    <input type="text" name="filename" readonly value="{{ $attachment->filename }}"
                        class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success"
                        data-bs-dismiss="modal">{{ trans('Sections_trans.Close') }}</button>
                    <button type="submit" class="btn btn-danger ">{{ trans('Sections_trans.Delete') }}
                    </button>
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
