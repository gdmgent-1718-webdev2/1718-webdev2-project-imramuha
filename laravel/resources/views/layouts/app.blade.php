<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta
		name="viewport" content="width=device-width, initial-scale=1">


		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'AquaLobby') }}</title>

		<!-- Fonts -->
		<link rel="dns-prefetch" href="https://fonts.gstatic.com">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
		<link
		href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

		<!-- Bootstrap core CSS -->

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">

		<!-- Scripts -->
		<!-- jQuery --><script src="https://code.jquery.com/jquery-3.6.0.min.js"> </script>

		<!-- Popper.js -->
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

		<!-- Bootstrap JS -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="{{ asset('js/app.js') }}" defer></script>
		<script src="{{ asset('/js/jquery.min.js') }}"></script>

	</head>

	<body>
		<div id="app" class="d-flex flex-column flex-shrink-0 min-vh-100 text-white bg-light">
			@guest
			<nav class="alHeadNavbar navbar navbar-dark">
				<a class="navbar-brand ml-3" href="{{route('dashboard')}}">AquaLobby</a>
				@else
				<nav class="alHeadNavbar navbar navbar-dark d-flex justify-content-between">
					<a class="navbar-brand ml-3" href="{{route('dashboard')}}">AquaLobby</a>
					<div>
						<!-- Right Side Of Navbar -->
						@endguest
						                    @guest
						<ul class="navbar-nav">
							<li class="navbar-brand">
								<span class="fas fa-toolbox">&nbsp;</span>Back-office
							</li>
						</ul>
						@else

						<ul
							class="navbar-nav d-flex flex-row">

							<!--<li class="nav-item mr-3">
							                            <a class="nav-link" href="#">
							                                <span class="fas fa-bell">&nbsp;</span>Notifications <span class="notification">27</span>
							                            </a>
							                        </li>-->


							<li class="nav-item dropdown mr-3">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="fa fa-user">&nbsp;</span>
									{{ Auth::user()->username }}
								</a>

								<div class="dropdown-menu position-absolute" aria-labelledby="navbarDropdownMenuLink">
									<a class="dropdown-item mr-5" href="{{ route('logout') }}" onclick="event.preventDefault();
											                                                document.getElementById('logout-form').submit();">
										<span class="fas fa-sign-out-alt">&nbsp;</span>
										{{ __('Logout') }}
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								</div>
							</li>
						</ul>
						@endguest
				</nav>
				@guest
			</nav>

            <div class="alContentContainer d-flex flex-row">
			@else
			<div class="alContentContainer d-flex flex-row">
				<div class="alSideNav d-flex flex-column flex-shrink-0">
					<ul class="nav nav-pills position-sticky ml-5  flex-column">
						<li class="nav-item text-end">
							<a class="nav-link" href="{{route('dashboard')}}">Dashboard
								<i class="ms-2 fas fa-home"></i>
							</a>
						</li>
						<li class="nav-item text-end">
							<a class="nav-link" href="{{route('users.index')}}">Users
								<i class="bi ms-2 fas fa-users"></i>
							</a>
						</li>
						<li class="nav-item text-end">
							<a class="nav-link" href="{{route('customers.index')}}">Customers
								<i class="bi ms-2 fas fa-address-card"></i>
							</a>
						</li>
						<li class="nav-item text-end">
							<a class="nav-link" href="{{route('fishes.index')}}">Fishes
								<i class="bi ms-2 fas fa-fish"></i>
							</a>
						</li>
						<li class="nav-item text-end">
							<a class="nav-link" href="{{route('categories.index')}}">Categories
								<i class="bi ms-2 fas fa-tag"></i>
							</a>
						</li>
						<li class="nav-item text-end">
							<a class="nav-link" href="{{route('subcategories.index')}}">Subcategories
								<i class="bi ms-2 fas fa-tags"></i>
							</a>
						</li>
					</ul>
				</div>
				@endguest


				<!-- page content -->
				@guest
				<div class="maincontainer w-100 h-100 p-5 text-dark" role="main">
					@include('templates.backoffice.partials.alerts') @yield('content')
				</div>
				@else
				<div class="maincontainer w-100 h-100 p-5 text-dark" role="main">
					@include('templates.backoffice.partials.alerts') @yield('content')
				</div>
</div>
			@endguest
            </div>
			<!-- footer content -->
			<footer class="footer text-center"></footer>
		</div>
		@yield('scripts')
	</body>

</html>
