<?php $__env->startSection('content'); ?>
    <section class="traffic">
        <div class="container">
            <h3><?php echo e($langg->lang1584); ?> </h3>
            <div class="udimi_box">
                <img src="<?php echo e(asset('assets/images/traffic/udimi.png')); ?>" alt="" width="100%">
                
                <h3 style="color: #ffa800; text-align:center; font-weight:bold;"><?php echo e($langg->lang1588); ?></h3>
                
                <div style="margin-top:30px;">
                    <a class="card-button" style="padding:10px;" href="<?php echo e(route('front.training')); ?>"><?php echo e($langg->lang1588); ?></a>
                </div>
                
                
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>