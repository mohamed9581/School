<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fee extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['title'];
    protected $fillable=['title','amount','grade_id','classe_id','year','description','fee_type'];


    // علاقة بين الرسوم الدراسية والمراحل الدراسية لجب اسم المرحلة

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id');
    }


    // علاقة بين الصفوف الدراسية والرسوم الدراسية لجب اسم الصف

    public function classe()
    {
        return $this->belongsTo('App\Models\Classe', 'classe_id');
    }
}
