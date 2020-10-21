<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function () {
    return view('test');
});
Route::get('/template', function () {
    return view('template');
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function (){
    Route::resource('professors','Admin\ProfessorController');
    Route::resource('rooms','Admin\RoomController');
    Route::resource('timeslots','Admin\TimeSlotController');
    Route::resource('courses','Admin\CourseController');
    Route::resource('timetabelings','Admin\TimeTabelingController');
    Route::resource('groups','Admin\GroupController');
    Route::resource('days','Admin\DayController');
    Route::resource('years','Admin\YearController');
    Route::resource('sections','Admin\SectionController');
});
Route::get('/new_population', 'Controller@new_population')->middleware(['auth'])->name('new_population');
Route::get('/best_timetabeling', 'Controller@best_timetabeling')->middleware(['auth'])->name('best_timetabeling');
Route::get('/final_timetabeling', 'Controller@final_timetabeling')->middleware(['auth'])->name('final_timetabeling');
Route::get('/admin/group_timetabeling/{id}', 'Controller@group_timetabeling')->middleware(['auth'])->name('group_timetabeling');
Route::get('/admin/section_timetabeling/{id}', 'Controller@section_timetabeling')->middleware(['auth'])->name('section_timetabeling');
Route::get('/professor_courses/{id}', 'Controller@professor_courses')->middleware(['auth'])->name('professor_courses');
Route::get('/attache_professor_course', 'Controller@attache_professor_course')->middleware(['auth'])->name('attache_professor_course');
Route::get('/detache_professor_course', 'Controller@detache_professor_course')->middleware(['auth'])->name('detache_professor_course');
Route::get('/admin/professor_timetabeling/{id}', 'Controller@professor_timetabeling')->middleware(['auth'])->name('professor_timetabeling');
