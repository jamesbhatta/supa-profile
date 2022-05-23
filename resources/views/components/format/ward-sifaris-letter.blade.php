<div class="p-5">
    <x-ward-letterhead />

    <div class="my-4"></div>
    <div class="d-flex">
        <div>
            <p>पत्र संख्या : {{ runningFiscalYear('name') }}</p>
            <p>चलानी नं :</p>
        </div>
        <div class="ml-auto">
            <p>मिति : <span class="nepali-date-today"></span></p>
        </div>
    </div>

    <div class="my-5 text-center">
        विषय :- सिफारिस गरिएको बारे ।
    </div>

    <div>श्री {{ settings()->get('municipality_name') }}को कार्यालय </div>
    <div>{{ settings()->get('municipality_address_line_one') }} ।</div>

    <div class="my-5"></div>

    <div>
        <p class="text-justify">
        {{-- प्रस्तुत विषयमा यस {{ $organization->applicant_address }} यस बस्ने श्री {{ $organization->prop_name }}को मिति {{ slashDateFormat($organization->applied_date) }} गतेका दिन दिनुभएको निवेदन अनुसारको व्यहोरा बुझ्दा {{ $organization->org_house_owner_name }}को नाममा दर्ता श्रेस्त कायम भएको हाल {{ $organization->municipality->name }} नं.पा. वडा नं. {{ $organization->ward->name }} अन्र्तगत पर्ने कि.नं. {{ $organization->org_land_kitta_no }}, {{ $organization->totalLandArea }} क्षेत्रफल भएको जग्गामा @if( $organization->applicant_name == $organization->prop_name) नीज @endif {{ $organization->prop_name }}ले {{ $organization->org_name }} नामक व्यवसाय संचालन गर्नको लागि सम्बन्धित निकायमा सिफारिस गरि पाउ भनि यस कार्यालयमा दर्ताका लागि दिएको निवेदन बमोजिन उक्त व्यवसायलाई दर्ता गरिदिनहुनका लागि सिफारिस साथ अनुरोध छ । --}}
        प्रस्तुत विषयमा यस {{ $organization->municipality->name }} वडा नं. {{ $organization->ward->name}} बस्ने श्री {{ $organization->prop_name }}ले मिति {{ slashDateFormat($organization->applied_date) }} गतेका दिन दिनुभएको निवेदन अनुसार निजले श्री {{ $organization->org_house_owner_name }}को नाममा दर्ता श्रेस्ता कायम भएको {{ $organization->propMunicipality->name }} वडा नं. {{ $organization->propWard->name }} मा पर्ने कि.नं. {{ $organization->org_land_kitta_no }}, {{ $organization->totalLandArea }} क्षेत्रफल भएको जग्गामा निज {{ $organization->prop_name }}ले {{ $organization->org_name }} नामक व्यवसाय संचालन गर्नको लागि सम्बन्धित निकायमा दर्ताको लागि सिफारिस गरी पाउ भनी अनुराेध गर्नु भएकोले उक्त ब्यवसायलाई नियमानुसार दर्ता गरिदिनहुन सिफारिस साथ अनुरोध छ ।
        @if($organization->onlineApplication->token_number)
        निज {{ $organization->prop_name }}को टोकन न. {{ $organization->onlineApplication->token_number }}  रहेको छ। 
        @endif
    </p>
    </div>
</div>
