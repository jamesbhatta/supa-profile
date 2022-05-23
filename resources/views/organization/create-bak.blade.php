@extends('layouts.app')

@push('styles')
<style>
    label.required::after {
        content: " *";
        color: red;
        font-family: "Roboto", sans-serif;
    }

    select {
        height: calc(1.5em + .75rem + 4px) !important;
    }

</style>
@endpush

@section('content')
<div class="container">
    @include('alerts.all')
</div>
<div class="container">
    <div class="card z-depth-0">
        <div class="card-body">
            <form action="{{ $organization->id ? route('organization.update', $organization) : route('organization.store') }}" class="form" method="post">
                @csrf

                @isset($organization->id)
                    @method('put')
                @endisset

                @auth()
                <div class="form-group row d-flex">
                    <label class="ml-auto align-self-center col-form-label" for="">आवेदन गरिएको मिति *</label>
                    <div class="col-md-3">
                        <input type="text" name="application_date" id="input-application-date" class="form-control nepali-date rounded-0" value="{{ old('application_date', $organization->application_date ?? '') }}" autocomplete="off">
                    </div>
                </div>
                @endauth

                <div class="mb-4 indigo py-2 px-3 pt-3 text-white d-inline-block">
                    <h5 class="h5-responsive">व्यवसाय / फार्मको विवरण</h5>
                </div>

                <div class="form-group">
                    <label for="" class="required">व्यवसायको नाम</label>
                    <div class="w-responsive">
                        <input type="text" name="org_name" class="form-control rounded-0" value="{{ old('org_name', $organization->org_name ?? '') }}" autocomplete="off">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="required">व्यवसायको ठेगाना</label>
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <select name="org_province_id" id="select-org-province-id" class="form-control rounded-0">
                                <option value="">प्रदेश छान्नुहोस्</option>
                                @foreach ($provinces as $province)
                                <option value="{{ $province->id }}" @if(old('org_province_id', $organization->org_province_id) == $province->id) selected @endif>{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <select name="org_district_id" id="select-org-district-id" class="form-control rounded-0">
                                <option value="">जिल्ला छान्नुहोस्</option>
                                @foreach ($districts as $district)
                                <option value="{{ $district->id }}" data-province-id="{{ $district->province->id}}" @if(old('org_district_id', $organization->org_district_id) == $district->id) selected @endif>{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <select name="org_municipality_id" id="select-org-municipality-id" class="form-control rounded-0">
                                <option value="">न.पा./गा.वि.स. छान्नुहोस्</option>
                                @foreach ($municipalities as $municipality)
                                <option value="{{ $municipality->id }}" data-district-id="{{ $municipality->district->id }}" @if(old('org_municipality_id', $organization->org_municipality_id) == $municipality->id) selected @endif>{{ $municipality->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <select name="org_ward_id" id="select-org-ward" class="form-control rounded-0">
                                <option value="">वडा छान्नुहोस्</option>
                                @foreach ($wards as $ward)
                                <option value="{{ $ward->id }}" @if(old('org_ward_id', $organization->org_ward_id) == $ward->id) selected @endif>{{ $ward->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="" class="required">सडकको नाम</label>
                            <input type="text" name="org_road_name" class="form-control rounded-0" value="{{ old('org_road_name', $organization->org_road_name ?? '' ) }}">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="">घर नं</label>
                            <input type="text" name="org_house_no" class="form-control rounded-0" value="{{ old('org_house_no', $organization->org_house_no ?? '' ) }}">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="" class="required">फोन नं</label>
                            <input type="text" name="org_phone" class="form-control rounded-0" value="{{ old('org_phone', $organization->org_phone ?? '' ) }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="" class="required">किसिम</label>
                            <input type="text" name="org_type" class="form-control rounded-0" value="{{ old('org_type', $organization->org_type ?? '' ) }}">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="" class="required">संचालन मिति</label>
                            <input type="text" name="org_established_nep_date" id="input-org-established-nep-date" class="form-control nepali-date rounded-0" value="{{ old('org_established_nep_date', $organization->org_established_nep_date ?? '' ) }}">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="" class="required">कुल पुँजी रु.</label>
                            <input type="text" name="org_total_capital" class="form-control rounded-0" value="{{ old('org_total_capital', $organization->org_total_capital ?? '' ) }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="" class="required">स्वामित्व</label>
                            <input type="text" name="org_ownership" class="form-control rounded-0" value="{{ old('org_ownership', $organization->org_ownership ?? '' ) }}">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="" class="required">घरधनिको नाम</label>
                            <input type="text" name="org_house_owner_name" class="form-control rounded-0" value="{{ old('org_house_owner_name', $organization->org_house_owner_name ?? '' ) }}">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="" class="required">घरधनिको फोन नं.</label>
                            <input type="text" name="org_house_owner_phone" class="form-control rounded-0" value="{{ old('org_house_owner_phone', $organization->org_house_owner_phone ?? '' ) }}">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="" class="">मासिक भाडा रकम रु.</label>
                            <input type="text" name="org_house_rent" class="form-control rounded-0" value="{{ old('org_house_rent', $organization->org_house_rent ?? '' ) }}">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="" class="required">कित्ता नं</label>
                            <input type="text" name="org_land_kitta_no" class="form-control rounded-0" value="{{ old('org_land_kitta_no', $organization->org_land_kitta_no ?? '' ) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="required">क्षेत्र</label>
                            </div>
                            <div class="col-md-3">
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="org_region_type" class="custom-control-input" value="तराई" id="radio-terai" @if(old('org_region_type', $organization->org_region_type) == 'तराई') checked @endif>
                                    <label class="custom-control-label" for="radio-terai">तराई</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="org_region_type" class="custom-control-input" value="पहाड" id="radio-pahad" @if(old('org_region_type', $organization->org_region_type) == 'पहाड') checked @endif>
                                    <label class="custom-control-label" for="radio-pahad">पहाड</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="required">क्षेत्रफल </label>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="number" name="org_land_bigha" class="form-control rounded-0" min="0" value="{{ old('org_land_bigha', $organization->org_land_bigha ?? 0 ) }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">बिग्घा</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="number" name="org_land_kattha" class="form-control rounded-0" min="0" value="{{ old('org_land_kattha', $organization->org_land_kattha ?? 0 ) }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">कट्ठा</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="number" name="org_land_dhur" class="form-control rounded-0" min="0" value="{{ old('org_land_dhur', $organization->org_land_dhur ?? 0 ) }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">धुर</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="my-4 indigo py-2 px-3 pt-3 text-white d-inline-block">
                        <h5 class="h5-responsive">मुख्य संचालक व्यक्तिको विवरण</h5>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <div class=" form-group">
                                    <label for="" class="required">नाम</label>
                                    <input type="text" name="prop_name" class="form-control rounded-0" value="{{ old('prop_name', $organization->prop_name ?? '' ) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="required">फोन नं.</label>
                                    <input type="text" name="prop_phone" class="form-control rounded-0" value="{{ old('prop_phone', $organization->prop_phone ?? '' ) }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="required" for="">ठेगाना</label>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="prop_province_id" id="select-prop-province-id" class="form-control rounded-0">
                                        <option value="">प्रदेश छान्नुहोस्</option>
                                        @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}" @if(old('prop_province_id', $organization->prop_province_id) == $province->id) selected @endif>{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="prop_district_id" id="select-prop-district-id" class="form-control rounded-0">
                                        <option value="">जिल्ला छान्नुहोस्</option>
                                        @foreach ($districts as $district)
                                        <option value="{{ $district->id }}" data-province-id="{{ $district->province->id}}" @if(old('prop_district_id', $organization->prop_district_id) == $district->id) selected @endif>{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="prop_municipality_id" id="select-prop-municipality-id" class="form-control rounded-0">
                                        <option value="">न.पा./गा.वि.स. छान्नुहोस्</option>
                                        @foreach ($municipalities as $municipality)
                                        <option value="{{ $municipality->id }}" data-district-id="{{ $municipality->district->id }}" @if(old('prop_municipality_id', $organization->prop_municipality_id) == $municipality->id) selected @endif>{{ $municipality->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="prop_ward_id" id="select-prop-ward" class="form-control rounded-0">
                                        <option value="">वडा छान्नुहोस्</option>
                                        @foreach ($wards as $ward)
                                        <option value="{{ $ward->id }}" @if(old('prop_ward_id', $organization->prop_ward_id) == $ward->id) selected @endif>{{ $ward->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="required">सडकको नाम</label>
                                    <input type="text" name="prop_road_name" class="form-control rounded-0" value="{{ old('prop_road_name', $organization->prop_road_name ?? '' ) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="">घर नं.</label>
                                    <input type="text" name="prop_house_no" class="form-control rounded-0" value="{{ old('prop_house_no', $organization->prop_house_no ?? '' ) }}">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="my-4 indigo py-2 px-3 pt-3 text-white d-inline-block">
                        <h5 class="h5-responsive">निवेदकको विवरण</h5>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="required">नाम</label>
                                    <input type="text" name="applicant_name" class="form-control rounded-0" value="{{ old('applicant_name', $organization->applicant_name ?? '' ) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="required">फोन नं.</label>
                                    <input type="text" name="applicant_phone" class="form-control rounded-0" value="{{ old('applicant_phone', $organization->applicant_phone ?? '' ) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="required">ठेगाना</label>
                                    <input type="text" name="applicant_address" class="form-control rounded-0" value="{{ old('applicant_address', $organization->applicant_address ?? '' ) }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">

                    </div>

                    <div class="row">
                        <div class="col-md-12 d-flex">
                            <div class="form-group ml-auto">
                                <button class="btn btn-primary z-depth-0 font-18px">पेश गर्नुहोस्</button>
                            </div>
                        </div>
                    </div>

            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function() {

        $('.nepali-date').nepaliDatePicker({
            unicodeDate: true
        });

        $('#select-org-province-id').change(function() {
            filterOptions($(this).val(), '#select-org-district-id option', 'province-id');
        });

        $('#select-org-district-id').change(function() {
            filterOptions($(this).val(), '#select-org-municipality-id option', 'district-id');
        });

        $('#select-prop-province-id').change(function() {
            filterOptions($(this).val(), '#select-prop-district-id option', 'province-id');
        });

        $('#select-prop-district-id').change(function() {
            filterOptions($(this).val(), '#select-prop-municipality-id option', 'district-id');
        });

    });

</script>
@endpush
