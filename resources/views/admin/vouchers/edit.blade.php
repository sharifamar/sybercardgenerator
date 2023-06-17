@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.voucher.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.vouchers.update", [$voucher->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="voucher_code">{{ trans('cruds.voucher.fields.voucher_code') }}</label>
                <input class="form-control {{ $errors->has('voucher_code') ? 'is-invalid' : '' }}" type="text" name="voucher_code" id="voucher_code" value="{{ old('voucher_code', $voucher->voucher_code) }}" required>
                @if($errors->has('voucher_code'))
                    <span class="text-danger">{{ $errors->first('voucher_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voucher.fields.voucher_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.voucher.fields.voucher_status') }}</label>
                <select class="form-control {{ $errors->has('voucher_status') ? 'is-invalid' : '' }}" name="voucher_status" id="voucher_status" required>
                    <option value disabled {{ old('voucher_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Voucher::VOUCHER_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('voucher_status', $voucher->voucher_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('voucher_status'))
                    <span class="text-danger">{{ $errors->first('voucher_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voucher.fields.voucher_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="batch_id">{{ trans('cruds.voucher.fields.batch') }}</label>
                <select class="form-control select2 {{ $errors->has('batch') ? 'is-invalid' : '' }}" name="batch_id" id="batch_id" required>
                    @foreach($batches as $id => $entry)
                        <option value="{{ $id }}" {{ (old('batch_id') ? old('batch_id') : $voucher->batch->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('batch'))
                    <span class="text-danger">{{ $errors->first('batch') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voucher.fields.batch_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="category_id">{{ trans('cruds.voucher.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                    @foreach($categories as $id => $entry)
                        <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : $voucher->category->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voucher.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="used_at">{{ trans('cruds.voucher.fields.used_at') }}</label>
                <input class="form-control datetime {{ $errors->has('used_at') ? 'is-invalid' : '' }}" type="text" name="used_at" id="used_at" value="{{ old('used_at', $voucher->used_at) }}">
                @if($errors->has('used_at'))
                    <span class="text-danger">{{ $errors->first('used_at') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voucher.fields.used_at_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="expired_at">{{ trans('cruds.voucher.fields.expired_at') }}</label>
                <input class="form-control datetime {{ $errors->has('expired_at') ? 'is-invalid' : '' }}" type="text" name="expired_at" id="expired_at" value="{{ old('expired_at', $voucher->expired_at) }}">
                @if($errors->has('expired_at'))
                    <span class="text-danger">{{ $errors->first('expired_at') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voucher.fields.expired_at_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="used_by">{{ trans('cruds.voucher.fields.used_by') }}</label>
                <input class="form-control {{ $errors->has('used_by') ? 'is-invalid' : '' }}" type="text" name="used_by" id="used_by" value="{{ old('used_by', $voucher->used_by) }}">
                @if($errors->has('used_by'))
                    <span class="text-danger">{{ $errors->first('used_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voucher.fields.used_by_helper') }}</span>
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