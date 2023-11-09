@extends('layouts.appp')
@section('title')
    {{ trans('Payments_trans.edit_Payment') }} <span class="text-success">{{ $payment_student->student->name }}
    </span>
@endsection
@section('pagetitle')
    {{ trans('Payments_trans.edit_Payment') }}
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

                    <form class=" row mb-30" action="{{ route('payment_students.update', $payment_student->id) }}" method="POST">
                        @csrf
                        {{ method_field('patch') }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="debit"
                                        class="form-label">{{ trans('Payments_trans.amount') }}</label>
                                    <input type="number" class="form-control" value="{{ $payment_student->amount }}"
                                        name="debit" id="debit">
                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                    <small id='debit_error' class="form-text text-danger"></small>
                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <input type="hidden" name="student_id" value="{{ $payment_student->student->id }}"
                            class="form-control">
                        <input type="hidden" name="id" value="{{ $payment_student->id }}" class="form-control">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description"
                                        class="form-label">{{ trans('Payments_trans.Notes') }}</label>
                                    <textarea class="form-control" name="description" id="description" rows="3">{{ $payment_student->description }}</textarea>
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
                                    class="btn btn-success">{{ trans('Payments_trans.confirme') }}</button>
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