@extends('layouts.appp')
@section('title')
    {{ trans('Students_trans.fees_invoices') }}
@endsection
@section('pagetitle')
    {{ trans('Students_trans.fees_invoices') }}
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

                    <form class=" row mb-30" action="{{ route('fees_invoices.store') }}" method="POST">
                        @csrf
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
                                            <td class="text-start">
                                                <div class="mb-2">
                                                    <select id="student_id-1" name="student_id[]"
                                                        class="form-select form-control mb-3 bg-light student_id"
                                                        aria-label="Default select example">
                                                        <option value="{{ $student->id }}">{{ $student->name }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </td>

                                            <td class="text-start">
                                                <div class="mb-2">
                                                    <select id="fee_id-1" name="fee_id[]"
                                                        class="form-select form-control mb-3 bg-light fee-select fee_id"
                                                        aria-label="Default select example">
                                                        <option selected disabled>
                                                            {{ trans('Students_trans.choixHonoraire') }}</option>
                                                        @foreach ($fees as $fee)
                                                            <option value="{{ $fee->id }}">
                                                                {{ $fee->title }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </td>

                                            <td class="text-center">
                                                <div class="mb-2">
                                                    <select id="amount-1" name="amount[]"
                                                        class="form-select form-control mb-3 bg-light amount-select amount"
                                                        aria-label="Default select example">

                                                    </select>
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                <div>
                                                    <textarea class="form-control" name="description[]" id="description-1" rows="1"></textarea>
                                                </div>
                                            </td>
                                            <td class="product-removal">
                                                <a href="javascript:void(0)"
                                                    class="btn btn-success btnRemove">{{ trans('Classes_trans.Delete') }}</a>
                                            </td>
                                        </tr>
                                        <input type="hidden" name="grade_id" value="{{ $student->grade_id }}">
                                        <input type="hidden" name="classe_id" value="{{ $student->classe_id }}">
                                    </tbody>
                                    <tbody>

                                        <tr>
                                            <td colspan="5">
                                                <button id='btnRepeaterFees' class="btn btn-soft-secondary fw-medium"
                                                    type='button'><i
                                                        class="ri-add-fill me-1 align-bottom"></i>Ajouter</button>
                                            </td>
                                        </tr>
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
