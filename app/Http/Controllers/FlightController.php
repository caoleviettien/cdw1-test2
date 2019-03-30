<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Flight;
use App\Airport;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

      return view('index', [
        'flights' => $flights,
        'airplanes' => $airplanes,
        'airports' => $airports,
        'flightClasses' => $flightClasses
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $airports = DB::table('airports')->get();
        $airplanes = DB::table('airplanes')->get();
        $flightClasses = DB::table('flight_classes')->get();
        return view('admin.create-flight', [          
          'airports' => $airports,
          'airplanes' => $airplanes,
          'flightClasses' => $flightClasses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'flight_airport_from' => 'required|different:flight_airport_to',
          'flight_code' => 'required|unique:flights',
          'distance' => 'required',
          'departure-date' => 'required|after_or_equal:today',
          'return-date' => 'after_or_equal:departure-date|nullable',
          'departure-datetime' => 'required|after_or_equal:departure-date',
          'arrival-datetime' => 'required|after_or_equal:departure-datetime',
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator->errors())
                        ->withInput();
        } else {

          $input = $request->all();
          $flight = new Flight;
          $flight->flight_class_id = $input['flightClass'];
          $flight->flight_type = $input['flight_type'];
          $flight->flight_code = $input['flight_code'];
          $flight->flight_airplane_id = $input['airplane'];
          $flight->flight_airport_from_id = $input['flight_airport_from'];
          $flight->flight_airport_to_id = $input['flight_airport_to'];

          // Quy dinh gia may bay
          switch ($input['distance']) {
            case $input['distance'] >= 0 && $input['distance'] <= 100:
              $flight->flight_cost = 500000;
              break;
            case $input['distance'] >= 101 && $input['distance'] <= 200:
              $flight->flight_cost = 1000000;
              break;
            case $input['distance'] >= 201 && $input['distance'] <= 500:
              $flight->flight_cost = 2000000;
              break;
            case $input['distance'] >= 501 && $input['distance'] <= 1000:
              $flight->flight_cost = 3000000;
              break;
            case $input['distance'] >= 1001 && $input['distance'] <= 2000:
              $flight->flight_cost = 6000000;
              break;
            case $input['distance'] >= 2001 && $input['distance'] <= 5000:
              $flight->flight_cost = 20000000;
              break;
            case $input['distance'] >= 5001:
                $flight->flight_cost = 30000000;
                break;
            default:
              break;
          }

          $flight->flight_departure_date = $input['departure-date'];
          $flight->flight_return_date = $input['return-date'];


          $flight->flight_departure_time = $input['departure-datetime'];
          $flight->flight_arrival_time = $input['arrival-datetime'];
          $flight->duration = date('H:i', strtotime($input['arrival-datetime']) - strtotime($input['departure-datetime']));
          $flight->save();
          return redirect()->action('FlightController@create')->with([
            'status' => [
              'created' => "OK"
            ],
            'input' => $input,
          ]);
        }

    }


     public function flightDetail($flight_id){
       $airports = new airport();

        $flights = DB::table('flights')
                      ->join('airplanes', 'flights.flight_airplane_id', 'airplanes.id')
                      ->join('airports as airport_from', 'flights.flight_airport_from_id', 'airport_from.id')
                      ->join('airports as airport_to', 'flights.flight_airport_to_id', 'airport_to.id')
                      ->join('flight_classes','flights.flight_class_id', 'flight_classes.id')
                      ->select(
                        'flights.*',
                        'airplanes.airplane_name',
                        'airport_from.airport_code as airport_from_code',
                        'airport_from.city_name as city_from',
                        'airport_from.airport_name as airport_from_name',
                        'airport_to.airport_code as airport_to_code',
                        'airport_to.city_name as city_to',
                        'airport_to.airport_name as airport_to_name',
                        'flight_classes.flight_class_name as flight_class'
                      );
        $detail = $flights->where('flights.id',$flight_id)->get();

        $airport_from = $airports->where('airports.id',$detail[0]->flight_airport_from_id)->get();
        $airport_to= $airports->where('airports.id',$detail[0]->flight_airport_to_id)->get();

        $flightDetail = $flights->where('flights.id', $flight_id)->get();
        return view('detail_flight', [
            'flight' => $flightDetail[0],
            'airport_from' => $airport_from[0],
            'airport_to' => $airport_to[0]
          ]);
      }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'from' => 'required|different:to'
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator->errors())
                        ->withInput();
        } else {
          $input = $request->all();

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
                              );

          $flights->where('flight_class_id', '=', $input['flight-class']);
          $flights = $flights->where('flight_type', '=', $input['flight_type']);
          $flights->where('flight_airport_from_id', '=', $input['from']);
          $flights->where('flight_airport_to_id', '=', $input['to']);

          // Check if departure-date is selected
          if (isset($input['departure-date'])) {
            $flights = $flights->where('flight_departure_date', '=', $input['departure-date']);
          }
          
          // Check if return-date is selected
          if (isset($input['departure-date'])) {
            $flights = $flights->where('flight_return_date', '=', $input['return-date']);
          }

          // Paginate
          $flights = $flights->paginate(5);
          $flights->appends(request()->input())->links();

          $airports = DB::table('airports')->get();
          $airport_from = $airports[$input['from'] - 1];
          $airport_to = $airports[$input['to'] - 1];

          return view('flight-list', [
            'input' => $input,
            'flights' => $flights,
            'airport_from' => $airport_from,
            'airport_to' => $airport_to
          ]);
        }
    }
}
