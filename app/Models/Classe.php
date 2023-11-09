<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Classe extends Model
{
    use HasTranslations;
    public $translatable = ['nomClasse'];


    protected $table = 'classes';
    public $timestamps = true;
    protected $fillable=['nomClasse','grade_id'];


    // علاقة بين الصفوف المراحل الدراسية لجلب اسم المرحلة في جدول الصفوف

    public function Grades()
    {
        return $this->belongsTo('App\Models\grade', 'grade_id');
    }
}
