<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth:teacher,web' ]
    ], function(){ 
            Route::controller(App\Http\Controllers\Ajax\AjaxController::class)->group(function () {
                Route::get('/Get_classrooms/{id}','Get_classrooms');
                Route::get('/Get_Sections/{id}','Get_Sections');
            });
});