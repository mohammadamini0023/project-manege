@extends('layouts.dashboard')
@section('title','List Of Service Vehicles')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('modules.success')
                    @include('modules.error')
                    <a href="{{ route('admin.serviceVehicle.create') }}" class="btn btn-success btn-fill pull-right">Create Service Vehicle</a>
                    <div class="card card-plain table-plain-bg">
                        <div class="card-header ">
                            <h4 class="card-title">List Information Service Vehicles</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <th>ID</th>
                                <th>Owner</th>
                                <th>Phone</th>
                                <th>Vin Number</th>
                                <th>Plates</th>
                                <th>Service</th>
                                <th>Current Miles</th>
                                <th>Status</th>
                                <th>action</th>
                                </thead>
                                <tbody>
                                @foreach($service_vehicles as $service_vehicle)
                                    <tr>
                                        <td>{{ $service_vehicle->id }}</td>
                                        <td>{{$service_vehicle->vehicle()->user()->first_name . ' ' .
                                             $service_vehicle->vehicle()->user()->first_name}}</td>
                                        <td>{{ $service_vehicle->vehicle()->user()->phone }}</td>
                                        <td>{{ $service_vehicle->vehicle()->vin_number }}</td>
                                        <td>{{ $service_vehicle->vehicle()->number_plates }}</td>
                                        <td>{{ $service_vehicle->service()->name }}</td>
                                        <td>{{ $service_vehicle->current_miles }}</td>
                                        <td>{{ $service_vehicle->status }}</td>
                                        <td>
                                            <a href="{{ route('admin.serviceVehicle.edit', ['service_vehicle_id' => $service_vehicle->id]) }}" class="btn btn-info btn-fill pull-right">Edit</a>
                                            <a href="{{ route('admin.serviceVehicle.delete', ['service_vehicle_id' => $service_vehicle->id]) }}" class="btn btn-danger btn-fill pull-right ml-1">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
