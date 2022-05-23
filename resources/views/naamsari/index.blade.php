@extends('layouts.app')

@section('content')
<div class="mb-3 d-flex">
    <div>
        <h4>व्यवसाय नामसारी फारम</h4>
        <div>व्यवसायको नाम: {{ $organization->org_name }}</div>
    </div>
    <div class="ml-auto">
        <a class="btn btn-primary btn-sm z-depth-0" href="{{ route('organization.show', $organization) }}">Back</a>
    </div>
</div>

<div class="card z-depth-0">
    <div class="card-body">
        @include('alerts.all')
        <div class="py-2 d-inline-block">
            <h5 class="h5-responsive">नया संचालकको विवरण</h5>
        </div>
        <form action="{{ route('naamsari.store', $organization) }}" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <div class=" form-group">
                            <label for="" class="required">नया संचालकको नाम</label>
                            <input type="text" id="input-prop-name" name="prop_name" class="form-control unicode-font rounded-0 {{ invalid_class('prop_name') }}" value="{{ old('prop_name') }}" required>
                            <x-invalid-feedback field="prop_name"></x-invalid-feedback>
                        </div>
                    </div>
                    <div class="col-md-4 hide-on-old-entry">
                        <div class="form-group">
                            <label for="" class="required">फोन नं.</label>
                            <input type="text" id="input-prop-phone" name="prop_phone" class="form-control rounded-0 {{ invalid_class('prop_phone') }}" value="{{ old('prop_phone') }}" required>
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
                            <input type="text" id="input-prop-citizenship-no" name="prop_citizenship_no" class="form-control rounded-0 {{ invalid_class('prop_citizenship_no') }}" value="{{ old('prop_citizenship_no') }}" required>
                            <x-invalid-feedback field="prop_citizenship_no"></x-invalid-feedback>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">नागरिकता जारी जिल्ला</label>
                            <select name="prop_citizenship_district" id="select-prop-citizenship-district" class="custom-select rounded-0 {{ invalid_class('prop_citizenship_district') }}" required>
                                <option value="">जिल्ला छान्नुहोस्</option>
                                @foreach ($districts as $district)
                                <option value="{{ $district->name }}" @if(old('prop_citizenship_district')==$district->name) selected @endif>{{ $district->name }}</option>
                                @endforeach
                            </select>
                            <x-invalid-feedback field="prop_citizenship_district"></x-invalid-feedback>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">नागरिकता जारी मिति</label>
                            <input type="text" name="prop_citizenship_issued_date" class="form-control rounded-0 {{ invalid_class('prop_citizenship_issued_date') }}" value="{{ old('prop_citizenship_issued_date') }}" required>
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
                            <input type="text" name="prop_road_name" class="form-control unicode-font rounded-0 {{ invalid_class('prop_road_name') }}" value="{{ old('prop_road_name') }}" required>
                            <x-invalid-feedback field="prop_road_name"></x-invalid-feedback>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="">घर नं.</label>
                            <input type="text" name="prop_house_no" class="form-control rounded-0 {{ invalid_class('prop_house_no') }}" value="{{ old('prop_house_no') }}">
                            <x-invalid-feedback field="prop_house_no"></x-invalid-feedback>
                        </div>
                    </div>
                </div>
            </div>

            <div classp hide-on-old-entry="form-group">
                <button class="btn btn-indigo z-depth-0"><i class="fa fa-save fa-lg mr-2"></i>सुनिस्चित गर्नुहोस </button>
            </div>
        </form>

    </div>
</div>
@endsection

@push('scripts')
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
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
    })();
    </script>
@endpush
