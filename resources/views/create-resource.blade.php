@extends('layouts.app')

@section('content')
<div class="mx-auto" style="max-width: 700px;">
    @include('alerts.all')
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

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        @foreach ($model['fields'] as $field)
                        <td>{{ $field['label'] }}</td>
                        @endforeach
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($model['fields'] as $field)
                        <td>
                            <input type="text" name="{{$field['name'] }}" class="form-control">
                        </td>
                        @endforeach
                        <td class="text-right">
                            <div class="d-flex">
                                <button class="btn btn-primary btn-sm z-depth-0">Edit</button>
                                <button class="btn btn-danger btn-sm z-depth-0">Delete</button>
                            </td>
                        </div>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
