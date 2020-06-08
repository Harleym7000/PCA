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
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if(count($events) > 0)
                    @foreach($events as $event)
                    <tr>
                        <th scope="row">{{$event->id}}</th>
                        <td>{{$event->title}}</td>
                        <td>
                            @can('manage-events')
                            <a href=""><button type="button" class="btn btn-primary float-left">Edit Event</button></a>
                            <form action="" method="POST" class="float-left">
                                @csrf 
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger">Delete Event</button>
                            </form>
                        </td>
                    </tr>
                            @endcan
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
