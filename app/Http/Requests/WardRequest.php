<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WardRequest extends FormRequest
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
            'name.required' => 'वडाको नाम आवाश्यक छ',
            'name_en.required' => 'वडाको नाम (in english) आवाश्यक छ',
        ];
    }
}
