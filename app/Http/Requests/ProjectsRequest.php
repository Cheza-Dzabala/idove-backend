<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectsRequest extends FormRequest
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
            'category_id' => 'required|integer',
            'description' => 'required',
            'short_summary' => 'required',
            'country' => 'required',
            'start_date' => 'required|date',
            'tags' => 'required|array'
        ];
    }
}
