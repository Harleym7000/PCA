@extends('layouts.app')

@section('content')
<div class="container">
    <div id="register-form">
                    <form method="POST" action="/register">
                        @csrf

                        <div class="form-group row">
                            <label for="forename" class="col-md-6 col-form-label">{{ __('First Name') }}</label>
                            <label for="surname" class="col-md-6 col-form-label">{{ __('Surname') }}</label>
                        </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <input id="forename" type="text" class="form-control @error('forename') is-invalid @enderror" name="forename" value="{{ old('forename') }}" required autocomplete="First name" autofocus>

                            @error('forename')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="Surname" autofocus>

                            @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-md-5 col-form-label">{{ __('Address') }}</label>
                        <label for="town" class="col-md-4 col-form-label">{{ __('Town') }}</label>
                        <label for="postcode" class="col-md-3 col-form-label">{{ __('Postcode') }}</label>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-5">
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <input id="town" type="text" class="form-control @error('town') is-invalid @enderror" name="town" value="{{ old('town') }}" required autocomplete="town">
                            
                            @error('town')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <input id="postcode" type="text" class="form-control @error('postcode') is-invalid @enderror" name="postcode" value="{{ old('postcode') }}" required autocomplete="postcode">
                            
                            @error('postcode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tel" class="col-md-6 col-form-label">{{ __('Tel No') }}</label>
                        <label for="mob" class="col-md-6 col-form-label">{{ __('Mobile No') }}</label>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <input id="tel_no" type="text" class="form-control @error('tel_no') is-invalid @enderror" name="tel_no" value="{{ old('tel_no') }}" required autocomplete="tel_no">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input id="mob_no" type="text" class="form-control @error('mob_no') is-invalid @enderror" name="mob_no" value="{{ old('mob_no') }}" required autocomplete="mob_no">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-6 col-form-label">{{ __('E-Mail Address') }}</label>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-6 col-form-label">{{ __('Password') }}</label>
                            <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="support" class="col-md-6 col-form-label">{{ __('I would like to volunteer to support') }}</label>
                        </div>
                        <div class="form-group row">
                        @foreach($causes as $cause)
                            <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$cause->name}}" id="cause{{$cause->id}}" name="causes[]">
                                <label class="form-check-label" for="cause{{$cause->id}}">
                                  {{$cause->name}}
                                </label>
                              </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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
