@extends('layouts.main-layout')
@section('content')

  <main>
    <div>
      <h1 class="text-center">Car</h1>
      <ul class="car">

        <li>
          <h2>ID</h2>
          <div>
            {{ $car -> id }}
          </div>
        </li>

        <li>
          <h2>Name</h2>
          <div>
            {{ $car -> name }}
          </div>
        </li>

        <li>
          <h2>Model</h2>
          <div>
            {{ $car -> model }}
          </div>
        </li>

        <li>
          <h2>KW</h2>
          <div>
            {{ $car -> kw }}
          </div>
        </li>

        <li>
          <h2>Brand</h2>
          <div>
            {{ $car -> brand -> name }}
          </div>
        </li>

        <li>
          <h2>Nationality</h2>
          <div>
            {{ $car -> brand -> nationality }}
          </div>
        </li>

      </ul>
    </div>

    <div>
      <h1 class="text-center">All Pilots</h1>
      <ul class="car">

        <li>
          <h2>Pilot</h2>
          @for ($i = 1; $i <= $car -> pilots -> count(); $i++)
            <div>
              {{ $i }}
            </div>
          @endfor
        </li>

        <li>
          <h2>Name</h2>
          @foreach ($car ->pilots as $pilot)
            <div>
              {{ $pilot -> name }}
            </div>
          @endforeach
        </li>

        <li>
          <h2>LastName</h2>
          @foreach ($car ->pilots as $pilot)
            <div>
              {{ $pilot -> lastname }}
            </div>
          @endforeach
        </li>

        <li>
          <h2>Nationality</h2>
          @foreach ($car ->pilots as $pilot)
            <div>
              {{ $pilot -> nationality }}
            </div>
          @endforeach
        </li>

        <li>
          <h2>Date</h2>
          @foreach ($car ->pilots as $pilot)
            <div>
              {{ $pilot -> date_of_birth}}
            </div>
          @endforeach
        </li>

      </ul>
    </div>

    <div class="button-center">
      <a class="home" href="{{route('home')}}">List Cars</a>
    </div>

  </main>
@endsection
