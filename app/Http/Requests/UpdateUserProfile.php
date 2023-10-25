<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserProfile extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if (request()->isMethod('PATCH')) {
            return [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'mobile' => ['required', 'string', 'max:255'],
                'email' => ['nullable', 'email', 'max:255'],
            ];
        } else {
            return [
                'current_password' => ['required', 'string', 'min:8'],
                'new_password' => ['required', 'string', 'min:8', 'confirmed'],
            ];
        }
    }
}
