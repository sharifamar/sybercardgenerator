@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.voucherCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.voucher-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $voucherCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherCategory.fields.voucher_name') }}
                        </th>
                        <td>
                            {{ $voucherCategory->voucher_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherCategory.fields.amount') }}
                        </th>
                        <td>
                            {{ $voucherCategory->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherCategory.fields.currency') }}
                        </th>
                        <td>
                            {{ App\Models\VoucherCategory::CURRENCY_SELECT[$voucherCategory->currency] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherCategory.fields.voucher_image') }}
                        </th>
                        <td>
                            @if($voucherCategory->voucher_image)
                                <a href="{{ $voucherCategory->voucher_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $voucherCategory->voucher_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.voucher-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection