@extends('layouts.app')
@section('content')
<div id="news-page">
    <h1>PCA News</h1>
    <div id="news-form">
    <form id="news-search" action="" method="POST">
      @csrf
            <div class="form-row">
              <div class="col-12">
                  <label>Search News:</label>
                <input type="text" class="form-control" placeholder="Search News">
              </div>
    </form>
</div>
</div>
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