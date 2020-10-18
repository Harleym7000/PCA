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
</head>
<div id="app">
    <div class="container-fluid" style="text-align: left; color: #000;">
      <div class="row no-gutters">
        <div class="col-2">
          @include('inc.admin-sidenav')
        </div>
        <div class="col-10">
          @include('inc.admin-nav')
          <div id="create-event">
          <div class="card">
            <div class="card-header">Create Event</div>
    <div id="add-event-form">
{!! Form::open(['method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', 'Event Title')}}
        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Enter Event Title...'])}}
        {{Form::label('description', 'Event Description')}}
        {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Enter Event Description...'])}}
        {{Form::label('date', 'Event Date')}}
        {{Form::date('date', '', ['class' => 'form-control', 'placeholder' => 'Select Event Date...'])}}
        {{Form::label('time', 'Event Time')}}
        {{Form::time('time', '', ['class' => 'form-control', 'placeholder' => 'Enter Event Time...'])}}
        {{Form::label('location', 'Event Location')}}
        {{Form::text('location', '', ['class' => 'form-control', 'placeholder' => 'Enter Event Location...'])}}
        {{Form::label('managed_by', 'Event Managed By')}}
        {{Form::text('managed_by', '', ['class' => 'form-control', 'placeholder' => 'Who Is Managing The Event...'])}}
        {{Form::label('title', 'Event Image')}}
        {{Form::file('image', ['class' => 'btn btn-default'])}}
    </div>
    <div class="form-group row text-right">
      <div class="col-12">
    {{Form::submit('Create Event', ['class' => 'btn btn-primary'])}}
  </div>
</div>
    </div>
{!! Form::close() !!}
</div>
</div>
</div>
</div>
    </div>
</div>
