<?php

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth:teacher' ]
    ], function(){ 

        Route::get('/teacher/dashboard',function(){
            $ids = Teacher::findOrFail(auth()->user()->id)->Sections()->pluck('section_id');
            $sec_count = $ids->count();
            $stu_count = Student::whereIn('section_id',$ids)->count();
            return view('pages.teachers.dashboard.dashboard',compact('ids','sec_count','stu_count'));
        });
        
        Route::prefix('Teacher/dashboard')->group( function () {
            Route::controller(App\Http\Controllers\Teachers\dashboard\StudentController::class)->group(function () {
                Route::get('/students','index');
                Route::get('/sections','sections');
                Route::post('/attendance','attendance');
                Route::post('/edit_attendance','editAttendance');
                Route::get('/attendance_report','attendanceReport');
                Route::post('/attendance_report','attendanceSearch');
            });
            Route::controller(App\Http\Controllers\Teachers\dashboard\QuizController::class)->group(function () {
                Route::get('/quiz','index');
                Route::get('/quiz/create','create');
                Route::get('/quiz/show/{id}','show');

                Route::post('/quiz','store');
                Route::get('/quiz/edit/{id}','edit');
                Route::put('/quiz','update');
                Route::post('/quiz/destroy/{id}','destroy');

                Route::post('/repeat/quiz/{id}','repeat_quizze');
                Route::get('student/quiz/{id}','student_quizze');

                
            });
            Route::controller(App\Http\Controllers\Teachers\dashboard\QuestionController::class)->group(function () {
                Route::get('/question','index');
                Route::post('/question','store');
                Route::get('/question/show/{id}','show');
                Route::get('/question/edit/{id}','edit');
                Route::put('/question/update/{id}','update');
                Route::post('/question/destroy/{id}','destroy');
            });
            Route::controller(App\Http\Controllers\Teachers\dashboard\ProfileController::class)->group(function () {
                Route::get('/profile','index');
                Route::post('/profile/{id}','update');
            });
            Route::controller(App\Http\Controllers\Teachers\dashboard\OnlineClassController::class)->group(function () {
                Route::get('/onlineClass','index');
                Route::get('/onlineClass/create','create');
                Route::get('/onlineClass/indirectCreate','indirectCreate');
                Route::post('/onlineClass','store');
                Route::post('/onlineClass/storeIndirect','storeIndirect');
                Route::post('/onlineClass/destroy/{id}','destroy');

                


            });
        });

});
