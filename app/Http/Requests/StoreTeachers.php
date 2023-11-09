<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeachers extends FormRequest
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
            'name.*' => 'required|unique_translation:teachers,name,'.$this->id,
            'email' => 'required|unique:teachers,Email,'.$this->id,
            'password' => 'required'.$this->id,
            'specialisation_id' => 'required',
            'gender_id' => 'required',
            'addresse' => 'required',
            'joining_Date' => 'required|date|date_format:Y-m-d',

        ];
    }

        public function messages()
    {
        return [
            'name.*.required' => trans('validation.required'),
            'name.*.unique' => trans('validation.unique'),
            'email.required' => trans('validation.required'),
            'email.unique' => trans('validation.unique'),
            'password.required' => trans('validation.required'),
            'specialisation_id.required' => trans('validation.required'),
            'gender_id.required' => trans('validation.required'),
            'joining_Date.required' => trans('validation.required'),
            'addresse.required' => trans('validation.required'),

        ];
    }

}
