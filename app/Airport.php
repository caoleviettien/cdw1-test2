<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
   public function getById($id)
   {
   		return $this->where('id')->get();
   }
}