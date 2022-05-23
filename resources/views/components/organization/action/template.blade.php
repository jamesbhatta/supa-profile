@extends('layouts.app')

@section('content')
<div class="row">
    <div class="{{ $width ?? 'col-md-6' }} mx-auto">
        @include('alerts.all')
        <div class="card">
            @isset($title)
            <div class="card-header font-noto">
                {{ $title }}
            </div>
            @endisset
            <div class="card-body">
                {{ $slot }}
            </div>
        </div>
    </div>

</div>

@endsection
