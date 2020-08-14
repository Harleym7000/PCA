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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<div id="app">
    <div class="container-fluid" style="text-align: left; color: #000;">
      <div class="row no-gutters">
        <div class="col-2">
          @include('inc.admin-sidenav')
        </div>
        <div class="col-10">
          @include('inc.admin-nav')
          <h1>Current Policy Documents</h1>
          @if(count($policies) > 0)
          <div class="row">
          @foreach($policies as $policy)
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="/img/pcaLogo.png" alt="Card image cap" style="width: 50px; height:80px;">
            <div class="card-body">
              <h5 class="card-title">{{$policy->name}}</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="{{URL::to('/')}}/{{$policy->name}}" target="blank" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          @endforeach
        </div>
          @else
          <p>There are currently no policy documents uploaded</p>
          @endif
          <h1>Upload New Policy Document</h1>
          <form action="/policy/upload" method="POST">
            @csrf
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
          </form>
        </div>
      </div>
    </div>
</div>
</body>
</html>
