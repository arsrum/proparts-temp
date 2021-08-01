@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.car.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.car.fields.id') }}
                        </th>
                        <td>
                            {{ $car->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.car.fields.brand') }}
                        </th>
                        <td>
                            {{ $car->brand }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.car.fields.model') }}
                        </th>
                        <td>
                            {{ $car->model }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.car.fields.year') }}
                        </th>
                        <td>
                            {{ $car->year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.car.fields.vin_number') }}
                        </th>
                        <td>
                            {{ $car->vin_number }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection