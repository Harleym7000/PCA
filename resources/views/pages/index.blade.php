@extends('layouts.app')
@section('content')
        <div class="index container-fluid">
            <img src="img/IMG_20190803_163241.jpg" alt="portstewart" style="width:100%;" class="bg-image">
            <div class="centered">
                <h1>Insert PCA Mission Statement Here</h1>
                <div class="row justify-content-center">
                <a href="/register"><button type="button" class="btn btn-primary">JOIN TODAY</button></a>
                <a href="/about"><button type="button" class="btn btn-outline-light">FIND OUT MORE</button></a>
            </div>
          </div>
          </div>
          <div id="events">
              <h1>Upcoming Events</h1>
              <div class="row justify-content-center">
                  @if(count($events) > 0)
                  @foreach($events as $event)
                <div class="card" style="width: 25rem;">
                    <img src="img/pcaLogo.png" class="card-img-top" alt="...">
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
              <div id="all-events" class="justify-content-center">
              <a href="/events"><button type="button" class="btn btn-primary">View all Events!</button></a>
          </div>
          </div>
          <div id="news">
            <h1>Latest News</h1>
            @if(count($news) > 0)
            @foreach($news as $story)
            <div class="media">
              <img class="media-object mr-3" src="img/pcaLogo.png" alt="Generic placeholder image" style="height: 240px; width:180px;">
              <div class="media-body">
                <a href="/story/{{$story->id}}"><h5 class="mt-0">{{$story->title}}</h5></a>
                {{$story->story}}
                <br><br>
                <p>Written on: {{$story->created_at}}</p>
              </div>
            </div>
            @endforeach
            @endif
          </div>
@endsection
