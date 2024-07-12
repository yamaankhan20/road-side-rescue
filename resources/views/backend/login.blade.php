
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mofi admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Mofi admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('frontend_assets/images/logo.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('frontend_assets/images/logo.png') }}" type="image/x-icon">
    <title>{{ $title }}</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/font-awesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/vendors/feather-icon.css') }}">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('backend_assets/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/responsive.css') }}">
  </head>
  <body>
    <!-- login page start-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-5"><img class="bg-img-cover bg-center" src="{{ asset('frontend_assets/images/vector.png') }}" alt="looginpage"></div>
        <div class="col-xl-7 p-0">
          <div class="login-card login-dark">
            <div>
              <div><a class="logo text-start" href="{{ route('frontendhome') }}"><img class="img-fluid for-light" src="{{ asset('frontend_assets/images/logo.png') }}" alt="looginpage"><img class="img-fluid for-dark" src="{{ asset('backend_assets/') }}images/logo/logo_dark.png" alt="looginpage"></a></div>
              <div class="login-main">
                @if (session('verify'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('verify') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="theme-form">
                @csrf
                  <h4>Sign in to account</h4>
                  <p>Enter your email & password to login</p>
                  <div class="form-group">
                    <label class="col-form-label">Email Address</label>
                    <input class="form-control" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Test@gmail.com">
                      @if (session('email'))
                          <span class="" role="alert">
                            <strong> {{ session('email') }}</strong>
                        </span>
                      @endif
                      @error('email')
                        <span class="" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Password</label>
                    <div class="form-input position-relative">
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="*********">
                      <div class="show-hide"><span class="show"></span></div>
                      @error('password')
                          <span class="" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group mb-0">
                    <div class="checkbox p-0">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="text-muted" for="checkbox1">Remember password</label>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                        Forgot password?
                        </a>
                    @endif

                    <div class="text-end mt-3">

                      <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                    </div>
                  </div>
                  <h6 class="text-muted mt-4 or">Or Sign in with</h6>
                  <div class="social mt-4">
                    <div class="btn-showcase"><a class="btn btn-light" href="{{ route('auth.google_login') }}" target="_blank"><i class="txt-linkedin" data-feather="google"></i> Google </a><a class="btn btn-light" href="https://twitter.com/login?lang=en" target="_blank"><i class="txt-twitter" data-feather="twitter"></i>twitter</a><a class="btn btn-light" href="https://www.facebook.com/" target="_blank"><i class="txt-fb" data-feather="facebook"></i>facebook</a></div>
                  </div>
                  <p class="mt-4 mb-0 text-center">Don't have account?<a href="{{ route('register') }}" class="ms-2">Create Account</a></p>
                  <script>
                    (function() {
                    'use strict';
                    window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                    }, false);
                    });
                    }, false);
                    })();

                  </script>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
      @php
        session()->forget('verify');
      @endphp
      <!-- latest jquery-->
      <script src="{{asset('backend_assets/js/jquery.min.js')}}"></script>
      <!-- Bootstrap js-->
      <script src="{{asset('backend_assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
      <!-- feather icon js-->
      <script src="{{asset('backend_assets/js/icons/feather-icon/feather.min.js')}}"></script>
      <script src="{{asset('backend_assets/js/icons/feather-icon/feather-icon.js')}}"></script>
      <!-- scrollbar js-->
      <!-- Sidebar jquery-->
      <script src="{{asset('backend_assets/js/config.js')}}"></script>
      <!-- Plugins JS start-->
      <!-- calendar js-->
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="{{asset('backend_assets/js/script.js')}}"></script>
      <!-- Plugin used-->
    </div>
  </body>
</html>
