<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Reservation;


class ReservationController extends Controller
{

public function index()
    {
        return view("booktable");
    }

    public function reservations()
    {
        $reservations = Reservation::all();
        return view('reservations', ['reservations' => $reservations]);
    }
    public function storetable(Request $request)
{
    $reservation = Reservation::create([
        'date' => $request->input('date'),
        'time' => $request->input('time'),
        'r_name' => $request->input('r_name'),
        'phone_no' => $request->input('phone_no'),
        'guest' => $request->input('guest')
    ]);

    return redirect()->back()->with('success', 'Reservation has been made successfully!');
}

public function store(Request $request)
{
    $reservation = new Reservation;

    $reservation->r_name = $request->input('r_name');
    $reservation->date = $request->input('date');
    $reservation->time = $request->input('time');
    $reservation->guest = $request->input('guest');
    $reservation->phone_no = $request->input('phone_no');

    $reservation->save();

    return redirect()->back()->with('success', 'Reservation has been inserted successfully!');
}


public function __construct()
{
    $this->middleware('auth')->only('storetable');
}

public function deletereservation($id)
{
    $reservation = Reservation::find($id);

    if(!$reservation){
        return redirect()->back()->with('error', 'Reservation not found!');
    }

    $reservation->delete();

    return redirect()->back()->with('success', 'Reservation has been deleted successfully!');
}

// public function editReservation($id)
// {
//     $reservation = Reservation::find($id);

//     if(!$reservation){
//         return redirect()->back()->with('error', 'Reservation not found!');
//     }

//     return view('edit_reservation')->with('reservation', $reservation);
// }
public function updatereservation(Request $request, $id)
{
    $reservation = Reservation::find($id);

    if(!$reservation){
        return redirect()->back()->with('error', 'Reservation not found!');
    }

    $reservation->r_name = $request->input('r_name');
    $reservation->date = $request->input('date');
    $reservation->time = $request->input('time');
    $reservation->guest = $request->input('guest');
    $reservation->phone_no = $request->input('phone_no');
    $reservation->save();

    return redirect()->back()->with('success', 'Reservation has been updated successfully!');
}

}