{{-- vertical-menu --}}
@if($configData['mainLayoutType'] == 'vertical-menu')
<div class="main-menu menu-fixed @if($configData['theme'] === 'light') {{"menu-light"}} @else {{'menu-dark'}} @endif menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="navbar-header" style="margin-left: 5px; margin-top: 5px">
    <ul class="nav navbar-nav flex-row">
      <li class="dropdown">
        <a href="#" class="navbar-brand dropdown-toggle custom-new-business" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          <i class="bx bx-briefcase custom-logo"></i>
          <h2 class="brand-text mb-0">
            New Business
          </h2>
          <span class="custom-edit-span">Edit</span>
        </a>

          <ul class="dropdown-menu">
            <li>
              <a href="#" class="navbar-brand custom-new-account">
                <i class="bx bx-plus custom-logo"></i>
                <h2 class="brand-text mb-0">New account</h2>
              </a>
            </li>
          </ul>
        </li>
    </ul>
  </div>
  <div class="shadow-bottom"></div>
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
        @if(!empty($menuData[0]) && isset($menuData[0]))
        @foreach ($menuData[0]->menu as $menu)
            @if(isset($menu->navheader))
                <li class="navigation-header text-truncate"><span>{{$menu->navheader}}</span></li>
            @else
            <li class="nav-item {{ Route::currentRouteName() === $menu->slug ? 'active open' : '' }}">
            <a class="fonticon-container" href="@if(isset($menu->url)){{asset($menu->url)}} @endif" @if(isset($menu->newTab)){{"target=_blank"}}@endif>
                @if(isset($menu->icon))
                  <div class="fonticon-wrap">
                    <i class="bx {{$menu->icon}}"></i>
                  </div>
                @endif
                @if(isset($menu->name))
                    <span class="menu-title text-truncate">{{ __('locale.'.$menu->name)}}</span>
                @endif
                @if(isset($menu->tag))
                <span class="{{$menu->tagcustom}} ml-auto">{{$menu->tag}}</span>
                @endif
            </a>
            @if(isset($menu->submenu))
                @include('panels.sidebar-submenu1',['menu' => $menu->submenu])
            @endif
            </li>
            @endif
        @endforeach
        @endif
    </ul>
  </div>
</div>
@endif
