<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'title' => 'required|string|regex:/^.*[^\d].*$/',
            'description' => 'nullable|string',
            'priority' => 'required|integer|between:1,100',
            'user_id' => 'exists:users,id|required|integer'
        ];
    }


    
    public function messages()
    {
        return [
            'title.required' => "the title is required",
            'title.regex' => 'لا يمكن أن يكون العنوان رقمًا فقط، يجب أن يحتوي على أحرف نصية',
            'title.max' => "You should type less then 25 letters",
        ];
    }


}
