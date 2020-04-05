<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends FormRequest
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
            'summary' => 'required',
            'date_joined' => 'required|date',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'country_of_residence' => 'required',
            'city_of_residence' => 'required',
            'nationality' => 'required',
            'pve_work' => 'required',
            'phone_number' => 'required',
            'area_of_expertise' => 'required',
            'physical_address' => 'required',
            'marital_status' => 'required',
            'avatar' => 'required|mimes:jpeg,png',
            'cover_image' => 'required|mimes:jpeg,png'
        ];
    }

    public function messages()
    {
        return [
            'user_id.unique' => 'You already have a profile registered'
        ];
    }
}
