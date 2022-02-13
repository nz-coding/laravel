<?php

use App\Http\Livewire\Crud\AddStudentComponent;
use App\Http\Livewire\Crud\EditStudentComponent;
use App\Http\Livewire\Crud\IndexComponent;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('students', IndexComponent::class)->name('students');
Route::get('add-student', AddStudentComponent::class)->name('addStudent');
Route::get('edit-student/{id}', EditStudentComponent::class)->name('editStudent');