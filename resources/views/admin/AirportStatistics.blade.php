@extends('layouts.app')
@section('content')
    <h2>Revenue Statistics</h2>
    <div class="container">
        <table style="width:100%; border: 1px solid #000;">
              <tr>
                <th>Airplane</th>
                <th>Trend</th>
                <th>Number</th> 
              </tr>
              @foreach($db as $db)
              <tr>
                <td>{{$db->airport_name}}</td>
                <td></td>
                <td></td>
              </tr>
              @endforeach
        </table>
    </div>
@endsection