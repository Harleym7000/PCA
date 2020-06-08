@extends('layouts.app')
@section('content')
        <h1>Send Us a Message</h1>
        <p>Have a query? Send us a message below and we'll be happy to help</p>
        <div id="contact-form">
        {!! Form::open(['method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-row">
        {{Form::label('firstname', 'First Name')}}
        {{Form::text('firstname', '', ['class' => 'col-5', 'placeholder' => 'Enter .First Name..'])}}
        {{Form::label('surname', 'Surname')}}
        {{Form::text('surname', '', ['class' => 'col-5', 'placeholder' => 'Enter Surname...'])}}
    </div>
    {{Form::label('subject', 'Message Subject')}}
    {{Form::text('subject', '', ['class' => 'col-11', 'placeholder' => 'Enter Message Subject...'])}}
    {{Form::label('message', 'Message')}}
    {{Form::textarea('message', '', ['class' => 'col-11', 'placeholder' => 'Enter Message...'])}}
    {{Form::submit('Send', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}
</div>
@endsection