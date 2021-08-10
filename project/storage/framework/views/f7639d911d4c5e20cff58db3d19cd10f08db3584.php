<?php $__env->startSection('content'); ?>
    <section class="funnels">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <?php $__currentLoopData = $funnels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $funnel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="funnel_card">
                            
                            <?php if(Session::get('language') == 12 ): ?>
                                <img src="<?php echo e(asset('assets/images/funnels/2.jpg')); ?>" alt="" style="width:100%;">
                            <?php elseif(Session::get('language') == 13 ): ?>
                                <img src="<?php echo e(asset('assets/images/funnels/3.jpg')); ?>" alt="" style="width:100%;">
                            <?php else: ?>
                                <img src="<?php echo e(asset('assets/images/funnels/1.jpg')); ?>" alt="" style="width:100%;">
                            <?php endif; ?>

                            <h3><?php echo e($langg->lang1599); ?></h3>
                            <div class="custom_container">
                                <?php
                                    $user_id = Auth::user()->id;
                                    $user = "cp".$user_id;
                                    $lang = "en";
                                    if(Session::get('language') == 12 )
                                        $lang = "es";
                                    if(Session::get('language') == 13 )
                                        $lang = "pt";
                                ?>
                                <div class="card" style="border:none; margin:0px;">
                                    <a class="card-button" href="<?php echo e(route('front.funnel',[$lang, $user,$funnel->url])); ?>" target="blank"><?php echo e($langg->lang1556); ?></a>
                                </div>
                                <input class="address_url" text="input" value="<?php echo e(route('front.funnel',[$lang, $user, $funnel->url])); ?>" />
                                <div class="custom_row">
                                    <div class="column">
                                        <?php echo e($langg->lang1557); ?>

                                    </div>
                                    <div class="column">
                                        <?php echo e($langg->lang1533); ?>

                                    </div>
                                    <div class="column">
                                        <?php echo e($langg->lang1534); ?>

                                    </div>
                                </div>
                                <div class="custom_row">
                                    <div class="column_no_border">
                                        <?php echo e($funnel->hits); ?>

                                    </div>
                                    <div class="column_no_border">
                                        <?php echo e($leads); ?>

                                    </div>
                                    <div class="column_no_border">
                                        <?php echo e($members_count); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="col-lg-8 col-12 vertical_center" style="align-items:center; margin: 30px 0px;">
                    
                    <?php if(Session::get('language') == 12 ): ?>
                        <iframe src="https://player.vimeo.com/video/578871849" width="80%" height="400px" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                    <?php elseif(Session::get('language') == 13 ): ?>
                        <iframe src="https://player.vimeo.com/video/578871883" width="80%" height="400px" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                    <?php else: ?>
                        <iframe src="https://player.vimeo.com/video/578871814" width="80%" height="400px" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>