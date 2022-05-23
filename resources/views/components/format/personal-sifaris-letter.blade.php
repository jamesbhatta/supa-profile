<div class="p-5">
    <div class="my-5"></div>

    <div class="text-right">
        <span>मिति : <span class="nepali-date-today"></span></span>
    </div>

    <div class="my-5"></div>

    <div>श्रीमान प्रमुख प्रशासकीय अधिकृत ज्यू ,</div>
    <div>{{ settings()->get('municipality_name') }}</div>
    <div>{{ settings()->get('municipality_address_line_one') }}</div>
    <div>{{ settings()->get('municipality_address_line_two') }} ।</div>

    <div class="my-4 text-center">
        विषय : व्यवसाय दर्ता गर्न अनुमति पाउँ ।
    </div>

    <div>
        <p>मैले/हामीले वडा नं. {{ $organization->ward->name }}, {{ $organization->municipality->name }}, {{ $organization->district->name }}मा व्यवसाय दर्ता/नविकरण गर्नु परेकोले {{ auth()->user()->settings->letter_municipality_name ?? config('constants.letter.municipality_name') }}को व्यवसाय दर्ता ऐन,२०७७ को दफा ४ बमोजिम यो निवेदन दिएको छु/छौं । </p>
        <div>१. व्यवसायीको नाम, थर: {{ $organization->prop_name }}
            <div>
                <div>२. स्थायी ठेगाना : {{$organization->prop_road_name}} जिल्ला {{ $organization->district->name}} न.पा. {{ $organization->municipality->name }} {{ $organization->ward->name }}
                    <div>
                        <div>३. नागरिकता नं. : {{ $organization->prop_citizenship_no }} जारी जिल्ला र गते : {{ $organization->prop_citizenship_district }} ( {{ $organization->prop_citizenship_issued_date }} ) </div>
                        <div>४. फर्म÷कम्पनीको नाम : {{ $organization->org_name }} </div>
                        <div>५. व्यवसाय रहने स्थानको ठेगाना : </div>
                        <div class="pl-5">
                            <div>वडा नं. : {{ $organization->ward->name }} </div>
                            <div>फोन नं. : {{ $organization->org_phone }} </div>
                            <div>इमेल : {{ $organization->org_email }} </div>
                        </div>
                        <div>६. व्यवसायको प्रकृति : {{ $organization->org_type }} </div>
                        <div>७. कारोबार गर्ने वस्तु : {{ $organization->org_product_type }} </div>
                        <div>८. लगानी (रु.मा) : {{ $organization->org_total_capital }}/- </div>
                        <div>९. व्यवसाय वहालमा रहेको घरधनीको
                            <div class="pl-5">
                                <div>नाम, थर : {{ $organization->org_house_owner_name }} </div>
                                <div>ठेगाना : {{ $organization->org_house_owner_address }} </div>
                                <div>वडा नं. : {{ $organization->org_house_owner_ward }} </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-end">
                        <div>निवेदकको दस्तखत ........................</div>
                        <div class="mt-4">मिति: ........................</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
