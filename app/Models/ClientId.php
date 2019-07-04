<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientId extends Model
{
  protected $fillable = ['client_id', 'request_token', 'access_token'];
  public $timestamps = false;


  public function getClientId()
  {
      $clientId = $this->orderBy('id')->get();

      return $clientId;
  }
}
