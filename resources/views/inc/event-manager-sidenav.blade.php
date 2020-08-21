<div id="sidenav">
  <div class="row">
    <div class="col-12 my-auto">
      <a href="/event-manager/index"><img src="/img/pcaLogo.png">
      <span class="title">PCA</span></a>
    </div>
        </div>
        <div class="divider">
        </div>
            <div class="option">
            <div class="row no-gutters">
                <div class="col-3 my-auto">
                <img src="/img/baseline_leaderboard_white_18dp.png">
                </div>
                <div class="col-9 my-auto">
                <span>Dashboard</span>
                </div>
            </div>
          </div>
          <div class="divider">
          </div>
          <div class="option">
            <div class="row no-gutters">
                <div class="col-3 my-auto">
                  <img src="/img/baseline_mail_white_18dp.png">
                </div>
                <div class="col-9 my-auto">
                <span>Inbox</span>
                </div>
                </div>
              </div>
              <div class="divider">
              </div>
          <div class="option">
            <a href="/admin/users"><div class="row no-gutters">
                <div class="col-3 my-auto">
                <img src="/img/baseline_event_white_18dp.png">
                </div>
                <div class="col-9 my-auto">
                <span>Event Management</span>
                </div>
            </div>
        </div></a>
        <div class="divider">
        </div>
        <div class="option">
          <a href="/events/create"><div class="row no-gutters">
              <div class="col-3 my-auto">
              <img src="/img/baseline_event_available_white_18dp.png">
              </div>
              <div class="col-9 my-auto">
              <span>Create New Event</span>
              </div>
          </div>
      </div></a>
      <div class="divider">
      </div>
      <div class="option">
        <div class="row no-gutters">
            <div class="col-3 my-auto">
            <img src="/img/baseline_people_alt_white_18dp.png">
            </div>
            <div class="col-9 my-auto">
            <span>Event Applications</span>
            </div>
        </div>
    </div>
    <div class="divider">
    </div>
  <a href="/users/resetPass"><div class="option">
    <div class="row no-gutters">
        <div class="col-3 my-auto">
          <img src="/img/baseline_security_white_18dp.png">
        </div>
        <div class="col-9 my-auto">
        <span>Reset Password</span>
        </div>
    </div>
  </div></a>
  <div class="divider">
  </div>
  <a href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <div class="option">
        <div class="row no-gutters">
            <div class="col-3 my-auto">
              <img src="/img/baseline_keyboard_tab_white_18dp.png">
            </div>
            <div class="col-9 my-auto">
            <span>Logout</span>
            </div>
        </div>
      </div>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  <div class="divider">
  </div>
  <div id="resize" class="fixed-bottom col-2">
    <img src="/img/baseline_keyboard_backspace_white_18dp.png">
  </div>
          </div>