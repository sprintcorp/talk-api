<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTalkRequest extends FormRequest
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
            'title' => 'string|max:100',
            'event_date' => 'date|after:'.$now,
            'description' => 'string|max:1000',
            
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
            'event_date.date' => 'event_date must be date',
        ];
    } 
}