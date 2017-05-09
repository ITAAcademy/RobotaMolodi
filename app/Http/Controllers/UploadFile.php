<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Repositoriy\Crop;
use App\Models\Resume;

class UploadFile extends Controller
{
    public function editImg(Request $request){
        $resume = Resume::find($request->id);

        if($resume->image != ''){
            $file = 'image/resume/'.Auth::user()->id.'/'.$resume->image;

            if (File::exists($file))
            {
                Storage::delete($file);
            }
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
    
    public function deleteImg(Request $request){
        $resume = Resume::find($request->id);
        $file = 'image/resume/'.Auth::user()->id.'/'.$resume->image;

        if (File::exists($file))
        {
            Storage::delete($file);
        }

        $resume->image = '';
        $resume->save();

        return $directory = 'image/m.jpg';
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