<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AccountSettingsRequest extends FormRequest
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
            'name'   => 'required|string|max:30',
            'email'  => 'required|string|email|max:50|unique:users,email,' . Auth::id(),
            'phone'  => 'nullable|string|max:20|unique:users,phone,' . Auth::id(),
            'status' => 'nullable|string|max:50',
            'job'    => 'nullable|string|max:30',
            'city'   => 'nullable|string|max:30',
            'hobby'  => 'nullable|string|max:30',
        ];
    }
}
