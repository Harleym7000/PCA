@extends('layouts.app')
@section('content')
<div id="contact-us">
        <h1>Send Us a Message</h1>
        <p>Have a query or a suggestion? Send us a message below and we'll be happy to help</p>
        <div id="contact-form">
            <form>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">First Name</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="First Name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Surname</label>
                    <input type="text" class="form-control" id="inputPassword4" placeholder="Surname">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputAddress">Message Subject</label>
                  <input type="text" class="form-control" id="inputAddress" placeholder="Message Subject">
                </div>
                <div class="form-group">
                  <label for="inputAddress2">Message</label>
                  <textarea class="form-control" id="inputAddress2" placeholder="Enter Message Here..." rows="8"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
</div>
</div>
@endsection