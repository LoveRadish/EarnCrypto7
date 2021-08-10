<?php $__env->startSection('content'); ?>

    <style>
        .leader_board span {
            font-size: 25px;
        }
    </style>

    <section class="leader_board">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-md-6 col-xs-12">
                    <div class="leader_board_title_div">
                        <h3><?php echo e($langg->lang1562); ?></h3>
                    </div>
                    <?php $__currentLoopData = $sponsor_ranking_30; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <span> <?php echo e($key+1); ?>. <?php echo e($value); ?></span><br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="col-lg-3 col-md-3 col-md-6 col-xs-12">
                    <div class="leader_board_title_div">
                        <h3><?php echo e($langg->lang1563); ?></h3>
                    </div>
                    <?php $__currentLoopData = $sponsor_ranking_3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <span> <?php echo e($key+1); ?>. <?php echo e($value); ?></span><br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="col-lg-3 col-md-3 col-md-6 col-xs-12">
                    <div class="leader_board_title_div">
                        <h3><?php echo e($langg->lang1564); ?></h3>
                    </div>
                    <?php $__currentLoopData = $sponsor_ranking_6; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <span> <?php echo e($key+1); ?>. <?php echo e($value); ?></span><br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="col-lg-3 col-md-3 col-md-6 col-xs-12">
                    <div class="leader_board_title_div">
                        <h3><?php echo e($langg->lang1565); ?></h3>
                    </div>
                    <?php $__currentLoopData = $sponsor_ranking_12; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <span> <?php echo e($key+1); ?>. <?php echo e($value); ?></span><br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>