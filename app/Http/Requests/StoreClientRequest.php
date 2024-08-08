<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreClientRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'min:1', 'max:100'],
            'last_name' => ['nullable', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', Password::default(), 'confirmed'],
            'whatsapp_no' => ['required', 'string', 'unique:clients', 'min:10', 'max:15'],
            'city' => ['required', 'string', 'min:1', 'max:100'],
            'address' => ['required', 'string', 'min:1', 'max:255'],
            'bank_name' => ['required', 'string', 'min:1', 'max:100'],
            // 'branch_code' => ['required', 'string', 'min:1', 'max:20'],
            'store_name' => ['required', 'string', 'min:1', 'max:100'],
            'account_title' => ['required', 'string', 'min:1', 'max:100'],
            'iban_number' => ['required', 'string', 'min:15', 'max:34'],
            'referral_code' => ['nullable', 'string', 'max:50'],
            'country_id' => ['required', 'exists:countries,id'],
            'client_type' => ['required', 'in:individual,agency'],
        ];
    }
}
