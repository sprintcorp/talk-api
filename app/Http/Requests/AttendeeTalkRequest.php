<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendeeTalkRequest extends FormRequest
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
            'attendee_id' => 'required|integer',
            'talk_id' => 'required|integer',            
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
            'attendee_id.required' => 'attendee id is required',
            'attendee_id.integer' => 'attendee id must be an integer',
            'talk_id.required' => 'talk id is required',
            'talk_id.integer' => 'talk id must be an integer',
        ];
    } 
}