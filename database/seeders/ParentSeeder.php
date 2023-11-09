<?php

namespace Database\Seeders;

use App\Models\Blood;
use App\Models\MyParent;
use App\Models\Religion;
use App\Models\Nationalitie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my_parents')->delete();
            $my_parents = new MyParent();
            $my_parents->email = 'parent@yahoo.com';
            $my_parents->password = Hash::make('12345678');
            $my_parents->name_Father = ['en' => 'emad', 'ar' => 'عماد محمد'];
            $my_parents->cin_Father = '1234567810';
            $my_parents->passport_ID_Father = '1234567810';
            $my_parents->phone_Father = '1234567810';
            $my_parents->job_Father = ['en' => 'programmeur', 'ar' => 'مبرمج'];
            $my_parents->nationality_Father_id = Nationalitie::all()->unique()->random()->id;
            $my_parents->blood_Father_id =Blood::all()->unique()->random()->id;
            $my_parents->religion_Father_id = Religion::all()->unique()->random()->id;
            $my_parents->addresse_Father ='الرباط';
            $my_parents->name_Mother = ['en' => 'SS', 'ar' => 'سس'];
            $my_parents->cin_Mother = '1234567810';
            $my_parents->passport_ID_Mother = '1234567810';
            $my_parents->phone_Mother = '1234567810';
            $my_parents->job_Mother = ['en' => 'Professeur', 'ar' => 'معلمة'];
            $my_parents->nationality_Mother_id = Nationalitie::all()->unique()->random()->id;
            $my_parents->blood_Mother_id =Blood::all()->unique()->random()->id;
            $my_parents->religion_Mother_id = Religion::all()->unique()->random()->id;
            $my_parents->addresse_Mother ='الرباط';
            $my_parents->save();

    }
}
