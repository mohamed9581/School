<!-- delete_modal_processionFee -->

<div id="Delete_one{{ $payment_student->id }}" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="zoomInModalLabel">
                    {{ trans('Payments_trans.delete_Payment') }} </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('payment_students.destroy', 'test') }}" method="post">
                {{ method_field('Delete') }}
                @csrf
                <div class="modal-body">

                    <input id="receiptDelete" type="hidden" name="id" class="form-control"
                        value="{{ $payment_student->id }}">
                    <h5 style="font-family: 'Cairo', sans-serif;">
                        {{ trans('Payments_trans.Deleted_ProcessionFee_tilte') }}
                        {{ $payment_student->student->name }}</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success"
                        data-bs-dismiss="modal">{{ trans('Payments_trans.Close') }}</button>
                    <button type="submit" class="btn btn-danger ">{{ trans('Payments_trans.Delete') }}
                    </button>
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
