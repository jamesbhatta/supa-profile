<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RenewOrganizationRequest extends FormRequest
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
            'renewed_date' => 'required|date_format:Y-m-d',
            'renew_amount' => 'required|numeric',
            'renew_bill_no' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'renewed_date.required' => 'नवीकरण मिति आवाश्यक छ ।',
            'renewed_date.date_format' => 'नवीकरण मिति (YYYY-mm-dd) ढाँचा मेल खाँदैन ।',
            'renew_amount.required' => 'नवीकरण रकम आवाश्यक छ ।',
            'renew_bill_no.required' => 'बिल नम्बर आवाश्यक छ ।',

        ];
    }
}
