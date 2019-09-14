@extends('layouts.dashboard')
@section('title','List Of Vehicles')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('modules.success')
                    @include('modules.error')
                    <a href="{{ route('admin.vehicle.create') }}" class="btn btn-success btn-fill pull-right">Create Vehicle</a>
                    <div class="card card-plain table-plain-bg">
                        <div class="card-header ">
                            <h4 class="card-title">List Information Vehicles</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <th>ID</th>
                                <th>Phone Owner</th>
                                <th>Vin Number</th>
                                <th>Make/Model</th>
                                <th>License Number</th>
                                <th>Color</th>
                                <th>Year</th>
                                <th>Last Service</th>
                                <th>action</th>
                                </thead>
                                <tbody>
                                @foreach($vehicles as $vehicle)
                                    <tr>
                                        <td>{{ $vehicle->id }}</td>
                                        <td>{{ $vehicle->user()->phone }}</td>
                                        <td>{{ $vehicle->vin_number }}</td>
                                        <td>{{ $vehicle->make . '/' . $vehicle->model }}</td>
                                        <td>{{ $vehicle->number_plates }}</td>
                                        <td>{{ $vehicle->color }}</td>
                                        <td>{{ $vehicle->year }}</td>
                                        <td>{{ ($vehicle->service_vehicle() == null) ? '-' : $vehicle->service_vehicle()->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.vehicle.status', ['vehicle_id' => $vehicle->id]) }}" class="btn btn-success btn-fill pull-right">Status</a>
                                            <a href="{{ route('admin.vehicle.edit', ['vehicle_id' => $vehicle->id]) }}" class="btn btn-info btn-fill pull-right ml-1">Edit</a>
                                            <a href="{{ route('admin.vehicle.delete', ['vehicle_id' => $vehicle->id]) }}" class="btn btn-danger btn-fill pull-right ml-1">Delete</a>
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
