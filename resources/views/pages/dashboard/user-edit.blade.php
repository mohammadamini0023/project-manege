@extends('layouts.dashboard')
@section('title','Update User')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.user.update', ['user_id' => $user->id]) }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('first_name') }}</label>

                                    <div class="col-md-6">
                                        <input id="first_name" type="text" class="form-control @error('name') is-invalid @enderror" name="first_name" value="{{ old('first_name', $user->first_name) }}" required autocomplete="first_name" autofocus>

                                        @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('last_name') }}</label>

                                    <div class="col-md-6">
                                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name', $user->last_name) }}" required autocomplete="last_name" autofocus>

                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone',$user->phone) }}" required autocomplete="phone" autofocus>

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address',$user->address) }}" required autocomplete="address">

                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                @if(auth()->user()->admin_role == 2)
                                <div class="form-group row">
                                    <label for="address" class="col-md-4 col-form-label text-md-right"></label>
                                    <div class="col-md-6">
                                        Administrator Access
                                        <input id="admin-access" type="checkbox" class="@error('admin-access') is-invalid @enderror" name="admin-access" {{ ($user->admin_role == '1') ? 'checked' : '' }}>
                                        @error('admin-access')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                @endif

                                <div class="form-group row mb-0">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <button type="submit" class="btn btn-primary">
                                            Update User
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
