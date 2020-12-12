<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutParser extends Model
{
    protected $fillable = ['id', 'client_id','site_name'];

    public function tokens()
    {
        return $this->hasOne('App\Models\ParserTokens', 'parser_id', 'id');
    }



}
