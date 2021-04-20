<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function destroy(Request $id)
    {
        if($id->approveReservation){
            $approve = Reservation::find($id->approveReservation);
            $approve->status = '1';
            $approve->save();
            return Redirect::to('adminreservation')->with('message', 'Reservation Approved Successfully');
        }
        elseif($id->deleteReservation){
            $delete = Reservation::find($id->deleteReservation);
            $delete->delete();
            
            return Redirect::to('adminreservation')->with('message', 'Reservation Deleted Successfully');
        }
        
    }
}


