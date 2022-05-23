<div class="p-5">
    <x-municipality-letterhead></x-municipality-letterhead>
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
        विषय :- व्यवसायको कारोवार परिवर्तन सिफारिस सम्बन्धमा।
    </div>

    <p>
        <div>श्री करदाता सेवा कार्यालय</div>
        <div>लम्की, कैलाली</div>
    </p>

    <div class="my-5"></div>

    <p class="text-justify">
        प्रस्तुत विषयमा यस {{ $organization->municipality->name }} वडा नं. {{ $organization->ward->name}} बस्ने श्री {{ $organization->prop_name }}ले मिति {{ slashDateFormat($karobarParibartan->date_np) }} गतेका दिन दिनुभएको निवेदन अनुसार निजको नाममा दर्ता भई संचालनमा रहेको स्थाई लेखा न. ........ भएको {{ $organization->org_name }}को 
        करोवारबाट नियमानुषर {{ $karobarParibartan->old_org_type }}को बिक्रि हटाई {{ $karobarParibartan->new_org_type }} मात्र गरिदिनहुन सिफारिस साथ अनुरोध छ।  
    </p>

</div>
