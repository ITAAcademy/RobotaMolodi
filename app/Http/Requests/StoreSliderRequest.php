<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreSliderRequest extends Request
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
            'image'         => 'required',
            'url'           => 'required'
        ];
    }
    
    public function messages() {
        return [
            "image.required" => "Image should be inputed.",
            "url.required" => "Url should be inputed.",
        ];
    }
}
