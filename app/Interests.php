<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interests extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'interests';

    public $timestamps = true;

    protected $fillable = ['interesse', 'candidate_id'];

    protected $casts = [];
}
