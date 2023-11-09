@extends('layouts.appp')
@section('title')
    {{ trans('ProcessingFees_trans.List_ProcessingFee') }}
@endsection
@section('pagetitle')
    {{ trans('ProcessingFees_trans.List_ProcessingFee') }}
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ trans('ProcessingFees_trans.List_ProcessingFee') }}
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-body">
                        <div id="customerList">

                            <div class="table-responsive table-card mt-3 mb-1">
                                <table class="table align-middle table-nowrap" id="processingFeeTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="table-info" scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll"
                                                        value="option">
                                                </div>
                                            </th>
                                            <th class="table-info">N°</th>
                                            <th class="sort table-info" data-sort="name">
                                                {{ trans('ProcessingFees_trans.name') }}
                                            </th>
                                            <th class="table-info" title="{{ trans('ProcessingFees_trans.amount') }}">
                                                {{ trans('ProcessingFees_trans.amount') }}</th>
                                            <th class="table-info" title="{{ trans('ProcessingFees_trans.Notes') }}">
                                                {{ trans('ProcessingFees_trans.Notes') }}</th>
                                            <th class="table-info">{{ trans('ProcessingFees_trans.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="receiptBody">

                                        @foreach ($processingFees as $index => $processingFee)
                                            <tr>
                                                <td scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll"
                                                            value="option">
                                                    </div>
                                                </td>
                                                <td>{{ $index = $index + 1 }}</td>
                                                <td>{{ $processingFee->student->name }}</td>
                                                <td>{{ $processingFee->amount }}</td>
                                                <td>{{ $processingFee->description }}</td>
                                                <td>
                                                    <a href="{{ route('processingFees.edit', $processingFee->id) }}"
                                                        title="{{ trans('ProcessingFees_trans.Edit') }}"
                                                        class="editreceiptStudent btn btn-sm edit-item-btn btn-success edit-item-btn"><i
                                                            class="ri-edit-2-line"></i>
                                                    </a>
                                                    <button id="btnDelete" processingFee_id="{{ $processingFee->id }}"
                                                        title="{{ trans('ProcessingFees_trans.Delete') }}"
                                                        class="deleteReceiptStudent btn btn-sm btn-danger delete-item-btn"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#Delete_one{{ $processingFee->id }}"
                                                        data-fee_invoice="{{ $processingFee }}"><i
                                                            class="ri-delete-bin-line"></i></button>



                                                </td>
                                                @include('pages.processingFee.delete_one')
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if ($processingFees && $processingFees->count() == 0)
                                    <div class="noresult">
                                        <div class="text-center">
                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                            </lord-icon>
                                            <h5 class="mt-2">{{ trans('main_trans.nowData') }}</h5>
                                        </div>
                                    </div>
                                @endif

                            </div>

                            <div class="d-flex justify-content-end">
                                <div class="pagination-wrap hstack gap-2">
                                    <a class="page-item pagination-prev disabled" href="#">
                                        {{ trans('pagination.previous') }}
                                    </a>
                                    <ul class="pagination listjs-pagination mb-0"></ul>
                                    <a class="page-item pagination-next" href="#">
                                        {{ trans('pagination.next') }}

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card -->
                </div>
            </div>


        </div>
    </div>
    {{-- @include('pages.students.promotions.deleteAll') --}}

@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <!-- listjs init -->
    <script src="{{ URL::asset('assets/js/pages/listjs.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/sweetalert.min.js') }}"></script>
    <script type="text/javascript">
        // :::::::::::::::cette ligne pour obtenir l'url du site::::::::::::::
        var SITEURL = '{{ URL::to('') }}';
    </script>
@endsection
