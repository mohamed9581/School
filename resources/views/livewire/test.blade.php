<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-body">
                <div class="live-preview">
                    <div class="row gy-4">
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="Email" class="form-label">{{ trans('Parent_trans.Email') }}</label>
                                <input type="email" wire:model="Email" class="form-control" id="Email">
                                @error('Email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="password" class="form-label">{{ trans('Parent_trans.Password') }}</label>
                                <input type="password" wire:model="Password" class="form-control" id="Password">
                                @error('Password')
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
                                <input type="text" wire:model="Name_Father" class="form-control" id="Name_Father">
                                @error('Name_Father')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="Name_Father_en"
                                    class="form-label">{{ trans('Parent_trans.Name_Father_en') }}</label>
                                <input type="text" wire:model="Name_Father_en" class="form-control"
                                    id="Name_Father_en">
                                @error('Name_Father_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!--end col-->
                    </div>

                    <div class="row gy-4">
                        <div class="col-xxl-3 col-md-3">
                            <div>
                                <label for="Job_Father"
                                    class="form-label">{{ trans('Parent_trans.Job_Father') }}</label>
                                <input type="text" wire:model="Job_Father" class="form-control" id="Job_Father">
                                @error('Job_Father')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-md-3">
                            <div>
                                <label for="Job_Father_en"
                                    class="form-label">{{ trans('Parent_trans.Job_Father_en') }}</label>
                                <input type="text" wire:model="Job_Father_en" class="form-control"
                                    id="Job_Father_en">
                                @error('Job_Father_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-md-2">
                            <div>
                                <label for="National_ID_Father"
                                    class="form-label">{{ trans('Parent_trans.National_ID_Father') }}</label>
                                <input type="text" wire:model="National_ID_Father" class="form-control"
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
                                <input type="text" wire:model="Passport_ID_Father" class="form-control"
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
                                <input type="text" wire:model="Phone_Father" class="form-control" id="Phone_Father">
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


                                <select id="Nationality_Father_id-1" wire:model="Nationality_Father_id"
                                     class="form-select form-control mb-3 bg-light"
                                    aria-label="Default select example">
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
                                <select id="Blood_Type_Father_id-1" wire:model="Blood_Type_Father_id"
                                     class="form-select form-control mb-3 bg-light"
                                    aria-label="Default select example">
                                    <option selected>{{ trans('Parent_trans.Choose') }}...</option>

                                    @foreach ($Type_Bloods as $blood)
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
                                <select id="Religion_Father_id-1" wire:model="Religion_Father_id"
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
                                <textarea class="form-control"  wire:model="Address_Father" id="Address_Father"
                                    rows="3"></textarea>

                                @error('Address_Father')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
