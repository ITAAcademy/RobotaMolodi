<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParserTokens extends Model
{
  protected $fillable = ['request_token', 'access_token', 'parser_id', 'client_secret'];

    public function getClientId()
  {
      $clientId = $this->orderBy('id')->get();

      return $clientId;
  }


    public function ParserInfo()
    {
        return $this->belongsTo('App\Models\ParserInfo');
    }
}
