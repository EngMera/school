<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->delete();
        $Grades = [
            ['en'=> 'Primary stage', 'ar'=> 'المرحلة الابتدائية'],
            ['en'=> 'Middle School', 'ar'=> 'المرحلة الاعدادية'],
            ['en'=> 'High school', 'ar'=> 'المرحلة الثانوية'],
        ];
        foreach($Grades  as $Grade ){
            Grade::create(['Name'=> $Grade]);
        }
    }
}
