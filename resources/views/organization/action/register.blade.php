<x-organization.action.template width="col-md-6" title="दर्ता: {{ $organization->org_name }}">
    @if($organization->isVerified() && !$organization->isRegistered())
    @can('organization.register')
    <form id="form-register" action="{{ route('organization.register', $organization) }}" method="POST" class="form">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="input-registered-date" class="font-noto required">दर्ता मिति</label>
            <input type="text" name="registered_date" id="input-registered-date" class="form-control nepali-date rounded-0 @error('registered_date') is-invalid @enderror" value="{{ old('registered_date', $organization->registered_date) }}" placeholder="मिति" autocomplete="off" required>
            <small class="form-text text-muted lang-english">Do Not Type Manually. Use Date picker to fill date. If typed manually make sure the data format is YYYY-MM-DD and you typed using English alphabets.</small>
            <x-invalid-feedback field="registered_date"></x-invalid-feedback>
        </div>

        <div class="form-group">
            <label for="input-registered-date" class="font-noto">दर्ता नम्बर</label>
            <input type="text" name="org_reg_no" class="form-control rounded-0 @error('org_reg_no') is-invalid @enderror" value="{{ old('org_reg_no', $organization->org_reg_no) }}" placeholder="दर्ता नं. {{ $registrationNumberSuggestion }}" autocomplete="off">
            <x-invalid-feedback field="org_reg_no"></x-invalid-feedback>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary z-depth-0 mx-0">दर्ता गर्नुहोस</button>
        </div>
    </form>
    @endcan
    @endif
</x-organization.action.template>
