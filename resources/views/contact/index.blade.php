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
<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });
  </script>
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
          <div id="inbox-display">
            <div class="col-12">
          <ul class="list-group">
            @foreach($messages as $message)
            <li class="list-group-item my-auto">
              <div class="row">
              <p class="col-2">{{$message->subject}}</p> <p class="col-2">{{$message->firstname}} {{$message->surname}} <p class="col-4">{{$message->message}}</p>
              <div class="col-2 text-right">
              <a href="/admin/contact/reply/{{$message->id}}" data-toggle="tooltip" data-placement="bottom" title="Reply"><button type="button" id="reply" class="btn btn-btn-link"><img src="/img/baseline_reply_black_18dp.png"></button></a>
              <a href="" data-toggle="tooltip" data-placement="bottom" title="Mark as Read"><button type="button" class="btn btn-link"><img src="/img/baseline_mark_email_read_black_18dp.png"></button></a>
              <a href="" data-toggle="tooltip" data-placement="bottom" title="Delete"><button type="button" class="btn btn-link"><img src="/img/baseline_delete_black_18dp.png"></button></a>
              
            </div>
            <p class="col-2">{{\Carbon\Carbon::parse($message->created_at)->format('D jS M H:i')}}</p>
              </div>
            </li>
            @endforeach
          </ul>
        </div>
    </div>