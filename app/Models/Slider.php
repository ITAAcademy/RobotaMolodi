<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    protected $fillable = ['image', 'url', 'category_id', 'published', 'position'];

    public $timestamps = false;

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    
    public function scopeIsPublished($query){
        return $query->where('published', true);
    }
    
    public function scopeByCategory($query, $category){
        return $query->where('category_id', $category);
    }
    
    public function scopeIsRelevant($query, $category){
        return $query->isPublished()->byCategory($category);
    }
    
    public function shiftPositions(){
        $sliders = Slider::where('position', '>', $this->position)->get();
        
        foreach($sliders as $one){
            $one->position--;
            $one->save();
        }
        return 'Позиції були успішно змінені';
    }
    
    public function changePositions($next){
        $nextSlider = Slider::byCategory($this->category_id)
            ->where('position', $next)
            ->first();
        
        $next = $nextSlider->position;
        $nextSlider->position = $this->position;
        $this->position = $next;
    
        $nextSlider->save();
        $this->save();
    }
}
