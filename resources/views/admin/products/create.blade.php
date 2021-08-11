@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} Products
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">{{ trans('cruds.contactUs.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        id="name" value="{{ old('name', '') }}">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.contactUs.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="mobile">{{ trans('cruds.contactUs.fields.mobile') }}</label>
                    <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile"
                        id="mobile" value="{{ old('mobile', '') }}">
                    @if ($errors->has('mobile'))
                        <span class="text-danger">{{ $errors->first('mobile') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.contactUs.fields.mobile_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="title">{{ trans('cruds.contactUs.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title"
                        id="title" value="{{ old('title', '') }}">
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.contactUs.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="message">{{ trans('cruds.contactUs.fields.message') }}</label>
                    <input class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" type="text"
                        name="message" id="message" value="{{ old('message', '') }}">
                    @if ($errors->has('message'))
                        <span class="text-danger">{{ $errors->first('message') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.contactUs.fields.message_helper') }}</span>
                </div>
                <div class="form-group">
                    <div class="form-check {{ $errors->has('done') ? 'is-invalid' : '' }}">
                        <input type="hidden" name="done" value="0">
                        <input class="form-check-input" type="checkbox" name="done" id="done" value="1"
                            {{ old('done', 0) == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="done">{{ trans('cruds.contactUs.fields.done') }}</label>
                    </div>
                    @if ($errors->has('done'))
                        <span class="text-danger">{{ $errors->first('done') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.contactUs.fields.done_helper') }}</span>
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
