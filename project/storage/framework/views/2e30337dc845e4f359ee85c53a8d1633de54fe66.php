<?php $__env->startSection('content'); ?>

<style>
    @media (max-width: 1180px)
    {
        .custom-col-lg-12 {
            flex: 0 0 100% !important;
            max-width: 100% !important;
        }
    }
</style>

<section class="hero-area">
    <div class="container">
        <div class="row" style="margin-bottom:25px;">
            <h3 style="color:red;font-weight:bold;"><?php echo e($langg->lang1558); ?></h3>
        </div>
        <div class="row" style="margin-bottom:25px;">
            <div class="col-lg-7 decrease-padding second_step_left_video">

                <?php if(Session::get('language') == 12 ): ?>
                    <div class="margin_bottom_30">
                        <iframe src="https://player.vimeo.com/video/576191415" width="100%" height="400px" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                    </div>

                <?php elseif(Session::get('language') == 13 ): ?>
                    <div class="margin_bottom_30">
                        <iframe src="https://player.vimeo.com/video/576191854" width="100%" height="400px" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                    </div>
                <?php else: ?>
                    <div class="margin_bottom_30">
                        <iframe src="https://player.vimeo.com/video/573632411" width="100%" height="400px" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                    </div>
                <?php endif; ?>

            </div>
            
            <div class="col-lg-5 decrease-padding" style="margin-top:70px;">
                <div class="card">
                    <span class='card-title'><?php echo e($langg->lang1575); ?> </span>
                    <div class="row">
                        <?php if(Session::get('language') == 12 || Session::get('language') == 13): ?>                            
                            <div class="col-12" style="margin:30px 0px 0px;">
                                <a href="https://www.approfits.com/video" class="card-button" style="padding:10px 30px;" target="blank"><?php echo e($langg->lang1576); ?> </a>
                                <h5 style="color:red;font-weight:bold; margin-top:30px;"><?php echo e($langg->lang1603); ?></h5>
                            </div>
                            <div class="col-12" style="margin:30px 0px 0px;">
                                <?php if(!Auth::user()->binance_link): ?>
                                    <a href="https://accounts.binance.com/en/register?ref=88145388" class="card-button" style="padding:10px 30px;" target="blank"><?php echo e($langg->lang1577); ?> </a>
                                <?php else: ?>
                                    <a href="<?php echo e(Auth::user()->binance_link); ?>" class="card-button" style="padding:10px 30px;" target="blank"><?php echo e($langg->lang1577); ?> </a>
                                <?php endif; ?>
                            </div>
                        <?php else: ?>
                            <div class="col-lg-6 col-12 custom-col-lg-12" style="margin:30px 0px 0px;">
                                <a href="https://www.approfits.com/video" class="card-button" style="padding:10px 30px;" target="blank"><?php echo e($langg->lang1576); ?> </a>
                                <h5 style="color:red;font-weight:bold; margin-top:15px;"><?php echo e($langg->lang1603); ?></h5>
                            </div>
                            <div class="col-lg-6 col-12 custom-col-lg-12" style="margin:30px 0px 30px;">
                                <?php if(!Auth::user()->binance_link): ?>
                                    <a href="https://accounts.binance.com/en/register?ref=88145388" class="card-button" style="padding:10px 30px;" target="blank"><?php echo e($langg->lang1577); ?> </a>
                                <?php else: ?>
                                    <a href="<?php echo e(Auth::user()->binance_link); ?>" class="card-button" style="padding:10px 30px;" target="blank"><?php echo e($langg->lang1577); ?> </a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card">
                    <span class='card-title'><?php echo e($langg->lang1606); ?></span>
                    <?php if(!Auth::user()->binance_outside_link): ?>
                        <a href="https://www.huobi.ge/en-us/topic/invited/?invite_code=mc6p2223&t=1628514195842" class="card-button"><?php echo e($langg->lang1560); ?></a>
                    <?php else: ?>
                        <a href="<?php echo e(Auth::user()->binance_outside_link); ?> " class="card-button"><?php echo e($langg->lang1560); ?></a>
                    <?php endif; ?>
                </div>
                <div class="card">
                    <a class="card-button" href='<?php echo e(route("front.step3")); ?>' ><?php echo e($langg->lang1579); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
	<script>
        $(window).on('load',function() {

            setTimeout(function(){

                $('#extraData').load('<?php echo e(route('front.extraIndex')); ?>');

            }, 500);
        });

	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>