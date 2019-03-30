@extends('layouts.app')
@section('content')
	<h2>Revenue Statistics</h2>
	<div class="container">
		<table style="width:100%; border: 1px solid #000;">
			  <tr>
			    <th>Airplane</th>
			    <th>Revenue</th> 
			  </tr>
			  @foreach($db as $db)
			  <tr>
			    <td>{{$db->airplane_name}}</td>
			    <td>{{$db->total_cost}}</td>
			  </tr>
			  @endforeach
		</table>
	</div>
@endsection