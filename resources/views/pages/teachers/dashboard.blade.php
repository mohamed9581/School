@extends('layouts.appp')
@section('title')
    {{ trans('Teacher_trans.welcome') }} {{ auth()->user()->name }}
@endsection
@section('pagetitle')
    {{ trans('main_trans.Dashboard') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">{{ trans('main_trans.sections') }}</p>
                            <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                    data-target="{{ $data['count_sections'] }}">{{ $data['count_sections'] }}</span>
                            </h2>
                            <p class="mb-0 text-muted"><span class="badge bg-light text-danger mb-0"> <i
                                        class="fas fa-binoculars align-middle"></i></span> <a
                                    class="badge bg-light text-success"
                                    href="{{ route('sections') }}">{{ trans('Teacher_trans.showData') }}</a></p>
                        </div>
                        <div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                    <i class="fas fa-chalkboard text-info"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-md-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">{{ trans('main_trans.students') }}</p>
                            <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                    data-target="{{ $data['count_students'] }}">{{ $data['count_students'] }}</span></h2>
                            <p class="mb-0 text-muted"><span class="badge bg-light text-danger mb-0"> <i
                                        class="fas fa-binoculars align-middle"></i></span> <a
                                    class="badge bg-light text-success" target="_blank"
                                    href="{{ route('students') }}">{{ trans('Teacher_trans.showData') }}</a></p>
                        </div>
                        <div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                    <i class="fas fa-user-graduate text-info"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row-->
    <livewire:calendar />
    @livewireScripts
    @stack('scripts')
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
