{{-- navabar  --}}
<div class="header-navbar-shadow"></div>
<nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu
@if(isset($configData['navbarType'])){{$configData['navbarClass']}} @endif"
data-bgcolor="@if(isset($configData['navbarBgColor'])){{$configData['navbarBgColor']}}@endif">
  <div class="navbar-wrapper">
    <div class="navbar-container content">
      <div class="navbar-collapse" id="navbar-mobile">
        <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center" style="width: 50%;">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon bx bx-menu"></i></a></li>
          </ul>
          <ul class="nav navbar-nav" style="width: 100%;">
            <div class="search-input open">
              <div class="search-input-icon"><i class="bx bx-search primary"></i></div>
              <input class="input" type="text" placeholder="Search..." tabindex="-1" data-search="template-search">
              <ul class="search-list show"></ul>
            </div>
          </ul>
        </div>

        <ul class="nav navbar-nav float-right">
          <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon bx bxs-megaphone"></i> <span class="feedback">Feedback?</span></a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
              <li class="dropdown-menu-header">
                <div class="dropdown-header px-1 py-75 d-flex justify-content-between"><span class="notification-title">7 new Notification</span><span class="text-bold-400 cursor-pointer">Mark all as read</span></div>
              </li>
              <li class="scrollable-container media-list">
                <a class="d-flex justify-content-between" href="javascript:void(0)">
                  <div class="media d-flex align-items-center">
                    <div class="media-left pr-0">
                      <div class="avatar mr-1 m-0"><img src="{{asset('images/portrait/small/avatar-s-11.jpg')}}" alt="avatar" height="39" width="39"></div>
                    </div>
                    <div class="media-body">
                      <h6 class="media-heading"><span class="text-bold-500">Congratulate Socrates Itumay</span> for work anniversaries</h6><small class="notification-text">Mar 15 12:32pm</small>
                    </div>
                  </div>
                </a>
              </li>
              <li class="dropdown-menu-footer"><a class="dropdown-item p-50 text-primary justify-content-center" href="javascript:void(0)">Read all notifications</a></li>
            </ul>
          </li>
          <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon bx bxs-bell bx-tada bx-flip-horizontal"></i><span class="badge badge-pill badge-danger badge-up">5</span></a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
              <li class="dropdown-menu-header">
                <div class="dropdown-header px-1 py-75 d-flex justify-content-between"><span class="notification-title">7 new Notification</span><span class="text-bold-400 cursor-pointer">Mark all as read</span></div>
              </li>
              <li class="scrollable-container media-list">
                <a class="d-flex justify-content-between" href="javascript:void(0)">
                  <div class="media d-flex align-items-center">
                    <div class="media-left pr-0">
                      <div class="avatar mr-1 m-0"><img src="{{asset('images/portrait/small/avatar-s-11.jpg')}}" alt="avatar" height="39" width="39"></div>
                    </div>
                    <div class="media-body">
                      <h6 class="media-heading"><span class="text-bold-500">Congratulate Socrates Itumay</span> for work anniversaries</h6><small class="notification-text">Mar 15 12:32pm</small>
                    </div>
                  </div>
                </a>
              </li>
              <li class="dropdown-menu-footer"><a class="dropdown-item p-50 text-primary justify-content-center" href="javascript:void(0)">Read all notifications</a></li>
            </ul>
          </li>
          <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon bx bxs-help-circle"></i></a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
              <li class="dropdown-menu-header">
                <div class="dropdown-header px-1 py-75 d-flex justify-content-between"><span class="notification-title">7 new Notification</span><span class="text-bold-400 cursor-pointer">Mark all as read</span></div>
              </li>
              <li class="scrollable-container media-list">
                <a class="d-flex justify-content-between" href="javascript:void(0)">
                  <div class="media d-flex align-items-center">
                    <div class="media-left pr-0">
                      <div class="avatar mr-1 m-0"><img src="{{asset('images/portrait/small/avatar-s-11.jpg')}}" alt="avatar" height="39" width="39"></div>
                    </div>
                    <div class="media-body">
                      <h6 class="media-heading"><span class="text-bold-500">Congratulate Socrates Itumay</span> for work anniversaries</h6><small class="notification-text">Mar 15 12:32pm</small>
                    </div>
                  </div>
                </a>
              </li>
              <li class="dropdown-menu-footer"><a class="dropdown-item p-50 text-primary justify-content-center" href="javascript:void(0)">Read all notifications</a></li>
            </ul>
          </li>
          <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon bx bxs-user"></i></a>
            <div class="dropdown-menu dropdown-menu-right pb-0">
              <div class="p-1">
                <strong>{{ Auth::user()->user_name }}</strong><br><small>{{ Auth::user()->email }}</small>
              </div>
              <div class="dropdown-divider mb-0"></div>
              <a class="dropdown-item" href="{{asset('page/user/profile')}}"><i class="bx bx-user mr-50"></i> Profile</a>
              <a class="dropdown-item" href="{{route('logout')}}"><i class="bx bx-power-off mr-50"></i> Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
