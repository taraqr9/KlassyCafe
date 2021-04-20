<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request()->validate([
        //     'date'=>'required',
        //     'time'=>'required'
        // ]);
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
        return Redirect::to('myreservation')->with('addedReservation', 'Your Reservation Added Successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $id)
    {
        $delete = Reservation::find($id->deleteReservation);
        $delete->delete();
        
        return Redirect::to('myreservation')->with('message', 'Reservation Deleted Successfully');
    }
}
