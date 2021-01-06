@extends('layouts.app')
@section('content')
<div id="pass-create" class="mt-5 mb-5">
    <div id="pass-form">
        @include('partials.alerts')
        <div class="row justify-content-center">
            <div class="col-5">
                <div class="card">
                    <div class="card-header">Create Password</div>
    <form action="/user/create/setPassword/{{$userID->user_id}}" method="POST" class="ml-5 mr-5 mt-3 mb-3">
      @csrf
      <div class="form-group row">
        <label for="email" class="col-12 col-form-label">Password: <span class="asterisk">*</span></label>

        <div class="col-12">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-12 col-form-label">Confirm Password: <span class="asterisk">*</span></label>

        <div class="col-12">
            <input id="password_con" type="password" class="form-control @error('password_con') is-invalid @enderror" name="password_con" required>

            @error('password_con')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
    </div>

<div class="text-right">
    <button type="submit" class="btn btn-primary">Create Account</button>
</div>
</div>
</div>
</div>
</div>
</div>
    </form>
</div>
</div>
</div>
</div>
</div>
        @endsection