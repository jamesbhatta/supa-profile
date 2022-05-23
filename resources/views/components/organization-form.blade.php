<div>
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
    @if($oldDataEntryMode)
    <style>
        .hide-on-old-entry {
            display: none;
        }

    </style>
    @endif
    @endpush

    <div class="card z-depth-0">
        <div class="card-body">
           <div class="text-center light-blue lighten-5 indigo-text p-4">
                <h2 class="h2-responsive d-inline-block font-weight-bolder font-noto border-bottom border-primary pb-2">
                    {{ $oldDataEntryMode ? 'पुरानो डाटा प्रविष्टि फारम' : 'व्यवसाय दर्ता फारम' }}
                </h2>

                @auth
                @if($organization->onlineApplication->token_number)
                <h3 class="h3-responsive">
                    Token No: {{ $organization->onlineApplication->token_number }}
                </h3>
                @endif
                @endauth

            </div>
            <div class="my-4"></div>

             {{-- Information --}}
             @guest
             <div class="card z-depth-0 border mb-4">
                 <div class="card-body">
                     <div>यस पालिका र अन्तर्गतका वडा कार्यालयमा पहिल्यै दर्ता भईसकेका व्यवसाय सङ्गँ मिल्दो नाम दर्ता हुने छैन । Space, ह्र्स्व र दिर्घका आधारमा System ले नाम दिएमा यसलाई पालिकाले अस्विकृत गर्न सक्नेछ ।</div>
                    </div>
                </div>
            @endguest

            @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @lang('app.form_validation_error_message')
                <button type="button" class="close font-roboto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <form action="{{ $organization->id ? route('organization.update', $organization) : route('organization.store') }}" class="form" method="post" enctype="multipart/form-data">
                @csrf

                @isset($organization->id)
                @method('put')
                <input type="hidden" name="id" value="{{ $organization->id }}" hidden>
                @endisset

                @if ($oldDataEntryMode)
                <input type="hidden" name="old_registration" value="1" hidden>
                @endif

                <div class="d-flex">
                    <div class="mb-4 indigo py-2 px-3 pt-3 text-white d-inline-block">
                        <h5 class="h5-responsive">व्यवसाय / फार्मको विवरण</h5>
                    </div>
                    <div class="ml-auto align-self-center font-noto">
                        <x-romanized-keyboard-switcher />
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-8">
                            <label for="" class="required">व्यवसायको नाम</label>
                            <input type="text" name="org_name" class="form-control romanized rounded-0 {{ invalid_class('org_name') }}" value="{{ old('org_name', $organization->org_name ?? $organizationName) }}" autocomplete="off" required>
                            <x-invalid-feedback field="org_name"></x-invalid-feedback>
                            <div class="text-muted font-noto mt-2">यस विभाग र अन्तर्गतका कार्यालयमा पहिल्यै दर्ता भईसकेका वाणिज्य व्यवसाय सङ्गँ मिल्दो नाम दर्ता हुने छैन । Space, ह्र्स्व र दिर्घका आधारमा System ले नाम दिएमा यसलाई विभागले अस्विकृत गर्न सक्छ ।</div>
                        </div>

                        @guest
                        <input type="hidden" name="fiscal_year" value="{{ settings('fiscal_year') }}" hidden>
                        @else
                        <div class="col-md-4">
                            <label class="required">आर्थिक वर्ष</label>
                            <select name="fiscal_year" id="" class="custom-select rounded-0">
                                @foreach($fiscalYears as $fiscalYear)
                                <option value="{{ $fiscalYear->name }}" @if(old('fiscal_year', $organization->fiscal_year) == $fiscalYear->name) selected @endif>{{ $fiscalYear->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endguest

                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="required">व्यवसायको ठेगाना</label>
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <select name="org_province_id" id="select-org-province-id" class="custom-select rounded-0 {{ invalid_class('org_province_id') }}" required>
                                <option value="">प्रदेश छान्नुहोस्</option>
                                @include('org-form-components.default-location',['settingsKey' => 'default_province_id', 'data' => $provinces])
                                @foreach ($provinces as $province)
                                <option value="{{ $province->id }}" @if(old('org_province_id', $organization->org_province_id) == $province->id) selected @endif>{{ $province->name }}</option>
                                @endforeach
                            </select>
                            <x-invalid-feedback field="org_province_id"></x-invalid-feedback>
                        </div>
                        <div class="col-md-4 form-group">
                            <select name="org_district_id" id="select-org-district-id" class="custom-select rounded-0 {{ invalid_class('org_district_id') }}" required>
                                <option value="">जिल्ला छान्नुहोस्</option>
                                @include('org-form-components.default-location',['settingsKey' => 'default_district_id', 'data' => $districts])
                                @foreach ($districts as $district)
                                <option value="{{ $district->id }}" data-province-id="{{ $district->province->id}}" @if(old('org_district_id', $organization->org_district_id) == $district->id) selected @endif>{{ $district->name }}</option>
                                @endforeach
                            </select>
                            <x-invalid-feedback field="org_district_id"></x-invalid-feedback>
                        </div>
                        <div class="col-md-4 form-group">
                            <select name="org_municipality_id" id="select-org-municipality-id" class="custom-select rounded-0 {{ invalid_class('org_municipality_id') }}" required>
                                <option value="">न.पा./गा.वि.स. छान्नुहोस्</option>
                                @include('org-form-components.default-location',['settingsKey' => 'default_municipality_id', 'data' => $municipalities])
                                @foreach ($municipalities as $municipality)
                                <option value="{{ $municipality->id }}" data-district-id="{{ $municipality->district->id }}" @if(old('org_municipality_id', $organization->org_municipality_id) == $municipality->id) selected @endif>{{ $municipality->name }}</option>
                                @endforeach
                            </select>
                            <x-invalid-feedback field="org_municipality_id"></x-invalid-feedback>
                        </div>
                        <div class="col-md-4 form-group">
                            <select name="org_ward_id" id="select-org-ward" class="custom-select rounded-0 {{ invalid_class('org_ward_id') }}" required>
                                <option value="">वडा छान्नुहोस्</option>

                                @auth
                                @if(auth()->user()->settings->form_ward_id && !$organization->id)
                                @foreach ($wards as $ward)
                                @if(auth()->user()->settings->form_ward_id == $ward->id)
                                <option value="{{ $ward->id }}" selected>{{ $ward->name }}</option>
                                @endif
                                @endforeach
                                @endif
                                @endauth

                                @foreach ($wards as $ward)
                                <option value="{{ $ward->id }}" @if(old('org_ward_id', $organization->org_ward_id) == $ward->id) selected @endif>{{ $ward->name }}</option>
                                @endforeach
                            </select>
                            <x-invalid-feedback field="org_ward_id"></x-invalid-feedback>
                        </div>
                    </div>
                </div>

                <div class="form-group hide-on-old-entry">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            {{-- <label for="" class="required">स्थान</label> --}}
                            <label for="" class="required">बाटोको नाम</label>
                            <input type="text" name="org_road_name" class="form-control unicode-font rounded-0 {{ invalid_class('org_road_name') }}" value="{{ old('org_road_name', $organization->org_road_name ?? '' ) }}" required>
                            <x-invalid-feedback field="org_road_name"></x-invalid-feedback>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="">घर नं</label>
                            <input type="text" name="org_house_no" class="form-control rounded-0 {{ invalid_class('org_house_no') }}" value="{{ old('org_house_no', $organization->org_house_no ?? '' ) }}">
                            <x-invalid-feedback field="org_house_no"></x-invalid-feedback>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="" class="required">फोन नं</label>
                            <input type="text" name="org_phone" class="form-control rounded-0 {{ invalid_class('org_phone') }}" value="{{ old('org_phone', $organization->org_phone ?? '' ) }}" required>
                            <x-invalid-feedback field="org_phone"></x-invalid-feedback>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="">इमेल</label>
                            <input type="email" name="org_email" class="form-control rounded-0 {{ invalid_class('org_email') }}" value="{{ old('org_email', $organization->org_email ?? '' ) }}">
                            <x-invalid-feedback field="org_email"></x-invalid-feedback>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="input-org-type" class="required">व्यवसायको प्रकृति</label>
                            {{-- <input type="text" id="input-org-type" name="org_type" class="form-control unicode-font rounded-0 {{ invalid_class('org_type') }}" list="org-types" value="{{ old('org_type', $organization->org_type) }}" required>
                            <datalist id="org-types">
                                @foreach ($organizationTypes as $organizationType)
                                <option>{{ $organizationType->name }}</option>
                                @endforeach
                            </datalist> --}}
                            <select name="org_type" class="custom-select">
                                <option value="">प्रकृति छान्नुहोस्</option>
                                @foreach ($organizationTypes as $organizationType)
                                <option value="{{ $organizationType->name }}" @if(old('org_type', $organization->org_type) == $organizationType->name) selected @endif>{{ $organizationType->name }}</option>
                                @endforeach
                            </select>
                            <x-invalid-feedback field="org_type"></x-invalid-feedback>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="" class="required">कारोबार गर्ने वस्तु</label>
                            <input type="text" name="org_product_type" class="form-control unicode-font rounded-0 {{ invalid_class('org_product_type') }}" value="{{ old('org_product_type', $organization->org_product_type ?? '' ) }}" required>
                            <x-invalid-feedback field="org_product_type"></x-invalid-feedback>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="" class="required">संचालन मिति</label>
                            {{-- Temporaily removed readonly attribute --}}
                            <input type="text" name="org_established_nep_date" id="input-org-established-nep-date" class="form-control nepali-date rounded-0 {{ invalid_class('org_established_nep_date') }}" value="{{ old('org_established_nep_date', $organization->org_established_nep_date ) }}" required>
                            <small class="form-text text-muted lang-english">Use Date picker to fill date. @auth Make sure the data format is YYYY-MM-DD in English alphabets. @endif </small>
                            <x-invalid-feedback field="org_established_nep_date"></x-invalid-feedback>
                        </div>
                        <div class="col-md-4 form-group hide-on-old-entry">
                            <label for="" class="required">कुल पुँजी रु.</label>
                            <input type="text" name="org_total_capital" list="capital-amounts" class="form-control rounded-0 {{ invalid_class('org_total_capital') }}" value="{{ old('org_total_capital', $organization->org_total_capital ?? '' ) }}" required>
                            <x-invalid-feedback field="org_total_capital"></x-invalid-feedback>
                            <datalist id="capital-amounts">
                                <option value="100000">१०००००</option>
                                <option value="200000">२०००००</option>
                                <option value="500000">५०००००</option>
                                <option value="1000000">१००००००</option>
                                <option value="1500000">१५०००००</option>
                                <option value="2000000">२००००००</option>
                                <option value="2500000">२५०००००</option>
                            </datalist>
                        </div>
                        <div class="col-md-4 form-group hide-on-old-entry">
                            <label for="" class="required">स्वामित्व</label>
                            <select name="org_ownership" class="custom-select rounded-0 {{ invalid_class('org_ownership') }}" required>
                                <option value="व्यक्तिगत" @if (old('org_ownership', $organization->org_ownership) == "व्यक्तिगत") selected @endif>व्यक्तिगत</option>
                                <option value="साझेदारी" @if (old('org_ownership', $organization->org_ownership) == "साझेदारी") selected @endif>साझेदारी</option>
                            </select>
                            <x-invalid-feedback field="org_ownership"></x-invalid-feedback>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="" class="required">कित्ता नं</label>
                            <input type="text" name="org_land_kitta_no" class="form-control rounded-0 {{ invalid_class('org_land_kitta_no') }}" value="{{ old('org_land_kitta_no', $organization->org_land_kitta_no ?? '' ) }}" required>
                            <x-invalid-feedback field="org_land_kitta_no"></x-invalid-feedback>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <div class="d-flex">
                            <label for="" class="required">क्षेत्रफल </label>
                            <div class="ml-auto">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="checkbox-area-in-meter" class="custom-control-input" @if(old('org_land_area_in_meter', $organization->org_land_area_in_meter) != '') checked @endif>
                                    <label class="custom-control-label" for="checkbox-area-in-meter">वर्ग मीटरमा लेख्नुहोस्</label>
                                </div>
                            </div>
                        </div>

                        {{-- Area in Kattha --}}
                        <div id="area-in-kattha" @if(old('org_land_area_in_meter', $organization->org_land_area_in_meter) != '') style="display: none;" @endif>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group {{ invalid_class('org_land_bigha') }}">
                                            <input type="number" name="org_land_bigha" class="form-control rounded-0 {{ invalid_class('org_land_bigha') }}" min="0" value="{{ old('org_land_bigha', $organization->org_land_bigha ?? 0 ) }}">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">बिघा</span>
                                            </div>
                                        </div>
                                        <x-invalid-feedback field="org_land_bigha"></x-invalid-feedback>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group {{ invalid_class('org_land_kattha') }}">
                                            <input type="number" name="org_land_kattha" class="form-control rounded-0 {{ invalid_class('org_land_kattha') }}" min="0" value="{{ old('org_land_kattha', $organization->org_land_kattha ?? 0 ) }}">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">कट्ठा</span>
                                            </div>
                                        </div>
                                        <x-invalid-feedback field="org_land_kattha"></x-invalid-feedback>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group {{ invalid_class('org_land_dhur') }}">
                                            <input type="number" name="org_land_dhur" class="form-control rounded-0 {{ invalid_class('org_land_dhur') }}" min="0" value="{{ old('org_land_dhur', $organization->org_land_dhur ?? 0 ) }}" step="any">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">धुर</span>
                                            </div>
                                        </div>
                                        <x-invalid-feedback field="org_land_dhur"></x-invalid-feedback>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Area in meter --}}
                        <div id="area-in-meter" @if(old('org_land_area_in_meter', $organization->org_land_area_in_meter) == '') style="display: none;" @endif>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group {{ invalid_class('org_land_area_in_meter') }}">
                                            <input type="text" id="input-org-land-area-in-meter" name="org_land_area_in_meter" class="form-control rounded-0 {{ invalid_class('org_land_area_in_meter') }}" value="{{ old('org_land_area_in_meter', $organization->org_land_area_in_meter ) }}">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">वर्ग मीटर</span>
                                            </div>
                                        </div>
                                        <x-invalid-feedback field="org_land_area_in_meter"></x-invalid-feedback>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group py-3 hide-on-old-entry">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="required">क्षेत्र</label>
                            </div>
                            <div class="col-md-3">
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="org_region_type" class="custom-control-input {{ invalid_class('org_region_type') }}" value="शहरी" id="radio-terai" @if(old('org_region_type', $organization->org_region_type) == 'शहरी') checked @endif>
                                    <label class="custom-control-label" for="radio-terai">शहरी</label>
                                    <x-invalid-feedback field="org_region_type"></x-invalid-feedback>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="org_region_type" class="custom-control-input {{ invalid_class('org_region_type') }}" value="ग्रामीण" id="radio-pahad" @if(old('org_region_type', $organization->org_region_type ?? 'ग्रामीण') == 'ग्रामीण') checked @endif>
                                    <label class="custom-control-label" for="radio-pahad">ग्रामीण</label>
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
                                    <input type="text" id="input-prop-name" name="prop_name" class="form-control unicode-font rounded-0 {{ invalid_class('prop_name') }}" value="{{ old('prop_name', $organization->prop_name ?? '' ) }}" required>
                                    <x-invalid-feedback field="prop_name"></x-invalid-feedback>
                                </div>
                            </div>
                            <div class="col-md-4 hide-on-old-entry">
                                <div class="form-group">
                                    <label for="" class="required">फोन नं.</label>
                                    <input type="text" id="input-prop-phone" name="prop_phone" class="form-control rounded-0 {{ invalid_class('prop_phone') }}" value="{{ old('prop_phone', $organization->prop_phone ?? '' ) }}" required>
                                    <x-invalid-feedback field="prop_phone"></x-invalid-feedback>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group hide-on-old-entry">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="required">नागरिकता नं.</label>
                                    <input type="text" id="input-prop-citizenship-no" name="prop_citizenship_no" class="form-control rounded-0 {{ invalid_class('prop_citizenship_no') }}" value="{{ old('prop_citizenship_no', $organization->prop_citizenship_no ?? '' ) }}" required>
                                    <x-invalid-feedback field="prop_citizenship_no"></x-invalid-feedback>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">नागरिकता जारी जिल्ला</label>
                                    <select name="prop_citizenship_district" id="select-prop-citizenship-district" class="custom-select rounded-0 {{ invalid_class('prop_citizenship_district') }}">
                                        <option value="">जिल्ला छान्नुहोस्</option>
                                        @foreach ($districts as $district)
                                        <option value="{{ $district->name }}" @if(old('prop_citizenship_district', $organization->prop_citizenship_district) == $district->name) selected @endif>{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-invalid-feedback field="prop_citizenship_district"></x-invalid-feedback>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">नागरिकता जारी मिति</label>
                                    <input type="text" name="prop_citizenship_issued_date" class="form-control rounded-0 {{ invalid_class('prop_citizenship_issued_date') }}" value="{{ old('prop_citizenship_issued_date', $organization->prop_citizenship_issued_date ?? '' ) }}">
                                    <x-invalid-feedback field="prop_citizenship_issued_date"></x-invalid-feedback>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group hide-on-old-entry">
                        <label class="required" for="">ठेगाना</label>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="prop_province_id" id="select-prop-province-id" class="custom-select rounded-0 {{ invalid_class('prop_province_id') }}" required>
                                        <option value="">प्रदेश छान्नुहोस्</option>
                                        @include('org-form-components.default-location',['settingsKey' => 'default_province_id', 'data' => $provinces])
                                        @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}" @if(old('prop_province_id', $organization->prop_province_id) == $province->id) selected @endif>{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-invalid-feedback field="prop_province_id"></x-invalid-feedback>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="prop_district_id" id="select-prop-district-id" class="custom-select rounded-0 {{ invalid_class('prop_district_id') }}" required>
                                        <option value="">जिल्ला छान्नुहोस्</option>
                                        @include('org-form-components.default-location',['settingsKey' => 'default_district_id', 'data' => $districts])
                                        @foreach ($districts as $district)
                                        <option value="{{ $district->id }}" data-province-id="{{ $district->province->id}}" @if(old('prop_district_id', $organization->prop_district_id) == $district->id) selected @endif>{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-invalid-feedback field="prop_district_id"></x-invalid-feedback>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="prop_municipality_id" id="select-prop-municipality-id" class="custom-select rounded-0 {{ invalid_class('prop_municipality_id') }}" required>
                                        <option value="">न.पा./गा.वि.स. छान्नुहोस्</option>
                                        @include('org-form-components.default-location',['settingsKey' => 'default_municipality_id', 'data' => $municipalities])
                                        @foreach ($municipalities as $municipality)
                                        <option value="{{ $municipality->id }}" data-district-id="{{ $municipality->district->id }}" @if(old('prop_municipality_id', $organization->prop_municipality_id) == $municipality->id) selected @endif>{{ $municipality->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-invalid-feedback field="prop_municipality_id"></x-invalid-feedback>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="prop_ward_id" id="select-prop-ward" class="custom-select rounded-0 {{ invalid_class('prop_ward_id') }}" required>
                                        <option value="">वडा छान्नुहोस्</option>

                                        @auth
                                        @if(auth()->user()->settings->form_ward_id && !$organization->id)
                                        @foreach ($wards as $ward)
                                        @if(auth()->user()->settings->form_ward_id == $ward->id)
                                        <option value="{{ $ward->id }}" selected>{{ $ward->name }}</option>
                                        @endif
                                        @endforeach
                                        @endif
                                        @endauth

                                        @foreach ($wards as $ward)
                                        <option value="{{ $ward->id }}" @if(old('prop_ward_id', $organization->prop_ward_id) == $ward->id) selected @endif>{{ $ward->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-invalid-feedback field="prop_ward_id"></x-invalid-feedback>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group hide-on-old-entry">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="required">स्थान</label>
                                    <input type="text" name="prop_road_name" class="form-control unicode-font rounded-0 {{ invalid_class('prop_road_name') }}" value="{{ old('prop_road_name', $organization->prop_road_name ?? '' ) }}" required>
                                    <x-invalid-feedback field="prop_road_name"></x-invalid-feedback>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="">घर नं.</label>
                                    <input type="text" name="prop_house_no" class="form-control rounded-0 {{ invalid_class('prop_house_no') }}" value="{{ old('prop_house_no', $organization->prop_house_no ?? '' ) }}">
                                    <x-invalid-feedback field="prop_house_no"></x-invalid-feedback>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="d-flex my-4">
                            <div class=" indigo py-2 px-3 pt-3 text-white d-inline-block">
                                <h5 class="h5-responsive d-inline-block">जग्गाधनी / घरधनिको विवरण</h5>
                            </div>
                            <div class="ml-auto align-self-center">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="self-house-owner" class="custom-control-input">
                                    <label class="custom-control-label" for="self-house-owner">घरधनी आफै हो ?</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="" class="required">घरधनिको नाम</label>
                                <input type="text" id="input-org-house-owner-name" name="org_house_owner_name" class="form-control unicode-font rounded-0 {{ invalid_class('org_house_owner_name') }}" value="{{ old('org_house_owner_name', $organization->org_house_owner_name ?? '' ) }}" required>
                                <x-invalid-feedback field="org_house_owner_name"></x-invalid-feedback>
                            </div>
                            <div class="col-md-4 form-group hide-on-old-entry">
                                <label for="" class="required">घरधनिको ठेगाना.</label>
                                <input type="text" id="input-org-house-owner-address" name="org_house_owner_address" class="form-control unicode-font rounded-0 {{ invalid_class('org_house_owner_address') }}" value="{{ old('org_house_owner_address', $organization->org_house_owner_address ?? '' ) }}" required>
                                <x-invalid-feedback field="org_house_owner_address"></x-invalid-feedback>
                            </div>
                            <div class="col-md-4 form-group hide-on-old-entry">
                                <label for="" class="required">घरधनिको वडा नं.</label>
                                <select name="org_house_owner_ward" id="select-org-house-owner-ward" class="custom-select rounded-0 {{ invalid_class('org_house_owner_ward') }}" required>
                                    @foreach ($wards as $ward)
                                    <option value="{{ $ward->name }}" @if(old('org_house_owner_ward', $organization->org_house_owner_ward) == $ward->name) selected @endif>{{ $ward->name }}</option>
                                    @endforeach
                                </select>
                                <x-invalid-feedback field="org_house_owner_ward"></x-invalid-feedback>
                            </div>
                            <div class="col-md-4 form-group hide-on-old-entry">
                                <label for="" class="required">घरधनिको फोन नं.</label>
                                <input type="text" id="input-org-house-owner-phone" name="org_house_owner_phone" class="form-control rounded-0 {{ invalid_class('org_house_owner_phone') }}" value="{{ old('org_house_owner_phone', $organization->org_house_owner_phone ?? '' ) }}" required>
                                <x-invalid-feedback field="org_house_owner_phone"></x-invalid-feedback>
                            </div>
                            <div class="col-md-4 form-group hide-on-old-entry">
                                <label for="" class="">मासिक भाडा रकम रु.</label>
                                <input type="text" name="org_house_rent" class="form-control rounded-0 {{ invalid_class('org_house_rent') }}" value="{{ old('org_house_rent', $organization->org_house_rent ?? '' ) }}">
                                <x-invalid-feedback field="org_house_rent"></x-invalid-feedback>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex my-4 hide-on-old-entry">
                        <div class=" indigo py-2 px-3 pt-3 text-white d-inline-block">
                            <h5 class="h5-responsive d-inline">निवेदकको विवरण</h5>

                        </div>
                        <div class="ml-auto align-self-center">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" id="self-applicant" class="custom-control-input">
                                <label class="custom-control-label" for="self-applicant">निवेदक संचालकनै हो ?</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group hide-on-old-entry">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="required">नाम</label>
                                    <input type="text" id="input-applicant-name" name="applicant_name" class="form-control unicode-font rounded-0 {{ invalid_class('applicant_name') }}" value="{{ old('applicant_name', $organization->applicant_name ?? '' ) }}" required>
                                    <x-invalid-feedback field="applicant_name"></x-invalid-feedback>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="required">फोन नं.</label>
                                    <input type="text" id="input-applicant-phone" name="applicant_phone" class="form-control rounded-0 {{ invalid_class('applicant_phone') }}" value="{{ old('applicant_phone', $organization->applicant_phone ?? '' ) }}" required>
                                    <x-invalid-feedback field="applicant_phone"></x-invalid-feedback>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="required">ठेगाना</label>
                                    <input type="text" id="input-applicant-address" name="applicant_address" class="form-control unicode-font rounded-0 {{ invalid_class('applicant_address') }}" value="{{ old('applicant_address', $organization->applicant_address ?? '' ) }}" required>
                                    <x-invalid-feedback field="applicant_address"></x-invalid-feedback>
                                </div>
                            </div>
                        </div>
                    </div>

                    @auth
                    <div class="form-row">
                        <div class="col-md-12 grey lighten-4 rounded p-4">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label>कागजातहरू *</label>
                                </div>
                                @foreach($organization->documents as $document)
                                <div class="col-md-12 document-preview-container">
                                    <div class="d-flex my-3 white border p-2">
                                        @if($document->isImage())
                                        <img src="{{ $document->url }}" alt="{{ $document->nicename }}" style="width: 150px; height: 100px;">
                                        @else
                                        <div style="width: 150px;">
                                            @include('svg.file-icon')
                                        </div>
                                        @endif
                                        <div class="p-2 pl-3">
                                            <div class="font-roboto">{{ $document->nicename }}</div>
                                            <div class="my-2"></div>
                                            @if($document->isImage())
                                            <a class="btn btn-blue-grey font-roboto btn-md z-depth-0" href="{{ $document->url }}" target="_blank"><span class="mr-2"><i class="fa fa-eye fa-lg"></i></span>View</a>
                                            @endif
                                            <a class="btn btn-blue-grey font-roboto btn-md z-depth-0" href="{{ $document->url }}" target="_blank" download><span class="mr-2"><i class="fa fa-download fa-lg"></i></span>Download</a>
                                            <a class="delete-document-btn font-roboto btn btn-pink btn-md z-depth-0 " data-document-id="{{ $document->id }}" href="#"><span class="mr-2"><i class="far fa-trash-alt fa-lg"></i></span>Delete Permanently</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                <div class="col-md-12">
                                    <div class="grey lighten-5 p-3" style="border: 2px dashed #286099;">
                                        <div class="document-input-container border my-3 d-flex justify-content-between white p-3">
                                            <div>
                                                <input type="text" name="documents[][name]" class="form-control rounded-0 d-inline" list="document-names" placeholder="Document Name">
                                                <datalist id="document-names">
                                                    @foreach (config('constants.document.types') as $docType)
                                                    <option>{{ $docType }}</option>
                                                    @endforeach
                                                </datalist>
                                            </div>
                                            <div class="align-self-center">
                                                <input type="file" name="documents[][document]">
                                            </div>
                                            <button type="button" class="remove-document-btn btn btn-pink btn-md z-depth-0 my-0 font-roboto"><span class="mr-2"><i class="fa fa-times fa-lg"></i></span>Remove</button>
                                        </div>

                                        <div id="document-wrapper"></div>

                                        <button type="button" id="document-field-plus-btn" class="btn btn-success btn-md z-depth-0"><span><i class="fa fa-plus"></i></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endauth

                @auth
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group grey lighten-4 rounded p-4">
                            <label for="">आवेदन मिति *</label>
                            {{-- Removed readonly --}}
                            <input type="text" name="applied_date" id="input-applied-date" class="form-control nepali-date rounded-0 {{ invalid_class('applied_date') }}" value="{{ old('applied_date', $organization->applied_date) }}" autocomplete="off">
                            <small class="form-text text-muted lang-english">Do Not Type Manually. Use Date picker to fill date. @auth Make sure the data format is YYYY-MM-DD in English alphabets @endauth</small>
                            <x-invalid-feedback field="applied_date"></x-invalid-feedback>
                        </div>
                    </div>
                    @if($oldDataEntryMode)
                    <div class="col-md-4">
                        <div class="form-group grey lighten-4 rounded p-4">
                            <label for="input-registered-date" class="font-noto">दर्ता नम्बर</label>
                            <input type="text" name="org_reg_no" class="form-control rounded-0 {{ invalid_class('org_reg_no') }}" value="{{ old('org_reg_no', $organization->org_reg_no) }}" placeholder="दर्ता नं." autocomplete="off">
                            <x-invalid-feedback field="org_reg_no"></x-invalid-feedback>
                        </div>
                    </div>
                    @endif
                </div>
                @endauth

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

@push('scripts')
<script>
    $(function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);


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

        @auth
        var documentInput = `<div class="document-input-container border my-3 d-flex justify-content-between white p-3">
                                <div>
                                    <input type="text" name="documents[][name]" class="form-control rounded-0 d-inline" list="document-names" placeholder="Document Name">
                                    <datalist id="document-names">
                                        @foreach (config('constants.document.types') as $docType)
                                        <option>{{ $docType }}</option>
                                        @endforeach
                                    </datalist>
                                </div>
                                <div class="align-self-center">
                                    <input type="file" name="documents[][document]">
                                </div>
                                <button type="button" class="remove-document-btn btn btn-pink btn-md z-depth-0 my-0 font-roboto"><span class="mr-2"><i class="fa fa-times fa-lg"></i></span>Remove</button>
                            </div>`;

        $('#document-field-plus-btn').click(function() {
            $('#document-wrapper').append(documentInput);
        });

        $(document).on('click', '.remove-document-btn', function() {
            $(this).parent().remove();
        });
        @endauth

        $('.delete-document-btn').click(function(e) {
            e.preventDefault();
            var id = $(this).data('document-id');
            var parent = $(this).parents('.document-preview-container');
            console.log('Document ID: ' + id);

            if (confirm('Are you sure to delete?')) {
                $.ajax({
                    type: "DELETE"
                    , url: "{{ route('ajax.document.destroy') }}"
                    , data: {
                        id: id
                        , "_token": "{{ csrf_token() }}"
                    }
                    , dataType: "JSON"
                    , success: function(response) {
                        console.log('Document Deleted');
                        parent.remove();
                    }
                });
            } else {
                return false;
            }
        });

        // Do not allow to type manually in some readonly required fields
        $(".readonly").on('keydown paste', function(e) {
            e.preventDefault();
        });

        // Choose betweeen land units
        $('#checkbox-area-in-meter').change(function() {
            if (this.checked) {
                $('#area-in-kattha').hide();
                $('#area-in-meter').show();
            } else {
                $('#area-in-kattha').show();
                $('#area-in-meter').hide();
            }
        });


        // Auto form fill

        var propAddress = function() {
            let ward = $('#select-prop-ward').find(":selected").text();
            let municipality = $('#select-prop-municipality-id').find(":selected").text();
            return 'वडा नं. ' + ward + ', ' + municipality;
        }

        $('#self-house-owner').change(function() {
            if (this.checked) {
                // copy name, address, ward, phone
                $('#input-org-house-owner-name').val($('#input-prop-name').val());
                $('#input-org-house-owner-address').val(propAddress);
                // remove ward if unnecessary
                let ward = $('#select-prop-ward').find(":selected").text();
                $('#select-org-house-owner-ward > option[value=' + ward + ']').prop('selected', true);
                $('#input-org-house-owner-phone').val($('#input-prop-phone').val());
            }
        });

        $('#self-applicant').change(function() {
            if (this.checked) {
                // copy name, phone, address
                $('#input-applicant-name').val($('#input-prop-name').val());
                $('#input-applicant-phone').val($('#input-prop-phone').val());
                $('#input-applicant-address').val(propAddress);
            }
        });

        @if($oldDataEntryMode)
        // Delete .hide-on-old-entry from dom
        console.log('hiding old entry fields');
        $('.hide-on-old-entry').remove();
        @endif

    });

</script>
@include('layouts.partials.romanized-keyboard-scripts')
@endpush
