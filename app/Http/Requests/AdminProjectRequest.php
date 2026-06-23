<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $project = $this->route('project');

        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'alpha_dash', 'max:255', Rule::unique('projects', 'slug')->ignore($project)],
            'client_name' => ['nullable', 'string', 'max:255'],
            'year' => ['required', 'integer', 'min:1900', 'max:2100'],
            'tagline' => ['nullable', 'string', 'max:255'],
            'timeline' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'challenge' => ['nullable', 'string'],
            'solution' => ['nullable', 'string'],
            'thumbnail' => [
            'nullable',
            'image',
            'mimes:jpg,jpeg,png,webp',
            'max:51200',
             ],

            'hero_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:51200',
            ],

            'gallery_images' => [
                'nullable',
                'array',
            ],

            'gallery_images.*' => [
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:51200',
            ],
            'services_used_text' => ['nullable', 'string'],
            'service_ids' => ['required', 'array', 'min:1'],
            'service_ids.*' => ['integer', 'exists:services,id'],
            'sector_ids' => ['required', 'array', 'min:1'],
            'sector_ids.*' => ['integer', 'exists:industry_sectors,id'],
            'results' => ['nullable', 'array'],
            'results.*.metric' => ['nullable', 'string', 'max:50'],
            'results.*.label' => ['nullable', 'string', 'max:255'],
            'results.*.period' => ['nullable', 'string', 'max:255'],
            'results.*.direction' => ['nullable', Rule::in(['increase', 'decrease'])],
            'is_featured' => ['nullable', 'boolean'],
            'order' => ['nullable', 'integer', 'min:0'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:255'],
            'published_at' => ['nullable', 'date'],
        ];
    }
}
