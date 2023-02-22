<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Classroom;
use App\Repository\StudentRepositoryInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $Student;

    public function __construct(StudentRepositoryInterface $Student)
    {
        $this->Student = $Student;
    }
    public function index()
    {
        
        return $this->Student->Get_Student();
    }
    public function create()
    {
        return $this->Student->Create_Student();
    }
    public function Edit_Student($id)
    {
        return $this->Student->Edit_Student($id);
    }
    public function Update_Student(StudentRequest $request)
    {
        return $this->Student->Update_Student($request);
    }
    public function Store_Student(StudentRequest $request)
    {
        return $this->Student->Store_Student($request);
    }
    public function Delete_Student($id)
    {
        return $this->Student->Delete_Student($id);
        
    }
    public function Upload_attachment(Request $request)
    {
        return $this->Student->Upload_attachment($request);
        
    }
    public function Show_Student($id)
    {
        return $this->Student->Show_Student($id);
    }
    public function Download_attachment($studentsname,$filename)
    {
        return $this->Student->Download_attachment($studentsname,$filename);
    }
    public function Delete_attachment(Request $request)
    {
        return $this->Student->Delete_attachment($request);

    }
  


}
