<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;

class VehicleModelController extends Controller
{
    public function viewModels()
    {
        $models = Vehicle::select('model', \DB::raw('count(*) as vehicle_count'))
            ->groupBy('model')
            ->havingRaw('count(*) > 0')
            ->get();

        return view('vehicle.models', compact('models'));
    }
}
