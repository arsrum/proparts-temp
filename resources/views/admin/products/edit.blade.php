@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.contactUs.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.products.update', [$Products->id]) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">{{ trans('cruds.contactUs.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        id="name" value="{{ old('name', $Products->name) }}">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.contactUs.fields.name_helper') }}</span>
                </div>
                @foreach ($cars as $car)
                    <div class="form-group">
                        <label for="name">{{ trans('cruds.contactUs.fields.name') }}</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                            id="name" value="{{ $car->brand }} + {{ $car->model }} ">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.contactUs.fields.name_helper') }}</span>
                    </div>
                @endforeach


                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        Close 
                    </button>
                </div>
            </form>
            
            <form method="POST" action="{{ route('admin.cars.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="product_id" id="{{$Products->id}}" value="{{$Products->id}}">
            <label for="name">Add Cars</label>
            @include('layouts.car')
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>

        </div>
    </div>



@endsection
