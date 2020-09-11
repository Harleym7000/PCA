@extends('layouts.app')
@section('content')
            <div class="box">
                <div class="img-title">
                  <h1 class="display-4">Serving the Portstewart Community</h1>
                  <a href="/register"><button type="button" class="btn btn-primary">JOIN TODAY</button></a>
                <a href="/about"><button type="button" class="btn btn-light">FIND OUT MORE</button></a>
                </div>
              </div>
          </div>
          </div>
          <div id="events">
              <h1>Upcoming Events</h1>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-3">
          @if(count($events) > 0)
                  @foreach($events as $event)
            <div class="col mb-4">
              <div class="card">
                <img src="/img/pcaLogo.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <h1 class="card-title">{{$event->title}}</h1>
                  <h3 class="card-title text-center">{{$event->date}} - {{$event->time}}</h3>
                  <h3 class="card-text text-center" style="width: 90%; margin: auto;">{{$event->venue}}</h3>
                  <div class="row">
                    <a href="/event/{{$event->id}}" class="btn btn-primary col-5">More Info</a>
                <a href="/event/register/{{$event->id}}" class="btn btn-light col-5">Register</a>
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
          <div id="news">
            <h1>Latest News</h1>
            @if(count($news) > 0)
            @foreach($news as $story)
            <div class="media">
              <img class="media-object mr-3 img-responsive" src="img/pcaLogo.png" alt="Generic placeholder image" style="height: 240px; width:180px;">
              <div class="media-body">
                <a href="/story/{{$story->id}}"><h5 class="mt-0">{{$story->title}}</h5></a>
                <br><br>
                <p>{{$story->story}}</p>
                <p>Written on: {{$story->created_at}}</p>
              </div>
            </div>
              @endforeach
            @endif
          </div>
@endsection
