<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable=['student_id','from_grade','from_Classe',
    'from_section','to_grade','to_Classe',
    'to_section','academic_year','academic_year_new'
    ];

    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }

    // علاقة بين الترقيات والمراحل الدراسية لجلب اسم المرحلة في جدول الترقيات

    public function f_grade()
    {
        return $this->belongsTo('App\Models\Grade', 'from_grade');
    }


    // علاقة بين الترقيات الصفوف الدراسية لجلب اسم الصف في جدول الترقيات

    public function f_classe()
    {
        return $this->belongsTo('App\Models\Classe', 'from_Classe');
    }

    // علاقة بين الترقيات الاقسام الدراسية لجلب اسم القسم  في جدول الترقيات

    public function f_section()
    {
        return $this->belongsTo('App\Models\Section', 'from_section');
    }

    // علاقة بين الترقيات والمراحل الدراسية لجلب اسم المرحلة في جدول الترقيات

    public function t_grade()
    {
        return $this->belongsTo('App\Models\Grade', 'to_grade');
    }


    // علاقة بين الترقيات الصفوف الدراسية لجلب اسم الصف في جدول الترقيات

    public function t_classe()
    {
        return $this->belongsTo('App\Models\Classe', 'to_Classe');
    }

    // علاقة بين الترقيات الاقسام الدراسية لجلب اسم القسم  في جدول الترقيات

    public function t_section()
    {
        return $this->belongsTo('App\Models\Section', 'to_section');
    }
}
