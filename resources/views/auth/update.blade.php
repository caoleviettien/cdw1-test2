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
          
          <form action="{{ route('user.update')}}" name="updateUserInfo" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
              <label class="control-label">Email</label>
              <input type="text" name="email" class="form-control" disabled value="{{ $user->email }}">
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label class="control-label">Name:</label>
              <input type="text" name="name" class="form-control" placeholder="Enter your fullname" value="{{ $user->name }}">
              @if ($errors->has('name'))
                <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
              <label class="control-label">Day of birth (MM/DD/YYYY):</label>
              <div class="row">
                <div class="col-md-3">
                  <input type="date" name="dob" class="form-control" placeholder="Enter your day of birth" value="{{ $user->dob }}">
                  @if ($errors->has('dob'))
                    <span class="help-block">
                      <strong>{{ $errors->first('dob') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
            </div>
            <div class="form-group form-inline">
              <label class="control-label">Gender:</label>
              <div class="row">
                <div class="col-md-3">
                  <select class="form-control" name="gender">
                    <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Nam</option>
                    <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Nữ</option>
                    <option value="Other" {{ $user->gender == 'Other' ? 'selected' : '' }}>Khác</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
              <label class="control-label">Phone:</label>
              <input type="text" name="phone" class="form-control" placeholder="Enter your phone" value="{{ $user->phone}}">
              @if ($errors->has('phone'))
                <span class="help-block">
                  <strong>{{ $errors->first('phone') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
              <label class="control-label">Address:</label>
              <input type="text" name="address" class="form-control" placeholder="Enter your address" value="{{ $user->address }}">
              @if ($errors->has('address'))
                <span class="help-block">
                  <strong>{{ $errors->first('address') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('newPassword') ? ' has-error' : '' }}">
              <label class="control-label">New password:</label>
              <input type="password" id="newPassword" name="newPassword" class="form-control" placeholder="Enter your new password" autocomplete="new-password">
              @if ($errors->has('newPassword'))
                <span class="help-block">
                  <strong>{{ $errors->first('newPassword') }}</strong>
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
