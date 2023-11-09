@extends('layouts.appp')
@section('title')
    {{ trans('Parent_trans.add_parent') }}
@endsection
@section('pagetitle')
    {{ trans('Parent_trans.add_parent') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ trans('Parent_trans.add_parent') }}
                </div>
                <div class="card-body">

                    <div class="card-body">
                        <div id="customerList">


                            @livewire('add-parent')


                        </div>
                    </div><!-- end card -->
                </div>
            </div>


        </div>
    </div>
@endsection
@section('script')
    @livewireScripts()
    <script src="{{ URL::asset('assets/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <!-- listjs init -->
    <script src="{{ URL::asset('assets/js/pages/listjs.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/sweetalert.min.js') }}"></script>
    <script type="text/javascript">
        // :::::::::::::::cette ligne pour obtenir l'url du site::::::::::::::
        var SITEURL = '{{ URL::to('') }}';
        var update = false;
    </script>
@endsection
