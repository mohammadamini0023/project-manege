@extends('layouts.dashboard')
@section('title','List Of Services')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('modules.success')
                    @include('modules.error')
                    <a href="{{ route('admin.service.create') }}" class="btn btn-success btn-fill pull-right">Create Service</a>
                    <div class="card card-plain table-plain-bg">
                        <div class="card-header ">
                            <h4 class="card-title">List Information Services</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Duration</th>
                                <th>Miles</th>
                                <th>Price</th>
                                <th>action</th>
                                </thead>
                                <tbody>
                                @foreach($services as $service)
                                    <tr>
                                        <td>{{ $service->id }}</td>
                                        <td>{{ $service->name }}</td>
                                        <td>{{ (strlen($service->duration) >= 1) ? $service->duration . ' Months' : '-' }}</td>
                                        <td>{{ $service->miles }}</td>
                                        <td>${{ $service->price }}</td>
                                        <td>
                                            <a href="{{ route('admin.service.edit', ['service_id' => $service->id]) }}" class="btn btn-info btn-fill pull-right">Edit</a>
                                            <a href="{{ route('admin.service.delete', ['service_id' => $service->id]) }}" class="btn btn-danger btn-fill pull-right ml-1">Delete</a>
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
