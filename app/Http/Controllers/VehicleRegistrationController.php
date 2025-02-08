<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Owner;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VehicleRegistrationController extends Controller
{
    public function showForm()
    {
        return view('vehicle.register-form'); 
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
        ]);

        $unique_number = 'AUTO-' . rand(100, 999) . strtoupper(Str::random(3));

        $owner = Owner::create(['full_name' => $validated['full_name']]);

        $vehicle = Vehicle::create([
            'unique_number' => $unique_number,
            'brand' => $validated['brand'],
            'model' => $validated['model']
        ]);

        Registration::create([
            'vehicle_id' => $vehicle->id,
            'owner_id' => $owner->id,
            'registration_date' => now(),
        ]);

        return redirect()->route('vehicle.register')->with('message', 'Автомобиль успешно зарегистрирован. Номер авто: ' . $unique_number);
    }

    public function reRegisterForm()
    {
        return view('vehicle.re-register-form'); 
    }

    public function reRegister(Request $request)
    {

        $validated = $request->validate([
            'unique_number' => 'required|string|max:255|regex:/^AUTO-\d{3}[a-zA-Z]{3}$/',
            'owner_full_name' => 'required|string|max:255',
            'new_owner_full_name' => 'required|string|max:255',
        ]);

        $vehicle = Vehicle::where('unique_number', $validated['unique_number'])->firstOrFail();

        $current_owner = Owner::where('full_name', $validated['owner_full_name'])->firstOrFail();

        if (!$vehicle->registrations()->where('owner_id', $current_owner->id)->exists()) {
            return back()->withErrors(['owner_full_name' => 'Данный автомобиль не зарегистрирован на указанного владельца']);
        }

        $new_owner = Owner::create(['full_name' => $validated['new_owner_full_name']]);

        Registration::create([
            'vehicle_id' => $vehicle->id,
            'owner_id' => $new_owner->id,
            'registration_date' => now(),
        ]);

        return redirect()->route('vehicle.re-register.success')->with([
            'new_owner' => $new_owner->full_name,
            'unique_number' => $vehicle->unique_number
        ]);
    }

    public function reRegisterSuccess()
    {
        return view('vehicle.re-register-success');  
    }
}
