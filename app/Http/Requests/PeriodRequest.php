<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeriodRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required','string','max:50'],
            'start_date' => ['nullable','date'],
            'end_date' => ['nullable','date','after_or_equal:start_date'],
            'is_active' => ['sometimes','boolean'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_active' => (bool) $this->input('is_active', false),
        ]);
    }
}
