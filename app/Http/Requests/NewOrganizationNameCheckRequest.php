<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewOrganizationNameCheckRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'org_name' => 'required|unique:organizations,org_name'
        ];
    }

    public function messages()
    {
        return [
            'org_name.required' => 'कृपया व्यवसायको नाम टाइप गर्नुहोस् ।',
            'org_name.unique' => 'यो नाम दर्ताका लागि उपलब्ध छैन ।'
        ];
    }
}
