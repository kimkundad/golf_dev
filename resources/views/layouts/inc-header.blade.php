<!-- Header Container
================================================== -->
<header id="header-container">

	<!-- Header -->
	<div id="header">
		<div class="container">

			<!-- Left Side Content -->
			<div class="left-side">

				<!-- Logo -->
				<div id="logo">
					<a href="{{url('/')}}"><img src="{{url('assets/image/logo_website/'.get_logo())}}" alt="{{get_compony()}}"></a>
				</div>

				<!-- Mobile Navigation -->
				<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>


				<!-- Main Navigation -->
				<nav id="navigation" class="style-1 visible-sm visible-xs">
					<ul id="responsive" class="">

						<li><a class="current" href="{{url('/')}}">หน้าหลัก</a></li>
						<li><a href="{{url('about')}}">เกี่ยวกับเรา</a></li>
						<li><a href="{{url('contact')}}">ติดต่อเรา</a></li>

					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->

			</div>
			<!-- Left Side Content / End -->


			<!-- Right Side Content / End -->
			<div class="right-side">
				<div class="header-widget">
					<a href="{{url('/')}}" class="sign-in hidden-sm hidden-xs"> หน้าหลัก</a>
					<a href="{{url('about')}}" class="sign-in hidden-sm hidden-xs"> เกี่ยวกับเรา</a>
					<a href="{{url('contact')}}" class="sign-in hidden-sm hidden-xs"> ติดต่อเรา</a>

					@if (Auth::guest())
					
					@else

					<!-- User Menu -->
					<div class="user-menu">
						@if(Auth::user()->provider == 'email')
						<div class="user-name" style="color:#fff"><span><img src="{{url('assets/images/avatar/'.Auth::user()->avatar)}}" alt=""></span>Hi, {{ Auth::user()->name }}!</div>
						@else
						<div class="user-name" style="color:#fff"><span><img src="{{Auth::user()->avatar}}" alt=""></span>Hi, {{ Auth::user()->name }}!</div>
						@endif
						<ul>
							@if(Auth::user()->is_admin == 1)
							<li><a href="{{url('admin/dashboard')}}"><i class="im im-icon-Alien-2"></i>Controller</a></li>
							@endif
							<li><a href="{{url('logout')}}"><i class="sl sl-icon-power"></i> Logout</a></li>
						</ul>
					</div>
					@endif

					<a href="{{url('regis_tech')}}" class="button with-icon" style="border-radius: 2px;font-size: 16px;"> สมัครเป็นผู้รับเหมา </a>
				</div>
			</div>
			<!-- Right Side Content / End -->



		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->
