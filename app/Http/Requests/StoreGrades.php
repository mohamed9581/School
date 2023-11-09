<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGrades extends FormRequest
{
 public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'name.*' => 'required|unique_translation:grades,Name,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'name.*.required' => trans('validation.required'),
             'name.*.unique' => trans('validation.unique'),
            // 'Name_en.required' => trans('validation.required'),
            // 'Name_en.unique' => trans('validation.unique'),


        ];
    }
}
