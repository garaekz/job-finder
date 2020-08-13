<!doctype html>
<html lang="en">
<head>

<!-- Basic Page Needs
================================================== -->
<title>Job Search</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="icon" href="assets/images/fav.png" type="image/gif" sizes="64x64">

<!-- CSS
================================================== -->
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&display=swap&subset=latin-ext" rel="stylesheet">
<link rel="stylesheet" href="assets/css/all.min.css">
<link href="assets/css/aos.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link href="assets/css/select2.min.css" rel="stylesheet" />
<link href="assets/css/owl.carousel.min.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/color-1.css">
</head>
<body>

<!-- Header 01
================================================== -->
<header class="header_01 {{ Route::currentRouteName() !== 'welcome' ? 'header_inner':'' }}">
	<div class="header_main">
		<div class="header_menu fixed-top">
			<div class="container">
				<div class="header_top">
					<div class="logo">
						<a href="{{ url('/') }}">
							<img  alt="JoDice" class="img-fluid" src="assets/images/dice-logo.png">
						</a>
					</div>
					<div class="navigation">
						<nav>
							<div class="hamburger hamburger--spring js-hamburger ">
						        <div class="hamburger-box">
						          <div class="hamburger-inner"></div>
						        </div>
						      </div>
							<ul>
								<li class="current_page">
									<a href="{{ url('/') }}" >Inicio</a>
								</li>
								<li class="has-sub-menu">
									<a href="index.html">Job Seekers</a>
									<ul class="sub-menu">
										<li>
											<a href="job-seeker-dashboard.html">Job dashboard</a>
										</li>
										<li>
											<a href="browse-jobs.html">Browse jobs</a>
										</li>

										<li>
											<a href="job-single.html">Job single</a>
										</li>

										<li>
											<a href="my-stared-jobs.html">My stared jobs</a>
										</li>
										<li>
											<a href="staff-profile-single.html">Job seeker profile</a>
										</li>
										<li>
											<a href="edit-profile.html">Update my profile</a>
										</li>

										<li>
											<a href="edit-password.html">Change password</a>
										</li>
										<li>
											<a href="registration.html">Registration</a>
										</li>
										<li>
											<a href="browse-companies.html">Browse companies</a>
										</li>
									</ul>
								</li>


								<li class="has-sub-menu">
									<a href="index.html#">For employers</a>
									<ul class="sub-menu">
										<li>
											<a href="job-dashboard.html">Job dashboard</a>
										</li>
										<li>
											<a href="post-a-job.html">Post a job</a>
										</li>
										<li>
											<a href="my-job-listing.html">My Jobs listing</a>
										</li>
										<li>
											<a href="find-staff.html">Find staff</a>
										</li>
										<li>
											<a href="compnay-profile-single.html">Company profile</a>
										</li>

										<li>
											<a href="emp-edit-profile.html">Update profile</a>
										</li>
										<li>
											<a href="emp-edit-password.html">Change password</a>
										</li>
										<li>
											<a href="emp-registration.html">Employer registration</a>
										</li>
									</ul>
								</li>

								<li class="has-sub-menu">
									<a href="index.html#">Pages</a>
									<ul class="sub-menu">

										<li>
											<a href="blog.html">blog</a>
										</li>
										<li>
											<a href="blog-single.html">Blog single</a>
										</li>
										<li>
											<a href="contact-us.html">Contact us</a>
										</li>
										<li>
											<a href="plan-page.html">Membership Plans</a>
										</li>
										<li>
											<a href="{{ route('login') }}">Login</a>
										</li>
										<li>
											<a href="lost-password.html">Lost password</a>
										</li>
										<li>
											<a href="user-interface-elements.html">User interface elements</a>
										</li>
										<li>
											<a href="404.html">404</a>
										</li>
									</ul>
								</li>
							</ul>
                        </nav>
                        @if (Route::has('login'))
                            <div class="top-right links">
                                @auth
                                <div class="ac_nav after_login_ac_nav">
                                      <div class="login_pop after_login">
                                        <button class="btn btn-primary withdp"><img alt=""  src="assets/images/profile-5.png"> Hi Salome Simoes  <i class="fas fa-caret-down"></i></button>
                                        <div class="login_pop_box login_pop_box_menu">
                                          <div class="login_pop_box_head">
                                            <div class=" ">
                                              <img alt=""  src="assets/images/profile-5.png">
                                              <span>London, United Kingdom</span>
                                              <h5>Salome Simoes</h5>
                                              <h6>Magento Certified Developer</h6>
                                            </div>
                                          </div>
                                          <ul>
                                            <li>
                                              <a href="browse-jobs.html"><i class="fas fa-search"></i> Browse Jobs </a>
                                            </li>
                                            <li>
                                              <a href="my-stared-jobs.html"><i class="fas fa-star"></i> View My Stared Jobs</a>
                                            </li>
                                            <li>
                                              <a href="edit-profile.html"><i class="fas fa-user"></i> Update My Profile</a>
                                            </li>
                                            <li>
                                              <a href="edit-password.html"><i class="fas fa-key"></i>Change Password</a>
                                            </li>
                                            <li>
                                              <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                  <i class="fas fa-power-off"></i> Logout
                                              </a>
                                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                  @csrf
                                              </form>
                                            </li>
                                          </ul>
                                        </div>
                                      </div>
                                      <div class="login_pop after_login">
                                        <button class="btn btn-msg">
                                          <i class="fas fa-envelope"></i>
                                          <span class="msg-count">2</span>
                                         </button>
                                        <div class="login_pop_box job_seekernotifi ">
                                            <h6>Inbox</h6>
                                            <ul>
                                              <li><img alt=""   src="assets/images/c-logo-02.webp"><a href="staff-profile-single.html#"> Thanks for applying this job, our HR team will contact you soon</a> </li>
                                              <li><img alt=""   src="assets/images/profile-5.png"><a href="staff-profile-single.html#">You updated your profile picture .</a> </li>
                                            </ul>
                                        </div>
                                      </div>
                                  </div>
                                @else
                                    <div class="ac_nav">
                                        <div class="login_pop">
                                            <button class="btn btn-primary">Ingresar / Registrarse <i class="fas fa-caret-down"></i></button>
                                            <div class="login_pop_box">
                                                <span class="twobtn_cont">
                                                    <a class=" signjs_btn" href="{{ route('register') }}">
                                                    <span>Aspirante</span> Registrarse
                                                    <i class="far fa-user"></i>
                                                    </a>
                                                <a class=" signrs_btn" href="{{ route('register', ['type' => 'empresa']) }}">	<span>EMPRESAS</span> Registrarse
                                                    <i class="fas fa-landmark"></i>
                                                </a>
                                                </span>
                                                <div>
                                                    <span class="member_btn">¿Ya eres miembro?</span>
                                                    <a class="lgin_btn btn btn-primary" href="{{ route('login') }}">
                                                            Login
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endauth
                            </div>
                        @endif
					</div>
				</div>
			</div>
		</div>
		@yield('header')
	</div>
</header>


<!-- End Header 02
================================================== -->



<!-- Main
================================================== -->
<main>
    @yield('content')
</main>


<!-- Footer Container
================================================== -->
<footer id="colophon" class="site-footer custom_footer dark_footer">
	<div class="container">
		<div class="row footer_widget">
				<div class="col-md-3">
					<div class="footer_widget_box">
						<h2 data-aos="fade-up" data-aos-delay="400">Job seekers</h2>
						<ul data-aos="fade-in" data-aos-delay="200">
							<li>
								<a href="browse-jobs.html">Browse jobs</a>
							</li>
							<li>
								<a href="job-single.html">Job single</a>
							</li>
							<li>
								<a href="my-stared-jobs.html">My stared jobs</a>
							</li>
							<li>
								<a href="edit-profile.html">Update my profile</a>
							</li>
							<li>
								<a href="edit-password.html">Change password</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer_widget_box">
						<h2 data-aos="fade-up" data-aos-delay="400">Employers</h2>
						<ul data-aos="fade-in" data-aos-delay="200">
							<li>
								<a href="emp-registration.html">Get a FREE Employer Account</a>
							</li>
							<li>
								<a href="post-a-job.html">Post a job</a>
							</li>
							<li>
								<a href="find-staff.html">Find staff</a>
							</li>
							<li>
								<a href="job-dashboard.html">Job dashboard</a>
							</li>
							<li>
								<a href="emp-edit-profile.html">Update profile</a>
							</li>
							<li>
								<a href="emp-edit-password.html">Change password</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer_widget_box">
						<h2 data-aos="fade-up" data-aos-delay="400">Community</h2>
						<ul data-aos="fade-in" data-aos-delay="200">
							<li> <a href="contact-us.html">Help / Contact Us</a>
				            </li>
				            <li> <a href="content-page.html">Guidelines</a>
				            </li>
				            <li> <a href="content-page.html">Terms of Use</a>
				            </li>
				            <li> <a href="content-page.html">Privacy &amp; Cookies </a>
				            </li>
						</ul>

					</div>
				</div>
				<div class="col-md-3">
					<div class="footer_widget_box">
						<h2 data-aos="fade-up" data-aos-delay="400">Get In Touch</h2>
						<ul data-aos="fade-in" data-aos-delay="200" class="social_list">
							<li> <a href="index.html#"><i class="fab fa-twitter"></i></a>
							</li>
							<li> <a href="index.html#"><i class="fab fa-facebook"></i></a>
							</li>
							<li> <a href="index.html#"><i class="fab fa-linkedin"></i></a>
							</li>
							<li> <a href="index.html#"><i class="fab fa-youtube"></i></a>
							</li>
						</ul>

					</div>

          <div class="footer_widget_box">
						<form class="newsletter">
			                  <h2 data-aos="fade-up" data-aos-delay="400">Newsletter</h2>
			                  <div data-aos="fade-in" data-aos-delay="200" class="d-flex">

			                    <input class="form-control" type="email" placeholder="Enter your email ">
			                    <button class="btn btn-primary"><i class="fa fa-paper-plane"></i></button>

			                  </div>

		                </form>
		            </div>
				</div>
				<div class="col-md-12">
					<div class="footer_widget_box"  >
						<p class="copyright-text">© Copyright 2020 by JoDice. All rights reserved.
						</p>
					</div>
				</div>
			</div>
		<!-- .site-info -->
	</div>
</footer>


<!-- End Footer Container
================================================== -->

<!-- Scripts
================================================== -->
<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/aos.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>

{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
 --}}
