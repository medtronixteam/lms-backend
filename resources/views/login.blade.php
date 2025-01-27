<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Student Management</title>

  <link rel="stylesheet" href="{{url('dashboard/vendors/typicons.font/font/typicons.css')}}">
  <link rel="stylesheet" href="{{url('dashboard/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{url('dashboard/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{url('dashboard/images/favicon.png')}}">
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
               <h1>Login</h1>
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Log in to continue.</h6>
              <form  action="{{route('login.auth')}}" method="POST"  class="pt-3">
              @csrf
               @if (session('error'))
                         <div class="alert alert-danger">{{session('error')}}</div>
                        @endif
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" name="email" id="exampleInputEmail1" placeholder="email">
                  @error('email')
                     <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg"  name="password" id="exampleInputPassword1" placeholder="Password">
                   @error('password')
                     <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Login</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  {{-- <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me Login
                    </label>
                  </div> --}}
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{url('dashboard/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{url('dashboard/js/off-canvas.js')}}"></script>
  <script src="{{url('dashboard/js/hoverable-collapse.js')}}"></script>
  <script src="{{url('dashboard/js/template.js')}}"></script>
  <script src="{{url('dashboard/js/settings.js')}}"></script>
  <script src="{{url('dashboard/js/todolist.js')}}"></script>
  @include('flashy::message')
</body>

</html>
