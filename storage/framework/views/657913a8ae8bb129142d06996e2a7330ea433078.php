<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.user.title_singular')); ?>

    </div>

    <div class="card-body">
        <form method="POST" action="<?php echo e(route("admin.users.store")); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label class="required" for="name"><?php echo e(trans('cruds.user.fields.name')); ?></label>
                <input class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" type="text" name="name" id="name" value="<?php echo e(old('name', '')); ?>" required>
                <?php if($errors->has('name')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('name')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.user.fields.name_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="email"><?php echo e(trans('cruds.user.fields.email')); ?></label>
                <input class="form-control <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>" type="text" name="email" id="email" value="<?php echo e(old('email')); ?>" required>
                <?php if($errors->has('email')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('email')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.user.fields.email_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="password"><?php echo e(trans('cruds.user.fields.password')); ?></label>
                <input class="form-control <?php echo e($errors->has('password') ? 'is-invalid' : ''); ?>" type="password" name="password" id="password" required>
                <?php if($errors->has('password')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('password')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.user.fields.password_helper')); ?></span>
            </div>

            <?php if(!request()): ?> has('coach') ? has('member'))
                <div class="form-group">
                    <label class="required" for="roles"><?php echo e(trans('cruds.user.fields.roles')); ?></label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all" style="border-radius: 0"><?php echo e(trans('global.select_all')); ?></span>
                        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0"><?php echo e(trans('global.deselect_all')); ?></span>
                    </div>
                    <select class="form-control select2 <?php echo e($errors->has('roles') ? 'is-invalid' : ''); ?>" name="roles[]" id="roles" multiple required>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $roles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($id); ?>" <?php echo e(in_array($id, old('roles', [])) ? 'selected' : ''); ?>><?php echo e($roles); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php if($errors->has('roles')): ?>
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('roles')); ?>

                        </div>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.user.fields.roles_helper')); ?></span>
                </div>
            <?php elseif(request()->has('member')): ?>
                <input type="hidden" name="roles[]" value="4">               
            <?php else: ?>
                <input type="hidden" name="roles[]" value="3">
            <?php endif; ?>
            
            <?php if(request()->has('coach')): ?>
                <div class="form-group">
                    <label for="course_id"><?php echo e(trans('cruds.user.fields.course')); ?></label>
                    <select class="form-control select2 <?php echo e($errors->has('course') ? 'is-invalid' : ''); ?>" name="course_id" id="course_id" required>
                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($id); ?>" <?php echo e(old('course_id') == $id ? 'selected' : ''); ?>><?php echo e($course); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php if($errors->has('course')): ?>
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('course')); ?>

                        </div>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.user.fields.course_helper')); ?></span>
                </div>
            <?php elseif(request()->has('member')): ?>
                <div class="form-group">
                    <label for="package_id"><?php echo e(trans('cruds.user.fields.package')); ?></label>
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
                    <span class="help-block"><?php echo e(trans('cruds.user.fields.package_helper')); ?></span>
                </div>
            <?php endif; ?>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    <?php echo e(trans('global.save')); ?>

                </button>
            </div>
        </form>
    </div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\FA-Manager\resources\views/admin/users/create.blade.php ENDPATH**/ ?>