@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Events</div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Event Title</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if(count($events) > 0)
                    @foreach($events as $event)
                    <tr>
                        <th scope="row">{{$event->id}}</th>
                        <td>{{$event->title}}</td>
                    @endforeach
                    </tbody>
                      </table>
                    @else 
                    <p>There are no events</p>
                    @endif

                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
