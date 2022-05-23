@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="my-4">
        <h4 class="h3-responsive">व्यवसाय थप</h4>
        <div class=text-muted">({{ $organization->org_name }})</div>
    </div>
    <div class="card z-depth-0">
        <div class="card-body">
            <form action="{{ $updateMode ? route('subsidiary.update', $subsidiary) : route('subsidiary.store', $organization) }}" method="POST">
                @csrf
                @if($updateMode)
                @method('put')
                @endif
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="name">व्यवसायको नाम </label>
                        <input type="text" name="name" id="name" class="form-control {{ invalid_class('name') }}" value="{{ old('name', $subsidiary->name) }}">
                        <x-invalid-feedback field="name"></x-invalid-feedback>
                    </div>

                    <div class="col-md-4 form-group">
                        <label for="" class="required">कारोबार गर्ने वस्तु</label>
                        <input type="text" name="org_product_type" class="form-control unicode-font rounded-0 {{ invalid_class('org_product_type') }}" value="{{ old('org_product_type', $subsidiary->org_product_type ) }}" >
                        <x-invalid-feedback field="org_product_type"></x-invalid-feedback>
                    </div>

                    <div class="col-md-4 form-group">
                        <label for="" class="required">वडा नं</label>
                        <select name="ward_id" id="select-org-ward" class="custom-select rounded-0 {{ invalid_class('ward_id') }}" >
                            <option value="">वडा छान्नुहोस्</option>

                            @auth
                            @if(auth()->user()->settings->form_ward_id && !$subsidiary->id)
                            @foreach ($wards as $ward)
                            @if(auth()->user()->settings->form_ward_id == $ward->id)
                            <option value="{{ $ward->id }}" selected>{{ $ward->name }}</option>
                            @endif
                            @endforeach
                            @endif
                            @endauth

                            @foreach ($wards as $ward)
                            <option value="{{ $ward->id }}" @if(old('ward_id', $subsidiary->ward_id) == $ward->id) selected @endif>{{ $ward->name }}</option>
                            @endforeach
                        </select>
                        <x-invalid-feedback field="ward_id"></x-invalid-feedback>
                    </div>

                    <div class="col-md-4 form-group">
                        <label for="" class="required">व्यवसाय संचालन हुने स्थान</label>
                        <input type="text" name="address" class="form-control unicode-font rounded-0 {{ invalid_class('address') }}" value="{{ old('address', $subsidiary->address ) }}" >
                        <x-invalid-feedback field="address"></x-invalid-feedback>
                    </div>

                    <div class="col-md-4 form-group hide-on-old-entry">
                        <label for="" class="required">लागत पूजी रु.</label>
                        <input type="text" name="capital" list="capital-amounts" class="form-control rounded-0 {{ invalid_class('capital') }}" value="{{ old('capital', $subsidiary->capital ?? '' ) }}" >
                        <x-invalid-feedback field="capital"></x-invalid-feedback>
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

                    <div class="col-md-4 form-group">
                        <label for="" class="required">संचालन मिति</label>
                        {{-- Temporaily removed readonly attribute --}}
                        <input type="text" name="start_date" id="input-org-established-nep-date" class="form-control nepali-date rounded-0 {{ invalid_class('start_date') }}" value="{{ old('start_date', $subsidiary->start_date ) }}" >
                        <small class="form-text text-muted lang-english">Use Date picker to fill date. @auth Make sure the data format is YYYY-MM-DD in English alphabets. @endif </small>
                        <x-invalid-feedback field="start_date"></x-invalid-feedback>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary z-depth-0 font-18px">पेश गर्नुहोस्</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection
