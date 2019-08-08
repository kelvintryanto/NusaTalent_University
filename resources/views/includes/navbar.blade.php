<div class="nav">
	<div class="nav-title">
		<a class="navbar-brand " href="/Dashboard"><img src="/images/logomini.png" class="img-navbar" alt="" ></a>
	</div>

    {{-- active page coba cek script : menggunakan request()->is --}}
    {{-- tadinya menggunakan huruf kapital, diganti menjadi huruf kecil semua untuk address --}}
	<div class="nav-menu1 text2 {{ request()->is('dashboard') ? 'opacity1' : 'opacity2' }}"><a href="/dashboard">Dashboard</a></div>
	<div class="nav-menu1 text2 {{ request()->is('Jobpost/post-job') ? 'opacity1' : 'opacity2' }}"><a href="/JobPost/post-job">Job</a></div>
	<div class="nav-menu1 text2 {{ request()->is('student') ? 'opacity1' : 'opacity2' }}" ><a href="/Student">Student</a></div>
	<div class="nav-menu1 text2 {{ request()->is('company','company/*') ? 'opacity1' : 'opacity2' }}"><a href="/company">Company</a></div>
	<div class="nav-menu1 text2 {{ request()->is('Jobpost/post-job') ? 'opacity1' : 'opacity2' }}"><a href="/Event">Event</a></div>
	<div class="nav-menu2 text2 opacity1">
		<div class="has-feedback">
			<input type="search" class="form-control box-search" placeholder="Search">
			<div class="form-control-feedback">
				<i class="icon-search4 text-size-small text-muted" style="color: #246BB3;"></i>
			</div>
		</div>
	</div>
	<div class="nav-menu3 text2" style="margin-top: 15px;">|</div>
	<div class="nav-menu1 text2">
		<div class="dropdown">
			<a href="#" class="text2 dropdown-toggle" data-toggle="dropdown" style="margin-top: 10px;"><img src="http://placehold.it/18x18" class="profile-image img-circle"> {{Session::get('univName')}}<span class="glyphicon glyphicon-chevron-down glyphicon-c " aria-hidden="true"></span></a>
			<ul class="dropdown-menu">
				<a class=" text3 margintitledropdown">{{Session::get('univName')}}</a>
                <a class=" text4 margintitledropdown">{!!Session::get('email')!!}</a>
				<a class=" text4 margintitledropdown">Human Resource</a>
				<br> <br>
				<a class=" text4 margintitledropdown">Monthly until 03/05/19</a>
				<li class="divider"></li>
				<li class="dropdown-submenu">
				<a class="text4" href="#"><i class="far fa-building fa-lg" style="margin-right: 10px;"></i>Company</a>
					<ul class="dropdown-menu dropdown-b">
						<li><a class="text4" href="#">Third level</a></li>
						<li><a class="text4" href="#">Third level</a></li>
					</ul>
				</li>
				<li class="dropdown-submenu">
				<a class="text4" href="#"><i class="fas fa-cog fa-lg" style="margin-right: 10px;"></i>My Account </a>
					<ul class="dropdown-menu dropdown-b">
						<li><a class="text4" href="#">Third level</a></li>
						<li><a class="text4" href="#">Third level</a></li>
						<li><a class="text4" href="#">Third level</a></li>
						<li><a class="text4" href="#">Third level</a></li>
					</ul>
				</li>
				<li class="dropdown-submenu">
					<a class="text4" href="#"><i class="far fa-credit-card fa-lg" style="margin-right: 10px;"></i>Payment</a>
					<ul class="dropdown-menu dropdown-b">
						<li><a class="text4" href="#">Payment Information</a></li>
						<li><a class="text4" href="#">Payment History</a></li>
					</ul>
				</li>
                <li class="divider"></li>
                <li class="dropdown-submenu">
                    <a class="text4" href="/logout"><i class="fas fa-power-off fa-lg" style="margin-right: 10px;"></i>Logout</a>
                </li>
				</li>
			</ul>
		</div>
	</div>
</div>
