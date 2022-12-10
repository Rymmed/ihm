@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.package.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.packages.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.package.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.package.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="duration">{{ trans('cruds.package.fields.duration') }}</label>
                <input class="form-control {{ $errors->has('duration') ? 'is-invalid' : '' }}" type="text" name="duration" id="duration" value="{{ old('duration', '') }}" required>
                @if($errors->has('duration'))
                    <div class="invalid-feedback">
                        {{ $errors->first('duration') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.package.fields.duration_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price">{{ trans('cruds.package.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="text" name="price" id="price" value="{{ old('price', '') }}" required>
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.package.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="courses">{{ trans('cruds.package.fields.course') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('courses') ? 'is-invalid' : '' }}" name="courses[]" id="courses" multiple required>
                    @foreach($courses as $id => $courses)
                    <option value="{{ $id }}" {{ in_array($id, old('courses', [])) ? 'selected' : '' }}>{{ $courses }}</option>
                    @endforeach
                </select>
                @if($errors->has('courses'))
                    <div class="invalid-feedback">
                        {{ $errors->first('courses') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.package.fields.course_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection