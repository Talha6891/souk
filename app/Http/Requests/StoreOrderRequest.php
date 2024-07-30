<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'order_name' => ['required', 'string', 'max:255'],
            'status' => ['required','in:pending,processing,delivered,cancelled,refunded,returned'],
            'user_id' => ['required', 'exists:users,id'],
            'custom_order_id' => ['required', 'string', 'unique:orders'],
            'customer_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'contact_no' => ['required', 'string', 'max:15'],
            'city' => ['required', 'string', 'max:100'],
            'shipping_address' => ['required', 'string'],
            'country_id' => ['required', 'exists:countries,id'],
            'quantity' => ['required', 'integer'],
            'total_price' => ['required', 'numeric', 'min:0'],
            'product_id' => ['nullable', 'string'],
        ];
    }
}
