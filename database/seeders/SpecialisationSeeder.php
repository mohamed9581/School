<?php

namespace Database\Seeders;

use App\Models\Specialisation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SpecialisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialisations')->delete();
        $specializations = [
            ['en'=> 'professeur d\'arabe', 'ar'=> 'مدرس اللغة العربية'],
            ['en'=> 'professeur de français', 'ar'=> 'مدرس اللغة الفرنسية'],
            ['en'=> 'professeur d\'anglais', 'ar'=> 'مدرس اللغة النجليزية'],
            ['en'=> 'professeur de l\'informatique', 'ar'=> 'مدرس الاعلاميات'],
            ['en'=> 'professeur d\'éducation religieuse', 'ar'=> 'مدرس التربية الاسلامية'],
            ['en'=> 'professeur d\'éducation physique', 'ar'=> 'مدرس التربية البدنية'],
            ['en'=> 'professeur de science physique', 'ar'=> 'مدرس الفيزياء'],
            ['en'=> 'professeur de science de la vie et la terre ', 'ar'=> 'مدرس علوم الحياة الأرض'],
            ['en'=> 'professeur de science mathématique', 'ar'=> 'مدرس الرياضيات'],
            ['en'=> 'professeur d\'histoire et géograhie', 'ar'=> 'مدرس التاريخ والجغرافيا'],
            ['en'=> 'professeur de la philosophie', 'ar'=> 'مدس الفلسفة'],
            ['en'=> 'professeur de la traduction', 'ar'=> 'مدرس الترجمة'],
        ];
        foreach ($specializations as $S) {
            Specialisation::create(['name' => $S]);
        }
    }
}
