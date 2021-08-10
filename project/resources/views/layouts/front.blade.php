<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if(isset($page->meta_tag) && isset($page->meta_description))
        <meta name="keywords" content="{{ $page->meta_tag }}">
        <meta name="description" content="{{ $page->meta_description }}">
		<title>{{$gs->title}}</title>
	@elseif(isset($blog->meta_tag) && isset($blog->meta_description))
		<meta property="og:title" content="{{$blog->title}}" />
		<meta property="og:description" content="{{ $blog->meta_description != null ? $blog->meta_description : strip_tags($blog->meta_description) }}" />
		<meta property="og:image" content="{{asset('assets/images/blogs'.$blog->photo)}}" />
        <meta name="keywords" content="{{ $blog->meta_tag }}">
        <meta name="description" content="{{ $blog->meta_description }}">
		<title>{{$gs->title}}</title>
    @elseif(isset($productt))
		<meta name="keywords" content="{{ !empty($productt->meta_tag) ? implode(',', $productt->meta_tag ): '' }}">
		<meta name="description" content="{{ $productt->meta_description != null ? $productt->meta_description : strip_tags($productt->description) }}">
	    <meta property="og:title" content="{{$productt->name}}" />
	    <meta property="og:description" content="{{ $productt->meta_description != null ? $productt->meta_description : strip_tags($productt->description) }}" />
	    <meta property="og:image" content="{{asset('assets/images/thumbnails/'.$productt->thumbnail)}}" />
	    <meta name="author" content="GeniusOcean">
    	<title>{{substr($productt->name, 0,11)."-"}}{{$gs->title}}</title>
	@else
		<meta property="og:title" content="{{$gs->title}}" />
		<meta property="og:description" content="{{ strip_tags($gs->footer) }}" />
		<meta property="og:image" content="{{asset('assets/images/'.$gs->logo)}}" />
	    <meta name="keywords" content="{{ $seo->meta_keys }}">
	    <meta name="author" content="GeniusOcean">
		<title>{{$gs->title}}</title>
    @endif
	<!-- favicon -->
	<link rel="icon"  type="image/x-icon" href="{{asset('assets/images/'.$gs->favicon)}}"/>
	<!-- bootstrap -->
	<link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}">
	<!-- Plugin css -->
	<link rel="stylesheet" href="{{asset('assets/front/css/plugin.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/animate.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/toastr.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/toastr.css')}}">

	<!-- jQuery Ui Css-->
	<link rel="stylesheet" href="{{asset('assets/front/jquery-ui/jquery-ui.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/jquery-ui/jquery-ui.structure.min.css')}}">

@if($langg->rtl == "1")

	<!-- stylesheet -->
	<link rel="stylesheet" href="{{asset('assets/front/css/rtl/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/rtl/custom.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/common.css')}}">
	<!-- responsive -->
	<link rel="stylesheet" href="{{asset('assets/front/css/rtl/responsive.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/common-responsive.css')}}">

    <!--Updated CSS-->
 <link rel="stylesheet" href="{{ asset('assets/front/css/rtl/styles.php?color='.str_replace('#','',$gs->colors).'&amp;'.'header_color='.str_replace('#','',$gs->header_color).'&amp;'.'footer_color='.str_replace('#','',$gs->footer_color).'&amp;'.'copyright_color='.str_replace('#','',$gs->copyright_color).'&amp;'.'menu_color='.str_replace('#','',$gs->menu_color).'&amp;'.'menu_hover_color='.str_replace('#','',$gs->menu_hover_color)) }}">

@else

	<!-- stylesheet -->
	<link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/custom.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/earncrypto7.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/common.css')}}">
	<!-- responsive -->
	<link rel="stylesheet" href="{{asset('assets/front/css/responsive.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/common-responsive.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/fontawesome.css')}}">

    <!--Updated CSS-->
 <link rel="stylesheet" href="{{ asset('assets/front/css/styles.php?color='.str_replace('#','',$gs->colors).'&amp;'.'header_color='.str_replace('#','',$gs->header_color).'&amp;'.'footer_color='.str_replace('#','',$gs->footer_color).'&amp;'.'copyright_color='.str_replace('#','',$gs->copyright_color).'&amp;'.'menu_color='.str_replace('#','',$gs->menu_color).'&amp;'.'menu_hover_color='.str_replace('#','',$gs->menu_hover_color)) }}">

@endif

	@yield('styles')
<style>
	.vertical_center {
		display: flex;
		flex-direction: column;
		justify-content: center;
	}
	.numberpan{
		font-size:18px;
		background-color:black;
		color:white;
		padding-right:6px;
		padding-left:6px;
		margin-right: 10px;
	}
	li span{
		display:inline-block;
	}
	.sub_page_nav li.active {
		border-bottom: 2px solid black;
	}
	.nav_menu_grey {
		color: grey!important;
	}
	.navbar-dark {
		background: black;
	}
	#navbarSupportedContent-333 .nav-item {
		padding: 10px;
	}
	.dropdown-toggle::after {
		display: none;
	}
	.logout {
		display: none;
	}
	@media only screen and (max-width: 991px) {
		.top-header .nav-item a {
			display: flex;
		}
		.top-header .bottom_text {
			margin-top: 0px;
			margin-left: 10px;
		}
		.sponser-button a {
			display: block!important;
			text-align: center;
		}
		.top-header .full-container {
			padding: 0px 50px!important;
		}
		.logout {
			display: block;
		}
	}
	.user-custom-img-circle {
		width: 300px;
		height: 300px;
		border-radius: 50%;
		margin-bottom: 30px;
	}
</style>

</head>

<body>

@if($gs->is_loader == 1)
	<div class="preloader" id="preloader" style="background: url({{asset('assets/images/'.$gs->loader)}}) no-repeat scroll center center #FFF;"></div>
@endif
	@if(Auth::check())
		<div class="navbar-dark top-header">
			<div class="row">
				<div class="col-lg-2 col-md-12 vertical_center" style="text-align:center;">
					<div class="logo">
						<a href="{{ route('front.index') }}">
							<img src="{{asset('assets/images/logo_white.png')}}" alt="" width="70%">
						</a>
					</div>
				</div>
				<div class="col-lg-10 col-md-12 vertical_center">
					<nav class="mb-1 navbar navbar-expand-lg navbar-dark">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
							aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent-333">
							@if(!Auth::user()->company_link || !Auth::user()->binance_link || !Auth::user()->binance_outside_link)
								<ul class="navbar-nav mr-auto">
									<li class="nav-item active">
										<a href="{{ route('front.index') }}" class="nav_menu_item_active">
											<div style="text-align:center">
												<i class="fa fa-tachometer-alt" aria-hidden="true"></i>
											</div>
											<div class="bottom_text">
												{{$langg->lang1531}}
											</div>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav_menu_grey">
											<div style="text-align:center">
												<i class="fa fa-filter" aria-hidden="true"></i>
											</div>
											<div class="bottom_text">
												{{$langg->lang1532}}
											</div>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav_menu_grey">
											<div style="text-align:center">
												<i class="fas fa-user-plus" aria-hidden="true"></i>
											</div>
											<div class="bottom_text">
												{{$langg->lang1533}}
											</div>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav_menu_grey">
											<div style="text-align:center">
												<i class="fas fa-user-friends" aria-hidden="true"></i>
											</div>
											<div class="bottom_text">
												{{$langg->lang1534}}
											</div>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav_menu_grey">
											<div style="text-align:center">
												<i class="fas fa-bullhorn" aria-hidden="true"></i>
											</div>
											<div class="bottom_text">
												{{$langg->lang1535}}
											</div>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav_menu_grey">
											<div style="text-align:center">
												<i class="fa fa-graduation-cap" aria-hidden="true"></i>
											</div>
											<div class="bottom_text">
												{{$langg->lang1536}}
											</div>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav_menu_grey">
											<div style="text-align:center">
												<i class="fas fa-trophy" aria-hidden="true"></i>
											</div>
											<div class="bottom_text">
												{{$langg->lang1537}}
											</div>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav_menu_grey">
											<div style="text-align:center">
												<i class="fas fa-traffic-light" aria-hidden="true"></i>
											</div>
											<div class="bottom_text">
												{{$langg->lang1538}}
											</div>
										</a>
									</li>
									<li class="nav-item logout">
										<a href="{{ route('user-logout') }}" class="nav_menu_item">
											<div style="text-align:center">
												<i class="fas fa-sign-out-alt" aria-hidden="true"></i>
											</div>
											<div class="bottom_text">
												{{$langg->lang1541}}
											</div>
										</a>
									</li>
								</ul>
							@else
								<ul class="navbar-nav mr-auto">
									<li class="nav-item active">
										@if( Request::path() == "step1" || Request::path() == "step2" || Request::path() == "step3" || Request::path() == "step4")
											<a href="{{ route('front.index') }}" class="nav_menu_item_active">
										@else
											<a href="{{ route('front.index') }}" class="nav_menu_item">
										@endif
											<div style="text-align:center">
												<i class="fa fa-tachometer-alt" aria-hidden="true"></i>
											</div>
											<div class="bottom_text">
												{{$langg->lang1531}}
											</div>
										</a>
									</li>
									<li class="nav-item">
										@if( Request::path() == "funnels" || Request::path() == "vsls")
											<a href="{{ route('front.funnels') }}" class="nav_menu_item_active">
										@else
											<a href="{{ route('front.funnels') }}" class="nav_menu_item">
										@endif
											<div style="text-align:center">
												<i class="fa fa-filter" aria-hidden="true"></i>
											</div>
											<div class="bottom_text">
												{{$langg->lang1532}}
											</div>
										</a>
									</li>
									<li class="nav-item">
										@if( Request::path() == "leads")
											<a href="{{ route('front.leads') }}" class="nav_menu_item_active">
										@else
											<a href="{{ route('front.leads') }}" class="nav_menu_item">
										@endif
											<div style="text-align:center">
												<i class="fas fa-user-plus" aria-hidden="true"></i>
											</div>
											<div class="bottom_text">
												{{$langg->lang1533}}
											</div>
										</a>
									</li>
									<li class="nav-item">
										@if( Request::path() == "members")
											<a href="{{ route('front.members') }}" class="nav_menu_item_active">
										@else
											<a href="{{ route('front.members') }}" class="nav_menu_item">
										@endif
											<div style="text-align:center">
												<i class="fas fa-user-friends" aria-hidden="true"></i>
											</div>
											<div class="bottom_text">
												{{$langg->lang1534}}
											</div>
										</a>
									</li>
									<li class="nav-item">
										@if( Request::path() == "resources" || Request::path() == "facebook_posts" || Request::path() == "banners")
											<a href="{{ route('front.resources') }}" class="nav_menu_item_active">
										@else
											<a href="{{ route('front.resources') }}" class="nav_menu_item">
										@endif
											<div style="text-align:center">
												<i class="fas fa-bullhorn" aria-hidden="true"></i>
											</div>
											<div class="bottom_text">
												{{$langg->lang1535}}
											</div>
										</a>
									</li>
									<li class="nav-item">
										@if(str_contains(Request::path(),"training"))
											<a href="{{ route('front.training') }}" class="nav_menu_item_active">
										@else
											<a href="{{ route('front.training') }}" class="nav_menu_item">
										@endif
											<div style="text-align:center">
												<i class="fa fa-graduation-cap" aria-hidden="true"></i>
											</div>
											<div class="bottom_text">
												{{$langg->lang1536}}
											</div>
										</a>
									</li>
									<li class="nav-item">
										@if( Request::path() == "leader_board")
											<a href="{{ route('front.leader_board') }}" class="nav_menu_item_active">
										@else
											<a href="{{ route('front.leader_board') }}" class="nav_menu_item">
										@endif
											<div style="text-align:center">
												<i class="fas fa-trophy" aria-hidden="true"></i>
											</div>
											<div class="bottom_text">
												{{$langg->lang1537}}
											</div>
										</a>
									</li>
									<li class="nav-item">
										@if( Request::path() == "traffic")
											<a href="{{ route('front.traffic') }}" class="nav_menu_item_active">
										@else
											<a href="{{ route('front.traffic') }}" class="nav_menu_item">
										@endif
											<div style="text-align:center">
												<i class="fas fa-traffic-light" aria-hidden="true"></i>
											</div>
											<div class="bottom_text">
												{{$langg->lang1538}}
											</div>
										</a>
									</li>
									<li class="nav-item logout">
										<a href="{{ route('user-logout') }}" class="nav_menu_item">
											<div style="text-align:center">
												<i class="fas fa-sign-out-alt" aria-hidden="true"></i>
											</div>
											<div class="bottom_text">
												{{$langg->lang1541}}
											</div>
										</a>
									</li>
								</ul>
							@endif
							
							
							<ul class="navbar-nav ml-auto nav-flex-icons">
								<li class="nav-item vertical_center">
									<select name="language" class="language selectors nice">
										@foreach(DB::table('languages')->get() as $language)
											<option value="{{route('front.language',$language->id)}}" {{ Session::has('language') ? ( Session::get('language') == $language->id ? 'selected' : '' ) : (DB::table('languages')->where('is_default','=',1)->first()->id == $language->id ? 'selected' : '') }} >
												<i class="fas fa-traffic-light" aria-hidden="true"></i>
												{{$language->language}}
											</option>
										@endforeach
									</select>
								</li>
								<li class="nav-item vertical_center" onClick="onVisitSiteClicked()">
									<div class="sponser-button">
										<a>{{$langg->lang1539}}</a>
									</div>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
										aria-haspopup="true" aria-expanded="false">
										<div class="user-img" onClick="show_hide_dropdowns()">												
											@if(Auth::check())
												@if(Auth::user()->photo)
													<img src="{{ asset('assets/images/users/'.Auth::user()->photo)}}">
												@else
													<img src="{{ asset('assets/images/'.$gs->user_image) }}">
												@endif
											@endif
										</div>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-default"
										aria-labelledby="navbarDropdownMenuLink-333">
										<a class="dropdown-item" href="{{ route('user-profile') }}">{{$langg->lang1540}}</a>
										<a class="dropdown-item" href="{{ route('user-logout') }}">{{$langg->lang1541}}</a>
									</div>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
	@endif
	<!-- Top Header Area End -->


	<!-- Logo Header Area Start -->
	@if(Auth::check())
		@if( Request::path() == "step1" || Request::path() == "step2" || Request::path() == "step3" || Request::path() == "step4")
			<div class="sub_page_nav">
				<div class="container">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#top_navbar" aria-controls="top_navbar" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="top_navbar">
							<ul class="navbar-nav">
								@if(Request::path() == "step1")
									<li class="nav-item active">
								@else
									<li class="nav-item">
								@endif
										<a class="nav-link" href="{{ route('front.index') }}">
											<span class="numberpan">1</span>
											{{$langg->lang1542}}
										</a>
								</li>
								@if(Request::path() == "step2")
									<li class="nav-item active">
								@else
									<li class="nav-item">
								@endif
									<a class="nav-link" href="{{ route('front.step2') }}">
										<span class="numberpan">2</span>
										{{$langg->lang1543}}
									</a>
								</li>
								@if(Request::path() == "step3")
									<li class="nav-item active">
								@else
									<li class="nav-item">
								@endif
									<a class="nav-link" href="{{ route('front.step3') }}">
										<span class="numberpan">3</span>
										{{$langg->lang1544}}
									</a>
								</li>
								@if(Request::path() == "step4")
									<li class="nav-item active">
								@else
									<li class="nav-item">
								@endif
									<a class="nav-link" href="{{ route('front.step4') }}">
										<span class="numberpan">4</span>
										{{$langg->lang1545}}
									</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		@elseif(Request::path() == "funnels" || Request::path() == "vsls")
			<div class="sub_page_nav">
				<div class="container">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#top_navbar" aria-controls="top_navbar" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="top_navbar">
							<ul class="navbar-nav">
								@if(Request::path() == "funnels")
									<li class="nav-item active">
								@else
									<li class="nav-item">
								@endif
									<a class="nav-link" href="{{ route('front.funnels') }}">
										{{$langg->lang1546}}
									</a>
								</li>
								@if(Request::path() == "vsls")
									<li class="nav-item active">
								@else
									<li class="nav-item">
								@endif
									<a class="nav-link" href="{{ route('front.vsls') }}">
										{{$langg->lang1547}}
									</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		@elseif(Request::path() == "leads")
			<div class="sub_page_nav">
				<div class="container">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#top_navbar" aria-controls="top_navbar" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="top_navbar">
							<ul class="navbar-nav">
								<li class="nav-item active">
									<a class="nav-link" href="#">
										{{$langg->lang1548}}
									</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		@elseif(Request::path() == "members")
			<div class="sub_page_nav">
				<div class="container">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#top_navbar" aria-controls="top_navbar" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="top_navbar">
							<ul class="navbar-nav">
								<li class="nav-item active">
									<a class="nav-link" href="#">
										{{$langg->lang1549}}
									</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		@elseif(Request::path() == "resources" || Request::path() == "facebook_posts" || Request::path() == "banners")
			<div class="sub_page_nav">
				<div class="container">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#top_navbar" aria-controls="top_navbar" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="top_navbar">
							<ul class="navbar-nav">
								@if(Request::path() == "resources")
									<li class="nav-item active">
								@else
									<li class="nav-item">
								@endif
									<a class="nav-link" href="{{ route('front.resources') }}">
										{{$langg->lang1550}}
									</a>
								</li>
								@if(Request::path() == "facebook_posts")
									<li class="nav-item active">
								@else
									<li class="nav-item">
								@endif
									<a class="nav-link" href="{{ route('front.facebook_posts') }}">
										{{$langg->lang1551}}
									</a>
								</li>
								@if(Request::path() == "banners")
									<li class="nav-item active">
								@else
									<li class="nav-item">
								@endif
									<a class="nav-link" href="{{ route('front.banners') }}">
										{{$langg->lang1552}}
									</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		@elseif(Request::path() == "training")
			<div class="sub_page_nav">
				<div class="container">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#top_navbar" aria-controls="top_navbar" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="top_navbar">
							<ul class="navbar-nav">
								<li class="nav-item active">
									<a class="nav-link" href="#">
										{{$langg->lang1553}}
									</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		@elseif(Request::path() == "leader_board")
			<div class="sub_page_nav">
				<div class="container">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#top_navbar" aria-controls="top_navbar" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="top_navbar">
							<ul class="navbar-nav">
								<li class="nav-item active">
									<a class="nav-link" href="#">
										{{$langg->lang1537}}
									</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		@elseif(Request::path() == "traffic")
			<div class="sub_page_nav">
				<div class="container">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#top_navbar" aria-controls="top_navbar" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="top_navbar">
							<ul class="navbar-nav">
								<li class="nav-item active">
									<a class="nav-link" href="#">
										{{$langg->lang1538}}
									</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		@endif

		
	@endif
	
	@php
		if(Auth::check())
			$sponsor = App\Models\User::where('id','=',Auth::user()->sponsor)->first();
		else
			$sponsor = null;
	@endphp

	<div style="min-height:750px;">
		@yield('content')
	</div>

	<!-- Footer Area Start -->
	<footer class="footer" id="footer" style="padding:0px">
		<div class="copy-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="content">
							<div class="content">
								<p>{!! $gs->copyright !!}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer Area End -->

	<!-- Back to Top Start -->
	<div class="bottomtotop">
		<i class="fas fa-chevron-right"></i>
	</div>
	<!-- Back to Top End -->

	<div class="modal fade" id="meet-sponsor" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header d-block text-center">
					<h4 class="modal-title d-inline-block">{{$langg->lang1554}}</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

      <!-- Modal body -->
				<div class="modal-body">
					@if($sponsor && Auth::check())
						<div class="padding:50px;" style="text-align: center;">
							@if($sponsor->photo)
								<img class="user-custom-img-circle" src="{{ asset('assets/images/users/'.$sponsor->photo)}}">
							@else
								<img class="user-custom-img-circle" src="{{ asset('assets/images/profile_logo.png') }}">
							@endif
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">
									<i class="fas fa-user" aria-hidden="true"></i>
								</span>
							</div>
							<input type="text" class="form-control" value="{{$sponsor->name}}" aria-label="Username" aria-describedby="basic-addon1">
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon2">
									<i class="fas fa-envelope" aria-hidden="true"></i>
								</span>
							</div>
							<input type="text" class="form-control" value="{{$sponsor->email}}" aria-label="Email" aria-describedby="basic-addon2">
						</div>
					@else
						<div class="margin:50px 0px;" style="text-align: center;">
							<img src="{{ asset('assets/images/traffic/sponsor.png') }}" alt="" width="50%">
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">
									<i class="fas fa-user" aria-hidden="true"></i>
								</span>
							</div>
							<input type="text" class="form-control" value="Alex Paim" aria-label="Username" aria-describedby="basic-addon1">
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon2">
									<i class="fas fa-envelope" aria-hidden="true"></i>
								</span>
							</div>
							<input type="text" class="form-control" value="misterxpaim@gmail.com" aria-label="Email" aria-describedby="basic-addon2">
						</div>
					@endif
				</div>

      <!-- Modal footer -->
				<div class="modal-footer" style="text-align:right;">
					<button type="button" class="btn btn-default" data-dismiss="modal" style="background: grey; color:white;">{{$langg->lang1555}}</button>
				</div>
    		</div>
  		</div>
	</div>	

<script>
    function onVisitSiteClicked() {
        $("#meet-sponsor").modal('show');
    }
</script>

<script type="text/javascript">
  var mainurl = "{{url('/')}}";
  var gs      = {!! json_encode($gs) !!};
  var langg    = {!! json_encode($langg) !!};
</script>

	<!-- jquery -->
	<script src="{{asset('assets/front/js/jquery.js')}}"></script>
	{{-- <script src="{{asset('assets/front/js/vue.js')}}"></script> --}}
	<script src="{{asset('assets/front/jquery-ui/jquery-ui.min.js')}}"></script>
	<!-- popper -->
	<script src="{{asset('assets/front/js/popper.min.js')}}"></script>
	<!-- bootstrap -->
	<script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
	<!-- plugin js-->
	<script src="{{asset('assets/front/js/plugin.js')}}"></script>

	<script src="{{asset('assets/front/js/xzoom.min.js')}}"></script>
	<script src="{{asset('assets/front/js/jquery.hammer.min.js')}}"></script>
	<script src="{{asset('assets/front/js/setup.js')}}"></script>

	<script src="{{asset('assets/front/js/toastr.js')}}"></script>
	<!-- main -->
	<script src="{{asset('assets/front/js/main.js')}}"></script>
	<!-- custom -->
	<script src="{{asset('assets/front/js/custom.js')}}"></script>

    {!! $seo->google_analytics !!}

	@if($gs->is_talkto == 1)
		<!--Start of Tawk.to Script-->
		{!! $gs->talkto !!}
		<!--End of Tawk.to Script-->
	@endif

	@yield('scripts')
	<script>
		function show_hide_dropdowns() {
			$("#dropdownMenuButton1").toggleClass("active_dropdown");
		}
	</script>

</body>

</html>
