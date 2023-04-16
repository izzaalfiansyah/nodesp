<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('assets') }}/vendors/feather/feather.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('assets') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('assets') }}/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="{{ route('dashboard') }}"><img src="{{ asset('assets') }}/images/logo.svg" class="mr-2" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard') }}"><img src="{{ asset('assets') }}/images/logo-mini.svg" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('keadaan.index') }}">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Data Keadaan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#logout" data-toggle="modal" data-target="#logout">
              <i class="icon-ban menu-icon"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023. <a href="https://izzaalfiansyah.vercel.app" target="_blank">Muhammad Izza Alfiansyah</a>.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <div class="modal fade" id="logout">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Logout</h4>
        </div>
        <div class="modal-body">
          <p>Anda yakin akan mengakhiri sesi?</p>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" data-dismiss="modal">Batal</button>
          <a href="{{ route('logout') }}" class="btn btn-danger">Keluar</a>
        </div>
      </div>
    </div>
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('assets') }}/vendors/js/vendor.bundle.base.js"></script>
  <script src="{{ asset('assets') }}/vendors/chart.js/Chart.min.js"></script>
  <script src="{{ asset('assets') }}/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="{{ asset('assets') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="{{ asset('assets') }}/js/dataTables.select.min.js"></script>
  <script src="{{ asset('assets') }}/js/off-canvas.js"></script>
  <script src="{{ asset('assets') }}/js/hoverable-collapse.js"></script>
  <script src="{{ asset('assets') }}/js/template.js"></script>
  <script src="{{ asset('assets') }}/js/settings.js"></script>
  <script src="{{ asset('assets') }}/js/todolist.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.5/axios.min.js" integrity="sha512-nnNHpffPSgINrsR8ZAIgFUIMexORL5tPwsfktOTxVYSv+AUAILuFYWES8IHl+hhIhpFGlKvWFiz9ZEusrPcSBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  @yield('script')
</body>

</html>