@extends('layouts.dashboard')
@section('title','Create Service Vehicle')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.serviceVehicle.update', ['service_vehicle_id' => $serviceVehicle->id]) }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="vehicle" class="col-md-4 col-form-label text-md-right">{{ __('Select Vehicle') }}</label>

                                    <div class="col-md-6">
                                        <select id="vehicle" class="form-control @error('vehicle') is-invalid @enderror" name="vehicle">
                                            <option disabled>Select Item Vehicle</option>
                                            @foreach($vehicles as $vehicle)
                                                <option value="{{ $vehicle->id }}" {{ ($serviceVehicle->vehicle_id == $vehicle->id) ? 'selected' : ''  }} > {{ $vehicle->vin_number . '/' . $vehicle->make . $vehicle->model . '/' .$vehicle->number_plates }}</option>
                                            @endforeach
                                        </select>

                                        @error('vehicle')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="current_miles" class="col-md-4 col-form-label text-md-right">{{ __('Current Miles') }}</label>

                                    <div class="col-md-6">
                                        <input id="current_miles" type="text" class="form-control @error('current_miles') is-invalid @enderror" name="current_miles" value="{{ old('current_miles', $serviceVehicle->current_miles) }}" required autocomplete="current_miles" autofocus>

                                        @error('current_miles')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="service" class="col-md-4 col-form-label text-md-right">{{ __('Select Service') }}</label>

                                    <div class="col-md-6">
                                        <select id="service" class="form-control @error('service') is-invalid @enderror" name="service">
                                            <option disabled>Select Item Services</option>
                                            @foreach($services as $service)
                                                <option value="{{ $service->id }}" {{ ($serviceVehicle->service_id == $service->id) ? 'selected' : ''  }} > {{ $service->name . '/ $' . $service->price }}</option>
                                            @endforeach
                                        </select>

                                        @error('service')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <button type="submit" class="btn btn-primary">
                                            Update Service Vehicle
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
