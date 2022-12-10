<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.show')); ?> <?php echo e(trans('cruds.course.title')); ?>

    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="<?php echo e(route('admin.courses.index')); ?>">
                    <?php echo e(trans('global.back_to_list')); ?>

                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.course.fields.id')); ?>

                        </th>
                        <td>
                            <?php echo e($course->id); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.course.fields.name')); ?>

                        </th>
                        <td>
                            <?php echo e($course->name); ?>

                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="<?php echo e(route('admin.courses.index')); ?>">
                    <?php echo e(trans('global.back_to_list')); ?>

                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.relatedData')); ?>

    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#course_sessions" role="tab" data-toggle="tab">
                <?php echo e(trans('cruds.session.title')); ?>

            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#course_users" role="tab" data-toggle="tab">
                <?php echo e(trans('cruds.user.title')); ?>

            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#course_packages" role="tab" data-toggle="tab">
                <?php echo e(trans('cruds.package.title')); ?>

            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="course_sessions">
            <?php if ($__env->exists('admin.courses.relationships.courseSessions', ['sessions' => $course->courseSessions])) echo $__env->make('admin.courses.relationships.courseSessions', ['sessions' => $course->courseSessions], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="tab-pane" role="tabpanel" id="course_users">
            <?php if ($__env->exists('admin.courses.relationships.courseUsers', ['users' => $course->courseUsers])) echo $__env->make('admin.courses.relationships.courseUsers', ['users' => $course->courseUsers], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="tab-pane" role="tabpanel" id="course_packages">
            <?php if ($__env->exists('admin.courses.relationships.coursePackages', ['packages' => $course->coursePackages])) echo $__env->make('admin.courses.relationships.coursePackages', ['packages' => $course->coursePackages], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Laravel-School-Timetable-Calendar-master\resources\views/admin/courses/show.blade.php ENDPATH**/ ?>