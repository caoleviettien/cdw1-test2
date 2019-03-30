@extends('layouts.app')
@section('content')
  <main>
    <div class="container">
        <section>  
            @if (count($booked) == 0)
              <h3>No results.</h3>
            @else
                @foreach ($booked as $booked)                    
                    <article>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4><strong><a href=""></a>{{ $booked->flight_code }} {{ $booked->airplane_name }}</strong></h4>
                                        <div class="row">
                                            <div class="col-sm-3">                                           
                                                <label class="control-label">From:</label>
                                                <div><big class="time">{{ date("H:i", strtotime($booked->flight_departure_time)) }}</big></div>
                                                <div><big class="time">{{ date("Y:m:d", strtotime($booked->flight_departure_time)) }}</big></div>
                                                <div><span class="place">{{$booked->city_from}}({{ $booked->airport_from_code }})</span></div>
                                            </div>                                           
                                            <div class="col-sm-3">
                                                <label class="control-label">To:</label>
                                                <div><big class="time">{{ date("H:i", strtotime($booked->flight_arrival_time)) }}</big></div>
                                                <div><big class="time">{{ date("Y:m:d", strtotime($booked->flight_arrival_time)) }}</big></div>
                                                <div><span class="place">{{ $booked->city_to }} ({{ $booked->airport_to_code }})</span></div>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="control-label">Duration:</label>
                                                <div><big class="time">{{ date("H:i", strtotime($booked->duration)) }}</big></div>
                                                {{-- <div><strong class="text-danger">1 Transit</strong></div> --}}
                                            </div>                                         
                                            <div class="col-sm-3 text-right">
                                                <label class="control-label">Passenger x {{$booked->total_passenger}}</label>
                                                 <h3 class="price text-danger"><strong>{{$booked->total_cost}} VND</strong></h3>
                                                <div>
                                                    <a href="{{ route('flightDetail', ['flight_id' => $booked->id]) }}" class="btn btn-link">See Detail</a>
                                                    <a href="{{ route('Destroy', ['bookid' => $booked->bookid]) }}" class="btn btn-primary" onclick="return confirm('Are you sure you want to destroy this Ticket?');">Remove</a>
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
        </section>
    </div>
  </main>
@endsection