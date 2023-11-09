<!-- delete_modal_fee -->

<div id="delete" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="zoomInModalLabel">
                    {{ trans('Fees_trans.Delete') }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('fees.destroy', $fee->id) }}" method="post">
                {{ method_field('Delete') }}
                @csrf
                <div class="modal-body">

                    {{ trans('Fees_trans.Deleted_Fee_tilte') }}
                    <input id="id" type="hidden" name="id" class="form-control" value="">
                    <input id="feeNom" type="text" name="feeNom" class="form-control" disabled
                        value="">
                    <input id="feeName" type="hidden" name="feeName" class="form-control" value="">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success"
                        data-bs-dismiss="modal">{{ trans('Fees_trans.Close') }}</button>
                    <button type="submit" class="btn btn-danger ">{{ trans('Fees_trans.Delete') }}
                    </button>
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
