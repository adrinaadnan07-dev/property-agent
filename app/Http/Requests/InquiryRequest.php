<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InquiryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'project_id' => 'nullable|exists:projects,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'monthly_salary' => 'nullable|numeric|min:0',
            'approval_status' => 'nullable|string',
            'message' => 'nullable|string|max:1000',
            'appointment_date' => 'nullable|date',
        ];
    }
}
