@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.voucher.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vouchers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.voucher.fields.id') }}
                        </th>
                        <td>
                            {{ $voucher->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucher.fields.voucher_code') }}
                        </th>
                        <td>
                            {{ $voucher->voucher_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucher.fields.voucher_status') }}
                        </th>
                        <td>
                            {{ App\Models\Voucher::VOUCHER_STATUS_SELECT[$voucher->voucher_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucher.fields.batch') }}
                        </th>
                        <td>
                            {{ $voucher->batch->batch_serial_number ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucher.fields.category') }}
                        </th>
                        <td>
                            {{ $voucher->category->voucher_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucher.fields.used_at') }}
                        </th>
                        <td>
                            {{ $voucher->used_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucher.fields.expired_at') }}
                        </th>
                        <td>
                            {{ $voucher->expired_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucher.fields.used_by') }}
                        </th>
                        <td>
                            {{ $voucher->used_by }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vouchers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection