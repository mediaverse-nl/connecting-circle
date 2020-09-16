<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Educations extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'educations';

    public $timestamps = true;

    protected $fillable = ['schooling','van','tot','schooling_en_plaats', 'candidate_id'];

    protected $casts = [];
}
