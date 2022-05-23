@extends('layouts.app')

@section('content')

<div class="container-fluid">
    {{-- <div class="card z-depth-0">
        <div class="card-body">
            <x-token-search-form></x-token-search-form>
        </div>
    </div>
    <div class="my-3"></div> --}}
    <x-organization-form :old-data-entry-mode="true"></x-organization-form>
</div>

@endsection