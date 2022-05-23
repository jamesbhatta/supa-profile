@extends('layouts.app')

@push('styles')
<style>
    #org-details-table th,
    #org-details-table td {
        padding: 0.75rem 1rem;
        /* font-weight: 600; */
        color: #343a40;
    }

</style>
@endpush

@section('content')
<div class="container">

    @include('alerts.all')

    <div class="card z-depth-0 border">
        <div class="card-body">
            @include('partials.org-options')
        </div>
    </div>

    <div class="my-4"></div>

    <div class="card z-depth-0 border">
        <div class="card-body">
            <div class="text-center mb-4">
                <h2 class="h2-reponsive font-weight-bold">व्यवसाय / फार्मको बिस्तृत विवरण</h2>
            </div>
            <div class="px-5">

                <table id="org-details-table" class="table table-bordered">
                    <thead>
                        <tr>
                            <td>दर्ता नम्बर</td>
                            <td>{{ $organization->org_reg_no }} @if($organization->isOldRegistration()) (पुरानो दर्ता) @endif</td>
                        </tr>
                        <tr>
                            <td>आवेदन मिति</td>
                            <td>{{ $organization->applied_date }}</td>
                        </tr>
                        <tr>
                            <td>सिफारिस मिति</td>
                            <td>{{ $organization->verified_date }}</td>
                        </tr>
                        <tr>
                            <td>दर्ता मिति</td>
                            <td>{{ $organization->registered_date }}</td>
                        </tr>
                        <tr>
                            <td>बन्द मिति</td>
                            <td>{{ $organization->closed_date }}</td>
                        </tr>
                        <tr>
                            <td>नवीकरण मिति</td>
                            <td>
                                {{ $organization->renewed_date }}
                                <div>
                                    @if ($organization->renew_amount)
                                    नवीकरण रकम: रु. {{ $organization->renew_amount }} /-
                                    @endif
                                    @if ($organization->renew_bill_no)
                                    बिल नम्बर {{ $organization->renew_bill_no }}
                                    @endif
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" class="font-weight-bold h5-responsive">व्यवसाय / फार्मको विवरण</td>
                        </tr>
                        <tr>
                            <td>नाम</td>
                            <td>{{ $organization->org_name }}</td>
                        </tr>
                        <tr>
                            <td>व्यवसायको प्रकृति</td>
                            <td>{{ $organization->org_type }}</td>
                        </tr>
                        <tr>
                            <td>ठेगाना</td>
                            <td>
                                {{ $organization->municipality->name }}, वार्ड- {{ $organization->ward->name }}, {{ $organization->district->name }}, {{ $organization->province->name }}
                            </td>
                        </tr>
                        <tr>
                            <td>बाटोको नाम</td>
                            <td>{{ $organization->org_road_name }}</td>
                        </tr>
                        <tr>
                            <td>घर नं</td>
                            <td>{{ $organization->org_house_no }}</td>
                        </tr>
                        <tr>
                            <td>फोन नं</td>
                            <td>{{ $organization->org_phone }}</td>
                        </tr>
                        <tr>
                            <td>इमेल</td>
                            <td>{{ $organization->org_email }}</td>
                        </tr>
                        <tr>
                            <td>कारोबार गर्ने वस्तु</td>
                            <td>{{ $organization->org_product_type }}</td>
                        </tr>
                        <tr>
                            <td>संचालन मिति</td>
                            <td>{{ $organization->org_established_nep_date }}</td>
                        </tr>
                        <tr>
                            <td>कुल पुँजी रु.</td>
                            <td>{{ $organization->org_total_capital }}</td>
                        </tr>
                        <tr>
                            <td>स्वामित्व</td>
                            <td>{{ $organization->org_ownership }}</td>
                        </tr>
                        <tr>
                            <td>मासिक भाडा रकम रु</td>
                            <td>{{ $organization->org_house_rent }}</td>
                        </tr>
                        <tr>
                            <td> कित्ता नं</td>
                            <td>{{ $organization->org_land_kitta_no }}</td>
                        </tr>
                        <tr>
                            <td> क्षेत्र</td>
                            <td>{{ $organization->org_region_type }}</td>
                        </tr>
                        <tr>
                            <td>क्षेत्रफल</td>
                            <td>{{ $organization->totalLandArea }}</td>
                        </tr>

                        {{-- Properiter details --}}
                        <tr>
                            <td colspan="2" class="font-weight-bold h5-responsive">मुख्य संचालक व्यक्तिको विवरण</td>
                        </tr>
                        <tr>
                            <td>नाम</td>
                            <td>{{ $organization->prop_name }}</td>
                        </tr>
                        <tr>
                            <td>ठेगाना</td>
                            <td>{{ $organization->municipality->name }}, वार्ड- {{ $organization->ward->name }}, {{ $organization->district->name }}, {{ $organization->province->name }}</td>
                        </tr>
                        <tr>
                            <td>फोन नं.</td>
                            <td>{{ $organization->prop_phone }}</td>
                        </tr>
                        <tr>
                            <td>नागरिकता नं.</td>
                            <td>{{ $organization->prop_citizenship_no }}</td>
                        </tr>
                        <tr>
                            <td>नागरिकता जारी जिल्ला</td>
                            <td>{{ $organization->prop_citizenship_district }}</td>
                        </tr>
                        <tr>
                            <td>नागरिकता जारी मिति</td>
                            <td>{{ $organization->prop_citizenship_issued_date }}</td>
                        </tr>
                        <tr>
                            <td>स्थान</td>
                            <td>{{ $organization->prop_road_name }}</td>
                        </tr>
                        <tr>
                            <td>घर नं.</td>
                            <td>{{ $organization->prop_house_no }}</td>
                        </tr>

                        {{-- Land or house owner details --}}
                        <tr>
                            <td colspan="2" class="font-weight-bold h5-responsive">जग्गाधनी / घरधनिको विवरण</td>
                        </tr>
                        <tr>
                            <td>घरधनिको नाम</td>
                            <td>{{ $organization->org_house_owner_name }}</td>
                        </tr>
                        <tr>
                            <td>घरधनिको ठेगाना</td>
                            <td>{{ $organization->org_house_owner_address }}</td>
                        </tr>
                        <tr>
                            <td>घरधनिको फोन नं.</td>
                            <td>{{ $organization->org_house_owner_phone }}</td>
                        </tr>

                        {{-- Applicant Details --}}
                        <tr>
                            <td colspan="2" class="font-weight-bold h5-responsive">निवेदकको विवरण</td>
                        </tr>
                        <tr>
                            <td>नाम</td>
                            <td>{{ $organization->applicant_name }}</td>
                        </tr>
                        <tr>
                            <td>फोन नं.</td>
                            <td>{{ $organization->applicant_phone }}</td>
                        </tr>
                        <tr>
                            <td>ठेगाना</td>
                            <td>{{ $organization->applicant_address }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="font-weight-bold h5-responsive">कागजात</td>
                        </tr>
                        <tr>
                            <td>कागजातहरू</td>
                            <td>
                                @forelse($organization->documents as $document)
                                <a class="d-block text-info font-roboto mb-2" href="{{ $document->url }}" target="_blank" {{ $document->isImage() ? '' : 'Download' }}>
                                    {{ $document->nicename }} <span class="ml-2"><i class="fa fa-link"></i></span>
                                </a>
                                @empty
                                <div class="text-danger">नभएको</div>
                                @endforelse
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="my-4"></div>

    <x-subsidiary-list :organization="$organization"></x-subsidiary-list>

    {{-- <div class="row">
        <div class="col-md-6 offset-3">
            <div class="card bg-theme-color z-depth-0">
                <div class="card-body text-center">
                    @if($organization->isChecked() && !$organization->isVerified())
                    @can('organization.verify')
                    <form id="form-verify" action="{{ route('organization.verify', $organization) }}" method="POST" class="form-inline d-inline-block">
                        @csrf
                        @method('put')
                        <input type="text" name="verified_date" id="input-verified-date" class="form-control nepali-date date-today rounded-0" value="{{ old('verified_date', $organization->verified_date) }}" placeholder="मिति" autocomplete="off" required>
                        <button type="submit" class="btn btn-primary">सिफारिस गर्नुहोस</button>
                    </form>
                    @endcan
                    @endif

                    @if($organization->isVerified() && !$organization->isRegistered())
                    @can('organization.register')
                    <form id="form-register" action="{{ route('organization.register', $organization) }}" method="POST" class="form-inline d-inline-block">
                        @csrf
                        @method('put')
                        <input type="text" name="registered_date" id="input-registered-date" class="form-control nepali-date rounded-0" value="{{ old('registered_date', $organization->registered_date) }}" placeholder="मिति" autocomplete="off" required>
                        <button type="submit" class="btn btn-primary">दर्ता गर्नुहोस</button>
                    </form>
                    @endcan
                    @endif

                    @if($organization->isRegistered() && !$organization->isclosed())
                    @can('organization.close')
                    <form id="form-close" action="{{ route('organization.close', $organization) }}" method="POST" class="form-inline d-inline-block">
                        @csrf
                        @method('put')
                        <input type="text" name="closed_date" id="input-closed-date" class="form-control form-control-lg nepali-date rounded-0" value="{{ old('closed_date', $organization->closed_date) }}" placeholder="मिति" autocomplete="off" required>
                        <button type="submit" class="btn btn-primary font-noto">बन्द गर्नुहोस</button>
                    </form>
                    @endcan
                    @endif

                </div>
            </div>

        </div>
    </div> --}}
</div>
@endsection
