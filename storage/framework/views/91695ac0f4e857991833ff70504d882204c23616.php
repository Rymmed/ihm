<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.session.title_singular')); ?>

    </div>

    <div class="card-body">
        <form method="POST" action="<?php echo e(route("admin.sessions.store")); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label class="required" for="course_id"><?php echo e(trans('cruds.session.fields.course')); ?></label>
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
                <span class="help-block"><?php echo e(trans('cruds.session.fields.course_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="coach_id"><?php echo e(trans('cruds.session.fields.coach')); ?></label>
                <select class="form-control select2 <?php echo e($errors->has('coach') ? 'is-invalid' : ''); ?>" name="coach_id" id="coach_id" required>
                    <?php $__currentLoopData = $coaches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $coach): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($id); ?>" <?php echo e(old('coach_id') == $id ? 'selected' : ''); ?>><?php echo e($coach); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('coach')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('coach')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.session.fields.coach_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="weekday"><?php echo e(trans('cruds.session.fields.weekday')); ?></label>
                <input class="form-control <?php echo e($errors->has('weekday') ? 'is-invalid' : ''); ?>" type="number" name="weekday" id="weekday" value="<?php echo e(old('weekday')); ?>" step="1" required>
                <?php if($errors->has('weekday')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('weekday')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.session.fields.weekday_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="start_time"><?php echo e(trans('cruds.session.fields.start_time')); ?></label>
                <input class="form-control session-timepicker <?php echo e($errors->has('start_time') ? 'is-invalid' : ''); ?>" type="text" name="start_time" id="start_time" value="<?php echo e(old('start_time')); ?>" required>
                <?php if($errors->has('start_time')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('start_time')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.session.fields.start_time_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="end_time"><?php echo e(trans('cruds.session.fields.end_time')); ?></label>
                <input class="form-control session-timepicker <?php echo e($errors->has('end_time') ? 'is-invalid' : ''); ?>" type="text" name="end_time" id="end_time" value="<?php echo e(old('end_time')); ?>" required>
                <?php if($errors->has('end_time')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('end_time')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.session.fields.end_time_helper')); ?></span>
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

<?php $__env->startSection('scripts'); ?>
##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
<script>
    
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\FA-Manager\resources\views/admin/sessions/create.blade.php ENDPATH**/ ?>