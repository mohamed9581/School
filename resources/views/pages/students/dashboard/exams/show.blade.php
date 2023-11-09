@extends('layouts.appp')
@section('title')
    {{ trans('main_trans.Dashboard') }}
@endsection
@section('pagetitle')
    {{ trans('main_trans.Dashboard') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                {{-- <livewire:show-question /> --}}
                @livewire('show-question', ['quizze_id' => $quizze_id, 'student_id' => $student_id])
                @livewireScripts
                @stack('scripts')

                {{-- </div> --}}


                {{-- </div>
                    </div><!-- end card -->
                </div> --}}
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
        var update = false;
    </script>
@endsection
