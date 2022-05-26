@extends('layouts.app')

@section('content')
<div class="mx-auto" style="max-width: 800px;">
    @include('alerts.all')
    <a href="{{ route('resources.index') }}" class="btn btn-primary btn-sm z-depth-0 ml-0">Back</a>
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-3">
                <h4 class="h4-responsive">Resources @if($updateMode) - {{ $resource->display_name }} @endif</h4>
                <div class="ml-auto">
                </div>
            </div>

            <form action="{{ route('resources.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Display Name</label>
                    <input type="text" name="display_name" class="form-control" value="{{ old('name', $resource->display_name) }}">
                </div>

                <div class="form-group">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug', $resource->display_slug) }}">
                </div>

                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" cols="30" rows="5">{!! old('description', $resource->description) !!}"</textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary z-depth-0">Save</button>
                </div>
            </form>

        </div>

    </div>
    @if ($updateMode)
    <div class="my-3"></div>
    <fields-form :resource="{{ $resource }}"></fields-form>
    @endif
</div>
@endsection
