<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()?->hasAnyRole(['superadmin', 'admin']) ?? false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'period_id' => ['required','exists:periods,id'],
        'type' => ['required','in:FUNCTIONARY_MEETING,PROGRAM_MEETING'],
        'program_id' => ['nullable','exists:programs,id'],
        'title' => ['required','string','max:255'],
        'start_at' => ['required','date'],
        'end_at' => ['nullable','date','after_or_equal:start_at'],
        'only_core' => ['sometimes','boolean'],
        'location' => ['nullable','string','max:255'],
        'attendance_mode' => ['nullable','in:MANUAL,QR'],
        ];
    }
    protected function prepareForValidation(): void
    {
        $this->merge([
            'only_core' => (bool) $this->input('only_core', false),
            'attendance_mode' => $this->input('attendance_mode', 'MANUAL'),
        ]);
    }
}
