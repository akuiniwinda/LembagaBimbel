<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>eLearning Admin</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('assetsbackend/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('assetsbackend/css/styles.min.css') }}" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Sidebar Start -->
    @include('layout.backend.sidebar')
    <!--  Sidebar End -->

    <!--  Main wrapper -->
    <div class="body-wrapper">

      <!--  Header Start -->
      @include('layout.backend.navbar')
      <!--  Header End -->

      <!-- Main Content-->
      @yield('content')
      <!-- End Main Content-->

    </div>
  </div>
  @include('layout.backend.script')
</body>

</html>
