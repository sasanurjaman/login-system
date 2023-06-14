<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
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
                'first_name' => 'max:255',
                'last_name' => 'max:255',
                'gender_name' => '',
                'brithday' => '',
                'born' => '',
                'phone' => 'max:30',
                'address' => '',
                'education' => '',
                'job' => '',
                'hoby' => '',
                'note' => 'max:255',
                'iamge' => 'iamge|file'
            ];
    }
}
