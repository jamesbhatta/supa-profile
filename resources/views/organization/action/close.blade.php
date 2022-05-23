<x-organization.action.template width="col-md-6" title="व्यवसाय बन्द: {{ $organization->org_name }}">
    @if($organization->isRegistered() && !$organization->isclosed())
    @can('organization.close')
    <form id="form-close" action="{{ route('organization.close', $organization) }}" method="POST" class="form">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="iput-closed-date" class="font-noto">बन्द मिति</label>
            <input type="text" name="closed_date" id="input-closed-date" class="form-control form-control-lg nepali-date rounded-0 @error('closed_date') is-invalid @enderror" value="{{ old('closed_date', $organization->closed_date) }}" placeholder="मिति" autocomplete="off" required>
            <x-invalid-feedback field="closed_date"></x-invalid-feedback>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary font-noto z-depth-0 mx-0">बन्द गर्नुहोस</button>
        </div>
    </form>
    @endcan
    @endif
</x-organization.action.template>
