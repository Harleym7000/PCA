<<<<<<< HEAD


@extends('layouts.app')

@section('content')
<div id="register">
<div class="container">
    <div class="row justify-content-center">
        @include('partials.alerts')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Members - Registration</div>

                <div class="card-body">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="text-center">
                    <h2>Become a Member Today</h2>
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
                                <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Confirm your Password" required autocomplete="new-password">
                    
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="captcha text-center">
                                    <div class="g-recaptcha @error('g-recaptcha-response') is-invalid @enderror" data-sitekey="6LeWLL8ZAAAAALOKCQHnNaPioxOzVeF3VTBLiCUS" name="recapctha"></div>
                                    @error('g-recaptcha-response')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                  @enderror
                                  </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input @error('agree') is-invalid @enderror" id="agree" name="agree">
                                @error('agree')
                                    <p class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                                <label class="form-check-label" for="exampleCheck1">I have read and agreed to the <button type="button" class="btn btn-link" data-toggle="modal" data-target="#termsandconditions">Terms and Conditions</button></label>
                              </div>
                            </div>
                            <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary pull-right">Register</button>
                    </form>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="termsandconditions" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Terms and Conditions</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="terms">
              By continuing to the site, you are agreeing to comply with and be bound by the following terms and conditions of use which together with our privacy policy govern Portstewart Community Association's relationship with you in relation to this website. If you disagree with any part of these terms and conditions, please do not use our website.
              We take your privacy seriously. We are a controller of the personal information that you provide us.
We collect the following personally identifying information which is provided directly by you, either
in person, via the website or social pages for reasons such as membership, participation in an
organised event or because you have an interest in PCA and requested updates on our activities:
          <br><br><ul>
 <li>Contact details- name, address, email address and phone numbers. (All this information is stored in the database in it's encrypted format. Only authorized users can view this data)</li>
<li> Participation details- member, trustee, volunteer, committee membership, gift aid. </li>
            <li> Website information- IP address, activity on our site</li>
                <li> Information that you provide for completing web form or mailing list. </li>
                        <li> ‘Cookies’ which enable the website to remember your information if you return to the site,
such as to keep you logged in or remember your login credentials if you return to the site. </li>
<li> We also receive personal information about you indirectly from sources such as – donations
via our Facebook pages ( Red Sails Festival and PCA) or other payment platforms. This may
include your name, email address and payment amount.</li>
          </ul>

If all matters we conform to General Data Protection Regulations and our Privacy Notice and Date
Protection Policies are available on request
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
        </div>
      </div>
    </div>
  </div>
@endsection
=======
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form id="register-form" method="POST" action="{{ route('register') }}">
            @csrf
            <input type="hidden" name="recaptcha" id="recaptcha">
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4 g-recaptcha" 
        data-sitekey="6LcVwOcdAAAAAIgkXu6xND6r_4ZTXCXomFA-DlE6" 
        data-callback='onSubmit' 
        data-action='submit'>{{ __('Register') }}</button>
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
>>>>>>> 0aa80b40e032c383f006c1d6e5c4cb972d94b269
