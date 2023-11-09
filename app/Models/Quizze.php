<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quizze extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher', 'teacher_id');
    }



    public function subject()
    {
        return $this->belongsTo('App\Models\Subject', 'subject_id');
    }


    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id');
    }


    public function classe()
    {
        return $this->belongsTo('App\Models\Classe', 'classe_id');
    }


    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }


    public function degree()
    {
        return $this->hasMany('App\Models\Degree');
    }
}