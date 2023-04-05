<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GeneralController;
use Illuminate\Support\Facades\Auth;

// "PAGINATION_COUNT" constant = 10 , This means that the "number of records" in "each page" will be "10 records"
define('PAGINATION_COUNT',10);

// Multi-Languages Route
Route::get('change-language/{locale}',[GeneralController::class,'changeLanguage'])->name('frontend_change_locale');


// "Login Form" Page
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
// +++++++++++++++++++++++ Spatie Permission Routes +++++++++++++++++++++
Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', UserController::class);
});

// +++++++++++++ Stop "Register Form" +++++++++++++
Auth::routes(['register'=>false]);

// +++++++++++++++++ "companies" route +++++++++++++++++
Route::resource('companies' , CompanyController::class);
// "add company" route
Route::get('companies/create' , [CompanyController::class , 'create']);
// +++++++++++++++++ "employees" route +++++++++++++++++
Route::resource('employees' , EmployeeController::class);
// "add company" route
Route::get('employees/create' , [EmployeeController::class , 'create'])->name('employees.create');

// "Home" route
Route::get('/home' , [HomeController::class , 'index'])->name('home');

// "index" route
Route::get('/{page}' , [AdminController::class , 'index']);


