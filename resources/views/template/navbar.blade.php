<!-- Main navbar -->
<div class="navbar navbar-default navbar-fixed-top">
	<div class="navbar-header">
		<a class="navbar-brand" href="/Dashboard" style="padding: 14px 20px !important;"> 
			<img src="{{asset('/assets/icons/nusatalent-cc.png')}}" alt='NusaTalent'/>
		</a>
	</div>
	<div class="navbar-collapse collapse" id="navbar-mobile">
		<p class="navbar-text">
			@if(!is_null($univName) && $univName !== "")
				{!! $univName !!}
			@endif
		</p>
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="icon-cog5"></i>
					<i class="caret"></i>
				</a>
				<ul class="dropdown-menu dropdown-menu-right">
					<li><a href="/Access/change-password"><i class="icon-cog5"></i> Change Password </a></li>
					<li><a href="/logout"><i class="icon-switch2"></i> Logout </a></li>
				</ul>
			</li>
			<li><span class="label text-nusatalent" style="padding: 14.4px 10px; margin: 11px 5px;">Help</span></li>
		</ul>
	</div>
</div>
<!-- /main navbar -->