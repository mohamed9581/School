<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use CodeZero\UniqueTranslation\UniqueTranslationRule;

class StoreClasse extends FormRequest
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
            // $classeId = $this->route()->id;

        return [
            // 'name.*.*' => 'required|unique_translation:classes,nomClasse,'.$this->id.',grade_id,'.$this->grade_id,
            // 'name.0.*' =>UniqueTranslationRule::for('classes','nomClasse')->where('grade_id',$this->grade_id)->ignore('id',$this->id),
            'name.*.ar' => Rule::unique('classes','nomClasse->ar')->where(fn ($query) => $query->where('grade_id',$this->grade_id)->whereNot('id',$this->id)),
            'name.*.en' => Rule::unique('classes','nomClasse->en')->where(fn ($query) => $query->where('grade_id',$this->grade_id)->whereNot('id',$this->id)),


        ];
    }

      public function messages()
    {
        return [
            'name.*.*.required' => trans('validation.required'),
             'name.*.*.unique' => trans('validation.unique'),


        ];
    }
}
