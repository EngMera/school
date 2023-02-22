<?php

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth:parent' ]
    ], function(){ 

        Route::get('/parent/dashboard',function(){
            $sons = Student::where('parent_id',auth()->user()->id)->get();
            return view('pages.parents.dashboard',compact('sons'));
        });

        Route::prefix('Parent/dashboard')->group( function () {
            Route::controller(App\Http\Controllers\Parents\dashboard\ChildrenController::class)->group(function () {
                Route::get('children','index');
                Route::get('results/{id}','results');
                Route::get('attendances','attendances');
                Route::post('attendances','attendanceSearch');
                Route::get('fees','fees');
                Route::get('receipt/{id}','receiptStudent');
                Route::get('profile','profile');
                Route::post('profile/{id}','update');




                
            });
       });

});
