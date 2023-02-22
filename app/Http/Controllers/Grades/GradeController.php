<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Http\Requests\GradeRequest;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        return view('pages.grades.index',compact('grades'));
    }
    public function store(GradeRequest $request)
    {
        try {
            $validated = $request->validated();
            $Grade = new Grade();
        
            $Grade
                    ->setTranslation('Name', 'en', $request->Name_en)
                    ->setTranslation('Name', 'ar', $request->Name)
                    ->Notes = $request->Notes;
            $Grade->save();

            toastr()->success(trans('messages.success'));

            return redirect('grades');

        } catch (\Exception $e) {
            
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        
    }
    public function update(GradeRequest $request, int $gradeId)
    {
        try {
            $validated = $request->validated();
            $Grade =  Grade::findOrFail($gradeId);
        
            $Grade->update([
                $Grade->setTranslation('Name', 'en', $request->Name_en)
                      ->setTranslation('Name', 'ar', $request->Name)
                      ->Notes = $request->Notes
            ]);
                    

            toastr()->success(trans('messages.Update'));

            return redirect('grades');

        } catch (\Exception $e) {
            
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function delete($gradeId)
    {
        $classroomId = Classroom::where('Grade_id',$gradeId)->pluck('Grade_id');

        if ($classroomId->count() == 0) 
        {
            $Grade =  Grade::findOrFail($gradeId)->delete();
                    

            toastr()->error(trans('messages.Delete'));

            return redirect('grades');
        } 
        else 
        {
            toastr()->error(trans('grades.delete_Grade_Error'));

            return redirect('grades');
        }
        
       
    }
}
