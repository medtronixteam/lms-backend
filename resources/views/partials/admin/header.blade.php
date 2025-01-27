<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
     <h3>Student Management</h3>

    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

      <ul class="navbar-nav navbar-nav-right">


        <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle  pl-0 pr-0" href="#" data-toggle="dropdown" id="profileDropdown">
            <i class="typcn typcn-user-outline mr-0"></i>
            <span class="nav-profile-name">{{auth()->user()->name}}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}">
            <i class="typcn typcn-power text-primary"></i>
            Logout
            </a>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="typcn typcn-th-menu"></span>
      </button>
    </div>
  </nav>
