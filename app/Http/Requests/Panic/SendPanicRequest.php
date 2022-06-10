<?php

namespace App\Http\Requests\Panic;

use Illuminate\Foundation\Http\FormRequest;

class SendPanicRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'longitude' => 'required|string',
            'latitude' => 'required|string',
            'panic_type' => 'nullable|string',
            'details' => 'nullable|string'
        ];
    }
    
}
