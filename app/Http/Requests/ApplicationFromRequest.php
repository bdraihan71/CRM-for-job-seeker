<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationFromRequest extends FormRequest
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
            'job_title' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'job_source' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'country_id' => 'required|integer',
            'detail' => 'nullable|string|max:5000',
            'name' => 'required|string|max:255',
            'social_link' => 'nullable|string|max:255',
            'note' => 'nullable|string|max:5000',
        ];
    }
}
