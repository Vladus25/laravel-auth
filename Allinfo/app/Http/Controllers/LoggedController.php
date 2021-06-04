<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Pilot;
use App\Brand;

class LoggedController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    return view('home');
  }

  public function home() {

    $cars = Car::all();

    return view('pages.home', compact('cars'));
  }

  public function car($id) {
    $car = Car::findorFail($id);

    return view('pages.car', compact('car'));
  }

  public function create() {

    $brands = Brand::all();
    $pilots = Pilot::all();
    return view('pages.create', compact('brands', 'pilots'));
  }

  public function store(Request $request) {

    $validate = $request -> validate([
      'name' => 'required|string|min:3',
      'model' => 'required|string|min:3',
      'kw' => 'required|integer|min:10|max:9000',
    ]);

    $brand = Brand::findorFail($request -> get('brand_id'));

    $car = Car::make($validate);
    $car -> brand() -> associate($brand);
    $car -> save();

    $car -> pilots() -> attach($request -> get('pilots_id'));
    $car -> save();

    return redirect() -> route('home');
  }

  public function edit($id) {

    $car = Car::findorFail($id);
    $brands = Brand::all();
    $pilots = Pilot::all();

    return view ('pages.edit', compact('car', 'brands', 'pilots'));
  }

  public function update(Request $request, $id) {

    $validate = $request -> validate([
      'name' => 'required|string|min:3',
      'model' => 'required|string|min:3',
      'kw' => 'required|integer|min:10|max:9000',
    ]);

    $car = Car::findorFail($id);
    $car -> update($validate);

    // Serve per caso singolo, se trova erore si rompe pa pagina
    $brand = Brand::findorFail($request -> brand_id);

    //Serve per caso singolo comando 'associate'
    $car -> brand() -> associate($brand);
    $car -> save();

    // Serve per cancellare piloti che sono allegati al car -'multiplo', e puoi inserire nuovi piloti
    $car -> pilots() -> sync($request -> pilots_id);
    $car -> save();

    return redirect() -> route('home');
  }

  public function deleted($id) {

    $car = Car::findorFail($id);
    $car -> deleted = true;
    $car -> save();

    return redirect() -> route('home');
  }

}
