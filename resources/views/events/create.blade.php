@extends('layouts.app')
@section('content')
<div class="container">
    <div id="add-event-form">
<h1>Add new Event</h1>
{!! Form::open(['method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', 'Event Title')}}
        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Enter Event Title...'])}}
        {{Form::label('description', 'Event Description')}}
        {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Enter Event Description...'])}}
        {{Form::label('date', 'Event Date')}}
        {{Form::date('date', '', ['class' => 'form-control', 'placeholder' => 'Select Event Date...'])}}
        {{Form::label('time', 'Event Time')}}
        {{Form::time('time', '', ['class' => 'form-control', 'placeholder' => 'Enter Event Time...'])}}
        {{Form::label('location', 'Event Location')}}
        {{Form::text('location', '', ['class' => 'form-control', 'placeholder' => 'Enter Event Location...'])}}
        {{Form::label('managed_by', 'Event Managed By')}}
        {{Form::text('managed_by', '', ['class' => 'form-control', 'placeholder' => 'Who Is Managing The Event...'])}}
        {{Form::label('title', 'Event Image')}}
        {{Form::file('image', ['class' => 'btn btn-default'])}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}
</div>
</div>
@endsection