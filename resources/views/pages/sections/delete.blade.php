<!-- delete_modal_section -->

<div id="delete{{ $section->id }}" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="zoomInModalLabel">
                    {{ trans('Sections_trans.delete_Section') }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('sections.destroy', $grade->id) }}" method="post">
                {{ method_field('Delete') }}
                @csrf
                <div class="modal-body">

                    {{ trans('Sections_trans.Warning_Section') }}
                    <input id="id" type="hidden" name="id" class="form-control"
                        value="{{ $section->id }}">
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
