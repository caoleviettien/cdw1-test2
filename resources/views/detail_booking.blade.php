@extends('layouts.app')
@section('content')  

<main>
        <div class="container">
            <section>
                <h2>{{$airport_from->airport_name}} ({{$airport_from->airport_code}})<i class="glyphicon glyphicon-arrow-right"></i>{{$airport_to->airport_name}} ({{$airport_to->airport_code}})</h2>
                <article>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4><strong>Qatar Airways</strong></h4>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label class="control-label">From:</label>
                                            <div><big class="time">{{$flight->flight_departure_time}}</big></div>
                                            <div><span class="place">{{$airport_from->airport_name}} ({{$airport_from->airport_code}})</span></div>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="control-label">To:</label>
                                            <div><big class="time">{{$flight->flight_arrival_time}}</big></div>
                                            <div><span class="place">{{$airport_to->airport_name}} ({{$airport_to->airport_code}})</span></div>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="control-label">Duration:</label>
                                            <div><big class="time">{{$flight->duration}}</big></div>
                                            <div><strong class="text-danger">1 Transit</strong></div>
                                        </div>
                                        <div class="col-sm-3 text-right">
                                            <h3 class="price text-danger"><strong>{{$booking->total_cost}} VND</strong></h3>
                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#flight-detail-tab">Book Flight Details</a></li>
                                        <li><a data-toggle="tab" href="#passenger-detail-tab">Passengers Details</a></li>
                                        <li><a data-toggle="tab" href="#flight-price-tab">Price Details</a></li>

                                    </ul>
                                    <div class="tab-content">
                                        <div id="flight-detail-tab" class="tab-pane fade in active">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <h5>
                                                        <strong class="airline">{{$user->name}}</strong>
                                                        <p><span class="flight-class">{{$user->email}}</span></p>
                                                    </h5>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div><big class="time">Payment Method</big></div>
                                                                    <div><small class="date">{{$booking->payment_method}}</small></div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div><span class="place">Card Number</span></div>
                                                                    <div><small class="airport">{{$booking->card_number}}</small></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                      
                                                        <div class="col-sm-4">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div><big class="time">Name on card</big></div>
                                                                    <div><small class="date">{{$booking->name_card}}</small></div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div><span class="place">CCV Code</span></div>
                                                                    <div><small class="airport">{{$booking->ccv_code}}</small></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 text-right">
                                                            <label class="control-label">Passengers</label>
                                                            <div><strong class="time">{{$passenger->count()}}</strong></div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div id="passenger-detail-tab" class="tab-pane fade">
                                           @foreach ($passenger as $passenger)
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <h5>
                                                        <strong class="airline">{{$passenger->title}}</strong>
                                                        <p><span class="flight-class"></span></p>
                                                    </h5>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div><big class="time">First Name</big></div>
                                                                    <div><small class="date">{{$passenger->pas_first_name}}</small></div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div><span class="place">Last Name</span></div>
                                                                    <div><small class="airport">{{$passenger->pas_last_name}}</small></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            @endforeach
                                        </div>
                                        <div id="flight-price-tab" class="tab-pane fade">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <div class="pull-left">
                                                        <strong>Passengers Fare x {{$fare}}</strong>
                                                    </div>
                                                    <div class="pull-right">
                                                        <strong>{{$booking->total_cost}} x {{$fare}} VND</strong>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="pull-left">
                                                        <span>Tax</span>
                                                    </div>
                                                    <div class="pull-right">
                                                        <span>Included</span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </li>
                                                <li class="list-group-item list-group-item-info">
                                                    <div class="pull-left">
                                                        <strong>You Pay</strong>
                                                    </div>
                                                    <div class="pull-right">
                                                        <strong>{{$cost}} VND</strong>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </section>
             <section>
                  <div class="text-right">
                      <a href="{{ route('MannageTicket', ['userid' => $user->id]) }}" class="btn btn-primary">Manage Ticket</a>
                  </div>
            </section>
        </div>
</main>


@endsection