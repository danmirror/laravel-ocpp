		<nav class="navbar fixed-nav navbar-expand navbar-light bg-light ">
			<div class="container-fluid">
				<div id="menu-toggle">
					<div id="nav-icon1">
						<span></span>
						<span></span>
						<span></span>
					</div>
				</div>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
@if(session('name'))
								<span style="text-transform: capitalize">{{Session('name')}}</span>
@else
								<span style="text-transform: capitalize">Guess</span>
@endif
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
@if(session('name'))
							<a class="dropdown-item text-danger" href="{{route('logout')}}"><i class="fas fa-power-off mr-1"></i> Logout</a>
@else
							<a class="dropdown-item text-success" href="{{route('login')}}"><i class="fas fa-power-off mr-1"></i> login</a>
@endif
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>