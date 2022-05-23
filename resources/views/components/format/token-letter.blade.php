<div class="p-5">
    <div class="text-right">
        <p>मिति : <span class="nepali-date-today"></span></p>
    </div>

    <div>श्रीमान वडा अध्यक्ष ज्यू ,</div>
    <div>{{ $organization->municipality->name }}, वडा नंं. {{ $organization->ward->name }} को कार्यालय</div>
    <div>{{ $organization->municipality->name }}, {{ $organization->district->name }}</div>

    <div class="my-4 text-center">
        विषय : व्यवसाय दर्ता गर्न अनुमति पाउँ ।
    </div>

    <div>
        <p>
            मैले/हामीले वडा नं. {{ $organization->ward->name }}, {{ $organization->municipality->name }}, {{ $organization->district->name }}मा व्यवसाय दर्ता गर्नु परेकोले {{ $organization->municipality->name }}को व्यवसाय दर्ता ऐन, २०७७ को दफा ४ बमोजिम यो निवेदन दिएको छु/छौं ।
        </p>

        <div>१. व्यवसायीको नाम, थर: {{ $organization->prop_name }}</div>
        <div>२. स्थायी ठेगाना : {{$organization->prop_road_name}}, जिल्ला: {{ $organization->propDistrict->name}}, न.पा.: {{ $organization->propMunicipality->name }}</div>
        <div>३. नागरिकता नं. : {{ $organization->prop_citizenship_no }} जारी जिल्ला र गते : {{ $organization->prop_citizenship_district }} ( {{ $organization->prop_citizenship_issued_date }} ) </div>
        <div>४. फर्म/कम्पनीको नाम : {{ $organization->org_name }} </div>
        <div>५. व्यवसाय रहने स्थानको ठेगाना : {{ $organization->org_road_name }}</div>
        <div class="pl-5">
            <div>वडा नं. : {{ $organization->ward->name }} </div>
            <div>फोन नं. : {{ $organization->org_phone }} </div>
            @if($organization->org_email)
            <div>इमेल : {{ $organization->org_email }} </div>
            @endif
        </div>
        <div>६. व्यवसायको प्रकृति : {{ $organization->org_type }} </div>
        <div>७. कारोबार गर्ने वस्तु : {{ $organization->org_product_type }} </div>
        <div>८. लगानी (रु.मा) : {{ $organization->org_total_capital }}/- </div>
        <div>९. व्यवसाय वहालमा रहेको घरधनी/जग्गाधनीको
            <div class="pl-5">
                <div>नाम, थर : {{ $organization->org_house_owner_name }} </div>
                <div>ठेगाना : {{ $organization->org_house_owner_address }} </div>
                <div>वडा नं. : {{ $organization->org_house_owner_ward }} </div>
            </div>
        </div>
        <div>१०. Token Number: {{ $onlineApplication->token_number }}</div>
    </div>

    <div class="d-flex flex-column align-items-end mt-3">
        <div class="ml-auto">
            <div>...........................</div>
            <div class="mt-2 text-center">निवेदकको दस्तखत</div>
        </div>
    </div>
</div>
