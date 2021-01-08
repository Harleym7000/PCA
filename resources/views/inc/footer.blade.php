<!-- Footer -->
<footer class="page-footer font-small stylish-color-dark pt-4">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-4 mx-auto">

        <!-- Content -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">What We Do</h5>
        <p>Portstewart Community Association is a charitable organisation who currently organises and implemets 
          <a href="https://redsails.co.uk/" target="_blank" class="text-white"><strong><u>The Red Sails Festival</u></strong></a> alongside other events and activities for the benefit 
          of the community.</p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 mx-auto">

        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

        <ul class="list-unstyled">
          <li>
            <a href="/">Home</a>
          </li>
          <li>
            <a href="/about">About</a>
          </li>
          <li>
            <a href="/events">Events</a>
          </li>
          <li>
            <a href="/news">News</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 mx-auto">

        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">More Links</h5>

        <ul class="list-unstyled">
          <li>
            <a href="/contact-us">Contact Us</a>
          </li>
          @guest
          <li>
            <a href="/login">Login</a>
          </li>
          <li>
            <a href="/register">Register</a>
          </li>
          @endguest
          <li>
            <a href="https://redsails.co.uk/" target="_blank">Red Sails Website</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 mx-auto">

        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Social Media</h5>

        <ul class="list-unstyled">
          <li>
            <a href="https://www.facebook.com/PortstewartCommunityAssociation/" target="_blank"><img src="/img/baseline_facebook_white_18dp.png">Facebook</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <hr>

  <!-- Call to action -->
  <div class="subscribe">
  <ul class="list-unstyled list-inline text-center py-2">
    <li class="list-inline-item">
      <h3 class="mb-1">Subscribe to Our Newsletter</h3>
    </li>
  </ul>
  <div id="subscribe-form">
    <form action="/subscribe" method="POST">
      @csrf
        <input class="form-control col-9" type="email" placeholder="Enter email address..." name="sub_email">
      <div class="form-group text-center">
        <button type="submit" class="btn btn-primary col-9">Subscribe</button>
      </div>
    </form>
</div>
</div>
</div>
  <!-- Call to action -->

  <hr>

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright: Portstewart Community Association
    <br> Charity Number: NIC101459
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->