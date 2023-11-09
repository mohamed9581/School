<!-- delete_modal_receipt -->

<div id="Delete_one{{ $receipt_student->id }}" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="zoomInModalLabel">
                    {{ trans('Receipts_trans.delete_Receipt') }} </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('receipt_students.destroy', 'test') }}" method="post">
                {{ method_field('Delete') }}
                @csrf
                <div class="modal-body">

                    <input id="receiptDelete" type="hidden" name="id" class="form-control"
                        value="{{ $receipt_student->id }}">
                    <h5 style="font-family: 'Cairo', sans-serif;">
                        {{ trans('Receipts_trans.Deleted_Receipt_tilte') }} {{ $receipt_student->student->name }}</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success"
                        data-bs-dismiss="modal">{{ trans('Receipts_trans.Close') }}</button>
                    <button type="submit" class="btn btn-danger ">{{ trans('Receipts_trans.Delete') }}
                    </button>
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
