<?php

namespace App;

use Actuallymab\LaravelComment\Contracts\Commentable;
use Actuallymab\LaravelComment\HasComments;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model implements Commentable
{
    use HasComments;

    protected $primaryKey = 'id';

    protected $table = 'jobs';

    public $timestamps = false;

    protected $fillable = ['*'];

    protected $appends = [
        'job_title',
    ];

    protected $casts = [];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    public function getJobTitleAttribute()
    {
        return "{$this->specialty->naam} - {$this->titel}";
    }
}
