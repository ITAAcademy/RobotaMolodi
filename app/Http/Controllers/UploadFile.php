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
//use File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Repositoriy\Crop;
use App\Models\Resume;

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
        $resume = Resume::find($request->id);
        $file = 'image/resume/'.Auth::user()->id.'/'.$resume->image;
        
        if (File::exists($file))
        {
            Storage::delete($file);
        }
        
        $file = $request->fileImg;
        $cropcoord = explode(',', $request->coords);
        $filename = time().'-'.$file->getClientOriginalName();
        $directory = 'image/resume/'. Auth::user()->id . '/';
        Crop::input($cropcoord, $filename, $file, $directory);

        $resume->image = $filename;
        $resume->save();

        return $directory.$filename;
    }
}


//class Uploader{
//
//    private $model;
//    protected $storePath = 'image/';
//
//    public function __construct($model)
//    {
//        $this->model = $model;
//        $this->storePath = $this->storePath->concat(class_basename($model));
//    }
//
//    public function save($img, $coords){
//
//    }
//}
//$resume = Resume::find(1);
//$resume->img = new Uploader($resume);
//$resume->img->save(file, [0,0]);
//$resume->img->destroy();
//
//class CompanyUploader extends Uploader{
//    public function save($img, $coords){
//        return '';
//    }
//
//}

//          return Uploader->updateImage($request->fileImg, Resume::find($request->id), explode(',', $request->coords));
//          Uploader->save(img, resume);
//          Uploader->destroy(resume);
//          resume->img->destroy();

?>