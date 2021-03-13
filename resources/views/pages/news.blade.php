@extends('layouts.app')
@section('content')
<div id="news-page">
    <h1>PCA News</h1>
    <div id="news-form">
    <form id="news-search" action="" method="POST">
      @csrf
            <div class="form-row">
              <div class="col-12 col-lg-4">
                  <label>Search News:</label>
                <input type="text" class="form-control" placeholder="Search News" name="title">
              </div>
              <div class="col-12 col-lg-3">
                <label>Search By Date:</label>
              <input type="date" class="form-control" name="date">
            </div>
            <div class="col-12 col-lg-3">
              <label>Search By Author:</label>
            <input type="text" class="form-control" placeholder="Search By Author" name="author">
          </div>
          <div class="col-12 col-lg-2 text-right">
            <button type="submit" class="col-12 btn btn-primary">Apply Filters</button>
          </div>
    </form>
</div>
</div>
@if(count($news) > 0)
@foreach($news as $story)
<div class="media mb-5">
  <div class="row">
    <div class="col-12 col-lg-3">
  <img class="media-object mr-3 img-fluid" src="/storage/news_images/{{$story->image}}" alt="Generic placeholder image" style="width: 100%; height: auto;">
</div>
  <br>
  <div class="col-12 col-lg-9">
  <div class="media-body">
    <a href="/news/story/{{$story->id}}"><h5 class="mt-0">{{$story->title}}</h5></a>
    <p class="story ml-5 mr-5">{!!$story->story!!}
    </div>
</div>
  </div>
</div>
            @endforeach
            @else
            <p class="text-center">There are no news stories that match your criteria</p>
            @endif
</div>
        @endsection