@extends('layouts.app')

@section('content')
<div id="register">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Committee Members - Register</div>

                <div class="card-body">
                    <div class="text-center">
                    <h2>Become a Committee Member Today</h2>
                    <p>It's quick and easy to sign up</p>
                </div>
                    <form method="POST" action="/register">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-6 col-form-label">Email Address:</label>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email">
                    
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="password" class="col-md-6 col-form-label">Password:</label>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                    
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-6 col-form-label">Confirm Password:</label>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Re-type your Password" required autocomplete="new-password">
                    
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="text-center">
                            {!! NoCaptcha::display() !!}
                        </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">I have read and agreed to the <a href="">Terms and Conditions</a></label>
                              </div>
                            </div>
                            <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary pull-right">Register</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
