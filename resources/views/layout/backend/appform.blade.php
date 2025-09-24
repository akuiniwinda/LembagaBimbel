<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>eLearning Admin</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('assetsbackend/images/logos/logo-buku.svg') }}" />
  <link rel="stylesheet" href="{{ asset('assetsbackend/css/styles.min.css') }}" />
  @include('layout.backend.style')
      <!-- Favicon -->
    <link href="{{ asset('assetsfrontend/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assetsfrontend/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsfrontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assetsfrontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('assetsfrontend/css/style.css')}}" rel="stylesheet">
</head>

<body>
  <!--  Body Wrapper -->

    <!--  Main wrapper -->
    <div class="body-wrapper">

      <!--  Header Start -->
      @include('layout.frontend.navbar')
      <!--  Header End -->

      <!-- Main Content-->
      @yield('content')
      <!-- End Main Content-->

        <!-- Footer Start -->
        @include('layout.frontend.footer')
        <!-- Footer End -->

    </div>
  </div>
  @include('layout.backend.script')

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assetsfrontend/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assetsfrontend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assetsfrontend/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assetsfrontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
</body>

</html>
