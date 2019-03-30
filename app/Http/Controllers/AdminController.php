<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function RevenueStatistics()
    {
    	$db = DB::table('booking_list')
    								->join('flights', 'flights.id', 'booking_list.flight_id')
    								->join('airplanes', 'flights.flight_airplane_id', 'airplanes.id')
    								->select(
	                                'booking_list.total_cost',
	                                'flights.*',
	                                'airplanes.airplane_name'
	                                )->get();
    	return view('admin.RevenueStatistics',['db' => $db]);
    }

    public function AirportStatistics()
    {
    	$db = DB::table('booking_list')
    								->join('flights', 'flights.id', 'booking_list.flight_id')
    								->join('airports', 'flights.flight_airport_from_id', 'airports_from.id')
    								->select(
	                                'booking_list.*',
	                                'airports.count(*) as count_from'	                                            
	                                )->get();

                                    var_dump($db->count_from);			
    	//return view('admin.AirportStatistics',['db' => $db,]);
    }

    public function TicketManagement()
    {
    	
    }
}
