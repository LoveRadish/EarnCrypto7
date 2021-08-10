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
</style>

</head>

<body>

@if($gs->is_loader == 1)
	<div class="preloader" id="preloader" style="background: url({{asset('assets/images/'.$gs->loader)}}) no-repeat scroll center center #FFF;"></div>
@endif
	
	<!-- Top Header Area End -->


	<!-- Logo Header Area Start -->
	
	
	@if(Session::get('language') == 13 )
		<section class="subscribe_vsl_section">
			<div class="container">
				<center>
					<img src="{{asset('assets/images/logo_white.png')}}" width="20%"/>
				</center>
				<div class="row">
					<div class="col-md-2">&nbsp;</div>
					<div class="col-md-8 column-background">
						<h1 class="top-headline">
							Uma Maneira Incrível De Ganhar Criptomoedas
							<span class="highlighted-text"><strong><em><span style="text-decoration:underline;">Nunca Feita Antes</span></em></strong></span>”
						</h1>
						<div class="embed-responsive embed-responsive-16by9">
							<iframe src="https://player.vimeo.com/video/576200687" width="100%" height="400px" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>	
						</div>
						<p class="cta-text"><strong>Comece GRÁTIS hoje mesmo:</strong></p>
						<button class="btn btn-primary btn-block btn-orange mt-4" data-toggle="modal" data-target="#signupModal" onClick="OpenCreateAccountDialog()">Sim, Crie Minha Conta Gratuita Agora!</button>
					</div>
					<div class="col-md-2">&nbsp;</div>
				</div>
			</div>
			<div style="text-align:center; color:white;margin-top:20px;">
				<span>@2021 EarnCrypto7. Todos os direitos reservados.</span>
			</div>
		</section>
	@elseif(Session::get('language') == 12 )
		<section class="subscribe_vsl_section">
			<div class="container">
				<center>
					<img src="{{asset('assets/images/logo_white.png')}}" width="20%"/>
				</center>
				<div class="row">
					<div class="col-md-2">&nbsp;</div>
					<div class="col-md-8 column-background">
						<h1 class="top-headline">
							Una Manera Asombrosa De Ganar Criptomonedas
							<span class="highlighted-text"><strong><em><span style="text-decoration:underline;">Nunca Antes Hecha</span></em></strong></span>”
						</h1>
						<div class="embed-responsive embed-responsive-16by9">
							
							<iframe src="https://player.vimeo.com/video/576191489" width="100%" height="400px" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
							
						</div>
						<p class="cta-text"><strong>Empiece GRATIS hoy:</strong></p>
						<button class="btn btn-primary btn-block btn-orange mt-4" data-toggle="modal" data-target="#signupModal" onClick="OpenCreateAccountDialog()">Sí, ¡crea mi cuenta gratis ahora!</button>
					</div>
					<div class="col-md-2">&nbsp;</div>
				</div>
			</div>
			<div style="text-align:center; color:white;margin-top:20px;">
				<span>@2021 EarnCrypto7. Todos Los Derechos Reservados.</span>
			</div>
		</section>
	@else
		<section class="subscribe_vsl_section">
			<div class="container">
				<center>
					<img src="{{asset('assets/images/logo_white.png')}}" width="20%"/>
				</center>
				<div class="row">
					<div class="col-md-2">&nbsp;</div>
					<div class="col-md-8 column-background">
						<h1 class="top-headline">
							“Amazing Way To Earn Crypto <br>
							That Has
							<span class="highlighted-text"><strong><em><span style="text-decoration:underline;">Never Been Done Before</span></em></strong></span>”
						</h1>
						<div class="embed-responsive embed-responsive-16by9">
							
							<iframe src="https://player.vimeo.com/video/573635515" width="100%" height="400px" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
							
						</div>
						<p class="cta-text"><strong>Get Started For Free Today:</strong></p>
						<button class="btn btn-primary btn-block btn-orange mt-4" data-toggle="modal" data-target="#signupModal" onClick="OpenCreateAccountDialog()">Yes, Create My Free Account Now!</button>
					</div>
					<div class="col-md-2">&nbsp;</div>
				</div>
			</div>
			<div style="text-align:center; color:white;margin-top:20px;">
				<span>©2021 EarnCrypto7. All Rights Reserved.</span>
			</div>
		</section>
	@endif
	

    <div class="modal fade" id="create_account" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header d-block text-center">
					<h4 class="modal-title d-inline-block">{{ $langg->lang1602 }}</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

      <!-- Modal body -->
				<div class="modal-body">
                   <div class="login-area signup-area">
                        <div class="header-area">
                            <h4 class="title">{{ $langg->lang181 }}</h4>
                        </div>
                        <div class="login-form signup-form">
                            @include('includes.admin.form-login')
                            <form class="mregisterform" action="{{route('user-register-submit')}}" method="POST">
                            {{ csrf_field() }}

                            <div class="form-input">
                                <input type="text" class="User Name" name="name" placeholder="{{ $langg->lang182 }}" required="">
                                <i class="icofont-user-alt-5"></i>
                            </div>

                            <div class="form-input">
                                <input type="email" class="User Name" name="email" placeholder="{{ $langg->lang183 }}" required="">
                                <i class="icofont-email"></i>
                            </div>
							<input type="hidden" name="sponsor" value="{{$user_id}}">
                            <!-- <div class="form-input">
                                <input type="text" class="User Name" name="phone" placeholder="{{ $langg->lang184 }}" required="">
                                <i class="icofont-phone"></i>
                            </div> -->

                            <!-- <div class="form-input">
                                <input type="text" class="User Name" name="address" placeholder="{{ $langg->lang185 }}" required="">
                                <i class="icofont-location-pin"></i>
                            </div> -->

                            <div class="form-input">
                                <input type="password" class="Password" name="password" placeholder="{{ $langg->lang186 }}"
                                required="">
                                <i class="icofont-ui-password"></i>
                            </div>

                            <div class="form-input">
                                <input type="password" class="Password" name="password_confirmation"
                                placeholder="{{ $langg->lang187 }}" required="">
                                <i class="icofont-ui-password"></i>
                            </div>

                            @if($gs->is_capcha == 1)

                            <ul class="captcha-area">
                                <li>
                                <p><img class="codeimg1" src="{{asset("assets/images/capcha_code.png")}}" alt=""> <i
                                    class="fas fa-sync-alt pointer refresh_code "></i></p>
                                </li>
                            </ul>

                            <div class="form-input">
                                <input type="text" class="Password" name="codes" placeholder="{{ $langg->lang51 }}" required="">
                                <i class="icofont-refresh"></i>
                            </div>

                            @endif

                            <input class="mprocessdata" type="hidden" value="{{ $langg->lang188 }}">
                            <button type="submit" class="submit-btn">{{ $langg->lang189 }}</button>

                            </form>
                        </div>
                    </div>
				</div>

      <!-- Modal footer -->
				<div class="modal-footer" style="text-align:right;">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="background: grey; color:white;">{{ $langg->lang321 }}</button>
				</div>
    		</div>
  		</div>
	</div>	

    <script>
        function OpenCreateAccountDialog ()
        {
            $("#create_account").modal('show');
        }
    </script>

	<!-- Footer Area Start -->
	

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


    

    
    
    
    

