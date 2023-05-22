<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CoursesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PagesController::class, 'index']);

Route::resource('Courses', CourseController::class)->parameters([
    'Courses' => 'course',
]);

Route::resource('CoursesAll', CoursesController::class)->parameters([
    'CoursesAll' => 'course',
]);





Auth::routes();

