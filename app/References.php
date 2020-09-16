<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class References extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'references';

    public $timestamps = true;

    protected $fillable = ['contactpersoon', 'telefoonnummer', 'bedrijf', 'email', 'candidate_id'];

    protected $casts = [];
}
