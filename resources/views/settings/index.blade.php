@extends('layouts.app')

@push('styles')
<style>
    select {
        height: calc(1.5em + 1rem + 4px) !important;
    }

</style>
@endpush

@section('content')
<div class="container">
    <div class="my-4"></div>

    @include('alerts.success')

    <form action="{{ route('settings.sync') }}" method="POST" class="form font-noto">
        @csrf

        @component('settings.group', [
        'title' => 'Application Settings',
        'description' => 'General application setting'
        ])
        <div>
            @component('settings.input', [
            'label' => 'App Name',
            'name' => 'app_name',
            'description' => 'The application name in Nepali'
            ])
            @endcomponent
            <div class="my-3"></div>
            @component('settings.input', [
            'label' => 'App Name (English)',
            'name' => 'app_name_en',
            'description' => 'The application name in English'
            ])
            @endcomponent
        </div>
        @endcomponent

        <div class="form-group">
            <button type="submit" class="btn btn-indigo font-17px font-noto z-depth-0">Save</button>
        </div>

    </form>
</div>

@endsection
