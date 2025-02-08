<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleHistoryController extends Controller
{
    public function viewHistoryForm()
    {
        return view('vehicle.history-form');
    }

    public function viewHistory(Request $request)
    {
        $validated = $request->validate([
            'unique_number' => 'required|string|max:255|regex:/^AUTO-\d{3}[a-zA-Z]{3}$/',
        ]);

        $vehicle = Vehicle::where('unique_number', $validated['unique_number'])->firstOrFail();
        $registrations = $vehicle->registrations()->with('owner')->get();

        return view('vehicle.history', compact('vehicle', 'registrations'));
    }
}