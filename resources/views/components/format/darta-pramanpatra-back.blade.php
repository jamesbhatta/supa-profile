<div class="p-5">
    <div class="text-center font-noto">
        <h3 class="d-inline-block border-bottom font-weight-bolder">
            व्यवसाय नवीकरण प्रमाण-पत्र
        </h3>
    </div>
    <div class="my-3"></div>
    <div>
        <table class="table table-bordered">
            <thead class="font-noto">
                <tr>
                    <th>आर्थिक वर्ष</th>
                    <th>नविकरण मिति</th>
                    <th>अन्तिम मिति</th>
                    <th>रसिद नं.</th>
                    <th>प्रमाणित गर्नेको सहि छाप</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>{{ runningFiscalYear('name') }}</th>
                    <th>{{ $organization->renewed_date }}</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                @for($rowCount = 2; $rowCount < 20; $rowCount++) <tr style="height: 50px;">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    </tr>
                    @endfor
            </tbody>
        </table>
    </div>
    <div>
        <div> नोट :</div>
        <div>१) यो प्रमाण-पत्र देखिने गरि राख्नु पर्ने छ ।</div>
        <div>२) नियम विपरित कुनै कार्य गराएको पाइएमा यो प्रमाण-पत्र खारेज गरिनेछ ।</div>
        <div>३ं) यो प्रमाण पत्र प्रत्येक वर्षको अषाढ मसान्तमा नविकरण गर्नु पर्नेछ ।</div>
    </div>

</div>
