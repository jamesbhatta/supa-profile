<?php

use App\Services\FiscalYearService;

if (!function_exists('setActive')) {
    /**
     * Check if the route is active or not
     *
     * @param  string  $key
     * @return string
     */
    function setActive($path, $active = 'active')
    {
        return Request::routeIs($path) ? $active : '';
    }
}

if (!function_exists('invalid_class')) {
    /**
     * Check for the existence of an error message and return a class name
     *
     * @param  string  $key
     * @return string
     */
    function invalid_class($key)
    {
        $errors = session()->get('errors') ?: new \Illuminate\Support\ViewErrorBag;
        return $errors->has($key) ? 'is-invalid' : '';
    }
}


if (!function_exists('invalid_feedback')) {
    /**
     * Check if the route is active or not
     *
     * @param  string  $key
     * @return string
     */
    function invalid_feedback($key)
    {
        $key = str_replace(['\'', '"'], '', $key);
        $errors = session()->get('errors') ?: new \Illuminate\Support\ViewErrorBag;
        if ($message = $errors->first($key)) {
            return '<?= <div class="invalid-feedback">' . $message . '</div>; ?';
        }
    }
}


function runningFiscalYear($key = null)
{
    $runningFiscalYear = app(FiscalYearService::class)->getRunning();

    return $key != null
        ? $runningFiscalYear->$key
        : $runningFiscalYear;
}


if (!function_exists('slashDateFormat')) {
    /**
     * Format the date to slash(/) format
     *
     * @param  mixed $date
     * @return void
     */
    function slashDateFormat($date)
    {
        return str_replace('-', '/', $date);
    }
}

if (!function_exists('copyCountText')) {
    function copyCountText($count)
    {
        switch ($count) {
            case 1:
                return 'प्रथम';
                break;
            case 2:
                return 'दोस्रो';
                break;
            case 3:
                return 'तेस्रो';
                break;
            case 4:
                return 'चौथो';
                break;
            case 5:
                return 'पाँचौं';
                break;
            default:
                return $count;
                break;
        }
    }
}

if (!function_exists('bs_to_ad')) {
    function bs_to_ad($npDate)
    {
        return \App\Helpers\BSDateHelper::BsToAd('-', $npDate);
    }
}

if (!function_exists('ad_to_bs')) {
    function ad_to_bs($enDate)
    {
        return \App\Helpers\BSDateHelper::AdToBsEn('-', $enDate);
    }
}

function field_types()
{
    return [
        'text' => 'Text',
        'textarea' => 'Textarea',
        'number' => 'Number',
    ];
}


function models()
{
    return [
        [
            'slug' => 'blogs',
            'fields' => [
                [
                    'label' => 'Title',
                    'name' => 'title',
                    'type' => 'text',
                    'rules' => 'required'
                ],
                [
                    'label' => 'Description',
                    'name' => 'description',
                    'type' => 'textarea',
                    'rules' => 'nullable'
                ],
                [
                    'label' => 'Price',
                    'name' => 'price',
                    'type' => 'text',
                    'rules' => 'nullable'
                ],
            ]
        ],

        [
            'slug' => 'subscriber',
            'fields' => [
                [
                    'label' => 'Name',
                    'name' => 'name',
                    'type' => 'text',
                    'rules' => 'required'
                ],
                [
                    'label' => 'Email',
                    'name' => 'email',
                    'type' => 'text',
                    'rules' => 'required|email'
                ],

            ]
        ],
        // table 2.1
        [
            'slug' => 'geographical_area',
            'fields' => [
                [
                    'label' => 'भौगोलिक क्षेत्र को नाम',
                    'name' => 'geographical_name',
                    'type' => 'text',
                    'rules' => 'required|min:5'
                ],
                [
                    'label' => 'क्षेत्रफल (वर्ग कि. मि.)',
                    'name' => 'geographical_area',
                    'type' => 'number',
                    'rules' => 'required'
                ],
                [
                    'label' => 'प्रतिशत',
                    'name' => 'geographical_percentage',
                    'type' => 'number',
                    'rules' => 'required'
                ],

            ]
        ],
        // table 2.2
        [
            'slug' => 'province_area',
            'fields' => [
                [
                    'label' => 'प्रदेशको नाम',
                    'name' => 'province_name',
                    'type' => 'text',
                    'rules' => 'required|min:5'
                ],
                [
                    'label' => 'क्षेत्रफल (वर्ग कि. मि.)',
                    'name' => 'province_area',
                    'type' => 'number',
                    'rules' => 'required'
                ],
                [
                    'label' => 'प्रतिशत',
                    'name' => 'province_percentage',
                    'type' => 'number',
                    'rules' => 'required'
                ],

            ]
        ],
        // table 2.3
        [
            'slug' => 'district_area',
            'fields' => [
                [
                    'label' => 'जिल्लाको नाम',
                    'name' => 'district_name',
                    'type' => 'text',
                    'rules' => 'required|min:5'
                ],
                [
                    'label' => 'क्षेत्रफल (वर्ग कि. मि.)',
                    'name' => 'district_area',
                    'type' => 'number',
                    'rules' => 'required'
                ],
                [
                    'label' => 'प्रतिशत',
                    'name' => 'district_percentage',
                    'type' => 'number',
                    'rules' => 'required'
                ],

            ]
        ],
        // table 2.5
        [
            'slug' => 'used_material',
            'fields' => [
                [
                    'label' => 'क्षेत्र',
                    'name' => 'sector_name',
                    'type' => 'text',
                    'rules' => 'required|min:5'
                ],
                [
                    'label' => 'नेपालको क्षेत्रफल',
                    'name' => 'district_area',
                    'type' => 'number',
                    'rules' => 'required'
                ],
                [
                    'label' => 'सुदूरपश्चिमको क्षेत्रफल  ',
                    'name' => 'district_percentage',
                    'type' => 'number',
                    'rules' => 'required'
                ],

            ]
        ],
        // table 2.7
        [
            'slug' => 'geographical_election_detail',
            'fields' => [
                [
                    'label' => 'भौगोलिक क्षेत्र',
                    'name' => 'sector_name',
                    'type' => 'text',
                    'rules' => 'required|min:5'
                ],
                [
                    'label' => 'प्रतिनिधि सभा',
                    'name' => 'representive_house',
                    'type' => 'text',
                    'rules' => 'required'
                ],
                [
                    'label' => 'प्रदेश सभा',
                    'name' => 'province_house',
                    'type' => 'text',
                    'rules' => 'required'
                ],
                [
                    'label' => 'प्रतिशत',
                    'name' => 'percentage',
                    'type' => 'number',
                    'rules' => 'required'
                ],

            ]
        ],
        // table 2.8
        [
            'slug' => 'district_election_detail',
            'fields' => [
                [
                    'label' => 'जिल्लाको नाम',
                    'name' => 'district_name',
                    'type' => 'text',
                    'rules' => 'required|min:5'
                ],
                [
                    'label' => 'प्रतिनिधि सभा',
                    'name' => 'representive_house',
                    'type' => 'text',
                    'rules' => 'required'
                ],
                [
                    'label' => 'प्रदेश सभा',
                    'name' => 'province_house',
                    'type' => 'text',
                    'rules' => 'required'
                ],

            ]
        ],
        // table 2.9
        [
            'slug' => 'namawali',
            'fields' => [
                [
                    'label' => 'प्रदेश प्रमुख',
                    'name' => 'district_name',
                    'type' => 'text',
                    'rules' => 'required|min:5'
                ],
                [
                    'label' => 'देखी',
                    'name' => 'from',
                    'type' => 'text',
                    'rules' => 'required'
                ],
                [
                    'label' => 'सम्म',
                    'name' => 'to',
                    'type' => 'text',
                    'rules' => 'required'
                ],


            ]
        ],
        // table 2.10
        [
            'slug' => 'first_mantriparisadh',
            'fields' => [
                [
                    'label' => 'नाम थार',
                    'name' => 'name',
                    'type' => 'text',
                    'rules' => 'required|min:5'
                ],
                [
                    'label' => 'मन्त्रालय',
                    'name' => 'mantralai',
                    'type' => 'text',
                    'rules' => 'required'
                ],
                [
                    'label' => 'दल',
                    'name' => 'dal',
                    'type' => 'text',
                    'rules' => 'required'
                ],


            ]
        ], // table 2.11
        [
            'slug' => 'current_mantriparisadh',
            'fields' => [
                [
                    'label' => 'नाम थार',
                    'name' => 'name',
                    'type' => 'text',
                    'rules' => 'required|min:5'
                ],
                [
                    'label' => 'पद',
                    'name' => 'position',
                    'type' => 'text',
                    'rules' => 'required|min:5'
                ],
                [
                    'label' => 'मन्त्रालय',
                    'name' => 'mantralai',
                    'type' => 'text',
                    'rules' => 'required'
                ],
                [
                    'label' => 'दल',
                    'name' => 'dal',
                    'type' => 'text',
                    'rules' => 'required'
                ],


            ]
        ], // table 2.12
        [
            'slug' => 'pardesh_namawali',
            'fields' => [
                [
                    'label' => 'नाम थार',
                    'name' => 'name',
                    'type' => 'text',
                    'rules' => 'required|min:5'
                ],
                [
                    'label' => 'निर्वाचन क्षेत्र',
                    'name' => 'election_area',
                    'type' => 'text',
                    'rules' => 'required|min:5'
                ],
                [
                    'label' => 'राजनीतिक दल',
                    'name' => 'politic_dal',
                    'type' => 'text',
                    'rules' => 'required'
                ],


            ]
        ], // table 3.1
        [
            'slug' => 'geographical_population_2068',
            'fields' => [
                [
                    'label' => 'क्षेत्र',
                    'name' => 'name',
                    'type' => 'text',
                    'rules' => 'required|min:5'
                ],
                [
                    'label' => 'जनसंख्या',
                    'name' => 'election_area',
                    'type' => 'text',
                    'rules' => 'required|min:5'
                ],
                [
                    'label' => 'क्षेत्रफल',
                    'name' => 'politic_dal',
                    'type' => 'text',
                    'rules' => 'required'
                ],
                [
                    'label' => 'जन्घनत्व',
                    'name' => 'politic_dal',
                    'type' => 'text',
                    'rules' => 'required'
                ],


            ]
        ]
    ];
}
