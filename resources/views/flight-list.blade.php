@extends('layouts.app')
@section('content')
  <main>
    <div class="container">
        <section>
            <h2>{{ $airport_from->city_name }} ({{ $airport_from->airport_code }}) <i class="glyphicon glyphicon-arrow-right"></i> {{ $airport_to->city_name }} ({{ $airport_to->airport_code }})</h2>
            @if (count($flights) == 0)
              <h3>No results.</h3>
            @else
              @foreach ($flights as $flight)
                <article>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4><strong><a href="{{ route('flightBooking', ['flight_id' => $flight->id]) }}">{{ $flight->flight_code }} {{ $flight->airplane_name }}</a></strong></h4>
                                    <div class="row">
                                        <div class="col-sm-3">                                           
                                            <label class="control-label">From:</label>
                                            <div><big class="time">{{ date("H:i", strtotime($flight->flight_departure_time)) }}</big></div>
                                            <div><span class="place">{{ $flight->city_from }} ({{ $flight->airport_from_code }})</span></div>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="control-label">To:</label>
                                            <div><big class="time">{{ date("H:i", strtotime($flight->flight_arrival_time)) }}</big></div>
                                            <div><span class="place">{{ $flight->city_to }} ({{ $flight->airport_to_code }})</span></div>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="control-label">Duration:</label>
                                            <div><big class="time">{{ date("H:i", strtotime($flight->duration)) }}</big></div>
                                            {{-- <div><strong class="text-danger">1 Transit</strong></div> --}}
                                        </div>
                                        <div class="col-sm-3 text-right">
                                            <h3 class="price text-danger"><strong>{{ str_replace(',', '.', number_format($flight->flight_cost)) }}</strong></h3>
                                            <div>
                                                <a href="{{ route('flightDetail', ['flight_id' => $flight->id]) }}" class="btn btn-link">See Detail</a>
                                                <a href="{{ route('flightBooking', ['flight_id' => $flight->id]) }}" class="btn btn-primary">Choose</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
              @endforeach
            @endif
            <div class="text-center">
                {{ $flights->render() }}
            </div>
        </section>
    </div>
  </main>
@endsection