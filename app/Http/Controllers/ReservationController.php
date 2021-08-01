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
        // $user_id = Auth::user()->id;

        $reservation = new Reservation([
            'user_id' => Auth::user()->id,
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

    public function downloadPdf()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_reservation_data_to_html());
        return $pdf->stream();
    }

    function convert_reservation_data_to_html()
    {
        $myReservation = Reservation::all()->sortByDesc('id')->where('user_id', Auth::user()->id);
        $output = '
    <h3 align="center">Customer Data</h3>
    <table width="100%" style="border-collapse: collapse; border: 0px;">
    <tr>
    <th style="border: 1px solid; padding:2px;">Name</th>
    <th style="border: 1px solid; padding:2px;">Email</th>
    <th style="border: 1px solid; padding:2px;">Phone</th>
    <th style="border: 1px solid; padding:2px;">Guest Number</th>
    <th style="border: 1px solid; padding:2px;">Date</th>
    <th style="border: 1px solid; padding:2px;">Time</th>
    <th style="border: 1px solid; padding:2px;">Message</th>
    </tr>
    ';
        foreach ($myReservation as $reservation) {
            $output .= '
        <tr>
        <td style="border: 1px solid; padding:12px;">' . $reservation->name . '</td>
        <td style="border: 1px solid; padding:12px;">' . $reservation->email . '</td>
        <td style="border: 1px solid; padding:12px;">' . $reservation->phone . '</td>
        <td style="border: 1px solid; padding:12px;">' . $reservation->guest_number . '</td>
        <td style="border: 1px solid; padding:12px;">' . $reservation->reservation_date . '</td>
        <td style="border: 1px solid; padding:12px;">' . $reservation->reservation_time . '</td>
        <td style="border: 1px solid; padding:12px;">' . $reservation->message . '</td>
        </tr>
        ';
        }
        $output .= '</table>';
        return $output;
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
