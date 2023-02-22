<?php

namespace Database\Seeders;

use App\Models\BloodType;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\MyParent;
use App\Models\Nationality;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        $students->name = ['ar' => 'عزالدين', 'en' => 'Ezaldeen'];
        $students->email = 'Ezaldeen@yahoo.com';
        $students->password = Hash::make('12345678');
        $students->gender_id = 1;
        $students->nationality_id = Nationality::all()->unique()->random()->id;
        $students->blood_id =BloodType::all()->unique()->random()->id;
        $students->Date_Birth = date('1995-01-01');
        $students->Grade_id = Grade::all()->unique()->random()->id;
        $students->Classroom_id =Classroom::all()->unique()->random()->id;
        $students->section_id = Section::all()->unique()->random()->id;
        $students->parent_id = MyParent::all()->unique()->random()->id;
        $students->academic_year ='2023';
        $students->save();
    }
}
