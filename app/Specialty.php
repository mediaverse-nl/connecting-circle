<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'specialties';

    public $timestamps = false;

    protected $fillable = ['*'];

    protected $casts = [];
}
