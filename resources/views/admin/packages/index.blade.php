@extends('layouts.admin')
@section('content')
@can('package_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.packages.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.package.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.list') }} des {{ trans('cruds.package.title') }} 
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Package">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.package.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.package.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.package.fields.duration') }}
                        </th>
                        <th>
                            {{ trans('cruds.package.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.package.fields.course') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($packages as $key => $package)
                        <tr data-entry-id="{{ $package->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $package->id ?? '' }}
                            </td>
                            <td>
                                {{ $package->name ?? '' }}
                            </td>
                            <td>
                                {{ $package->duration ?? '' }} Mois
                            </td>
                            <td>
                                {{ $package->price ?? '' }} Dt
                            </td>
                            <td>
                                @foreach($package->courses as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('package_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.packages.show', $package->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('package_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.packages.edit', $package->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('package_delete')
                                    <form action="{{ route('admin.packages.destroy', $package->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('package_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.packages.massDestroy') }}",
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
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Package:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection