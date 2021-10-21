<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AddClassController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get("/",HomeController::class)->name('home');
Route::get("single-student/{id}",[HomeController::class,'singleStudent'])->name('student.single');


Route::resource('students', StudentsController::class);
Route::get("import-more",[StudentsController::class,'ImportFile'])->name('import.more');
Route::post("import-more",[StudentsController::class,'Import'])->name('import.add');


Route::resource('subject', SubjectController::class);


Route::resource('classes', AddClassController::class);
Route::get("class-to-student",[AddClassController::class,'classToStudent'])->name('classTOstudent.add');
Route::get("single-class/{id}",[AddClassController::class,'singleClass'])->name('single.class');
Route::post("class-student",[AddClassController::class,'classStudent'])->name('clasStudent.add');

Route::get("subject_add",[ReportController::class,'subjectAdd'])->name('subject.add');
Route::get("selectstudent/{id}",[ReportController::class,'selectstudent'])->name('selectstudent');
Route::get("Import-Report",[ReportController::class,'reportImport'])->name('Import.Report');
Route::post("Import-add",[ReportController::class,'report'])->name('report.add');
Route::post("add_subject",[ReportController::class,'store'])->name('add.subject');
