<?php

namespace Database\Seeders;

use App\Models\BloodType;
use App\Models\MyParent;
use App\Models\Nationality;
use App\Models\Religion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        $my_parents->Name_Father = ['en' => 'Adel', 'ar' => 'عادل '];
        $my_parents->National_ID_Father = '1234567810';
        $my_parents->Passport_ID_Father = '1234567810';
        $my_parents->Phone_Father = '1234567810';
        $my_parents->Job_Father = ['en' => 'programmer', 'ar' => 'مبرمج'];
        $my_parents->Nationality_Father_id = Nationality::all()->unique()->random()->id;
        $my_parents->Blood_Type_Father_id =BloodType::all()->unique()->random()->id;
        $my_parents->Religion_Father_id = Religion::all()->unique()->random()->id;
        $my_parents->Address_Father ='اليمن';
        $my_parents->Name_Mother = ['en' => 'SS', 'ar' => 'سس'];
        $my_parents->National_ID_Mother = '1234567810';
        $my_parents->Passport_ID_Mother = '1234567810';
        $my_parents->Phone_Mother = '1234567810';
        $my_parents->Job_Mother = ['en' => 'programmer', 'ar' => 'مبرمجه'];
        $my_parents->Nationality_Mother_id = Nationality::all()->unique()->random()->id;
        $my_parents->Blood_Type_Mother_id =BloodType::all()->unique()->random()->id;
        $my_parents->Religion_Mother_id = Religion::all()->unique()->random()->id;
        $my_parents->Address_Mother ='اليمن';
        $my_parents->save();
    }
}
