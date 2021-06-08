<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New-Car</title>
    <style>
      body {
        background-color: purple;
        color: white;
      }
    </style>
  </head>
  <body>
    <h1>E stata creata una nuova auto</h1>
    <h1>Name: {{ $car -> name }}</h1>
    <h1>Model: {{ $car -> model }}</h1>
    <h1>KW: {{ $car -> kw }}</h1>
    <h1>Brand: {{ $car -> brand -> name }} {{ $car -> brand -> nationality }}</h1>
    <div>
      @foreach ($car -> pilots as $carPilot)
        <h1>
         Name: {{ $carPilot -> name }} |
         lastName:{{ $carPilot -> lastname }} |
         Nationality: {{ $carPilot -> nationality }} |
         Date: {{ $carPilot -> date_of_birth }}
       </h1>
      @endforeach
    </div>
  </body>
</html>
