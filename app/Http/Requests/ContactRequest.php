<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:contacts,email,' . ($this->contact ? $this->contact->id : 'NULL'),
            'phone' => 'nullable',
            'country' => 'nullable',
            'city' => 'nullable',
            'state' => 'nullable|size:2',
            'zip' => 'nullable',
        ];
    }
}
