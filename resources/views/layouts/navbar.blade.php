<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-lg shadow-gray-300">
  <div class="container-fluid">
    <img src="img/pcaLogo.png" class="h-36">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <img src="/img/list.svg">
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mr-5 mb-2 mb-lg-0">
        <li class="nav-item ml-5">
          <a class="nav-link active" dusk="navbar-home" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item ml-5">
          <a class="nav-link" dusk="navbar-about" href="/about">About</a>
        </li>
        <li class="nav-item ml-5">
          <a class="nav-link" dusk="navbar-events" href="/events">Events</a>
        </li>
        <li class="nav-item ml-5">
          <a class="nav-link" dusk="navbar-news" href="/news">News</a>
        </li>
        <li class="nav-item ml-5">
          <a class="nav-link" dusk="navbar-contact" href="/contact-us">Contact Us</a>
        </li>
        <!-- <li class="nav-item ml-5">
          <a class="nav-link" dusk="navbar-login" href="/login">Login</a>
        </li>
        <li class="nav-item ml-5">
          <a class="nav-link" dusk="navbar-register" href="/register">Register</a>
        </li> -->
        @auth
                        <!-- Authentication -->
                        <form method="POST" action="/logout">
                            @csrf

                            <li class="nav-item ml-5">
          <button type="submit"><a class="nav-link" dusk="navbar-contact">Log Out</a></button>
        </li>
                        </form>
                        @endauth
      </ul>
    </div>
  </div>
</nav>
