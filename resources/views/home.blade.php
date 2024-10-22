@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg" style="border-radius: 10px;">
                <div class="card-header text-center" style="background-color: rgba(32, 199, 200, 0.8); color: rgb(241, 231, 238);">
                    <h4>{{ __('Admin dashboard') }}</h4>
                </div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    

                    <div class="d-flex justify-content-around">
                        <a href="{{ url('/companies') }}" class="btn btn-primary btn-lg">
                            Companies
                        </a>
                        <a href="{{ url('/employees') }}" class="btn btn-success btn-lg">
                            Employees
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
