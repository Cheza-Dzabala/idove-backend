<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProfile extends FormRequest
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
            // 'user_id' => 'required|unique:profiles,user_id,' . Auth::user()->id,
            'summary' => 'sometimes|required|min:500',
            'year_joined' => 'sometimes|required|numeric',
            'area_of_expertise' => 'sometimes|required',
            'physical_address' => 'sometimes|required',
            'country_of_residence' => 'sometimes|required',
            'nationality' => 'sometimes|required',
            'linked_in' => 'sometimes|nullable|url',
            'twitter' => 'sometimes|nullable',
            'instagram' => 'sometimes|nullable',
            'facebook' => 'sometimes|nullable',
            'avatar' => 'sometimes|mimes:jpeg,png',
            'cover_image' => 'sometimes|mimes:jpeg,png'
        ];
    }
}
