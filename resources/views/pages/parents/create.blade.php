@extends('layouts.appp')
@section('title')
    {{ trans('Parent_trans.add_parent') }}
@endsection
@section('pagetitle')
    {{ trans('Parent_trans.add_parent') }}
@endsection

@section('content')
    @include('pages.parents.tableParents')

    <div class="row" id="steps">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ trans('Parent_trans.add_parent') }}
                </div>
                <div class="card-body">

                    <div class="card-body">
                        <div id="customerList">
                            <div>
                                <div class="card-body form-steps">
                                    <form action="{{ route('parents.store') }}" method=POST>
                                        @csrf
                                        <div id="custom-progress-bar" class="progress-nav mb-4">
                                            <div class="progress" style="height: 1px;">
                                                <div class="progress-bar" role="progressbar" style="width: 0%;"
                                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>

                                            <ul class="nav nav-pills progress-bar-tab custom-nav" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link rounded-pill "
                                                        data-progressbar="custom-progress-bar" id="pills1"
                                                        data-bs-toggle="pill" data-bs-target="#pills-gen-info"
                                                        type="button" role="tab" aria-controls="pills-gen-info"
                                                        aria-selected="true" disabled>1</button>
                                                    <p>
                                                        {{ trans('Parent_trans.Step1') }}
                                                    </p>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link rounded-pill"
                                                        data-progressbar="custom-progress-bar" id="pills2"
                                                        data-bs-toggle="pill" data-bs-target="#pills-info-desc"
                                                        type="button" role="tab" aria-controls="pills-info-desc"
                                                        aria-selected="false" disabled>2</button>
                                                    <p>
                                                        {{ trans('Parent_trans.Step2') }}
                                                    </p>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link rounded-pill "
                                                        data-progressbar="custom-progress-bar" id="pills3"
                                                        data-bs-toggle="pill" data-bs-target="#pills-success" type="button"
                                                        role="tab" aria-controls="pills-success" aria-selected="false"
                                                        disabled>3</button>
                                                    <p>
                                                        {{ trans('Parent_trans.Step3') }}
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>

                                        @include('pages.parents.pere_form')
                                        @include('pages.parents.mere_form')

                                        <div id="step3">
                                            <h3>{{ trans('Parent_trans.confirmation') }}</h3>
                                            <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"
                                                id="back1">
                                                {{ trans('Parent_trans.Back') }}
                                            </button>
                                            <button class="btn btn-success btn-sm btn-lg pull-right"
                                                type="submit">{{ trans('Parent_trans.Finish') }}</button>
                                        </div>

                                    </form>
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
        var update = false;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#step2').hide();
            $('#step3').hide();
            $('#step1').hide();
            $('#steps').hide();
            $('#firstStepSubmit').on('click', function() {
                $('#step1').hide();
                $('#step3').hide();
                $('#step2').show();

            });
        });

        $(document).ready(function() {
            $('#secondStepSubmit').on('click', function() {
                $('#step1').hide();
                $('#step2').hide();
                $('#step3').show();

            });
        });
        $(document).ready(function() {
            $('#back1').on('click', function() {
                $('#step1').hide();
                $('#step3').hide();
                $('#step2').show();

            });
        });
        $(document).ready(function() {
            $('#back2').on('click', function() {
                $('#step2').hide();
                $('#step3').hide();
                $('#step1').show();

            });
        });

        $(document).ready(function() {
            $('#create-btn').on('click', function() {
                $('#step2').hide();
                $('#showTable').hide();
                $('#step3').hide();
                $('#step1').show();
                $('#steps').show();


            });
        });
    </script>
@endsection
