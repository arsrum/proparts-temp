@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.order.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.orders.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.order.fields.id') }}
                            </th>
                            <td>
                                {{ $order->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.order.fields.order_no') }}
                            </th>
                            <td>
                                {{ $order->order_no }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.order.fields.user') }}
                            </th>
                            <td>
                                {{ $order->user->name ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.order.fields.address') }}
                            </th>
                            <td>
                                {{ $order->address->country ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.order.fields.status') }}
                            </th>
                            <td>
                                {{ $order->status->name ?? '' }}
                            </td>
                        </tr>
                        @foreach ($order_products as $item)
                            <tr>
                                <th>
                                </th>
                                <td>

                                </td>
                            </tr>

                            <tr>
                                <th>
                                    {{ trans('cruds.order.fields.quantity') }}
                                </th>
                                <td>
                                    {{ Rand(1, 4) }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.order.fields.price') }}
                                </th>
                                <td>
                                    To Be Detirmened
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.order.fields.generic_article') }}
                                </th>
                                <td>
                                    {{ $item->generic_article }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.order.fields.article_no') }}
                                </th>
                                <td>
                                    {{ $item->article_no }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.order.fields.brand_no') }}
                                </th>
                                <td>
                                    {{ $item->brand_no }}
                                </td>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.orders.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
