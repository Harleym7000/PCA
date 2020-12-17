@extends('layouts.app')

@section('content')
<div id="login">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Event Widget') }}</div>

                <div class="card-body">
                    <form method="POST" action="/test/event/widget">
                        @csrf

                        <div class="form-group row">
                            <label for="widget" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>

                            <div class="col-md-6">
                                <input id="widget" type="text" class="form-control @error('widget') is-invalid @enderror" name="widget" style="height: 200px;" required>

                                @error('widget')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="col-12 btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </form>
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
