<?php
namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Repositoriy\Crop;
use App\Models\Resume;

class UploadFile extends Controller
{
    static public function saveImage($image, $path)
    {
        $name = time().$image->getClientOriginalName();
        $destinationPath = public_path($path);
        Storage::makeDirectory($destinationPath);
        $image->move($destinationPath, $name);
        return $path.$name;
    }

    static public function deleteImage($path){
        if ($path != false && File::exists(public_path($path))) {
            Storage::delete($path);
        }
    }
    public function savePhoto(Request $request, $directory){
        $file = $request->fileImg;
        $cropcoord = explode(',', $request->coords);
        $filename = time().'-'.$file->getClientOriginalName();
        Crop::input($cropcoord, $filename, $file, $directory);
        return $filename;
    }

    public function editResumeImg(Request $request){
        $resume = Resume::find($request->id);

        if($resume->image != ''){
            $file = 'image/resume/'.Auth::user()->id.'/'.$resume->image;
            if (File::exists($file)) {
                Storage::delete($file);
            }
        }
        $directory = 'image/resume/'. Auth::user()->id . '/';
        $resume->image = $this->savePhoto($request, $directory);
        $resume->save();
        return $directory.$resume->image;
    }

    public function deleteResumeImg(Request $request){

        $resume = Resume::find($request->id);
        $file = 'image/resume/'.Auth::user()->id.'/'.$resume->image;
        if (File::exists($file)) {
            Storage::delete($file);
        }
        $resume->image = '';
        $resume->save();
        return $directory = 'image/m.jpg';
    }

    public function editCompanyImg(Request $request){
        $company = Company::find($request->id);
        if($company->image != ''){
            $file = 'image/company/'.Auth::user()->id.'/'.$company->image;
            if (File::exists($file)) {
                Storage::delete($file);
            }
        }
        $directory = 'image/company/'. Auth::user()->id . '/';
        $company->image = $this->savePhoto($request, $directory);
        $company->save();
        return $directory.$company->image;
    }

    public function addArticleContent(Request $request){
        $CKEditor = $request->input('CKEditor');
        $funcNum  = $request->input('CKEditorFuncNum');
        $message = $url = '';
        if (Input::hasFile('upload')) {
            $file = Input::file('upload');
            if ($file->isValid()) {
                $url = $this->saveImage($file,'image/uploads/news/content/');
                $url = url($url);
            } else {
                $message = 'An error occured while uploading the file.';
            }
        } else {
            $message = 'No file uploaded.';
        }

        $response = '<html><body><script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script></body></html>';
        return response($response)
            ->header('Content-Type', 'text/html');
    }
}

?>
