<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            // 'role' => 'required|exists:roles,name',
            'password' => 'required|string|min:8|confirmed',
            'municipality_id' => 'nullable|exists:municipalities,id',
            'ward_id' => 'nullable|required_with:is_ward_login|exists:wards,id',
        ];
    }
}
