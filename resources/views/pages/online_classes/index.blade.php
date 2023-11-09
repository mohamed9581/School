@extends('layouts.appp')
@section('title')
    {{ trans('Zoom_trans.title_page') }}
@endsection
@section('pagetitle')
    {{ trans('Zoom_trans.title_page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ trans('Zoom_trans.title_page') }}
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
                                        <a href="{{ route('online_classes.create') }}" class="btn btn-success add-btn"
                                            id="create-btn"><i class="ri-add-line align-bottom me-1"></i>
                                            {{ trans('Zoom_trans.add_Online_Classe') }}</a>
                                        <a href="{{ route('online_classes.indirectCreate') }}"
                                            class="btn btn-warning add-btn" id="create-btn"><i
                                                class="ri-add-line align-bottom me-1"></i>
                                            {{ trans('Zoom_trans.indirect_Online_Classe') }}</a>
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
                                <table class="table align-middle table-nowrap" id="online_classeTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll"
                                                        value="option">
                                                </div>
                                            </th>
                                            <th>N°</th>
                                            <th>{{ trans('Zoom_trans.grade') }}</th>
                                            <th>{{ trans('Zoom_trans.classe') }}</th>
                                            <th>{{ trans('Zoom_trans.section') }}</th>
                                            {{-- <th>{{ trans('Zoom_trans.teacher') }}</th> --}}
                                            <th>{{ trans('Zoom_trans.titleCours') }}</th>
                                            <th>{{ trans('Zoom_trans.dateDebut') }}</th>
                                            <th>{{ trans('Zoom_trans.duree') }}</th>
                                            <th>{{ trans('Zoom_trans.lien') }}</th>

                                            <th>{{ trans('Zoom_trans.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="online_classeBody">
                                        @foreach ($online_classes as $index => $online_classe)
                                            <tr>
                                                <td scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll"
                                                            value="option">
                                                    </div>
                                                </td>
                                                <td>{{ $index = $index + 1 }}</td>
                                                <td>{{ $online_classe->grade->Name }}</td>
                                                <td>{{ $online_classe->classe->nomClasse }}</td>
                                                <td>{{ $online_classe->section->nomSection }}</td>
                                                {{-- <td>{{ $online_classe->teacher->name }}</td> --}}
                                                <td>{{ $online_classe->topic }}</td>
                                                <td>{{ $online_classe->start_at }}</td>
                                                <td>{{ $online_classe->duration }}</td>
                                                <td> <a href="{{ $online_classe->join_url }}"
                                                        target="_blank">{{ trans('Zoom_trans.rejoindre') }}</a>
                                                </td>
                                                <td>



                                                    <button id="btnDelete" meeting_id="{{ $online_classe->meeting_id }}"
                                                        online_classe_id="{{ $online_classe->id }}"
                                                        online_classe_topic="{{ $online_classe->topic }}"
                                                        title="{{ trans('Zoom_trans.Delete') }}"
                                                        class="deleteOnlineClasse btn btn-sm btn-danger delete-item-btn"
                                                        data-bs-toggle="modal" data-bs-target="#delete"
                                                        data-subject="{{ $online_classe }}"><i
                                                            class="ri-delete-bin-line"></i>
                                                    </button>

                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                @if ($online_classes && $online_classes->count() == 0)
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
    @if (isset($online_classe))
        @include('pages.online_classes.delete')
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
        $('.deleteOnlineClasse').on('click', function() {
            $('#meeting_id').val($(this).attr('meeting_id'));
            $('#id').val($(this).attr('online_classe_id'));
            $('#topicDelete').text($(this).attr('online_classe_topic'));
            // $('#online_classeNom').val($(this).attr('online_classe_name'));
            // $('#online_classeName').val($(this).attr('online_classe_name'));

        })
        // console.log(online_classeId);
    </script>
@endsection
