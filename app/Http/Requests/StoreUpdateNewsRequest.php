<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreUpdateNewsRequest extends Request
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
            'name' => 'required|max:150',
            'description' => 'required',
            'image' => 'sometimes|image|max:2048',
        ];
    }
    
    public function messages() {
        return [
            "name.required" => trans('errors/news.name_required'),
            "name.max" => trans('errors/news.name_max'),
            "description.required" => trans('errors/news.description_required'),
            "image.max" => trans('errors/news.image_max'),
        ];
    }
}
