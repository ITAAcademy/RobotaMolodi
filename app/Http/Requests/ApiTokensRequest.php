<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ApiTokensRequest extends Request
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
            //'timeStart'    => 'date_format:"H:i"|required|before:'.$this->get('timeEnd'),
            'client_id' => 'sometimes|required|exists:about_parsers,client_id',
            'request_token' => 'sometimes|required|exists:parser_tokens,request_token',
            'access_token' => 'sometimes|required|exists:parser_tokens,access_token',
            'client_secret' => 'sometimes|required|exists:parser_tokens,client_secret'
        ];
    }
}
