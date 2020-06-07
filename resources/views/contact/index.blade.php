@extends('layouts.app')
@section('content')
        <h1>Send Us a Message</h1>
        <p>Have a query? Send us a message below and we'll be happy to help</p>
        <div id="contact-form">
        {!! Form::open(['action' => 'EventsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-row">
        {{Form::label('title', 'Event Title')}}
        {{Form::text('title', '', ['class' => 'col-5', 'placeholder' => 'Enter Event Title...'])}}
        {{Form::label('description', 'Event Description')}}
        {{Form::text('description', '', ['class' => 'col-5', 'placeholder' => 'Enter Event Description...'])}}
    </div>
    {{Form::label('title', 'Event Title')}}
    {{Form::text('title', '', ['class' => 'col-11', 'placeholder' => 'Enter Event Title...'])}}
    {{Form::label('title', 'Event Title')}}
    {{Form::textarea('title', '', ['class' => 'col-11', 'placeholder' => 'Enter Event Title...'])}}
    {{Form::submit('Send', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}
</div>
@endsection