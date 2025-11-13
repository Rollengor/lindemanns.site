<?php

namespace App\Http\Requests\Admin\PageSection;

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
        return [
            'title' => ['nullable', 'string', 'max:255'],
            'subtitle' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],

            'image' => ['nullable', 'image', 'mimes:jpg,png,webp', 'max:20480'],

            'content_data' => ['nullable', 'array'],

            'sort' => ['required', 'integer'],
            'active' => ['nullable', 'boolean'],
        ];
    }
}
