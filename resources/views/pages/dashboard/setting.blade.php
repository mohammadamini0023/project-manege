@extends('layouts.dashboard')
@section('title','Site Settings')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.setting.title') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Site Title') }}</label>

                                    <div class="col-md-6">
                                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ ($title->key == "title" ) ? $title->value : ''}}" required autocomplete="title" autofocus>

                                        @error('title')
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
                                            Set Title
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.setting.csvUpload') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">

                                    <label for="csv_file" class="col-md-2 col-form-label text-md-right">{{ __('CSV File') }}</label>

                                    <div class="col-md-6">
                                        <input id="csv_file" type="file" name="csv_file" accept=".csv">

                                        @error('csv_file')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <label for="input-csv-user" class="col-form-label text-md-right">{{ __('Import Users') }}</label>

                                        <input id="input-csv-user" type="radio" class=" @error('input-csv') is-invalid @enderror" name="type-csv" value="user" autofocus>

                                    <label for="input-csv-services" class="col-form-label text-md-right">{{ __('Import Services') }}</label>

                                        <input id="input-csv-services" type="radio" class=" @error('input-csv-services') is-invalid @enderror" name="type-csv" value="service" autofocus>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <button type="submit" class="btn btn-primary">
                                            Set Title
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
