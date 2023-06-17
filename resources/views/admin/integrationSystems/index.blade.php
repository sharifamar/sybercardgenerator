@extends('layouts.admin')
@section('content')
@can('integration_system_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.integration-systems.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.integrationSystem.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.integrationSystem.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-IntegrationSystem">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.integrationSystem.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.integrationSystem.fields.system_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.integrationSystem.fields.username') }}
                        </th>
                        <th>
                            {{ trans('cruds.integrationSystem.fields.password') }}
                        </th>
                        <th>
                            {{ trans('cruds.integrationSystem.fields.system_status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($integrationSystems as $key => $integrationSystem)
                        <tr data-entry-id="{{ $integrationSystem->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $integrationSystem->id ?? '' }}
                            </td>
                            <td>
                                {{ $integrationSystem->system_name ?? '' }}
                            </td>
                            <td>
                                {{ $integrationSystem->username ?? '' }}
                            </td>
                            <td>
                                {{ $integrationSystem->password ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\IntegrationSystem::SYSTEM_STATUS_SELECT[$integrationSystem->system_status] ?? '' }}
                            </td>
                            <td>
                                @can('integration_system_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.integration-systems.show', $integrationSystem->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('integration_system_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.integration-systems.edit', $integrationSystem->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('integration_system_delete')
                                    <form action="{{ route('admin.integration-systems.destroy', $integrationSystem->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('integration_system_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.integration-systems.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-IntegrationSystem:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection