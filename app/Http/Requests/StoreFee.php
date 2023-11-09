<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreFee extends FormRequest
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
            // 'title.*' => 'required|unique_translation:fees,title,'.$this->id,
            'title.*.ar' => Rule::unique('fees','title->ar')->where(fn ($query) => $query->whereNot('id',$this->id)),
            'title.*.en' => Rule::unique('fees','title->en')->where(fn ($query) => $query->whereNot('id',$this->id)),
            'amount' => 'required|numeric',
            'grade_id' => 'required|integer',
            'classe_id' => 'required|integer',
            'academic_year' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.*.required' => trans('validation.required'),
            'title.*.unique' => trans('validation.unique'),
            // 'Password.required' => trans('validation.required'),
            'amount.required' => trans('validation.required'),
            'amount.numeric' => trans('validation.numeric'),
            'grade_id.required' => trans('validation.required'),
            'classe_id.required' => trans('validation.required'),
            'academic_year.required' => trans('validation.required'),
        ];
    }
}
