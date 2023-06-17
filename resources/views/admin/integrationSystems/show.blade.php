@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.integrationSystem.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.integration-systems.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.integrationSystem.fields.id') }}
                        </th>
                        <td>
                            {{ $integrationSystem->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.integrationSystem.fields.system_name') }}
                        </th>
                        <td>
                            {{ $integrationSystem->system_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.integrationSystem.fields.username') }}
                        </th>
                        <td>
                            {{ $integrationSystem->username }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.integrationSystem.fields.password') }}
                        </th>
                        <td>
                            {{ $integrationSystem->password }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.integrationSystem.fields.system_status') }}
                        </th>
                        <td>
                            {{ App\Models\IntegrationSystem::SYSTEM_STATUS_SELECT[$integrationSystem->system_status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.integration-systems.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection