@extends('layouts.appp')
@section('title')
    {{ trans('Libraries_trans.title_page') }}
@endsection
@section('pagetitle')
    {{ trans('Libraries_trans.title_page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ trans('Libraries_trans.title_page') }}
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
                                        <a href="{{ route('libraries.create') }}" class="btn btn-success add-btn"
                                            role="button" aria-pressed="true"><i
                                                class="ri-add-line align-bottom me-1"></i>{{ trans('Libraries_trans.add_Book') }}</a>
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
                                <table class="table align-middle table-nowrap" id="librarieTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll"
                                                        value="option">
                                                </div>
                                            </th>
                                            <th>N°</th>
                                            <th class="sort" data-sort="name">{{ trans('Libraries_trans.nameBook') }}</th>
                                            <th>{{ trans('Libraries_trans.nomTeacher') }}</th>
                                            <th class="sort" data-sort="nomGrade">{{ trans('Libraries_trans.nomGrade') }}
                                            </th>
                                            <th>{{ trans('Libraries_trans.nomClasse') }}</th>
                                            <th>{{ trans('Libraries_trans.nomSection') }}</th>
                                            <th>{{ trans('Libraries_trans.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="militaireBody">
                                        @foreach ($books as $index => $book)
                                            <tr>
                                                <td scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll"
                                                            value="option">
                                                    </div>
                                                </td>
                                                <td>{{ $index = $index + 1 }}</td>
                                                <td>{{ $book->title }}</td>
                                                <td>{{ $book->teacher->name }}</td>
                                                <td>{{ $book->grade->Name }}</td>
                                                <td>{{ $book->classe->nomClasse }}</td>
                                                <td>{{ $book->section->nomSection }}</td>
                                                <td>

                                                    <a href="{{ route('downloadAttachment', $book->file_name) }}"
                                                        title="{{ trans('Libraries_trans.download') }} "
                                                        class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i
                                                            class="ri-download-2-fill"></i></a>

                                                    <a href="{{ route('libraries.edit', $book->id) }}"
                                                        title="{{ trans('Libraries_trans.Edit') }}"
                                                        class="editbook btn btn-sm btn-success "><i
                                                            class="ri-edit-2-line"></i>
                                                    </a>

                                                    <button id="btnDelete" book_name="{{ $book->title }}"
                                                        book_id="{{ $book->id }}"
                                                        title="{{ trans('Libraries_trans.delete_Book') }}"
                                                        class="deletebook btn btn-sm btn-danger delete-item-btn"
                                                        data-bs-toggle="modal" data-bs-target="#delete"
                                                        data-book="{{ $book }}"><i class="ri-delete-bin-line"></i>
                                                    </button>



                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <div class="noresult">
                                    @if ($books && $books->count() == 0)
                                        <div class="noresult">
                                            <div class="text-center">
                                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                    colors="primary:#121331,secondary:#08a88a"
                                                    style="width:75px;height:75px">
                                                </lord-icon>
                                                <h5 class="mt-2">{{ trans('main_trans.nowData') }}</h5>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                @if (isset($book))
                                    @include('pages.librarie.delete')
                                @endif
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
            $('.deletebook').on('click', function() {
                $('#id').val($(this).attr('book_id'));
                $('#librarieNom').val($(this).attr('book_name'));
                $('#librarieName').val($(this).attr('book_name'));

            })
        </script>
    @endsection
