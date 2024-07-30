<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateWarehouseRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:1', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:warehouses,email,'. $this->warehouse->id],
            'contact_no' => ['required', 'string', 'min:10', 'max:15', 'unique:warehouses,contact_no,' . $this->warehouse->id],
            'city' => ['required', 'string', 'min:1', 'max:100'],
            'address' => ['required', 'string', 'min:1', 'max:255'],
            'country_id' => ['required', 'exists:countries,id'],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }
}
