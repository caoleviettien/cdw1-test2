<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    public function flightClass()
    {
      return $this->beLongsTo(FlightClass::class);
    }

    public function airplane()
    {
      return $this->beLongsTo(Airplane::class);
    }
}
