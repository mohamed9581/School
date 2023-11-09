@extends('layouts.appp')
@section('title')
    {{ trans('ProcessingFees_trans.edit_ProcessingFee') }} <span class="text-success">{{ $processingFee->student->name }}
    </span>
@endsection
@section('pagetitle')
    {{ trans('ProcessingFees_trans.edit_ProcessingFee') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="p-3">

                    <form class=" row mb-30" action="{{ route('processingFees.update', $processingFee->id) }}" method="POST">
                        @csrf
                        {{ method_field('patch') }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="debit"
                                        class="form-label">{{ trans('ProcessingFees_trans.amount') }}</label>
                                    <input type="number" class="form-control" value="{{ $processingFee->amount }}"
                                        name="debit" id="debit">
                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                    <small id='debit_error' class="form-text text-danger"></small>
                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <input type="hidden" name="student_id" value="{{ $processingFee->student->id }}"
                            class="form-control">
                        <input type="hidden" name="id" value="{{ $processingFee->id }}" class="form-control">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description"
                                        class="form-label">{{ trans('ProcessingFees_trans.Notes') }}</label>
                                    <textarea class="form-control" name="description" id="description" rows="3">{{ $processingFee->description }}</textarea>
                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                    <small id='description_error' class="form-text text-danger"></small>
                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="submit" id="btnSave"
                                    class="btn btn-success">{{ trans('ProcessingFees_trans.confirme') }}</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <!-- listjs init -->
    <script src="{{ URL::asset('assets/js/pages/listjs.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/sweetalert.min.js') }}"></script>
@endsection
