<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $services = Service::orderBy('id', 'DESC')
            ->get();
        return view('pages.dashboard.service-index', ['services' => $services]);
    }

    public function create()
    {
        return view('pages.dashboard.service-create');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name'      => ['required', 'string', 'max:255'],
            'miles'     => ['required', 'numeric'],
        ])->validate();

        $service = Service::create([
            'name' => $request->input('name'),
            'duration' => $request->input('duration'),
            'miles' => $request->input('miles'),
            'price' => $request->input('price')
        ]);
        if($service !== null)
            return redirect()->route('admin.service.index')->with('success', 'Successfully registered');

        return redirect()->route('admin.service.index')->withErrors('There was a problem sending the information. Please try again');
    }

    public function edit($service_id)
    {
        $service = Service::where('id', $service_id)->first();
        return view('pages.dashboard.service-edit', ['service' => $service]);
    }

    public function update(Request $request, $service_id)
    {
        Validator::make($request->all(), [
            'name'      => ['required', 'string', 'max:255'],
            'miles'     => ['required', 'numeric'],
        ])->validate();

        $service = Service::where('id', $service_id)
        ->update([
            'name' => $request->input('name'),
            'duration' => $request->input('duration'),
            'miles' => $request->input('miles'),
            'price' => $request->input('price')
        ]);
        if($service == true)
            return redirect()->route('admin.service.index')->with('success', 'Service info successfully edited.');

        return redirect()->route('admin.service.index')->withErrors('There was a problem sending the information. Please try again');
    }

    public function delete($service_id)
    {
        $deleteService = Service::where('id', $service_id)->delete();
        if($deleteService == true)
            return redirect()->route('admin.service.index')->with('success', 'service info successfully deleted.');
        return redirect()->route('admin.service.index')->withErrors('There was a problem sending the information. Please try again');
    }
}
