<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;

class UpdateClasse extends FormRequest
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
        $classeId = $this->route('classe');

        // Récupère toutes les valeurs de 'name' depuis la requête
        $names = collect($this->input('name[]'))->filter(function ($name) {
            return $name !== null;
        });

        // Filtre les noms existants pour les exclure de la validation
        $existingNames = DB::table('classes')
            ->where('grade_id', $this->grade_id)
            ->where('id', '!=', $classeId)
            ->pluck('nomClasse')
            ->all();

        $namesToValidate = $names->diff($existingNames);

        // Construit les règles de validation pour chaque nom de classe à valider
        $rules = [];
        foreach ($namesToValidate as $key => $value) {
            $rules["name.$key.*"] = [
                'required',
                'string',
                'max:255',
                UniqueTranslationRule::for('classes', 'nomClasse')
                    ->where('grade_id', $this->grade_id)
                    ->ignore($classeId),
            ];
        }

        return $rules;
    }
}
