@extends('layouts.app')

@section('content')
<div class="container">
    @include('alerts.all')
</div>


<div class="container-fluid">
    <div class="card z-depth-0">
        <div class="card-body">
            <x-token-search-form :tokenNumber="$tokenNumber"></x-token-search-form>
        </div>
    </div>
</div>

<div class="my-4"></div>

<div class="container-fluid">
    <div class="card z-depth-0">
        <div class="card-body">
            @isset($organizations)
            @if(count($organizations))
            <x-organizations-table :organizations="$organizations"></x-organizations-table>
            @else
            @isset($tokenNumber)
            <div class="text-center">
                <h1 class="h1-reponsive text-danger">** टोकन नम्बर मिलेन। **</h1>
            </div>
            @endisset
            @endif
            @else
            <x-organization-form></x-organization-form>
            @endisset
        </div>
    </div>

</div>



@endsection
