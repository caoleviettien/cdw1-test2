@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-primary" href="{{ route('createFlight') }}">Manage Flights</a>
                    <a class="btn btn-primary" href="{{ route('RevenueStatistics') }}">Revenue Statistics</a>
                    <a class="btn btn-primary" href="{{ route('AirportStatistics') }}">Airport Statistics</a>
                    <a class="btn btn-primary" href="{{ route('TicketManagement') }}">Ticket Management</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
