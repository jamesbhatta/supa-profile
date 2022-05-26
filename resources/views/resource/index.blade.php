@extends('layouts.app')

@section('content')
<div class="mx-auto" style="max-width: 800px;">
    @include('alerts.all')
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-3">
                <h4 class="h4-responsive">Resources</h4>
                <div class="ml-auto">
                    <a href="{{ route('resources.create') }}" class="btn btn-primary btn-sm z-depth-0">Add New</a>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <td>Title</td>
                        <td>Slug</td>
                        <td>Fields</td>
                        <td class="text-right">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resources as $resource)
                    <tr>
                        <td>{{ $resource->display_name }}</td>
                        <td>{{ $resource->slug }}</td>
                        <td>{{ count($resource->fields) ?? 'N/A'  }}</td>
                        <td class="text-right">
                            <a href="{{ route('resources.edit', $resource->slug) }}" class="btn btn-primary btn-sm z-depth-0">Edit</a>
                            <button class="btn btn-danger btn-sm z-depth-0">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
