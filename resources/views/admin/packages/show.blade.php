@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.package.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.packages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.package.fields.id') }}
                        </th>
                        <td>
                            {{ $package->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.package.fields.name') }}
                        </th>
                        <td>
                            {{ $package->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.package.fields.duration') }}
                        </th>
                        <td>
                            {{ $package->duration }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.package.fields.price') }}
                        </th>
                        <td>
                            {{ $package->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.package.fields.course') }}
                        </th>
                        <td>
                            @foreach($package->courses as $key => $courses)
                                <span class="label label-info">{{ $courses->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.packages.index') }}">
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
            <a class="nav-link" href="#package_courses" role="tab" data-toggle="tab">
                {{ trans('cruds.package.title') }}
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="#package_users" role="tab" data-toggle="tab">
                {{ trans('cruds.user.title') }}
            </a>
        </li> --}}
    </ul>
    <div class="tab-content">
        {{-- <div class="tab-pane" role="tabpanel" id="package_courses">
            @includeIf('admin.packages.relationships.packageCourses', ['courses' => $package->packageCourses])
        </div> --}}
        <div class="tab-pane" role="tabpanel" id="package_users">
            @includeIf('admin.packages.relationships.packageMembers', ['users' => $package->packageUsers])
        </div>
    </div>
</div>

@endsection