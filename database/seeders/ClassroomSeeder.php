<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PhpParser\Builder\Class_;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classrooms')->delete();
        $classrooms  =[
            ['en'=> 'First Class', 'ar'=> 'الصف الاول'],
            ['en'=> 'Second Class', 'ar'=> 'الصف الثاني'],
            ['en'=> 'Third Class', 'ar'=> 'الصف الثالث'],
        ];
        foreach($classrooms  as $classroom){
            Classroom::create([
                'Class_Name'=> $classroom,
                'Grade_id' => Grade::all()->unique()->random()->id
            ]);
        }
    }
}
