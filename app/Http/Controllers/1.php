<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    
    public function store(Request $request){
        $user_id = Auth::user()->id;

        $reservation = new Reservation([
            'user_id' => $user_id,
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'guest_number' => $request['number-guests'],
            'reservation_date' => $request['date'],
            'reservation_time' => $request['time'],
            'phone' => $request['phone'],
            'message' => $request['message'],
            
            
        ]);
        $reservation->save();
        return view('/successful');
    }
}
