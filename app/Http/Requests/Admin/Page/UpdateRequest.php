<?php

namespace App\Http\Requests\Admin\Page;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $page = $this->route('page');

        return [
            'title' => ['nullable', 'string', Rule::unique('pages')->ignore($page),'max:255'],

            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:255'],
            'seo_keywords' => ['nullable', 'string', 'max:255'],

            'image' => ['nullable', 'image', 'mimes:jpg,png,webp', 'max:20480'],

            'content_data' => ['nullable', 'array'],
        ];
    }
}
