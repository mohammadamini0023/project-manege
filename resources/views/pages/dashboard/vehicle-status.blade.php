@extends('layouts.dashboard')
@section('title','List Of Vehicles')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('modules.success')
                    @include('modules.error')
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Recommended Maintenance</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>Service</th>
                                <th>Miles</th>
                                <th>Swap</th>
                                <th>Current Miles</th>
                                <th>Status</th>
                                <th>Doe At Miles</th>
                                <th>Inv</th>
                                <th>Date</th>
                                <th>Last Miles</th>
                                </thead>
                                <tbody>
                                    @foreach($listServicesVehicle as $item)
                                        @if(count($item) == 2)
                                            <tr>
                                                <td>{{ $item[0]->service()->name }}</td>
                                                <td>{{ $item[0]->service()->miles }}</td>
                                                <td>{{ $item[0]->service()->duration }}</td>
                                                <td>{{ $item[0]->current_miles }}</td>
                                                <td>{{ (($item[1]->current_miles + $item[0]->service()->miles) >= $item[0]->current_miles ?
                                                 'Due At' : 'Recommended') }}</td>
                                                <td>{{ ($item[1]->current_miles + $item[0]->service()->miles) }}</td>
                                                <td>{{ $item[1]->inv }}</td>
                                                <td>{{ $item[1]->created_at }}</td>
                                                <td>{{ $item[1]->current_miles }}</td>
                                            </tr>
                                        @elseif(count($item) == 1)
                                            <tr>
                                                <td>{{ $item[0]->service()->name }}</td>
                                                <td>{{ $item[0]->service()->miles }}</td>
                                                <td>{{ $item[0]->service()->duration }}</td>
                                                <td>{{ (($item[0]->current_miles) < $item[0]->service()->miles ?
                                                 'Due At' : 'Recommended') }}</td>
                                                <td>{{ ($item[0]->service()->miles + $item[0]->current_miles) }}</td>
                                                <td>Null</td>
                                                <td>Null</td>
                                                <td>Null</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>Null</td>
                                                <td>Null</td>
                                                <td>Null</td>
                                                <td>Null</td>
                                                <td>Null</td>
                                                <td>Null</td>
                                                <td>Null</td>
                                                <td>Null</td>
                                            </tr>
                                        @endif
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
