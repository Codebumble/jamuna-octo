@php
$configData = Helper::applClasses();
@endphp
<div class="main-menu menu-fixed {{(($configData['theme'] === 'dark') || ($configData['theme'] === 'semi-dark')) ? 'menu-dark' : 'menu-light'}} menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="navbar-header">
    <ul class="nav navbar-nav flex-row">
      <li class="nav-item me-auto">
        <a class="navbar-brand" href="{{url('/')}}">
          <span class="brand-logo">
            <img src="{{env('APP_SHORT_LOGO')}}" width="35" height="31.5"/>
          </span>
          <h3 class="brand-text">{{ env("APP_NAME")}}</h3>
        </a>
      </li>
      <li class="nav-item nav-toggle">
        <a class="nav-link modern-nav-toggle pe-0" data-toggle="collapse">
          <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
          <i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc" data-ticon="disc"></i>
        </a>
      </li>
    </ul>
  </div>
  <div class="shadow-bottom"></div>
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    <li class="navigation-header">
        <span>Login As</span>
        <i data-feather="more-horizontal"></i>
      </li>

      <li class="nav-item mb-1">
        <a href="javascript:void(0)" class="d-flex align-items-center border border-primary rounded">
          <span class="avatar">

              <img
                      class="round" style="object-fit: cover;"
                      <?php
                      if(!isset(Auth::user()->avatar)){ ?>
                      src="{{ Auth::user()->profile_photo_url }}"
                      <?php } else { ?>
                      src="/profile-images/{{Auth::user()->avatar}}"
                      <?php } ?>
                      height="30"
                      width="30"
                      alt="avatar"
                    >
            <span class="avatar-status-online"></span>
          </span>
          <div class="d-flex flex-column ms-1">
            <span class="fw-bolder">{{Auth::user()->name}}</span>
            <span class="user-status fs-6">{{Auth::user()->designation}}</span>
          </div>

        </a>
        <ul class="menu-content mb-2">
          <li>
          <a class="d-flex align-items-center" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="me-50" data-feather="power"></i>
            <span class="menu-item text-truncate">Logout</span>
          </a>
          <form method="POST" id="logout-form" action="{{ route('logout') }}">
            @csrf
          </form>
          </li>
        </ul>
      </li>
      {{-- Foreach menu item starts --}}
      @if(isset($menuData[0]))
      @foreach($menuData[0]->menu as $menu)
      @php
      $power_build = [
            'super-admin' => '0',
            'admin' => '1',
            'manager' => '2',
            'employee' => '3',
            'sub-employee' => '4',

          ];
      @endphp
      @if(isset($menu->navheader))

          @if($power_build[Auth::user()->role] <= $menu->permission)
      <li class="navigation-header">
        <span>{{ __(''.$menu->navheader) }}</span>
        <i data-feather="more-horizontal"></i>
      </li>
      @endif
      @else
      {{-- Add Custom Class with nav-item --}}
      @php
      $custom_classes = "";
      if(isset($menu->classlist)) {
      $custom_classes = $menu->classlist;
      }
      @endphp
      @if($power_build[Auth::user()->role] <= $menu->permission)
      <li class="nav-item {{ $custom_classes }} {{Route::currentRouteName() === $menu->slug ? 'active' : ''}}">
        <a href="{{isset($menu->url)? url($menu->url):'javascript:void(0)'}}" class="d-flex align-items-center" target="{{isset($menu->newTab) ? '_blank':'_self'}}">
          <i data-feather="{{ $menu->icon }}"></i>
          <span class="menu-title text-truncate">{{ __(''.$menu->name) }}</span>
          @if (isset($menu->badge))
          <?php $badgeClasses = "badge rounded-pill badge-light-primary ms-auto me-1" ?>
          <span class="{{ isset($menu->badgeClass) ? $menu->badgeClass : $badgeClasses }}">{{$menu->badge}}</span>
          @endif
        </a>
        @if(isset($menu->submenu))
        @include('panels/submenu', ['menu' => $menu->submenu])
        @endif
      </li>
      @endif
      @endif
      @endforeach
      @endif
      {{-- Foreach menu item ends --}}
    </ul>
  </div>
</div>
<!-- END: Main Menu-->
