<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use CodeZero\UniqueTranslation\UniqueTranslationRule;

class StoreSection extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            //  'name.*' => 'required|unique_translation:sections,nomSection,'.$this->id,
            // 'name.*' =>UniqueTranslationRule::for('sections','nomSection')->where('classe_id',$this->classe_id),
            'name.*.en' => Rule::unique('sections','nomSection->en')->where(fn ($query) => $query->where('classe_id',$this->classe_id)->whereNot('id',$this->id)),
            'name.*.ar' => Rule::unique('sections','nomSection->ar')->where(fn ($query) => $query->where('classe_id',$this->classe_id)->whereNot('id',$this->id)),

        ];
    }

    public function messages()
    {
        // return [
        //     'name.*.required' => trans('validation.required'),
        //      'name.*.unique' => trans('validation.unique'),
        // ];

        return [
            'name.*.*.required' => trans('validation.required'),
             'name.*.*.unique' => trans('validation.unique'),


        ];
    }
}
