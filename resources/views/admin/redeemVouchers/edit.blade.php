@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.redeemVoucher.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.redeem-vouchers.update", [$redeemVoucher->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="voucher_code">{{ trans('cruds.redeemVoucher.fields.voucher_code') }}</label>
                <input class="form-control {{ $errors->has('voucher_code') ? 'is-invalid' : '' }}" type="text" name="voucher_code" id="voucher_code" value="{{ old('voucher_code', $redeemVoucher->voucher_code) }}" required>
                @if($errors->has('voucher_code'))
                    <span class="text-danger">{{ $errors->first('voucher_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.redeemVoucher.fields.voucher_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="requester">{{ trans('cruds.redeemVoucher.fields.requester') }}</label>
                <input class="form-control {{ $errors->has('requester') ? 'is-invalid' : '' }}" type="text" name="requester" id="requester" value="{{ old('requester', $redeemVoucher->requester) }}" required>
                @if($errors->has('requester'))
                    <span class="text-danger">{{ $errors->first('requester') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.redeemVoucher.fields.requester_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="external_reference">{{ trans('cruds.redeemVoucher.fields.external_reference') }}</label>
                <input class="form-control {{ $errors->has('external_reference') ? 'is-invalid' : '' }}" type="text" name="external_reference" id="external_reference" value="{{ old('external_reference', $redeemVoucher->external_reference) }}" required>
                @if($errors->has('external_reference'))
                    <span class="text-danger">{{ $errors->first('external_reference') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.redeemVoucher.fields.external_reference_helper') }}</span>
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