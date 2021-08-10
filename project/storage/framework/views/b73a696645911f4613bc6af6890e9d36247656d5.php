<?php $__env->startSection('content'); ?>
<section class="hero-area">
    <div class="container">
        <div class="row" style="margin-bottom:25px;">
            <h3 style="color:red;font-weight:bold;"><?php echo e($langg->lang1558); ?></h3>
        </div>
        <div class="row" style="margin-bottom:25px;">
            <div class="col-lg-7 decrease-padding">
                <?php if(Session::get('language') == 12 ): ?>
                    <iframe src="https://player.vimeo.com/video/576191453" width="100%" height="400px" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                <?php elseif(Session::get('language') == 13 ): ?>
                    <iframe src="https://player.vimeo.com/video/576191883" width="100%" height="400px" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                <?php else: ?>
                    <iframe src="https://player.vimeo.com/video/573632401" width="100%" height="400px" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                <?php endif; ?>
            </div>
            <div class="col-lg-5 decrease-padding vertical_center">
                <div class="card">
                    <span class='card-title'><?php echo e($langg->lang1559); ?></span>
                    <?php if(Session::get('language') == 12 ): ?>
                        <a class="card-button" href="https://t.me/joinchat/fC49qTlTjGxhMjgx" target="blank" ><?php echo e($langg->lang1560); ?></a>    
                    <?php elseif(Session::get('language') == 13 ): ?>
                        <a class="card-button" href="https://t.me/joinchat/fC49qTlTjGxhMjgx" target="blank" ><?php echo e($langg->lang1560); ?></a>    
                    <?php else: ?>
                        <a class="card-button" href="https://t.me/joinchat/VVDRu-HmMY9mZTkx" target="blank" ><?php echo e($langg->lang1560); ?></a>
                    <?php endif; ?>
                </div>
                <div class="card">
                    <a class="card-button" href="<?php echo e(route('front.step2')); ?>" ><?php echo e($langg->lang1561); ?></a>
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