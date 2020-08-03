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
<h1>Contact Messages</h1>
@foreach($contact as $message)
<h5><strong>{{$message->first_name}} {{$message->surname}}</strong></h5> 
<p>{{$message->message}} - {{$message->created_at}}</p>

@endforeach 

<div class="response-actions">
  <button type="button" class="btn btn-light"><img src="/img/baseline_reply_black_18dp.png">Reply</button>
</div>

<div class="reply-textarea">
  <form>
    <div class="form-group">
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="9" placeholder="Reply here..."></textarea>
    </div>
  </form>
  <button type="button" class="btn btn-primary">Send <img src="/img/baseline_send_white_18dp.png"></button>
</div>