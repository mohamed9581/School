@extends('layouts.appp')
@section('title')
    {{ trans('ProcessingFees_trans.title_page') }} <span class="text-success">{{ $student->name }} </span>
@endsection
@section('pagetitle')
    {{ trans('ProcessingFees_trans.title_page') }}
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

                    <form class=" row mb-30" action="{{ route('processingFees.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="debit"
                                        class="form-label">{{ trans('ProcessingFees_trans.amount') }}</label>
                                    <input type="number" class="form-control" value="{{ old('debit') }}" name="debit"
                                        id="debit">
                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                    <small id='debit_error' class="form-text text-danger"></small>
                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="final_balance"
                                        class="form-label">{{ trans('ProcessingFees_trans.final_balance') }}</label>
                                    <input type="text"
                                        class="form-control {{ number_format($student->student_account->sum('debit') - $student->student_account->sum('credit'), 2) === '0.00' ? 'text-success' : 'text-danger' }}"
                                        value="{{ number_format($student->student_account->sum('debit') - $student->student_account->sum('credit'), 2) }}"
                                        name="final_balance" id="final_balance" readonly>
                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                    <small id='debit_error' class="form-text text-danger"></small>
                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <input type="hidden" name="student_id" value="{{ $student->id }}" class="form-control">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description"
                                        class="form-label">{{ trans('ProcessingFees_trans.Notes') }}</label>
                                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
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
