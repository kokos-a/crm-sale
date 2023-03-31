<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return ($this->user()->access_level > 0);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'nullable|string|max:512',
            'lastname' => 'nullable|string|max:128',
            'organisation' => 'required|string|max:128|unique:App\Models\Client,organisation',
            'type' => 'required|numeric|max:2|min:0',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'tel' => 'nullable|string|max:12',
            'comment' => 'nullable|string|max:255',
        ];
    }
}
