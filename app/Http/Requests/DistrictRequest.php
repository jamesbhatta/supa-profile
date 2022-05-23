<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DistrictRequest extends FormRequest
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
            'name' => 'required',
            'name_en' => 'required',
            'province_id' => 'required|exists:provinces,id'
        ];
    }

    /**
     *  Custom messages for validation
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'जिल्लाको नाम आवाश्यक छ',
            'name_en.required' => 'जिल्लाको नाम आवाश्यक छ',
            'province_id.required' => 'प्रदेशको नाम आवाश्यक छ',
            'province_id.exists' => 'चयन गरिएको प्रदेश अवैध छ'
        ];
    }
}
