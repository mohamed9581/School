<?php

namespace Database\Seeders;

use App\Models\Blood;
use App\Models\Grade;
use App\Models\Classe;
use App\Models\Section;
use App\Models\Student;
use App\Models\MyParent;
use App\Models\Nationalitie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->delete();
        $students = new Student();
        $students->name = ['ar' => 'احمد ابراهيم', 'en' => 'Ahmed Ibrahim'];
        $students->email = 'Ahmed_Ibrahim@yahoo.com';
        $students->password = Hash::make('12345678');
        $students->gender_id = 1;
        $students->nationalite_id = Nationalitie::all()->unique()->random()->id;
        $students->blood_id =Blood::all()->unique()->random()->id;
        $students->Date_Birth = date('1995-01-01');
        $students->grade_id = Grade::all()->unique()->random()->id;
        $students->classe_id =Classe::all()->unique()->random()->id;
        $students->section_id = Section::all()->unique()->random()->id;
        $students->parent_id = MyParent::all()->unique()->random()->id;
        $students->academic_year ='2021';
        $students->save();
    }
}
