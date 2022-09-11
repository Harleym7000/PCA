<div id="mobile-nav">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="logo justify-content-center">
      <div class="row">
        <div class="col-12 d-flex">
          <img src="/img/pcaLogoDarkTransparent.png" style="height:120px; width: 90px;">

    <button class="navbar-toggler my-auto" type="button" id="mobNavToggle" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="height: 40px;">
      <span class="navbar-toggler-icon"></span>
    </button>
    </div>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <div class="row">
            <img src="/img/baseline_leaderboard_white_18dp.png">
          <a class="nav-link" href="/admin/dashboard">Dashboard</a>
        </div>
        </li>
        <li class="nav-item">
          <div class="row">
            <img src="/img/baseline_home_white_18dp.png">
          <a class="nav-link" href="/">Main Site Home</a>
        </div>
        </li>
        <li class="nav-item">
          <div class="row">
            <img src="/img/baseline_account_circle_white_18dp.png">
          <a class="nav-link" href="/user/profile">My Profile</a>
        </div>
        </li>
        <li class="nav-item">
          <div class="row">
            <img src="/img/baseline_mail_white_18dp.png">
          <a class="nav-link" href="/admin/contact">Inbox</a>
        </div>
        </li>
        <li class="nav-item">
          <div class="row">
            <img src="/img/baseline_people_alt_white_18dp.png">
          <a class="nav-link" href="/admin/users">User Management</a>
        </div>
        </li>
        <li class="nav-item">
          <div class="row">
            <img src="/img/baseline_person_add_alt_1_white_18dp.png">
          <a class="nav-link" href="/admin/users/create">Create User</a>
        </div>
        </li>
        <li class="nav-item">
          <div class="row">
            <img src="/img/baseline_folder_white_18dp.png">
          <a class="nav-link" href="/policy-docs">Policy Documents</a>
        </div>
        </li>
        <li class="nav-item">
          <div class="row">
            <img src="/img/baseline_event_white_18dp.png">
          <a class="nav-link" href="/events/index">Event Management</a>
        </div>
        </li>
        <li class="nav-item">
          <div class="row">
            <img src="/img/baseline_event_available_white_18dp.png">
          <a class="nav-link" href="/events/create">Create Event</a>
        </div>
        </li>
        <li class="nav-item">
          <div class="row">
            <img src="/img/baseline_event_note_white_18dp.png">
          <a class="nav-link" href="/admin/events/applications">Event Applications</a>
        </div>
        </li>
        <li class="nav-item">
          <div class="row">
            <img src="/img/baseline_dashboard_white_18dp.png">
          <a class="nav-link" href="/member">Members Dashboard</a>
        </div>
        </li>
        <li class="nav-item">
          <div class="row">
            <img src="/img/baseline_confirmation_number_white_18dp.png">
          <a class="nav-link" href="/user/events">My Events</a>
        </div>
        </li>
        <li class="nav-item">
          <div class="row">
            <img src="/img/baseline_folder_special_white_18dp.png">
          <a class="nav-link" href="/policies">View Policies</a>
        </div>
        </li>
        <li class="nav-item">
          <div class="row">
            <img src="/img/baseline_article_white_18dp.png">
          <a class="nav-link" href="/news/index">My News Stories</a>
        </div>
        </li>
        <li class="nav-item">
          <div class="row">
            <img src="/img/baseline_create_white_18dp.png">
          <a class="nav-link" href="/news/create">Create News Story</a>
        </div>
        </li>
        {{-- <li class="nav-item">
          <div class="row">
            <img src="/img/baseline_settings_white_18dp.png">
          <a class="nav-link" href="/user/settings/{{Auth::user()->id}}">Account Settings</a>
        </div>
        </li> --}}
        <li class="nav-item">
          <div class="row">
            <img src="/img/baseline_security_white_18dp.png">
          <a class="nav-link" href="/users/resetPass">Reset Password</a>
        </div>
        </li>
        <li class="nav-item">
          <div class="row">
            <img src="/img/baseline_keyboard_tab_white_18dp.png">
          <a class="nav-link" href="/logout" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">Logout</a>
        </div>
        </li>
      </ul>
    </div>
  </nav>
</div>
