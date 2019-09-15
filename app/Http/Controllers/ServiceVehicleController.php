<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceVehicle;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceVehicleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $service_vehicles = ServiceVehicle::orderBy('id', 'DESC')
            ->get();
        return view('pages.dashboard.service-vehicle-index', ['service_vehicles' => $service_vehicles]);
    }

    public function create()
    {
        $vehicles = Vehicle::orderBy('id', 'ASC')
            ->get();
        $services = Service::orderBy('id', 'ASC')
            ->get();
        return view('pages.dashboard.service-vehicle-create', ['vehicles' => $vehicles, 'services' => $services]);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'vehicle'        => ['required', 'string', 'max:255'],
            'current_miles'  => ['required', 'string', 'max:255'],
            'inv'  => ['required', 'string', 'max:255'],
            'service'        => ['required', 'string', 'max:255']
        ])->validate();

        $service = ServiceVehicle::create([
            'vehicle_id' => $request->input('vehicle'),
            'service_id' => $request->input('service'),
            'inv'        => $request->input('inv'),
            'current_miles' => $request->input('current_miles'),
            'status' => ($request->input('status') == "on" ? 'uncompleted' : 'completed'),
        ]);
        if($service !== null)
            return redirect()->route('admin.serviceVehicle.index')->with('success', 'Successfully registered');

        return redirect()->route('admin.serviceVehicle.index')->withErrors('There was a problem sending the information. Please try again');
    }

    public function edit($service_vehicle_id)
    {
        $vehicles = Vehicle::orderBy('id', 'ASC')
            ->get();
        $services = Service::orderBy('id', 'ASC')
            ->get();
        $serviceVehicle = ServiceVehicle::where('id', $service_vehicle_id)
            ->first();
        return view('pages.dashboard.service-vehicle-edit',
            ['serviceVehicle' => $serviceVehicle,
                'vehicles' => $vehicles,
                'services' => $services]);
    }

    public function update(Request $request, $service_vehicle_id)
    {
        Validator::make($request->all(), [
            'vehicle'        => ['required', 'string', 'max:255'],
            'current_miles'  => ['required', 'string', 'max:255'],
            'inv'            => ['required', 'string', 'max:255'],
            'service'        => ['required', 'string', 'max:255']
        ])->validate();

        $service = ServiceVehicle::where('id', $service_vehicle_id)
            ->update([
            'vehicle_id' => $request->input('vehicle'),
            'service_id' => $request->input('service'),
            'inv'        => $request->input('inv'),
            'current_miles' => $request->input('current_miles'),
            'status' => ($request->input('status') == "on" ? 'uncompleted' : 'completed'),
        ]);
        if($service == true)
            return redirect()->route('admin.serviceVehicle.index')->with('success', 'Successfully Update Service Vehicle');

        return redirect()->route('admin.serviceVehicle.edit')->withErrors('There was a problem sending the information. Please try again');
    }

    public function delete($service_vehicle_id)
    {
        $deleteServiceVehicle = ServiceVehicle::where('id', $service_vehicle_id)->delete();
        if($deleteServiceVehicle == true)
            return redirect()->route('admin.serviceVehicle.index')->with('success', 'service vehicle successfully deleted.');
        return redirect()->route('admin.serviceVehicle.index')->withErrors('There was a problem sending the information. Please try again');
    }
}
