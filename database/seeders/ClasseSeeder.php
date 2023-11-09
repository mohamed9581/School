<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Classe;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->delete();
        $classes = [
            ['en'=> '1°AF', 'ar'=> 'الصف الاول'],
            ['en'=> '2°AF', 'ar'=> 'الصف الثاني'],
            ['en'=> '3°AF', 'ar'=> 'الصف الثالث'],
        ];

        foreach ($classes as $classe) {
            Classe::create([
            'nomClasse' => $classe,
            'grade_id' => Grade::all()->unique()->random()->id
            ]);
        }//
    }
}
