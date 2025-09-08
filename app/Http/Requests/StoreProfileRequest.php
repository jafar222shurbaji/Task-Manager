<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
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
            //
            'user_id' => 'required|exists:users,id',
            'phone' => 'required|string|max:15',
            'bio' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:100'
        ];

    }
    public function massage()
    {
        return ['user_id.required' => 'hello'];
    }
}
