@extends('layouts.app')
@section('content')
<div id="events-show">
        <h1>Events</h1>
        @if(count($events) > 0)
        <div class="row justify-content-center">
        @foreach($events as $event)
        <figure class="figure">
                <img src="storage/event_images/{{$event->image}}" class="figure-img img-fluid rounded" style="width:250px; height:250px;">
                <figcaption class="figure-caption">{{ $event->title}}</figcaption>
              </figure>
        @endforeach
</div>
</div>
        @endif
@endsection