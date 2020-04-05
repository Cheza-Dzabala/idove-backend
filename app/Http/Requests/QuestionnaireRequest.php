<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionnaireRequest extends FormRequest
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
            "questionnaire_id" => "required",
            "number_of_questions" => "required",
            "responses" => "required|array",
            "responses.*.question_id" => "required",
            "responses.*.response" => "required",
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (count($this->input('responses')) !== $this->input('number_of_questions')) {
                $validator->errors()->add('responses', 'Please ensure that you have responded to all questions');
            }
        });
    }
}
