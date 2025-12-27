<?php

namespace App\Http\Requests\Admin\Portfolio\Project;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules['hero_image'] = ['nullable', 'image', 'mimes:jpg,png,webp', 'max:20480'];

        $rules['sort'] = ['required', 'integer'];
        $rules['active'] = ['required', 'boolean'];

        $rules['current_files'] = ['nullable', 'array'];
        $rules['current_files.*.name'] = ['nullable', 'string', 'max:255'];

        $rules['new_files'] = ['nullable', 'array'];
        $rules['new_files.*.name'] = ['nullable', 'string', 'max:255', 'required_with:files.*.file'];
        $rules['new_files.*.file'] = ['nullable', 'file', 'required_with:files.*.name'];

        foreach (supported_languages_keys() as $locale) {
            $rules['title'] = ['required', 'array'];
            $rules['title.' . $locale] = ['required', 'string', 'max:255'];

            $rules['short_description'] = ['required', 'array'];
            $rules['short_description.' . $locale] = ['required', 'string'];

            $rules['description'] = ['required', 'array'];
            $rules['description.' . $locale] = ['required', 'string'];

            $rules['location'] = ['required', 'array'];
            $rules['location.' . $locale] = ['required', 'string', 'max:255'];

            $rules['tags'] = ['required', 'array'];
            $rules['tags.' . $locale . '.*'] = ['required', 'string', 'max:255'];

            $rules['seo_title'] = ['nullable', 'array'];
            $rules['seo_title.' . $locale] = ['nullable', 'string', 'max:255'];
            $rules['seo_description'] = ['nullable', 'array'];
            $rules['seo_description.' . $locale] = ['nullable', 'string', 'max:255'];
            $rules['seo_keywords'] = ['nullable', 'array'];
            $rules['seo_keywords.' . $locale] = ['nullable', 'string', 'max:255'];
        }

        return $rules;
    }
}
