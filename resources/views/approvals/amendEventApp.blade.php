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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                          <script>
                            $(document).ready(function(){

                          $('#toggle-sidenav').on('click', function(){
      $('.sidenav-holder').toggle();
      $('.content-holder').toggleClass('col-lg-10').toggleClass('col-lg-12');
    });
                        });
                        
                      </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<div id="app">
    <div class="container-fluid" style="text-align: left; color: #000;">
      <div class="row no-gutters">
        <div class="sidenav-holder col-12 col-lg-2">
          @include('inc.admin-sidenav')
        </div>
        <div class="content-holder col-12 col-lg-10">
          @include('inc.admin-nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                @foreach($event as $e)
                <div class="card-header">Edit Event Application - {{$e->title}}</div>

                <div class="card-body">

                  <form action="/admin/events/amendApp" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="title" class="col-12 col-md-3 col-form-label text-md-right">Event Title:</label>

                        <div class="col-12 col-md-9">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$e->title}}" required autocomplete="title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="desc" class="col-12 col-md-3 col-form-label text-md-right">Description:</label>

                        <div class="col-12 col-md-9">
                            <textarea id="desc" rows="6" class="form-control" name="desc" required autocomplete="desc" autofocus>{{$e->description}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="date" class="col-12 col-md-3 col-form-label text-md-right">Date:</label>

                        <div class="col-12 col-md-9">
                            <input id="date" type="date" class="form-control" name="date" value="{{$e->date}}" required autocomplete="date" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="time" class="col-12 col-md-3 col-form-label text-md-right">Time:</label>

                        <div class="col-12 col-md-9">
                            <input id="time" type="time" class="form-control" name="time" value="{{$e->time}}" required autocomplete="time" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="venue" class="col-12 col-md-3 col-form-label text-md-right">Venue:</label>

                        <div class="col-12 col-md-9">
                            <input id="venue" type="text" class="form-control" name="venue" value="{{$e->venue}}" required autocomplete="venue" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-12 col-md-3 col-form-label text-md-right">Image:</label>

                        <div class="col-12 col-md-9">
                            <input id="image" type="file" class="form-control" name="image" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="organiser" class="col-12 col-md-3 col-form-label text-md-right">Organiser:</label>

                        <div class="col-12 col-md-9">
                            <input id="organiser" type="text" class="form-control" name="organiser" value="{{$e->managed_by}}" required autocomplete="organiser" autofocus>
                        </div>
                    </div>
                    <div class="text-right">
                    <button type="submit" class="btn btn-primary" value="{{$e->id}}" name="amend">Update</button>
                </div>
                    @endforeach
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>