<div id="sidenav">
  <div class="logo justify-content-center">
<div class="row">
  <div class="col-12 my-auto">
    <img src="/img/pcaLogo.png">
    <span class="title">PCA</span>
  </div>
      </div>
    </div>
      <h5>Dashboard</h5>
      <div class="divider">
      </div>
      <a href="/admin/dashboard"><div class="option">
        <div class="row no-gutters">
            <div class="col-3 my-auto">
            <img src="/img/baseline_leaderboard_white_18dp.png">
            </div>
            <div class="col-9 my-auto">
            <span>Dashboard</span>
            </div>
        </div>
      </div></a>
      <div class="divider">
      </div>
      <br>
      <br>
      <h5>My Profile</h5>
      <div class="divider">
      </div>
      <a href="/user/profile/"><div class="option">
        <div class="row no-gutters">
            <div class="col-3 my-auto">
            <img src="/img/baseline_account_circle_white_18dp.png">
            </div>
            <div class="col-9 my-auto">
            <span>My Profile</span>
            </div>
        </div>
        </div></a>
        <div class="divider">
        </div>
        <br>
        <br>
      @can('manage-users')
      <h5>Admin</h5>
      <div class="divider">
      </div>
        <a href="/admin/contact"><div class="option">
          <div class="row no-gutters">
              <div class="col-3 my-auto">
                <img src="/img/baseline_mail_white_18dp.png">
              </div>
              <div class="col-9 my-auto">
              <span>Inbox</span>
              </div>
              </div>
            </div></a>
            <div class="divider">
            </div>
        <div class="option">
          <a href="/admin/users"><div class="row no-gutters">
              <div class="col-3 my-auto">
              <img src="/img/baseline_people_alt_white_18dp.png">
              </div>
              <div class="col-9 my-auto">
              <span>User Management</span>
              </div>
          </div>
      </div></a>
      <div class="divider">
      </div>
      <div class="option">
        <a href="/admin/users/create"><div class="row no-gutters">
            <div class="col-3 my-auto">
            <img src="/img/baseline_person_add_alt_1_white_18dp.png">
            </div>
            <div class="col-9 my-auto">
            <span>Create New User</span>
            </div>
        </div>
    </div></a>
    <div class="divider">
    </div>
  <a href="/admin/pages"><div class="option">
    <div class="row no-gutters">
        <div class="col-3 my-auto">
          <img src="/img/baseline_text_snippet_white_18dp.png">
        </div>
        <div class="col-9 my-auto">
        <span>Manage Pages</span>
        </div>
    </div>
</div></a>
<div class="divider">
</div>
<a href="/policy-docs"><div class="option">
  <div class="row no-gutters">
      <div class="col-3 my-auto">
        <img src="/img/baseline_folder_white_18dp.png">
      </div>
      <div class="col-9 my-auto">
      <span>Policy Documents</span>
      </div>
  </div>
</div></a>
<div class="divider">
</div>
@endcan
@can('manage-events')
<br>
<br>
<h5>Events</h5>
<div class="divider">
</div>
  <div class="option">
    <a href="/event-manager/index"><div class="row no-gutters">
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
    <img src="/img/baseline_event_note_white_18dp.png">
    </div>
    <div class="col-9 my-auto">
    <span>Event Applications</span>
    </div>
</div>
</div>
<div class="divider">
</div>
<br>
<br>
@endcan
@can('view-policy')
<h5>Committee Member</h5>
<div class="divider">
</div>
<div class="option">
  <div class="row no-gutters">
      <div class="col-3 my-auto">
      <img src="/img/baseline_confirmation_number_white_18dp.png">
      </div>
      <div class="col-9 my-auto">
      <span>My Events</span>
      </div>
  </div>
  </div>
  <div class="divider">
  </div>
  <div class="option">
    <div class="row no-gutters">
        <div class="col-3 my-auto">
        <img src="/img/baseline_folder_special_white_18dp.png">
        </div>
        <div class="col-9 my-auto">
        <span>View Policies</span>
        </div>
    </div>
    </div>
    <div class="divider">
    </div>
    <br>
<br>
@endcan
@can('manage-news')
<h5>News</h5>
<div class="divider">
</div>
<a href="/news/index"><div class="option">
  <div class="row no-gutters">
      <div class="col-3 my-auto">
      <img src="/img/baseline_article_white_18dp.png">
      </div>
      <div class="col-9 my-auto">
      <span>Manage News</span>
      </div>
  </div>
  </div></a>
  <div class="divider">
  </div>
  <a href="/news/create"><div class="option">
    <div class="row no-gutters">
        <div class="col-3 my-auto">
        <img src="/img/baseline_create_white_18dp.png">
        </div>
        <div class="col-9 my-auto">
        <span>Create News Story</span>
        </div>
    </div>
    </div></a>
    <div class="divider">
    </div>
  <br>
<br>
@endcan
<a href="/user/settings"><div class="option">
  <div class="row no-gutters">
      <div class="col-3 my-auto">
        <img src="/img/baseline_settings_white_18dp.png">
      </div>
      <div class="col-9 my-auto">
      <span>Account Settings</span>
      </div>
  </div>
</div></a>
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
<a href="/logout" onclick="event.preventDefault();
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
  <form id="logout-form" action="/logout" method="POST" style="display: none;">
    @csrf
  </form>
<div class="divider">
</div>
<br>
        </div>
