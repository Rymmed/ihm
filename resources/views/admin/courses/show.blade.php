@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.course.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.courses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.id') }}
                        </th>
                        <td>
                            {{ $course->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.name') }}
                        </th>
                        <td>
                            {{ $course->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.courses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#course_sessions" role="tab" data-toggle="tab">
                {{ trans('cruds.session.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#course_users" role="tab" data-toggle="tab">
                {{ trans('cruds.user.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#course_packages" role="tab" data-toggle="tab">
                {{ trans('cruds.package.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="course_sessions">
            @includeIf('admin.courses.relationships.courseSessions', ['sessions' => $course->courseSessions])
        </div>
        <div class="tab-pane" role="tabpanel" id="course_users">
            @includeIf('admin.courses.relationships.courseUsers', ['users' => $course->courseUsers])
        </div>
        <div class="tab-pane" role="tabpanel" id="course_packages">
            @includeIf('admin.courses.relationships.coursePackages', ['packages' => $course->coursePackages])
        </div>
    </div>
</div>

@endsection