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
            'image'         => 'required|max:512',
            'url'           => 'required',
        ];
    }
    
    public function messages() {
        return [
            "image.required" => trans('errors/slider.image_required'),
            "url.required" => trans('errors/slider.url_required'),
            "image.max" => trans('errors/slider.image_size'),
        ];
    }
}
