<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientSecret extends Model
{
  protected $fillable = ['client_id', 'client_secret'];
  public $timestamps = false;
}
