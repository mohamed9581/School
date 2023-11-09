<!-- delete_modal_promotion -->

<div id="Delete_one{{ $promotion->id }}" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="zoomInModalLabel">
                    {{ trans('Students_trans.annulerTransfert') }} </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('promotions.destroy', 'test') }}" method="post">
                {{ method_field('Delete') }}
                @csrf
                <div class="modal-body">

                    <input id="promotionDelete" type="hidden" name="promotion_id" class="form-control"
                        value="{{ $promotion->id }}">
                    <h5 style="font-family: 'Cairo', sans-serif;">
                        {{ trans('Students_trans.confirmationOne') }} {{ $promotion->student->name }}</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success"
                        data-bs-dismiss="modal">{{ trans('Students_trans.Close') }}</button>
                    <button type="submit" class="btn btn-danger ">{{ trans('Students_trans.Delete') }}
                    </button>
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
