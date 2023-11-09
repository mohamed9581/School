{{--  --}}

<div class="row" id="step1">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-body">
                <div class="live-preview">
                    <div class="row gy-4">
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="Email" class="form-label">{{ trans('Parent_trans.Email') }}</label>
                                <input type="email" name="email" class="form-control" id="Email">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="password" class="form-label">{{ trans('Parent_trans.Password') }}</label>
                                <input type="password" name="password" class="form-control" id="Password">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <div class="row gy-4">
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="Name_Father"
                                    class="form-label">{{ trans('Parent_trans.Name_Father') }}</label>
                                <input type="text" name="Name_Father[ar]" class="form-control" id="Name_Father">
                                {{-- @error('Name_Father[ar]')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="Name_Father_en"
                                    class="form-label">{{ trans('Parent_trans.Name_Father_en') }}</label>
                                <input type="text" name="Name_Father[en]" class="form-control" id="Name_Father_en">
                                {{-- @error('Name_Father[en]')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                            </div>
                        </div>
                        <!--end col-->
                    </div>

                    <div class="row gy-4">
                        <div class="col-xxl-3 col-md-3">
                            <div>
                                <label for="Job_Father"
                                    class="form-label">{{ trans('Parent_trans.Job_Father') }}</label>
                                <input type="text" name="Job_Father[ar]" class="form-control" id="Job_Father">
                                {{-- @error('Job_Father[ar]')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-md-3">
                            <div>
                                <label for="Job_Father_en"
                                    class="form-label">{{ trans('Parent_trans.Job_Father_en') }}</label>
                                <input type="text" name="Job_Father[en]" class="form-control" id="Job_Father_en">
                                {{-- @error('Job_Father[en]')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-md-2">
                            <div>
                                <label for="National_ID_Father"
                                    class="form-label">{{ trans('Parent_trans.National_ID_Father') }}</label>
                                <input type="text" name="National_ID_Father" class="form-control"
                                    id="National_ID_Father">
                                @error('National_ID_Father')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-md-2">
                            <div>
                                <label for="Passport_ID_Father"
                                    class="form-label">{{ trans('Parent_trans.Passport_ID_Father') }}</label>
                                <input type="text" name="Passport_ID_Father" class="form-control"
                                    id="Passport_ID_Father">
                                @error('Passport_ID_Father')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-md-2">
                            <div>
                                <label for="Phone_Father"
                                    class="form-label">{{ trans('Parent_trans.Phone_Father') }}</label>
                                <input type="text" name="Phone_Father" class="form-control" id="Phone_Father">
                                @error('Phone_Father')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <div class="row gy-4">
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="Nationality_Father_id"
                                    class="form-label">{{ trans('Parent_trans.Nationality_Father_id') }}</label>


                                <select id="Nationality_Father_id-1" name="Nationality_Father_id"
                                    class="form-select form-control mb-3 bg-light" aria-label="Default select example">
                                    <option selected>{{ trans('Parent_trans.Choose') }}...</option>

                                    @foreach ($Nationalities as $nationalitie)
                                        <option value="{{ $nationalitie->id }}">{{ $nationalitie->name }}</option>
                                    @endforeach
                                </select>

                                @error('Nationality_Father_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-md-3">
                            <div>
                                <label for="Blood_Type_Father_id"
                                    class="form-label">{{ trans('Parent_trans.Blood_Type_Father_id') }}</label>
                                <select id="Blood_Type_Father_id-1" name="Blood_Type_Father_id"
                                    class="form-select form-control mb-3 bg-light" aria-label="Default select example">
                                    <option selected>{{ trans('Parent_trans.Choose') }}...</option>

                                    @foreach ($Bloods as $blood)
                                        <option value="{{ $blood->id }}">{{ $blood->name }}</option>
                                    @endforeach
                                </select>
                                @error('Blood_Type_Father_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-md-3">
                            <div>
                                <label for="Religion_Father_id"
                                    class="form-label">{{ trans('Parent_trans.Religion_Father_id') }}</label>
                                <select id="Religion_Father_id-1" name="Religion_Father_id"
                                    class="form-select form-control mb-3 bg-light"
                                    aria-label="Default select example">
                                    <option selected>{{ trans('Parent_trans.Choose') }}...</option>

                                    @foreach ($Religions as $religion)
                                        <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                    @endforeach
                                </select>
                                @error('Religion_Father_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <div class="row gy-4">
                        <div class="col-xxl-3 col-md-12">
                            <div>
                                <label for="Address_Father"
                                    class="form-label">{{ trans('Parent_trans.Address_Father') }}</label>
                                <textarea class="form-control" name="Address_Father" id="Address_Father" rows="3"></textarea>

                                @error('Address_Father')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <br>

                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" id="firstStepSubmit"
                        type="button">{{ trans('Parent_trans.Next') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
