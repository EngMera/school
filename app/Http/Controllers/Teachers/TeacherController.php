<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeachersRequest;
use Illuminate\Http\Request;
use App\Repository\TeacherRepositoryInterface;

class TeacherController extends Controller
{
    protected $Teacher;

    public function __construct(TeacherRepositoryInterface $Teacher)
    {
        $this->Teacher = $Teacher;
    }
    public function index()
    {
        $Teachers  = $this->Teacher->getAllTeachers();
        return view('pages.teachers.index', compact('Teachers'));
    }
    public function create()
    {
        $genders = $this->Teacher->getGender();
        $specializations = $this->Teacher->getSpecialization();

        return view('pages.teachers.create', compact('genders','specializations'));
    }
    public function store(TeachersRequest $request)
    {
         return $this->Teacher->storeTeachers($request);
    }
    public function edit($id)
    {
        $genders = $this->Teacher->getGender();
        $specializations = $this->Teacher->getSpecialization();
        $Teacher = $this->Teacher->editTeachers($id);

        return view('pages.teachers.Edit',compact('Teacher','genders','specializations'));
    }
    public function update(TeachersRequest $request)
    {
        return $this->Teacher->UpdateTeachers($request);
    }
    public function destroy($id)
    {
        
        return $this->Teacher->DeleteTeachers($id);
    }
}
