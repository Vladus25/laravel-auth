<?php

use Illuminate\Database\Seeder;
use App\Brand;
use App\Car;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Car::class, 20) -> make() -> each(function($car){
        $brand = Brand::inRandomOrder() -> first();
        $car -> brand() -> associate($brand);

        $car -> save();
      });
    }
}
