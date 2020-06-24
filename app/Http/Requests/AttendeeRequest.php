<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendeeRequest extends FormRequest
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
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'email' => 'required|string|email|max:255|unique:users',
            'gender' => 'required|string|in:male,female,others',
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
            'firstname.required' => 'firstame is required',
            'lastname.required' => 'lastame is required',
            'email.required' => 'email is required',
            'gender.required' => 'gender is required',
            'email.unique' => 'email must be unique',
            'gender.in' => 'gender must me male, female or others',
        ];
    } 
}