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
            <h1 class="text-center">Pending Event Applications</h1>
          @if(count($pending) > 0)
          <div class="card-deck">
            @foreach($pending as $p)
            <div class="col-12 col-md-6 col-xl-4 mb-4">
              <div class="card">
                <img src="/storage/event_images/{{$p->image}}" class="card-img-top img-fluid" alt="..." style="width:100%; max-height:350px;">
                <div class="card-body">
                  <h1 class="card-title">{{$p->title}}</h1>
                  <h3 class="card-title text-center">When: {{ \Carbon\Carbon::parse($p->date)->format('D jS M Y')}} - {{ \Carbon\Carbon::parse($p->time)->format('g:ia')}}</h3>
                  <h3 class="card-text text-center" style="width: 90%; margin: auto;">Where: {{$p->venue}}</h3>
                  <form action="/admin/events/approve" method="POST">
                    @csrf
                  <button type="submit" class="btn btn-success" value="{{$p->id}}" name="approveApp">Approve Event</button>
                  </form>
                  <a href="/admin/events/amend-application/{{$p->id}}"><button type="submit" class="btn btn-warning">Amend Event</button></a>
                  <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#rejectEvent{{$p->id}}">Reject Event</button>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    @else 
    <h4 class="text-center">There are currently no pending Event Applications. Check back later</h4> 
    @endif
</div>
</div>
@foreach($pending as $p)
 <!-- Delete Modal -->
 <div class="modal fade" id="rejectEvent{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Reject Event Application</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you wish to reject the event application for {{$p->title}}?. This will remove the event from the system.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        {!! Form::open(['action' => ['ApproveController@rejectApp', $p->id], 'method' => 'POST']) !!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Reject Event Application', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
      </div>
    </div>
  </div>
</div>
</div>
@endforeach
</body>
            

                  