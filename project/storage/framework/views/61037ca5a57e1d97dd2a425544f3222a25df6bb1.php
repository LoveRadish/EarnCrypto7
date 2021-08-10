<?php $__env->startSection('content'); ?>
<section class="hero-area">
    <div class="container">
        <div class="row" style="margin-bottom:25px;">
            <h3 style="color:red;font-weight:bold;"><?php echo e($langg->lang1558); ?></h3>
        </div>

        <?php

            $video_array = [573632440, 580179680, 580180214, 580179764, 580179851];
            if( Session::get('language') == 12 )
                $video_array = [576191306, 580299227, 580299323, 580299389, 580299446, 580299514];
            if( Session::get('language') == 13 )
                $video_array = [576191755, 579127875, 579127938, 579127923, 579127894, 579127969, 579127833, 579127980, 579127958, 579127991];

        ?>

        <div class="row" style="margin-bottom:25px;">
            <div class="col-lg-7 decrease-padding">             
                <?php for($i = 0; $i < count($video_array); $i++): ?>
                    <?php if( $video_array[$i] != 576191755 && Session::get('language') == 13 ): ?>
                        <div class="margin_bottom_30" style="border:6px solid grey;">
                            <iframe src="https://player.vimeo.com/video/<?php echo e($video_array[$i]); ?>" width="100%" height="400px" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                        </div>
                    <?php else: ?>
                        <div class="margin_bottom_30">
                            <iframe src="https://player.vimeo.com/video/<?php echo e($video_array[$i]); ?>" width="100%" height="400px" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
            <div class="col-lg-5 decrease-padding">
                <div class="card">
                    <span class='card-title'><?php echo e($langg->lang1580); ?></span>
                    <?php if(!Auth::user()->company_link): ?>
                        <a class="card-button" href="<?php echo e($sponsor->company_link); ?>" target="blank"><?php echo e($langg->lang1581); ?></a>
                    <?php else: ?>
                        <a class="card-button" href="<?php echo e(Auth::user()->company_link); ?>" target="blank"><?php echo e($langg->lang1581); ?></a>
                    <?php endif; ?>
                </div>
                <div class="card">
                    <a class="card-button" href='<?php echo e(route("front.step4")); ?>' ><?php echo e($langg->lang1582); ?></a>
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