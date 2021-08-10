<?php $__env->startSection('content'); ?>

    <style>
        .resources {
            margin: 50px 0px;
        }
        .resources .row div {
            margin-top: 20px;
        }
    </style>

    <section class="resources">
        <div class="container">
            <?php if(Session::get('language') == 12 ): ?>
                <div class="row" style="text-align:center;">
                    <div class="col-lg-6 col-md-6 col-12">
                        <img src="<?php echo e(asset('assets/images/resources/SP_Horizontal_1.jpg')); ?>" alt="" width="75%">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <img src="<?php echo e(asset('assets/images/resources/SP_Horizontal_2.jpg')); ?>" alt="" width="75%">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <img src="<?php echo e(asset('assets/images/resources/SP_Horizontal_3.jpg')); ?>" alt="" width="75%">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <img src="<?php echo e(asset('assets/images/resources/SP_Horizontal_4.jpg')); ?>" alt="" width="75%">
                    </div>
                </div>
            <?php elseif(Session::get('language') == 13 ): ?>
                <div class="row" style="text-align:center;">
                    <div class="col-lg-6 col-md-6 col-12">
                        <img src="<?php echo e(asset('assets/images/resources/PT_Horizontal_1.jpg')); ?>" alt="" width="75%">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <img src="<?php echo e(asset('assets/images/resources/PT_Horizontal_2.jpg')); ?>" alt="" width="75%">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <img src="<?php echo e(asset('assets/images/resources/PT_Horizontal_3.jpg')); ?>" alt="" width="75%">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <img src="<?php echo e(asset('assets/images/resources/PT_Horizontal_4.jpg')); ?>" alt="" width="75%">
                    </div>
                </div>
            <?php else: ?>
                <div class="row" style="text-align:center;">
                    <div class="col-lg-6 col-md-6 col-12">
                        <img src="<?php echo e(asset('assets/images/resources/EN_Horizontal_1.jpg')); ?>" alt="" width="75%">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <img src="<?php echo e(asset('assets/images/resources/EN_Horizontal_2.jpg')); ?>" alt="" width="75%">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <img src="<?php echo e(asset('assets/images/resources/EN_Horizontal_3.jpg')); ?>" alt="" width="75%">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <img src="<?php echo e(asset('assets/images/resources/EN_Horizontal_4.jpg')); ?>" alt="" width="75%">
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>