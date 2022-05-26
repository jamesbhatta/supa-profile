@extends('layouts.app')

@section('content')
<div class="mx-auto">
    @include('alerts.all')
<<<<<<< HEAD
    <form action="/resource/{{ $model['slug'] }}" method="POST">
        @csrf
        <input type="hidden" name="model" pavalue="{{ $model['slug'] }}">
        @foreach ($model['fields'] as $field)
        <div class="form-group">
            <label for="">{{ $field['label'] }}</label>
            <input type="text" name="{{$field['name'] }}" class="form-control">
             
        </div>
        @endforeach
        <div class="form-group">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
=======
    {{-- <form action="/resource/{{ $resource['slug'] }}" method="POST">
    @csrf
    <input type="hidden" name="resource" pavalue="{{ $resource['slug'] }}">
    @foreach ($resource['fields'] as $field)
    <div class="form-group">
        <label for="">{{ $field['label'] }}</label>
        <input type="text" name="{{$field['name'] }}" class="form-control">
    </div>
    @endforeach
    <div class="form-group">
        <button class="btn btn-primary">Submit</button>
    </div>
    </form> --}}
>>>>>>> d1fae47e99a18a118bc26cf8a270ef7290e55f70

    <resource-data-form :resource="{{ $resource }}"></resource-data-form>

    {{-- <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        @foreach ($resource->fields as $field)
                        <td>{{ $field['label'] }}</td>
                        @endforeach
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($resource->fields as $field)
                        <td>
                            <input type="text" name="{{$field['name'] }}" class="form-control">
                        </td>
                        @endforeach
                        <td class="text-right">
                            <div class="d-flex">
                                <button class="btn btn-primary btn-sm z-depth-0">Edit</button>
                                <button class="btn btn-danger btn-sm z-depth-0">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div> --}}
</div>
@endsection
