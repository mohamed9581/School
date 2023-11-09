<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MyParent extends Authenticatable
{
    use HasFactory;
    use HasTranslations;
    use Notifiable;

    public $translatable = ['name_Father','job_Father','name_Mother','job_Mother'];
    protected $table = 'my_parents';
    protected $fillable=[

        'email',
        'password' ,
        'name_Father',
        'cin_Father',
        'passeport_ID_Father',
        'phone_Father',
        'job_Father',
        'nationality_Father_id',
        'blood_Father_id' ,
        'religion_Father_id',
        'addresse_Father',
        'name_Mother',
        'cin_Mother' ,
        'passeport_ID_Mother',
        'phone_Mother',
        'job_Mother',
        'nationality_Mother_id',
        'blood_Mother_id',
        'religion_Mother_id',
        'addresse_Mother',
     ];

     public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }


      public function children()
    {
        return $this->hasMany('App\Models\Student', 'parent_id');
    }


}
