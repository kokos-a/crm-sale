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
            'title' => 'unique|string|max:128',
            'quantity' => 'string|max:128',
            'type' => 'string|max:128',
            'price' => 'float|max:7',
            'color_id' => 'integer|max:7',
        ];
    }
}
