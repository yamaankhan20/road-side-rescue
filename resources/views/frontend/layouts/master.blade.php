<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Roadside Rescue - Home</title>
        <link rel="icon" href="{{ asset('frontend_assets/images/logo.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('frontend_assets/images/logo.png') }}" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/style.css') }}">
		<script type="text/javascript" src="{{ asset('frontend_assets/js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('frontend_assets/js/owl.carousel.min.js') }}"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-yFjZbTYRCJodnuyGlsKamNE/LlEaEAxSUDe5+u61mV8zzqJVFOH7TnULE2/PP/l5vKWpUNnF4VGVkXh3MjgLsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	</head>
	<body>

		<header id="masthead" class="site-header navbar-static-top navbar-light" role="banner">
	        <div class="container">
	            <nav class="navbar navbar-expand-xl p-0">
	                <div class="navbar-brand">
	                    <a href="javascript:;">
	                        <img src="{{ asset('frontend_assets/images/logo.png') }}" alt="Roadside Rescue">
	                    </a>

	                </div>
	                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
	                    <span class="navbar-toggler-icon"></span>
	                </button>

	                <div id="main-nav" class="collapse navbar-collapse justify-content-center">
	                	<ul id="menu-main-menu" class="navbar-nav">
	                		<li class="menu-item">
	                			<a href="javascript:;" class="nav-link">Home</a>
	                		</li>
	                		<li class="menu-item">
	                			<a href="javascript:;" class="nav-link">About us</a>
	                		</li>
	                		<li class="menu-item">
	                			<a href="javascript:;" class="nav-link">Services</a>
	                		</li>
	                		<li class="menu-item">
	                			<a href="javascript:;" class="nav-link">Book a service</a>
	                		</li>
	                	</ul>
	                </div>
	            	<div class="xtra_links">
	                    <a href="{{Route('adminlogin')}}" class="login">log in</a>
	                    <a href="{{Route('register')}}" class="signup">Sign up</a>
	                </div>
	            </nav>
	        </div>
		</header>


        @yield('content')


		<div class="footer-widget">
			<div class="container">
				<div class="col_full">
					<h2 class="text-center">Let’s stay connected</h2>
					<div class="newsletter">
						<form class="news_form" action="" method="Post">
							<div class="field">
								<input class="form-control" type="email" name="email" placeholder="Your Email" required>
							</div>
							<div class="text-center">
								<input type="submit" name="submit" class="btn-custom" value="Subscribe">
							</div>
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-md-4">
						<div class="widget">
							<h3>Roadside rescue</h3>
							<p class="ft-18">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod.</p>
						</div>
					</div>
					<div class="col-12 col-md-4">
						<div class="widget">
							<h3>Quick links</h3>
							<ul>
								<li>
									<a href="javascript:;">Home</a>
								</li>
								<li>
									<a href="javascript:;">About Us</a>
								</li>
								<li>
									<a href="javascript:;">Services</a>
								</li>
								<li>
									<a href="javascript:;">Book a Service</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-12 col-md-4">
						<div class="widget">
							<h3>Contact us</h3>
							<ul>
								<li>
									<a href="tel:(123-456-789)">123-456-789</a>
								</li>
								<li>
									<a href="mailto:(info@yourcompany.com)">info@yourcompany.com</a>
								</li>
								<li>
									<a href="javascript:;">0000 west ryan dr. savannah,aa 0000</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<footer class="footer">
			<div class="container">
				<div class="site-info">
					Copyright © 2024 <a href="javascript:;">ROADSIDE RESCUE</a>. All Rights Reserved
				</div>
			</div>
		</footer>

	</body>
</html>
