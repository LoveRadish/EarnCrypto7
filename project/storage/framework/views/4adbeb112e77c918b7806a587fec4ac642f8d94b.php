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
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/common.css')); ?>">
	<!-- responsive -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/responsive.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/common-responsive.css')); ?>">

    <!--Updated CSS-->
 <link rel="stylesheet" href="<?php echo e(asset('assets/front/css/styles.php?color='.str_replace('#','',$gs->colors).'&amp;'.'header_color='.str_replace('#','',$gs->header_color).'&amp;'.'footer_color='.str_replace('#','',$gs->footer_color).'&amp;'.'copyright_color='.str_replace('#','',$gs->copyright_color).'&amp;'.'menu_color='.str_replace('#','',$gs->menu_color).'&amp;'.'menu_hover_color='.str_replace('#','',$gs->menu_hover_color))); ?>">

<?php endif; ?>



</head>

<body style="background:black">



<section class="login-signup">
  <div class="container">
    <div class="row justify-content-center" style="margin-top:100px;">
      <img src="<?php echo e(asset('assets/images/logo_white.png')); ?>" width="20%"/>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-6">
        
        <div class="tab-content" id="nav-tabContent">
            <div class="login-area">
              <div class="header-area">
                <h4 class="title"><?php echo e($langg->lang172); ?></h4>
              </div>
              <div class="login-form signin-form">
                <?php echo $__env->make('includes.admin.form-login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <form class="mloginform" action="<?php echo e(route('user.login.submit')); ?>" method="POST">
                  <?php echo e(csrf_field()); ?>

                  <div class="form-input">
                    <input type="email" name="email" placeholder="<?php echo e($langg->lang173); ?>" required="">
                    <i class="icofont-user-alt-5"></i>
                  </div>
                  <div class="form-input">
                    <input type="password" class="Password" name="password" placeholder="<?php echo e($langg->lang174); ?>"
                      required="">
                    <i class="icofont-ui-password"></i>
                  </div>
                  <div class="form-forgot-pass">
                    <div class="left">
                      <input type="checkbox" name="remember" id="mrp" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                      <label for="mrp"><?php echo e($langg->lang175); ?></label>
                    </div>
                    <div class="right">
                      <a href="<?php echo e(route('user-forgot')); ?>">
                        <?php echo e($langg->lang176); ?>

                      </a>
                    </div>
                  </div>
                  <input type="hidden" name="modal" value="1">
                  <input class="mauthdata" type="hidden" value="<?php echo e($langg->lang177); ?>">
                  <button type="submit" class="submit-btn"><?php echo e($langg->lang178); ?></button>
                  <!-- <?php if(App\Models\Socialsetting::find(1)->f_check == 1 || App\Models\Socialsetting::find(1)->g_check ==
                  1): ?>
                  <div class="social-area">
                    <h3 class="title"><?php echo e($langg->lang179); ?></h3>
                    <p class="text"><?php echo e($langg->lang180); ?></p>
                    <ul class="social-links">
                      <?php if(App\Models\Socialsetting::find(1)->f_check == 1): ?>
                      <li>
                        <a href="<?php echo e(route('social-provider','facebook')); ?>">
                          <i class="fab fa-facebook-f"></i>
                        </a>
                      </li>
                      <?php endif; ?>
                      <?php if(App\Models\Socialsetting::find(1)->g_check == 1): ?>
                      <li>
                        <a href="<?php echo e(route('social-provider','google')); ?>">
                          <i class="fab fa-google-plus-g"></i>
                        </a>
                      </li>
                      <?php endif; ?>
                    </ul>
                  </div>
                  <?php endif; ?> -->
                </form>
              </div>
            </div>
        </div>

      </div>

    </div>
  </div>
</section>



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

</body>

</html>
