<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if(isset($page->meta_tag) && isset($page->meta_description)): ?>
        <meta name="keywords" content="<?php echo e($page->meta_tag); ?>">
        <meta name="description" content="<?php echo e($page->meta_description); ?>">
		<title><?php echo e($gs->title); ?></title>
	<?php elseif(isset($blog->meta_tag) && isset($blog->meta_description)): ?>
		<meta property="og:title" content="<?php echo e($blog->title); ?>" />
		<meta property="og:description" content="<?php echo e($blog->meta_description != null ? $blog->meta_description : strip_tags($blog->meta_description)); ?>" />
		<meta property="og:image" content="<?php echo e(asset('assets/images/blogs'.$blog->photo)); ?>" />
        <meta name="keywords" content="<?php echo e($blog->meta_tag); ?>">
        <meta name="description" content="<?php echo e($blog->meta_description); ?>">
		<title><?php echo e($gs->title); ?></title>
    <?php elseif(isset($productt)): ?>
		<meta name="keywords" content="<?php echo e(!empty($productt->meta_tag) ? implode(',', $productt->meta_tag ): ''); ?>">
		<meta name="description" content="<?php echo e($productt->meta_description != null ? $productt->meta_description : strip_tags($productt->description)); ?>">
	    <meta property="og:title" content="<?php echo e($productt->name); ?>" />
	    <meta property="og:description" content="<?php echo e($productt->meta_description != null ? $productt->meta_description : strip_tags($productt->description)); ?>" />
	    <meta property="og:image" content="<?php echo e(asset('assets/images/thumbnails/'.$productt->thumbnail)); ?>" />
	    <meta name="author" content="GeniusOcean">
    	<title><?php echo e(substr($productt->name, 0,11)."-"); ?><?php echo e($gs->title); ?></title>
	<?php else: ?>
		<meta property="og:title" content="<?php echo e($gs->title); ?>" />
		<meta property="og:description" content="<?php echo e(strip_tags($gs->footer)); ?>" />
		<meta property="og:image" content="<?php echo e(asset('assets/images/'.$gs->logo)); ?>" />
	    <meta name="keywords" content="<?php echo e($seo->meta_keys); ?>">
	    <meta name="author" content="GeniusOcean">
		<title><?php echo e($gs->title); ?></title>
    <?php endif; ?>
	<!-- favicon -->
	<link rel="icon"  type="image/x-icon" href="<?php echo e(asset('assets/images/'.$gs->favicon)); ?>"/>
	<!-- bootstrap -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/bootstrap.min.css')); ?>">
	<!-- Plugin css -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/plugin.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/animate.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/toastr.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/toastr.css')); ?>">

	<!-- jQuery Ui Css-->
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/jquery-ui/jquery-ui.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/jquery-ui/jquery-ui.structure.min.css')); ?>">

<?php if($langg->rtl == "1"): ?>

	<!-- stylesheet -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/rtl/style.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/rtl/custom.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/common.css')); ?>">
	<!-- responsive -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/rtl/responsive.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/common-responsive.css')); ?>">

    <!--Updated CSS-->
 <link rel="stylesheet" href="<?php echo e(asset('assets/front/css/rtl/styles.php?color='.str_replace('#','',$gs->colors).'&amp;'.'header_color='.str_replace('#','',$gs->header_color).'&amp;'.'footer_color='.str_replace('#','',$gs->footer_color).'&amp;'.'copyright_color='.str_replace('#','',$gs->copyright_color).'&amp;'.'menu_color='.str_replace('#','',$gs->menu_color).'&amp;'.'menu_hover_color='.str_replace('#','',$gs->menu_hover_color))); ?>">

<?php else: ?>

	<!-- stylesheet -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/style.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/custom.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/earncrypto7.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/common.css')); ?>">
	<!-- responsive -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/responsive.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/common-responsive.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/fontawesome.css')); ?>">

    <!--Updated CSS-->
 <link rel="stylesheet" href="<?php echo e(asset('assets/front/css/styles.php?color='.str_replace('#','',$gs->colors).'&amp;'.'header_color='.str_replace('#','',$gs->header_color).'&amp;'.'footer_color='.str_replace('#','',$gs->footer_color).'&amp;'.'copyright_color='.str_replace('#','',$gs->copyright_color).'&amp;'.'menu_color='.str_replace('#','',$gs->menu_color).'&amp;'.'menu_hover_color='.str_replace('#','',$gs->menu_hover_color))); ?>">

<?php endif; ?>

	<?php echo $__env->yieldContent('styles'); ?>
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

<?php if($gs->is_loader == 1): ?>
	<div class="preloader" id="preloader" style="background: url(<?php echo e(asset('assets/images/'.$gs->loader)); ?>) no-repeat scroll center center #FFF;"></div>
<?php endif; ?>
	
	<!-- Top Header Area End -->


	<!-- Logo Header Area Start -->
	
	
	<?php if(Session::get('language') == 13 ): ?>
		<section class="subscribe_vsl_section">
			<div class="container">
				<center>
					<img src="<?php echo e(asset('assets/images/logo_white.png')); ?>" width="20%"/>
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
				<span>@2021  EarnCrypto7. Todos os direitos reservados.</span>
			</div>
		</section>
	<?php elseif(Session::get('language') == 12 ): ?>
		<section class="subscribe_vsl_section">
			<div class="container">
				<center>
					<img src="<?php echo e(asset('assets/images/logo_white.png')); ?>" width="20%"/>
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
				<span>@2021  EarnCrypto7. Todos Los Derechos Reservados.</span>
			</div>
		</section>
	<?php else: ?>
		<section class="subscribe_vsl_section">
			<div class="container">
				<center>
					<img src="<?php echo e(asset('assets/images/logo_white.png')); ?>" width="20%"/>
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
	<?php endif; ?>
	

    <div class="modal fade" id="create_account" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header d-block text-center">
					<h4 class="modal-title d-inline-block"><?php echo e($langg->lang1602); ?></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

      <!-- Modal body -->
				<div class="modal-body">
                   <div class="login-area signup-area">
                        <div class="header-area">
                            <h4 class="title"><?php echo e($langg->lang181); ?></h4>
                        </div>
                        <div class="login-form signup-form">
                            <?php echo $__env->make('includes.admin.form-login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <form class="mregisterform" action="<?php echo e(route('user-register-submit')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-input">
                                <input type="text" class="User Name" name="name" placeholder="<?php echo e($langg->lang182); ?>" required="">
                                <i class="icofont-user-alt-5"></i>
                            </div>

                            <div class="form-input">
                                <input type="email" class="User Name" name="email" placeholder="<?php echo e($langg->lang183); ?>" required="">
                                <i class="icofont-email"></i>
                            </div>
							<input type="hidden" name="sponsor" value="<?php echo e($user_id); ?>">
                            <!-- <div class="form-input">
                                <input type="text" class="User Name" name="phone" placeholder="<?php echo e($langg->lang184); ?>" required="">
                                <i class="icofont-phone"></i>
                            </div> -->

                            <!-- <div class="form-input">
                                <input type="text" class="User Name" name="address" placeholder="<?php echo e($langg->lang185); ?>" required="">
                                <i class="icofont-location-pin"></i>
                            </div> -->

                            <div class="form-input">
                                <input type="password" class="Password" name="password" placeholder="<?php echo e($langg->lang186); ?>"
                                required="">
                                <i class="icofont-ui-password"></i>
                            </div>

                            <div class="form-input">
                                <input type="password" class="Password" name="password_confirmation"
                                placeholder="<?php echo e($langg->lang187); ?>" required="">
                                <i class="icofont-ui-password"></i>
                            </div>

                            <?php if($gs->is_capcha == 1): ?>

                            <ul class="captcha-area">
                                <li>
                                <p><img class="codeimg1" src="<?php echo e(asset("assets/images/capcha_code.png")); ?>" alt=""> <i
                                    class="fas fa-sync-alt pointer refresh_code "></i></p>
                                </li>
                            </ul>

                            <div class="form-input">
                                <input type="text" class="Password" name="codes" placeholder="<?php echo e($langg->lang51); ?>" required="">
                                <i class="icofont-refresh"></i>
                            </div>

                            <?php endif; ?>

                            <input class="mprocessdata" type="hidden" value="<?php echo e($langg->lang188); ?>">
                            <button type="submit" class="submit-btn"><?php echo e($langg->lang189); ?></button>

                            </form>
                        </div>
                    </div>
				</div>

      <!-- Modal footer -->
				<div class="modal-footer" style="text-align:right;">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="background: grey; color:white;"><?php echo e($langg->lang321); ?></button>
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
  var mainurl = "<?php echo e(url('/')); ?>";
  var gs      = <?php echo json_encode($gs); ?>;
  var langg    = <?php echo json_encode($langg); ?>;
</script>

	<!-- jquery -->
	<script src="<?php echo e(asset('assets/front/js/jquery.js')); ?>"></script>
	
	<script src="<?php echo e(asset('assets/front/jquery-ui/jquery-ui.min.js')); ?>"></script>
	<!-- popper -->
	<script src="<?php echo e(asset('assets/front/js/popper.min.js')); ?>"></script>
	<!-- bootstrap -->
	<script src="<?php echo e(asset('assets/front/js/bootstrap.min.js')); ?>"></script>
	<!-- plugin js-->
	<script src="<?php echo e(asset('assets/front/js/plugin.js')); ?>"></script>

	<script src="<?php echo e(asset('assets/front/js/xzoom.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/front/js/jquery.hammer.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/front/js/setup.js')); ?>"></script>

	<script src="<?php echo e(asset('assets/front/js/toastr.js')); ?>"></script>
	<!-- main -->
	<script src="<?php echo e(asset('assets/front/js/main.js')); ?>"></script>
	<!-- custom -->
	<script src="<?php echo e(asset('assets/front/js/custom.js')); ?>"></script>

    <?php echo $seo->google_analytics; ?>


	<?php if($gs->is_talkto == 1): ?>
		<!--Start of Tawk.to Script-->
		<?php echo $gs->talkto; ?>

		<!--End of Tawk.to Script-->
	<?php endif; ?>

	<?php echo $__env->yieldContent('scripts'); ?>
	<script>
		function show_hide_dropdowns() {
			$("#dropdownMenuButton1").toggleClass("active_dropdown");
		}
	</script>

</body>

</html>


    

    
    
    
    

