<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airplane extends Model
{
    public function flights()
    {
      return $this->hasMany(Flight::class, 'flight_airplane_id');
    }
}
