@extends('layouts.app')

@section('content')
<div class="container">
    @include('alerts.all')
</div>

<div class="container-flluid">
    <div class="card z-depth-0 rounded-0">
        <div class="card-body">

            <x-organization-filter-bar></x-organization-filter-bar>
        </div>
    </div>
    <div class="my-4"></div>

    {{-- Organizations Table --}}
    <x-organizations-table :organizations="$organizations"></x-organizations-table>
    {{-- End of Organizaitons Table --}}

    {{-- Pagination Links --}}
    @if($organizations->hasPages())
    <div class="pagination d-flex justify-content-between">
        <div>
            Showing {{ $organizations->firstItem() }} to {{ $organizations->lastItem() }} of {{ $organizations->total() }} entries
        </div>
        {{ $organizations->appends(request()->input())->links() }}
    </div>
    @endif
    {{-- End of Pagination Links --}}


</div>
@endsection
