<div id="step2">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="live-preview">

                        <div class="row gy-4">
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="Name_Mother"
                                        class="form-label">{{ trans('Parent_trans.Name_Mother') }}</label>
                                    <input type="text" name="Name_Mother[ar]" class="form-control" id="Name_Mother">
                                    {{-- @error('Name_Mother[ar]')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="Name_Mother_en"
                                        class="form-label">{{ trans('Parent_trans.Name_Mother_en') }}</label>
                                    <input type="text" name="Name_Mother[en]" class="form-control"
                                        id="Name_Mother_en">
                                    {{-- @error('Name_Mother[en]')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}
                                </div>
                            </div>
                            <!--end col-->
                        </div>

                        <div class="row gy-4">
                            <div class="col-xxl-3 col-md-3">
                                <div>
                                    <label for="Job_Mother"
                                        class="form-label">{{ trans('Parent_trans.Job_Mother') }}</label>
                                    <input type="text" name="Job_Mother[ar]" class="form-control" id="Job_Mother">
                                    {{-- @error('Job_Mother[ar]')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-md-3">
                                <div>
                                    <label for="Job_Mother_en"
                                        class="form-label">{{ trans('Parent_trans.Job_Mother_en') }}</label>
                                    <input type="text" name="Job_Mother[en]" class="form-control" id="Job_Mother_en">
                                    {{-- @error('Job_Mother[en]')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-md-2">
                                <div>
                                    <label for="National_ID_Mother"
                                        class="form-label">{{ trans('Parent_trans.National_ID_Mother') }}</label>
                                    <input type="text" name="National_ID_Mother" class="form-control"
                                        id="National_ID_Mother">
                                    @error('National_ID_Mother')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-md-2">
                                <div>
                                    <label for="Passport_ID_Mother"
                                        class="form-label">{{ trans('Parent_trans.Passport_ID_Mother') }}</label>
                                    <input type="text" name="Passport_ID_Mother" class="form-control"
                                        id="Passport_ID_Mother">
                                    @error('Passport_ID_Mother')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-md-2">
                                <div>
                                    <label for="Phone_Mother"
                                        class="form-label">{{ trans('Parent_trans.Phone_Mother') }}</label>
                                    <input type="text" name="Phone_Mother" class="form-control" id="Phone_Mother">
                                    @error('Phone_Mother')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <div class="row gy-4">
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="Nationality_Mother_id"
                                        class="form-label">{{ trans('Parent_trans.Nationality_Mother_id') }}</label>


                                    <select id="Nationality_Mother_id" name="Nationality_Mother_id"
                                        class="form-select form-control mb-3 bg-light"
                                        aria-label="Default select example">
                                        <option selected>{{ trans('Parent_trans.Choose') }}...</option>

                                        @foreach ($Nationalities as $nationalitie)
                                            <option value="{{ $nationalitie->id }}">{{ $nationalitie->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('Nationality_Mother_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-md-3">
                                <div>
                                    <label for="Blood_Type_Mother_id"
                                        class="form-label">{{ trans('Parent_trans.Blood_Type_Mother_id') }}</label>
                                    <select id="Blood_Type_Mother_id-1" name="Blood_Type_Mother_id"
                                        class="form-select form-control mb-3 bg-light"
                                        aria-label="Default select example">
                                        <option selected>{{ trans('Parent_trans.Choose') }}...</option>

                                        @foreach ($Bloods as $blood)
                                            <option value="{{ $blood->id }}">{{ $blood->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('Blood_Type_Mother_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-md-3">
                                <div>
                                    <label for="Religion_Mother_id"
                                        class="form-label">{{ trans('Parent_trans.Religion_Mother_id') }}</label>
                                    <select id="Religion_Mother_id-1" name="Religion_Mother_id"
                                        class="form-select form-control mb-3 bg-light"
                                        aria-label="Default select example">
                                        <option selected>{{ trans('Parent_trans.Choose') }}...</option>

                                        @foreach ($Religions as $religion)
                                            <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('Religion_Mother_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <div class="row gy-4">
                            <div class="col-xxl-3 col-md-12">
                                <div>
                                    <label for="Address_Mother"
                                        class="form-label">{{ trans('Parent_trans.Address_Mother') }}</label>
                                    <textarea class="form-control" name="Address_Mother" id="Address_Mother" rows="3"></textarea>

                                    @error('Address_Mother')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <br>
                        <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"
                            id="back2">
                            {{ trans('Parent_trans.Back') }}
                        </button>

                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" id="secondStepSubmit"
                            type="button">{{ trans('Parent_trans.Next') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
