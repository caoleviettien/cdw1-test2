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


    public function TicketManagement()
    {    
        $booked = DB::table('booking_list')
                          ->join('flights', 'flights.id', 'booking_list.flight_id')  
                          ->join('airplanes', 'flights.flight_airplane_id', 'airplanes.id')                          
                          ->join('airports as airport_from', 'flights.flight_airport_from_id', 'airport_from.id')
                          ->join('airports as airport_to', 'flights.flight_airport_to_id', 'airport_to.id')
                          ->select(
                            'booking_list.*',
                            'flights.*',
                            'airplanes.airplane_name',
                            'booking_list.id as bookid',
                            'airport_from.airport_code as airport_from_code',
                            'airport_from.city_name as city_from',
                            'airport_to.airport_code as airport_to_code',
                            'airport_to.city_name as city_to'
                          )->get();
        return view('manage_ticket', [
            'booked' => $booked,
        ]);
    } 


    public function manageFlight()
    {
        $flights = DB::table('flights')
                              ->join('airplanes', 'flights.flight_airplane_id', 'airplanes.id')
                              ->join('airports as airport_from', 'flights.flight_airport_from_id', 'airport_from.id')
                              ->join('airports as airport_to', 'flights.flight_airport_to_id', 'airport_to.id')
                              ->select(
                                'flights.*',
                                'airplanes.airplane_name',
                                'airport_from.airport_code as airport_from_code',
                                'airport_from.city_name as city_from',
                                'airport_to.airport_code as airport_to_code',
                                'airport_to.city_name as city_to'
                              )->get();
      $airports = DB::table('airports')->get();
      $airplanes = DB::table('airplanes')->get();
      $flightClasses = DB::table('flight_classes')->get();

      return view('admin.manageflight', [
        'flights' => $flights,
        'airplanes' => $airplanes,
        'airports' => $airports,
        'flightClasses' => $flightClasses
      ]);
    }


    public function AirportStatistics()
    {
    	$db = DB::table('flights')
								->join('booking_list', 'flights.id', 'booking_list.flight_id')  
                        ->join('airplanes', 'flights.flight_airplane_id', 'airplanes.id')
                        ->join('airports as airport_from', 'flights.flight_airport_from_id', 'airport_from.id')
                        ->join('airports as airport_to', 'flights.flight_airport_to_id', 'airport_to.id')
								->select(
                        'booking_list.*',
                        'count(*) as number',
                        'airport_from.airport_name as airport_from_name',
                        'airport_from.city_name as city_from',
                        'airport_to.airport_name as airport_to_name',
                        'airport_to.city_name as city_to'	                                            
                        )->where('airport_from', '!=', 'airport_to')->get();
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
}