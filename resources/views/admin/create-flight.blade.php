@extends('layouts.app')

@section('content')
  <div class="container">
    <section>
      <h3>Create new Flight</h3>
      <div class="panel panel-default">
        <div class="panel-body">
          @if (session('status'))
            <div class="alert alert-success">
              {{ session('status.created') }}
            </div>
          @endif

          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          @if (session('input'))
            <div class="alert alert-success">
              {{ var_dump(session('input')) }}
            </div>
          @endif
          <form action="{{ route('storeFlight') }}" name="createFlight" method="POST">
            {{ csrf_field() }}
            <div class="row form-create-flight">
              <div class="col-md-3">
                <div class="form-group form-inline">
                  <label class="control-label">Flight Class:</label>
                  <div class="row">
                    <div class="col-md-3">
                      <select class="form-control" name="flightClass">
                        @foreach ($flightClasses as $flightClass)
                          <option value="{{ $flightClass->id }}" {{ old('flightClass') == $flightClass->id ? 'selected' : '' }} >{{ $flightClass->flight_class_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Flight Type:</label>
                  <div class="radio">
                    <label><input type="radio" name="flight_type" checked value="1">One Way</label>
                    <label><input type="radio" name="flight_type" value="2">Return</label>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group{{ $errors->has('flight_code') ? ' has-error' : '' }}">
                  <label class="control-label">Flight Code:</label>
                  <input type="text" name="flight_code" class="form-control" value="{{ old('flight_code') }}">
                </div>
                <div class="form-group form-inline">
                  <label class="control-label">Airplane:</label>
                  <div class="row">
                    <div class="col-md-3">
                      <select class="form-control" name="airplane">
                        @foreach ($airplanes as $airplane)
                          <option value="{{ $airplane->id }}" {{ old('airplane') == $airplane->id ? 'selected' : '' }} >{{ $airplane->airplane_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group{{ $errors->has('flight_airport_from') ? ' has-error' : '' }}">
                  <label class="control-label">Departure Airport:</label>
                  <select class="form-control" name="flight_airport_from">
                    @foreach ($airports as $airport)
                      <option value="{{ $airport->id }}" {{ old('flight_airport_from') == $airport->id ? 'selected' : '' }} >{{ $airport->city_name }} ({{ $airport->airport_code }})</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group{{ $errors->has('flight_airport_from') ? ' has-error' : '' }}">
                  <label class="control-label">Arrival Airport:</label>
                  <select class="form-control" name="flight_airport_to">
                    @foreach ($airports as $airport)
                      <option value="{{ $airport->id }}" {{ old('flight_airport_to') == $airport->id ? 'selected' : '' }} >{{ $airport->city_name }} ({{ $airport->airport_code }})</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group{{ $errors->has('distance') ? ' has-error' : '' }}">
                  <label class="control-label">Distance (km):</label>
                  <input type="number" class="form-control" name="distance" value="{{ old('distance') }}">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group{{ $errors->has('departure-date') ? ' has-error' : '' }}">
                  <label class="control-label">Departure Date: </label>
                  <input type="date" name="departure-date" class="form-control col-xs-2" value="{{ old('departure-date') == '' ? date("Y-m-d") : old('departure-date') }}">
                </div>
                <div class="form-group{{ $errors->has('return-date') ? ' has-error' : '' }}">
                  <label class="control-label">Return Date: </label>
                  <input type="date" name="return-date" class="form-control col-xs-2" value="{{ old('return-date') == '' ? '' : old('return-date') }}">
                </div>
                <div class="form-group{{ $errors->has('departure-datetime') ? ' has-error' : '' }}">
                  <label class="control-label">Departure DateTime: </label>
                  <input type="datetime-local" name="departure-datetime" class="form-control col-xs-2" value="{{ old('departure-datetime') == '' ? date("Y-m-d") : old('departure-datetime') }}">
                </div>
                <div class="form-group{{ $errors->has('arrival-datetime') ? ' has-error' : '' }}">
                  <label class="control-label">Arrival DateTime: </label>
                  <input type="datetime-local" name="arrival-datetime" class="form-control col-xs-2" value="{{ old('arrival-datetime') == '' ? date("Y-m-d") : old('arrival-datetime') }}">
                </div>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" name="submit" value="submit" class="btn btn-lg btn-primary btn-block">Save</button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
@endsection
