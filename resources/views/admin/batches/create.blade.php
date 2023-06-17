@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.batch.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.batches.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="batch_serial_number">{{ trans('cruds.batch.fields.batch_serial_number') }}</label>
                <input class="form-control {{ $errors->has('batch_serial_number') ? 'is-invalid' : '' }}" type="text" name="batch_serial_number" id="batch_serial_number" value="{{ old('batch_serial_number', '') }}" required>
                @if($errors->has('batch_serial_number'))
                    <span class="text-danger">{{ $errors->first('batch_serial_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.batch.fields.batch_serial_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="expiry_date">{{ trans('cruds.batch.fields.expiry_date') }}</label>
                <input class="form-control datetime {{ $errors->has('expiry_date') ? 'is-invalid' : '' }}" type="text" name="expiry_date" id="expiry_date" value="{{ old('expiry_date') }}">
                @if($errors->has('expiry_date'))
                    <span class="text-danger">{{ $errors->first('expiry_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.batch.fields.expiry_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="voucher_id">{{ trans('cruds.batch.fields.voucher') }}</label>
                <select class="form-control select2 {{ $errors->has('voucher') ? 'is-invalid' : '' }}" name="voucher_id" id="voucher_id" required>
                    @foreach($vouchers as $id => $entry)
                        <option value="{{ $id }}" {{ old('voucher_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('voucher'))
                    <span class="text-danger">{{ $errors->first('voucher') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.batch.fields.voucher_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="number_of_vouchers">{{ trans('cruds.batch.fields.number_of_vouchers') }}</label>
                <input class="form-control {{ $errors->has('number_of_vouchers') ? 'is-invalid' : '' }}" type="number" name="number_of_vouchers" id="number_of_vouchers" value="{{ old('number_of_vouchers', '1000') }}" step="1" required>
                @if($errors->has('number_of_vouchers'))
                    <span class="text-danger">{{ $errors->first('number_of_vouchers') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.batch.fields.number_of_vouchers_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.batch.fields.voucher_status') }}</label>
                <select class="form-control {{ $errors->has('voucher_status') ? 'is-invalid' : '' }}" name="voucher_status" id="voucher_status">
                    <option value disabled {{ old('voucher_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Batch::VOUCHER_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('voucher_status', 'Active') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('voucher_status'))
                    <span class="text-danger">{{ $errors->first('voucher_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.batch.fields.voucher_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.batch.fields.generated') }}</label>
                <select class="form-control {{ $errors->has('generated') ? 'is-invalid' : '' }}" name="generated" id="generated" required>
                    <option value disabled {{ old('generated', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Batch::GENERATED_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('generated', 'False') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('generated'))
                    <span class="text-danger">{{ $errors->first('generated') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.batch.fields.generated_helper') }}</span>
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