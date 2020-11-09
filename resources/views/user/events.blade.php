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
<body>

<div id="app">
    <div class="container-fluid" style="text-align: left; color: #000;">
      <div class="row no-gutters">
        <div class="sidenav-holder col-12 col-lg-2">
          @include('inc.admin-sidenav')
        </div>
        <div class="content-holder col-12 col-lg-10">
          @include('inc.admin-nav')
          <div id="my-events">
            @include('partials.alerts')
            <h1 class="text-center">My Events</h1>
          @if(count($events) > 0)
          <div class="card-deck">
            @foreach($events as $event)
            <div class="col-12 col-md-6 col-xl-4 mb-4">
              <div class="card">
                <img src="/img/pcaLogo.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <h1 class="card-title">{{$event->title}}</h1>
                  <h3 class="card-title text-center">When: {{ \Carbon\Carbon::parse($event->date)->format('D jS M Y')}} - {{ \Carbon\Carbon::parse($event->time)->format('g:ia')}}</h3>
                  <h3 class="card-text text-center" style="width: 90%; margin: auto;">Where: {{$event->venue}}</h3>
                  <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#cancelReg{{$event->id}}">Cancel Registration</button>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    @else 
    <h4 class="text-center">You have no upcoming events</h4> 
    @endif
</div>
</div>
@foreach($events as $event)
 <!-- Delete Modal -->
 <div class="modal fade" id="cancelReg{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cancel Event Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to cancel your registration for {{$event->title}}?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {!! Form::open(['action' => ['AccountsController@cancelReg', $event->id], 'method' => 'POST']) !!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Cancel Registration', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
      </div>
    </div>
  </div>
</div>
</div>
@endforeach
</body>
            

                  