<?php 

namespace App\Repository;

use App\Models\BloodType;
use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Image;
use App\Models\MyParent;
use App\Models\Nationality;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentRepository implements StudentRepositoryInterface
{
    public function Get_Student()
    {
        $students = Student::all();
        return view('pages.Students.index',compact('students'));
    }

    public function Create_Student()
    {
       $data['my_classes'] = Grade::all();
       $data['parents'] = MyParent::all();
       $data['Genders'] = Gender::all();
       $data['nationals'] = Nationality::all();
       $data['bloods'] = BloodType::all();
       return view('pages.Students.add',$data);
    }

    public function Edit_Student($id)
    {
       $data['Grades'] = Grade::all();
       $data['parents'] = MyParent::all();
       $data['Genders'] = Gender::all();
       $data['nationals'] = Nationality::all();
       $data['bloods'] = BloodType::all();
       $Students =  Student::findOrFail($id);
       return view('pages.Students.edit',$data,compact('Students'));
    }

    public function Update_Student($request)
    {
        try {
            $students = Student::findOrFail($request->id);
            $students->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $students->email = $request->email;
            $students->password = Hash::make($request->password);
            $students->gender_id = $request->gender_id;
            $students->nationality_id = $request->nationalitie_id;
            $students->blood_id = $request->blood_id;
            $students->Date_Birth = $request->Date_Birth;
            $students->Grade_id = $request->Grade_id;
            $students->Classroom_id = $request->Classroom_id;
            $students->section_id = $request->section_id;
            $students->parent_id = $request->parent_id;
            $students->academic_year = $request->academic_year;
            $students->update();

            toastr()->success(trans('messages.success'));
            return redirect()->to('students');

        }

        catch (\Exception $e){
            // DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function Store_Student($request)
    {
        DB::beginTransaction();

        try {
            $students = new Student();
            $students->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $students->email = $request->email;
            $students->password = Hash::make($request->password);
            $students->gender_id = $request->gender_id;
            $students->nationality_id = $request->nationalitie_id;
            $students->blood_id = $request->blood_id;
            $students->Date_Birth = $request->Date_Birth;
            $students->Grade_id = $request->Grade_id;
            $students->Classroom_id = $request->Classroom_id;
            $students->section_id = $request->section_id;
            $students->parent_id = $request->parent_id;
            $students->academic_year = $request->academic_year;
            $students->save();

            // insert img
            if($request->hasfile('photos'))
            {
                foreach($request->file('photos') as $file)
                {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('attachments/students/'.$students->name, $file->getClientOriginalName(),'upload_attachments');

                    // insert in image_table
                    $images= new Image();
                    $images->filename=$name;
                    $images->imageable_id= $students->id;
                    $images->imageable_type = Student::class;
                    $images->save();
                }
            }

            DB::commit(); 
            
            // insert data
            toastr()->success(trans('messages.success'));
            return redirect()->to('students/create');

        }

        catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function Delete_Student($id)
    {
        Student::destroy($id);
        toastr()->error(trans('messages.Delete'));
        return redirect()->back();
    }

    public function Upload_attachment($request)
    {
        foreach($request->file('photos') as $file)
        {
            $name = $file->getClientOriginalName();
            $file->storeAs('attachments/students/'.$request->student_name, $file->getClientOriginalName(),'upload_attachments');

            // insert in image_table
            $images= new image();
            $images->filename=$name;
            $images->imageable_id = $request->student_id;
            $images->imageable_type = Student::class;
            $images->save();
        }
        toastr()->success(trans('messages.success'));
        return redirect()->back();
    }

    public function Download_attachment($studentsname,$filename)
    {
        return response()->download(public_path('attachments/students/'.$studentsname.'/'.$filename));

    }
    public function Delete_attachment($request)
    {
        // Delete img in server disk
        Storage::disk('upload_attachments')->delete('attachments/students/'.$request->student_name.'/'.$request->filename);

        // Delete in data
        image::where('id',$request->id)->where('filename',$request->filename)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->back();
    }


    public function Show_Student($id)

    {
        $Student = Student::findOrFail($id);
        return view('pages.Students.show',compact('Student'));
    }


}
