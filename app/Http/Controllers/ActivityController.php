<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceVehicle;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::take(20)->orderBy('created_at', 'DESC')->get();
        $vehicles = Vehicle::take(20)->orderBy('created_at', 'DESC')->get();
        $services = Service::take(20)->orderBy('created_at', 'DESC')->get();
        $service_vehicles = ServiceVehicle::take(20)->get();
        return view('pages.dashboard.activity',
        ['users' => $users,
           'vehicles' => $vehicles,
           'services' => $services,
           'service_vehicles' => $service_vehicles
        ]);
    }
}
