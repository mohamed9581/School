<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\GradeSeeder;
use Database\Seeders\ClasseSeeder;
use Database\Seeders\GenderSeeder;
use Database\Seeders\ParentSeeder;
use Database\Seeders\SectionSeeder;
use Database\Seeders\StudentSeeder;
use Database\Seeders\BloodTableSeeder;
use Database\Seeders\ReligionTableSeeder;
use Database\Seeders\SpecialisationSeeder;
use Database\Seeders\NationalitieTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(GradeSeeder::class);
        $this->call(ClasseSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(BloodTableSeeder::class);
        $this->call(NationalitieTableSeeder::class);
        $this->call(ReligionTableSeeder::class);
        $this->call(SpecialisationSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(ParentSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(SettingSeeder::class);
    }
}
