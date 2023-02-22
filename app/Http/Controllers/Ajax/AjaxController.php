<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Section;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function Get_classrooms($id)
    {
        $list_classes = Classroom::where("Grade_id", $id)->pluck("Class_Name", "id");
        return $list_classes;
    }
    public function Get_Sections($id)
    {
        $list_sections = Section::where("Class_id", $id)->pluck("Section_Name", "id");
        return $list_sections;
    }
}
