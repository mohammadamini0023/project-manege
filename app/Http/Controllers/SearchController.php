<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $users = User::where('last_name', 'LIKE', '%' . $request->search . "%")
                ->orWhere('phone', 'LIKE', '%' . $request->search . "%")
                ->get();
            $vehicles = Vehicle::where('vin_number', 'LIKE', '%' . $request->search . "%")->get();
            if ($users) {
                $output .=
                    '<thead>' .
                    '<tr>' .
                    '<th>ID</th>' .
                    '<th>Phone</th>' .
                    '<th>Name & Family</th>' .
                    '<th>Edit</th>' .
                    '</tr>' .
                    '</thead>';
                foreach ($users as $key => $user) {
                    $output .=
                        ' <tbody>' .
                        '<tr>' .
                        '<td>' . $user->id . '</td>' .
                        '<td>' . $user->phone . '</td>' .
                        '<td>' . $user->first_name . ' ' . $user->last_name . '</td>' .
                        '<td> <a href="' . route('admin.user.edit', ['user_id' => $user->id]) . '" class="btn btn-info btn-fill pull-right">Edit</a></td>' .
                        '</tr>' .
                        '</tbody>';
                }
            }
            if ($vehicles) {
                    $output .=
                        '<thead>' .
                        '<tr>' .
                        '<th>ID</th>' .
                        '<th>Vin Number</th>' .
                        '<th>Number Plates</th>' .
                        '<th>Edit</th>' .
                        '</tr>' .
                        '</thead>';
                    foreach ($vehicles as $key => $vehicle) {
                        $output .=
                            ' <tbody>' .
                            '<tr>' .
                            '<td>' . $vehicle->id . '</td>' .
                            '<td>' . $vehicle->vin_number . '</td>' .
                            '<td>' . $vehicle->number_plates . '</td>' .
                            '<td> <a href="' . route('admin.vehicle.edit', ['user_id' => $vehicle->id]) . '" class="btn btn-info btn-fill pull-right">Edit</a></td>' .
                            '</tr>' .
                            '</tbody>';
                    }
                }
                return Response($output);
            }
        return view('pages.dashboard.search-index');
    }
}
