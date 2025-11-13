<?php

namespace App\Http\Requests\Admin\Learning\Article;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        return [
            'learning_category_id' => ['required', 'exists:learning_categories,id'],

            'title' => ['required', 'string','max:255'],
            'description' => ['required', 'string'],

            'image' => ['nullable', 'image', 'mimes:jpg,png,webp', 'max:20480'],

            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:255'],
            'seo_keywords' => ['nullable', 'string', 'max:255'],

            'sort' => ['required', 'integer'],
            'active' => ['nullable', 'boolean'],
            'accent' => ['nullable', 'boolean'],
        ];
    }
}
