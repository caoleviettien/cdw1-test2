@extends('layouts.app')

@section('content')
  <div class="container">
    <section>
      <h3>Update personal information</h3>
      <div class="panel panel-default">
        <div class="panel-body">
          @if(session()->has('message'))
            <div class="alert alert-success">
              <b>{{ session()->get('message') }}</b>
            </div>
          @endif          
          <form action="{{ route('passenger.update')}}" name="updatePassengerInfo" method="POST">
            {{ csrf_field() }}
              <div class="form-group form-inline">
                <input class="form-control" type="hidden" name="id" value="{{ $passenger->id }}">                
              </div>
              <label class="control-label">Title:</label>
              <div class="row">
                <div class="col-md-3">
                  <select class="form-control" name="title">
                    <option value="mr" {{ $passenger->title == 'mr' ? 'selected' : '' }}>Mr.</option>
                    <option value="mrs" {{ $passenger->title == 'mrs' ? 'selected' : '' }}>Mrs.</option>
                  </select>
                </div>
              </div>

            <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
              <label class="control-label">First Name:</label>
              <input type="text" name="firstname" class="form-control" placeholder="Enter your fullname" value="{{ $passenger->pas_first_name }}">
              @if ($errors->has('firstname'))
                <span class="help-block">
                  <strong>{{ $errors->first('firstname') }}</strong>
                </span>
              @endif
            </div> 

            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
              <label class="control-label">Last Name:</label>
              <input type="text" name="lastname" class="form-control" placeholder="Enter your fullname" value="{{ $passenger->pas_last_name }}">
              @if ($errors->has('lastname'))
                <span class="help-block">
                  <strong>{{ $errors->first('lastname') }}</strong>
                </span>
              @endif
            </div>          
            
            <div class="text-left">
              <button type="submit" name="submit" value="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
@endsection
