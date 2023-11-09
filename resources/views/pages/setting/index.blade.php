@extends('layouts.appp')
@section('title')
    {{ trans('Settings_trans.setting') }}
@endsection
@section('pagetitle')
    {{ trans('Settings_trans.setting') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ trans('Settings_trans.setting') }}
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
                                <div class="p-1">
                                    <form method=POST id="updateStudent" action="{{ route('settings.update', 'test') }}"
                                        autocomplete="off" enctype="multipart/form-data">
                                        @csrf
                                        {{ method_field('patch') }}
                                      
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="Name"
                                                        class="form-label">{{ trans('Settings_trans.nameSchool') }}</label>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" name="school_name"
                                                        value="{{ $setting['school_name'] }}" required id="school_name">
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="Name"
                                                        class="form-label">{{ trans('Settings_trans.anneeActuel') }}</label>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <select data-placeholder="Choose..." required name="current_session"
                                                        id="current_session" class="select-search form-control">
                                                        <option value=""></option>
                                                        @for ($y = date('Y', strtotime('- 3 years')); $y <= date('Y', strtotime('+ 1 years')); $y++)
                                                            <option
                                                                {{ $setting['current_session'] == ($y -= 1) . '-' . ($y += 1) ? 'selected' : '' }}>
                                                                {{ ($y -= 1) . '-' . ($y += 1) }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="Name"
                                                        class="form-label">{{ trans('Settings_trans.abreviationNameSchool') }}</label>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="text" class="form-control"name="school_title"
                                                        value="{{ $setting['school_title'] }}" required id="school_title">
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="Name"
                                                        class="form-label">{{ trans('Settings_trans.phone') }}</label>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" name="phone"
                                                        value="{{ $setting['phone'] }}" required id="phone">
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="Name"
                                                        class="form-label">{{ trans('Settings_trans.email') }}</label>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" name="school_email"
                                                        value="{{ $setting['school_email'] }}" required id="school_email">
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="Name"
                                                        class="form-label">{{ trans('Settings_trans.adresse') }}</label>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" name="address"
                                                        value="{{ $setting['address'] }}" required id="adress">
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="Name"
                                                        class="form-label">{{ trans('Settings_trans.finPreSem') }}</label>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" name="end_first_sem"
                                                        value="{{ $setting['end_first_sem'] }}" required
                                                        id="end_first_sem">
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="Name"
                                                        class="form-label">{{ trans('Settings_trans.finDeuSem') }}</label>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" name="end_second_sem"
                                                        value="{{ $setting['end_second_sem'] }}" required
                                                        id="end_second_sem">
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="col-md-12"><br>
                                                    <div class="mb-3">
                                                        <img style="width: 100px" height="100px"
                                                            src="{{ URL::asset('attachments/logo/' . $setting['logo']) }}"
                                                            alt="">
                                                    </div>
                                                    <label
                                                        style="color: red">{{ trans('Settings_trans.Attachments') }}</label>
                                                    <div class="form-group">
                                                        <input type="file" name="logo" accept="image/*">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="hstack gap-2 justify-content-end">

                                                <button type="submit" id="btnSave"
                                                    class="btn btn-success">{{ trans('Settings_trans.submit') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
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
