<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['id', 'user_id', 'company_id', 'comment', 'created_at', 'updated_at'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function company(){
        return $this->belongsTo('App\Models\Company');
    }
}
