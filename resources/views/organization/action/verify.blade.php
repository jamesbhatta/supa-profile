<x-organization.action.template width="col-md-6" title="सिफारिस: {{ $organization->org_name }}">
    @if($organization->isChecked() && !$organization->isVerified())
    @can('organization.verify')
    <form id="form-verify" action="{{ route('organization.verify', $organization) }}" method="POST" class="form">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="input-verified-date" class="font-noto">सिफारिस मिति</label>
            <input type="text" name="verified_date" id="input-verified-date" class="form-control nepali-date date-today rounded-0 @error('verified_date') is-invalid @enderror" value="{{ old('verified_date', $organization->verified_date) }}" placeholder="मिति" autocomplete="off" required>
            <x-invalid-feedback field="verified_date"></x-invalid-feedback>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary z-depth-0 mx-0">सिफारिस गर्नुहोस</button>
        </div>
    </form>
    @endcan
    @endif
</x-organization.action.template>
