@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.car.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cars.update", [$car->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="brand">{{ trans('cruds.car.fields.brand') }}</label>
                <input class="form-control {{ $errors->has('brand') ? 'is-invalid' : '' }}" type="text" name="brand" id="brand" value="{{ old('brand', $car->brand) }}">
                @if($errors->has('brand'))
                    <span class="text-danger">{{ $errors->first('brand') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.car.fields.brand_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="model">{{ trans('cruds.car.fields.model') }}</label>
                <input class="form-control {{ $errors->has('model') ? 'is-invalid' : '' }}" type="text" name="model" id="model" value="{{ old('model', $car->model) }}">
                @if($errors->has('model'))
                    <span class="text-danger">{{ $errors->first('model') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.car.fields.model_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="year">{{ trans('cruds.car.fields.year') }}</label>
                <input class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" type="text" name="year" id="year" value="{{ old('year', $car->year) }}">
                @if($errors->has('year'))
                    <span class="text-danger">{{ $errors->first('year') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.car.fields.year_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vin_number">{{ trans('cruds.car.fields.vin_number') }}</label>
                <input class="form-control {{ $errors->has('vin_number') ? 'is-invalid' : '' }}" type="text" name="vin_number" id="vin_number" value="{{ old('vin_number', $car->vin_number) }}">
                @if($errors->has('vin_number'))
                    <span class="text-danger">{{ $errors->first('vin_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.car.fields.vin_number_helper') }}</span>
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