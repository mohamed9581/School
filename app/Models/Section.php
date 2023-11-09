<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
     use HasTranslations;
    public $translatable = ['nomSection'];

    protected $fillable=['nomSection','status','grade_id','classe_id'];
    protected $table = 'sections';
    public $timestamps = true;

    public function classes()
    {
        return $this->belongsTo('App\Models\Classe', 'classe_id');
    }

    // علاقة الاقسام مع المعلمين
    public function teachers()
    {
        return $this->belongsToMany('App\Models\Teacher','teacher_section');
    }

    public function grades()
    {
        return $this->belongsTo('App\Models\Grade','grade_id');
    }
}
