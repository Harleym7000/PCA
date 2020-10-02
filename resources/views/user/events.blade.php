<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<div id="app">
    <div class="container-fluid" style="text-align: left; color: #000;">
      <div class="row no-gutters">
        <div class="col-2">
          @include('inc.admin-sidenav')
        </div>
        <div class="col-10">
          @include('inc.admin-nav')
          <div id="my-events">
          <h1>My Events</h1>
          @if(count($events > 0))
          <div class="card-deck">
          @foreach($events as $event)
          <div class="col mb-4">
            <div class="card">
              <img src="/img/pcaLogo.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h1 class="card-title">{{$event->title}}</h1>
                <h3 class="card-title text-center">{{$event->date}} - {{$event->time}}</h3>
                <h3 class="card-text text-center" style="width: 90%; margin: auto;">{{$event->venue}}</h3>
          @endforeach
        </div>
        </div>
                </div>
            </div>
            @endif
        </div>
    </div>