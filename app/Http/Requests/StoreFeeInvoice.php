<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeeInvoice extends FormRequest
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
            'amount.*' => 'required|numeric',
            'fee_id.*' => 'required|integer',
            'student_id.*' => 'required|integer',
            'grade_id' => 'required|integer',
            'classe_id' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'amount.*.required' => trans('validation.required'),
            'amount.*.numeric' => trans('validation.numeric'),
            'fee_id.*.required' => trans('validation.required'),
            'student_id.*.required' => trans('validation.required'),
            'grade_id.required' => trans('validation.required'),
            'classe_id.required' => trans('validation.required'),
        ];
    }}
