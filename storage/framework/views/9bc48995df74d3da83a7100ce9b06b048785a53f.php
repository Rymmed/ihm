<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.edit')); ?> <?php echo e(trans('cruds.package.title_singular')); ?>

    </div>

    <div class="card-body">
        <form method="POST" action="<?php echo e(route("admin.packages.update", [$package->id])); ?>" enctype="multipart/form-data">
            <?php echo method_field('PUT'); ?>
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label class="required" for="name"><?php echo e(trans('cruds.package.fields.name')); ?></label>
                <input class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" type="text" name="name" id="name" value="<?php echo e(old('name', $package->name)); ?>" required>
                <?php if($errors->has('name')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('name')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.package.fields.name_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="duration"><?php echo e(trans('cruds.package.fields.duration')); ?></label>
                <input class="form-control <?php echo e($errors->has('duration') ? 'is-invalid' : ''); ?>" type="text" name="duration" id="duration" value="<?php echo e(old('duration', $package->duration)); ?>" required>
                <?php if($errors->has('duration')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('duration')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.package.fields.duration_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="price"><?php echo e(trans('cruds.package.fields.price')); ?></label>
                <input class="form-control <?php echo e($errors->has('price') ? 'is-invalid' : ''); ?>" type="text" name="price" id="price" value="<?php echo e(old('price', $package->price)); ?>" required>
                <?php if($errors->has('price')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('price')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.package.fields.price_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="courses"><?php echo e(trans('cruds.package.fields.course')); ?></label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0"><?php echo e(trans('global.select_all')); ?></span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0"><?php echo e(trans('global.deselect_all')); ?></span>
                </div>
                <select class="form-control select2 <?php echo e($errors->has('courses') ? 'is-invalid' : ''); ?>" name="courses[]" id="courses" multiple required>
                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $courses): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($id); ?>" <?php echo e((in_array($id, old('courses', [])) || $package->courses->contains($id)) ? 'selected' : ''); ?>><?php echo e($courses); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('courses')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('courses')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.package.fields.course_helper')); ?></span>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\FA-Manager\resources\views/admin/packages/edit.blade.php ENDPATH**/ ?>