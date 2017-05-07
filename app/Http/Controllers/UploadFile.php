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
use View;
use File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Repositoriy\Crop;

class UploadFile extends Controller
{
    public static function upFile()
    {
        if(Input::hasFile('FileName'))
        {
            $file = Input::file('FileName');
            $validator = Validator::make(Request::all(), [
                'FileName' => 'mimes:doc,docx,odt,rtf,txt,pdf|max:2048',
            ]);

            if($validator->fails())
            {
//                $error = 'Необхiдний формат файлу: doc, docx, odt, rtf, txt, pdf розмiром до 2 мб.';
//                return View::make('errors.uploadFileError', array(
//                    'error' => $error
//                ));//extension error
                return null;
            }
            else
            {
                $filename = Auth::user()['email'] . '_' . $file->getClientOriginalName();
                $file->move(base_path() . '/public/uploads', $filename);
                //return Redirect::back();
                return base_path().'/public/uploads/'.$filename;
            }
        }
        else
        {
            $error = 'Розмiр файлу перевищує 2 мб.';
            return View::make('errors.uploadFileError', array(
                'error' => $error
            ));//size error
        }
    }

    public function editImg(Request $request)
    {

        $file = $request->fileImg;
        $cropcoord = explode(',', $request->coords);
        $filename = $file->getClientOriginalName();
        $directory = 'image/resume/'. Auth::user()->id . '/';
        Crop::input($cropcoord, $filename, $file, $directory);


//        Crop::input($cropcoord, $filename, $file, $directory);      //cuts and stores the image in the appropriate directory

//
////        fileImg
//        if(Input::hasFile('image'))
//        {
//
//            $file = Input::file('image');
//
//            $validator = Validator::make(Request::all(), [
//                'image' => 'mimes:jpg,jpeg,png,bmp|max:2048',
//            ]);
//
//            if($validator->fails())
//            {
//                $error = 'Необхiдний формат файлу: jpeg, jpg, png, bmp розмiром до 2 мб.';
//                return View::make('errors.uploadFileError', array(
//                    'error' => $error
//                ));//size error
//            }
//            else
//            {
//                $extensions = ['.jpg', '.jpeg', '.png', '.bmp'];
//
//                if(Input::get('rov') == 'v')
//                {
//                    foreach($extensions as $i)
//                        if(File::exists(base_path() . '/public/image/vacancy/' . Input::get('fname') . $i))
//                            File::delete(base_path() . '/public/image/vacancy/' . Input::get('fname') . $i);
//
//                    $filename = Input::get('fname') . '.' . $file->getClientOriginalExtension();
//                    $file->move(base_path() . '/public/image/vacancy', $filename);
//                }
//                else if(Input::get('rov') == 'r')
//                {
//                    foreach($extensions as $i)
//                        if(File::exists(base_path() . '/public/image/resume/' . Input::get('fname') . $i))
//                            File::delete(base_path() . '/public/image/resume/' . Input::get('fname') . $i);
//
//                    $filename = Input::get('fname') . '.' . $file->getClientOriginalExtension();
//                    $file->move(base_path() . '/public/image/resume', $filename);
//                }
//                return Redirect::back();
//            }
//        }
//        else
//        {
//            $error = 'Розмiр файлу перевищує 2 мб.';
//            return View::make('errors.uploadFileError', array(
//                'error' => $error
//            ));//size error
//        }

    }
}
?>