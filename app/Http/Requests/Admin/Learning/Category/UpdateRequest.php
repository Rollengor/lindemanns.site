<?php

namespace App\Http\Requests\Admin\Learning\Category;

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
        $learningCategory = $this->route('learningCategory');

        return [
            'title' => ['required', 'string', Rule::unique('learning_categories')->ignore($learningCategory),'max:255'],
            'slug' => ['nullable', 'string', Rule::unique('learning_categories')->ignore($learningCategory),'max:255'],

            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:255'],
            'seo_keywords' => ['nullable', 'string', 'max:255'],

            'sort' => ['required', 'integer'],
            'active' => ['nullable', 'boolean'],
        ];
    }
}
