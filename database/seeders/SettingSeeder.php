<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();

        $data = [
            ['key' => 'current_session', 'value' => '2022-2023'],
            ['key' => 'school_title', 'value' => 'Massar'],
            ['key' => 'school_name', 'value' => 'Ecole Massar'],
            ['key' => 'end_first_sem', 'value' => '31-01-2022'],
            ['key' => 'end_second_sem', 'value' => '31-06-2023'],
            ['key' => 'phone', 'value' => '0123456789'],
            ['key' => 'address', 'value' => 'Sidi Slimane'],
            ['key' => 'school_email', 'value' => 'massar@gmail.com'],
            ['key' => 'logo', 'value' => '1.jpg'],
        ];

        DB::table('settings')->insert($data);
    }
}
