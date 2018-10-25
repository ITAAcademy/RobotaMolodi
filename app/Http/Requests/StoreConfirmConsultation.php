<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;

class StoreConfirmConsultation extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user()){
            return true;
        }
        return false;


    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {

            $idUser = Auth::user();

            return [
                //
                'time_consultation_id' => 'unique:confirmed_consultations,time_consultation_id,NULL,id,user_id,'.$idUser->id,
//                'time_start' >  DateTime('now'),

            ];

    }

    public function messages() {
        return [
            "time_consultation_id" => 'Ви вже реєструвалися на цю консультацію.'
                //trans('errors/slider.image_required'),
            //"url.required" => trans('errors/slider.url_required'),

        ];
    }
}
