<div>
    <div class="card-header bg-primary text-white">
        {{ $data[$counter]->title }}
    </div>
    <div class="card-body">

        <div class="card-body">
            <div id="customerList">


                <div class="table-responsive table-card mt-3 mb-1">
                    {{-- <h5 class="card-title"> </h5> --}}
                    @foreach (preg_split('/(-)/', $data[$counter]->answers) as $index => $answer)
                        <div class="form-check form-radio-outline form-radio-success mb-3">
                            <input type="radio" id="customRadio{{ $index }}" name="customRadio"
                                class="form-check-input" inh>
                            <label class="form-check-label" for="customRadio{{ $index }}"
                                wire:click="nextQuestion({{ $data[$counter]->id }}, {{ $data[$counter]->score }}, '{{ $answer }}', '{{ $data[$counter]->right_answer }}')">
                                {{ $answer }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
