@extends('layouts.app')
@section('content')
<div id="contact-us">
            <div class="card">
            <div class="card-header">Contact Us</div>
        <div id="contact-form">
          <div class="col-12">
            <form id="contact" action="/contact-submit" method="POST">
              @csrf
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">First Name: <span class="asterisk">*</span></label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="First Name" name="firstname" required autofocus>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Surname: <span class="asterisk">*</span></label>
                    <input type="text" class="form-control" id="inputPassword4" placeholder="Surname" name="surname" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword4">Email Address: <span class="asterisk">*</span></label>
                  <input type="email" class="form-control" id="inputPassword4" placeholder="Email Address" name="email" required>
                </div>
                <div class="form-group">
                  <label for="inputAddress">Message Subject: <span class="asterisk">*</span></label>
                  <input type="text" class="form-control" id="inputAddress" placeholder="Message Subject" name="subject" required>
                </div>
                <div class="form-group">
                  <label for="inputAddress2">Message: <span class="asterisk">*</span></label>
                  <textarea class="form-control" id="inputAddress2" placeholder="Enter Message Here..." rows="8" name="message" required></textarea>
                </div>
                <div class="form-group">
                  {!! NoCaptcha::display() !!}
                </div>
                <br>
                <div class="form-group">
                  <label>Fields marked with an <span class="asterisk">*</span> are required</label>
                </div>
                <div class="form-group text-right">
                <button type="submit" class="btn btn-primary">Send</button>
                </div>
                </div>
            </div>
</div>
              </form>
</div>
</div>
</div>
</div>
@endsection