@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
<div class="card col-8" style="margin-top:3%; margin-bottom:3%;">
    <div class="card-header">Confirm Event Registration</div>
    <div class="card-body">
      <form action="/event/reg/confirm" method="POST">
        @csrf
        <div class="row">
        <label class="col-3">Registration Code:</label>
        <input type="text" class="form-control col-8" id="formGroupExampleInput" placeholder="Enter code here" name="token">
      </div>
      <br>
      <div class="text-right">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
      </div>
      </div>
</div>
@endsection
