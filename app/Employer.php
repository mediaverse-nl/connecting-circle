<?php

namespace App;

use Actuallymab\LaravelComment\Contracts\Commentable;
use Actuallymab\LaravelComment\HasComments;
use App\Casts\Json;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model implements Commentable
{
    use HasComments;

    protected $primaryKey = 'id';

    protected $table = 'employers';

    public $timestamps = true;

    protected $fillable = ['*'];

    protected $casts = [
        'data' => Json::class
    ];

    public function jobs()
    {
        return $this->hasMany(Jobs::class);
    }


}
