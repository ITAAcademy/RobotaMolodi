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

class UploadFile extends Controller
{
    public function upFile()
    {
        if (Input::hasFile('FileName')) {
            $file = Input::file('FileName');

            $extensions = array('doc', 'docx', 'odt', 'rtf', 'txt', 'pdf');
            $var = 0;

            foreach ($extensions as $i)
                if ($i == $file->getClientOriginalExtension())
                    $var = 1;

            if ($var == 1) {
                $filename = Auth::user()['email'] . '_' . $file->getClientOriginalName();
                $file->move(base_path() . '/uploads', $filename);
            }
        }
        return Redirect::back();
    }
}
?>