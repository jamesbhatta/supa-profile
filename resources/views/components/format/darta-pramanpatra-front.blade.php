@push('styles')
<style>
    .doc-border {
        padding: 2px;
        border: 7px solid;
        border-image: url('<?php echo asset('assets/img/border-image-kite.png') ?>') 33 / 7px / 0px repeat;
        border: 7px solid;
        border-image: url('<?php echo asset('assets/img/border-image-kite.png') ?>') 33 / 7px / 0px repeat;
    }

    .doc-border-line {
        border: 5px solid;
        border-image: url(https://yari-demos.prod.mdn.mozit.cloud/en-US/docs/Web/CSS/CSS_Background_and_Borders/Border-image_generator/border-image-5.png) 12 / 5px / 0px repeat;
    }

    .doc-border>div {
        content: '';
        border: 2px solid #000;
    }

    .border {
        border: 2px solid #000 !important;
    }

    table th,
    table td {
        font-size: 1em !important;
        border: 2px solid #000 !important;
    }

</style>
@endpush
<div class="doc-border">
    <div class="p-4 resizable-block">
        <x-municipality-letterhead></x-municipality-letterhead>

        <section>
            <div class="my-3"></div>
            <div class="d-flex">
                <div class="resizable">
                    <div>पत्र संख्या : {{ runningFiscalYear('name') }}</div>
                    <div>दर्ता नं. {{ $organization->org_reg_no }} </div>
                    <div>दर्ता मिति : {{ slashDateFormat($organization->registered_date) }} गते @if($organization->name_change_count) {{ copyCountText($organization->name_change_count) }} प्रतिलिपी @endif</div>
                </div>
                <div class="ml-auto text-right resizable">
                    @if($organization->name_change_count)
                    <div>मिति: <span class="nepali-date-today"></span></div>
                    @else
                    <div>मिति: <span class="nepali-date-today"></span></div>
                    @endif
                </div>
            </div>

            <div class="my-4"></div>

            <div class="my-4 text-center font-weight-bold">
                <span class="border font-18px py-2 px-3">
                    व्यवसाय दर्ता प्रमाण-पत्र
                </span>
            </div>

            <div class="d-flex">
                <div>
                    <div class="resizable">व्यवसाय फर्मको नाम : {{ $organization->org_name }} </div>
                    <div class="resizable">व्यवसायीको नाम : {{ $organization->prop_name }} </div>
                    <div class="resizable">लागत पूँजी : {{ $organization->org_total_capital }}/- </div>
                    <div class="resizable">घर जग्गा धनीको नाम, थरः {{ $organization->org_house_owner_name }}</div>
                    <div class="resizable">व्यवसाय रहेको स्थान : घो. न. पा. {{ $organization->ward->name }} </div>
                </div>
                <div class="ml-auto">
                    <div class="d-flex flex-column">
                        <div class="d-inline-flex ml-auto border text-center" style="width: 100px; height: 100px;">
                            <small class="align-self-center">निवेदकको फोटो</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex">
                <div>
                    <div class="resizable">व्यवसाय रहेको बाटोको नाम : {{ $organization->org_road_name }} </div>
                    <div class="resizable">व्यवसायको इमेल : {{ $organization->org_email }} </div>
                    <div class="resizable">फोन नं : {{ $organization->org_phone }} </div>
                </div>
                <div class="ml-auto">
                    <div class="align-self-end">
                        <div class="resizable">अन्य निकायमा दर्ता भएको छ भने : </div>
                        <div class="resizable">निकाय : ........ </div>
                        <div class="resizable">दर्ता नं. : .......... </div>
                    </div>
                </div>
            </div>

            <div class="my-4"></div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            <div class="resizable">क्र स.</div>
                        </th>
                        <th>
                            <div class="resizable">व्यवसायको प्रकार</div>
                        </th>
                        <th class="w-full">
                            <div class="resizable"> कारोबार गर्ने वस्तु</div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>१.</td>
                        <td>{{ $organization->org_ownership }}</td>
                        <td>
                            {{ $organization->org_product_type }}
                        </td>
                    </tr>
                </tbody>
            </table>

            <div>थप व्यवसायहरु:</div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            <div class="resizable">क्र स.</div>
                        </th>
                        <th>
                            <div class="resizable">व्यवसायको नाम</div>
                        </th>
                        <th>
                            <div class="resizable">कारोबार गर्ने वस्तु</div>
                        </th>
                        <th>
                            <div class="resizable">वडा नं.</div>
                        </th>
                        <th>
                            <div class="resizable">व्यवसाय संचालन हुने स्थान</div>
                        </th>
                        <th>
                            <div class="resizable">व्यवसाय संचालन मिति</div>
                        </th>
                        <th>
                            <div class="resizable">लागत पूजी</div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($organization->subsidiaries))
                    @foreach ($organization->subsidiaries as $subsidiary)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $subsidiary->name }}</td>
                        <td>{{ $subsidiary->org_product_type }}</td>
                        <td>{{ $subsidiary->ward->name }}</td>
                        <td>{{ $subsidiary->address }}</td>
                        <td>{{ $subsidiary->start_date }}</td>
                        <td>{{ $subsidiary->capital }}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td>
                            <div class="resizable" style="height: 42pt;"></div>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endif

                </tbody>
            </table>

            <p class="my-3 resizable">
                {{ settings('registration_certificate_note') }}
            </p>

            <div class="d-flex justify-content-between resizable">
                <div>................................</div>
                <div>................................</div>
                <div>................................</div>
            </div>

            <div class="my-1"></div>

            <div class="d-flex justify-content-between resizable">
                <div>
                    व्यवसायीको दस्तखत
                </div>
                <div>
                    तयार गर्नेको दस्तखत
                </div>
                <div>
                    प्रमाणित गर्नेको दस्तखत
                </div>
            </div>

            <div class="my-4"></div>
            <div class="mt-4 mb-3" style="border-bottom: 4px solid #000;"></div>
            <div class="text-center resizable">
                <div>{{ auth()->user()->settings->letter_municipality_name ?? settings('municipality_name') }}, {{ auth()->user()->settings->letter_address_line_two ?? config('constants.letter.address_line_two') }} फोन नं. : {{ auth()->user()->settings->letter_phone ?? settings('municipality_phone') }}</div>
                <div>इमेल : {{ auth()->user()->settings->letter_email ?? settings('municipality_email') }} वेभसाईट : {{ auth()->user()->settings->letter_website ?? settings('municipality_website') }}</div>
            </div>


        </section>
    </div>
</div>
