<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
        $id = $this->route('project')->id ?? null;

        return [
            'title' => 'sometimes|string|max:255',
            'slug' => 'nullable|string|unique:projects,slug,' . $id,
            'category' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'client_name' => 'nullable|string|max:255',
            'featured_image' => 'nullable|file|mimetypes:image/jpeg,image/png,image/jpg,image/heic,image/heif|max:2048',

            // Struktur nested images seperti store
            'images' => 'nullable|array',
            'images.*' => 'nullable|array',
            'images.*.*' => 'nullable|file|mimetypes:image/jpeg,image/png,image/jpg,image/heic,image/heif|max:2048',
        ];
    }
}
