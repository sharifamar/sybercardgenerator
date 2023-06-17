@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.transaction.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.transactions.update", [$transaction->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="external_reference">{{ trans('cruds.transaction.fields.external_reference') }}</label>
                <input class="form-control {{ $errors->has('external_reference') ? 'is-invalid' : '' }}" type="text" name="external_reference" id="external_reference" value="{{ old('external_reference', $transaction->external_reference) }}" required>
                @if($errors->has('external_reference'))
                    <span class="text-danger">{{ $errors->first('external_reference') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.external_reference_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="internal_reference">{{ trans('cruds.transaction.fields.internal_reference') }}</label>
                <input class="form-control {{ $errors->has('internal_reference') ? 'is-invalid' : '' }}" type="text" name="internal_reference" id="internal_reference" value="{{ old('internal_reference', $transaction->internal_reference) }}" required>
                @if($errors->has('internal_reference'))
                    <span class="text-danger">{{ $errors->first('internal_reference') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.internal_reference_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="requester">{{ trans('cruds.transaction.fields.requester') }}</label>
                <input class="form-control {{ $errors->has('requester') ? 'is-invalid' : '' }}" type="text" name="requester" id="requester" value="{{ old('requester', $transaction->requester) }}" required>
                @if($errors->has('requester'))
                    <span class="text-danger">{{ $errors->first('requester') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.requester_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="voucher_code">{{ trans('cruds.transaction.fields.voucher_code') }}</label>
                <input class="form-control {{ $errors->has('voucher_code') ? 'is-invalid' : '' }}" type="text" name="voucher_code" id="voucher_code" value="{{ old('voucher_code', $transaction->voucher_code) }}" required>
                @if($errors->has('voucher_code'))
                    <span class="text-danger">{{ $errors->first('voucher_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.voucher_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.transaction.fields.transaction_status') }}</label>
                <select class="form-control {{ $errors->has('transaction_status') ? 'is-invalid' : '' }}" name="transaction_status" id="transaction_status" required>
                    <option value disabled {{ old('transaction_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Transaction::TRANSACTION_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('transaction_status', $transaction->transaction_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('transaction_status'))
                    <span class="text-danger">{{ $errors->first('transaction_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.transaction_status_helper') }}</span>
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