<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'permission_name' => $this->module_name.' '.$this->name,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'alpha_dash'],
            'module_name' => ['required', 'string', 'max:255', 'alpha_dash'],
            'permission_name' => ['string', 'max:255', 'unique:permissions,name,'.$this->permission->id],
        ];
    }

}
