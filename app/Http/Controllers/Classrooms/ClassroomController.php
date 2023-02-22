<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassroomRequest;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;
use PhpParser\Builder\Class_;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = Classroom::all();
        $Grades = Grade::all();
        return view('pages.classrooms.index' , compact('classrooms','Grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassroomRequest $request)
    {
        $List_Classes = $request->List_Classes;

        try 
        {

            $validated = $request->validated();
            foreach ($List_Classes as $List_Class) {

                $classroom = new Classroom();

                $classroom->Class_Name = ['en' => $List_Class['Name_class_en'], 'ar' => $List_Class['Name']];

                $classroom->Grade_id = $List_Class['Grade_id'];

                $classroom->save();

            }

            toastr()->success(trans('messages.success'));
            return redirect('classrooms');
        } 
        catch (\Exception $e) 
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClassroomRequest $request ,$classroomId)
    {
        // return $request;

        try 
        {
            $classroom =  Classroom::findOrFail($classroomId);

            $classroom->update([
                $classroom->Class_Name = ['ar' => $request->Name, 'en' => $request->Name_en],
                $classroom->Grade_id =$request->Grade_id,
            ]);

            toastr()->success(trans('messages.success'));
            return redirect('classrooms');
        } 
        catch (\Exception $e) 
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($classroomId)
    {
        $classroom = Classroom::findOrFail($classroomId)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect('classrooms');
    }
    public function destroyAll(Request $request)
    {
        
        $delete_all_id = explode(",", $request->delete_all_id);
        Classroom::whereIn('id', $delete_all_id)->Delete();
        toastr()->error(trans('messages.Delete'));
        return redirect('classrooms');
    }
    public function filterBy(Request $request)
    {
        $Grades = Grade::where('id',$request->Grade_id)->get();
        $Search = Classroom::where('id',$request->Grade_id);
        // return $Grades;
        // return view('pages.classrooms.index',compact('Grades'));

    }
}
