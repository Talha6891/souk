<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'min:1', 'max:100'],
            'last_name' => ['nullable', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user->id)],
            'whatsapp_no' => ['required', 'string', 'min:10', 'max:15', Rule::unique('users')->ignore($this->user->id)],
            'password' => ['nullable', 'string', Password::default(), 'confirmed'],
            'city' => ['required', 'string', 'min:1', 'max:100'],
            'address' => ['required', 'string', 'min:1', 'max:255'],
            'bank_name' => ['required', 'string', 'min:1', 'max:100'],
            'branch_code' => ['required', 'string', 'min:1', 'max:20'],
            'store_name' => ['required', 'string', 'min:1', 'max:100'],
            'account_title' => ['required', 'string', 'min:1', 'max:100'],
            'iban_number' => ['required', 'string', 'min:15', 'max:34'],
            'referral_code' => ['nullable', 'string', 'max:50'],
            'country_id' => ['required', 'exists:countries,id'],
            'role_id' => ['required', 'exists:roles,id'],
            'verified' => ['nullable', 'boolean']
        ];

    }
}
