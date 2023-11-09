<!-- delete_modal_receipt -->

<div id="delete" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="zoomInModalLabel">
                    {{ trans('Zoom_trans.deleteSeance') }} <span id="topicDelete"></span> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('online_classes.destroy', 'test') }}" method="post">
                {{ method_field('Delete') }}
                @csrf
                <div class="modal-body">
                    <input id="id" type="hidden" name="id" class="form-control"
                        value="{{ $online_classe->id }}">
                    <input id="meeting_id" type="hidden" name="meeting_id" class="form-control"
                        value="{{ $online_classe->meeting_id }}">
                    <h5 style="font-family: 'Cairo', sans-serif;">
                        {{ trans('Zoom_trans.Warning_Question') }} </h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success"
                        data-bs-dismiss="modal">{{ trans('Zoom_trans.Close') }}</button>
                    <button type="submit" class="btn btn-danger ">{{ trans('Zoom_trans.Delete') }}
                    </button>
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
