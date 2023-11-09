<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Authenticatable
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];
    protected $fillable=['email','password','name','specialisation_id','gender_id','joining_Date','adresse'];

    // علاقة بين المعلمين والتخصصات لجلب اسم التخصص
    public function specialisations()
    {
        return $this->belongsTo('App\Models\Specialisation', 'specialisation_id');
    }

    // علاقة بين المعلمين والانواع لجلب جنس المعلم
    public function genders()
    {
        return $this->belongsTo('App\Models\Gender', 'gender_id');
    }

// علاقة المعلمين مع الاقسام
    public function sections()
    {
        return $this->belongsToMany('App\Models\Section','teacher_section');
    }

     public function grade()
    {
        return $this->belongsTo('App\Models\Grade','grade_id');
    }

    // علاقة المعلمين مع المواد
    public function subjects()
    {
        return $this->belongsToMany('App\Models\Subject','teacher_subject');
    }
}
