<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAttendeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'string|max:100',
            'lastname' => 'string|max:100',
            'email' => 'string|email|max:255|unique:users',
            'gender' => 'string|in:male,female,others',
        ];
    }

    
     /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.unique' => 'email must be unique',
            'gender.in' => 'gender must me male, female or others',
        ];
    }
}