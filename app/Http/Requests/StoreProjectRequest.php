<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:properties,slug',
            'category' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'client_name' => 'nullable|string|max:255',
            'featured_image' => 'nullable|file|mimetypes:image/jpeg,image/png,image/jpg,image/heic,image/heif|max:2048',
            'images.*' => 'nullable|file|mimetypes:image/jpeg,image/png,image/jpg,image/heic,image/heif|max:2048',
        ];
    }
}
