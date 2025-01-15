<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index() {
        $appointments = Appointment::with('service', 'user')->get();
        return view('appointments.index', compact('appointments'));
    }

    public function create() {
        $services = Service::all();
        return view('appointments.create', compact('services'));
    }

    public function store(Request $request) {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'appointment_date' => 'required|date|after:now',
        ]);

        Appointment::create([
            'user_id' => auth()->id(),
            'service_id' => $request->service_id,
            'appointment_date' => $request->appointment_date,
            'status' => 'pending',
        ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment booked successfully.');
    }
}
