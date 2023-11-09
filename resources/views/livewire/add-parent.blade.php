<div>
    @if (!empty($successMessage))
        <!-- Success Alert -->
        <div class="alert alert-success alert-border-left alert-dismissible fade show" role="alert">
            <i class="ri-notification-off-line me-3 align-middle"></i> {{ $successMessage }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($catchError)
        <div class="alert alert-danger" id="success-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $catchError }}
        </div>
    @endif
    @if ($show_table)
        @include('livewire.tableParents')
    @else
        <div class="card-body form-steps">
            <form wire:submit.prevent="submitForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="custom-progress-bar" class="progress-nav mb-4">
                    <div class="progress" style="height: 1px;">
                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <ul class="nav nav-pills progress-bar-tab custom-nav" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-pill {{ $currentStep != 1 ? '' : 'active' }}"
                                data-progressbar="custom-progress-bar" id="pills-gen-info-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-gen-info" type="button" role="tab"
                                aria-controls="pills-gen-info" aria-selected="true" disabled>1</button>
                            <p>
                                {{ trans('Parent_trans.Step1') }}
                            </p>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-pill {{ $currentStep != 2 ? '' : 'active' }}"
                                data-progressbar="custom-progress-bar" id="pills-info-desc-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-info-desc" type="button" role="tab"
                                aria-controls="pills-info-desc" aria-selected="false" disabled>2</button>
                            <p>
                                {{ trans('Parent_trans.Step2') }}
                            </p>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-pill {{ $currentStep != 3 ? '' : 'active' }}"
                                data-progressbar="custom-progress-bar" id="pills-success-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-success" type="button" role="tab"
                                aria-controls="pills-success" aria-selected="false" disabled>3</button>
                            <p>
                                {{ trans('Parent_trans.Step3') }}
                            </p>
                        </li>
                    </ul>
                </div>
                @include('livewire.pere_form')
                @include('livewire.mere_form')

                @if ($currentStep != 3)
                    <div style="display: none" class="row setup-content" id="step-3">
                @endif

                <div class="col-xs-12">
                    <div class="col-md-12"><br>
                        <label style="color: red">{{ trans('Parent_trans.Attachments') }}</label>
                        <div class="form-group">
                            <input type="file" wire:model="photos" accept="image/*" multiple>
                        </div>
                        <br>

                        <input type="hidden" wire:model="Parent_id">

                        <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"
                            wire:click="back(2)">
                            {{ trans('Parent_trans.Back') }}
                        </button>
                        @if ($updateMode)
                            <button wire:click="submitForm_edit" class="btn btn-success btn-sm btn-lg pull-right"
                                type="button">{{ trans('Parent_trans.Finish') }}</button>
                        @else
                            <button wire:click="submitForm" class="btn btn-success btn-sm btn-lg pull-right"
                                type="button">{{ trans('Parent_trans.Finish') }}</button>
                        @endif
                    </div>
                </div>
            </form>

        </div>

    @endif
</div>


</div>
