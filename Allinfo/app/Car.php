<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
  protected $fillable = [
    'name',
    'model',
    'kw',
  ];

  public function pilots() {

    return $this -> belongsToMany(Pilot::class);
  }

  public function brand() {

    return $this -> belongsTo(Brand::class);
  }

  use SoftDeletes;
}
