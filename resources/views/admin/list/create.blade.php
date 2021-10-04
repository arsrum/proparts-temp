@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} Products
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.list.store') }}" enctype="multipart/form-data">
                @csrf


                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="image">
                </div>


                @include('layouts.manufacture')

                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>




@endsection
