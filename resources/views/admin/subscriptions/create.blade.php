@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.subscription.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.subscriptions.store") }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label class="required" for="package_id">{{ trans('cruds.subscription.fields.package') }}</label>
                <select class="form-control select2 {{ $errors->has('package') ? 'is-invalid' : '' }}" name="package_id" id="package_id" required>
                    @foreach($packages as $id => $package)
                        <option value="{{ $id }}" {{ old('package_id') == $id ? 'selected' : '' }}>{{ $package }}</option>
                    @endforeach
                </select>
                @if($errors->has('package'))
                    <div class="invalid-feedback">
                        {{ $errors->first('package') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.package_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="member_id">{{ trans('cruds.subscription.fields.member') }}</label>
                <select class="form-control select2 {{ $errors->has('member') ? 'is-invalid' : '' }}" name="member_id" id="member_id" required>
                    @foreach($members as $id => $member)
                        <option value="{{ $id }}" {{ old('member_id') == $id ? 'selected' : '' }}>{{ $member }}</option>
                    @endforeach
                </select>
                @if($errors->has('member'))
                    <div class="invalid-feedback">
                        {{ $errors->first('member') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.member_helper') }}</span>
            </div>

            <div class="form-check">
                <input class="form-check-input {{ $errors->has('state') ? 'is-invalid' : '' }}" 
                        type="checkbox" 
                        name="state" 
                        id="state" 
                        value="1" required>
                <label for="state" class="form-check-label">{{ trans('cruds.subscription.fields.state') }}</label>
                @if($errors->has('state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('state') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.state_helper') }}</span>
            </div>
        {{-- 
            <div class="form-group">
                <label class="required" for="debut">{{ trans('cruds.subscription.fields.debut') }}</label>
                <input class="form-control subscription-timepicker {{ $errors->has('debut') ? 'is-invalid' : '' }}" type="text" name="debut" id="debut" value="{{ old('debut') }}" required>
                @if($errors->has('debut'))
                    <div class="invalid-feedback">
                        {{ $errors->first('debut') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.debut_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="fin">{{ trans('cruds.subscription.fields.fin') }}</label>
                <input class="form-control subscription-timepicker {{ $errors->has('fin') ? 'is-invalid' : '' }}" type="text" name="fin" id="fin" value="{{ old('fin') }}" required>
                @if($errors->has('fin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.fin_helper') }}</span>
            </div> --}}

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection