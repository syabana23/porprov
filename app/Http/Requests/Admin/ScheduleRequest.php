<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ScheduleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();
        return $user && ($user->isSuperAdmin() || $user->isAdmin());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sport_id' => ['required', 'exists:sports,id'],
            'venue_id' => ['nullable', 'exists:venues,id'],
            'category' => ['nullable', 'string', 'max:255'],
            'match_title' => ['required', 'string', 'max:255'],
            'contingent_id' => ['nullable', 'exists:contingents,id'],
            'opponent_contingent_id' => ['nullable', 'exists:contingents,id', 'different:contingent_id'],
            'match_date' => ['required', 'date'],
            'start_time' => ['nullable', 'date_format:H:i'],
            'end_time' => ['nullable', 'date_format:H:i', 'after_or_equal:start_time'],
            'status' => ['required', Rule::in(['upcoming', 'ongoing', 'finished'])],
            'notes' => ['nullable', 'string'],
        ];
    }
}
