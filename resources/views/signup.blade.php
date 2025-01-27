<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Student Management</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{url('dashboard/vendors/typicons.font/font/typicons.css')}}">
  <link rel="stylesheet" href="{{url('dashboard/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{url('dashboard/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{url('dashboard/images/favicon.png')}}" />
</head>

<body>
 <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-6 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <h1>Signup</h1>
              </div>

              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              @if (session('success'))
                 <div class="alert alert-danger">{{session('success')}}</div>
              @endif
              <form  action="{{route('signup.auth')}}" method="POST" class="pt-3">
                @csrf
                 @if (session('success'))
                 <div class="alert alert-danger">{{session('success')}}</div>
              @endif
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="name" id="exampleInputname1" placeholder="name">
                           @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg"  name="email" id="exampleInputEmail1" placeholder="Email">
                          @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" id="exampleInputPassword1" placeholder="Password">
                   @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="address" id="address" placeholder="Address">
                     @error('address')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control form-control-lg" name="phone" id="phone" placeholder="Phone Number">
                     @error('phone')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control form-control-lg" name="age" id="age" placeholder="Age">
                     @error('age')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                  </div>
                  <div class="form-group">

                    <select class="form-control" name="role" id="role">
                          <option value="admin">Admin</option>
                          <option value="accountant">Accountant</option>
                    </select>
                    @error('role')
                        <span class="text-warning">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      I agree to all Terms & Conditions
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="/login" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="{{url('dashboard/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{url('dashboard/js/off-canvas.js')}}"></script>
  <script src="{{url('dashboard/js/hoverable-collapse.js')}}"></script>
  <script src="{{url('dashboard/js/template.js')}}"></script>
  <script src="{{url('dashboard/js/settings.js')}}"></script>
  <script src="{{url('dashboard/js/todolist.js')}}"></script>
  @include('flashy::message')
  <!-- endinject -->
</body>

</html>
