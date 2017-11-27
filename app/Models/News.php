<?php

namespace App\Models;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class News extends Model
{
    const NOT_PICTURE = 'Not picture';
    const NEWS_ON_MAIN_PAGE = 5;
    private $path = 'image/uploads/news/';
    private $errorsMessages;

    private $rules = array(
        'name' => 'required|max:150',
        'description' => 'required',
        'image' => 'sometimes|image|max:10240',
    );
    protected $fillable = [
        'id',
        'name',
        'description',
        'img',
        'published',
        'created_at',
        'updated_at',
    ];
    public function saveImage(Request $request)
    {
        if (!$this->img && $request->hasFile('image')) {
            $pictureName = $this->fileSave($request);
        } else if ($this->img && $request->hasFile('image')) {
            $pictureName = $this->fileSave($request);
            $this->deletePicture();
        } else if ($this->img && !$request->hasFile('image')) {
            $pictureName = self::NOT_PICTURE;
            $this->deletePicture();
        } else {
            $pictureName = self::NOT_PICTURE;
        }
        $this->img = $pictureName;
    }

    private function deletePicture()
    {
        $exists = Storage::disk('local')->has($this->getImage());
        if ($exists)
            Storage::delete($this->getImage());

    }

    public function deleteNews()
    {
        $this->deletePicture();
        $this->delete();
    }

    private function fileSave($request)
    {
        $file = $request->file('image');
        $pictureName = $file->getClientOriginalName();
        $timestamp = time();
        $pictureName = $timestamp . "_" . $pictureName;
        $file->move($this->path, $pictureName);
        return $pictureName;
    }

    public function validateForm($news)
    {
        $validatorCity = Validator::make($news, $this->rules);
        if ($validatorCity->fails()) {
            $this->errorsMessages = $validatorCity->getMessageBag()->all();
            return false;
        }
        return true;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getErrorsMessages()
    {
        return $this->errorsMessages;
    }

    private function getImage()
    {
        return $this->getPath() . $this->img;
    }

    public static function getNews()
    {
        $news = News::getPublished()->latest('created_at')->limit(self::NEWS_ON_MAIN_PAGE)->get();
        return $news;
    }
    
    public function scopeGetPublished(){
        return News::where('published','=',1);
    }
    
    public function previous()
    {
        return News::where('id', '<', $this->id)->orderBy('id','desc')->first();
    }
    
    public function next()
    {
        return News::where('id', '>', $this->id)->orderBy('id','asc')->first();
    }
    
    public function shortDecription()
    {
        return substr_replace(News::find($this->id)->description, '...', 100, -1);
    }

}
