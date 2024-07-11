
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mofi admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Mofi admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('backend_assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('backend_assets/images/favicon.png')}}" type="image/x-icon">
    <title>Mofi - Premium Admin Template</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/font-awesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/vendors/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/vendors/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/vendors/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/vendors/feather-icon.css')}}">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/vendors/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{ asset('backend_assets/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/responsive.css')}}">
</head>
<body>
<!-- login page start-->
<div class="container-fluid p-0">
    <div class="row m-0">
        <div class="col-xl-7 p-0"><img class="bg-img-cover bg-center" src="{{ asset('frontend_assets/images/vector.png') }}" alt="looginpage"></div>
        <div class="col-xl-5 p-0">
            <div class="login-card login-dark">
                <div>
                  <h1 class="text-center mb-3">{{config('app.name')}}</h1>
                    <div class="login-main">
                        <form class="theme-form" action="{{ route('register') }}" method="post">
                            @csrf
                            <h4>{{ __('Register') }}</h4>
                            <p>Enter your personal details to create account</p>
                            <div class="form-group">
                                <label class="col-form-label pt-0">Your Full Name</label>
                                <div class="row g-2">
                                    <div class="col-12">
                                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" required="" placeholder="Full name" value="{{ old('name') }}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">{{ __('Email Address') }}</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" required=""  value="{{ old('email') }}" placeholder="Test@gmail.com">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">{{ __('Password') }}</label>
                                <div class="form-input position-relative">
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password"  required="" placeholder="*********">

                                    <div class="show-hide"><span class="show"></span></div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">{{ __('Confirm Password') }}</label>
                                <div class="form-input position-relative">
                                    <input id="password-confirm" class="form-control @error('password') is-invalid @enderror"  type="password" name="password_confirmation"  required="" placeholder="*********">

                                    <div class="show-hide"><span class="show"></span></div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                                <div class="col-md-12">
                                    <select id="role" class="form-select @error('role') is-invalid @enderror" name="role" required>
                                        <option value="">Select Role</option>
                                        <option value="vendor">Vendor</option>
                                        <option value="user">User</option>
                                    </select>

                                    @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                            <h6 class="text-muted mt-4 or">Or signup with</h6>
                            <div class="social mt-4">
                                <div class="btn-showcase">
                                    <a class="btn btn-light" href="{{ route('auth.google') }}">
                                        <i class="txt-linkedin" data-feather="google"></i> Google
                                    </a>
                                    <a class="btn btn-light" href="https://twitter.com/login?lang=en" target="_blank">
                                        <i class="txt-twitter" data-feather="twitter"></i>
                                        twitter
                                    </a><a class="btn btn-light" href="https://www.facebook.com/" target="_blank">
                                        <i class="txt-fb" data-feather="facebook"></i>facebook
                                    </a>
                                </div>
                            </div>
                            <p class="mt-4 mb-0 text-center">Already have an account?<a class="ms-2" href="{{route('adminlogin')}}">Sign in</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- latest jquery-->
    <script src="{{ asset('backend_assets/js/jquery.min.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('backend_assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('backend_assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{ asset('backend_assets/js/icons/feather-icon/feather-icon.js')}}"></script>
    <!-- scrollbar js-->
    <!-- Sidebar jquery-->
    <script src="{{ asset('backend_assets/js/config.js')}}"></script>
    <!-- Plugins JS start-->
    <!-- calendar js-->
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('backend_assets/js/script.js')}}"></script>
    <!-- Plugin used-->
</div>
</body>
</html>
