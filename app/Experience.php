<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'experiences';

    public $timestamps = true;

    protected $fillable = ['functie','van','tot','bedrijf','inleiding', 'candidate_id'];

    protected $casts = [];
}
