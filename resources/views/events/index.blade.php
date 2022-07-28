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
<div id="about" class="mb-6">
    <h1 id="abt-heading" class="text-center mt-5 text-5xl text-blue-600 font-semibold">Event Management</h1>
</div>
@include('layouts.footer')
