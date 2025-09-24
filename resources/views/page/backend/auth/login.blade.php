<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Elerning</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('assetsbackend/images/logos/logo-buku.svg') }}" />
  <link rel="stylesheet" href="{{ asset('assetsbackend/css/styles.min.css') }}" />
  <style>
    .custom-switch .form-check-input:checked {
        background-color: #06BACB;
        border-color: #06BACB;
    }

    .custom-switch .form-check-input:focus {
        box-shadow: 0 0 0 0.25rem rgba(6, 186, 203, 0.25);
    }

    .custom-switch .form-check-input {
        width: 3em;
        height: 1.5em;
    }

    .btn-custom {
      background-color: #07BCCD;
      color: white;
      text-decoration: none;
    }

    .btn-custom:hover {
      background-color: #0599b3;
      color: white;
    }
  </style>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="{{ asset('assetsbackend/images/logos/logo-elearning.png') }}" width="180" alt="">
                </a>
                <form action="{{ route('login.process') }}" method="POST">
                @csrf
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                  </div>
                 <button type="submit" class="btn btn-elearning w-100  m-1 8btn m-1 btn-custom fs-4 mb-4 rounded-2">Login</button>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('assetsbackend/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assetsbackend/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
