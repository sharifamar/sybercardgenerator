@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.redeemVoucher.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.redeem-vouchers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.redeemVoucher.fields.id') }}
                        </th>
                        <td>
                            {{ $redeemVoucher->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.redeemVoucher.fields.voucher_code') }}
                        </th>
                        <td>
                            {{ $redeemVoucher->voucher_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.redeemVoucher.fields.requester') }}
                        </th>
                        <td>
                            {{ $redeemVoucher->requester }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.redeemVoucher.fields.external_reference') }}
                        </th>
                        <td>
                            {{ $redeemVoucher->external_reference }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.redeem-vouchers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection