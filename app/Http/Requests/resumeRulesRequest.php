<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class resumeRulesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'profile_image' => 'nullable',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',

            'school_name.*' => 'required',
            'qualification.*' => 'required',
            'field_of_study.*' => 'nullable',
            'study_start_date.*' => 'required|date',
            'study_end_date.*' => 'required|date',

            'job_title.*' => 'required',
            'company_name.*' => 'required',
            'job_current.*' => 'boolean|nullable',
            'job_description.*' => 'nullable',
            'job_start_date.*' => 'required|date',
            'job_end_date.*' => 'nullable|date',
        ];
    }
}
