
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
    <title>{{ config('app.name') }}</title>
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
              <div>
                  <a class="logo text-start" href="{{ route('frontendhome') }}">
                      <img class="for-light" src="{{ asset('frontend_assets/images/logo.png') }}" alt="looginpage">
                      <img class="img-fluid for-dark" src="{{ asset('backend_assets/') }}images/logo/logo_dark.png" alt="looginpage">
                  </a>
             </div>
              <div class="login-main">
                @if (session('no_time'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('no_time') }}
                    </div>
                @endif
                @if (session('Send_otp'))
                    <div class="alert alert-success" role="alert">
                        {{ session('Send_otp') }}
                    </div>
                @endif
                @if (session('expired'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('expired') }}
                    </div>
                @endif
                @if (session('wrong_opt'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('wrong_opt') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('verifiedOtp') }}" class="theme-form">
                @csrf
                  <h4>Email Verification</h4>
                  <p>Enter your OPT to get verified.</p>
                  <input type="hidden" name="email" value="{{ $email }}">
                  <div class="form-group">
                    <label class="col-form-label">Enter OTP</label>
                    <input class="form-control" id="opt"  type="number" name="otp" placeholder="Enter OTP" required class="form-control"  required autofocus>
                    @error('email')
                        <span class="" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group mb-0">
                    <div class="text-end mt-3">
                      <button class="btn btn-primary btn-block w-100" type="submit">Verify</button>
                    </div>
                  </div>

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
                <p class="time mt-2">1:30</p>
                <form method="get" id="resendOPT" action="{{ route('resendOtp') }}">
                     <input type="hidden" name="email" value="{{ $email }}">
                    <button class="btn btn-primary btn-block w-100" type="submit" id="resendOtpVerification">Resend Verification OTP</button>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
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
      
      <script>
      
          function timer()
            {
                var seconds = 30;
                var minutes = 0;
        
                var timer = setInterval(() => {
        
                    if(minutes < 0){
                        $('.time').text('You Can Resend OTP Now.');
                        clearInterval(timer);
                    }
                    else{
                        let tempMinutes = minutes.toString().length > 1? minutes:'0'+minutes;
                        let tempSeconds = seconds.toString().length > 1? seconds:'0'+seconds;
        
                        $('.time').text(tempMinutes+':'+tempSeconds);
                    }
        
                    if(seconds <= 0){
                        minutes--;
                        seconds = 30;
                    }
        
                    seconds--;
        
                }, 1000);
                
                
            }
            
            
             timer();
          
      </script>
    </div>
  </body>
</html>
