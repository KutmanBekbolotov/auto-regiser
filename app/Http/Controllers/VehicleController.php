<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Owner;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VehicleController extends Controller
{
    public function index()
    {
        return view('vehicle.index');
    }

    public function showForm($vehicle_id = null)
    {
        $vehicle = null;
        if ($vehicle_id) {
            $vehicle = Vehicle::find($vehicle_id);
            if (!$vehicle) {
                abort(404, 'Vehicle not found');
            }
        }

        return view('form', compact('vehicle', 'vehicle_id'));
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
        ]);

        $unique_number = 'AUTO-' . rand(100, 999) . strtolower(Str::random(3));

        $owner = Owner::create([
            'full_name' => $validated['full_name']
        ]);

        $vehicle = Vehicle::create([
            'unique_number' => $unique_number,
            'brand' => $validated['brand'],
            'model' => $validated['model']
        ]);

        Registration::create([
            'vehicle_id' => $vehicle->id,
            'owner_id' => $owner->id,
            'registration_date' => now()
        ]);

        return redirect()->route('vehicle.register')->with('message', 'Автомобиль успешно зарегистрирован. Номер авто: ' . $unique_number);
    }

    public function reRegister(Request $request)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'unique_number' => 'required|string|max:255|regex:/^AUTO-\d{3}[a-zA-Z]{3}$/',
                'owner_full_name' => 'required|string|max:255',
                'new_owner_full_name' => 'required|string|max:255',
            ]);

            $vehicle = Vehicle::where('unique_number', $validated['unique_number'])->first();

            if (!$vehicle) {
                return back()->withErrors(['unique_number' => 'Автомобиль с таким номером не найден']);
            }

            $current_owner = Owner::where('full_name', $validated['owner_full_name'])->first();
            if (!$current_owner || !$vehicle->registrations()->where('owner_id', $current_owner->id)->exists()) {
                return back()->withErrors(['owner_full_name' => 'Данный автомобиль не зарегистрирован на указанного владельца']);
            }

            $new_owner = Owner::create([
                'full_name' => $validated['new_owner_full_name'],
            ]);

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

        return view('vehicle.re-register');
    }

    public function reRegisterSuccess()
    {
        return view('vehicle.re-register-success');
    }

    public function viewHistoryForm()
    {
        return view('vehicle.history-form');
    }

    public function viewHistory(Request $request)
    {
        $validated = $request->validate([
            'unique_number' => 'required|string|max:255|regex:/^AUTO-\d{3}[a-zA-Z]{3}$/',
        ]);

        $vehicle = Vehicle::where('unique_number', $validated['unique_number'])->first();

        if (!$vehicle) {
            return back()->withErrors(['unique_number' => 'Автомобиль с таким номером не найден']);
        }

        $registrations = $vehicle->registrations()->with('owner')->get();

        return view('vehicle.history', compact('vehicle', 'registrations'));
    }

    public function viewModels()
    {
        $models = Vehicle::select('model', \DB::raw('count(*) as vehicle_count'))
            ->groupBy('model')
            ->havingRaw('count(*) > 0')
            ->get();

        return view('vehicle.models', compact('models'));
    }
}
