<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute must be accepted.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute may only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'date' => ':attribute मान्य मिति होइन।',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'The :attribute must be a valid email address.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => ':attribute :max वर्णभन्दा बढी हुनु हुँदैन। ',
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => ':attribute :max वर्णभन्दा बढी हुनु हुँदैन। ',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => ':attribute कम्तिमा :min वर्णको हुनुपर्छ।',
        'file' => ':attribute must be at least :min kilobytes.',
        'string' => ':attribute कम्तिमा :min वर्णको हुनुपर्छ।',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => ':attribute एउटा संख्या हुनुपर्छ',
    'password' => 'The password is incorrect.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => ':attribute आवाश्यक छ ।',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name' => 'नाम',
        'name_en' => 'नाम (in english)',
        'province_id' => 'प्रदेश',
        'district_id' => 'जिल्ला',
        'token_number' => 'टोकन नम्बर',
        'tokenNumber' => 'टोकन नम्बर',
        'org_reg_no' => 'organization register number',
        'post'=>'पद',
        'new_population'=>'नयाँ जनसंख्या',
        'old_population'=>'पुरानो जनसंख्या',
        'district'=>'जिल्लाको नाम',
        'dencity'=>'जनघनत्व',
        'census_house_number'=>'जनगणना घरसंख्या',
        'house_number'=>'घरपरिवार संख्या',
        'male'=>'पुरुष',
        'female'=>'महिला',
        'ratio'=>'लैंगिक अनुपात',
        'avg_family_size'=>'औषत परिवार आकार',
        'increase_rate'=>'वार्षिक वृद्धिदर',
        'percentage'=>'प्रतिशत',
        'npl_area'=>'नेपालको क्षेत्रफल',
        'sector'=>'क्षेत्र',
        'ministry'=>'मन्त्रालय',
        'team'=>'दल',
        'province_head'=>'प्रदेश प्रमुख',
        'from'=>'देखि',
        'to'=>'सम्म',
        'constituency'=>'निर्वाचन क्षेत्र',
        'political_parties'=>'हालको राजनीतिक दल',
        'population'=>'जनसङ्ख्या',
        'area'=>'क्षेत्रफल',
        'density'=>'जनघनत्व',
        'hindu'=>'हिन्दु संख्या',
        'baudha'=>'बौद्ध संख्या',
        'islam'=>'इश्लाम संख्या',
        'kirat'=>'किराँत संख्या',
        'christian'=>'क्रिश्चियन संख्या',
        'prakirty'=>'प्रकृति संख्या',
        'other'=>'अन्य',
        'municipality_id'=>'न.पा./गा.वि.स.',
        'family_num'=>'घरपरिवार संख्या',
        'male_num'=>'पुरुष',
        'female_num'=>'महिला',
        'municipality_name'=>'न.पा./गा.वि.स. को नाम',
        'male_number'=>'पुरुष',
        'female_number'=>'महिला',
        'avg_house_number'=>'औषत घरपरिवार सदस्य संख्या',
        'anupat'=>'लैगिंक अनुपात',
        'fml_edu_percentage'=>'महिला साक्षरता (प्रतिशत)',
        'ml_edu_percentage'=>'पुरुष साक्षरता',
        'language'=>'भाषा',
        'province'=>'प्रदेशको नाम',
    ],

];
