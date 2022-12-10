<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.subscription.title_singular')); ?>

    </div>

    <div class="card-body">
        <form method="POST" action="<?php echo e(route("admin.subscriptions.store")); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label class="required" for="package_id"><?php echo e(trans('cruds.subscription.fields.package')); ?></label>
                <select class="form-control select2 <?php echo e($errors->has('package') ? 'is-invalid' : ''); ?>" name="package_id" id="package_id" required>
                    <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($id); ?>" <?php echo e(old('package_id') == $id ? 'selected' : ''); ?>><?php echo e($package); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('package')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('package')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.subscription.fields.package_helper')); ?></span>
            </div>

            <div class="form-group">
                <label class="required" for="member_id"><?php echo e(trans('cruds.subscription.fields.member')); ?></label>
                <select class="form-control select2 <?php echo e($errors->has('member') ? 'is-invalid' : ''); ?>" name="member_id" id="member_id" required>
                    <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($id); ?>" <?php echo e(old('member_id') == $id ? 'selected' : ''); ?>><?php echo e($member); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('member')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('member')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.subscription.fields.member_helper')); ?></span>
            </div>

            <div class="form-check">
                <input class="form-check-input <?php echo e($errors->has('state') ? 'is-invalid' : ''); ?>" 
                        type="checkbox" 
                        name="state" 
                        id="state" 
                        value="1" required>
                <label for="state" class="form-check-label"><?php echo e(trans('cruds.subscription.fields.state')); ?></label>
                <?php if($errors->has('state')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('state')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.subscription.fields.state_helper')); ?></span>
            </div>
        

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    <?php echo e(trans('global.save')); ?>

                </button>
            </div>
        </form>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\FA-Manager\resources\views/admin/subscriptions/create.blade.php ENDPATH**/ ?>