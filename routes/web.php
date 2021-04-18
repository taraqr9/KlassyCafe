<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/menu', function () {
    return view('menu');
});
Route::get('/chefs', function () {
    return view('chefs');
});
Route::get('/reservation',function(){
    return view('reservation');
});


Auth::routes();


Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
