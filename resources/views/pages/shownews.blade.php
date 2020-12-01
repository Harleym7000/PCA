@extends('layouts.app')
@section('content')
<div id="show-news">
    @foreach($news as $n)
    <h1 class="text-center">{{$n->title}}</h1>
    @endforeach
</div>
        @endsection