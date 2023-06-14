<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'first_name' => 'max:128',
            'last_name' => 'max:128',
            'gender' => 'max:128',
            'brithday' => 'date',
            'born' => 'max:128',
            'phone' => 'max:128',
            'address' => '',
            'education' => '',
            'job' => 'max:255',
            'hoby' => '',
            'note' => '',
            'iamge' => 'image|file|max:1024',
        ];
    }
}
