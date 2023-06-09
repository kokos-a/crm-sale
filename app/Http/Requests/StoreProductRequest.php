<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'title' => 'required|string|unique:App\Models\Product,title',
            'quantity' => 'required|numeric|max:4|min:0',
            'type' => 'nullable|string|max:128',
            'price' => 'required|integer',
            'stock' => 'required|integer',
        ];
    }
}
