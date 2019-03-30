<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlightClass extends Model
{
    public function flights() {

      return $this->hasMany(Flight::class, 'flight_class_id');
    }
}
