@include('inc.mobile-nav')
<div id="sidenav">
      <div class="logo justify-content-center">
    <div class="row">
      <div class="col-12 my-auto">
        <img src="/img/pcaLogoDarkTransparent.png">
      </div>
          </div>
        </div>
        @if(auth()->user()->hasRole('Admin')))
          <h5 class="section">Dashboard</h5>
          <div class="divider">
          </div>
          <a href="/admin/dashboard"><div class="option">
            <div class="row no-gutters">
                <div class="col-xl-3 my-auto">
                <img class="d-block mx-auto mx-xl-0" src="/img/baseline_leaderboard_white_18dp.png">
                </div>
                <div class="col-9 my-auto">
                <span>Dashboard</span>
                </div>
            </div>
            <h5 class="label">Dashboard</h5>
          </div></a>
          <div class="divider">
          </div>
          <br>
          <br>
          @elseif(auth()->user()->hasRole('Event Manager')))
          <h5 class="section">Dashboard</h5>
          <div class="divider">
          </div>
          <a href="/events/dashboard"><div class="option">
            <div class="row no-gutters">
                <div class="col-xl-3 my-auto">
                <img class="d-block mx-auto mx-xl-0" src="/img/baseline_leaderboard_white_18dp.png">
                </div>
                <div class="col-9 my-auto">
                <span>Dashboard</span>
                </div>
            </div>
            <h5 class="label">Dashboard</h5>
          </div></a>
          <div class="divider">
          </div>
          <br>
          <br>
          @endif
          <h5 class="section">My Profile</h5>
          <div class="divider">
          </div>
          <a href="/user/profile/"><div class="option">
            <div class="row no-gutters">
              <div class="col-xl-3 my-auto">
                <img class="d-block mx-auto mx-xl-0" src="/img/baseline_account_circle_white_18dp.png">
                </div>
                <div class="col-9 my-auto">
                <span>My Profile</span>
                </div>
            </div>
            <h5 class="label">My Profile</h5>
            </div></a>
            <div class="divider">
            </div>
            <br>
            <br>
            <h5 class="section">Main Site Home</h5>
          <div class="divider">
          </div>
          <a href="/"><div class="option">
            <div class="row no-gutters">
              <div class="col-xl-3 my-auto">
                <img class="d-block mx-auto mx-xl-0" src="/img/baseline_home_white_18dp.png">
                </div>
                <div class="col-9 my-auto">
                <span>Main Site Home</span>
                </div>
            </div>
            <h5 class="label">Main Site Home</h5>
            </div></a>
            <div class="divider">
            </div>
            @can('manage-users')
            <br>
            <br>
          <h5 class="section">Admin</h5>
          <div class="divider">
          </div>
            <a href="/admin/contact"><div class="option">
              <div class="row no-gutters">
                <div class="col-xl-3 my-auto">
                  <img class="d-block mx-auto mx-xl-0" src="/img/baseline_mail_white_18dp.png">
                  </div>
                  <div class="col-9 my-auto">
                  <span>Inbox</span>
                  </div>
                  </div>
                  <h5 class="label">Inbox</h5>
                </div></a>
                <div class="divider">
                </div>
            <div class="option">
              <a href="/admin/users"><div class="row no-gutters">
                <div class="col-xl-3 my-auto">
                  <img class="d-block mx-auto mx-xl-0" src="/img/baseline_people_alt_white_18dp.png">
                  </div>
                  <div class="col-9 my-auto">
                  <span>User Management</span>
                  </div>
              </div>
              <h5 class="label">User Management</h5>
          </div></a>
          <div class="divider">
          </div>
          <div class="option">
            <a href="/admin/users/create"><div class="row no-gutters">
              <div class="col-xl-3 my-auto">
                <img class="d-block mx-auto mx-xl-0" src="/img/baseline_person_add_alt_1_white_18dp.png">
                </div>
                <div class="col-9 my-auto">
                <span>Create User</span>
                </div>
            </div>
            <h5 class="label">Create User</h5>
        </div></a>
        <div class="divider">
        </div>
        <a href="/admin/events/applications"><div class="option">
          <div class="row no-gutters">
            <div class="col-xl-3 my-auto">
              <img class="d-block mx-auto mx-xl-0" src="/img/baseline_event_note_white_18dp.png">
              </div>
              <div class="col-9 my-auto">
              <span>Event Applications</span>
              </div>
          </div>
          <h5 class="label">Event Applications</h5>
          </div></a>
          <div class="divider">
          </div>
    <a href="/policy-docs"><div class="option">
      <div class="row no-gutters">
        <div class="col-xl-3 my-auto">
          <img class="d-block mx-auto mx-xl-0" src="/img/baseline_folder_white_18dp.png">
          </div>
          <div class="col-9">
          <span>Policy Documents</span>
          </div>
      </div>
      <h5 class="label">Policy Documents</h5>
    </div></a>
    <div class="divider">
    </div>
    @endcan
    <br>
    <br>
    @can('manage-events')
    <h5 class="section">Events</h5>
    <div class="divider">
    </div>
      <div class="option">
        <a href="/events/index"><div class="row no-gutters">
          <div class="col-xl-3 my-auto">
            <img class="d-block mx-auto mx-xl-0" src="/img/baseline_event_white_18dp.png">
            </div>
            <div class="col-9 my-auto">
            <span>Event Management</span>
            </div>
        </div>
        <h5 class="label">Event Management</h5>
    </div></a>
    <div class="divider">
    </div>
    <div class="option">
      <a href="/events/create"><div class="row no-gutters">
        <div class="col-xl-3 my-auto">
          <img class="d-block mx-auto mx-xl-0" src="/img/baseline_event_available_white_18dp.png">
          </div>
          <div class="col-9 my-auto">
          <span>Create Event</span>
          </div>
      </div>
      <h5 class="label">Create Event</h5>
    </div></a>
    <div class="divider">
    </div>
    <div class="option">
      <a href="/events/red-sails"><div class="row no-gutters">
        <div class="col-xl-3 my-auto">
          <img class="d-block mx-auto mx-xl-0" src="/img/outline_sailing_white_24dp.png">
          </div>
          <div class="col-9 my-auto">
          <span>Red Sails Festival</span>
          </div>
      </div>
      <h5 class="label">Create Event</h5>
    </div></a>
    <div class="divider">
    </div>
    <br>
    <br>
    @endcan
    @can('view-policy')
    <h5 class="section">PCA Member</h5>
    <div class="divider">
    </div>
    <a href="/member"><div class="option">
      <div class="row no-gutters">
        <div class="col-xl-3 my-auto">
          <img class="d-block mx-auto mx-xl-0" src="/img/baseline_dashboard_white_18dp.png">
          </div>
          <div class="col-9 my-auto">
          <span>Members Dashboard</span>
          </div>
      </div>
      <h5 class="label">My Events</h5>
      </div></a>
      <div class="divider">
      </div>
    <a href="/user/events"><div class="option">
      <div class="row no-gutters">
        <div class="col-xl-3 my-auto">
          <img class="d-block mx-auto mx-xl-0" src="/img/baseline_confirmation_number_white_18dp.png">
          </div>
          <div class="col-9 my-auto">
          <span>My Events</span>
          </div>
      </div>
      <h5 class="label">My Events</h5>
      </div></a>
      <div class="divider">
      </div>
      <a href="/user/committees/{{Auth::user()->id}}"><div class="option">
        <div class="row no-gutters">
          <div class="col-xl-3 my-auto">
            <img class="d-block mx-auto mx-xl-0" src="/img/baseline_people_alt_white_18dp.png">
            </div>
            <div class="col-9 my-auto">
            <span>My Committees</span>
            </div>
        </div>
        <h5 class="label">My Committees</h5>
        </div></a>
        <div class="divider">
        </div>
      <a href="/policies"><div class="option">
        <div class="row no-gutters">
          <div class="col-xl-3 my-auto">
            <img class="d-block mx-auto mx-xl-0" src="/img/baseline_folder_special_white_18dp.png">
            </div>
            <div class="col-9 my-auto">
            <span>View Policies</span>
            </div>
        </div>
        <h5 class="label">View Policies</h5>
        </div></a>
        <div class="divider">
        </div>
        <br>
    <br>
    @endcan
    @can('manage-news')
    <h5 class="section">News</h5>
    <div class="divider">
    </div>
    <a href="/news/index"><div class="option">
      <div class="row no-gutters">
        <div class="col-xl-3 my-auto">
          <img class="d-block mx-auto mx-xl-0" src="/img/baseline_article_white_18dp.png">
          </div>
          <div class="col-9 my-auto">
          <span>My News Stories</span>
          </div>
      </div>
      <h5 class="label">My News Stories</h5>
      </div></a>
      <div class="divider">
      </div>
      <a href="/news/create"><div class="option">
        <div class="row no-gutters">
          <div class="col-xl-3 my-auto">
            <img class="d-block mx-auto mx-xl-0" src="/img/baseline_create_white_18dp.png">
            </div>
            <div class="col-9 my-auto">
            <span>Create News Story</span>
            </div>
        </div>
        <h5 class="label">Create News Story</h5>
        </div></a>
        <div class="divider">
        </div>
      <br>
    <br>
    @endcan
    {{-- <a href="/user/settings/{{Auth::user()->id}}"><div class="option">
      <div class="row no-gutters">
        <div class="col-xl-3 my-auto">
          <img class="d-block mx-auto mx-xl-0" src="/img/baseline_settings_white_18dp.png">
          </div>
          <div class="col-9 my-auto">
          <span>Account Settings</span>
          </div>
      </div>
      <h5 class="label">Account Settings</h5>
    </div></a>
    <div class="divider">
    </div> --}}
    <a href="/users/resetPass"><div class="option">
      <div class="row no-gutters">
        <div class="col-xl-3 my-auto">
          <img class="d-block mx-auto mx-xl-0" src="/img/baseline_security_white_18dp.png">
          </div>
          <div class="col-9 my-auto">
          <span>Reset Password</span>
          </div>
      </div>
      <h5 class="label">Reset Password</h5>
    </div></a>
    <div class="divider">
    </div>
    <a href="/logout" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
          <div class="option">
          <div class="row no-gutters">
            <div class="col-xl-3 my-auto">
              <img class="d-block mx-auto mx-xl-0" src="/img/baseline_keyboard_tab_white_18dp.png">
              </div>
              <div class="col-9 my-auto">
              <span>Logout</span>
              </div>
          </div>
          <h5 class="label">Logout</h5>
        </div>
      </a>
      <form id="logout-form" action="/logout" method="POST" style="display: none;">
        @csrf
      </form>
    <div class="divider">
    </div>
    <br>
            </div>

