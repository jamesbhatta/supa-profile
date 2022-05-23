@extends('layouts.app')

@section('content')
<div class="card font-noto z-depth-0">
    <div class="card-body">
        <h3 class="h3-responsive mb-4 indigo-text">Configuration Checklist</h3>
        @foreach($checklists as $checklist)
        <div class="d-flex mb-4">
            <div class="align-self-center mr-4">
                @if($checklist->status)
                <span class="svg-icon svg-baseline text-success">@include('svg.tick')</span>
                @else
                <span class="svg-icon svg-baseline">@include('svg.close')</span>
                @endif
            </div>
            <div>
                <div class="">{{ $checklist->title }}</div>
                <div class="small">{{ $checklist->description }}</div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
