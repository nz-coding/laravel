<?php

use App\Http\Livewire\Crud\AddStudentComponent;
use App\Http\Livewire\Crud\EditStudentComponent;
use App\Http\Livewire\Crud\IndexComponent;
use App\Http\Livewire\Product\AddProductComponent;
use App\Http\Livewire\Product\EditProductComponent;
use App\Http\Livewire\Product\ProductComponent;
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

Route::get('products', ProductComponent::class)->name('allProducts');
Route::get('products/add', AddProductComponent::class)->name('addProducts');
Route::get('products/edit/{id}', EditProductComponent::class)->name('editProducts');
