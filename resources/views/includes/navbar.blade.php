<div class="nav navbar-fixed-top" style="border-bottom: 1px solid ">
	<div class="nav-title">
		<a class="navbar-brand " href="/dashboard"><img src="{{asset('/images/logomini.png')}}" class="img-navbar" alt="" ></a>
	</div>

	<a href="/dashboard" class="nav-menu1 text2 {{ request()->is('dashboard','dashboard/*') ? 'content-active' : 'content-nonactive' }}"><div>Dashboard</div></a>
	<a href="/job" class="nav-menu1 text2 {{ request()->is('job','job/*') ? 'content-active' : 'content-nonactive' }}"><div >Job</div></a>
	<a href="/student" class="nav-menu1 text2 {{ request()->is('student','student/*') ? 'content-active' : 'content-nonactive' }}"><div>Student</div></a>
	<a href="/company"  class="nav-menu1 text2 {{ request()->is('company','company/*') ? 'content-active' : 'content-nonactive' }}"><div>Company</div></a>
	<a href="/event" class="nav-menu1 text2 {{ request()->is('event','event/*') ? 'content-active' : 'content-nonactive' }}"><div>Event</div></a>
	<div class="nav-menu2 text2">
		<div class="has-feedback">
			<input type="search" class="form-control box-search text2" placeholder="Search">
			{{-- <div class="form-control-feedback" style="z-index: 0;"> --}}
				<i class="icon-search4 text-size-small text-muted form-control-feedback" style="color: #246BB3; z-index: 0;"></i>
			{{-- </div> --}}
		</div>
	</div>
	<div class="nav-menu3 text2" style="margin-top: 15px;">|</div>
	<div class="nav-menu1 text2">
		<div class="dropdown">
			<a href="#" class="text2 dropdown-toggle" data-toggle="dropdown" style="margin-top: 10px;"><img src="http://placehold.it/18x18" class="profile-image img-circle"> {{Session::get('univName')}}<span class="glyphicon glyphicon-chevron-down glyphicon-c " aria-hidden="true"></span></a>
			<ul class="dropdown-menu">
				<a class=" text3 margintitledropdown">{{Session::get('univName')}}</a>
				<a class=" text4 margintitledropdown">{{Session::get('email')}}</a>
				{{-- <br> --}}
				{{-- <a class=" text4 margintitledropdown">Human Resource</a> --}}
				{{-- <br> <br> --}}
				{{-- <a class=" text4 margintitledropdown">Monthly until 03/05/19</a> --}}
				<li class="divider"></li>
				{{-- <li class="dropdown-submenu">
				<a class="text4" href="#"><i class="far fa-building fa-lg" style="margin-right: 10px;"></i>Company</a>
					<ul class="dropdown-menu dropdown-b">
						<li><a class="text4" href="#">Third level</a></li>
						<li><a class="text4" href="#">Third level</a></li>
					</ul>
				</li> --}}
				{{-- <li class="dropdown-submenu">
				<a class="text4" href="#"><i class="fas fa-cog fa-lg" style="margin-right: 10px;"></i>My Account </a>
					<ul class="dropdown-menu dropdown-b">
						<li><a class="text4" href="#">Third level</a></li>
						<li><a class="text4" href="#">Third level</a></li>
						<li><a class="text4" href="#">Third level</a></li>
						<li><a class="text4" href="#">Third level</a></li>
					</ul>
				</li> --}}
				<li class="dropdown-submenu">
					<a class="text4" href="/Access/change-password"><i class="far fa-credit-card fa-lg" style="margin-right: 10px;"></i>Change Password</a>
					{{-- <ul class="dropdown-menu dropdown-b">
						<li><a class="text4" href="#">Payment Information</a></li>
						<li><a class="text4" href="#">Payment History</a></li>
					</ul> --}}
				</li>
				{{-- <li class="divider"></li> --}}
				<li class="dropdown-submenu">
					<a class="text4" href="/logout"><i class="fas fa-power-off fa-lg" style="margin-right: 10px;"></i>Logout</a>
				</li>
			</ul>
		</div>
	</div>
</div>
