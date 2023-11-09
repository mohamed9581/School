<!-- delete_modal_processionFee -->

<div id="Delete_one{{ $processingFee->id }}" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="zoomInModalLabel">
                    {{ trans('ProcessingFees_trans.delete_ProcessingFee') }} </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('processingFees.destroy', 'test') }}" method="post">
                {{ method_field('Delete') }}
                @csrf
                <div class="modal-body">

                    <input id="receiptDelete" type="hidden" name="id" class="form-control"
                        value="{{ $processingFee->id }}">
                    <h5 style="font-family: 'Cairo', sans-serif;">
                        {{ trans('ProcessingFees_trans.Deleted_ProcessionFee_tilte') }}
                        {{ $processingFee->student->name }}</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success"
                        data-bs-dismiss="modal">{{ trans('ProcessingFees_trans.Close') }}</button>
                    <button type="submit" class="btn btn-danger ">{{ trans('ProcessingFees_trans.Delete') }}
                    </button>
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
