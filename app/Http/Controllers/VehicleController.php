<?php

namespace App\Http\Controllers;

use App\Models\ServiceVehicle;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;

class VehicleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $vehicles = Vehicle::orderBy('id', 'ASC')
            ->get();
        return view('pages.dashboard.vehicle-index', ['vehicles' => $vehicles]);
    }

    public function create()
    {
        $users = User::orderBy('id', 'ASC')
            ->get();
        return view('pages.dashboard.vehicle-create', ['users' => $users]);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'user_id'    => ['required', 'max:255'],
            'vin_number' => ['required', 'string', 'max:255'],
            'make'       => ['required', 'string', 'max:255'],
            'model'      => ['required', 'string', 'max:255'],
            'number_plates'=> ['required', 'string', 'max:255'],
            'color'        => ['required', 'string', 'max:255'],
            'year'         => ['required', 'string', 'max:255'],
        ])->validate();

        $vehicle = Vehicle::create([
            'user_id' => (int)$request->input('user_id'),
            'vin_number' => $request->input('vin_number'),
            'make' => $request->input('make'),
            'model' => $request->input('model'),
            'number_plates' => $request->input('number_plates'),
            'color' => $request->input('color'),
            'year' => $request->input('year'),
        ]);
        if($vehicle !== null)
            return redirect()->route('admin.vehicle.index')->with('success', 'Successfully registered Vehicle');

        return redirect()->route('admin.vehicle.index')->withErrors('There was a problem sending the information. Please try again');
    }

    public function edit($vehicle_id)
    {
        $vehicle = Vehicle::where('id', $vehicle_id)
            ->first();
        $users = User::orderBy('id', 'ASC')->get();
        return view('pages.dashboard.vehicle-edit', ['vehicle' => $vehicle, 'users' => $users]);
    }

    public function update(Request $request, $vehicle_id)
    {
        Validator::make($request->all(), [
            'user_id'    => ['required', 'max:255'],
            'vin_number' => ['required', 'string', 'max:255'],
            'make'       => ['required', 'string', 'max:255'],
            'model'      => ['required', 'string', 'max:255'],
            'number_plates'=> ['required', 'string', 'max:255'],
            'color'        => ['required', 'string', 'max:255'],
            'year'         => ['required', 'string', 'max:255'],
        ])->validate();

        $vehicle = Vehicle::where('id', $vehicle_id)
        ->update([
            'user_id' => (int)$request->input('user_id'),
            'vin_number' => $request->input('vin_number'),
            'make' => $request->input('make'),
            'model' => $request->input('model'),
            'number_plates' => $request->input('number_plates'),
            'color' => $request->input('color'),
            'year' => $request->input('year')
        ]);
        if($vehicle == true)
            return redirect()->route('admin.vehicle.index')->with('success', 'Vehicle info successfully edited.');
        return redirect()->route('admin.vehicle.index')->withErrors('There was a problem sending the information. Please try again');
    }

    public function delete($vehicle_id)
    {
        $deleteVehicle = Vehicle::where('id', $vehicle_id)->delete();
        if($deleteVehicle == true)
            return redirect()->route('admin.vehicle.index')->with('success', 'Vehicle info successfully deleted.');
        return redirect()->route('admin.vehicle.index')->withErrors('There was a problem sending the information. Please try again');
    }

    public function status($vehicle_id)
    {
        $services_vehicle = ServiceVehicle::where('vehicle_id', $vehicle_id)
            ->select('service_id')
            ->distinct()
            ->get();
        $listServicesVehicle=[];
        foreach ($services_vehicle as $item){
            $listServicesVehicle[]=ServiceVehicle::where([
                ['service_id', $item->service_id],
                ['vehicle_id', $vehicle_id]
            ])
                ->orderBy('created_at', 'DESC')
                ->take(2)
                ->get();
        }
        return view('pages.dashboard.vehicle-status', ['listServicesVehicle' => $listServicesVehicle]);
    }
}
