<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Classe;
use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->delete();

        $sections = [
            ['en' => 'a', 'ar' => 'ا'],
            ['en' => 'b', 'ar' => 'ب'],
            ['en' => 'c', 'ar' => 'ت'],
        ];

        foreach ($sections as $section) {
            Section::create([
                'nomSection' => $section,
                'status' => 1,
                'grade_id' => Grade::all()->unique()->random()->id,
                'classe_id' => Classe::all()->unique()->random()->id
            ]);
        }
    }
}
