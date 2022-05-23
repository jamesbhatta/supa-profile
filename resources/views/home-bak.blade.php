@extends('layouts.app')

@push('styles')
<style>
    #dashboard {
        min-height: 100vh;
        padding: 1rem;
    }

    .dash-link-card {
        background: linear-gradient(160deg, var(--dashboard-primary-color), #8c79da);
        color: #fff;
        min-height: 200px;
        box-shadow: 0 0 2px rgba(0, 0, 0, 0.12) !important;
        margin-bottom: 30px;
    }

    .dash-link-card:hover {
        color: #fff;
        box-shadow: 0 1px 5px 2px rgba(0, 0, 0, 0.12) !important;
    }

    .dash-link-card .title {
        align-self: center;
    }

    .dash-link-card .link {
        border-bottom-left-radius: 0.25rem;
        border-bottom-right-radius: 0.25rem;
        padding: 10px 15px;
        background-color: #ededff;
        color: var(--main-theme-color);
    }

</style>
@endpush

@section('content')
<div id="dashboard" class="m-n3">
    <div class="container font-noto">
        <div class="row">
            <div class="col-md-4">
                <a class="card dash-link-card z-depth-0" href="vl{{ route('organization.create') }}">
                    <div class="card-body d-flex justify-content-center pb-0">
                        <h1 class="title">नयाँ व्यवसाय</h1>
                    </div>
                    <div class="link d-flex justify-content-end">
                        अगाडी बढ्नुहोस <span class="svg-icon svg-baseline ml-2">@include('svg.arrow-right-circle')</span>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a class="card dash-link-card z-depth-0" href="{{ route('online-application.index') }}">
                    <div class="card-body d-flex justify-content-center pb-0">
                        <h1 class="title">आवेदन फारामहरु</h1>
                    </div>
                    <div class="link d-flex justify-content-end">
                        अगाडी बढ्नुहोस <span class="svg-icon svg-baseline ml-2">@include('svg.arrow-right-circle')</span>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a class="card dash-link-card z-depth-0" href="{{ route('organization.index', ['checked' => '1']) }}">
                    <div class="card-body d-flex justify-content-center pb-0">
                        <h1 class="title">व्यवसाय दर्ता सिफारिस</h1>
                    </div>
                    <div class="link d-flex justify-content-end">
                        अगाडी बढ्नुहोस <span class="svg-icon svg-baseline ml-2">@include('svg.arrow-right-circle')</span>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a class="card dash-link-card z-depth-0" href="{{ route('organization.index', ['verified' => 'true']) }}">
                    <div class="card-body d-flex justify-content-center pb-0">
                        <h1 class="title">व्यवसाय दर्ता प्रमाणपत्र</h1>
                    </div>
                    <div class="link d-flex justify-content-end">
                        अगाडी बढ्नुहोस <span class="svg-icon svg-baseline ml-2">@include('svg.arrow-right-circle')</span>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a class="card dash-link-card z-depth-0" href="#">
                    <div class="card-body d-flex justify-content-center pb-0">
                        <h1 class="title">व्यवसाय बन्द बारे</h1>
                    </div>
                    <div class="link d-flex justify-content-end">
                        अगाडी बढ्नुहोस <span class="svg-icon svg-baseline ml-2">@include('svg.arrow-right-circle')</span>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a class="card dash-link-card z-depth-0" href="#">
                    <div class="card-body d-flex justify-content-center pb-0">
                        <h1 class="title">रिपोर्ट</h1>
                    </div>
                    <div class="link d-flex justify-content-end">
                        अगाडी बढ्नुहोस <span class="svg-icon svg-baseline ml-2">@include('svg.arrow-right-circle')</span>
                    </div>
                </a>
            </div>

        </div>
    </div>

    <div id="org-by-ward-chart" style="height: 450px;"></div>
    <div class="my-3"></div>
    <div id="chart" style="height: 300px;"></div>
</div>
@endsection

@push('scripts')
<script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
<!-- Chartisan -->
<script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
<!-- Your application script -->
<script>
    new Chartisan({
        el: '#org-by-ward-chart'
        , url: "@chart('organizations_by_ward_chart')",
        hooks: new ChartisanHooks().datasets('bar').axis(true).legend(true).tooltip()
    });

    new Chartisan({
        el: '#chart'
        , url: "@chart('organization_type_chart')",
        hooks: new ChartisanHooks().datasets('pie').axis(false).tooltip(true)
    });
</script>
@endpush
