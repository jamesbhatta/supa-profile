<div class="d-flex my-3">
    <div class="d-flex align-items-center">
        <button class="form-control form-control-sm dropdown-toggle rounded-0 d-inline" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ request('per_page') ?? config('constants.organization.per_page') }}</button>
        <span class="flex-shrink-0 align-self-center"> &nbsp;@lang('app.records_per_page')</span>
        <div class="dropdown-menu">
            <a href="{{ request()->fullUrlWithQuery(['per_page' => 20]) }}" class="dropdown-item" name="closed_date" value="true">20</a>
            <a href="{{ request()->fullUrlWithQuery(['per_page' => 50]) }}" class="dropdown-item" name="registered_date" value="true">50</a>
            <a href="{{ request()->fullUrlWithQuery(['per_page' => 100]) }}" class="dropdown-item" name="renewed" value="true">100</a>
            <a href="{{ request()->fullUrlWithQuery(['per_page' => 200]) }}" class="dropdown-item" name="renewed" value="true">200</a>
            <a href="{{ request()->fullUrlWithQuery(['per_page' => 0]) }}" class="dropdown-item" name="renewed" value="false">All</a>
        </div>
    </div>
    <div class="ml-auto">
        <div class="d-flex align-items-center" style="grid-gap: 1rem;">
            <a class=" z-depth-0" href="{{ request()->fullUrlWithQuery(['export' => true]) }}" target="_blank"><i class="far fa-file-excel mr-2"></i>Export</a>
            <span>Sort By:</span>
            <div>
                <button class="form-control form-control-sm dropdown-toggle rounded-0 d-inline" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ request('order_by') ??'Default' }}</button>
                <div class="dropdown-menu">
                    <a href="{{ request()->fullUrlWithQuery(['order_by' => 'org_name']) }}" class="dropdown-item" value="true">Default</a>
                    <a href="{{ request()->fullUrlWithQuery(['order_by' => 'org_name']) }}" class="dropdown-item" value="true">Name</a>
                    <a href="{{ request()->fullUrlWithQuery(['order_by' => 'registered_date']) }}" class="dropdown-item" value="true">Registered Date</a>
                    <a href="{{ request()->fullUrlWithQuery(['order_by' => 'org_reg_no']) }}" class="dropdown-item" value="true">Registration Number</a>
                    <a href="{{ request()->fullUrlWithQuery(['order_by' => 'created_at']) }}" class="dropdown-item" value="true">Created Date</a>
                    <a href="{{ request()->fullUrlWithQuery(['order_by' => 'updated_at']) }}" class="dropdown-item" value="true">Last Update</a>
                </div>
            </div>
            {{-- Order --}}
            <div>
                <button class="form-control form-control-sm dropdown-toggle rounded-0 d-inline" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ request('order') ?? 'Latest' }}</button>
                <div class="dropdown-menu">
                    <a href="{{ request()->fullUrlWithQuery(['order' => 'desc']) }}" class="dropdown-item" value="true">Latest</a>
                    <a href="{{ request()->fullUrlWithQuery(['order' => 'asc']) }}" class="dropdown-item" value="true">Oldest</a>
                </div>
            </div>
        </div>
    </div>
</div>
<table class="table table-hover table-borderless" style=" border-collapse: separate; border-spacing: 0 15px;">
    <thead class="bg-deep-blue text-white font-15px" style="position: sticky; top: 55px; z-index: 10;">
        <tr>
            @if (!request('registered')== 1)
            <th>टोकन नं.</th>
            @endif
            <th>दर्ता मिति</th>
            <th>दर्ता नं.</th>
            <th>व्यवसाय</th>
            <th>व्यवसायीको नाम थर</th>
            {{-- <th>ठेगाना</th> --}}
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse($organizations as $organization)
        <tr class="bg-white">
            @if (!request('registered')== 1)
            <td>{{ $organization->onlineApplication->token_number }}</td>
            @endif
            <td>
                {{ $organization->registered_date ?? 'Not registered' }}
            </td>
            <td>
                {{ $organization->org_reg_no }}
            </td>
            <td>
                <div>{{ $organization->org_name }}</div>
                <div class="text-muted" style="font-size: .9rem;">
                    {{-- ( {{ $organization->municipality->name }}, वार्ड- {{ $organization->ward->name }}, {{ $organization->district->name }}, {{ $organization->province->name }} ) --}}
                    ( {{ $organization->municipality->name }}, वार्ड- {{ $organization->ward->name }} )
                </div>
            </td>
            <td>
                <div>{{ $organization->prop_name }}</div>
                @if($organization->org_phone)
                <div class="text-muted" style="font-size: .9rem;">Ph. {{ $organization->org_phone }}</div>
                @endif
            </td>
            <td class="font-noto">
                @if($organization->isClosed())
                <span class="badge badge-danger z-depth-0">बन्द भएको</span>
                @elseif($organization->isRegistered())
                <span class="badge badge-success z-depth-0">दर्ता भएको</span>
                @elseif($organization->isVerified())
                <span class="text-success">सिफारिस भएको</span>
                @else
                <span class="text-danger">सिफारिस नभएको</span>
                @endif
            </td>
            <td>
                @if($organization->trashed())
                @hasanyrole('super-admin')
                <form action="{{ route('organization.restore', $organization) }}" method="POST" class="d-inline" onsubmit="return confirm('Sure to trash?')">
                    @csrf
                    @method('patch')
                    <button class="btn btn-secondary btn-md font-noto my-0 py-2 px-3 z-depth-0" type="submit">Restore</butt>
                </form>
                @endhasanyrole
                @else
                <a class="btn btn-primary btn-md font-noto my-0 py-2 px-3 z-depth-0" href="{{ route('organization.show', $organization) }}">View</a>
                @hasanyrole('super-admin')
                <form action="{{ route('organization.destroy', $organization) }}" method="POST" class="d-inline" onsubmit="return confirm('Sure to trash?')">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-md font-noto my-0 py-2 px-3 z-depth-0" type="submit">Delete</butt>
                </form>
                @endhasanyrole
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td class="bg-white text-center text-danger font-18px" colspan="42">** यहाँ कुनै डाटा छैन | **</td>
        </tr>
        @endforelse
    </tbody>
</table>
