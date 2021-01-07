@extends('layouts.app')
@section('content')
<div id="show-news">
    @foreach($news as $n)
    <h1 class="text-center mt-5">{{$n->title}}</h1>
    @endforeach
    @foreach($author as $a)
    <p class="text-center">Written By: {{Crypt::decrypt($a->firstname)}} {{Crypt::decrypt($a->surname)}}</p>
        @endforeach
    <br>
    @foreach($news as $n)
    <div class="news-image-holder">
    <img src="/storage/news_images/{{$n->image}}" class="img-fluid">
</div>
<br>
    <h5 class="text-center">{!!$n->story !!}</h5>
    @endforeach
    <br>
    <br>
</div>
        @endsection