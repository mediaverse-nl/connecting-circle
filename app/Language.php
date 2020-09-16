<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'languages';

    public $timestamps = true;

    protected $fillable = ['taal', 'ervaring', 'candidate_id'];

    protected $casts = [];
//
//    public function jobs()
//    {
//        return $this->hasMany(Jobs::class);
//    }
}
