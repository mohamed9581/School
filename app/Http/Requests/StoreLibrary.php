<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLibrary extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:libraries,title,'.$this->id,
            'grade_id' => 'required',
            'classe_id' => 'required',
            'section_id' => 'required',
            'file_name' => 'required',

        ];
    }

        public function messages()
    {
        return [

            'title.required' => trans('validation.required'),
            'title.unique' => trans('validation.unique'),

            'grade_id.required' => trans('validation.required'),
            'classe_id.required' => trans('validation.required'),
            'section_id.required' => trans('validation.required'),
            'file_name.required' => trans('validation.required'),

        ];
    }
}
