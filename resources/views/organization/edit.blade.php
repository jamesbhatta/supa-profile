@extends('layouts.app')

@section('content')

<div class="container">
    @include('alerts.all')
</div>

<div class="container">
    <x-organization-form :organization="$organization"></x-organization-form>
</div>

@endsection