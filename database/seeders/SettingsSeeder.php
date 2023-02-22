<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
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
            ['key' => 'school_title', 'value' => 'BS_School'],
            ['key' => 'school_name', 'value' => 'BEST Soft International Schools'],
            ['key' => 'end_first_term', 'value' => '01-12-2022'],
            ['key' => 'end_second_term', 'value' => '01-03-2023'],
            ['key' => 'phone', 'value' => '0123456789'],
            ['key' => 'address', 'value' => 'جدة'],
            ['key' => 'school_email', 'value' => 'info@BestSoft.com'],
            ['key' => 'logo', 'value' => '1.png'],
        ];

        DB::table('settings')->insert($data);
    }
}
