@extends('layouts.app')

@push('styles')
<style>
    #dashboard {
        min-height: 100vh;
        padding: 1rem;
    }

    a.bg-white {
        color: #1f2d3d !important;
    }

</style>
@endpush

@section('content')
<div id="dashboard" class="m-n3">
    <div class="container font-noto">
        <div class="row">   
            {{-- <div class="col-md-12">
                <form action="{{ route('home') }}" method="GET">
            <div class="row">
                <div class="col-md-2">
                    <select name="fiscal_year" class="custom-select rounded-0" onchange="this.form.submit()">
                        <option value="">All Fiscal Year</option>
                        @foreach(\App\FiscalYear::latest()->get() as $fiscalYear)
                        <option value="{{ $fiscalYear->name }}" @if(request()->query('fiscal_year') == $fiscalYear->name) selected @endif>{{ $fiscalYear->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            </form>
        </div> --}}
        {{-- Alerts --}}
        <div class="col-md-12 mt-2">
            @include('alerts.all')
        </div>

        @can('user.*')
        <div class="col-md-4">
            <x-dashboard-count-tile :link="route('user.index')">
                <x-slot name="count">{{ $totalUsersCount }}</x-slot>
                <x-slot name="title">प्रयोगकर्ताहरू</x-slot>
            </x-dashboard-count-tile>
        </div>
        @endcan
    </div>

</div>
</div>
@endsection

@push('scripts')
<script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
<!-- Chartisan -->
<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>

<script src="{{ asset('assets/table2excel/dist/jquery.table2excel.js') }}"></script>
<script>
    $(function() {
        $("#js-export-business-by-type-table-btn").click(function(e) {
            var table = $('#js-business-by-type-table');
            if (table && table.length) {
                var preserveColors = (table.hasClass('table2excel_with_colors') ? true : false);
                $(table).table2excel({
                    exclude: ".noExl"
                    , name: "Business By Type"
                    , filename: "business-by-type-" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls"
                    , fileext: ".xls"
                    , exclude_img: true
                    , exclude_links: true
                    , exclude_inputs: true
                    , preserveColors: preserveColors
                });
            }
        });

    });

</script>
@endpush
