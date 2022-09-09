@extends('layouts.front-end')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
@foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
@endforeach
    </ul>
</div>
@endif
@include('layouts.navbar')
    <div id="events">
    <h1 id="event-heading" class="text-center mt-5 text-5xl font-semibold">All Events</h1>
</div>
@include('layouts.footer')
