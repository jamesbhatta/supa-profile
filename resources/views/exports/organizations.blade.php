<table>
    <thead>
        <tr>
            <td>दर्ता नम्बर</td>
            <th>व्यवसायको नाम</th>
            <th>व्यवसायको प्रकृति</th>
            <th>ठेगाना</th>
            <th>बाटोको नाम</th>
            <th>घर नं</th>
            <th>फोन नं </th>
            <td>इमेल</td>
            <td>कारोबार गर्ने वस्तु</td>
            <td>संचालन मिति</td>
            <td>कुल पुँजी रु.</td>
            <td>स्वामित्व</td>
            <td>मासिक भाडा रकम रु</td>
            <td> कित्ता नं</td>
            <td> क्षेत्र</td>
            <td>क्षेत्रफल</td>

            <td>व्यवसायीको नाम</td>
            <td>व्यवसायीको ठेगाना</td>
            <td>फोन नं.</td>
            <td>नागरिकता नं.</td>
            <td>नागरिकता जारी जिल्ला</td>
            <td>नागरिकता जारी मिति</td>
            <td>स्थान</td>
            <td>घर नं.</td>
            <td>घरधनिको नाम</td>
            <td>घरधनिको ठेगाना</td>
            <td>घरधनिको फोन नं.</td>
        </tr>
    </thead>
    <tbody>
        @foreach($organizations as $organization)
        <tr>
            <td>{{ $organization->org_reg_no }} @if($organization->isOldRegistration()) (पुरानो दर्ता) @endif</td>
            <td>{{ $organization->org_name }}</td>
            <td>{{ $organization->org_type }}</td>
            <td>{{ $organization->municipality->name }}, वार्ड- {{ $organization->ward->name }}, {{ $organization->district->name }}, {{ $organization->province->name }}</td>
            <td>{{ $organization->org_road_name }}</td>
            <td>{{ $organization->org_house_no }}</td>
            <td>{{ $organization->org_phone }}</td>
            <td>{{ $organization->org_email }}</td>
            <td>{{ $organization->org_product_type }}</td>
            <td>{{ $organization->org_established_nep_date }}</td>
            <td>{{ $organization->org_total_capital }}</td>
            <td>{{ $organization->org_ownership }}</td>
            <td>{{ $organization->org_house_rent }}</td>
            <td>{{ $organization->org_land_kitta_no }}</td>
            <td>{{ $organization->org_region_type }}</td>
            <td>{{ $organization->totalLandArea }}</td>

            <td>{{ $organization->prop_name }}</td>
            <td>{{ $organization->municipality->name }}, वार्ड- {{ $organization->ward->name }}, {{ $organization->district->name }}, {{ $organization->province->name }}</td>
            <td>{{ $organization->prop_phone }}</td>
            <td>{{ $organization->prop_citizenship_no }}</td>
            <td>{{ $organization->prop_citizenship_district }}</td>
            <td>{{ $organization->prop_citizenship_issued_date }}</td>
            <td>{{ $organization->prop_road_name }}</td>
            <td>{{ $organization->prop_house_no }}</td>
            <td>{{ $organization->org_house_owner_name }}</td>
            <td>{{ $organization->org_house_owner_address }}</td>
            <td>{{ $organization->org_house_owner_phone }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
