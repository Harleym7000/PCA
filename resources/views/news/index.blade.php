@extends('layouts.app')
@section('content')
        <h1>News</h1>
        @if(count($news) > 0)
        <div class="container">
        @foreach($news as $story)
        <div class="media">
                <img class="mr-3" src="img/pcaLogo.png" alt="Generic placeholder image" style="height: 120px; width:120px;">
                <div class="media-body">
                  <h5 class="mt-0">{{$story->title}}</h5>
                  {{$story->story}}
                  <p>Written on: {{$story->created_at}}</p>
                </div>
              </div>
              @endforeach
            </div>
              @endif
@endsection