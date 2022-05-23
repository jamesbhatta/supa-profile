<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Auth;

class OrganizationRequest extends FormRequest
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
        if (Auth::check() && $this->has('old_registration') && ($this->old_registration == true)) {
            // temporary for older data insertion
            return [
                'old_registration' => 'required',
                'org_reg_no' => 'required',

                'org_name' => 'required|unique:App\Organization,org_name,' . $this->id,
                // 'org_name' => 'required', Rule::unique('organizations')->ignore($this->organization),
                'org_province_id' => 'required|exists:provinces,id',
                'org_district_id' => 'required',
                'org_municipality_id' => 'required',
                'org_ward_id' => 'required',
                'org_road_name' => 'nullable',
                'org_house_no' => 'nullable|max:10',
                'org_phone' => 'nullable|max:15',
                'org_email' => 'nullable|email|max:50',
                'org_type' => 'nullable',
                'org_product_type' => 'nullable',
                'org_established_nep_date' => 'required|date',
                'org_total_capital' => 'nullable|max:20',
                'org_ownership' => 'nullable',

                'org_house_owner_name' => 'nullable',
                'org_house_owner_address' => 'nullable',
                'org_house_owner_ward' => 'nullable|max:20',
                'org_house_owner_phone' => 'nullable|max:15',
                'org_house_rent' => 'nullable|max:10',

                'org_land_kitta_no' => 'nullable|max:10',
                'org_region_type' => 'nullable',
                'org_land_area_in_meter' => 'sometimes',
                'org_land_bigha' => 'sometimes|required_without:org_land_area_in_meter',
                'org_land_kattha' => 'sometimes|required_without:org_land_area_in_meter',
                'org_land_dhur' => 'sometimes|required_without:org_land_area_in_meter',

                'prop_name' => 'required',
                'prop_phone' => 'nullable',
                'prop_citizenship_no' => 'nullable',
                'prop_citizenship_district' => 'nullable',
                'prop_citizenship_issued_date' => 'nullable',
                'prop_province_id' => 'nullable',
                'prop_district_id' => 'nullable',
                'prop_municipality_id' => 'nullable',
                'prop_ward_id' => 'nullable',
                'prop_road_name' => 'nullable',
                'prop_house_no' => 'nullable|max:10',

                'applicant_name' => 'nullable',
                'applicant_phone' => 'nullable|max:15',
                'applicant_address' => 'nullable',
            ];
        }

        return [
            'org_name' => 'required|unique:App\Organization,org_name,' . $this->id,
            // 'org_name' => 'required', Rule::unique('organizations')->ignore($this->organization),
            'org_province_id' => 'required|exists:provinces,id',
            'org_district_id' => 'required',
            'org_municipality_id' => 'required',
            'org_ward_id' => 'required',
            'org_road_name' => 'required',
            'org_house_no' => 'nullable|max:10',
            'org_phone' => 'required|max:15',
            'org_email' => 'nullable|email|max:50',
            'org_type' => 'required',
            'org_product_type' => 'required',
            'org_established_nep_date' => 'required|max:20',
            'org_total_capital' => 'required|max:20',
            'org_ownership' => 'required',

            'org_house_owner_name' => 'required',
            'org_house_owner_address' => 'required',
            'org_house_owner_ward' => 'required',
            'org_house_owner_phone' => 'required',
            'org_house_rent' => '',

            'org_land_kitta_no' => 'required|max:10',
            'org_region_type' => 'required',
            'org_land_area_in_meter' => 'sometimes',
            'org_land_bigha' => 'sometimes|required_without:org_land_area_in_meter',
            'org_land_kattha' => 'sometimes|required_without:org_land_area_in_meter',
            'org_land_dhur' => 'sometimes|required_without:org_land_area_in_meter',

            'prop_name' => 'required',
            'prop_phone' => 'required|max:15',
            'prop_citizenship_no' => 'required',
            'prop_citizenship_district' => 'nullable',
            'prop_citizenship_issued_date' => 'nullable|max:20',
            'prop_province_id' => 'required',
            'prop_district_id' => 'required',
            'prop_municipality_id' => 'required',
            'prop_ward_id' => 'required',
            'prop_road_name' => 'required',
            'prop_house_no' => 'nullable|max:10',

            'applicant_name' => 'required',
            'applicant_phone' => 'required|max:15',
            'applicant_address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'org_name.required' => 'व्यवसायको नाम आवश्यक छ ।',

            'org_region_type.required' => 'कृपया क्षेत्र चयन गर्नुहोस् |',
        ];
    }
}
