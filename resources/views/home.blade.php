@extends('layouts.app')

@section('content')


 <script src="https://cdn.socket.io/4.0.1/socket.io.min.js"></script>
    <script>
        window.onload = () => {
            Echo.channel('admin-dashboard')
                .listen('.vehicle-maintenance', (event) => {
                    if (event.vehicle) {
                        alert(`Vehicle with license plate ${event.vehicle.license_plate} is nearing maintenance!`);
                    }
                });
        };
    </script>

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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
