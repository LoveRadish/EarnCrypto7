<?php $__env->startSection('content'); ?>
    <section class="funnels">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <?php $__currentLoopData = $vsls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vsl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="funnel_card">
                            <?php if(Session::get('language') == 12 ): ?>
                                <img src="<?php echo e(asset('assets/images/vsls/2.png')); ?>" alt="" style="width:100%;">
                            <?php elseif(Session::get('language') == 13 ): ?>
                                <img src="<?php echo e(asset('assets/images/vsls/3.png')); ?>" alt="" style="width:100%;">
                            <?php else: ?>
                                <img src="<?php echo e(asset('assets/images/vsls/1.png')); ?>" alt="" style="width:100%;">
                            <?php endif; ?>
                            <h3><?php echo e($langg->lang1547); ?> #1</h3>
                            <div class="custom_container">
                                <div class="card" style="border:none; margin:0px;">
                                    <a class="card-button" href='<?php echo e(route("front.vsl", $vsl->id )); ?>' target="blank"><?php echo e($langg->lang1556); ?></a>
                                </div>
                                <input class="address_url" text="input" value='<?php echo e(route("front.vsl", $vsl->id )); ?>' />
                                <div class="custom_row">
                                    <div class="column">
                                        <?php echo e($langg->lang1557); ?>

                                    </div>
                                    <div class="column">
                                        Leads
                                    </div>
                                    <div class="column">
                                        <?php echo e($langg->lang1534); ?>

                                    </div>
                                </div>
                                <div class="custom_row">
                                    <div class="column_no_border">
                                        <?php echo e($vsl->hits); ?>

                                    </div>
                                    <div class="column_no_border">
                                        <?php echo e($vsl->leads); ?>

                                    </div>
                                    <div class="column_no_border">
                                        <?php echo e($members_count); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>