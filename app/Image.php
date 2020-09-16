<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $primaryKey = 'id';


    protected $table = 'images';

    public $timestamps = true;

    protected $fillable = ['key_name', 'path', 'extension', 'original', 'alt'];

    protected $casts = [
//        'mentions' => 'array',
    ];

//    public function
}
