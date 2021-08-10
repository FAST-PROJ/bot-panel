<?php

namespace App\Http\Requests;

class ConfigRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'long_app_name.required' => 'Application name is required.',
            'long_app_name.max' => 'Name must be up to 30 characters.',
            'path_image_login.image' => 'Select an image.',
            'favicon.image' => 'Select an image.',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'long_app_name' => 'required|max:30',
            'path_image_login' => 'image|mimes:jpeg,png,jpg,gif,svg,ico|max:2048',
            'favicon' => 'image|mimes:jpeg,png,jpg,gif,svg,ico|max:2048',
        ];
    }
}
