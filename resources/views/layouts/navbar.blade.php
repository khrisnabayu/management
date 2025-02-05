<nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion" style="border-bottom: 3px solid ; border-bottom-color: #0061f2;">
  <a class="navbar-brand" href="#">Dashboard </a>
  <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle" href="#"><i data-feather="menu"></i></button>

  <ul class="navbar-nav align-items-center ml-auto">

      <li class="nav-item dropdown no-caret mr-2 dropdown-user">
        @if(is_null(auth()->user()->image_path ) or auth()->user()->image_path == '' )
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="{{ asset('admin_assets2/assets/img/freepik/profiles/profile-1.png') }}" /></a>
        @else 
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="/image_profile/{{ auth()->user()->image_path }}" /></a>
        @endif
            <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                <h6 class="dropdown-header d-flex align-items-center">
                @if(is_null(auth()->user()->image_path ) or auth()->user()->image_path == '' )
                    <img class="dropdown-user-img" src="{{ asset('admin_assets2/assets/img/freepik/profiles/profile-1.png') }}" />
                @else 
                    <img class="dropdown-user-img" src="/image_profile/{{ auth()->user()->image_path }}" />
                @endif
                    <div class="dropdown-user-details">
                        <div class="dropdown-user-details-name">{{ auth()->user()->name }}</div>
                        <div class="dropdown-user-details-email">{{ auth()->user()->email }}</div>
                    </div>
                </h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('profile') }}">
                    <div class="dropdown-item-icon"><i data-feather="user"></i></div>
                    Edit Profil
                </a>
                <a class="dropdown-item" href="{{ route('password') }}">
                    <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                    Change Password
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}">
                    <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                    Logout
                </a>
          </div>
      </li>
  </ul>
</nav>