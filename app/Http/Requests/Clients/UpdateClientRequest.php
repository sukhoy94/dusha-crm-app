<?php

declare(strict_types=1);

namespace App\Http\Requests\Clients;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'email|nullable',
            'phone' => 'nullable|string|max:20',
            'additional_contact' => 'nullable|string|max:255',
            'gender' => 'nullable|in:male,female,other',
            'age_range' => 'nullable|in:18-24,25-30,31-39,40-50,50+',
            'description' => 'nullable|string',
            'special_notes' => 'nullable|string',
            'first_contact_date' => 'nullable|date',
            'last_contact_date' => 'nullable|date',
        ];
    }
}
