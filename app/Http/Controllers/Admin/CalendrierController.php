<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\Inscription;
use App\Models\User;
use App\Models\Enseignant;

class CalendrierController extends Controller
{
    public function index()
    {
        $student = Inscription::where('statut', 'Eleve')->get()->count();
        $classes = Classe::count();
        $users = User::count();
        $enseignants = Enseignant::count();

        $events = array();
        $bookings = Booking::all();
        foreach($bookings as $booking)
            $events[] = [
                'id' => $booking->id,
                'title' => $booking->title,
                'start' => $booking->start_date,
                'end' => $booking->end_date,
            ];
        // return $bookings;
        return view('admin.calendrier.index', compact('events', 'student', 'enseignants', 'classes', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string'
        ]);

        $booking = Booking::create([
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return response()->json($booking);
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::find($id);
        if(! $booking){
            return response()->json([
                'error' => 'unable to locate the event'
            ], 404);

        }
        $booking->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,

        ]);
        return response()->json('Event updated');
    }
}
