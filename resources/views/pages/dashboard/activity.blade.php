@extends('layouts.dashboard')
@section('title','Recent Activity')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-plain table-plain-bg">
                        <div class="card-header ">
                            <h4 class="card-title">Recent Activity</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <th>ID</th>
                                <th>Name & Family</th>
                                <th>created_at</th>
                                <th>Updated_at</th>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>{{ $user->updated_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>

                                <thead>
                                <th>ID</th>
                                <th>Vin Number</th>
                                <th>created_at</th>
                                <th>Updated_at</th>
                                </thead>
                                <tbody>
                                @foreach($vehicles as $vehicle)
                                    <tr>
                                        <td>{{ $vehicle->id }}</td>
                                        <td>{{ $vehicle->vin_number }}</td>
                                        <td>{{ $vehicle->created_at }}</td>
                                        <td>{{ $vehicle->updated_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>

                                <thead>
                                <th>ID</th>
                                <th>Service Name</th>
                                <th>created_at</th>
                                <th>Updated_at</th>
                                </thead>
                                <tbody>
                                @foreach($services as $service)
                                    <tr>
                                        <td>{{ $service->id }}</td>
                                        <td>{{ $service->name }}</td>
                                        <td>{{ $service->created_at }}</td>
                                        <td>{{ $service->updated_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>

                                <thead>
                                <th>ID</th>
                                <th>Services Name</th>
                                <th>Vehicle Vin Number</th>
                                <th>created_at</th>
                                <th>Updated_at</th>
                                </thead>
                                <tbody>
                                @foreach($service_vehicles as $service_vehicle)
                                    <tr>
                                        <td>{{ $service_vehicle->id }}</td>
                                        <td>{{ $service_vehicle->service()->name }}</td>
                                        <td>{{ $service_vehicle->vehicle()->vin_number }}</td>
                                        <td>{{ $service_vehicle->created_at }}</td>
                                        <td>{{ $service_vehicle->updated_at }}</td>
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
