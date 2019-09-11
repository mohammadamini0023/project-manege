@extends('layouts.dashboard')
@section('title','List Of Users')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('modules.success')
                    @include('modules.error')
                    <a href="{{ route('admin.user.create') }}" class="btn btn-success btn-fill pull-right">Create User</a>
                    <div class="card card-plain table-plain-bg">
                        <div class="card-header ">
                            <h4 class="card-title">List Information Users</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <th>ID</th>
                                <th>Name & LastName</th>
                                <th>phone</th>
                                <th>Email</th>
                                <th>address</th>
                                <th>action</th>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->first_name . $user->last_name }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>
                                            <a href="{{ route('admin.user.edit', ['user_id' => $user->id]) }}" class="btn btn-info btn-fill pull-right">Edit</a>
                                            @if($user->admin_role == 0)
                                                <a href="{{ route('admin.user.delete', ['user_id' => $user->id]) }}" class="btn btn-danger btn-fill pull-right ml-1">Delete</a>
                                            @endif
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
