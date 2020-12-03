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
  $(document).ready(function() {
    $('#toggle-sidenav').on('click', function(){
      $('.sidenav-holder').toggle();
      $('.content-holder').toggleClass('col-lg-10').toggleClass('col-lg-12');
    });
  });
    </script>
</head>
<div id="app">
    <div class="container-fluid" style="text-align: left; color: #000;">
      <div class="row no-gutters">
        <div class="sidenav-holder col-12 col-lg-2">
          @include('inc.admin-sidenav')
        </div>
        <div class="content-holder col-12 col-lg-10">
          @include('inc.admin-nav')
          <div id="create-event">
          <div class="card">
            <div class="card-header">Create Event</div>
    <div id="add-event-form">
<form action="/events/create" method='POST' enctype='multipart/form-data'>
    <div class="form-group">
        <label for="title">Event Title: <span class="asterisk">*</span></label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter Event Title..." name="title" required autofocus>
        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
      </div>
      <div class="form-group">
        <label for="desc">Event Description: <span class="asterisk">*</span></label>
        <textarea class="form-control @error('desc') is-invalid @enderror" id="desc" rows="8" placeholder="Summarise the event..." name="desc" required></textarea>
        @error('desc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
      </div>
      <div class="form-group">
        <label for="title">Event Date: <span class="asterisk">*</span></label>
        <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" required>
        @error('date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
      </div>
      <div class="form-group">
        <label for="time">Event Time: <span class="asterisk">*</span></label>
        <input type="time" class="form-control @error('time') is-invalid @enderror" id="time" name="time" required>
        @error('time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
      </div>
      <div class="form-group">
        <label for="location">Event Venue: <span class="asterisk">*</span></label>
        <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" placeholder="Enter Event Venue..." name="location" required>
        @error('location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
      </div>
      <div class="form-group">
        <label for="org">Event Organiser: <span class="asterisk">*</span></label>
        <input type="text" class="form-control @error('org') is-invalid @enderror" id="org" placeholder="Who is organising the event..." name="org" required>
        @error('org')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
      </div>
      <div class="form-group">
        <label for="main-image">Main Event Image: <span class="asterisk">*</span></label>
        <input type="file" class="form-control @error('main-image') is-invalid @enderror" id="main-image" name="main-image" required>
        @error('main-image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
      </div>
      <div class="form-group">
        <label for="other-images">Other Event Images:</label>
        <input type="file" class="form-control @error('other-images') is-invalid @enderror" id="other-images" name="other-images">
        @error('other-images')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
      </div>
    </div>
    <div class="form-group row text-right">
      <div class="col-12">
    <button type="submit" class="btn btn-primary">Create Event</button>
  </div>
</div>
    </div>
  </form>
</div>
</div>
</div>
</div>
    </div>
</div>
