@extends('layouts.app')
@section('content')
<div id="events-show">
        <h1>Upcoming Events</h1>
        @if(count($events) > 0)
        <div class="row justify-content-center">
        @foreach($events as $event)
        <div class="event col-12 col-sm-12-col-md-6 col-lg-4 col-xl-4">
        <figure class="figure">
                <img src="storage/event_images/{{$event->image}}" class="figure-img img-fluid rounded" style="width:450px; height:250px;">
                <figcaption class="figure-caption">
                        {{ $event->title}} <br>
                        {{date('d-m-Y', strtotime($event->date))}}, {{date('H:i', strtotime($event->time))}}
                </figcaption>
              </figure>
        </div>
        @endforeach
</div>
</div>
        @endif
@endsection