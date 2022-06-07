<?php
return [
    'nep_gov' => [
        'logo' => 'assets/img/nep-gov-logo.png',
        'logo_sm' => 'assets/img/nep-gov-logo-sm.png'
    ],

    'organization' => [
        'per_page' => 50,
    ],

    'online_application' => [
        'per_page' => 50,
    ],

    'user' => [
        'per_page' => 20,
    ],

    'document' => [
        'dir_name' =>  'documents',
        'types' => [
            'नागरिकताको प्रतिलिपि',
            'संचालकको फोटो',
            'घर बहाल सम्झौता',
            'घरजग्गा कर रसिद',
            'निवेदन पत्र',
            'व्यवसाय प्रमाणपत्रको प्रतिलिपी'
        ]
    ],

    'letterhead' => [
        'ward' => [],

        'municipality' => [
            // path relative to public directory
            'logo_url' => 'assets/img/nep-gov-logo-sm.png',

            // 'name' => 'घोडाघोडी नगरपालिका',
            // 'tagline' => 'नगर कार्यपालिकाको कार्यालय',
            // 'address_line_one' => 'सुखड, कैलाली',
            // 'address_line_two' => 'सुदुरपश्चिम प्रदेश, नेपाल',
            // 'phone' => '०९१-४०३०६४',
            // 'email' => 'ghodaghodimun@gmail.com',
            // 'website' => 'www.ghodaghodimun.gov.np',
        ]
    ],

    // Some Data is going to be replaced by letter head
    'letter' => [
        'municipality_name' => 'घोडाघोडी नगरपालिका',
        'address_line_one' => 'सुखड्, कैलाली',
        'address_line_two' => 'सुदुरपश्चिम प्रदेश, नेपाल',
        'phone' => '०९१–४०३०६४',
        'email' => 'ghodaghodimun@gmail.com',
        'website' => 'www.ghodaghodimun.gov.np',
    ],

    'info_card_themes' => [
        'blue-color',
        'green-color',
        'indigo-color',
        'orange-color',
        'yellow-color',
        'teal-color'
    ]
];
