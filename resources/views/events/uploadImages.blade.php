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
                        
                        $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
                      
                        $(document).ready(function(){
                          $('#toggle-sidenav').on('click', function(){
      $('.sidenav-holder').toggle();
      $('.content-holder').toggleClass('col-lg-10').toggleClass('col-lg-12');
      drawMembersChart();
      drawTrafficChart();
    });
                        });

                          </script>
</head>
<body>
    <div id="app">
        <div class="container-fluid" style="text-align: left; color: #000;">
          <div class="row no-gutters">
            <div class="sidenav-holder col-12 col-lg-2">
              @include('inc.admin-sidenav')
            </div>
            <div class="content-holder col-12 col-lg-10">
              @include('inc.admin-nav')
              <div id="create-event">
                @include('partials.alerts')
              <div class="card">
                <div class="card-header">Manage Event Images for {{ $event->title }}</div>
        <div id="add-event-form">
    <form action="/events/photo_upload/{{ $event->id }}" method='POST' enctype='multipart/form-data'>
      @csrf
        <div class="form-group">
            <label for="title">Upload Event Images:</label>
            <input type="file" class="form-control @error('file') is-invalid @enderror" id="file" name="file[]" required multiple autofocus>
            @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
          </div>
          
        <div class="form-group row text-right">
          <div class="col-12">
        <button type="submit" class="btn btn-primary">Upload</button>
      </div>
        </div>
      </form>
      @if(count($currentImages) > 0)
       <form action="/events/delete_photos/{{ $event->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Delete Event Images</label>
          <div class="row col-12 text-center">
        @foreach($currentImages as $i)
        <div class="image mb-3 ">
        <img src="/storage/event_images/{{ $i->image_path }}" style="width: 65px; height: 50px; object-fit: cover; margin: 1%;">
        <button type="submit" class="btn btn-danger" value="{{ $i->id }}" name="id">Delete</button>
      </div>
        @endforeach
      </form>
      @endif
    </div>
              </div>
    </div>
    </div>
    </div>
    </div>
    </div>
        </div>
    </div>
</body>
</html>
