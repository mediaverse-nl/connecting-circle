<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'skills';

    public $timestamps = true;

    protected $fillable = ['vaardigheid', 'ervaring', 'candidate_id'];

    protected $casts = [];
}
