<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoInfo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
//    protected $table = 'seo_infos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'url',
        'title',
        'description',
        'keywords',
        'created_at',
        'updated_at',
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'keywords' => 'array',
    ];
}
