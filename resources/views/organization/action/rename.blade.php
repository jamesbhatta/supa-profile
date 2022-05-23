<x-organization.action.template width="col-md-6" title="नाम परिवर्तन: {{ $organization->org_name }}">
    @if($organization->isRegistered())
    @can('organization.register')
    <form id="form-verify" action="{{ route('organization.rename', $organization) }}" method="POST" class="form">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="input-org-name" class="font-noto">नया नाम:</label>
            <input type="text" name="org_name" id="input-org-name" class="form-control rounded-0 @error('org_name') is-invalid @enderror" value="{{ old('org_name', $organization->org_name) }}" placeholder="नया नाम" autocomplete="off" required>
            <x-invalid-feedback field="org_name"></x-invalid-feedback>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary z-depth-0 mx-0">नाम परिवर्तन गर्नुहोस</button>
        </div>
    </form>
    @endcan
    @endif
</x-organization.action.template>
