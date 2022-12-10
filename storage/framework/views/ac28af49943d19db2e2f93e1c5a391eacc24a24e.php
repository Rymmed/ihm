<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="<?php echo e(route("admin.home")); ?>" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    <?php echo e(trans('global.dashboard')); ?>

                </a>
            </li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_management_access')): ?>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        <?php echo e(trans('cruds.userManagement.title')); ?>

                    </a>
                    <ul class="nav-dropdown-items">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_access')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route("admin.permissions.index")); ?>" class="nav-link <?php echo e(request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : ''); ?>">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon">

                                    </i>
                                    <?php echo e(trans('cruds.permission.title')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_access')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route("admin.roles.index")); ?>" class="nav-link <?php echo e(request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : ''); ?>">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    <?php echo e(trans('cruds.role.title')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_access')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route("admin.users.index")); ?>" class="nav-link <?php echo e(request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : ''); ?>">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    <?php echo e(trans('cruds.user.title')); ?>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route("admin.users.index")); ?>?role=3" class="nav-link <?php echo e(request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : ''); ?>">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    Entraîneurs
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route("admin.users.index")); ?>?role=4" class="nav-link <?php echo e(request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : ''); ?>">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    Adhérents
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('course_access')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route("admin.courses.index")); ?>" class="nav-link <?php echo e(request()->is('admin/courses') || request()->is('admin/courses/*') ? 'active' : ''); ?>">
                        <i class="fa-fw fas fa-dumbbell nav-icon">

                        </i>
                        <?php echo e(trans('cruds.course.title')); ?>

                    </a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('package_access')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route("admin.packages.index")); ?>" class="nav-link <?php echo e(request()->is('admin/packages') || request()->is('admin/packages/*') ? 'active' : ''); ?>">
                        <i class="fa-fw fas fa-box nav-icon">

                        </i>
                        <?php echo e(trans('cruds.package.title')); ?>

                    </a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('session_access')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route("admin.sessions.index")); ?>" class="nav-link <?php echo e(request()->is('admin/sessions') || request()->is('admin/sessions/*') ? 'active' : ''); ?>">
                        <i class="fa-fw fas fa-clock nav-icon">

                        </i>
                        <?php echo e(trans('cruds.session.title')); ?>

                    </a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a href="<?php echo e(route("admin.calendar.index")); ?>" class="nav-link <?php echo e(request()->is('admin/calendar') || request()->is('admin/calendar/*') ? 'active' : ''); ?>">
                    <i class="fa-fw fas fa-calendar nav-icon">

                    </i>
                    Calendrier
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    <?php echo e(trans('global.logout')); ?>

                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" style="background: #02131a;" type="button"></button>
</div>
<?php /**PATH C:\laragon\www\Laravel-School-Timetable-Calendar-master\resources\views/partials/menu.blade.php ENDPATH**/ ?>