<?php

namespace App\Http\Controllers\Sections;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectionRequest;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        // grade with relationship sections
        $Grades = Grade::with(['Sections'])->get();

        $list_Grades = Grade::all();
 
        $teachers = Teacher::all();

        return view('pages.sections.index',compact('Grades','list_Grades','teachers'));
    }

    public function getclasses($id)
    {
        $list_classes = Classroom::where("Grade_id", $id)->pluck("Class_Name", "id");

        return $list_classes;
    }

    public function store(SectionRequest $request)
    {
        try
        {
            $validated = $request->validated();
            $Sections = new Section();
            $Sections->Section_Name = ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En];
            $Sections->Grade_id = $request->Grade_id;
            $Sections->Class_id = $request->Class_id;
            $Sections->Status = 1;
            $Sections->save();
            $Sections->teachers()->attach($request->teacher_id);
            toastr()->success(trans('messages.success'));
      
            return redirect('sections');
        }

        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }

    }

    public function update(SectionRequest $request, $sectionId)
    {
        
        try
        {
            $section = Section::findOrFail($sectionId);
            $validated = $request->validated();
            
            $section->Section_Name = ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En];
            $section->Grade_id = $request->Grade_id;
            $section->Class_id = $request->Class_id;

            if(isset($request->Status))
              {
                $section->Status = 1;
              }
              else
              {
                $section->Status = 2;
              }

            // update pivot tABLE
            if (isset($request->teacher_id)) 
            {
                $section->teachers()->sync($request->teacher_id);
            } 
            else
            {
                $section->teachers()->sync(array());
            }

            $section->save();
            // $section->teachers()->attach($request->teacher_id);
            toastr()->success(trans('messages.success'));
      
            return redirect('sections');
        }

        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }
    }

    public function destroy($sectionId)
    {
        Section::findOrFail($sectionId)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect('sections');
    }
}
