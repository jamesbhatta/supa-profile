<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubsidiaryRequest extends FormRequest
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
            // 'organization_id' => ['required'],
            'name' => ['required'],
            'org_product_type' => ['required'],
            'ward_id'=> ['required'],
            'address' => ['required'],
            'start_date' => ['required'],
            'capital' => ['required'],
        ];
    }
}
