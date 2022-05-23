<x-organization.action.template width="col-md-6" title="नवीकरण: {{ $organization->org_name }}">
    @if($organization->isRegistered())
    @can('organization.register')
    <form id="form-renew" action="{{ route('organization.renew', $organization) }}" method="POST" class="form">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="input-renewed-date" class="font-noto">नवीकरण मिति</label>
            <input type="text" name="renewed_date" id="input-renewed-date" class="form-control nepali-date rounded-0 @error('renewed_date') is-invalid @enderror">
            <small class="form-text text-muted lang-english">Use Date picker to fill date.</small>
            <x-invalid-feedback field="renewed_date"></x-invalid-feedback>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="input-renew-amount" class="font-noto">नवीकरण रकम</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">रु.</span>
                    </div>
                    <input type="text" name="renew_amount" id="input-renew-amount" class="form-control @error('renew_amount') is-invalid @enderror">
                    <x-invalid-feedback field="renew_amount"></x-invalid-feedback>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="input-renew-bill-no" class="font-noto">बिल नम्बर</label>
                <input type="text" name="renew_bill_no" id="input-renew-bill-no" class="form-control @error('renew_bill_no') is-invalid @enderror">
                <x-invalid-feedback field="renew_bill_no"></x-invalid-feedback>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn- z-depth-0 font-noto font-16px mx-0"> नवीकरण गर्नुहोस</button>
        </div>
    </form>
    @endcan
    @endif
</x-organization.action.template>
