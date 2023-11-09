@extends('layouts.appp')
@section('title')
    {{ trans('Students_trans.edit_fees_invoices') }}
@endsection
@section('pagetitle')
    {{ trans('Students_trans.edit_fees_invoices') }}
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

                    <form class=" row mb-30" action="{{ route('fees_invoices.update', $fee_invoice->id) }}" method="POST">
                        @csrf
                        {{ method_field('patch') }}
                        <div class="card-body">
                            <div class="table-responsive" data-repeater-list="List_FeesInvoices">
                                <table id="tbleFeesInvoices" class="invoice-table table table-borderless table-nowrap mb-0">
                                    <thead class="align-middle">
                                        <tr class="table-active">
                                            <th scope="col">#</th>
                                            <th scope="col" class="text-center">
                                                {{ trans('Students_trans.Name') }}
                                            </th>
                                            <th scope="col" class="text-center">
                                                {{ trans('Fees_trans.fee_type') }}
                                            </th>
                                            <th scope="col" class="text-center">
                                                {{ trans('Fees_trans.amount') }}</th>
                                            <th scope="col" class="text-center">
                                                {{ trans('Fees_trans.Notes') }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="newlink" data-repeater-list="List_Fees_Invoices">
                                        <tr id="1" class="fee">
                                            <th scope="row" id="nbrClassement1" class="Fees_Invoices-id">1</th>
                                            <td class="text-start" style="width: 20%">
                                                <div class="mb-2">
                                                    <select id="student_id-1" name="student_id"
                                                        class="form-select form-control mb-3 bg-light student_id"
                                                        aria-label="Default select example">
                                                        <option value="{{ $fee_invoice->student->id }}">
                                                            {{ $fee_invoice->student->name }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </td>

                                            <td class="text-start" style="width: 30%">
                                                <div class="mb-2">
                                                    <select id="fee_id-update" name="fee_id"
                                                        class="form-select form-control mb-3 bg-light fee-select-update fee_id"
                                                        aria-label="Default select example">
                                                        <option selected disabled>
                                                            {{ trans('Students_trans.choixHonoraire') }}</option>
                                                        @foreach ($fees as $fee)
                                                            <option value="{{ $fee->id }}"
                                                                {{ $fee->id == $fee_invoice->fee_id ? 'selected' : '' }}>
                                                                {{ $fee->title }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </td>

                                            <td class="text-center" style="width: 15%">
                                                <div class="mb-2">
                                                    <input type="number" id="amount-1"
                                                        class="form-control mb-3 bg-light amount-select-update amount"
                                                        name="amount" value="{{ $fee_invoice->amount }}">
                                                </div>
                                            </td>
                                            <td class="text-end" style="width: 30%">
                                                <div>
                                                    <textarea class="form-control" name="description" id="description-1" rows="1">{{ $fee_invoice->description }}</textarea>
                                                </div>
                                            </td>

                                        </tr>
                                        <input type="hidden" name="grade_id" value="{{ $fee_invoice->grade_id }}">
                                        <input type="hidden" name="id" value="{{ $fee_invoice->id }}">
                                        <input type="hidden" name="classe_id" value="{{ $fee_invoice->classe_id }}">
                                    </tbody>

                                </table>
                                <!--end table-->
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                            </div>


                            {{-- </div> --}}
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
