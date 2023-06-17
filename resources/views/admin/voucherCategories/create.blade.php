@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.voucherCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.voucher-categories.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="voucher_name">{{ trans('cruds.voucherCategory.fields.voucher_name') }}</label>
                <input class="form-control {{ $errors->has('voucher_name') ? 'is-invalid' : '' }}" type="text" name="voucher_name" id="voucher_name" value="{{ old('voucher_name', '') }}" required>
                @if($errors->has('voucher_name'))
                    <span class="text-danger">{{ $errors->first('voucher_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voucherCategory.fields.voucher_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.voucherCategory.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01" required>
                @if($errors->has('amount'))
                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voucherCategory.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.voucherCategory.fields.currency') }}</label>
                <select class="form-control {{ $errors->has('currency') ? 'is-invalid' : '' }}" name="currency" id="currency">
                    <option value disabled {{ old('currency', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\VoucherCategory::CURRENCY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('currency', 'SDG') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('currency'))
                    <span class="text-danger">{{ $errors->first('currency') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voucherCategory.fields.currency_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="voucher_image">{{ trans('cruds.voucherCategory.fields.voucher_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('voucher_image') ? 'is-invalid' : '' }}" id="voucher_image-dropzone">
                </div>
                @if($errors->has('voucher_image'))
                    <span class="text-danger">{{ $errors->first('voucher_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voucherCategory.fields.voucher_image_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.voucherImageDropzone = {
    url: '{{ route('admin.voucher-categories.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="voucher_image"]').remove()
      $('form').append('<input type="hidden" name="voucher_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="voucher_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($voucherCategory) && $voucherCategory->voucher_image)
      var file = {!! json_encode($voucherCategory->voucher_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="voucher_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection