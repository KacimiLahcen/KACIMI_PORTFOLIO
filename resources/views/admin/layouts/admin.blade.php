<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Portfolio Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&family=Inter:wght@500;700;800;900&display=swap" rel="stylesheet">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('import/assets/admin/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('import/assets/admin/vendors/css/vendor.bundle.base.css')}}">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('import/assets/admin/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('import/assets/admin/images/favicon.ico')}}" />
  </head>
  <body>
    <div class="container-scroller">
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo admin-brand" href="{{ route('admin.index')}}"><span>&lt;Kacimi</span>/&gt;</a>
          <a class="navbar-brand brand-logo-mini admin-brand-mini" href="{{ route('admin.index')}}">K.</a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="{{ route('admin.portfolio.search') }}" method="GET">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" name="search" placeholder="Search projects" required>
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-none d-lg-block">
              <a class="nav-link admin-view-site" href="{{ route('home') }}" target="_blank">
                <i class="mdi mdi-open-in-new me-1"></i>
                View site
              </a>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.index')}}">
                <span class="menu-title">Home</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.aboutme.index')}}">
                <span class="menu-title">About Me</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-qualification" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Qualifications</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="ui-qualification">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('admin.qualification.edu') }}">Education</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('admin.qualification.exp') }}">Experience</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('admin.qualification.index') }}">Show All</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-portfolio" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Portfolios</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
              <div class="collapse" id="ui-portfolio">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('admin.category.index') }}">Category</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('admin.portfolio.index') }}">Portfolio</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.service.index') }}">
                <span class="menu-title">Services</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.skill.index') }}">
                <span class="menu-title">Skills</span>
                <i class="mdi mdi-puzzle menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.review.index') }}">
                <span class="menu-title">Reviews</span>
                <i class="mdi mdi-thumbs-up-down menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.setting.index') }}">
                <span class="menu-title">Settings</span>
                <i class="mdi mdi-settings menu-icon"></i>
              </a>
            </li>

            <li class="nav-item sidebar-actions">
              <span class="nav-link">
              <a href="{{ route('admin.portfolio.create') }}" class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add project</a>
              <form method="POST" action="{{ route('logout') }}">
               @csrf
                <button class="btn btn-block btn-lg btn-danger mt-3">Sign out</button>
              </form>
              </span>
            </li>
          </ul>
        </nav>
        <div class="main-panel">
          <div class="content-wrapper">
              @if (Session::has('message'))
              <div class="alert alert-primary" role="alert">
                {{ Session::get('message') }}
              </div>
              @endif
        @yield('content')
    </div>
    </div>
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('import/assets/admin/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('import/assets/admin/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{ asset('import/assets/admin/js/jquery.cookie.js') }}" type="text/javascript"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('import/assets/admin/js/off-canvas.js')}}"></script>
  <script src="{{ asset('import/assets/admin/js/hoverable-collapse.js')}}"></script>
  <script src="{{ asset('import/assets/admin/js/misc.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="{{ asset('import/assets/admin/js/dashboard.js')}}"></script>
  <script src="{{ asset('import/assets/admin/js/todolist.js')}}"></script>
  <script src="{{ asset('import/assets/admin/js/file-upload.js')}}"></script>
  <!-- End custom js for this page -->
</body>
</html>
