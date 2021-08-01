<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Models\Reservation;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
Route::get('/reservation', function () {
    return view('reservation');
});

Auth::routes();
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/myreservation', [ReservationController::class, 'store']);
Route::get('/download', [ReservationController::class, 'downloadPdf']);

Route::get('/myreservation', function () {
    if (Auth::check()) {
        $myAllReservation = Reservation::all()->sortByDesc('id')->where('user_id', Auth::user()->id);
        return view('myreservation', compact('myAllReservation'));
    }
    else{
        return view('/reservation');
    }
});

Route::post('/deleteReservation', [ReservationController::class, 'destroy']);

Route::get('/adminreservation',function(){
    $allRequest = Reservation::all();
    return view('admin.reservation',compact('allRequest'));
});

Route::post('/admindelete',[AdminController::class,'destroy']);
