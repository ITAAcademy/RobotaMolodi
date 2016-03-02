<?php
/**
 * Created by PhpStorm.
 * User: jc
 * Date: 01.01.16
 * Time: 18:27
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class UploadFile extends Controller
{
    public static function upFile()
    {
        if(Input::hasFile('FileName'))
        {
            //File Validation Mime Types and size
            $validator = Validator::make(Request::all(), [
                'FileName' => 'mimes:doc,docx,odt,rtf,txt,pdf|max:5120',
            ]);
            if ($validator->fails()) {
                return null;
            }
            $file = Input::file('FileName');
//
//            $extensions = array('doc', 'docx', 'odt', 'rtf', 'txt', 'pdf');
//            $var = 0;
//
//            foreach ($extensions as $i)
//                if ($i == $file->getClientOriginalExtension())
                    $var = 1;

//            if ($var == 1)
//            {
                $filename = Auth::user()['email'] . '_' . $file -> getClientOriginalName();
                $file->move(base_path() . '/public/uploads', $filename);
                return base_path() . '/public/uploads/'. $filename;
//            }
//            else
//                return view('errors/uploadFileError');
        }
        else
            return null;
 //           return view('errors/uploadFileError');
    }
}
?>