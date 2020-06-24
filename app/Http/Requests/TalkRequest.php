<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TalkRequest extends FormRequest
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
        $now=date('m/d/Y');
        return [
            'title' => 'required|string|max:100',
            'event_date' => 'required|date|after:'.$now,
            'description' => 'required|string|max:1000',
            
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
            'title.required' => 'title is required',
            'event_date.required' => 'event_date is required',
            'event_date.date' => 'event_date must be date',
            'description.required' => 'description is required',
        ];
    } 
}