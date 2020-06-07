@extends('layouts.app')
@section('content')
<div id="events-show">
        <h1>Events</h1>
        @if(count($events) > 0)
        <div class="row justify-content-center">
        @foreach($events as $event)
        <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="storage/event_images/{{$event->image}}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{$event->title}}</h5>
                  <p class="card-text">{{$event->description}}</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
        @endforeach
</div>
</div>
        @endif
@endsection