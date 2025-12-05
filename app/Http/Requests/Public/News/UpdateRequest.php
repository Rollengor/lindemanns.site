<?php

namespace App\Http\Requests\Public\News;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class UpdateRequest extends FormRequest
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
            'category_id' => [
                'nullable',

                function (string $attribute, mixed $value, \Closure $fail) {
                    if ($value === 'all') {
                        return;
                    }

                    $exists = DB::table('news_categories')
                        ->where('id', $value)
                        ->exists();

                    if (!$exists) {
                        $fail(__('validation.custom.category_id.invalid_category'));
                    }
                },
            ],
            'limit_articles' => ['nullable', 'integer', 'min:1'],
        ];
    }
}
