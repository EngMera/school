<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;




Route::get('/',[App\Http\Controllers\HomeController::class,'index'])->name('selection');

Auth::routes();

Route::get('/login/{type}',[LoginController::class,'loginForm'])->middleware('guest')->name('login.show');
Route::post('/login',[LoginController::class,'login'])->name('login');
Route::get('/logout/{type}',[LoginController::class,'logout'])->name('logout');


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
    ], function(){ 
        
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

        Route::controller(App\Http\Controllers\Grades\GradeController::class)->group(function () {
            Route::get('/grades', 'index');
            Route::post('/grades', 'store');
            Route::patch('/grades/{gradeId}', 'update');
            Route::get('/grades/{gradeId}/delete', 'delete');
        });

        Route::controller(App\Http\Controllers\Classrooms\ClassroomController::class)->group(function () {
            Route::get('/classrooms','index');
            Route::post('/classrooms', 'store');
            Route::patch('/classrooms/{classroomId}/update', 'update');
            Route::get('/classrooms/{classroomId}/delete', 'destroy');
            Route::post('/classrooms/deleteAll', 'destroyAll');
            Route::post('/classrooms/filter', 'filterBy');
        });
        
        Route::controller(App\Http\Controllers\Sections\SectionController::class)->group(function () {
            Route::get('/sections','index');
            Route::get('/classes/{id}','getclasses');
            Route::post('/sections','store');
            Route::patch('/sections/{sectionId}', 'update');
            Route::get('/sections/{sectionId}/delete', 'destroy');
        });
        

        Route::view('/my-parents', 'livewire.show-form');

        Route::controller(App\Http\Controllers\Teachers\TeacherController::class)->group(function () {
            Route::get('/teachers','index');
            Route::get('/teachers/create','create');
            Route::post('/teachers','store');
            Route::get('/teachers/{id}/edit','edit');
            Route::patch('/teachers','update');
            Route::get('/teachers/{id}','destroy');
        });
        Route::controller(App\Http\Controllers\Students\StudentController::class)->group(function () {
            Route::get('/students','index');
            Route::get('/students/create','create');
            Route::post('/students','Store_Student');
            Route::get('/students/{id}/edit','Edit_Student');
            Route::put('/students/update','Update_Student');
            Route::get('/students/{id}','Delete_Student');
            Route::get('/students/{id}/show','Show_Student');
            Route::post('/students/Upload_attachment','Upload_attachment');
            Route::post('/students/Delete_attachment','Delete_attachment');
            Route::get('Download_attachment/{studentsname}/{filename}','Download_attachment');

        });
        Route::controller(App\Http\Controllers\Students\PromotionController::class)->group(function () {
            Route::get('/promotions','index');
            Route::post('/promotions','store');
            Route::get('/promotions/create','create');
            Route::post('/promotions/delete','destroy');
        });
        Route::controller(App\Http\Controllers\Students\GraduatedController::class)->group(function () {
            Route::get('/graduated','index');
            Route::get('/graduated/create','create');
            Route::post('/graduated','SoftDelete');
            Route::put('/graduated','ReturnData');
            Route::post('/ graduated/destroy','destroy');
        });
        Route::controller(App\Http\Controllers\Students\FeeController::class)->group(function () {
            Route::get('/fees','index');
            Route::get('/fees/create','create');
            Route::post('/fees','store');
            Route::get('/fees/edit/{id}','edit');
            Route::put('/fees/update','update');
            Route::post('/fees/destroy','destroy');
        });
        Route::controller(App\Http\Controllers\Students\FeeInvoiceController::class)->group(function () {
            Route::get('/feeInvoice','index');
            Route::get('/feeInvoice/show/{id}','show');
            Route::post('/feeInvoice','store');
            Route::get('/feeInvoice/edit/{id}','edit');
            Route::put('/feeInvoice','update');
            Route::post('/feeInvoice/destroy','destroy');
        });
        Route::controller(App\Http\Controllers\Students\ReceiptController::class)->group(function () {
            Route::get('/receipt','index');
            Route::get('/receipt/show/{id}','show');
            Route::post('/receipt','store');
            Route::get('/receipt/edit/{id}','edit');
            Route::put('/receipt','update');
            Route::post('/receipt/destroy','destroy');
        });      
       Route::controller(App\Http\Controllers\Students\ProcessingFeeController::class)->group(function () {
            Route::get('/processing','index');
            Route::get('/processing/show/{id}','show');
            Route::post('/processing','store');
            Route::get('/processing/edit/{id}','edit');
            Route::put('/processing','update');
            Route::post('/processing/destroy','destroy');

        });
        Route::controller(App\Http\Controllers\Students\PaymentController::class)->group(function () {
            Route::get('/payment','index');
            Route::get('/payment/show/{id}','show');
            Route::post('/payment','store');
            Route::get('/payment/edit/{id}','edit');
            Route::put('/payment','update');
            Route::post('/payment/destroy','destroy');
        });
        Route::controller(App\Http\Controllers\Students\AttendanceController::class)->group(function () {
            Route::get('/attendance','index');
            Route::get('/attendance/show/{id}','show');
            Route::post('/attendance','store');
        });
        Route::controller(App\Http\Controllers\Subjects\SubjectController::class)->group(function () {
            Route::get('/subject','index');
            Route::get('/subject/create','create');
            Route::post('/subject','store');
            Route::get('/subject/edit/{id}','edit');
            Route::put('/subject','update');
            Route::post('/subject/destroy','destroy');
        });

        Route::controller(App\Http\Controllers\Exams\ExamController::class)->group(function () {
            Route::get('/exams','index');
            Route::get('/exams/create','create');
            Route::post('/exams','store');
            Route::get('/exams/edit/{id}','edit');
            Route::put('/exams','update');
            Route::post('/exams/destroy','destroy');
        });
        Route::controller(App\Http\Controllers\Quizzes\QuizController::class)->group(function () {
            Route::get('/quiz','index');
            Route::get('/quiz/create','create');
            Route::post('/quiz','store');
            Route::get('/quiz/edit/{id}','edit');
            Route::put('/quiz','update');
            Route::post('/quiz/destroy','destroy');
        });
        Route::controller(App\Http\Controllers\Questions\QuestionController::class)->group(function () {
            Route::get('/questions','index');
            Route::get('/questions/create','create');
            Route::post('/questions','store');
            Route::get('/questions/edit/{id}','edit');
            Route::put('/questions','update');
            Route::post('/questions/destroy','destroy');
        });
        Route::controller(App\Http\Controllers\Zoom\OnlineClassController::class)->group(function () {
            Route::get('/online','index');
            Route::get('/online/create','create');
            Route::get('/online/indirectCreate','indirectCreate');

            Route::post('/online','store');
            Route::post('/online/storeIndirect','storeIndirect');

            Route::post('/online/destroy','destroy');

        });
        Route::controller(App\Http\Controllers\Library\LibraryController::class)->group(function () {
            Route::get('/library','index');
            Route::get('/library/create','create');
            Route::post('/library','store');
            Route::get('/library/edit/{id}','edit');
            Route::put('/library','update');
            Route::post('/library/destroy','destroy');
            Route::get('/downloadAttachment/{filename}','downloadAttachment');
        });
        Route::controller(App\Http\Controllers\Settings\SettingController::class)->group(function () {
            Route::get('/settings','index');
            Route::put('/settings','update');


        });
});
