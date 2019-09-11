@extends('layouts.dashboard')
@section('title','Update Vehicle')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    @include('modules.success')
                    @include('modules.error')
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.vehicle.update', ['vehicle_id' => $vehicle->id]) }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="vin-number" class="col-md-4 col-form-label text-md-right">{{ __('Vin Number') }}</label>

                                    <div class="col-md-6">
                                        <input id="vin-number" type="text" class="form-control @error('vin-number') is-invalid @enderror" name="vin_number" value="{{ old('vin-number', $vehicle->vin_number) }}" required autocomplete="vin-number" autofocus>

                                        @error('vin_number')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="make" class="col-md-4 col-form-label text-md-right">{{ __('Make') }}</label>

                                    <div class="col-md-6">
                                        <input id="make" type="text" class="form-control @error('make') is-invalid @enderror" name="make" value="{{ old('make', $vehicle->make) }}" required autocomplete="make" autofocus>

                                        @error('make')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="model" class="col-md-4 col-form-label text-md-right">{{ __('Model') }}</label>

                                    <div class="col-md-6">
                                        <input id="model" type="text" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ old('model', $vehicle->model) }}" required autocomplete="model" autofocus>

                                        @error('model')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="number_plates" class="col-md-4 col-form-label text-md-right">{{ __('Number Plates') }}</label>

                                    <div class="col-md-6">
                                        <input id="number_plates" type="text" class="form-control @error('number_plates') is-invalid @enderror" name="number_plates" value="{{ old('number_plates', $vehicle->number_plates) }}" required autocomplete="number_plates">

                                        @error('number_plates')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="color" class="col-md-4 col-form-label text-md-right">{{ __('color') }}</label>

                                    <div class="col-md-6">
                                        <input id="color" type="text" class="form-control @error('color') is-invalid @enderror" name="color" value="{{ old('color', $vehicle->color) }}" required autocomplete="color">

                                        @error('color')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Year') }}</label>

                                    <div class="col-md-6">
                                        <input id="year" type="text" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year', $vehicle->year) }}" required autocomplete="year">

                                        @error('year')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('User') }}</label>

                                    <div class="col-md-6">
                                        <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}" {{ ($vehicle->user_id ==$user->id) ? 'selected' : ''  }}>{{ $user->phone . '/' . $user->first_name . ' ' . $user->last_name }}</option>
                                            @endforeach
                                        </select>

                                        @error('user_id')
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
                                            Update Vehicle
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
