@extends('layouts.app')
@section('content')
<div id="events">
        <h1>Upcoming Events</h1>
        <div class="row justify-content-center">
            @if(count($events) > 0)
            @foreach($events as $event)
          <div class="card" style="width: 25rem;">
              <img src="img/pcaLogo.png" class="card-img-top" alt="..." style="height: 370px;">
              <div class="card-body">
                <h5 class="card-title">{{$event->title}}</h5>
                <p class="card-text">{{$event->date}} - {{$event->time}}</p>
                <p class="card-text">{{$event->venue}}</p>
                <a href="/event/{{$event->id}}" class="btn btn-primary">Find Out More <svg class="bi bi-arrow-bar-right" width="1.2em" height="1.2em" viewBox="0 0 16 16" fill="white" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M10.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L12.793 8l-2.647-2.646a.5.5 0 0 1 0-.708z"/>
                  <path fill-rule="evenodd" d="M6 8a.5.5 0 0 1 .5-.5H13a.5.5 0 0 1 0 1H6.5A.5.5 0 0 1 6 8zm-2.5 6a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 1 0v11a.5.5 0 0 1-.5.5z"/>
                </svg></a>
              </div>
            </div>
            @endforeach
            @else 
            <p>There are currently no Upcoming Events</p>
            @endif
        </div>
        @endsection