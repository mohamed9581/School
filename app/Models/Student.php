<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    use HasTranslations;
    public $translatable = ['name'];
    protected $fillable=['name',
    'email',
    'password',
    'gender_id',
    'nationalitie_id',
    'blood_id',
    'Date_Birth',
    'grade_id',
    'classe_id',
    'section_id',
    'parent_id',
    'academic_year',
    'photo'
];


// علاقة بين الطلاب والانواع لجلب اسم النوع في جدول الطلاب

    public function gender()
    {
        return $this->belongsTo('App\Models\Gender', 'gender_id');
    }

    // علاقة بين الطلاب والمراحل الدراسية لجلب اسم المرحلة في جدول الطلاب

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id');
    }


    // علاقة بين الطلاب الصفوف الدراسية لجلب اسم الصف في جدول الطلاب

    public function classe()
    {
        return $this->belongsTo('App\Models\Classe', 'classe_id');
    }

    // علاقة بين الطلاب الاقسام الدراسية لجلب اسم القسم  في جدول الطلاب

    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }

    // علاقة بين الطلاب والجنسيات  لجلب اسم الجنسية  في جدول الجنسيات

    public function nationalite()
    {
        return $this->belongsTo('App\Models\Nationalitie', 'nationalite_id');
    }


    // علاقة بين الطلاب والاباء لجلب اسم الاب في جدول الاباء

    public function myparent()
    {
        return $this->belongsTo('App\Models\MyParent', 'parent_id');
    }

    public function blood()
    {
        return $this->belongsTo('App\Models\Blood', 'blood_id');
    }
    // علاقة بين الطلاب والصور لجلب اسم الصور  في جدول الطلاب
     public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    // علاقة بين جدول سدادت الطلاب وجدول الطلاب لجلب اجمالي المدفوعات والمتبقي
    public function student_account()
    {
        return $this->hasMany('App\Models\StudentAccount', 'student_id');
    }

//    علاقة بين جدول الطلاب وجدول الحضور والغياب
    public function attendances()
    {
        return $this->hasMany('App\Models\Attendance', 'student_id');
    }


    public function routeNotificationForMail($notification)
    {
        return $this->myparent->email;
    }

}
