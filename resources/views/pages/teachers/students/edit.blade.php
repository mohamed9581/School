<!-- delete_modal_teacher -->

<div id="edit_attendence{{ $student->id }}" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="zoomInModalLabel">
                    {{ trans('Attendances_trans.edit_Attendance') }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('attendance.edit', 'test') }}" method="post">
                {{-- {{ method_field('patch') }} --}}
                @csrf
                <div class="modal-body">

                    <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                        <input name="attendences"
                            {{ $student->attendances()->first()->attendence_status == 1 ? 'checked' : '' }}
                            class="leading-tight" type="radio" value="presence">
                        <span class="text-success">{{ trans('Attendances_trans.present') }}</span>
                    </label>

                    <label class="ml-4 block text-gray-500 font-semibold">
                        <input name="attendences"
                            {{ $student->attendances()->first()->attendence_status == 0 ? 'checked' : '' }}
                            class="leading-tight" type="radio" value="absent">
                        <span class="text-danger">{{ trans('Attendances_trans.absent') }}</span>
                    </label>
                    <input id="id" type="hidden" name="id" class="form-control"
                        value="{{ $student->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success"
                        data-bs-dismiss="modal">{{ trans('Teacher_trans.Close') }}</button>
                    <button type="submit" class="btn btn-danger ">{{ trans('Teacher_trans.Edit') }}
                    </button>
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
