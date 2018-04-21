<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'about_uses_id',
        'image'
    ];

    public  function aboutUs(){
        return $this->belongsTo('App\Models\About_Us','about_uses_id');
    }

    public function storeImages($nameOfObject,$id){
        $imageName = time().'_'
            .$nameOfObject->getClientOriginalName();
        $actualPath = public_path('/AboutUs/record_id-#'.$id);
        $nameOfObject->move($actualPath,$imageName);
    }
}
