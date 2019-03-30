@extends('layouts.app')
@section('content')  
  <main>
          <div class="container">
              <h2>Booking</h2>
              <div class="row">
                  <div class="col-md-8">
                      @if ($errors->any())
                        <div class="alert alert-danger">
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                      @endif
                      <form role="form" action="{{ route('booking') }}" method="POST" name="booking">
                         {{ csrf_field() }}
                          <section>
                              <h3>Contact Information</h3>
                              <div class="panel panel-default">
                                  <div class="panel-body">
                                      <div class="form-group col-sm-6 {{ $errors->has('user_first_name') ? ' has-error' : '' }} row">                                     
                                          <label class="control-label">
                                              First Name:
                                          </label>
                                          <input disabled value="{{ old('user_first_name') }}" name="user_first_name" type="text" class="form-control" placeholder="{{$user_name}}">
                                      </div>

                                      <div class="form-group col-sm-6 {{ $errors->has('user_last_name') ? ' has-error' : '' }}  row">
                                          <label class="control-label" >
                                              Last Name:
                                          </label>
                                          <input disabled value="{{ old('user_last_name') }}" name="user_last_name" type="text" class="form-control" placeholder="{{$user_name}}">
                                      </div>

                                      <div class="form-group col-sm-6 {{ $errors->has('user_phone_contact') ? ' has-error' : '' }} row">                                
                                          <label class="control-label">
                                              Contact's Mobile phone number
                                          </label>
                                          <input  disabled  value="{{ old('user_phone_contact') }}"  name="user_phone_contact" type="tel" class="form-control" placeholder="{{$user_phone}}">                                        
                                      </div>
                                      
                                       <div class="form-group col-sm-6 {{ $errors->has('user_email_contact') ? ' has-error' : '' }} row">
                                          <label class="control-label">
                                              Contact's email address
                                          </label>
                                          <input disabled value="{{ old('user_email_contact') }}"  name="user_email_contact" type="email" class="form-control" placeholder="{{$user_email}}">
                                      </div>
                                      <div class="text-right">
  										                    <button type="button" class="btn btn-default">Clear all</button>
                                          <button type="button" class="btn btn-default">Reset</button>
                                      </div>
                                  </div>
                              </div>
                          </section>
                          <section>
 
                                <label for="pas">Number of Passengers</label>
                             
                                <select class="form-control" name="pas" id="pas">
                                  <option value="0">0</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                </select>
                                                        
                          </section>
              
                          <section>
                              <h3 id='titlePasse'></h3>
                              <div id="passengers"></div>
                          </section>
                          <section>
                              <h3>Price Details</h3>
                              <div>
                                  <h5>
                                      <strong class="airline">Qatar Airways</strong>
                                      <p><span class="flight-class">Economy</span></p>
                                  </h5>
                                  <ul class="list-group">
                                      <li class="list-group-item">
                                          <div class="pull-left">
                                              <strong id="pasNumber">Passengers Fare</strong>
                                          </div>
                                          <div class="pull-right">
                                              <strong>{{ $flight->flight_cost }}</strong><span> VND</span>
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
                                            <input type="hidden" name="total_passenger" id="total_passenger">
                                            <input type="hidden" name="total_cost" id="total_cost" value="{{ $flight->flight_cost }}">
                                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                                            <strong id="cost">{{ $flight->flight_cost }}</strong> <span> VND</span>
                                          </div>
                                          <div class="clearfix"></div>
                                      </li>
                                  </ul>
                              </div>
                          </section>
                          <section>
                              <h3>Payment</h3>
                              <div class="panel panel-default">
                                  <div class="panel-body">
                                      <div class="form-group">
                                          <label class="control-label">
                                              Payment Method:
                                          </label>
                                          <select name="payment_method" class="form-control">
                                              <option value="transfer" selected>Transfer</option>
                                              <option value="credit_card">Credit Card</option>
                                              <option value="paypal">Paypal</option>
                                          </select>
                                      </div>
                                      <h4>Credit Card</h4>
                                      <div class="form-group {{ $errors->has('card_number') ? ' has-error' : '' }} ">
                                          <label class="control-label">Card Number</label>
                                          <input value="{{ old('card_number') }}"  name="card_number" type="number" class="form-control" placeholder="Digit card number">
                                      </div>
                                      <div class="form-group {{ $errors->has('name_card') ? ' has-error' : '' }}  col-sm-10 row">                                   
                                          <label class="control-label">Name on card:</label>
                                          <input value="{{ old('name_card') }}" name="name_card" type="text" class="form-control">
                                          <input class="form-control" type="hidden" name="flight_id" value="{{ $flight->id }}">                                                                             
                                      </div>                                      
                                      <div class="form-group {{ $errors->has('ccv_code') ? ' has-error' : '' }}  col-sm-2 row"> 
                                          <label class="control-label">CCV Code:</label>
                                          <input value="{{ old('ccv_code') }}" name="ccv_code" type="number" maxlength="3" class="form-control" placeholder="Digit CCV">
                                      </div>
                                  </div>
                              </div>
                          </section>
                          <section>
                              <div class="text-right">
                                  <button type="submit" class="btn btn-primary">
                                      Continue to Booking
                                  </button>
                              </div>
                          </section>
                      </form>
                  </div>
                  <div class="col-md-4">
                      <h3>Flights</h3>
                      <aside>
                          <article>
                              <div>
                                  <ul class="list-group">
                                      <li class="list-group-item">
                                          <h5>
                                              <strong class="airline">{{ $flight->flight_code }}</strong> 
                                              <p><span class="flight-class">{{ $flight->class_name }}</span></p>
                                          </h5>
                                          <div class="row">
                                              <div class="col-sm-12">
                                                  <div class="row">
                                                      <div class="col-sm-4">
                                                          <div><big class="time">{{ date("H:i", strtotime($flight->flight_departure_time)) }}</big></div>
                                                          <div><small class="date">{{ date("Y:m:d", strtotime($flight->flight_departure_time)) }}</small></div>
                                                      </div>
                                                      <div class="col-sm-6">
                                                          <div><span class="place">{{ $flight->city_from }} ({{ $flight->airport_from_code }})</span></div>
                                                          <div><small class="airport">{{ $flight->airport_from_name }}</small></div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-sm-12 text-center">
                                                  <i class="glyphicon glyphicon-arrow-down"></i>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-sm-12">
                                                  <div class="row">
                                                      <div class="col-sm-4">
                                                          <div><big class="time">{{ date("H:i", strtotime($flight->flight_arrival_time)) }}</big></div>
                                                          <div><small class="date">{{ date("Y:m:d", strtotime($flight->flight_arrival_time)) }}</small></div>
                                                      </div>                                                     
                                                      <div class="col-sm-6">
                                                          <div><span class="place">{{ $flight->city_to }} ({{ $flight->airport_to_code }})</span></div>
                                                          <div><small class="airport">{{ $flight->airport_to_name }}</small></div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </li>
                                      
                                  </ul>
                              </div>
                          </article>
                        
                      </aside>
                  </div>
              </div>
          </div>
          <br>
      </main>
@endsection