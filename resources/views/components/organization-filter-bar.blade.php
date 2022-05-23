{{-- <div class="d-none">
    <div class="input-group">
        <button class="btn btn-outline-primary btn-md z-depth-0  dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-filter pr-2"></i> स्वीकृत</button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('organization.index', ['verified' => '1']) }}">स्वीकृत भयेको</a>
<a class="dropdown-item" href="{{ route('organization.index', ['verified' => '0']) }}">स्वीकृत नभयेको</a>
<div role="separator" class="dropdown-divider"></div>
<a class="dropdown-item" href="{{ route('organization.index') }}">सबै</a>
</div>
</div>
</div> --}}

<div class="d-flex">
    <form action="{{ route('organization.index') }}" method="GET" class="form-inline">
        @foreach (request()->except(['registration_number', 'org_name', 'fiscal_year', 'ward_id', 'date_from', 'date_to']) as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
        <div class="d-flex flex-wrap" style="gap: 8px;">
            <div class="">
                <input type="text" name="registration_number" class="form-control rounded-0" value="{{ request()->query('registration_number') }}" placeholder="Registration No.">
            </div>
            <div class="">
                <input type="text" name="org_name" class="form-control rounded-0" value="{{ request()->query('org_name') }}" placeholder="Organization Name">
            </div>
            <div class="">
                <select name="fiscal_year" class="custom-select rounded-0">
                    <option value="">All Fiscal Year</option>
                    @foreach(\App\FiscalYear::latest()->get() as $fiscalYear)
                    <option value="{{ $fiscalYear->name }}" @if(request()->query('fiscal_year') == $fiscalYear->name) selected @endif>{{ $fiscalYear->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="">
                <select name="ward_id" class="custom-select rounded-0">
                    <option value="">All Ward</option>
                    @foreach(\App\Ward::select(['id', 'name'])->get() as $ward)
                    <option value="{{ $ward->id }}" @if(request()->query('ward_id') == $ward->id) selected @endif>वडा नं. {{ $ward->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="">
                <select name="org_type" class="custom-select rounded-0">
                    <option value="">All Types</option>
                    @foreach(\App\OrganizationType::select(['id', 'name'])->get() as $organizationType)
                    <option value="{{ $organizationType->name }}" @if(request()->query('org_type') == $organizationType->name) selected @endif>{{ $organizationType->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="">
                <input type="text" name="date_from" id="input-date-from" class="form-control nepali-date rounded-0" value="{{ request()->query('date_from') }}" placeholder="Date From">
            </div>
            <div class="">
                <input type="text" name="date_to" id="input-date-to" class="form-control nepali-date rounded-0" value="{{ request()->query('date_to') }}" placeholder="Date To">
            </div>
            <div class="">
                <input type="text" name="prop_phone" class="form-control rounded-0" value="{{ request()->query('prop_phone') }}" placeholder="Prop. Phone">
            </div>
            {{-- <div class="">
                <button class="form-control dropdown-toggle rounded-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 mdb-color-text"><i class="fas fa-filter"></i></span> Filter
                </button>
                <div class="dropdown-menu">
                    <button type="submit" class="dropdown-item" name="registered_date" value="true">दर्ता भएका</button>
                    <button type="submit" class="dropdown-item" name="closed_date" value="true">बन्द भएका</button>
                    <button type="submit" class="dropdown-item" name="renewed" value="true">नवीकरण भएका</button>
                    <button type="submit" class="dropdown-item" name="renewed" value="false">नवीकरण नभएका</button>
                </div>
            </div> --}}
            <div class="">
                <button type="submit" class="btn btn-primary btn-md z-depth-0 my-0 font-noto"><span class="svg-icon svg-baseline mr-1">@include('svg.filter')</span> Filter</button>
            </div>
        </div>
    </form>
    {{-- <div class="ml-auto">
        <a class="btn btn-primary btn-md z-depth-0 btn-hover font-16px font-noto" href="{{ route('organization.create') }}"><span class="mr-2"><i class="fa fa-plus"></i></span>@lang('app.new')</a>
    </div> --}}
</div>
