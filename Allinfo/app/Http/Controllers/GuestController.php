<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

class GuestController extends Controller
{
  public function home() {

    $cars = Car::where('deleted', false) -> get();
    return view('pages.home', compact('cars'));
  }
}
