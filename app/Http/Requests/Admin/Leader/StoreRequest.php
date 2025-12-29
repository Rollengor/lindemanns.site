<?php

namespace App\Http\Requests\Admin\Leader;

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
        $rules['photo'] = ['required', 'image', 'mimes:jpg,png,webp', 'max:20480'];
        $rules['resume'] = ['required', 'file', 'max:20480'];

        $rules['sort'] = ['required', 'integer'];
        $rules['active'] = ['required', 'boolean'];

        foreach (supported_languages_keys() as $locale) {
            $rules['name'] = ['required', 'array'];
            $rules['name.' . $locale] = ['required', 'string', 'max:255'];

            $rules['position'] = ['required', 'array'];
            $rules['position.' . $locale] = ['required', 'string', 'max:255'];

            $rules['info'] = ['required', 'array'];
            $rules['info.' . $locale] = ['required', 'array'];
            $rules['info.' . $locale . '*.head'] = ['required', 'string', 'max:255'];
            $rules['info.' . $locale . '*.description'] = ['required', 'string', 'max:255'];
        }

        return $rules;
    }
}
