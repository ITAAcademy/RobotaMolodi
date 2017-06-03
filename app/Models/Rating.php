<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';
    protected $fillable = ['id', 'user_id', 'object_id', 'object_type', 'value', 'created_at', 'updated_at'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
