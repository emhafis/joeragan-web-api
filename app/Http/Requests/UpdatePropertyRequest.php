<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
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
        $id = $this->route('property')->id ?? null;

        return [
            'name' => 'sometimes|string|max:255',
            'slug' => 'sometimes|string|max:255|unique:properties,slug,' . $id,
            'address' => 'sometimes|string|max:255',
            'category' => 'nullable|string|in:kosan,residence',
            'description' => 'nullable|string',
            'land_area' => 'nullable|integer',
            'type' => 'nullable|integer',
            'price' => 'nullable|integer',
            'facilities' => 'nullable|array',
            'remaining_units' => 'nullable|integer',
            'status' => 'nullable|string|in:available,unavailable',
            'featured_image' => 'nullable|file|mimetypes:image/jpeg,image/png,image/jpg,image/heic,image/heif|max:2048',
            'images.*' => 'nullable|file|mimetypes:image/jpeg,image/png,image/jpg,image/heic,image/heif|max:2048',
        ];
    }
}
