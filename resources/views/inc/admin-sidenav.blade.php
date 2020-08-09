<div id="sidenav">
<div class="row">
  <div class="col-12 my-auto">
    <img src="/img/pcaLogo.png">
    <span class="title">PCA</span>
  </div>
      </div>
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
        </div>
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
@if('can:manage-users')
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
@endif
<a href="/admin/users/resetPass"><div class="option">
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
<a href="/logout">
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
<div id="resize" class="fixed-bottom col-2">
  <img src="/img/baseline_keyboard_backspace_white_18dp.png">
</div>
        </div>