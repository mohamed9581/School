@extends('layouts.appp')
@section('title')
    {{ trans('Fees_trans.title_page') }}
@endsection
@section('pagetitle')
    {{ trans('Fees_trans.title_page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ trans('Fees_trans.title_page') }}
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
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <div>
                                        <a href="{{ route('fees.create') }}" class="btn btn-success add-btn"
                                            id="create-btn"><i class="ri-add-line align-bottom me-1"></i>
                                            {{ trans('Fees_trans.add_Fee') }}</a>
                                        <button class="btn btn-soft-danger " id="SupprimerMulti"><i
                                                class="ri-delete-bin-2-line"></i></button>
                                        {{-- <button class="btn btn-soft-danger " onClick="deleteMultiple()"><i
                                                class="ri-delete-bin-2-line"></i></button> --}}
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="d-flex justify-content-sm-end">
                                        <div class="search-box ms-2">
                                            <input type="text" class="form-control search"
                                                placeholder="{{ trans('pagination.search') }}">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive table-card mt-3 mb-1">
                                <table class="table align-middle table-nowrap" id="feeTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll"
                                                        value="option">
                                                </div>
                                            </th>
                                            <th>N°</th>
                                            <th class="sort" data-sort="name">{{ trans('Fees_trans.title') }}
                                            </th>
                                            <th>{{ trans('Fees_trans.amount') }}</th>
                                            <th>{{ trans('Fees_trans.grade') }}</th>
                                            <th>{{ trans('Fees_trans.classe') }}</th>
                                            <th>{{ trans('Fees_trans.year') }}</th>
                                            <th>{{ trans('Fees_trans.Notes') }}</th>
                                            <th>{{ trans('Grades_trans.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="feeBody">
                                        @foreach ($fees as $index => $fee)
                                            <tr>
                                                <td scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll"
                                                            value="option">
                                                    </div>
                                                </td>
                                                <td>{{ $index = $index + 1 }}</td>
                                                <td>{{ $fee->title }}</td>
                                                <td>{{ $fee->amount }}</td>
                                                <td>{{ $fee->grade->Name }}</td>
                                                <td>{{ $fee->classe->nomClasse }}</td>
                                                <td>{{ $fee->year }}</td>
                                                <td>{{ $fee->description }}</td>
                                                <td>
                                                    <a href="{{ route('fees.edit', $fee->id) }}"
                                                        title="{{ trans('Fees_trans.Edit') }}"
                                                        class="editFee btn btn-sm btn-success edit-item-btn"><i
                                                            class="ri-edit-2-line"></i></a>
                                                    <button id="btnDelete" fee_name="{{ $fee->title }}"
                                                        fee_id="{{ $fee->id }}"
                                                        title="{{ trans('Fees_trans.Delete') }}"
                                                        class="deleteFee btn btn-sm btn-danger delete-item-btn"
                                                        data-bs-toggle="modal" data-bs-target="#delete"
                                                        data-fee="{{ $fee }}"><i
                                                            class="ri-delete-bin-line"></i></button>
                                                    <a href="{{ route('fees.show', $fee->id) }}"
                                                        title="{{ trans('Fees_trans.Afficher') }}"
                                                        class="showFee btn btn-sm btn-warning edit-item-btn"><i
                                                            class="ri-eye-line"></i></a>


                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                @if ($fees && $fees->count() == 0)
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
    @if (isset($fee))
        @include('pages.fees.delete')
    @endif
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
        $('.deleteFee').on('click', function() {
            $('#id').val($(this).attr('fee_id'));
            $('#feeNom').val($(this).attr('fee_name'));
            $('#feeName').val($(this).attr('fee_name'));

        })
        // console.log(feeId);
    </script>
@endsection
