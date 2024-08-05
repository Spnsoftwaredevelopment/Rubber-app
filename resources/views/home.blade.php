@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    @if (auth()->user()->role_as == 1) {
                        <div class="alert alert-info" role="alert">
                            {{ __('You are an admin!') }}
                        </div>
                        <!-- Display admin-specific content here -->
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
