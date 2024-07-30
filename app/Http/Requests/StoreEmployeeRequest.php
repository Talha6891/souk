<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreEmployeeRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', Password::default(), 'confirmed'],
            'gender' => ['required', 'string', 'in:male,female,other'],
            'blood_group' => ['nullable','in:A+,A-,B+,B-,AB+,AB-,O+,O-'],
            'religion' => ['nullable', 'string', 'max:255'],
            'dob' => ['required', 'date'],
            'joining_date' => ['required', 'date'],
            'address' => ['required', 'string', 'max:500'],
            'department_id' => ['required', 'exists:departments,id'],
            'designation_id' => ['required', 'exists:designations,id'],
            'role_id' => ['required', 'exists:roles,id'],
        ];

    }

    /**
     * Get the custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'first_name' => 'first name',
            'last_name' => 'last name',
            'email' => 'email address',
            'gender' => 'gender',
            'religion' => 'religion',
            'blood_group' => 'blood group',
            'dob' => 'date of birth',
            'joining_date' => 'joining date',
            'address' => 'address',
            'department_id' => 'department',
            'designation_id' => 'designation',
        ];
    }

    /**
     * Get the validation error messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.unique' => 'The email address is already taken.',
            'department_id.exists' => 'The selected department does not exist.',
            'designation_id.exists' => 'The selected designation does not exist.',
        ];
    }
}
