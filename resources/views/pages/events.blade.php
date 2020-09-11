@extends('layouts.app')
@section('content')
<div id="events">
    <h1>Scheduled Events</h1>
    <form id="event-search" action="" method="POST">
      @csrf
            <div class="form-row">
              <div class="col-12 col-lg-4">
                  <label>Search Events:</label>
                <input type="text" class="form-control" placeholder="Search Event">
              </div>
              <div class="col-12 col-lg-4">
                <label>Select Date:</label>
                <input type="date" class="form-control">
              </div>
              <div class="col-12 col-lg-4">
                <label>Select Time:</label>
                <input type="time" class="form-control">
              </div>
            </div>
    </form>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-3">
      @if(count($events) > 0)
            @foreach($events as $event)
        <div class="col mb-4">
          <div class="card">
            <img src="/img/pcaLogo.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h1 class="card-title">{{$event->title}}</h1>
              <h3 class="card-title text-center">{{$event->date}} - {{$event->time}}</h3>
              <p class="card-text" style="width: 90%; margin: auto;">{{$event->venue}}</p>
              <div class="row">
                <a href="/event/{{$event->id}}" class="btn btn-primary col-5">More Info</a>
            <a href="#" class="btn btn-light col-5">Register</a>
          </div>
            </div>
          </div>
        </div>
        @endforeach
        @else 
        <p>There are currently no Upcoming Events</p>
        @endif
          </div>
    </div>
        </div>
        @endsection