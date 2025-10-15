<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:properties,slug',
            'category' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'description' => 'nullable|string',
            'land_area' => 'nullable|integer|min:0',
            'type' => 'nullable|string|max:100',
            'price' => 'nullable|integer|min:0',
            'facilities' => 'nullable|array',
            'remaining_units' => 'nullable|integer|min:0',
            'status' => 'nullable|string|in:available,sold out',
            'featured_image' => 'nullable|file|mimetypes:image/jpeg,image/png,image/jpg,image/heic,image/heif|max:2048',
            'images.*' => 'nullable|file|mimetypes:image/jpeg,image/png,image/jpg,image/heic,image/heif|max:2048',
        ];
    }
}
