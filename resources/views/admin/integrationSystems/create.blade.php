@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.integrationSystem.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.integration-systems.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="system_name">{{ trans('cruds.integrationSystem.fields.system_name') }}</label>
                <input class="form-control {{ $errors->has('system_name') ? 'is-invalid' : '' }}" type="text" name="system_name" id="system_name" value="{{ old('system_name', '') }}" required>
                @if($errors->has('system_name'))
                    <span class="text-danger">{{ $errors->first('system_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.integrationSystem.fields.system_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="username">{{ trans('cruds.integrationSystem.fields.username') }}</label>
                <input class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" type="text" name="username" id="username" value="{{ old('username', '') }}" required>
                @if($errors->has('username'))
                    <span class="text-danger">{{ $errors->first('username') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.integrationSystem.fields.username_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.integrationSystem.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="text" name="password" id="password" value="{{ old('password', '') }}" required>
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.integrationSystem.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.integrationSystem.fields.system_status') }}</label>
                <select class="form-control {{ $errors->has('system_status') ? 'is-invalid' : '' }}" name="system_status" id="system_status" required>
                    <option value disabled {{ old('system_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\IntegrationSystem::SYSTEM_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('system_status', 'Active') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('system_status'))
                    <span class="text-danger">{{ $errors->first('system_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.integrationSystem.fields.system_status_helper') }}</span>
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