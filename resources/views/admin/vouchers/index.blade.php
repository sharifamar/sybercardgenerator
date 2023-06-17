@extends('layouts.admin')
@section('content')
@can('voucher_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.vouchers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.voucher.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.voucher.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Voucher">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.voucher.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.voucher.fields.voucher_code') }}
                    </th>
                    <th>
                        {{ trans('cruds.voucher.fields.voucher_status') }}
                    </th>
                    <th>
                        {{ trans('cruds.voucher.fields.batch') }}
                    </th>
                    <th>
                        {{ trans('cruds.batch.fields.batch_serial_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.batch.fields.expiry_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.batch.fields.number_of_vouchers') }}
                    </th>
                    <th>
                        {{ trans('cruds.batch.fields.voucher_status') }}
                    </th>
                    <th>
                        {{ trans('cruds.batch.fields.generated') }}
                    </th>
                    <th>
                        {{ trans('cruds.voucher.fields.category') }}
                    </th>
                    <th>
                        {{ trans('cruds.voucherCategory.fields.voucher_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.voucherCategory.fields.amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.voucherCategory.fields.currency') }}
                    </th>
                    <th>
                        {{ trans('cruds.voucher.fields.used_at') }}
                    </th>
                    <th>
                        {{ trans('cruds.voucher.fields.expired_at') }}
                    </th>
                    <th>
                        {{ trans('cruds.voucher.fields.used_by') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('voucher_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.vouchers.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.vouchers.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'voucher_code', name: 'voucher_code' },
{ data: 'voucher_status', name: 'voucher_status' },
{ data: 'batch_batch_serial_number', name: 'batch.batch_serial_number' },
{ data: 'batch.batch_serial_number', name: 'batch.batch_serial_number' },
{ data: 'batch.expiry_date', name: 'batch.expiry_date' },
{ data: 'batch.number_of_vouchers', name: 'batch.number_of_vouchers' },
{ data: 'batch.voucher_status', name: 'batch.voucher_status' },
{ data: 'batch.generated', name: 'batch.generated' },
{ data: 'category_voucher_name', name: 'category.voucher_name' },
{ data: 'category.voucher_name', name: 'category.voucher_name' },
{ data: 'category.amount', name: 'category.amount' },
{ data: 'category.currency', name: 'category.currency' },
{ data: 'used_at', name: 'used_at' },
{ data: 'expired_at', name: 'expired_at' },
{ data: 'used_by', name: 'used_by' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Voucher').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection