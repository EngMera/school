<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth:student' ]
    ], function(){ 
       
        Route::get('/student/dashboard',function(){
            return view('pages.Students.dashboard.dashboard');
        });
        
        Route::prefix('Student/dashboard')->group( function () {
             Route::controller(App\Http\Controllers\Students\dashboard\ExamController::class)->group(function () {
                Route::get('/exams','index');
                Route::post('/exams','store');
                Route::get('/exams/show/{id}','show');
            });
            Route::controller(App\Http\Controllers\Students\dashboard\ProfileController::class)->group(function () {
                Route::get('/profile','index');
                Route::post('/exams','store');
                Route::put('/profile/{id}','update');
            });
        });

       
});
