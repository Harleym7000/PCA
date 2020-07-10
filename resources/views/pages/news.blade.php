@extends('layouts.app')
@section('content')
<div id="work">
        <h1>Our Work</h1>
        @if(count($news) > 0)
        <div class="container">
        @foreach($news as $story)
        <div class="media">
                <img class="mr-3" src="img/pcaLogo.png" alt="Generic placeholder image" style="height: 120px; width:120px;">
                <div class="media-body">
                  <a href="/story/{{$story->id}}"><h5 class="mt-0">{{$story->title}}</h5></a>
                  {{$story->story}}
                  <p>Written on: {{$story->created_at}}</p>
                </div>
              </div>
              @endforeach
            </div>
              @endif
            </div>
@endsection