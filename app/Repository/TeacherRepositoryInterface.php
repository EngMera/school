<?php

namespace App\Repository;

interface TeacherRepositoryInterface{

       // get all Teachers
       public function getAllTeachers();

       // Get specialization
       public function getSpecialization();
   
       // Get Gender
       public function getGender();
   
       // StoreTeachers
       public function storeTeachers($request);
   
       // StoreTeachers
       public function editTeachers($id);
   
       // UpdateTeachers
       public function UpdateTeachers($request);
   
       // DeleteTeachers
       public function DeleteTeachers($id);
   
}