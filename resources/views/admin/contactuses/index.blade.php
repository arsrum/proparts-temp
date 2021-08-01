@extends('layouts.admin')
@section('content')
@can('contact_us_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.contactuses.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.contactUs.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.contactUs.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ContactUs">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.contactUs.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactUs.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactUs.fields.mobile') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactUs.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactUs.fields.message') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactUs.fields.done') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contactuses as $key => $contactUs)
                        <tr data-entry-id="{{ $contactUs->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $contactUs->id ?? '' }}
                            </td>
                            <td>
                                {{ $contactUs->name ?? '' }}
                            </td>
                            <td>
                                {{ $contactUs->mobile ?? '' }}
                            </td>
                            <td>
                                {{ $contactUs->title ?? '' }}
                            </td>
                            <td>
                                {{ $contactUs->message ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $contactUs->done ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $contactUs->done ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('contact_us_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.contactuses.show', $contactUs->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('contact_us_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.contactuses.edit', $contactUs->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('contact_us_delete')
                                    <form action="{{ route('admin.contactuses.destroy', $contactUs->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('contact_us_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.contactuses.massDestroy') }}",
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
  let table = $('.datatable-ContactUs:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  $('div#sidebar').on('transitionend', function(e) {
    $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
  })
  
})

</script>
@endsection