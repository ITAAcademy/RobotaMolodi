<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessToken extends Model
{
  protected $fillable = ['client_id', 'access_token'];
  public $timestamps = false;
}
