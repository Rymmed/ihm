@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.subscription.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.subscriptions.update", [$subscription->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="course_id">{{ trans('cruds.subscription.fields.course') }}</label>
                <select class="form-control select2 {{ $errors->has('course') ? 'is-invalid' : '' }}" name="course_id" id="course_id" required>
                    @foreach($courses as $id => $course)
                        <option value="{{ $id }}" {{ ($subscription->course ? $subscription->course->id : old('course_id')) == $id ? 'selected' : '' }}>{{ $course }}</option>
                    @endforeach
                </select>
                @if($errors->has('course'))
                    <div class="invalid-feedback">
                        {{ $errors->first('course') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.course_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="coach_id">{{ trans('cruds.subscription.fields.coach') }}</label>
                <select class="form-control select2 {{ $errors->has('coach') ? 'is-invalid' : '' }}" name="coach_id" id="coach_id" required>
                    @foreach($coaches as $id => $coach)
                        <option value="{{ $id }}" {{ ($subscription->coach ? $subscription->coach->id : old('coach_id')) == $id ? 'selected' : '' }}>{{ $coach }}</option>
                    @endforeach
                </select>
                @if($errors->has('coach'))
                    <div class="invalid-feedback">
                        {{ $errors->first('coach') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.coach_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="weekday">{{ trans('cruds.subscription.fields.weekday') }}</label>
                <input class="form-control {{ $errors->has('weekday') ? 'is-invalid' : '' }}" type="number" name="weekday" id="weekday" value="{{ old('weekday', $subscription->weekday) }}" step="1" required>
                @if($errors->has('weekday'))
                    <div class="invalid-feedback">
                        {{ $errors->first('weekday') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.weekday_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_time">{{ trans('cruds.subscription.fields.start_time') }}</label>
                <input class="form-control subscription-timepicker {{ $errors->has('start_time') ? 'is-invalid' : '' }}" type="text" name="start_time" id="start_time" value="{{ old('start_time', $subscription->start_time) }}" required>
                @if($errors->has('start_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.start_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end_time">{{ trans('cruds.subscription.fields.end_time') }}</label>
                <input class="form-control subscription-timepicker {{ $errors->has('end_time') ? 'is-invalid' : '' }}" type="text" name="end_time" id="end_time" value="{{ old('end_time', $subscription->end_time) }}" required>
                @if($errors->has('end_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.end_time_helper') }}</span>
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