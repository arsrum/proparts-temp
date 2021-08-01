@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.order.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.orders.update", [$order->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="order_no">{{ trans('cruds.order.fields.order_no') }}</label>
                <input class="form-control {{ $errors->has('order_no') ? 'is-invalid' : '' }}" type="number" name="order_no" id="order_no" value="{{ old('order_no', $order->order_no) }}" step="1">
                @if($errors->has('order_no'))
                    <span class="text-danger">{{ $errors->first('order_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.order_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.order.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $order->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address_id">{{ trans('cruds.order.fields.address') }}</label>
                <select class="form-control select2 {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address_id" id="address_id">
                    @foreach($addresses as $id => $entry)
                        <option value="{{ $id }}" {{ (old('address_id') ? old('address_id') : $order->address->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status_id">{{ trans('cruds.order.fields.status') }}</label>
                <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status_id" id="status_id">
                    @foreach($statuses as $id => $entry)
                        <option value="{{ $id }}" {{ (old('status_id') ? old('status_id') : $order->status->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quantity">{{ trans('cruds.order.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', $order->quantity) }}" step="1">
                @if($errors->has('quantity'))
                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price">{{ trans('cruds.order.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', $order->price) }}" step="1">
                @if($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="generic_article">{{ trans('cruds.order.fields.generic_article') }}</label>
                <input class="form-control {{ $errors->has('generic_article') ? 'is-invalid' : '' }}" type="number" name="generic_article" id="generic_article" value="{{ old('generic_article', $order->generic_article) }}" step="1">
                @if($errors->has('generic_article'))
                    <span class="text-danger">{{ $errors->first('generic_article') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.generic_article_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="article_no">{{ trans('cruds.order.fields.article_no') }}</label>
                <input class="form-control {{ $errors->has('article_no') ? 'is-invalid' : '' }}" type="number" name="article_no" id="article_no" value="{{ old('article_no', $order->article_no) }}" step="1">
                @if($errors->has('article_no'))
                    <span class="text-danger">{{ $errors->first('article_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.article_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="brand_no">{{ trans('cruds.order.fields.brand_no') }}</label>
                <input class="form-control {{ $errors->has('brand_no') ? 'is-invalid' : '' }}" type="number" name="brand_no" id="brand_no" value="{{ old('brand_no', $order->brand_no) }}" step="1">
                @if($errors->has('brand_no'))
                    <span class="text-danger">{{ $errors->first('brand_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.brand_no_helper') }}</span>
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